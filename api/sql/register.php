<?php
/**
 * Standalone User Registration API Endpoint
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

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid email format"]);
        exit();
    }

    if (strlen($password) < 6) {
        http_response_code(400);
        echo json_encode(["error" => "Password must be at least 6 characters long"]);
        exit();
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
        http_response_code(400);
        echo json_encode(["error" => "First name or Username is required"]);
        exit();
    }

    $gender = $input['gender'] ?? 'Unspecified';
    $phoneNumber = $input['phoneNumber'] ?? null;

    // Check if email already exists in users table
    $checkEmail = $pdo->prepare("SELECT user_id FROM users_tb WHERE email = :email");
    $checkEmail->execute(['email' => $email]);
    if ($checkEmail->fetch()) {
        http_response_code(409);
        echo json_encode(["error" => "Email is already registered"]);
        exit();
    }

    // Securely hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users_tb (Fname, Lname, gender, email, password, phoneNumber) VALUES (:Fname, :Lname, :gender, :email, :password, :phoneNumber)");
    $stmt->execute([
        'Fname'       => $fname,
        'Lname'       => $lname,
        'gender'      => $gender,
        'email'       => $email,
        'password'    => $hashedPassword,
        'phoneNumber' => $phoneNumber
    ]);

    $newUserId = $pdo->lastInsertId();
    
    http_response_code(201);
    echo json_encode([
        "message" => "User registered successfully",
        "user_id" => $newUserId
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Server error: " . $e->getMessage()]);
}
?>
