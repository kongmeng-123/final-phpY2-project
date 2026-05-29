<?php
/**
 * Standalone User Login API Endpoint
 */

require_once "../db_config.php";

// Set core API response headers
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];

// Handle CORS preflight OPTIONS request
if ($method === "OPTIONS") {
    http_response_code(200);
    exit();
}

if ($method !== "POST") {
    http_response_code(405);
    echo json_encode(["error" => "Method not allowed. Only POST requests are supported."]);
    exit();
}

try {
    // Retrieve and parse raw JSON input payload
    $input = json_decode(file_get_contents('php://input'), true) ?? [];

    $email = isset($input['email']) ? trim($input['email']) : '';
    $password = $input['password'] ?? '';

    if (empty($email) || empty($password)) {
        http_response_code(400);
        echo json_encode(["error" => "Email and Password are required"]);
        exit();
    }

    // Fetch user record from database
    $stmt = $pdo->prepare("SELECT * FROM users_tb WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        http_response_code(401);
        echo json_encode(["error" => "Invalid email or password"]);
        exit();
    }

    // Check credentials: Supports secure hashed check and plaintext check for seed data
    $isPasswordCorrect = password_verify($password, $user['password']) || ($password === $user['password']);

    if (!$isPasswordCorrect) {
        http_response_code(401);
        echo json_encode(["error" => "Invalid email or password"]);
        exit();
    }

    // Remove sensitive password hash from client response for security
    unset($user['password']);

    http_response_code(200);
    echo json_encode([
        "message" => "Login successful",
        "user"    => $user
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Server error: " . $e->getMessage()]);
}
?>
