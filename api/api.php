<?php
require_once "db_config.php";
header("Content-Type: Application/json charset=UTF-8");
header("Access-Control-Allow-Origin: *");

 try{
    $path = isset($_SERVER['PATH_INFO']) ? trim($_SERVER['PATH_INFO'], '/') : '';
    $method = $_SERVER['REQUEST_METHOD'];
    switch($path){
      case "products":
         if($method === "GET"){
            $stmt = $pdo->prepare("SELECT * FROM products_tb");
            $stmt->execute();
            $product_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($product_data);
         }
         break;

      case "users":
         if($method === "GET"){
            $stmt = $pdo->prepare("SELECT * FROM users_tb");
            $stmt->execute();
            $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($user_data);

         }
         break;
      case "orders":
         if($method === "GET"){
            $stmt = $pdo->prepare("SELECT * FROM orders_tb");
            $stmt->execute();
            $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($user_data);

         }
         break;
      case "promotions":
         if($method === "GET"){
            $stmt = $pdo->prepare("SELECT * FROM promotion_tb");
            $stmt->execute();
            $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($user_data);

         }
         break;
      default:
         http_response_code(404);
         echo json_encode(['error'=>"Route not found"]);
         break;   
    }
    

 }catch(PDOException $e){
    http_response_code((500));
    echo json_encode(["error"=> $e ->getMessage()]);

 }
?>