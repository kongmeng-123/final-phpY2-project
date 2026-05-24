<?php
require_once __DIR__ . '/helpers.php';

$errors = [];
$email = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = getPostValue('email');
    $password = $_POST['password'] ?? '';

    if ($email === '') {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email.';
    }

    if ($password === '') {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    }

    if (empty($errors)) {
        $successMessage = 'Login successful. Replace this with real authentication logic.';
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
    <style>
        body {
            background-color: #f3f4f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }

        .auth-card {
            width: 100%;
            max-width: 480px;
            border-radius: 24px;
            background: #ffffff;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }

        .auth-header {
            background-color: #4f46e5;
            color: white;
            padding: 3rem 2rem;
            text-align: center;
        }

        .auth-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .auth-header p {
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 0;
        }

        .auth-body {
            padding: 2.5rem 2rem;
        }

        .auth-footer {
            background: #f8fafc;
            padding: 1.25rem 1.5rem;
            text-align: center;
            border-top: 1px solid #e2e8f0;
        }

        .btn-primary {
            background-color: #4f46e5;
            border: none;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }
    </style>
</head>
<body>

    <div class="auth-card">
        <div class="auth-header">
            <h1>Sign in</h1>
            <p>Enter your email and password to continue.</p>
        </div>

        <div class="auth-body">
            <?php if ($successMessage): ?>
                <div class="alert alert-success rounded-3 mb-4" role="alert">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"
                        class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>"
                        placeholder="email@example.com">
                    <?php if (isset($errors['email'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password"
                        class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>"
                        placeholder="••••••••">
                    <?php if (isset($errors['password'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
                    <?php else: ?>
                        <div class="form-text">Minimum 8 characters</div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-3 rounded-4 fw-bold">Sign In</button>
            </form>
        </div>

        <div class="auth-footer">
            <p class="mb-0 text-muted">Don't have an account? <a href="signup.php" class="text-decoration-none fw-semibold">Sign up</a></p>
        </div>
    </div>

</body>

</html>