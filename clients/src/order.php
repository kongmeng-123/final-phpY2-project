<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$userId = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - E-book Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
        .card { border-radius: 15px; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .badge-pending { background-color: #fef3c7; color: #92400e; } /* Yellow */
        .badge-verified { background-color: #dbeafe; color: #1e40af; } /* Blue */
        .badge-preparing { background-color: #ffedd5; color: #9a3412; } /* Orange */
        .badge-shipping { background-color: #f3e8ff; color: #6b21a8; } /* Purple */
        .badge-delivered { background-color: #dcfce7; color: #166534; } /* Green */
        .badge-cancelled { background-color: #fee2e2; color: #991b1b; } /* Red */
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">E-book Shop</a>
        <div class="ms-auto">
            <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container py-4">
    <h2 class="fw-bold mb-4">My Order History</h2>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Order ID</th>
                            <th>Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Action</th>
                        </tr>
                    </thead>
                    <tbody id="orderTableBody">
                        <!-- Loaded by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Order Detail Modal -->
<div class="modal fade" id="orderModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header border-0 p-4">
                <h5 class="modal-title fw-bold">Order Details #<span id="modalOrderId"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4 pt-0">
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold text-muted small text-uppercase">Shipping Information</h6>
                        <p class="mb-1" id="modalAddress"></p>
                        <p class="mb-1 text-primary fw-bold" id="modalExpress"></p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold text-muted small text-uppercase">Payment Method</h6>
                        <p class="mb-1" id="modalBank"></p>
                        <span id="modalStatusBadge" class="badge"></span>
                    </div>
                    <div class="col-12">
                        <h6 class="fw-bold text-muted small text-uppercase mb-3">Items Ordered</h6>
                        <div id="modalItems"></div>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <h6 class="fw-bold text-muted small text-uppercase mb-2">Payment Receipt</h6>
                        <img id="modalSlip" src="" class="img-fluid rounded-3 border" style="max-height: 300px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
const userId = <?php echo $userId; ?>;

async function loadOrders() {
    try {
        const response = await fetch(`../../api/api.php/orders?user_id=${userId}`);
        const result = await response.json();
        
        if (result.success) {
            const tableBody = document.getElementById('orderTableBody');
            tableBody.innerHTML = '';

            result.data.forEach(order => {
                tableBody.innerHTML += `
                    <tr>
                        <td class="ps-4 fw-bold">#${order.id}</td>
                        <td class="text-muted">${new Date(order.created_at).toLocaleDateString()}</td>
                        <td class="fw-bold">${parseFloat(order.total_price).toLocaleString()} LAK</td>
                        <td>${getStatusBadge(order.status)}</td>
                        <td class="text-end pe-4">
                            <button class="btn btn-sm btn-outline-primary rounded-pill px-3" onclick="viewOrder(${order.id})">View</button>
                        </td>
                    </tr>
                `;
            });
        }
    } catch (error) {
        console.error('Failed to load orders', error);
    }
}

function getStatusBadge(status) {
    let cls = '';
    switch(status) {
        case 'Pending Payment': cls = 'badge-pending'; break;
        case 'Payment Verified': cls = 'badge-verified'; break;
        case 'Preparing Order': cls = 'badge-preparing'; break;
        case 'Shipping': cls = 'badge-shipping'; break;
        case 'Delivered': cls = 'badge-delivered'; break;
        case 'Cancelled': cls = 'badge-cancelled'; break;
        default: cls = 'bg-secondary';
    }
    return `<span class="badge ${cls} rounded-pill px-3">${status}</span>`;
}

async function viewOrder(orderId) {
    const response = await fetch(`../../api/api.php/orders/${orderId}`);
    const result = await response.json();
    
    if (result.success) {
        const order = result.data;
        document.getElementById('modalOrderId').innerText = order.id;
        document.getElementById('modalAddress').innerText = order.shipping_address;
        document.getElementById('modalExpress').innerText = order.express_name || 'Standard Shipping';
        document.getElementById('modalBank').innerText = order.payment_name || 'Bank Transfer';
        document.getElementById('modalStatusBadge').outerHTML = getStatusBadge(order.status);
        document.getElementById('modalSlip').src = `../../admin_dashboard/img/${order.payment_slip}`;
        
        let itemsHtml = '<ul class="list-group list-group-flush">';
        order.items.forEach(item => {
            itemsHtml += `
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                    <div>
                        <div class="fw-bold">${item.name}</div>
                        <div class="small text-muted">Qty: ${item.quantity} x ${parseFloat(item.price_at_purchase).toLocaleString()} LAK</div>
                    </div>
                    <div class="fw-bold">${(item.quantity * item.price_at_purchase).toLocaleString()} LAK</div>
                </li>
            `;
        });
        itemsHtml += '</ul>';
        document.getElementById('modalItems').innerHTML = itemsHtml;

        new bootstrap.Modal(document.getElementById('orderModal')).show();
    }
}

loadOrders();
</script>
</body>
</html>
