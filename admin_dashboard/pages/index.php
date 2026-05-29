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
                        <a class="collapse-item" href="allOrder.php">All</a>
                        <a class="collapse-item" href="newOrder.php">New order</a>
                        <a class="collapse-item" href="checkOrder.php">Check order</a>
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
                                <img class="rounded-circle img-profile" src="https://cdn-icons-png.flaticon.com/512/9703/9703596.png" />
                            </a>
                            
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="align-items-center justify-content-between d-sm-flex mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block shadow-sm" href="#">
                            <i class="fas fa-sm fa-download text-white-50"></i>
                            Generate Report
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
                                            <div class="font-weight-bold h5 mb-0 text-gray-800">$40,000</div>
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
                                            <div class="font-weight-bold h5 mb-0 text-gray-800">$215,000</div>
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
                                            <div class="font-weight-bold mb-1 text-uppercase text-xs text-info">Tasks
                                            </div>
                                            <div class="align-items-center no-gutters row">
                                                <div class="col-auto">
                                                    <div class="font-weight-bold h5 mb-0 text-gray-800 mr-3">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="mr-2 progress progress-sm">
                                                        <div class="bg-info progress-bar" role="progressbar"
                                                            aria-valuemax="100" aria-valuemin="0" aria-valuenow="50"
                                                            style="width: 50%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-2x text-gray-300 fa-clipboard-list"></i>
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
                                                Pending Requests</div>
                                            <div class="font-weight-bold h5 mb-0 text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-2x text-gray-300 fa-comments"></i>
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
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="shadow card mb-4">
                                <div
                                    class="align-items-center d-flex card-header flex-row justify-content-between py-3">
                                    <h6 class="font-weight-bold text-primary m-0">Revenue Sources</h6>
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
                                <div class="card-body">
                                    <div class="chart-pie pb-2 pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="small text-center mt-4">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i>
                                            Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i>
                                            Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i>
                                            Referral
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div clase="p-4">
                            <h3>Top sell 10 products</h3>
                        </div>
                        <table cellspacing="0" class="table table-bordered" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Count</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#" title="product detail">0001</a></td>
                                    <td>Rish dad poor dad</td>
                                    <td>$15</td>
                                    <td>how to</td>
                                    <td>120</td>
                                    <td>
                                        <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                            alt="image book" height="70" width="50" />
                                    </td>
                                    <td>
                                        <div>
                                            <button class="btn text-white bg-warning">edit</button>
                                            <button class="btn badge-danger">del</button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="#" title="product detail">0001</a></td>
                                    <td>Rish dad poor dad</td>
                                    <td>$15</td>
                                    <td>how to</td>
                                    <td>120</td>
                                    <td>
                                        <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                            alt="image book" height="70" width="50" />
                                    </td>
                                    <td>
                                        <div>
                                            <button class="btn text-white bg-warning">edit</button>
                                            <button class="btn badge-danger">del</button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="#" title="product detail">0001</a></td>
                                    <td>Rish dad poor dad</td>
                                    <td>$15</td>
                                    <td>how to</td>
                                    <td>120</td>
                                    <td>
                                        <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                            alt="image book" height="70" width="50" />
                                    </td>
                                    <td>
                                        <div>
                                            <button class="btn text-white bg-warning">edit</button>
                                            <button class="btn badge-danger">del</button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="#" title="product detail">0001</a></td>
                                    <td>Rish dad poor dad</td>
                                    <td>$15</td>
                                    <td>how to</td>
                                    <td>120</td>
                                    <td>
                                        <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                            alt="image book" height="70" width="50" />
                                    </td>
                                    <td>
                                        <div>
                                            <button class="btn text-white bg-warning">edit</button>
                                            <button class="btn badge-danger">del</button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="#" title="product detail">0001</a></td>
                                    <td>Rish dad poor dad</td>
                                    <td>$15</td>
                                    <td>how to</td>
                                    <td>120</td>
                                    <td>
                                        <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                            alt="image book" height="70" width="50" />
                                    </td>
                                    <td>
                                        <div>
                                            <button class="btn text-white bg-warning">edit</button>
                                            <button class="btn badge-danger">del</button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><a href="#" title="product detail">0001</a></td>
                                    <td>Rish dad poor dad</td>
                                    <td>$15</td>
                                    <td>how to</td>
                                    <td>120</td>
                                    <td>
                                        <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                            alt="image book" height="70" width="50" />
                                    </td>
                                    <td>
                                        <div>
                                            <button class="btn text-white bg-warning">edit</button>
                                            <button class="btn badge-danger">del</button>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
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

</body>

</html>