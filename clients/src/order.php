<?php
session_start();
require_once __DIR__ . '/../../api/db_config.php';

$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'] : '';

try {
    // Fetch all orders sorted by date
    $stmt = $pdo->prepare("SELECT * FROM orders_tb ORDER BY date_order DESC, order_id DESC");
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $orders = [];
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - E-book Shop</title>
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Inter & Outfit -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg-soft: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --glass: rgba(255, 255, 255, 0.8);
        }

        body {
            background-color: var(--bg-soft);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, .fw-outfit {
            font-family: 'Outfit', sans-serif;
        }

        .navbar {
            background: var(--glass) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
        }

        .order-card {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);
        }

        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        .product-img-wrapper {
            width: 80px;
            height: 110px;
            background: #f1f5f9;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e2e8f0;
        }

        .product-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .empty-state {
            padding: 5rem 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand fw-bold text-primary fs-3" href="index.php">
                E-book
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links and Actions -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Product.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold text-primary" href="order.php">Order</a>
                    </li>
                </ul>

                <!-- Actions -->
                <div class="d-flex gap-2 align-items-center">
                    <?php if ($isLoggedIn): ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-primary rounded-pill px-3 dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i> <?php echo htmlspecialchars($userName); ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item py-2 text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <button class="btn btn-outline-primary rounded-pill px-3" type="button" onclick="location.href='signup.php'">Sign Up</button>
                        <button class="btn btn-primary rounded-pill px-3" type="button" onclick="location.href='login.php'">Login</button>
                    <?php endif; ?>
                    <button class="btn btn-primary rounded-pill px-3 position-relative" type="button" onclick="location.href='Cart.php'">
                        <i class="bi bi-cart3 me-1"></i> Cart
                        <span id="cart-count-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="display: none;">0</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="container my-5" style="max-width: 960px;">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h1 class="display-6 fw-bold mb-1">Your Orders</h1>
                <p class="text-muted mb-0">Track status and review your purchase history</p>
            </div>
            <button class="btn btn-light border rounded-pill px-3 py-1.5 text-muted small" onclick="location.reload()">
                <i class="bi bi-arrow-clockwise me-1"></i> Refresh
            </button>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger rounded-4 p-3 mb-4" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>
                Failed to load orders: <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <?php if (empty($orders)): ?>
            <div class="empty-state card border-0 shadow-sm rounded-4 p-5">
                <i class="bi bi-journal-x fs-1 text-muted mb-3 d-block"></i>
                <h4 class="fw-bold">No orders found</h4>
                <p class="text-muted mb-4">Looks like you haven't ordered anything yet.</p>
                <button class="btn btn-primary rounded-pill px-4 py-2" onclick="location.href='Product.php'">
                    Start Shopping
                </button>
            </div>
        <?php else: ?>
            <div class="d-flex flex-column gap-4">
                <?php foreach ($orders as $order): ?>
                    <div class="card order-card border-0">
                        <!-- Card Header -->
                        <div class="card-header bg-light border-0 py-3 px-4 d-flex flex-wrap justify-content-between align-items-center gap-2">
                            <div class="d-flex align-items-center gap-3">
                                <span class="fw-bold font-outfit text-dark">Order #<?php echo str_pad($order['order_id'], 4, '0', STR_PAD_LEFT); ?></span>
                                <span class="text-muted small"><i class="bi bi-clock me-1"></i><?php echo date('M d, Y h:i A', strtotime($order['date_order'])); ?></span>
                            </div>
                            <div>
                                <?php
                                $status = strtolower($order['status'] ?? 'pending');
                                $badgeClass = 'bg-warning text-dark';
                                if ($status === 'success') {
                                    $badgeClass = 'bg-success text-white';
                                } elseif ($status === 'shipping') {
                                    $badgeClass = 'bg-info text-white';
                                } elseif ($status === 'cancelled') {
                                    $badgeClass = 'bg-danger text-white';
                                }
                                ?>
                                <span class="badge rounded-pill <?php echo $badgeClass; ?> px-3 py-2 fw-semibold text-uppercase" style="font-size: 0.75rem;">
                                    <?php echo htmlspecialchars($order['status']); ?>
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4">
                            <div class="row g-4 align-items-center">
                                <!-- Image -->
                                <div class="col-auto">
                                    <div class="product-img-wrapper">
                                        <?php
                                        // Product image path checking inside admin img folder
                                        $imgName = $order['product_img_src'];
                                        $imgPath = '../../admin_dashboard/img/' . $imgName;
                                        ?>
                                        <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="<?php echo htmlspecialchars($order['product_name']); ?>" onerror="this.src='https://placehold.co/80x110/6366f1/ffffff?text=Book'">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col">
                                    <h5 class="fw-bold text-dark mb-2"><?php echo htmlspecialchars($order['product_name']); ?></h5>
                                    <p class="text-muted small mb-1">Price: <span class="text-dark fw-semibold">₭<?php echo number_format($order['product_price'], 2); ?></span></p>
                                    <p class="text-muted small mb-0">Quantity: <span class="text-dark fw-semibold"><?php echo intval($order['amount_product']); ?></span></p>
                                </div>

                                <!-- Shipping info -->
                                <div class="col-md-4 border-start ps-md-4">
                                    <p class="mb-1 text-muted small"><i class="bi bi-person me-1"></i> <strong>Name:</strong> <?php echo htmlspecialchars($order['user_name']); ?></p>
                                    <p class="mb-1 text-muted small"><i class="bi bi-truck me-1"></i> <strong>Carrier:</strong> <?php echo htmlspecialchars($order['express_with'] ?? 'Not selected'); ?></p>
                                    <p class="mb-0 text-muted small"><i class="bi bi-geo-alt me-1"></i> <strong>Address:</strong> <?php echo htmlspecialchars($order['user_address'] ?? 'Not provided'); ?></p>
                                </div>

                                <!-- Price total & receipt upload -->
                                <div class="col-md-2 text-md-end">
                                    <div class="mb-2">
                                        <small class="text-muted d-block">Total Cost</small>
                                        <span class="fw-bold fs-4 text-primary font-outfit">₭<?php echo number_format($order['product_price'] * $order['amount_product'], 2); ?></span>
                                    </div>
                                    <?php if (!empty($order['bill_img_src'])): ?>
                                        <a href="../../admin_dashboard/img/<?php echo htmlspecialchars($order['bill_img_src']); ?>" target="_blank" class="btn btn-sm btn-light border rounded-pill px-3 py-1.5 small font-outfit">
                                            <i class="bi bi-receipt me-1"></i> View Slip
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <!-- Script to maintain navbar Cart badge -->
    <script>
        const CART_KEY = 'nuol_cart';

        function getCart() {
            return JSON.parse(localStorage.getItem(CART_KEY) || '[]');
        }

        function updateCartCount() {
            const cart = getCart();
            const count = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.getElementById('cart-count-badge');
            if (badge) {
                badge.textContent = count;
                badge.style.display = count > 0 ? 'inline-block' : 'none';
            }
        }

        window.onload = updateCartCount;
    </script>
</body>

</html>