<?php
require_once "../../api/db_config.php";

$orderId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$order = null;
$items = [];

if ($orderId > 0) {
    try {
        // 1. Fetch Order with joined information
        $stmt = $pdo->prepare("
            SELECT o.*, u.fullname, u.email, u.phone, 
                   e.name as express_name, m.name as payment_name 
            FROM orders o 
            LEFT JOIN users u ON o.user_id = u.id 
            LEFT JOIN express_services e ON o.express_service_id = e.id
            LEFT JOIN payment_methods m ON o.payment_method_id = m.id
            WHERE o.id = ?
        ");
        $stmt->execute([$orderId]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($order) {
            // 2. Fetch Order Items
            $itemStmt = $pdo->prepare("
                SELECT oi.*, p.name as product_name, p.image_url 
                FROM order_items oi 
                JOIN products p ON oi.product_id = p.id 
                WHERE oi.order_id = ?
            ");
            $itemStmt->execute([$orderId]);
            $items = $itemStmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}

// Handle Status Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $newStatus = $_POST['status'];
    $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$newStatus, $orderId]);
    header("Location: orderDetail.php?id=" . $orderId . "&updated=1");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport" />
    <title>G-Book Admin - Order #<?php echo $orderId; ?></title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav accordion bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">
            <a class="align-items-center d-flex justify-content-center sidebar-brand" href="index.php">
                <div class="rotate-n-15 sidebar-brand-icon"><i class="fas fa-book"></i></div>
                <div class="mx-3 sidebar-brand-text">G-Book Admin</div>
            </a>
            <hr class="sidebar-divider my-0" />
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <hr class="sidebar-divider" />
            <li class="nav-item active"><a class="nav-link" href="allOrder.php"><i class="fas fa-fw fa-shopping-cart"></i><span>Orders</span></a></li>
            <li class="nav-item"><a class="nav-link" href="allProduct.php"><i class="fas fa-fw fa-box"></i><span>Products</span></a></li>
        </ul>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="bg-white mb-4 navbar navbar-expand navbar-light shadow static-top topbar">
                    <button class="mr-3 btn btn-link d-md-none rounded-circle" id="sidebarToggleTop"><i class="fa fa-bars"></i></button>
                    <div class="ml-auto px-4"><a href="allOrder.php" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back to Orders</a></div>
                </nav>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Order Detail #<?php echo str_pad($orderId, 4, '0', STR_PAD_LEFT); ?></h1>

                    <?php if (isset($_GET['updated'])): ?>
                        <div class="alert alert-success">Order status updated successfully.</div>
                    <?php endif; ?>

                    <?php if (!$order): ?>
                        <div class="alert alert-warning">Order not found.</div>
                    <?php else: ?>
                        <div class="row">
                            <!-- Customer & Info -->
                            <div class="col-lg-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Customer & Info</h6></div>
                                    <div class="card-body">
                                        <p><strong>Name:</strong> <?php echo htmlspecialchars($order['fullname']); ?></p>
                                        <p><strong>Email:</strong> <?php echo htmlspecialchars($order['email']); ?></p>
                                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($order['phone']); ?></p>
                                        <hr>
                                        <p><strong>Shipping:</strong> <?php echo htmlspecialchars($order['express_name']); ?></p>
                                        <p><strong>Payment:</strong> <?php echo htmlspecialchars($order['payment_name']); ?></p>
                                        <p><strong>Address:</strong><br><span class="text-muted small"><?php echo nl2br(htmlspecialchars($order['shipping_address'])); ?></span></p>
                                    </div>
                                </div>

                                <!-- Status Control -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Order Status</h6></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <select name="status" class="form-control">
                                                    <?php 
                                                    $statuses = ['Pending Payment', 'Payment Verified', 'Preparing Order', 'Shipping', 'Delivered', 'Cancelled'];
                                                    foreach ($statuses as $s) {
                                                        echo "<option value='$s' " . ($order['status'] === $s ? 'selected' : '') . ">$s</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" name="update_status" class="btn btn-primary btn-block">Update Status</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Products -->
                            <div class="col-lg-8">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Ordered Products</h6></div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                        <th>Qty</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($items as $item): ?>
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="../img/<?php echo $item['image_url']; ?>" width="40" class="mr-2 rounded" onerror="this.src='https://placehold.co/40x50?text=B'">
                                                                    <?php echo htmlspecialchars($item['product_name']); ?>
                                                                </div>
                                                            </td>
                                                            <td>₭<?php echo number_format($item['price_at_purchase']); ?></td>
                                                            <td><?php echo $item['quantity']; ?></td>
                                                            <td>₭<?php echo number_format($item['price_at_purchase'] * $item['quantity']); ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Grand Total</th>
                                                        <th class="text-primary fs-5">₭<?php echo number_format($order['total_price']); ?></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment Slip -->
                                <?php if ($order['payment_slip']): ?>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Payment Receipt</h6></div>
                                        <div class="card-body text-center">
                                            <img src="../img/<?php echo $order['payment_slip']; ?>" class="img-fluid rounded border" style="max-height: 500px;">
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <footer class="bg-white sticky-footer"><div class="container my-auto text-center copyright"><span>Copyright © G-Book Shop 2024</span></div></footer>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>