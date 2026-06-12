<?php
require_once __DIR__ . '/../../src/helpers.php';
require_once __DIR__ . '/../../api/db_config.php';

$errors = [];
$email = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '') {
        $errors['email'] = 'Email is required.';
    }
    if ($password === '') {
        $errors['password'] = 'Password is required.';
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users_tb WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user['password']) || $password === $user['password']) {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['user_fname'] = $user['Fname'];
                    $_SESSION['user_lname'] = $user['Lname'];
                    $_SESSION['user_name'] = $user['Fname'] . ' ' . $user['Lname'];

                    header("Location: order.php");
                    exit();
                } else {
                    $errors['password'] = 'Invalid password.';
                }
            } else {
                $errors['email'] = 'Email not found.';
            }
        } catch (PDOException $e) {
            $errors['db'] = 'Database error: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Outfit:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .login-card { background: white; border-radius: 24px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); width: 100%; max-width: 450px; overflow: hidden; }
        .login-header { background: #6366f1; color: white; padding: 40px 30px; text-align: center; }
        .login-header h2 { font-family: 'Outfit', sans-serif; margin-bottom: 5px; }
        .login-body { padding: 40px 30px; }
        .form-label { font-weight: 600; font-size: 0.85rem; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; }
        .form-control { border-radius: 12px; padding: 12px; border: 1px solid #e2e8f0; }
        .form-control:focus { box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1); border-color: #6366f1; }
        .btn-primary { background: #6366f1; border: none; border-radius: 12px; padding: 14px; font-weight: 700; transition: all 0.2s; }
        .btn-primary:hover { background: #4f46e5; transform: translateY(-1px); }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h2>Sign In</h2>
            <p class="mb-0 opacity-75">Enter your email and password to continue.</p>
        </div>

        <div class="login-body">
            <?php if (isset($errors['db'])): ?>
                <div class="alert alert-danger rounded-3 mb-4" role="alert">
                    <?php echo $errors['db']; ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($email); ?>" placeholder="john@example.com">
                    <div class="invalid-feedback"><?php echo $errors['email'] ?? ''; ?></div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" placeholder="••••••••">
                    <div class="invalid-feedback"><?php echo $errors['password'] ?? ''; ?></div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3">Sign In</button>
                <div class="text-center text-muted small">
                    Don't have an account? <a href="signup.php" class="text-primary fw-bold text-decoration-none">Create Account</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>