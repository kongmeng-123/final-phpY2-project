<?php
/**
 * Professional REST API Gateway - Final Total Fix Version
 */

// 1. Core Error & Response Setup
error_reporting(E_ALL);
ini_set('display_errors', 0); // Hide HTML errors
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

function sendError($message, $statusCode = 400) {
    http_response_code($statusCode);
    echo json_encode(["success" => false, "error" => $message]);
    exit();
}

function sendResponse($data, $message = "Success", $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode(["success" => true, "message" => $message, "data" => $data]);
    exit();
}

try {
    // 2. Database Connection
    if (!file_exists("db_config.php")) throw new Exception("db_config.php not found.");
    require_once "db_config.php";
    if (!isset($pdo)) throw new Exception("PDO connection failed.");

    // Handle OPTIONS
    if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") exit();

    // 3. Robust Routing (Supports PATH_INFO and ?r=resource fallback)
    $resource = '';
    $id = null;

    if (isset($_SERVER['PATH_INFO'])) {
        $path = trim($_SERVER['PATH_INFO'], '/');
        $segments = explode('/', $path);
        $resource = $segments[0] ?? '';
        $id = isset($segments[1]) ? (int)$segments[1] : null;
    } elseif (isset($_GET['r'])) {
        $resource = $_GET['r'];
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
    }

    if (empty($resource)) {
        // Check if user is trying to hit root
        sendResponse(["status" => "online"], "G-Book API is online. Use /debug to test.");
    }

    // --- DEBUG ---
    if ($resource === "debug") {
        $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
        sendResponse([
            "php_version" => PHP_VERSION,
            "db_connected" => true,
            "tables" => $tables,
            "server" => $_SERVER['SERVER_SOFTWARE']
        ]);
    }

    // --- MAIN RESOURCES ---
    switch ($resource) {
        
        case "products":
            if ($_SERVER['REQUEST_METHOD'] === "GET") {
                if ($id) {
                    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
                    $stmt->execute([$id]);
                    $res = $stmt->fetch();
                    $res ? sendResponse($res) : sendError("Not found", 404);
                } else {
                    $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
                    sendResponse($stmt->fetchAll());
                }
            }
            break;

        case "users":
            if ($_SERVER['REQUEST_METHOD'] === "GET") {
                $stmt = $pdo->query("SELECT id, fullname, email, phone, gender, role, created_at FROM users ORDER BY id DESC");
                sendResponse($stmt->fetchAll());
            }
            break;

        case "login":
            $input = json_decode(file_get_contents('php://input'), true);
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$input['email'] ?? '']);
            $user = $stmt->fetch();
            if ($user && password_verify($input['password'] ?? '', $user['password'])) {
                unset($user['password']);
                sendResponse($user, "Login successful");
            }
            sendError("Invalid credentials", 401);
            break;

        case "register":
            $input = json_decode(file_get_contents('php://input'), true);
            $fullname = $input['fullname'] ?? '';
            $email = $input['email'] ?? '';
            $pass = password_hash($input['password'] ?? '', PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$fullname, $email, $pass]);
            sendResponse(["id" => $pdo->lastInsertId()], "User registered");
            break;

        case "orders":
            if ($_SERVER['REQUEST_METHOD'] === "GET") {
                $userId = isset($_GET['user_id']) ? (int)$_GET['user_id'] : null;
                if ($id) {
                    $stmt = $pdo->prepare("SELECT o.*, u.fullname, e.name as express_name FROM orders o LEFT JOIN users u ON o.user_id = u.id LEFT JOIN express_services e ON o.express_service_id = e.id WHERE o.id = ?");
                    $stmt->execute([$id]);
                    $order = $stmt->fetch();
                    if ($order) {
                        $items = $pdo->prepare("SELECT oi.*, p.name FROM order_items oi JOIN products p ON oi.product_id = p.id WHERE oi.order_id = ?");
                        $items->execute([$id]);
                        $order['items'] = $items->fetchAll();
                        sendResponse($order);
                    }
                    sendError("Order not found", 404);
                } elseif ($userId) {
                    $stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = ? ORDER BY id DESC");
                    $stmt->execute([$userId]);
                    sendResponse($stmt->fetchAll());
                } else {
                    $stmt = $pdo->query("SELECT o.*, u.fullname FROM orders o LEFT JOIN users u ON o.user_id = u.id ORDER BY o.id DESC");
                    sendResponse($stmt->fetchAll());
                }
            }
            break;

        case "checkout":
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                // Handle file upload and order creation
                $userId = $_POST['user_id'];
                $total = $_POST['total_price'];
                $items = json_decode($_POST['items'], true);
                $file = $_FILES['payment_slip'];
                
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $newName = "slip_" . time() . "_" . rand(100,999) . "." . $ext;
                
                $pdo->beginTransaction();
                try {
                    $stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, shipping_address, express_service_id, payment_method_id, payment_slip) VALUES (?,?,?,?,?,?)");
                    $stmt->execute([$userId, $total, $_POST['address'], $_POST['express_id'], $_POST['bank_id'], $newName]);
                    $orderId = $pdo->lastInsertId();
                    
                    $itemStmt = $pdo->prepare("INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (?,?,?,?)");
                    foreach($items as $i) {
                        $itemStmt->execute([$orderId, $i['id'], $i['qty'], $i['price']]);
                    }
                    
                    move_uploaded_file($file['tmp_name'], "../admin_dashboard/img/" . $newName);
                    $pdo->commit();
                    sendResponse(["id" => $orderId], "Checkout complete");
                } catch(Exception $e) { $pdo->rollBack(); throw $e; }
            }
            break;

        default:
            sendError("Resource '$resource' not found.", 404);
            break;
    }

} catch (Exception $e) {
    sendError("System Exception: " . $e->getMessage(), 500);
}
?>