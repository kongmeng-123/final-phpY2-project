<?php
/**
 * Professional Database Configuration - Docker Version
 */

// Since you are using Docker, the host is the service name 'db'
$host = 'db'; 
$port = '3306'; // Internal container port
$db   = 'final-project'; 
$user = 'root'; 
$pass = 'root_password'; // From docker-compose.yml

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    
    // Professional defaults
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // If we are here, something is wrong with the Docker containers
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode([
        "success" => false, 
        "error" => "DOCKER DATABASE ERROR: " . $e->getMessage(),
        "hint" => "Make sure the 'db' container is running. Try: 'docker-compose up -d'"
    ]);
    exit();
}
?>