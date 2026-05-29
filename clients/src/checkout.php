<?php
require_once __DIR__ . '/../../api/db_config.php';

$success = false;
$errorMsg = '';

// Handle POST request for Checkout Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $fullname = trim($_POST['fullname'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $express = trim($_POST['express'] ?? '');
        $bank = trim($_POST['bank'] ?? '');
        $cartJson = $_POST['cart_data'] ?? '[]';

        // Validations
        if (empty($fullname) || empty($phone) || empty($address) || empty($express) || empty($bank)) {
            throw new Exception("All fields are required. Please go through all steps.");
        }

        $cartItems = json_decode($cartJson, true);
        if (empty($cartItems)) {
            throw new Exception("Your cart is empty. Please add items to your cart first.");
        }

        // Handle Payment Slip Upload
        if (!isset($_FILES['payment_slip']) || $_FILES['payment_slip']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Failed to upload payment receipt slip.");
        }

        $fileTmpPath = $_FILES['payment_slip']['tmp_path'] ?? $_FILES['payment_slip']['tmp_name'];
        $fileName = $_FILES['payment_slip']['name'];
        $fileSize = $_FILES['payment_slip']['size'];
        $fileType = $_FILES['payment_slip']['type'];
        
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        if (!in_array($fileExtension, $allowedExtensions)) {
            throw new Exception("Invalid file extension. Only JPG, JPEG, PNG, and WEBP files are allowed.");
        }

        // Target directory for uploads (matches admin_dashboard img directory)
        $uploadDir = __DIR__ . '/../../admin_dashboard/img/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Generate unique name for the slip
        $newFileName = 'slip_' . time() . '_' . rand(1000, 9999) . '.' . $fileExtension;
        $destPath = $uploadDir . $newFileName;

        if (!move_uploaded_file($fileTmpPath, $destPath)) {
            throw new Exception("Failed to save the uploaded receipt image.");
        }

        // Save order(s) to Database
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("INSERT INTO orders_tb 
            (product_name, product_img_src, product_price, amount_product, user_name, status, bill_img_src, user_address, express_with, date_order) 
            VALUES (?, ?, ?, ?, ?, 'Pending', ?, ?, ?, NOW())");

        foreach ($cartItems as $item) {
            // Normalize image path/name
            $imgName = basename($item['img'] ?? 'product.jpg');
            $price = intval($item['price']);
            $qty = intval($item['qty']);

            $stmt->execute([
                $item['name'],
                $imgName,
                $price,
                $qty,
                $fullname,
                $newFileName,
                $address,
                $express
            ]);
        }

        $pdo->commit();
        $success = true;

    } catch (Exception $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        $errorMsg = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceed Checkout - E-Book Shop</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-soft: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --bcel-color: #0d6efd;
            --ldb-color: #198754;
        }

        body {
            background-color: var(--bg-soft);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
        }

        h1, h2, h3, h4, h5, .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        .navbar {
            background: white;
            border-bottom: 1px solid #e2e8f0;
        }

        .checkout-container {
            max-width: 800px;
        }

        /* Step Progress Bar */
        .step-progress {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 3rem;
        }

        .step-progress::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 4px;
            background: #e2e8f0;
            transform: translateY(-50%);
            z-index: 1;
        }

        .step-progress-bar {
            position: absolute;
            top: 50%;
            left: 0;
            height: 4px;
            background: var(--primary);
            transform: translateY(-50%);
            z-index: 2;
            transition: width 0.3s ease;
            width: 0%;
        }

        .step-node {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 4px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            z-index: 3;
            transition: all 0.3s ease;
            color: var(--text-muted);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .step-node.active {
            border-color: var(--primary);
            color: var(--primary);
            font-size: 1.1rem;
        }

        .step-node.completed {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        /* Express & Bank Card Styles */
        .selection-card {
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
            background: white;
        }

        .selection-card:hover {
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }

        .selection-input {
            display: none;
        }

        .selection-input:checked + .selection-card {
            border-color: var(--primary);
            background: #f5f3ff;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.1);
        }

        .selection-input:checked + .selection-card.bcel {
            border-color: var(--bcel-color);
            background: rgba(13, 110, 253, 0.04);
        }

        .selection-input:checked + .selection-card.ldb {
            border-color: var(--ldb-color);
            background: rgba(25, 135, 84, 0.04);
        }

        .carrier-logo {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .carrier-anousith { background: #ffe4e6; color: #e11d48; }
        .carrier-haltech { background: #e0f2fe; color: #0284c7; }
        .carrier-mixay { background: #fef9c3; color: #ca8a04; }

        .bank-logo {
            width: 60px;
            height: 35px;
            border-radius: 6px;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.75rem;
        }

        .bank-bcel { background: var(--bcel-color); }
        .bank-ldb { background: var(--ldb-color); }

        .qr-section {
            display: none;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
        }

        .qr-image-wrapper {
            max-width: 250px;
            margin: 0 auto;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1rem;
            background: #fff;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
        }

        .qr-image-wrapper img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Upload Drag-and-Drop Area */
        .upload-area {
            border: 2px dashed #cbd5e1;
            border-radius: 20px;
            padding: 3rem 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
            background: white;
        }

        .upload-area:hover {
            border-color: var(--primary);
            background: #f8fafc;
        }

        .upload-preview {
            max-width: 200px;
            max-height: 250px;
            object-fit: contain;
            border-radius: 12px;
            margin-top: 1rem;
            display: none;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .step-panel {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .step-panel.active {
            display: block;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Success screen card */
        .success-card {
            background: white;
            border-radius: 32px;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #d1fae5;
            color: #059669;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 10px 15px -3px rgba(5, 150, 105, 0.2);
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-primary font-outfit" href="index.php">E-book</a>
            <button class="btn btn-outline-secondary btn-sm" onclick="location.href='Cart.php'">
                <i class="bi bi-arrow-left me-1"></i> Back to Cart
            </button>
        </div>
    </nav>

    <div class="container checkout-container py-5">
        <?php if ($success): ?>
            <!-- SUCCESS PANEL -->
            <div class="success-card">
                <div class="success-icon">
                    <i class="bi bi-check-lg"></i>
                </div>
                <h2 class="fw-bold mb-2">Order Placed Successfully!</h2>
                <p class="text-muted mb-4 fs-5">Thank you for your purchase. Your payment slip has been uploaded and our team is verifying the transaction.</p>
                
                <div class="bg-light p-3 rounded-4 mb-4 text-start max-width-500 mx-auto" style="max-width: 500px;">
                    <h6 class="fw-bold mb-2 text-primary font-outfit"><i class="bi bi-info-circle me-1"></i> Shipping Details</h6>
                    <p class="mb-1 text-muted"><strong>Customer Name:</strong> <?php echo htmlspecialchars($fullname); ?></p>
                    <p class="mb-1 text-muted"><strong>Express Delivery:</strong> <?php echo htmlspecialchars($express); ?></p>
                    <p class="mb-0 text-muted"><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <a href="order.php" class="btn btn-primary px-4 py-3 rounded-3 fw-bold">
                        <i class="bi bi-file-text me-1"></i> View Order History
                    </a>
                    <a href="Product.php" class="btn btn-light border px-4 py-3 rounded-3 fw-semibold">
                        Continue Shopping
                    </a>
                </div>
            </div>
            
            <script>
                // Clear cart locally upon successful database insertion
                localStorage.removeItem('nuol_cart');
            </script>

        <?php else: ?>
            
            <?php if (!empty($errorMsg)): ?>
                <div class="alert alert-danger rounded-4 p-3 mb-4 d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
                    <div><strong>Error:</strong> <?php echo htmlspecialchars($errorMsg); ?></div>
                </div>
            <?php endif; ?>

            <!-- STEP WIZARD FORM -->
            <form action="checkout.php" method="POST" enctype="multipart/form-data" id="checkout-form" onsubmit="return validateSubmit(event)">
                
                <!-- Hidden inputs for cart data -->
                <input type="hidden" name="cart_data" id="cart-data-input">

                <!-- STEP PROGRESS BAR -->
                <div class="step-progress">
                    <div class="step-progress-bar" id="progress-bar"></div>
                    <div class="step-node active" id="node-1">1</div>
                    <div class="step-node" id="node-2">2</div>
                    <div class="step-node" id="node-3">3</div>
                </div>

                <!-- STEP 1: Shipping & Express Selection -->
                <div class="step-panel active" id="panel-1">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                        <h4 class="fw-bold mb-4 font-outfit"><i class="bi bi-geo-alt text-primary me-2"></i>Step 1: Shipping & Express Service</h4>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="fullname" id="fullname" class="form-control rounded-3 py-2 px-3" placeholder="Enter recipient's full name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="form-control rounded-3 py-2 px-3" placeholder="Enter contact number" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Shipping Address</label>
                            <textarea name="address" id="address" rows="3" class="form-control rounded-4 py-2 px-3" placeholder="Enter detailed shipping address" required></textarea>
                        </div>

                        <h5 class="fw-bold mb-3 font-outfit mt-4">Select Express Delivery Carrier</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <input type="radio" name="express" id="carrier_anousith" value="Anousith Express" class="selection-input" required>
                                <label for="carrier_anousith" class="w-100 selection-card">
                                    <div class="carrier-logo carrier-anousith">A</div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Anousith</h6>
                                        <small class="text-muted">1-2 days</small>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="express" id="carrier_haltech" value="Haltech Express" class="selection-input" required>
                                <label for="carrier_haltech" class="w-100 selection-card">
                                    <div class="carrier-logo carrier-haltech">H</div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Haltech</h6>
                                        <small class="text-muted">1-3 days</small>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="express" id="carrier_mixay" value="Mixay Express" class="selection-input" required>
                                <label for="carrier_mixay" class="w-100 selection-card">
                                    <div class="carrier-logo carrier-mixay">M</div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Mixay</h6>
                                        <small class="text-muted">1-2 days</small>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="button" class="btn btn-primary px-4 py-2.5 rounded-3 fw-bold" onclick="nextStep(2)">
                                Continue to Payment <i class="bi bi-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Bank Selection & QR Display -->
                <div class="step-panel" id="panel-2">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                        <h4 class="fw-bold mb-4 font-outfit"><i class="bi bi-wallet2 text-primary me-2"></i>Step 2: Choose Bank & Pay</h4>
                        
                        <h5 class="fw-bold mb-3 font-outfit">Select Your Bank</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <input type="radio" name="bank" id="bank_bcel" value="BCEL One" class="selection-input" onchange="showQR('bcel')" required>
                                <label for="bank_bcel" class="w-100 selection-card bcel">
                                    <div class="bank-logo bank-bcel">BCEL</div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">BCEL One</h6>
                                        <small class="text-muted">Laos Popular Mobile Banking</small>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" name="bank" id="bank_ldb" value="LDB Trust" class="selection-input" onchange="showQR('ldb')" required>
                                <label for="bank_ldb" class="w-100 selection-card ldb">
                                    <div class="bank-logo bank-ldb">LDB</div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">LDB Trust</h6>
                                        <small class="text-muted">Lao Development Bank</small>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Scan payment instructions & QR Code -->
                        <div class="qr-section mb-4" id="qr-container">
                            <h5 class="fw-bold mb-1 font-outfit text-primary">Scan QR Code to Pay</h5>
                            <p class="text-muted small mb-4">Scan this QR Code with your banking app. Please transfer the exact total amount below.</p>
                            
                            <div class="qr-image-wrapper mb-3">
                                <img src="../../admin_dashboard/img/bill-one.jpg" alt="Payment QR Code" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=FinalProjectPayment'">
                            </div>

                            <div class="fs-4 fw-bold font-outfit text-dark py-2 rounded-3 bg-light border border-dashed d-inline-block px-4">
                                Total: <span id="checkout-total-price">₭0.00</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-light border px-4 py-2.5 rounded-3 fw-semibold" onclick="prevStep(1)">
                                <i class="bi bi-arrow-left me-1"></i> Back
                            </button>
                            <button type="button" id="payment-continue-btn" class="btn btn-primary px-4 py-2.5 rounded-3 fw-bold" onclick="nextStep(3)" disabled>
                                Continue to Upload <i class="bi bi-arrow-right ms-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Receipt Upload -->
                <div class="step-panel" id="panel-3">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                        <h4 class="fw-bold mb-4 font-outfit"><i class="bi bi-cloud-arrow-up text-primary me-2"></i>Step 3: Upload Payment Receipt</h4>
                        
                        <p class="text-muted mb-4">Please upload a screenshot or image of your bank transfer slip to verify your payment.</p>

                        <div class="mb-4">
                            <!-- Hidden input file -->
                            <input type="file" name="payment_slip" id="payment_slip" class="d-none" accept="image/*" onchange="previewImage(event)" required>
                            
                            <div class="upload-area" onclick="document.getElementById('payment_slip').click()">
                                <i class="bi bi-images fs-1 text-muted mb-3 d-block"></i>
                                <span class="fw-semibold text-primary d-block mb-1">Click to Upload Slip Image</span>
                                <small class="text-muted">Supports JPG, JPEG, PNG, or WEBP (Max 5MB)</small>
                                
                                <div class="text-center mt-3">
                                    <img id="slip-preview" class="upload-preview" src="#" alt="Receipt Preview">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-light border px-4 py-2.5 rounded-3 fw-semibold" onclick="prevStep(2)">
                                <i class="bi bi-arrow-left me-1"></i> Back
                            </button>
                            <button type="submit" id="submit-order-btn" class="btn btn-success px-5 py-2.5 rounded-3 fw-bold shadow-sm" disabled>
                                <i class="bi bi-check-circle me-1"></i> Complete & Submit Order
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        <?php endif; ?>
    </div>

    <!-- Script wizard -->
    <script>
        const CART_KEY = 'nuol_cart';
        let currentStep = 1;
        let totalToPay = 0;

        function getCart() {
            return JSON.parse(localStorage.getItem(CART_KEY) || '[]');
        }

        // Initialize checkout totals and input
        function initCheckout() {
            const cart = getCart();
            document.getElementById('cart-data-input').value = JSON.stringify(cart);

            const subtotal = cart.reduce((acc, item) => acc + (item.price * item.qty), 0);
            const tax = subtotal * 0.08;
            totalToPay = subtotal + tax;

            const totalSpan = document.getElementById('checkout-total-price');
            if (totalSpan) {
                totalSpan.textContent = `₭${totalToPay.toLocaleString(undefined, { minimumFractionDigits: 2 })}`;
            }
        }

        function showQR(bankType) {
            const qrContainer = document.getElementById('qr-container');
            const contBtn = document.getElementById('payment-continue-btn');
            
            if (qrContainer) qrContainer.style.display = 'block';
            if (contBtn) contBtn.disabled = false;
        }

        function nextStep(step) {
            // Validation before proceeding
            if (step === 2) {
                const fullname = document.getElementById('fullname').value.trim();
                const phone = document.getElementById('phone').value.trim();
                const address = document.getElementById('address').value.trim();
                const expressChecked = document.querySelector('input[name="express"]:checked');

                if (!fullname || !phone || !address) {
                    alert("Please fill in all contact information.");
                    return;
                }
                if (!expressChecked) {
                    alert("Please select an express delivery company.");
                    return;
                }
            }

            if (step === 3) {
                const bankChecked = document.querySelector('input[name="bank"]:checked');
                if (!bankChecked) {
                    alert("Please select your bank and scan the QR code to proceed.");
                    return;
                }
            }

            // Move step
            document.getElementById(`panel-${currentStep}`).classList.remove('active');
            document.getElementById(`node-${currentStep}`).classList.add('completed');
            
            currentStep = step;
            
            document.getElementById(`panel-${currentStep}`).classList.add('active');
            document.getElementById(`node-${currentStep}`).classList.add('active');

            // Update Progress Bar width
            const progressBar = document.getElementById('progress-bar');
            if (step === 2) progressBar.style.width = '50%';
            if (step === 3) progressBar.style.width = '100%';
        }

        function prevStep(step) {
            document.getElementById(`panel-${currentStep}`).classList.remove('active');
            document.getElementById(`node-${currentStep}`).classList.remove('active');
            document.getElementById(`node-${currentStep}`).classList.remove('completed');
            
            currentStep = step;
            
            document.getElementById(`panel-${currentStep}`).classList.add('active');
            document.getElementById(`node-${currentStep}`).classList.add('active');
            document.getElementById(`node-${currentStep}`).classList.remove('completed');

            // Update Progress Bar width
            const progressBar = document.getElementById('progress-bar');
            if (step === 1) progressBar.style.width = '0%';
            if (step === 2) progressBar.style.width = '50%';
        }

        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('slip-preview');
            const submitBtn = document.getElementById('submit-order-btn');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    if (submitBtn) submitBtn.disabled = false;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function validateSubmit(event) {
            const cart = getCart();
            if (cart.length === 0) {
                alert("Your cart is empty! Redirecting you to the products page.");
                location.href = 'Product.php';
                return false;
            }
            return true;
        }

        window.onload = function() {
            initCheckout();
            const cart = getCart();
            if (cart.length === 0 && !document.querySelector('.success-card')) {
                alert("Your cart is empty! Please add items first.");
                location.href = 'Product.php';
            }
        }
    </script>
</body>
</html>
