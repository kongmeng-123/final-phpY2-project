<?php
require_once __DIR__ . '/../../api/db_config.php';

try {
    $stmt = $pdo->prepare("SELECT * FROM products_tb ORDER BY id ASC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $products = [];
    $dbError = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Book Shop – Bestseller Books</title>
    <meta name="description" content="Discover and buy the world's bestselling books online. Rich Dad Poor Dad, Mindset, Think and Grow Rich and more.">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --bg: #f8fafc;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
        }
        h1, h2, h3, h4, h5, h6, .font-outfit {
            font-family: 'Outfit', sans-serif;
        }
        /* Navbar */
        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #e2e8f0;
        }
        /* Book card */
        .book-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            background: #fff;
        }
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(99,102,241,0.14);
        }
        .book-img-wrap {
            width: 100%;
            height: 210px;
            background: #f1f5f9;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .book-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .book-card:hover .book-img-wrap img {
            transform: scale(1.04);
        }
        .badge-category {
            font-size: 0.65rem;
            letter-spacing: 0.7px;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--primary);
            background: #eef2ff;
            padding: 3px 10px;
            border-radius: 999px;
            display: inline-block;
            margin-bottom: 6px;
        }
        .btn-cart {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.83rem;
            padding: 7px 14px;
            transition: background 0.2s ease, transform 0.15s ease;
            white-space: nowrap;
        }
        .btn-cart:hover:not(:disabled) {
            background: var(--primary-dark);
            transform: translateY(-1px);
            color: white;
        }
        .btn-cart:disabled {
            background: #cbd5e1;
            cursor: not-allowed;
        }
        /* Hero */
        .hero-section {
            background: linear-gradient(135deg, #eef2ff 0%, #f8fafc 60%, #fdf4ff 100%);
            padding: 3.5rem 0 2rem;
            border-bottom: 1px solid #e2e8f0;
        }
        /* Offcanvas cart */
        .cart-item-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px;
            background: #f8fafc;
            border-radius: 14px;
            margin-bottom: 10px;
        }
        .cart-item-img {
            width: 48px;
            height: 58px;
            object-fit: cover;
            border-radius: 8px;
            background: #e2e8f0;
            flex-shrink: 0;
        }
        .btn-checkout-cart {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 14px;
            font-weight: 700;
            width: 100%;
            padding: 13px;
            font-size: 1rem;
            transition: background 0.2s ease;
        }
        .btn-checkout-cart:hover { background: var(--primary-dark); color: white; }

        /* Footer */
        footer a { transition: color 0.2s; }
        footer a:hover { color: var(--primary) !important; }

        /* Responsive tweaks */
        @media (max-width: 575px) {
            .hero-section { padding: 2rem 0 1.5rem; }
            .book-img-wrap { height: 180px; }
        }
    </style>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <!-- Brand Logo -->
                <a class="navbar-brand" href="/home">
                    <!-- <img src="./images/gemini.jpg" alt="Logo" width="30"
                        height="24" class="d-inline-block align-text-top me-2"> -->
                    E-book
                </a>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links and Actions -->
                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/product.php">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/order.php">Order</a>
                        </li>

                    </ul>

                    <!-- Search Bar -->
                    <form class="d-flex gap-2" role="search">
                        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search..."
                            aria-label="Search">
                        <!-- <button class="btn btn-outline-primary btn-search" type="submit">Search</button> -->
                        <button class="btn btn-outline-primary btn-search " type="submit">
                            <a href="./signup.php " class="text-decoration-none">SignUp</a>
                        </button>
                        <button class="btn btn-outline-primary btn-search " type="submit">
                            <a href="./cart.php" class="text-decoration-none">
                                Cart
                            </a>
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- ═══ HERO ═══ -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-12 col-md-8">
                <span class="badge-category mb-2">📖 Bestsellers</span>
                <h1 class="display-5 fw-bold text-dark mb-2">Explore Our Best Books</h1>
                <p class="text-muted mb-0 fs-6">
                    Curated bestsellers that change lives — from personal finance to mindset mastery.
                </p>
            </div>
            <div class="col-12 col-md-4 text-md-end">
                <a href="Product.php" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-semibold">
                    Browse All <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ═══ PRODUCTS GRID ═══ -->
