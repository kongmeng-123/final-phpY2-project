<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$userName = $isLoggedIn ? $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping-center</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .quantity-btn {
            width: 36px;
            height: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            background: #f1f5f9;
            border-radius: 8px;
        }

        .quantity-btn:hover {
            background: #e2e8f0;
        }

        .btn-buy {
            background: #2563eb;
            color: white;
            font-weight: 700;
            padding: 14px;
            border-radius: 12px;
            width: 100%;
        }

        .btn-buy:hover {
            background: #1d4ed8;
        }

        .sticky-box {
            position: sticky;
            top: 100px;
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
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <a class="nav-link" href="order.php">Order</a>
                        </li>
                    </ul>

                    <!-- Actions -->
                    <div class="d-flex gap-2 align-items-center ms-auto">
                        <?php if ($isLoggedIn): ?>
                            <span class="text-muted me-2 small fw-semibold"><i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($userName) ?></span>
                            <button class="btn btn-outline-danger rounded-pill px-3" type="button" onclick="location.href='logout.php'">Log Out</button>
                        <?php else: ?>
                            <button class="btn btn-outline-primary rounded-pill px-3" type="button" onclick="location.href='login.php'">Sign In</button>
                            <button class="btn btn-primary rounded-pill px-3" type="button" onclick="location.href='signup.php'">Sign Up</button>
                        <?php endif; ?>
                        <button class="btn btn-primary rounded-pill px-3 position-relative" type="button" onclick="location.href='cart.php'">
                            <i class="bi bi-cart3 me-1"></i> Cart
                        </button>
                    </div>
                </div>
            </div>
        </nav>

<!-- MAIN -->
<main class="container py-5">

    <h2 class="fw-bold mb-4">Shopping Cart</h2>

    <div class="row g-4">

        <!-- CART ITEMS -->
        <div class="col-lg-8">
            <div id="cart-items-container"></div>
        </div>

        <!-- SUMMARY -->
        <div class="col-lg-4">

            <div class="bg-white p-4 rounded-3 shadow-sm sticky-box">

                <h5 class="fw-bold mb-3">Order Summary</h5>
                <p class="text-muted mb-3" id="cart-count">0 items in your bag</p>

                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal</span>
                    <span id="subtotal">₭0.00</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Tax</span>
                    <span id="tax">₭0.00</span>
                </div>

                <div class="d-flex justify-content-between border-top pt-2 mb-3">
                    <strong>Total</strong>
                    <strong id="total" class="text-primary">₭0.00</strong>
                </div>

                <button class="btn-buy" id="checkout-button">Buy Now</button>

                <button class="btn btn-light w-100 mt-2" onclick="location.href='Product.php'">
                    Continue Shopping
                </button>

            </div>

        </div>

    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const CART_KEY = 'nuol_cart';

    function getCart() {
        return JSON.parse(localStorage.getItem(CART_KEY) || '[]');
    }

    function saveCart(cart) {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));
    }

    function formatCurrency(value) {
        return `₭${value.toFixed(2)}`;
    }

    function updateSummary(cartItems) {
        const subtotal = cartItems.reduce((acc, item) => acc + item.price * item.qty, 0);
        const tax = subtotal * 0.08;
        const total = subtotal + tax;
        document.getElementById('subtotal').textContent = formatCurrency(subtotal);
        document.getElementById('tax').textContent = formatCurrency(tax);
        document.getElementById('total').textContent = formatCurrency(total);
        document.getElementById('cart-count').textContent = `${cartItems.reduce((sum, item) => sum + item.qty, 0)} item(s) in your bag`;
    }

    function renderCart() {
        const cartItems = getCart();
        const container = document.getElementById('cart-items-container');
        if (!cartItems.length) {
            container.innerHTML = `
                <div class="text-center py-5">
                    <i class="bi bi-cart-x fs-1 text-muted mb-3 d-block"></i>
                    <h4 class="fw-bold">Your cart is empty</h4>
                    <p class="text-muted">Add items from the product page to see them here.</p>
                </div>`;
            updateSummary([]);
            return;
        }

        container.innerHTML = cartItems.map(item => `
            <div class="card p-3 shadow-sm border-0 mb-3">
                <div class="d-flex align-items-center gap-3">
                    <img src="${item.img}" class="rounded" width="100" height="100" alt="${item.name}">
                    <div class="flex-grow-1">
                        <h5 class="fw-bold mb-1">${item.name}</h5>
                        <p class="text-muted small mb-2">$${item.price.toFixed(2)} per unit</p>
                        <div class="d-flex align-items-center gap-2">
                            <button class="quantity-btn" onclick="updateQty('${item.id}', -1)">-</button>
                            <span class="fw-bold">${item.qty}</span>
                            <button class="quantity-btn" onclick="updateQty('${item.id}', 1)">+</button>
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="fw-bold mb-2">${formatCurrency(item.price * item.qty)}</p>
                        <button class="btn btn-sm btn-light text-danger rounded-pill px-3" onclick="removeItem('${item.id}')">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </div>
                </div>
            </div>
        `).join('');

        updateSummary(cartItems);
    }

    function updateQty(id, delta) {
        const cart = getCart();
        const item = cart.find(i => i.id === id);
        if (!item) return;
        item.qty = Math.max(1, item.qty + delta);
        saveCart(cart);
        renderCart();
    }

    function removeItem(id) {
        const cart = getCart().filter(item => item.id !== id);
        saveCart(cart);
        renderCart();
    }

    function clearCart() {
        localStorage.removeItem(CART_KEY);
        renderCart();
    }

    function handleCheckout() {
        const cart = getCart();
        if (!cart.length) {
            alert('Your cart is empty.');
            return;
        }
        location.href = 'checkout.php';
    }

    document.getElementById('checkout-button').addEventListener('click', handleCheckout);
    window.addEventListener('DOMContentLoaded', renderCart);
</script>

</body>
</html>