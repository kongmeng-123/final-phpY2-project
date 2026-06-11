<?php
session_start();
require_once __DIR__ . '/../../api/db_config.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$userName = $_SESSION['user_fname'] . ' ' . $_SESSION['user_lname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - E-book Shop</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .step-card { display: none; border-radius: 15px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .step-card.active { display: block; }
        .option-card { cursor: pointer; border: 2px solid #e2e8f0; transition: all 0.3s; border-radius: 12px; }
        .option-card:hover { border-color: #6366f1; background-color: #f5f3ff; }
        .option-card.selected { border-color: #6366f1; background-color: #f5f3ff; ring: 2px solid #6366f1; }
        .progress-bar { background-color: #6366f1; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Progress Tracker -->
            <div class="mb-4">
                <div class="progress" style="height: 10px;">
                    <div id="checkoutProgress" class="progress-bar" role="progressbar" style="width: 33%;"></div>
                </div>
                <div class="d-flex justify-content-between mt-2 text-muted small">
                    <span>Shipping</span>
                    <span>Payment</span>
                    <span>Upload Slip</span>
                </div>
            </div>

            <form id="checkoutForm" enctype="multipart/form-data">
                
                <!-- STEP 1: SHIPPING -->
                <div class="card step-card active" id="step1">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Step 1: Shipping Information</h4>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $userName; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="020..." required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Shipping Address</label>
                            <textarea name="address" class="form-control" rows="3" placeholder="Vientiane, Chanthabouly..." required></textarea>
                        </div>

                        <h5 class="fw-bold mb-3">Select Express Delivery</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <div class="option-card p-3 text-center express-option" data-id="1">
                                    <div class="fw-bold">Anousith</div>
                                    <div class="small text-muted">1-2 Days</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="option-card p-3 text-center express-option" data-id="2">
                                    <div class="fw-bold">Haltech</div>
                                    <div class="small text-muted">1-3 Days</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="option-card p-3 text-center express-option" data-id="3">
                                    <div class="fw-bold">Mixay</div>
                                    <div class="small text-muted">1-2 Days</div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="express_id" id="selectedExpress" required>
                        
                        <button type="button" class="btn btn-primary w-100 py-3 fw-bold" onclick="nextStep(2)">Continue to Payment</button>
                    </div>
                </div>

                <!-- STEP 2: BANK -->
                <div class="card step-card" id="step2">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Step 2: Choose Bank</h4>
                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <div class="option-card p-3 d-flex align-items-center bank-option" data-id="1">
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">BCEL One</div>
                                        <div class="small text-muted">Banque Pour Le Commerce Exterieur Lao</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="option-card p-3 d-flex align-items-center bank-option" data-id="2">
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">LDB Bank</div>
                                        <div class="small text-muted">Lao Development Bank</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="option-card p-3 d-flex align-items-center bank-option" data-id="3">
                                    <div class="flex-grow-1">
                                        <div class="fw-bold">LPMB</div>
                                        <div class="small text-muted">Laos Popular Mobile Banking</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="bank_id" id="selectedBank" required>

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-light w-50 py-3" onclick="nextStep(1)">Back</button>
                            <button type="button" class="btn btn-primary w-50 py-3 fw-bold" onclick="nextStep(3)">Continue to Upload</button>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: UPLOAD SLIP -->
                <div class="card step-card" id="step3">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Step 3: Upload Payment Receipt</h4>
                        <p class="text-muted">Please transfer the total amount to the selected bank and upload your slip here.</p>
                        
                        <div class="mb-4 text-center p-5 border-2 border-dashed rounded-3" style="border: 2px dashed #cbd5e1;">
                            <input type="file" name="payment_slip" id="slipInput" class="form-control mb-3" accept="image/jpeg,image/png,image/jpg" required>
                            <div class="small text-muted">Max size: 2MB. Allowed: JPG, PNG, JPEG</div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-light w-50 py-3" onclick="nextStep(2)">Back</button>
                            <button type="submit" class="btn btn-success w-50 py-3 fw-bold">Complete Order</button>
                        </div>
                    </div>
                </div>

                <!-- SUCCESS MESSAGE (Hidden by default) -->
                <div class="card step-card" id="successCard">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h3 class="fw-bold">Order Placed Successfully!</h3>
                        <p class="text-muted">Thank you for your purchase. Our team is verifying your transaction.</p>
                        <hr>
                        <div class="text-start mb-4">
                            <h6 class="fw-bold">Shipping Details</h6>
                            <p class="mb-1" id="resName"></p>
                            <p class="mb-1" id="resExpress"></p>
                            <p class="mb-1 text-muted" id="resAddress"></p>
                        </div>
                        <a href="order.php" class="btn btn-primary w-100 py-3">View My Orders</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
// --- STEP NAVIGATION ---
function nextStep(step) {
    // Basic validation before moving
    if (step === 2) {
        if (!document.getElementById('selectedExpress').value) {
            alert('Please select an express carrier');
            return;
        }
    }
    if (step === 3) {
        if (!document.getElementById('selectedBank').value) {
            alert('Please select a bank');
            return;
        }
    }

    // Update Progress Bar
    let progress = (step === 1) ? 33 : (step === 2) ? 66 : 100;
    document.getElementById('checkoutProgress').style.width = progress + '%';

    // Toggle Cards
    document.querySelectorAll('.step-card').forEach(card => card.classList.remove('active'));
    document.getElementById('step' + step).classList.add('active');
}

// --- SELECTION LOGIC ---
document.querySelectorAll('.express-option').forEach(card => {
    card.addEventListener('click', function() {
        document.querySelectorAll('.express-option').forEach(c => c.classList.remove('selected'));
        this.classList.add('selected');
        document.getElementById('selectedExpress').value = this.dataset.id;
    });
});

document.querySelectorAll('.bank-option').forEach(card => {
    card.addEventListener('click', function() {
        document.querySelectorAll('.bank-option').forEach(c => c.classList.remove('selected'));
        this.classList.add('selected');
        document.getElementById('selectedBank').value = this.dataset.id;
    });
});

// --- FORM SUBMISSION ---
document.getElementById('checkoutForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // Get Cart from LocalStorage
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    if (cart.length === 0) {
        alert('Your cart is empty');
        return;
    }

    // Calculate Total
    const total = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

    const formData = new FormData(this);
    formData.append('user_id', <?php echo $userId; ?>);
    formData.append('total_price', total);
    formData.append('items', JSON.stringify(cart));

    try {
        const response = await fetch('../../api/api.php/checkout', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            // Show success UI
            document.getElementById('resName').innerText = "Customer Name: " + formData.get('fullname');
            document.getElementById('resAddress').innerText = "Address: " + formData.get('address');
            document.getElementById('resExpress').innerText = "Express Delivery: " + document.querySelector('.express-option.selected .fw-bold').innerText;
            
            document.querySelectorAll('.step-card').forEach(card => card.classList.remove('active'));
            document.getElementById('successCard').classList.add('active');
            
            // Clear Cart
            localStorage.removeItem('cart');
        } else {
            alert('Error: ' + result.error);
        }
    } catch (error) {
        console.error('Submit failed', error);
        alert('Submission failed. Please try again.');
    }
});
</script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>
