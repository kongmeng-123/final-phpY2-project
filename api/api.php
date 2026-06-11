<?php
/**
 * Professional REST API Gateway
 * Final PHP Year 2 Project
 */

require_once "db_config.php";

// Set core API response headers
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Bangkok');

$method = $_SERVER['REQUEST_METHOD'];

// Handle CORS preflight OPTIONS request
if ($method === "OPTIONS") {
   http_response_code(200);
   exit();
}

/**
 * Sends a standard API success response and terminates execution.
 *
 * @param mixed $data The body data to send
 * @param int $statusCode The HTTP status code (Default: 200)
 */
function sendResponse($data, $statusCode = 200)
{
   http_response_code($statusCode);
   echo json_encode($data);
   exit();
}

/**
 * Sends a standard API error response and terminates execution.
 *
 * @param string $message The descriptive error message
 * @param int $statusCode The HTTP status code (Default: 400)
 */
function sendError($message, $statusCode = 400)
{
   http_response_code($statusCode);
   echo json_encode(["error" => $message]);
   exit();
}

try {
   // Route resolution: Extract resource and optional ID from path parameters
   $path = isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : '';
   $segments = explode('/', $path);
   $resource = $segments[0] ?? '';
   $id = isset($segments[1]) && $segments[1] !== '' ? (int) $segments[1] : null;

   // Retrieve and parse raw JSON input payload
   $input = json_decode(file_get_contents('php://input'), true) ?? [];

   switch ($resource) {

      // ==========================================
      // 🔐 AUTHENTICATION ENDPOINTS
      // ==========================================

      case "register":
         if ($method !== "POST") {
            sendError("Method not allowed", 405);
         }

         $email = isset($input['email']) ? trim($input['email']) : '';
         $password = $input['password'] ?? '';

         if (empty($email) || empty($password)) {
            sendError("Email and Password are required", 400);
         }

         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            sendError("Invalid email format", 400);
         }

         if (strlen($password) < 6) {
            sendError("Password must be at least 6 characters long", 400);
         }

         // Extract names - support both standard separate fields and a unified 'username'
         $fname = '';
         $lname = '';
         if (!empty($input['username'])) {
            $parts = explode(' ', trim($input['username']), 2);
            $fname = $parts[0];
            $lname = $parts[1] ?? '';
         } else {
            $fname = isset($input['Fname']) ? trim($input['Fname']) : '';
            $lname = isset($input['Lname']) ? trim($input['Lname']) : '';
         }

         if (empty($fname)) {
            sendError("First name or Username is required", 400);
         }

         $gender = $input['gender'] ?? 'Unspecified';
         $phoneNumber = $input['phoneNumber'] ?? null;

         // Check if email already exists in users table
         $checkEmail = $pdo->prepare("SELECT user_id FROM users_tb WHERE email = :email");
         $checkEmail->execute(['email' => $email]);
         if ($checkEmail->fetch()) {
            sendError("Email is already registered", 409);
         }

         // Securely hash the password before saving
         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

         $stmt = $pdo->prepare("INSERT INTO users_tb (Fname, Lname, gender, email, password, phoneNumber) VALUES (:Fname, :Lname, :gender, :email, :password, :phoneNumber)");
         $stmt->execute([
            'Fname' => $fname,
            'Lname' => $lname,
            'gender' => $gender,
            'email' => $email,
            'password' => $hashedPassword,
            'phoneNumber' => $phoneNumber
         ]);

         $newUserId = $pdo->lastInsertId();
         sendResponse([
            "message" => "User registered successfully",
            "user_id" => $newUserId
         ], 201);
         break;

      case "login":
         if ($method !== "POST") {
            sendError("Method not allowed", 405);
         }

         $email = isset($input['email']) ? trim($input['email']) : '';
         $password = $input['password'] ?? '';

         if (empty($email) || empty($password)) {
            sendError("Email and Password are required", 400);
         }

         // Fetch user record
         $stmt = $pdo->prepare("SELECT * FROM users_tb WHERE email = :email");
         $stmt->execute(['email' => $email]);
         $user = $stmt->fetch(PDO::FETCH_ASSOC);

         if (!$user) {
            sendError("Invalid email or password", 401);
         }

         // Check credentials: Supports secure hashed check and plaintext check for seed data
         $isPasswordCorrect = password_verify($password, $user['password']) || ($password === $user['password']);

         if (!$isPasswordCorrect) {
            sendError("Invalid email or password", 401);
         }

         // Remove sensitive password hash from client response
         unset($user['password']);

         sendResponse([
            "message" => "Login successful",
            "user" => $user
         ]);
         break;

      // ==========================================
      // 📚 PRODUCTS RESOURCE
      // ==========================================

      case "products":
         if ($method === "GET") {
            if ($id) {
               $stmt = $pdo->prepare("SELECT * FROM products_tb WHERE id = :id");
               $stmt->execute(['id' => $id]);
               $product = $stmt->fetch(PDO::FETCH_ASSOC);
               if ($product) {
                  sendResponse($product);
               } else {
                  sendError("Product not found", 404);
               }
            } else {
               $stmt = $pdo->prepare("SELECT * FROM products_tb");
               $stmt->execute();
               $product_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
               sendResponse($product_data);
            }
         } elseif ($method === "POST") {
            if (empty($input['product_name']) || !isset($input['price'])) {
               sendError("Missing required fields: product_name, price", 400);
            }
            $stmt = $pdo->prepare("INSERT INTO products_tb (product_name, price, category,sold, count, image_src, description, author, import_date) VALUES (:product_name, :price, :category, :sold, :count, :image_src, :description, :author, :import_date)");
            $stmt->execute([
               'product_name' => $input['product_name'],
               'price' => $input['price'],
               'category' => $input['category'] ?? null,
               'sold' => $input['sold'] ?? 0,
               'count' => $input['count'] ?? 0,
               'image_src' => $input['image_src'] ?? null,
               'description' => $input['description'] ?? null,
               'author' => $input['author'] ?? null,
               'import_date' => date('Y-m-d H:i:s')
            ]);
            $newId = $pdo->lastInsertId();
            sendResponse(["message" => "Product created successfully", "id" => $newId], 201);

         } elseif ($method === "PATCH" || $method === "PUT") {
            if (!$id) {
               sendError("Product ID is required for update", 400);
            }
            // Verify existence
            $check = $pdo->prepare("SELECT id FROM products_tb WHERE id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
               sendError("Product not found", 404);
            }

            $allowedFields = ['product_name', 'price', 'category', 'count', 'image_src', 'description', 'author', 'import_date'];
            $fieldsToUpdate = [];
            $params = [];
            foreach ($allowedFields as $field) {
               if (array_key_exists($field, $input)) {
                  $fieldsToUpdate[] = "`$field` = :$field";
                  $params[$field] = $input[$field];
               }
            }

            if (empty($fieldsToUpdate)) {
               sendError("No valid fields provided for update", 400);
            }

            $params['id'] = $id;
            $sql = "UPDATE products_tb SET " . implode(', ', $fieldsToUpdate) . " WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            sendResponse(["message" => "Product updated successfully", "id" => $id]);

         } elseif ($method === "DELETE") {
            if (!$id && isset($input['id'])) {
               $id = (int) $input['id'];
            }
            
            if (!$id) {
               sendError("Product ID is required for deletion", 400);
            }
            // Verify existence
            $check = $pdo->prepare("SELECT id FROM products_tb WHERE id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
               sendError("Product not found", 404);
            }

            $stmt = $pdo->prepare("DELETE FROM products_tb WHERE id = :id");
            $stmt->execute(['id' => $id]);
            sendResponse(["message" => "Product deleted successfully", "id" => $id]);

         } else {
            sendError("Method not allowed", 405);
         }
         break;

      // ==========================================
      // 👥 USERS RESOURCE
      // ==========================================

      case "users":
         if ($method === "GET") {
            if ($id) {
               $stmt = $pdo->prepare("SELECT * FROM users_tb WHERE user_id = :id");
               $stmt->execute(['id' => $id]);
               $user = $stmt->fetch(PDO::FETCH_ASSOC);
               if ($user) {
                  unset($user['password']); // Protect password hash
                  sendResponse($user);
               } else {
                  sendError("User not found", 404);
               }
            } else {
               $stmt = $pdo->prepare("SELECT * FROM users_tb");
               $stmt->execute();
               $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
               // Hide passwords for safety
               foreach ($user_data as &$u) {
                  unset($u['password']);
               }
               sendResponse($user_data);
            }
         } elseif ($method === "POST") {
            if (empty($input['Fname']) || empty($input['Lname']) || empty($input['gender']) || empty($input['email']) || empty($input['password'])) {
               sendError("Missing required fields: Fname, Lname, gender, email, password", 400);
            }

            if (!filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
               sendError("Invalid email format", 400);
            }

            // Check conflict
            $checkEmail = $pdo->prepare("SELECT user_id FROM users_tb WHERE email = :email");
            $checkEmail->execute(['email' => $input['email']]);
            if ($checkEmail->fetch()) {
               sendError("Email is already registered", 409);
            }

            $hashed = password_hash($input['password'], PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users_tb (Fname, Lname, gender, email, password, phoneNumber) VALUES (:Fname, :Lname, :gender, :email, :password, :phoneNumber)");
            $stmt->execute([
               'Fname' => $input['Fname'],
               'Lname' => $input['Lname'],
               'gender' => $input['gender'],
               'email' => $input['email'],
               'password' => $hashed,
               'phoneNumber' => $input['phoneNumber'] ?? null
            ]);
            $newId = $pdo->lastInsertId();
            sendResponse(["message" => "User created successfully", "user_id" => $newId], 201);

         } elseif ($method === "PATCH") {
            if (!$id) {
               sendError("User ID is required for update", 400);
            }
            // Verify existence
            $check = $pdo->prepare("SELECT user_id FROM users_tb WHERE user_id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
               sendError("User not found", 404);
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
               sendError("No valid fields provided for update", 400);
            }

            $params['id'] = $id;
            $sql = "UPDATE users_tb SET " . implode(', ', $fieldsToUpdate) . " WHERE user_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            sendResponse(["message" => "User updated successfully", "user_id" => $id]);

         } elseif ($method === "DELETE") {
            if (!$id) {
               sendError("User ID is required for deletion", 400);
            }
            // Verify existence
            $check = $pdo->prepare("SELECT user_id FROM users_tb WHERE user_id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
               sendError("User not found", 404);
            }

            $stmt = $pdo->prepare("DELETE FROM users_tb WHERE user_id = :id");
            $stmt->execute(['id' => $id]);
            sendResponse(["message" => "User deleted successfully", "user_id" => $id]);

         } else {
            sendError("Method not allowed", 405);
         }
         break;

      // ==========================================
      // 🛒 ORDERS RESOURCE
      // ==========================================

      case "orders":
         if ($method === "GET") {
            if ($id) {
               $stmt = $pdo->prepare("SELECT * FROM orders_tb WHERE order_id = :id");
               $stmt->execute(['id' => $id]);
               $order = $stmt->fetch(PDO::FETCH_ASSOC);
               if ($order) {
                  sendResponse($order);
               } else {
                  sendError("Order not found", 404);
               }
            } else {
               $stmt = $pdo->prepare("SELECT * FROM orders_tb");
               $stmt->execute();
               $order_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

               // Notice the & before $row
               foreach ($order_data as &$row) {
                  $row['order_items'] = json_decode($row['order_items'], true);
               }
               // Good practice: unset the reference after the loop
               unset($row);
               sendResponse($order_data);
            }
         } elseif ($method === "POST") {
            if (empty($input['product_name']) || !isset($input['product_price']) || !isset($input['amount_product']) || empty($input['user_name'])) {
               sendError("Missing required fields: product_name, product_price, amount_product, user_name", 400);
            }
            $stmt = $pdo->prepare("INSERT INTO orders_tb (product_name, product_img_src, product_price, amount_product, user_name, status, bill_img_src, date_success, user_address, express_with) VALUES (:product_name, :product_img_src, :product_price, :amount_product, :user_name, :status, :bill_img_src, :date_success, :user_address, :express_with)");
            $stmt->execute([
               'product_name' => $input['product_name'],
               'product_img_src' => $input['product_img_src'] ?? null,
               'product_price' => $input['product_price'],
               'amount_product' => $input['amount_product'],
               'user_name' => $input['user_name'],
               'status' => $input['status'] ?? 'Pending',
               'bill_img_src' => $input['bill_img_src'] ?? null,
               'date_success' => $input['date_success'] ?? null,
               'user_address' => $input['user_address'] ?? null,
               'express_with' => $input['express_with'] ?? null
            ]);
            $newId = $pdo->lastInsertId();
            sendResponse(["message" => "Order created successfully", "order_id" => $newId], 201);

         } elseif ($method === "PATCH") {
            if (!$id && isset($input['order_id'])) {
               $id = (int) $input['order_id'];
            }

            if (!$id) {
               sendError("Order ID is required for update", 400);
            }
            // Verify existence
            $check = $pdo->prepare("SELECT order_id FROM orders_tb WHERE order_id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
               sendError("Order not found", 404);
            }

            $allowedFields = ['product_name', 'product_img_src','order_status', 'product_price', 'amount_product', 'user_name', 'bill_status', 'bill_img_src', 'date_order', 'date_success', 'user_address', 'express_with'];
            $fieldsToUpdate = [];
            $params = [];
            foreach ($allowedFields as $field) {
               if (array_key_exists($field, $input)) {
                  $fieldsToUpdate[] = "`$field` = :$field";
                  $params[$field] = $input[$field];
               }
            }

            if (empty($fieldsToUpdate)) {
               sendError("No valid fields provided for update", 400);
            }

            $params['id'] = $id;
            $sql = "UPDATE orders_tb SET " . implode(', ', $fieldsToUpdate) . " WHERE order_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            sendResponse(["message" => "Order updated successfully", "order_id" => $id]);

         } elseif ($method === "DELETE") {
            if (!$id) {
               sendError("Order ID is required for deletion", 400);
            }
            // Verify existence
            $check = $pdo->prepare("SELECT order_id FROM orders_tb WHERE order_id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
               sendError("Order not found", 404);
            }

            $stmt = $pdo->prepare("DELETE FROM orders_tb WHERE order_id = :id");
            $stmt->execute(['id' => $id]);
            sendResponse(["message" => "Order deleted successfully", "order_id" => $id]);

         } else {
            sendError("Method not allowed", 405);
         }
         break;

      // ==========================================
      // 🏷️ PROMOTIONS RESOURCE
      // ==========================================

      case "promotions":
         if ($method === "GET") {
            if ($id) {
               $stmt = $pdo->prepare("SELECT * FROM promotion_tb WHERE pro_id = :id");
               $stmt->execute(['id' => $id]);
               $promo = $stmt->fetch(PDO::FETCH_ASSOC);
               if ($promo) {
                  sendResponse($promo);
               } else {
                  sendError("Promotion not found", 404);
               }
            } else {
               $stmt = $pdo->prepare("SELECT * FROM promotion_tb");
               $stmt->execute();
               $promo_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
               sendResponse($promo_data);
            }
         } elseif ($method === "POST") {
            if (!isset($input['discount'])) {
               sendError("Missing required field: discount", 400);
            }
            $stmt = $pdo->prepare("INSERT INTO promotion_tb (title, discount, start_date, update_date, end_date) VALUES (:title, :discount, :start_date, :update_date, :end_date)");
            $stmt->execute([
               'title' => $input['title'] ?? null,
               'discount' => $input['discount'],
               'start_date' => $input['start_date'] ?? null,
               'update_date' => date('Y-m-d H:i:s'),
               'end_date' => $input['end_date'] ?? null
            ]);
            $newId = $pdo->lastInsertId();
            sendResponse(["message" => "Promotion created successfully", "pro_id" => $newId], 201);

         } elseif ($method === "PATCH" || $method === "PUT") {
            if (!$id && isset($input['id'])) {
               $id = (int) $input['id'];
            }

            if (!$id) {
               sendError("Promotion ID is required for update", 400);
            }
            
            // Verify existence
            $check = $pdo->prepare("SELECT pro_id FROM promotion_tb WHERE pro_id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
               sendError("Promotion not found", 404);
            }

            $allowedFields = ['title', 'discount', 'start_date', 'update_date', 'end_date'];
            $fieldsToUpdate = [];
            $params = [];
            foreach ($allowedFields as $field) {
               if (array_key_exists($field, $input)) {
                  $fieldsToUpdate[] = "`$field` = :$field";
                  $params[$field] = $input[$field];
               }
            }

            if (empty($fieldsToUpdate)) {
               sendError("No valid fields provided for update", 400);
            }

            $params['id'] = $id;
            $sql = "UPDATE promotion_tb SET " . implode(', ', $fieldsToUpdate) . " WHERE pro_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            sendResponse(["message" => "Promotion updated successfully", "pro_id" => $id]);

         } elseif ($method === "DELETE") {
            if (!$id) {
               sendError("Promotion ID is required for deletion", 400);
            }
            // Verify existence
            $check = $pdo->prepare("SELECT pro_id FROM promotion_tb WHERE pro_id = :id");
            $check->execute(['id' => $id]);
            if (!$check->fetch()) {
               sendError("Promotion not found", 404);
            }

            $stmt = $pdo->prepare("DELETE FROM promotion_tb WHERE pro_id = :id");
            $stmt->execute(['id' => $id]);
            sendResponse(["message" => "Promotion deleted successfully", "pro_id" => $id]);

         } else {
            sendError("Method not allowed", 405);
         }
         break;

      default:
         sendError("Route not found", 404);
         break;
   }

} catch (PDOException $e) {
   // Professional, secure database exception wrapper
   sendError("Database service exception: " . $e->getMessage(), 500);
} catch (Exception $e) {
   // Standard system exception wrapper
   sendError("Internal system server error: " . $e->getMessage(), 500);
}
?>