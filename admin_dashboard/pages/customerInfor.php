<?php
require_once "../../api/db_config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport" />
    <title>G-Book Admin - Customers</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav accordion bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">
            <a class="align-items-center d-flex justify-content-center sidebar-brand" href="index.php">
                <div class="rotate-n-15 sidebar-brand-icon"><i class="fas fa-book"></i></div>
                <div class="mx-3 sidebar-brand-text">G-Book Admin</div>
            </a>
            <hr class="sidebar-divider my-0" />
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <hr class="sidebar-divider" />
            <li class="nav-item"><a class="nav-link" href="allOrder.php"><i class="fas fa-fw fa-shopping-cart"></i><span>Orders</span></a></li>
            <li class="nav-item"><a class="nav-link" href="allProduct.php"><i class="fas fa-fw fa-box"></i><span>Products</span></a></li>
            <li class="nav-item active"><a class="nav-link" href="customerInfor.php"><i class="fas fa-fw fa-users"></i><span>Customers</span></a></li>
        </ul>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="bg-white mb-4 navbar navbar-expand navbar-light shadow static-top topbar">
                    <button class="mr-3 btn btn-link d-md-none rounded-circle" id="sidebarToggleTop"><i class="fa fa-bars"></i></button>
                </nav>

                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Customer Management</h1>
                    
                    <div class="shadow mb-4 card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="userTable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Joined At</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        <!-- Loaded by JS -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer"><div class="container my-auto text-center"><span>Copyright © G-Book 2024</span></div></footer>
        </div>
    </div>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        async function loadUsers() {
            try {
                const response = await fetch('../../api/api.php/users');
                const result = await response.json();

                if (result.success) {
                    const users = result.data;
                    let html = '';
                    users.forEach(u => {
                        html += `
                            <tr>
                                <td>#${u.id}</td>
                                <td class="font-weight-bold text-primary">${u.fullname}</td>
                                <td>${u.email}</td>
                                <td>${u.phone || 'N/A'}</td>
                                <td><span class="badge ${u.role === 'admin' ? 'badge-danger' : 'badge-light'}">${u.role}</span></td>
                                <td class="small">${new Date(u.created_at).toLocaleDateString()}</td>
                            </tr>
                        `;
                    });
                    document.getElementById('tableBody').innerHTML = html;
                    $('#userTable').DataTable();
                }
            } catch (error) {
                console.error("Load users failed", error);
            }
        }

        $(document).ready(loadUsers);
    </script>
</body>
</html>