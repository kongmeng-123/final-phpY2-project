<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width,initial-scale=1,shrink-to-fit=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <title>SB Admin 2 - Tables</title>
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
                    G-Book
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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMarketing">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Marketing</span>
                </a>
                <div class="collapse" id="collapseMarketing">
                    <div class="py-2 bg-white collapse-inner rounded">
                        <a class="collapse-item active" href="promotion.php">Promotion</a>
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
                                <img class="rounded-circle img-profile"
                                    src="https://cdn-icons-png.flaticon.com/512/9703/9703596.png" />
                            </a>

                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">

                    <div class="container-fluid row justify-content-center">
                        <form class="col " style="max-width: 600px;background-color: white;">
                            <div>
                                <div class="col"
                                    style="display:flex; flex-direction:column; gap:20px; padding: 100px 20px">
                                    <div class="col-md-8">
                                        <label class="form-label" for="title">Title</label> <br />
                                        <input class="form-control" type="text" id="title" placeholder="Title" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="discount">Discount</label>
                                        <input class="form-control" type="number" id="discount"
                                            placeholder="Enter discount(%)" />
                                    </div>
                                    <div class="row col-12 justify-content-between px-10">
                                        <div>
                                            <label class="form-label" for="start_date">Start</label>
                                            <input class="form-control" type="date" id="start_date"
                                                placeholder="xx/xx/xx" />
                                        </div>
                                        
                                        <div>
                                            <label class="form-label" for="end_date">End</label>
                                            <input class="form-control" type="date" id="end_date"
                                                placeholder="xx/xx/xx" />
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="col-12 my-4" style="position: relative; left: 50%; translate: -56px;">
                                
                                <button class="btn btn-primary" id="submit_btn" type="button" onclick="handleSubmit()"></button>

                            </div>
                        </form>
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
        const urlParams = new URLSearchParams(window.location.search);
        const orderId = urlParams.get('id');
        console.log("Order ID:", orderId);

        let title = document.getElementById("title");
        let discount = document.getElementById("discount");
        let start_date = document.getElementById("start_date");
        let update_date = document.getElementById("update_date");
        let end_date = document.getElementById("end_date");

        document.getElementById("submit_btn").textContent = orderId ? "Update Now" : "Create Now";

        if(orderId) {
            fetch(`http://localhost:9090/api/api.php/promotions/${orderId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Promotion data:", data);
                    title.value = data.title;
                    discount.value = data.discount;
                    start_date.value = data.start_date;
                    end_date.value = data.end_date;
                })
                .catch(error => {
                    console.error("Error fetching promotion:", error);
                    alert("Failed to fetch promotion details. Please try again.");
                });
        }


        async function handleSubmit() {
            try {
                let response = await fetch("http://localhost:9090/api/api.php/promotions", {
                    method: orderId ? "PUT" : "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    
                    body: JSON.stringify({
                        id: orderId ? orderId : undefined,
                        title: title.value,
                        discount: discount.value,
                        start_date: start_date.value,
                        end_date: end_date.value
                    })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                let data = await response.json();
                alert("Promotion " + (orderId ? "updated" : "created") + " successfully!");
                window.location.href = "promotion.php";

            } catch (error) {
                console.error("Error creating promotion:", error);
                alert("Failed to create promotion. Please try again.");
            }
        }



    </script>

</body>

</html>