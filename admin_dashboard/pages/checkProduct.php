<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title>SB Admin 2 - product</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link
        href="http://sfonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="http://scdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet"
        crossorigin="anonymous"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        referrerpolicy="no-referrer" />
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav accordion bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">
            <a class="align-items-center d-flex justify-content-center sidebar-brand" href="index.html">
                <div class="rotate-n-15 sidebar-brand-icon">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="mx-3 sidebar-brand-text">
                    E-book
                    <sup>2</sup>
                </div>
            </a>
            <hr class="sidebar-divider my-0" />
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider" />
            <hr class="sidebar-divider" />
            <div class="sidebar-heading">Addons</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Order</span>
                </a>
                <div class="collapse" id="collapseOrder">
                    <div class="py-2 bg-white collapse-inner rounded">
                        <h6 class="collapse-header">Order detail :</h6>
                        <a class="collapse-item" href="checkPayment.php">Payment</a>
                        <a class="collapse-item" href="checkOrder.php">Order status</a>
                        <a class="collapse-item" href="orderHistory.php">History</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Customer</span>
                </a>
                <div class="collapse" id="collapseCustomer">
                    <div class="py-2 bg-white collapse-inner rounded">
                        <a class="collapse-item" href="customerInfor.php">User Information</a>
                    </div>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Product management</span>
                </a>
                <div class="collapse" id="collapseProduct">
                    <div class="py-2 bg-white collapse-inner rounded">
                        <a class="collapse-item" href="allProduct.php">All product</a>
                        <a class="collapse-item active" href="checkProduct.php">Check product</a>
                        <a class="collapse-item" href="addProduct.php">Add product</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMarketing">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Marketing</span>
                </a>
                <div class="collapse" id="collapseMarketing">
                    <div class="py-2 bg-white collapse-inner rounded">
                        <a class="collapse-item" href="promotion.php">Promotion</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Setting</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa-arrow-right-from-bracket fa-solid"></i>
                    <span>Logout</span>
                </a>
            </li>
            <hr class="d-none d-md-block sidebar-divider" />
            <div class="d-none d-md-inline text-center">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="bg-white mb-4 navbar navbar-expand navbar-light shadow static-top topbar">
                    <form class="form-inline">
                        <button class="mr-3 btn btn-link d-md-none rounded-circle" id="sidebarToggleTop">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <form
                        class="d-none d-sm-inline-block form-inline ml-md-3 mr-auto mw-100 my-2 my-md-0 navbar-search">
                        <div class="input-group">
                            <input aria-describedby="basic-addon2" aria-label="Search"
                                class="small bg-light border-0 form-control" placeholder="Search for..." type="text" />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-sm fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                                     <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
                                aria-haspopup="true" id="searchDropdown" role="button">
                                <i class="fas fa-fw fa-search"></i>
                            </a>
                            <div class="shadow animated--grow-in dropdown-menu dropdown-menu-right p-3"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto navbar-search w-100">
                                    <div class="input-group">
                                        <input aria-describedby="basic-addon2" aria-label="Search"
                                            class="small bg-light border-0 form-control" placeholder="Search for..."
                                            type="text" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-sm fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
                                aria-haspopup="true" id="alertsDropdown" role="button">
                                <i class="fas fa-fw fa-bell"></i>
                                <span class="badge badge-counter badge-danger">0</span>
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
                                aria-haspopup="true" id="messagesDropdown" role="button">
                                <i class="fas fa-fw fa-envelope"></i>
                                <span class="badge badge-counter badge-danger">0</span>
                            </a>
                            
                        </li>
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
                                aria-haspopup="true" id="userDropdown" role="button">
                                <span class="small d-lg-inline d-none mr-2 text-gray-600">Douglas McGee</span>
                                <img class="rounded-circle img-profile" src="https://cdn-icons-png.flaticon.com/512/9703/9703596.png" />
                            </a>
                            
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Products Status</h1>

                    <div class="py-2 px-4 row justify-content-between">
                        <div>
                            <button class="btn bg-primary text-white" onclick="handleStatus('topSeller')">Top seller</button>
                            <button class="btn bg-primary text-white" onclick="handleStatus('lowSeller')">Low seller</button>
                            <button class="btn bg-primary text-white" onclick="handleStatus('lowStock')">Low stock</button>
                            <button class="btn bg-primary text-white" onclick="handleStatus('OutOfStock')">Out of Stock</button>
                        </div>
                        <div>
                            <input type="search" id="search_data" placeholder="Search" style="border:2px solid gray;padding: 4px;border-radius:8px; width: 230px;">
                        </div>
                        
                    </div>
                    <div class="shadow mb-4 card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table cellspacing="0" class="table table-bordered" width="100%">
                                    
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Count</th>
                                            <th>Sold</th>
                                            <th>Image</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody id="tableBody">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="my-auto container">
                    <div class="my-auto copyright text-center">
                        <span>Copyright © Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a href="#page-top" class="rounded scroll-to-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="fade modal" id="logoutModal" aria-hidden="true" aria-labelledby="exampleModalLabel" role="dialog"
        tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
    <script>
        
        let allProducts = []; // เก็บข้อมูลทั้งหมดไว้ที่นี่
        let categoryNow = "All";

        async function loadProduct() {
            try {
                const response = await fetch('http://localhost:9090/api/api.php/products');
                if (!response.ok) throw new Error("network response was not ok");

                allProducts = await response.json(); // เก็บข้อมูลใส่ตัวแปร Global
                renderTable(allProducts); // แสดงผลครั้งแรก
            } catch (error) {
                console.error("something wrong, " + error);
            }
        }

        // ฟังก์ชันสำหรับวาดตารางใหม่ (ตัวเดียวจบ)
        function renderTable(dataToDisplay) {
            let tb_body = document.getElementById("tableBody");
            tb_body.innerHTML = ""; // ล้างตารางก่อนเสมอ

            dataToDisplay.forEach(item => {
                let tableRow = document.createElement("tr");
                tableRow.innerHTML = `
                    <td><a href="productDetail.php?id=${item.id}" title="product detail">${item.id}</a></td>
                    <td>${item.product_name}</td>
                    <td>$ ${item.price}</td>
                    <td>${item.category}</td>
                    <td>${item.count}</td>
                    <td>${item.sold}</td>
                    <td><img src="../img/${item.image_src}" width="50" height="70"></td>
                    <td>
                         
                        <a href="editProduct.php?id=${item.id}" class="btn bg-warning text-white">edit</a>
                        <button class="btn btn-danger" onclick="deleteProduct(${item.id})">del</button>
                    
                    </td>
                `;
                tb_body.appendChild(tableRow);
            });
        }

        // 1. จัดการการค้นหา (Search)
        document.getElementById("search_data").addEventListener("input", function() {
            let filter = this.value.toLowerCase();
            let filtered = allProducts.filter(item => {
                let matchesSearch = item.product_name.toLowerCase().includes(filter);
                let matchesCategory = (categoryNow === "All" || item.category === categoryNow);
                return matchesSearch && matchesCategory;
            });
            renderTable(filtered);
        });

        // 2. จัดการหมวดหมู่ (Category)
        function handleStatus(status) {
            
            if (status == "topSeller") {
                let filtered = allProducts.sort((a, b) => b.sold - a.sold);
                renderTable(filtered);
                return;
            }
            if (status == "lowSeller") {
                let filtered = allProducts.sort((a, b) => a.sold - b.sold);
                renderTable(filtered);
                return;
            }
            if (status == "lowStock") {
                let filtered = allProducts.sort((a, b) => a.count - b.count);
                renderTable(filtered);
                return;
            }
            if (status == "OutOfStock") {
                let filtered = allProducts.filter(item => item.count === 0);
                renderTable(filtered);
                return;
            }
            
          

        }
        function deleteProduct(id) {
            if (confirm("Are you sure you want to delete this product?")) {
                fetch(`http://localhost:9090/api/api.php/products/${id}`, {
                    method: 'DELETE'
                })
                .then(response => {
                    if (!response.ok) throw new Error("Network response was not ok");
                    return response.json();
                })
                .then(data => {
                    alert(data.message);
                    // หลังจากลบแล้ว ให้โหลดข้อมูลใหม่
                    loadProduct();
                })
                .catch(error => {
                    console.error("There was a problem with the delete request: ", error);
                    alert("Failed to delete product. Please try again.");

                });
            }
        }

        loadProduct();

        
            
        
    </script>

</body>

</html>