<main class="container py-5">
    <?php if (isset($dbError)): ?>
        <div class="alert alert-warning rounded-4 mb-4">
            <i class="bi bi-exclamation-triangle me-2"></i>Could not load products: <?php echo htmlspecialchars($dbError); ?>
        </div>
    <?php endif; ?>

    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3 g-md-4">
        <?php if (empty($products)): ?>
            <div class="col-12 text-center py-5 text-muted">
                <i class="bi bi-journal-x fs-1 d-block mb-3 text-primary opacity-50"></i>
                <h5 class="fw-bold">No books found</h5>
                <p class="small">The bookstore will be restocked soon!</p>
            </div>
        <?php else: ?>
            <?php foreach ($products as $p):
                $imgSrc = '/admin_dashboard/img/' . urlencode($p['image_src'] ?? '');
                $pid    = 'p-' . $p['id'];
                $name   = htmlspecialchars($p['product_name']);
                $price  = number_format($p['price'], 2);
                $cat    = htmlspecialchars($p['category'] ?? 'Book');
                $stock  = intval($p['count']);
            ?>
            <div class="col">
                <div class="book-card h-100 d-flex flex-column">
                    <div class="book-img-wrap">
                        <img src="<?php echo $imgSrc; ?>"
                             alt="<?php echo $name; ?>"
                             loading="lazy"
                             onerror="this.src='https://placehold.co/300x210/6366f1/ffffff?text=Book'">
                    </div>
                    <div class="p-3 d-flex flex-column flex-grow-1">
                        <span class="badge-category"><?php echo $cat; ?></span>
                        <h6 class="fw-bold mb-1" style="font-size:0.88rem; line-height:1.35;"><?php echo $name; ?></h6>
                        <p class="text-muted mb-2 flex-grow-1" style="font-size:0.75rem;">
                            <?php echo $stock > 0
                                ? "<i class='bi bi-check-circle text-success me-1'></i>{$stock} in stock"
                                : "<span class='text-danger'><i class='bi bi-x-circle me-1'></i>Out of stock</span>"; ?>
                        </p>
                        <div class="d-flex align-items-center justify-content-between border-top pt-2 mt-auto flex-wrap gap-2">
                            <span class="fw-bold text-primary" style="font-size:0.95rem;">₭<?php echo $price; ?></span>
                            <button class="btn-cart btn-add-cart"
                                    data-id="<?php echo $pid; ?>"
                                    data-name="<?php echo $name; ?>"
                                    data-price="<?php echo $p['price']; ?>"
                                    data-img="<?php echo $imgSrc; ?>"
                                    <?php echo $stock <= 0 ? 'disabled' : ''; ?>>
                                <i class="bi bi-cart-plus me-1"></i><?php echo $stock > 0 ? 'Add' : 'Sold Out'; ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</main>

<!-- ═══ FOOTER ═══ -->
<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-12">
                <h5 class="fw-bold mb-3 font-outfit">📚 E-Book Shop</h5>
                <p class="text-secondary small mb-4">Your destination for bestselling books that inspire, educate, and transform lives.</p>
                <div class="input-group mb-3">
                    <input type="email" class="form-control bg-dark border-secondary text-white shadow-none"
                           placeholder="Enter your email">
                    <button class="btn btn-primary fw-bold" type="button">Join</button>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="small fw-bold text-uppercase mb-3 text-primary" style="letter-spacing:1px;">Shop</h6>
                <ul class="list-unstyled text-secondary small">
                    <li class="mb-2"><a href="Product.php" class="text-decoration-none text-reset">All Books</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Bestsellers</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-reset">New Arrivals</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="small fw-bold text-uppercase mb-3 text-primary" style="letter-spacing:1px;">Support</h6>
                <ul class="list-unstyled text-secondary small">
                    <li class="mb-2"><a href="order.php" class="text-decoration-none text-reset">My Orders</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Shipping Policy</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Help Center</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <h6 class="small fw-bold text-uppercase mb-3 text-primary" style="letter-spacing:1px;">Connect</h6>
                <div class="d-flex gap-2 mb-3 flex-wrap">
                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle text-white"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle text-white"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle text-white"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle text-white"><i class="bi bi-tiktok"></i></a>
                </div>
                <p class="text-secondary small mb-1"><i class="bi bi-envelope me-2"></i>hello@ebookshop.la</p>
                <p class="text-secondary small mb-0"><i class="bi bi-geo-alt me-2"></i>Vientiane, Laos PDR</p>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-secondary text-center small mb-0">© <?php echo date('Y'); ?> E-Book Shop. All rights reserved.</p>
    </div>
