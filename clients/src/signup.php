<?php
session_start();
// signup.php - Professional Version
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - E-Book Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f3f4f6; min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Inter', sans-serif; }
        .auth-card { width: 100%; max-width: 400px; border-radius: 20px; background: #fff; box-shadow: 0 10px 25px rgba(0,0,0,0.05); overflow: hidden; }
        .auth-header { background: #6366f1; color: #fff; padding: 2rem; text-align: center; }
        .auth-body { padding: 2rem; }
        .btn-primary { background: #6366f1; border: none; padding: 12px; border-radius: 12px; font-weight: 600; transition: all 0.3s; }
        .btn-primary:hover { background: #4f46e5; transform: translateY(-1px); }
    </style>
</head>
<body>

<div class="auth-card">
    <div class="auth-header">
        <h2 class="fw-bold mb-0">Join Us</h2>
        <p class="mb-0 opacity-75">Create an account to start shopping</p>
    </div>
    <div class="auth-body">
        <div id="alert-container"></div>

        <form id="signupForm">
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">FULL NAME</label>
                <input type="text" id="fullname" class="form-control rounded-3" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">EMAIL ADDRESS</label>
                <input type="email" id="email" class="form-control rounded-3" placeholder="name@example.com" required>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold text-muted">PASSWORD</label>
                <input type="password" id="password" class="form-control rounded-3" placeholder="••••••••" minlength="6" required>
                <div class="form-text small text-muted">Min. 6 characters</div>
            </div>
            <button type="submit" id="signupBtn" class="btn btn-primary w-100 mb-3">
                <span id="btnText">Create Account</span>
                <span id="btnLoader" class="spinner-border spinner-border-sm d-none" role="status"></span>
            </button>
            <div class="text-center small text-muted">
                Already have an account? <a href="login.php" class="text-decoration-none fw-bold text-primary">Sign In</a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('signupForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const fullname = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const alertContainer = document.getElementById('alert-container');
    const signupBtn = document.getElementById('signupBtn');
    const btnText = document.getElementById('btnText');
    const btnLoader = document.getElementById('btnLoader');

    // Reset UI
    alertContainer.innerHTML = '';
    signupBtn.disabled = true;
    btnText.classList.add('d-none');
    btnLoader.classList.remove('d-none');

    try {
        const response = await fetch('../../api/api.php/register', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ fullname, email, password })
        });

        const result = await response.json();

        if (result.success) {
            window.location.href = 'login.php?registered=true';
        } else {
            throw new Error(result.error || 'Registration failed');
        }

    } catch (error) {
        alertContainer.innerHTML = `<div class="alert alert-danger small py-2">${error.message}</div>`;
        signupBtn.disabled = false;
        btnText.classList.remove('d-none');
        btnLoader.classList.add('d-none');
    }
});
</script>

</body>
</html>