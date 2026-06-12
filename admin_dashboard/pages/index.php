<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title>SB Admin 2 - Dashboard</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link
        href="http://sfonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="http://scdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet"
        crossorigin="anonymous"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        referrerpolicy="no-referrer" />
    <link href="../css/sb-admin-2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <li class="nav-item active">
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
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Product management</span>
                </a>
                <div class="collapse" id="collapseProduct">
                    <div class="py-2 bg-white collapse-inner rounded">
                        <a class="collapse-item" href="allProduct.php">All product</a>
                        <a class="collapse-item" href="checkProduct.php">Check product</a>
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
        <div class="flex-column d-flex" id="content-wrapper">
            <div id="content">
                <nav class="shadow mb-4 bg-white navbar navbar-expand navbar-light static-top topbar">
                    <button class="btn btn-link d-md-none mr-3 rounded-circle" id="sidebarToggleTop">
                        <i class="fa fa-bars"></i>
                    </button>
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
                                <img class="rounded-circle img-profile"
                                    src="https://cdn-icons-png.flaticon.com/512/9703/9703596.png" />
                            </a>

                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="align-items-center justify-content-between d-sm-flex mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block shadow-sm" href="#" onclick="print()">
                            <i class="fas fa-sm fa-download text-white-50"></i>
                          Print Report
                        </a>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-6 col-xl-3">
                            <div class="shadow card h-100 py-2 border-left-primary">
                                <div class="card-body">
                                    <div class="align-items-center no-gutters row">
                                        <div class="mr-2 col">
                                            <div class="font-weight-bold mb-1 text-uppercase text-xs text-primary">
                                                Earnings (Monthly)</div>
                                            <div class="font-weight-bold h5 mb-0 text-gray-800" id="earning_monthly">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-2x text-gray-300 fa-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6 col-xl-3">
                            <div class="shadow card h-100 py-2 border-left-success">
                                <div class="card-body">
                                    <div class="align-items-center no-gutters row">
                                        <div class="mr-2 col">
                                            <div class="font-weight-bold mb-1 text-uppercase text-xs text-success">
                                                Earnings (Annual)</div>
                                            <div class="font-weight-bold h5 mb-0 text-gray-800" id="earning_annual">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-2x text-gray-300 fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6 col-xl-3">
                            <div class="shadow card h-100 py-2 border-left-info">
                                <div class="card-body">
                                    <div class="align-items-center no-gutters row">
                                        <div class="mr-2 col">
                                            <div class="font-weight-bold mb-1 text-uppercase text-xs text-info">Books
                                                sold
                                            </div>
                                            <div class="align-items-center no-gutters row">
                                                <div class="col-auto">
                                                    <div class="font-weight-bold h5 mb-0 text-gray-800 mr-3"
                                                        id="books_sold"></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-book" style="font-size: x-large"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6 col-xl-3">
                            <div class="shadow card h-100 py-2 border-left-warning">
                                <div class="card-body">
                                    <div class="align-items-center no-gutters row">
                                        <div class="mr-2 col">
                                            <div class="font-weight-bold mb-1 text-uppercase text-xs text-warning">
                                                Users</div>
                                            <div class="font-weight-bold h5 mb-0 text-gray-800" id="users"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-user-group" style="font-size: x-large"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="shadow card mb-4">
                                <div
                                    class="align-items-center d-flex card-header flex-row justify-content-between py-3">
                                    <h6 class="font-weight-bold text-primary m-0">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"
                                            aria-haspopup="true" id="dropdownMenuLink" role="button">
                                            <i class="fas fa-fw fa-sm text-gray-400 fa-ellipsis-v"></i>
                                        </a>
                                        <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" style="height:360px">
                                    <div class="chart-area">
                                        <canvas id="AreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="shadow card mb-4">
                                <div
                                    class="align-items-center d-flex card-header flex-row justify-content-between py-3">
                                    <h6 class="font-weight-bold text-primary m-0">Category Distribution</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"
                                            aria-haspopup="true" id="dropdownMenuLink" role="button">
                                            <i class="fas fa-fw fa-sm text-gray-400 fa-ellipsis-v"></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="card-body row align-items-center justify-content-center" style="height:360px">
                                    <div class="col-10 pt-3 pb-2" style="min-width:300px">
                                        <canvas id="PieChart"></canvas>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="my-auto container">
                    <div class="my-auto copyright text-center">
                        <span>Copyright © Your Website 2021</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="rounded scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div class="fade modal" aria-labelledby="exampleModalLabel" aria-hidden="true" id="logoutModal" role="dialog"
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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let allOrder = []; // เก็บข้อมูลทั้งหมดไว้ที่นี่
        let users = []

        async function loadProduct() {
            try {
                const response = await fetch('http://localhost:9090/api/api.php/orders');
                const responseU = await fetch('http://localhost:9090/api/api.php/users');

                if (!response.ok && !responseU.ok) throw new Error("network response was not ok");

                allOrder = await response.json(); // เก็บข้อมูลใส่ตัวแปร Global
                users = await responseU.json();



                let orderSuccess = allOrder.filter(order => order.order_status === "success");
                showInfo(orderSuccess, users)
                showChart(orderSuccess);

            } catch (error) {
                console.error("something wrong, " + error);
            }
        }

        loadProduct();
        function showInfo(orderData, users) {
            let earnings_monthly = 0;
            let earnings_annual = 0;
            let books_sold = 0;
            let users_count = 0;
            orderData.forEach(order => {
                if (order.order_status === "success") {
                    const orderDate = new Date(order.date_order);
                    const currentDate = new Date();
                    const oneMonthAgo = new Date();
                    oneMonthAgo.setMonth(currentDate.getMonth() - 1);
                    const oneYearAgo = new Date();
                    oneYearAgo.setFullYear(currentDate.getFullYear() - 1);

                    if (orderDate >= oneMonthAgo) {
                        let totalPrice = order.order_items.reduce((total, item) => {
                            return total + item.price * item.amount;
                        }, 0);
                        earnings_monthly += totalPrice;
                    }

                    if (orderDate >= oneYearAgo) {
                        let totalPrice = order.order_items.reduce((total, item) => {
                            return total + item.price * item.amount;
                        }, 0);
                        earnings_annual += totalPrice;
                    }


                    let booksCount = order.order_items.reduce((total, item) => {
                        return total + Number(item.amount);
                    }, 0);



                    books_sold += parseFloat(booksCount); // สมมติว่าแต่ละ order มี order_items เป็น array ของสินค้าที่ขาย
                }
            });


            document.getElementById("earning_monthly").innerText = "$ " + earnings_monthly;
            document.getElementById("earning_annual").innerText = "$ " + earnings_annual;
            document.getElementById("books_sold").innerText = books_sold;
            document.getElementById("users").innerText = users.length

        }



        function showChart(orderData) {

            const ctx = document.getElementById('AreaChart').getContext('2d');
            const currentYear = new Date().getFullYear();
            const currentMonth = new Date().getMonth(); // 0-11
            const saleData = {
                'January': 0,
                'February': 0,
                'March': 0,
                'April': 0,
                'May': 0,
                'June': 0,
                'July': 0,
                'August': 0,    
                'September': 0,
                'October': 0,
                'November': 0,
                'December': 0
            };

            orderData.forEach(order => {
                const orderDate = new Date(order.date_order);
                const orderYear = orderDate.getFullYear();
                const orderMonth = orderDate.getMonth(); // 0-11

                if (orderYear === currentYear) {
                    let totalPrice = order.order_items.reduce((total, item) => {
                        return total + item.price * item.amount;
                    }, 0);
                    const monthNames = Object.keys(saleData);
                    saleData[monthNames[orderMonth]] += totalPrice; // สมมติว่าแต่ละ order มี order_items เป็น array ของสินค้าที่ขาย
                }
            });

            new Chart(ctx, {
                type: 'bar', // เปลี่ยนเป็น 'line', 'pie', 'doughnut' ได้
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'monthly sales',
                        data: [saleData['January'], saleData['February'], saleData['March'], saleData['April'], saleData['May'], saleData['June'], saleData['July'], saleData['August'], saleData['September'], saleData['October'], saleData['November'], saleData['December']], // ข้อมูลแกน Y
                        backgroundColor: ['red', 'blue', 'green']
                    }]
                }
            });


            const ctx2 = document.getElementById('PieChart').getContext('2d');
            const categoryData ={
                'how to': 0,
                'mindset': 0,
                'story': 0,
                'history': 0
            }

            orderData.forEach(order => {
                order.order_items.forEach(item => {
                    if (item.category in categoryData) {
                        categoryData[item.category] += Number(item.amount); // สมมติว่า item มี property 'category' และ 'amount'
                    }
                });
            });

            console.log(categoryData);
            
            
           
            new Chart(ctx2, {
                type: 'pie', // เปลี่ยนเป็น 'line', 'pie', 'doughnut' ได้
                data: {
                    labels: ['how to', 'mindset', 'story', 'history'],
                    datasets: [{
                        label: 'monthly sales',
                        data: [categoryData['how to'], categoryData['mindset'], categoryData['story'], categoryData['history']], // ข้อมูลแกน Y
                        backgroundColor: ['red', 'blue', 'green', 'yellow']
                    }]
                }
            });

        }

    </script>

</body>

</html>