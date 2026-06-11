<?php
session_start();
// Cart.php – Shopping Cart Page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart - E-Book Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f8fafc; }
        .card { border-radius: 15px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .btn-checkout { background: #6366f1; color: white; border: none; border-radius: 12px; font-weight: 700; padding: 14px; }
        .btn-checkout:hover { background: #4f46e5; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary fs-3" href="index.php">📚 E-Book</a>
        <div class="ms-auto">
            <a href="index.php" class="btn btn-light rounded-pill px-3">Continue Shopping</a>
        </div>
    </div>
</nav>

<main class="container py-5">
    <h2 class="fw-bold mb-4">Shopping Cart</h2>
    <div class="row g-4">
        <div class="col-lg-8">
            <div id="cart-container">
                <!-- Loaded by JS -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card p-4 sticky-top" style="top: 100px;">
                <h5 class="fw-bold mb-4">Order Summary</h5>
                <div class="d-flex justify-content-between mb-2 text-muted">
                    <span>Subtotal</span>
                    <span id="subtotal">₭0</span>
                </div>
                <div class="d-flex justify-content-between mb-3 fw-bold fs-5 pt-3 border-top">
                    <span>Total</span>
                    <span id="total" class="text-primary">₭0</span>
                </div>
                <button class="btn btn-checkout w-100 mt-3" onclick="proceedToCheckout()">Proceed to Checkout</button>
            </div>
        </div>
    </div>
</main>

<script>
const CART_KEY = 'nuol_cart';

function getCart() { return JSON.parse(localStorage.getItem(CART_KEY) || '[]'); }
function saveCart(cart) { localStorage.setItem(CART_KEY, JSON.stringify(cart)); renderCart(); }

function renderCart() {
    const cart = getCart();
    const container = document.getElementById('cart-container');
    
    if (cart.length === 0) {
        container.innerHTML = `
            <div class="text-center py-5">
                <i class="bi bi-cart-x fs-1 text-muted d-block mb-3"></i>
                <h4 class="fw-bold">Your cart is empty</h4>
                <p class="text-muted">Browse our collection and add some books!</p>
                <a href="Product.php" class="btn btn-primary rounded-pill mt-3 px-4">Browse Books</a>
            </div>`;
        document.getElementById('subtotal').innerText = '₭0';
        document.getElementById('total').innerText = '₭0';
        return;
    }

    container.innerHTML = cart.map(item => `
        <div class="card p-3 mb-3">
            <div class="d-flex align-items-center gap-3">
                <img src="${item.img}" class="rounded" width="80" height="110" style="object-fit: cover;" onerror="this.src='https://placehold.co/80x110?text=Book'">
                <div class="flex-grow-1">
                    <h6 class="fw-bold mb-1">${item.name}</h6>
                    <div class="text-primary fw-bold mb-2">₭${parseFloat(item.price).toLocaleString()}</div>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-sm btn-light border" onclick="updateQty('${item.id}', -1)">-</button>
                        <span class="fw-bold mx-2">${item.qty}</span>
                        <button class="btn btn-sm btn-light border" onclick="updateQty('${item.id}', 1)">+</button>
                    </div>
                </div>
                <button class="btn btn-sm text-danger" onclick="removeItem('${item.id}')">
                    <i class="bi bi-trash3 fs-5"></i>
                </button>
            </div>
        </div>
    `).join('');

    const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
    document.getElementById('subtotal').innerText = `₭${total.toLocaleString()}`;
    document.getElementById('total').innerText = `₭${total.toLocaleString()}`;
}

function updateQty(id, delta) {
    const cart = getCart();
    const item = cart.find(i => i.id === id);
    if (item) {
        item.qty = Math.max(1, item.qty + delta);
        saveCart(cart);
    }
}

function removeItem(id) {
    const cart = getCart().filter(i => i.id !== id);
    saveCart(cart);
}

function proceedToCheckout() {
    if (getCart().length === 0) {
        alert("Your cart is empty!");
        return;
    }
    location.href = 'checkout.php';
}

renderCart();
</script>
</body>
</html>