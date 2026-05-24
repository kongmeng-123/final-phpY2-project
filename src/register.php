<?php
// Database configuration placeholders
// Note: In a real app, you would fill these with your actual database details
$db_host = 'localhost';
$db_name = 'your_database';
$db_user = 'your_username';
$db_pass = 'your_password';

$username = $email = $password = "";
$usernameErr = $emailErr = $passwordErr = "";
$statusMsg = "";
$statusType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    // Validate Username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
        $isValid = false;
    } else {
        $username = htmlspecialchars(stripslashes(trim($_POST["username"])));
        if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
            $usernameErr = "Only letters, numbers and underscores allowed";
            $isValid = false;
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        $isValid = false;
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters";
            $isValid = false;
        }
    }

    if ($isValid) {
        try {
            // This is where you would connect to your database:
            // $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            // $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            // $stmt->execute([$username, $email, $hashed_password]);

            $statusMsg = "Account created successfully for <strong>" . $username . "</strong>!";
            $statusType = "success";

            // Clear form after success
            $username = $email = $password = "";
        } catch (Exception $e) {
            $statusMsg = "Database Error: " . $e->getMessage();
            $statusType = "error";
        }
    } else {
        $statusMsg = "Please correct the errors marked in red.";
        $statusType = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-6">

    <div class="w-full max-w-md glass-card rounded-3xl shadow-2xl overflow-hidden">
        <!-- Header -->
        <div class="bg-indigo-600 p-10 text-white text-center">
            <h1 class="text-3xl font-extrabold tracking-tight">Get Started</h1>
            <p class="mt-2 text-indigo-100 font-medium">Create your free account in seconds</p>
        </div>

        <div class="p-10">
            <!-- Status Alerts -->
            <?php if ($statusMsg): ?>
                <div
                    class="mb-8 p-4 rounded-xl text-sm border flex items-center gap-3 <?php echo $statusType === 'success' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-rose-50 text-rose-700 border-rose-200'; ?>">
                    <?php if ($statusType === 'success'): ?>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php else: ?>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    <?php endif; ?>
                    <span><?php echo $statusMsg; ?></span>
                </div>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="space-y-6">

                <!-- Username -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>"
                        class="w-full px-4 py-3 rounded-xl border-2 <?php echo $usernameErr ? 'border-rose-400 focus:border-rose-500' : 'border-gray-100 focus:border-indigo-500'; ?> outline-none transition-all"
                        placeholder="Choose a handle">
                    <?php if ($usernameErr): ?>
                        <p class="mt-2 text-xs text-rose-500 font-semibold uppercase italic tracking-wide">
                            <?php echo $usernameErr; ?></p>
                    <?php endif; ?>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Email
                        Address</label>
                    <input type="email" name="email" value="<?php echo $email; ?>"
                        class="w-full px-4 py-3 rounded-xl border-2 <?php echo $emailErr ? 'border-rose-400 focus:border-rose-500' : 'border-gray-100 focus:border-indigo-500'; ?> outline-none transition-all"
                        placeholder="name@example.com">
                    <?php if ($emailErr): ?>
                        <p class="mt-2 text-xs text-rose-500 font-semibold uppercase italic tracking-wide">
                            <?php echo $emailErr; ?></p>
                    <?php endif; ?>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Password</label>
                    <input type="password" name="password"
                        class="w-full px-4 py-3 rounded-xl border-2 <?php echo $passwordErr ? 'border-rose-400 focus:border-rose-500' : 'border-gray-100 focus:border-indigo-500'; ?> outline-none transition-all"
                        placeholder="Create a strong password">
                    <?php if ($passwordErr): ?>
                        <p class="mt-2 text-xs text-rose-500 font-semibold uppercase italic tracking-wide">
                            <?php echo $passwordErr; ?></p>
                    <?php else: ?>
                        <p class="mt-2 text-[10px] text-gray-400 uppercase font-bold tracking-widest">Min. 8 characters
                            required</p>
                    <?php endif; ?>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-200 transition-all hover:-translate-y-0.5 active:scale-95">
                        Create Account
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 p-6 text-center border-t border-gray-100">
            <p class="text-gray-500 text-sm font-medium">Already have an account? <a href="#"
                    class="text-indigo-600 font-bold hover:underline">Sign In</a></p>
        </div>
    </div>

</body>

</html>