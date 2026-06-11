<?php
// Initialize error messages
$errors = [];
$username = $email = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Validate Username
    if (empty(trim($_POST["username"]))) {
        $errors['username'] = "Username is required.";
    } else {
        $username = htmlspecialchars(trim($_POST["username"]));
    }

    // 2. Validate Email
    if (empty(trim($_POST["email"]))) {
        $errors['email'] = "Email address is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } else {
        $email = htmlspecialchars(trim($_POST["email"]));
    }

    // 3. Validate Password
    if (empty(trim($_POST["password"]))) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($_POST["password"]) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }

    // If there are no validation errors, proceed to registration logic
    if (empty($errors)) {
        // Securely hash the password before saving to a database
        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        /* ===================================================================
        PLACE YOUR DATABASE INSERTION HERE:
        -------------------------------------------------------------------
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $hashed_password]);
        
        header("Location: login.php?success=registered");
        exit();
        ===================================================================
        */
        
        // Temporary success message for demonstration
        $success_message = "Account created successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            max-width: 480px;
            width: 100%;
        }
        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1px solid #dee2e6;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
            border-color: #6366f1;
        }
        .btn-primary {
            background-color: #6366f1;
            border: none;
        }
        .btn-primary:hover {
            background-color: #4f46e5;
        }
        .is-invalid {
            border-color: #dc3545 !important;
        }
    </style>
</head>
<body>

<div class="register-card p-4 p-md-5 m-3">
    
    <div class="text-center mb-4">
        <h2 class="fw-bold mb-1">Get Started</h2>
        <p class="text-muted small">Create your free account in seconds</p>
    </div>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger d-flex align-items-center rounded-4 mb-4 small" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            <div>Please correct the errors marked in red below.</div>
        </div>
    <?php endif; ?>

    <?php if (isset($success_message)): ?>
        <div class="alert alert-success d-flex align-items-center rounded-4 mb-4 small" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div><?php echo $success_message; ?></div>
        </div>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" novalidate>
        
        <div class="mb-3">
            <label class="form-label small fw-bold text-muted tracking-wide text-uppercase mb-1">Username:</label>
            <input type="text" name="username" 
                   class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : ''; ?>" 
                   placeholder="Choose a handle" 
                   value="<?php echo htmlspecialchars($username); ?>">
            <?php if (isset($errors['username'])): ?>
                <div class="invalid-feedback small text-uppercase fw-semibold mt-1">
                    <?php echo $errors['username']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label small fw-bold text-muted tracking-wide text-uppercase mb-1">Email Address:</label>
            <input type="email" name="email" 
                   class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                   placeholder="name@example.com" 
                   value="<?php echo htmlspecialchars($email); ?>">
            <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback small text-uppercase fw-semibold mt-1">
                    <?php echo $errors['email']; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="mb-4">
            <label class="form-label small fw-bold text-muted tracking-wide text-uppercase mb-1">Password:</label>
            <input type="password" name="password" 
                   class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" 
                   placeholder="Create a strong password">
            <?php if (isset($errors['password'])): ?>
                <div class="invalid-feedback small text-uppercase fw-semibold mt-1">
                    <?php echo $errors['password']; ?>
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary w-100 py-3 rounded-4 fw-bold shadow-sm mb-3">
            Create Account
        </button>

        <div class="text-center">
            <p class="mb-0 small text-muted">Already have an account? <a href="login.php" class="text-decoration-none fw-semibold text-primary">Sign In</a></p>
        </div>

    </form>
</div>

</body>
</html>