<?php
$host = 'db'; // ชื่อ service จาก docker-compose
$db   = 'final-project';
$user = 'root';
$pass = 'root_password';

try {
    // สร้างการเชื่อมต่อ PDO
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    
    // ตั้งค่า Error Mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "<h1 style='color: red;'>❌ การเชื่อมต่อล้มเหลว</h1>";
    echo "Error: " . $e->getMessage();
}
?>