</footer>

<!-- ═══ CART SIDEBAR (OFFCANVAS) ═══ -->
<div class="offcanvas offcanvas-end border-0 shadow" tabindex="-1" id="cartSidebar">
    <div class="offcanvas-header border-bottom px-4 py-3">
        <h5 class="offcanvas-title fw-bold font-outfit fs-4">
            <i class="bi bi-bag-heart text-primary me-2"></i>Your Bag
        </h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column px-4 py-3">
        <div class="flex-grow-1 overflow-auto" id="sidebar-cart-items">
            <!-- Injected by JS -->
        </div>
        <div class="border-top pt-3 mt-2">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-semibold text-muted">Estimated Total</span>
                <span class="fw-bold fs-4 text-primary font-outfit" id="sidebar-cart-total">₭0.00</span>
            </div>
            <button class="btn-checkout-cart" onclick="location.href='checkout.php'">
                <i class="bi bi-lightning-fill me-2"></i>Proceed to Checkout
            </button>
            <button class="btn btn-light w-100 mt-2 rounded-3 border" onclick="location.href='Cart.php'">
                View Full Cart
            </button>
        </div>
    </div>
</div>

<!-- ═══ SCRIPTS ═══ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const CART_KEY = 'nuol_cart';

    function getCart() {
        return JSON.parse(localStorage.getItem(CART_KEY) || '[]');
    }
    function saveCart(cart) {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));
    }

    function updateCartBadge() {
        const count = getCart().reduce((s, i) => s + i.qty, 0);
        const badge = document.getElementById('cart-count-badge');
        if (!badge) return;
        badge.textContent = count;
        badge.style.display = count > 0 ? 'inline-block' : 'none';
    }

    function renderSidebarCart() {
        const cart = getCart();
        const container = document.getElementById('sidebar-cart-items');
        const totalEl   = document.getElementById('sidebar-cart-total');
        if (!container) return;

        if (!cart.length) {
            container.innerHTML = `
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-cart-x fs-1 d-block mb-3 text-primary opacity-40"></i>
                    <p class="fw-semibold mb-1">Your bag is empty</p>
                    <small>Add books to get started!</small>
                </div>`;
            if (totalEl) totalEl.textContent = '₭0.00';
            return;
        }

        container.innerHTML = cart.map(item => `
            <div class="cart-item-row">
                <img class="cart-item-img"
                     src="${item.img}"
                     alt="${item.name}"
                     onerror="this.src='https://placehold.co/48x58/6366f1/ffffff?text=B'">
                <div class="flex-grow-1 min-w-0">
                    <p class="mb-0 fw-bold text-truncate" style="font-size:0.82rem; max-width:150px;">${item.name}</p>
                    <p class="mb-0 text-muted" style="font-size:0.75rem;">${item.qty} × ₭${parseFloat(item.price).toFixed(2)}</p>
                </div>
                <button class="btn btn-sm text-danger border-0 p-1" onclick="removeCartItem('${item.id}')">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>`).join('');

        const total = cart.reduce((acc, i) => acc + i.price * i.qty, 0);
        if (totalEl) totalEl.textContent = `₭${total.toFixed(2)}`;
    }

    function removeCartItem(id) {
        saveCart(getCart().filter(i => i.id !== id));
        updateCartBadge();
        renderSidebarCart();
    }
    window.removeCartItem = removeCartItem;

    function addToCart(product) {
        const cart = getCart();
        const existing = cart.find(i => i.id === product.id);
        if (existing) { existing.qty++; } else { cart.push(product); }
        saveCart(cart);
        updateCartBadge();
        renderSidebarCart();
        const sidebar = document.getElementById('cartSidebar');
        if (sidebar) bootstrap.Offcanvas.getOrCreateInstance(sidebar).show();
    }

    // Bind "Add to Cart" buttons (data-attribute approach)
    document.querySelectorAll('.btn-add-cart').forEach(btn => {
        btn.addEventListener('click', () => {
            addToCart({
                id:    btn.dataset.id,
                name:  btn.dataset.name,
                price: parseFloat(btn.dataset.price),
                qty:   1,
                img:   btn.dataset.img
            });
        });
    });

    updateCartBadge();
    renderSidebarCart();
</script>
</body>
</html>