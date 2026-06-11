<?php
require_once "../../api/db_config.php";

try {
    // Join with users to get the customer name and other details
    $stmt = $pdo->query("
        SELECT o.*, u.fullname 
        FROM orders o 
        LEFT JOIN users u ON o.user_id = u.id 
        ORDER BY o.created_at DESC
    ");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $orders = [];
    $error = $e->getMessage();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport" />
    <title>G-Book Admin - All Orders</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
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
            <div class="sidebar-heading">Management</div>
            <li class="nav-item active">
                <a class="nav-link" href="allOrder.php"><i class="fas fa-fw fa-shopping-cart"></i><span>Orders</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allProduct.php"><i class="fas fa-fw fa-box"></i><span>Products</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="customerInfor.php"><i class="fas fa-fw fa-users"></i><span>Customers</span></a>
            </li>
            <hr class="d-none d-md-block sidebar-divider" />
            <div class="d-none d-md-inline text-center">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- Topbar -->
                <nav class="bg-white mb-4 navbar navbar-expand navbar-light shadow static-top topbar">
                    <button class="mr-3 btn btn-link d-md-none rounded-circle" id="sidebarToggleTop"><i class="fa fa-bars"></i></button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown">
                                <span class="small d-lg-inline d-none mr-2 text-gray-600">Admin User</span>
                                <img class="rounded-circle img-profile" src="../img/undraw_profile.svg" />
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">All Orders</h1>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <div class="shadow mb-4 card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table cellspacing="0" class="table table-bordered" id="dataTable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Customer</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Slip</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $order): ?>
                                            <tr>
                                                <td>#<?php echo str_pad($order['id'], 4, '0', STR_PAD_LEFT); ?></td>
                                                <td><?php echo date('Y-m-d H:i', strtotime($order['created_at'])); ?></td>
                                                <td><?php echo htmlspecialchars($order['fullname'] ?? 'Guest'); ?></td>
                                                <td class="font-weight-bold">₭<?php echo number_format($order['total_price']); ?></td>
                                                <td>
                                                    <?php
                                                    $status = $order['status'];
                                                    $badgeClass = 'secondary';
                                                    if ($status === 'Pending Payment') $badgeClass = 'warning';
                                                    elseif ($status === 'Payment Verified') $badgeClass = 'primary';
                                                    elseif ($status === 'Shipping') $badgeClass = 'info';
                                                    elseif ($status === 'Delivered') $badgeClass = 'success';
                                                    elseif ($status === 'Cancelled') $badgeClass = 'danger';
                                                    ?>
                                                    <span class="badge badge-<?php echo $badgeClass; ?>"><?php echo $status; ?></span>
                                                </td>
                                                <td>
                                                    <?php if ($order['payment_slip']): ?>
                                                        <a href="../img/<?php echo $order['payment_slip']; ?>" target="_blank">
                                                            <img src="../img/<?php echo $order['payment_slip']; ?>" height="50" class="rounded">
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="text-muted small">No Slip</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="orderDetail.php?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-primary">Details</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="my-auto container"><div class="my-auto copyright text-center"><span>Copyright © G-Book Shop 2024</span></div></div>
            </footer>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>$(document).ready(function() { $('#dataTable').DataTable(); });</script>
</body>
</html>