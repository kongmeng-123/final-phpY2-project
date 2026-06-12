<?php
require_once __DIR__ . '/../../api/db_config.php';

// Initialize error messages
$errors = [];
$fname = $lname = $email = $gender = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Validate First Name
    $fname = trim($_POST["fname"] ?? '');
    if (empty($fname)) {
        $errors['fname'] = "First name is required.";
    }

    // 2. Validate Last Name
    $lname = trim($_POST["lname"] ?? '');
    if (empty($lname)) {
        $errors['lname'] = "Last name is required.";
    }

    // 3. Validate Gender
    $gender = $_POST["gender"] ?? '';
    if (empty($gender)) {
        $errors['gender'] = "Gender selection is required.";
    }

    // 4. Validate Email
    $email = trim($_POST["email"] ?? '');
    if (empty($email)) {
        $errors['email'] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } else {
        // Check if email already exists
        $stmt = $pdo->prepare("SELECT user_id FROM users_tb WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors['email'] = "This email is already registered.";
        }
    }

    // 5. Validate Phone
    $phone = trim($_POST["phone"] ?? '');
    if (empty($phone)) {
        $errors['phone'] = "Phone number is required.";
    }

    // 6. Validate Password
    $password = $_POST["password"] ?? '';
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters.";
    }

    // If no errors, insert into database
    if (empty($errors)) {
        // Securely hash the password before saving to a database
        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users_tb (Fname, Lname, gender, email, password, phoneNumber) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$fname, $lname, $gender, $email, $hashed_password, $phone]);

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $pdo->lastInsertId();
            $_SESSION['user_fname'] = $fname;
            $_SESSION['user_lname'] = $lname;
            $_SESSION['user_name'] = $fname . ' ' . $lname;

            header("Location: order.php");
            exit();
        } catch (PDOException $e) {
            $errors['db'] = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - E-Book Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Outfit:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .signup-card { background: white; border-radius: 24px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); width: 100%; max-width: 550px; overflow: hidden; }
        .signup-header { background: #6366f1; color: white; padding: 40px 30px; text-align: center; }
        .signup-header h2 { font-family: 'Outfit', sans-serif; margin-bottom: 5px; }
        .signup-body { padding: 40px 30px; }
        .form-label { font-weight: 600; font-size: 0.85rem; color: #64748b; text-transform: uppercase; letter-spacing: 0.5px; }
        .form-control, .form-select { border-radius: 12px; padding: 12px; border: 1px solid #e2e8f0; }
        .form-control:focus { box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1); border-color: #6366f1; }
        .btn-primary { background: #6366f1; border: none; border-radius: 12px; padding: 14px; font-weight: 700; transition: all 0.2s; }
        .btn-primary:hover { background: #4f46e5; transform: translateY(-1px); }
    </style>
</head>
<body>

<div class="signup-card">
    <div class="signup-header">
        <h2>Create Account</h2>
        <p class="mb-0 opacity-75">Join our community of book lovers</p>
    </div>
    <div class="signup-body">
        <?php if (isset($errors['db'])): ?>
            <div class="alert alert-danger rounded-3 mb-4"><?php echo $errors['db']; ?></div>
        <?php endif; ?>

        <form action="signup.php" method="POST">
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" name="fname" class="form-control <?php echo isset($errors['fname']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($fname); ?>" placeholder="John">
                    <div class="invalid-feedback"><?php echo $errors['fname'] ?? ''; ?></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control <?php echo isset($errors['lname']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($lname); ?>" placeholder="Doe">
                    <div class="invalid-feedback"><?php echo $errors['lname'] ?? ''; ?></div>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select <?php echo isset($errors['gender']) ? 'is-invalid' : ''; ?>">
                    <option value="">Select Gender</option>
                    <option value="Male" <?php echo $gender === 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo $gender === 'Female' ? 'selected' : ''; ?>>Female</option>
                    <option value="Other" <?php echo $gender === 'Other' ? 'selected' : ''; ?>>Other</option>
                </select>
                <div class="invalid-feedback"><?php echo $errors['gender'] ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($email); ?>" placeholder="john@example.com">
                <div class="invalid-feedback"><?php echo $errors['email'] ?? ''; ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : ''; ?>" value="<?php echo htmlspecialchars($phone); ?>" placeholder="020-XXXX-XXXX">
                <div class="invalid-feedback"><?php echo $errors['phone'] ?? ''; ?></div>
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" placeholder="••••••••">
                <div class="invalid-feedback"><?php echo $errors['password'] ?? ''; ?></div>
                <div class="form-text mt-1">At least 6 characters required.</div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Register Now</button>
            <div class="text-center text-muted small">
                Already have an account? <a href="login.php" class="text-primary fw-bold text-decoration-none">Sign In</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>