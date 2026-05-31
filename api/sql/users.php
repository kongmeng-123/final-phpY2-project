<?php
/**
 * Standalone Users Resource API Endpoint (GET, PATCH, DELETE)
 */

require_once "../db_config.php";

// Set core API response headers
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

// Handle CORS preflight OPTIONS request
if ($method === "OPTIONS") {
    http_response_code(200);
    exit();
}

// Read optional user ID from query parameters (e.g. users.php?id=5)
$id = isset($_GET['id']) && $_GET['id'] !== '' ? (int)$_GET['id'] : null;

try {
    switch ($method) {
        
        // ==========================================
        // 📥 GET: Fetch All Users or Single User
        // ==========================================
        case "GET":
            if ($id) {
                // Fetch a single user by ID
                $stmt = $pdo->prepare("SELECT * FROM users_tb WHERE user_id = :id");
                $stmt->execute(['id' => $id]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    unset($user['password']); // Protect password hash from response
                    http_response_code(200);
                    echo json_encode($user);
                } else {
                    http_response_code(404);
                    echo json_encode(["error" => "User not found"]);
                }
            } else {
                // Fetch all users
                $stmt = $pdo->prepare("SELECT * FROM users_tb");
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Protect password hashes for all users
                foreach ($users as &$u) {
                    unset($u['password']);
                }

                http_response_code(200);
                echo json_encode($users);
            }
            break;

        // ==========================================
        // 🛠️ PATCH: Update User Details
        // ==========================================
        case "PATCH":
            if (!$id) {
                http_response_code(400);
                echo json_encode(["error" => "User ID is required as query parameter (e.g., users.php?id=5)"]);
                exit();
            }

            // Retrieve raw JSON input
            $input = json_decode(file_get_contents('php://input'), true) ?? [];

            // Verify user exists
            $check = $pdo->prepare("SELECT user_id FROM users_tb WHERE user_id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
                http_response_code(404);
                echo json_encode(["error" => "User not found"]);
                exit();
            }

            $allowedFields = ['Fname', 'Lname', 'gender', 'email', 'password', 'phoneNumber'];
            $fieldsToUpdate = [];
            $params = [];

            foreach ($allowedFields as $field) {
                if (array_key_exists($field, $input)) {
                    $fieldsToUpdate[] = "`$field` = :$field";
                    if ($field === 'password') {
                        $params[$field] = password_hash($input[$field], PASSWORD_DEFAULT);
                    } else {
                        $params[$field] = $input[$field];
                    }
                }
            }

            if (empty($fieldsToUpdate)) {
                http_response_code(400);
                echo json_encode(["error" => "No valid fields provided for update"]);
                exit();
            }

            $params['id'] = $id;
            $sql = "UPDATE users_tb SET " . implode(', ', $fieldsToUpdate) . " WHERE user_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);

            http_response_code(200);
            echo json_encode([
                "message" => "User updated successfully",
                "user_id" => $id
            ]);
            break;

        // ==========================================
        // ❌ DELETE: Remove a User
        // ==========================================
        case "DELETE":
            if (!$id) {
                http_response_code(400);
                echo json_encode(["error" => "User ID is required as query parameter (e.g., users.php?id=5)"]);
                exit();
            }

            // Verify user exists
            $check = $pdo->prepare("SELECT user_id FROM users_tb WHERE user_id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
                http_response_code(404);
                echo json_encode(["error" => "User not found"]);
                exit();
            }

            $stmt = $pdo->prepare("DELETE FROM users_tb WHERE user_id = :id");
            $stmt->execute(['id' => $id]);

            http_response_code(200);
            echo json_encode([
                "message" => "User deleted successfully",
                "user_id" => $id
            ]);
            break;

        default:
            http_response_code(405);
            echo json_encode(["error" => "Method not allowed"]);
            break;
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Server error: " . $e->getMessage()]);
}
?>
