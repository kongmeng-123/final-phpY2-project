<?php
session_start();
require_once __DIR__ . '/../../api/db_config.php';

$search = trim($_GET['q'] ?? '');

try {
    if ($search !== '') {
        $stmt = $pdo->prepare("SELECT * FROM products_tb WHERE product_name LIKE :q OR category LIKE :q ORDER BY id ASC");
        $stmt->execute([':q' => '%' . $search . '%']);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM products_tb ORDER BY id ASC");
        $stmt->execute();
    }
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $products = [];
    $dbError  = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books – E-Book Shop</title>
    <meta name="description" content="Browse all available books in our store. Filter by title, category, or price.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        :root { --primary: #6366f1; --primary-dark: #4f46e5; }
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }
        h1,h2,h3,h4,h5,h6,.font-outfit { font-family: 'Outfit', sans-serif; }

        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid #e2e8f0;
        }

        /* ─── Book card ─── */
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
            box-shadow: 0 12px 28px rgba(99,102,241,0.15);
        }
        .book-img-wrap {
            width: 100%; height: 210px;
            background: #f1f5f9; overflow: hidden;
            display: flex; align-items: center; justify-content: center;
        }
        .book-img-wrap img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 0.3s ease;
        }
        .book-card:hover .book-img-wrap img { transform: scale(1.04); }

        .badge-cat {
            font-size: 0.64rem; letter-spacing: 0.7px; text-transform: uppercase;
            font-weight: 700; color: var(--primary); background: #eef2ff;
            padding: 3px 10px; border-radius: 999px; display: inline-block; margin-bottom: 6px;
        }
        .btn-cart {
            background: var(--primary); color: white; border: none;
            border-radius: 10px; font-weight: 600; font-size: 0.82rem;
            padding: 7px 13px; transition: background 0.2s ease, transform 0.15s ease;
            white-space: nowrap;
        }
        .btn-cart:hover:not(:disabled) { background: var(--primary-dark); transform: translateY(-1px); color: white; }
        .btn-cart:disabled { background: #cbd5e1; cursor: not-allowed; }

        /* ─── Offcanvas cart ─── */
        .cart-item-row {
            display: flex; align-items: center; gap: 12px;
            padding: 10px; background: #f8fafc; border-radius: 14px; margin-bottom: 10px;
        }
        .cart-item-img { width: 46px; height: 56px; object-fit: cover; border-radius: 8px; flex-shrink: 0; }
        .btn-checkout-cart {
            background: var(--primary); color: white; border: none;
            border-radius: 14px; font-weight: 700; width: 100%; padding: 13px;
            font-size: 1rem; transition: background 0.2s ease;
        }
        .btn-checkout-cart:hover { background: var(--primary-dark); color: white; }

        footer a { transition: color 0.2s; }
        footer a:hover { color: var(--primary) !important; }

        @media (max-width: 575px) {
            .book-img-wrap { height: 170px; }
            .search-form { flex-direction: column; gap: 8px; }
        }
    </style>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3 text-primary font-outfit" href="index.php">📚 E-Book</a>

        <button class="navbar-toggler border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link fw-semibold text-primary" href="Product.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">My Orders</a></li>
            </ul>
            <div class="d-flex gap-2 align-items-center mt-2 mt-lg-0">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary rounded-pill px-3 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 mt-2">
                            <li><a class="dropdown-item py-2" href="order.php"><i class="bi bi-bag-check me-2"></i>My Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item py-2 text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Sign Out</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <button class="btn btn-outline-secondary rounded-pill px-3" onclick="location.href='signup.php'">Sign Up</button>
                    <button class="btn btn-primary rounded-pill px-3" onclick="location.href='login.php'">Sign In</button>
                <?php endif; ?>
                <button class="btn btn-primary rounded-pill px-3 position-relative"
                        data-bs-toggle="offcanvas" data-bs-target="#cartSidebar">
                    <i class="bi bi-cart3 me-1"></i> Cart
                    <span id="cart-count-badge"
                          class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                          style="display:none; font-size:0.65rem;">0</span>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- ═══ PAGE HEADER + SEARCH ═══ -->
<div class="bg-white border-bottom py-4">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-12 col-md-6">
                <p class="text-primary fw-bold text-uppercase small mb-1" style="letter-spacing:1px;">Products</p>
                <h1 class="fw-bold fs-2 mb-0 font-outfit">All Books</h1>
            </div>
            <div class="col-12 col-md-6">
                <form method="GET" action="Product.php" class="d-flex gap-2 search-form">
                    <input class="form-control rounded-pill shadow-none border-2"
                           type="search" name="q"
                           placeholder="Search books or category…"
                           value="<?php echo htmlspecialchars($search); ?>"
                           aria-label="Search books">
                    <button class="btn btn-primary rounded-pill px-3 fw-semibold" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                    <?php if ($search): ?>
                        <a href="Product.php" class="btn btn-outline-secondary rounded-pill px-3">Clear</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <?php if ($search): ?>
            <p class="text-muted small mt-3 mb-0">
                Showing <strong><?php echo count($products); ?></strong> result(s) for "<em><?php echo htmlspecialchars($search); ?></em>"
            </p>
        <?php endif; ?>
    </div>
</div>

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
                <p class="small">Try a different search term or <a href="Product.php" class="text-primary">browse all books</a>.</p>
            </div>
        <?php else: ?>
            <?php foreach ($products as $p):
                // Fix: Use rawurlencode for %20 instead of + for spaces
                // Fix: Use relative path ../../ instead of absolute /
                $imgName = $p['image_src'] ?? '';
                $imgSrc = '../../admin_dashboard/img/' . rawurlencode($imgName);
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
                        <span class="badge-cat"><?php echo $cat; ?></span>
                        <h6 class="fw-bold mb-1" style="font-size:0.87rem; line-height:1.35;"><?php echo $name; ?></h6>
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
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="small fw-bold text-uppercase mb-3 text-primary" style="letter-spacing:1px;">Shop</h6>
                <ul class="list-unstyled text-secondary small">
                    <li class="mb-2"><a href="index.php" class="text-decoration-none text-reset">Home</a></li>
                    <li class="mb-2"><a href="Product.php" class="text-decoration-none text-reset">All Books</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <h6 class="small fw-bold text-uppercase mb-3 text-primary" style="letter-spacing:1px;">Account</h6>
                <ul class="list-unstyled text-secondary small">
                    <li class="mb-2"><a href="order.php" class="text-decoration-none text-reset">My Orders</a></li>
                    <li class="mb-2"><a href="Cart.php" class="text-decoration-none text-reset">My Cart</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <h6 class="small fw-bold text-uppercase mb-3 text-primary" style="letter-spacing:1px;">Connect</h6>
                <div class="d-flex gap-2 mb-3 flex-wrap">
                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle text-white"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle text-white"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-circle text-white"><i class="bi bi-tiktok"></i></a>
                </div>
                <p class="text-secondary small mb-0"><i class="bi bi-geo-alt me-2"></i>Vientiane, Laos PDR</p>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-secondary text-center small mb-0">© <?php echo date('Y'); ?> E-Book Shop. All rights reserved.</p>
    </div>
</footer>

<!-- ═══ CART OFFCANVAS ═══ -->
<div class="offcanvas offcanvas-end border-0 shadow" tabindex="-1" id="cartSidebar">
    <div class="offcanvas-header border-bottom px-4 py-3">
        <h5 class="offcanvas-title fw-bold font-outfit fs-4">
            <i class="bi bi-bag-heart text-primary me-2"></i>Your Bag
        </h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column px-4 py-3">
        <div class="flex-grow-1 overflow-auto" id="sidebar-cart-items"></div>
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

    function getCart()       { return JSON.parse(localStorage.getItem(CART_KEY) || '[]'); }
    function saveCart(cart)  { localStorage.setItem(CART_KEY, JSON.stringify(cart)); }

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
            container.innerHTML = `<div class="text-center py-5 text-muted">
                <i class="bi bi-cart-x fs-1 d-block mb-3 text-primary opacity-40"></i>
                <p class="fw-semibold mb-1">Your bag is empty</p><small>Add books to get started!</small></div>`;
            if (totalEl) totalEl.textContent = '₭0.00';
            return;
        }

        container.innerHTML = cart.map(item => `
            <div class="cart-item-row">
                <img class="cart-item-img" src="${item.img}" alt="${item.name}"
                     onerror="this.src='https://placehold.co/46x56/6366f1/ffffff?text=B'">
                <div class="flex-grow-1 min-w-0">
                    <p class="mb-0 fw-bold text-truncate" style="font-size:0.82rem;max-width:150px;">${item.name}</p>
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
        bootstrap.Offcanvas.getOrCreateInstance(document.getElementById('cartSidebar')).show();
    }

    document.querySelectorAll('.btn-add-cart').forEach(btn => {
        btn.addEventListener('click', () => addToCart({
            id:    btn.dataset.id,
            name:  btn.dataset.name,
            price: parseFloat(btn.dataset.price),
            qty:   1,
            img:   btn.dataset.img
        }));
    });

    updateCartBadge();
    renderSidebarCart();
</script>
</body>
</html>