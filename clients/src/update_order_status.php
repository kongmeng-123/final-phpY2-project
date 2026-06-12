<?php
session_start();
require_once __DIR__ . '/../../api/db_config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = intval($_POST['order_id'] ?? 0);
    $newStatus = $_POST['status'] ?? 'Success';

    if ($orderId > 0) {
        try {
            // Verify the order belongs to the user and is in 'shipping' or 'pending' status
            $stmt = $pdo->prepare("UPDATE orders_tb SET status = ?, date_success = NOW() WHERE order_id = ? AND user_name = ? AND (status = 'Shipping' OR status = 'Pending')");
            $stmt->execute([$newStatus, $orderId, $_SESSION['user_name']]);

            if ($stmt->rowCount() > 0) {
                echo json_encode(['success' => true, 'message' => 'Order updated successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Order not found or already confirmed.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid order ID.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
