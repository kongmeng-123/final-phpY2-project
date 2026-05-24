<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping-center</title>
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Inter & Outfit -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@600;700;800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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

        h1,
        h2,
        h3,
        .fw-outfit {
            font-family: 'Outfit', sans-serif;
        }

        .navbar {
            background: var(--glass) !important;
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 0;
        }

        .cart-card {
            background: #fff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 24px;
            padding: 2rem;
            transition: all 0.3s ease;
        }

        .product-row {
            display: grid;
            grid-template-columns: auto 1fr auto;
            gap: 1.5rem;
            align-items: center;
            padding: 1.5rem 0;
            border-bottom: 1px solid #f1f5f9;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .product-row:last-child {
            border-bottom: none;
        }

        .product-img-wrapper {
            width: 100px;
            height: 100px;
            background: #f1f5f9;
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .qty-control {
            display: flex;
            align-items: center;
            background: #f1f5f9;
            padding: 0.5rem;
            border-radius: 12px;
            gap: 1rem;
        }

        .btn-qty {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            border: none;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: all 0.2s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .btn-qty:hover {
            background: var(--primary);
            color: white;
        }

        .summary-card {
            background: var(--text-main);
            color: white;
            border-radius: 28px;
            padding: 2.5rem;
            position: sticky;
            top: 100px;
        }

        .btn-checkout {
            background: var(--primary);
            color: white;
            border: none;
            padding: 1.25rem;
            border-radius: 16px;
            width: 100%;
            font-weight: 600;
            margin-top: 1.5rem;
            transition: all 0.3s;
        }

        .btn-checkout:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        }

        .empty-cart-state {
            padding: 5rem 0;
            text-align: center;
        }

        .removed-item {
            opacity: 0;
            transform: translateX(-20px);
        }

        .add-btn {
            background: #e0e7ff;
            color: var(--primary);
            border: 2px dashed var(--primary);
            padding: 1rem;
            border-radius: 16px;
            width: 100%;
            font-weight: 600;
            margin-top: 2rem;
            transition: all 0.2s;
        }

        .add-btn:hover {
            background: #c7d2fe;
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
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
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
                <form class="d-flex gap-2" role="search" action="" method="get">
                    <input class="form-control me-2 rounded-pill" type="search" name="q" placeholder="Search..."
                        aria-label="Search">
                    <button class="btn btn-outline-primary btn-search" type="button" onclick="location.href='signup.php'">Sign Up</button>
                    <button class="btn btn-outline-primary btn-search" type="button" onclick="location.href='cart.php'">Cart</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="row g-5">
            <!-- Left: Cart Items -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-end mb-4">
                    <div>
                        <h1 class="display-6 fw-bold mb-1">Shopping Cart</h1>
                        <p class="text-muted mb-0" id="cart-count">3 items in your bag</p>
                    </div>
                    <button class="btn btn-link text-decoration-none text-muted" onclick="clearCart()">Clear
                        All</button>
                </div>

                <div class="cart-card">
                    <div id="cart-items-container">
                        <!-- Items injected by JavaScript -->
                    </div>

                    <button class="btn btn-primary text-white"> <a href="/product.php" class="text-white text-decoration-none text-center " > <i
                                class="bi bi-plus-circle me-2"></i>start shopping</a></button>
                </div>
            </div>

            <!-- Right: Order Summary -->
            <div class="col-lg-4">
                <div class="summary-card shadow-lg">
                    <h3 class="fw-bold mb-4">Summary</h3>

                    <div class="d-flex justify-content-between mb-3">
                        <span class="opacity-75">Subtotal</span>
                        <span id="subtotal" class="fw-bold">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="opacity-75">Shipping</span>
                        <span class="text-success fw-bold">Calculated at next step</span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="opacity-75">Tax (8%)</span>
                        <span id="tax" class="fw-bold">$0.00</span>
                    </div>

                    <hr class="opacity-25 my-4">

                    <div class="d-flex justify-content-between align-items-end mb-4">
                        <span class="fs-5">Total Prices</span>
                        <span id="total" class="fs-2 fw-bold text-primary">$0.00</span>
                    </div>

                    <div class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control bg-dark text-white border-secondary rounded-start-3"
                                placeholder="Promo Code">
                            <button class="btn btn-outline-light rounded-end-3 px-4">Apply</button>
                        </div>
                    </div>

                    <button class="btn-checkout" onclick="handleCheckout()">
                        comfire <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                    <div class="mt-4 text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" height="20"
                            class="mx-2 opacity-50" alt="PayPal">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" height="15"
                            class="mx-2 opacity-50" alt="Visa">
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        let cartItems = [
            { id: 1, name: 'Aether Pro Headphones', price: 249.99, qty: 1, img: 'https://placehold.co/100x100/6366f1/ffffff?text=Pro' },
            { id: 2, name: 'Wireless Charging Dock', price: 89.00, qty: 1, img: 'https://placehold.co/100x100/475569/ffffff?text=Dock' },
            { id: 3, name: 'Travel Hard Case', price: 45.50, qty: 2, img: 'https://placehold.co/100x100/0f172a/ffffff?text=Case' }
        ];

        function renderCart() {
            const container = document.getElementById('cart-items-container');
            const countText = document.getElementById('cart-count');

            if (cartItems.length === 0) {
                container.innerHTML = `
                    <div class="empty-cart-state">
                        <i class="bi bi-cart-x fs-1 text-muted mb-3 d-block"></i>
                        <h4 class="fw-bold">Your cart is empty</h4>
                        <p class="text-muted">Looks like you haven't added anything yet.</p>
                    </div>`;
                countText.innerText = '0 items in your bag';
                updateCalculations();
                return;
            }

            container.innerHTML = cartItems.map(item => `
                <div class="product-row" id="item-${item.id}">
                    <div class="product-img-wrapper">
                        <img src="${item.img}" alt="${item.name}">
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">${item.name}</h6>
                        <p class="text-muted small mb-2">$${item.price.toFixed(2)} per unit</p>
                        <div class="qty-control">
                            <button class="btn-qty" onclick="updateQty(${item.id}, -1)">-</button>
                            <span class="fw-bold small">${item.qty}</span>
                            <button class="btn-qty" onclick="updateQty(${item.id}, 1)">+</button>
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="fw-bold mb-2">$${(item.price * item.qty).toFixed(2)}</p>
                        <button class="btn btn-sm btn-light text-danger rounded-pill px-3" onclick="removeItem(${item.id})">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </div>
            `).join('');

            countText.innerText = `${cartItems.length} item(s) in your bag`;
            updateCalculations();
        }

        function updateQty(id, delta) {
            const item = cartItems.find(i => i.id === id);
            if (item) {
                item.qty = Math.max(1, item.qty + delta);
                renderCart();
            }
        }

        function removeItem(id) {
            const el = document.getElementById(`item-${id}`);
            el.classList.add('removed-item');
            setTimeout(() => {
                cartItems = cartItems.filter(item => item.id !== id);
                renderCart();
            }, 300);
        }

        function addNewProduct() {
            const newId = Date.now();
            cartItems.push({
                id: newId,
                name: 'New Accessory Pack',
                price: 29.99,
                qty: 1,
                img: 'https://placehold.co/100x100/10b981/ffffff?text=New'
            });
            renderCart();
        }

        function clearCart() {
            cartItems = [];
            renderCart();
        }

        function updateCalculations() {
            const subtotal = cartItems.reduce((acc, item) => acc + (item.price * item.qty), 0);
            const tax = subtotal * 0.08;
            const total = subtotal + tax;

            document.getElementById('subtotal').innerText = `$${subtotal.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;
            document.getElementById('tax').innerText = `$${tax.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;
            document.getElementById('total').innerText = `$${total.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;
        }

        function handleCheckout() {
            if (cartItems.length === 0) return;
            // Modern feedback instead of alert
            const btn = document.querySelector('.btn-checkout');
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing Order...';
            btn.disabled = true;
            setTimeout(() => {
                location.reload(); // Simulate redirect to payment
            }, 1500);
        }

        window.onload = renderCart;
    </script>
</body>

</html>