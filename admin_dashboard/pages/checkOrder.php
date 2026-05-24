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
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider" />
            <hr class="sidebar-divider" />
            <div class="sidebar-heading">Addons</div>
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Order</span>
                </a>
                <div class="collapse" id="collapseOrder">
                    <div class="py-2 bg-white collapse-inner rounded">
                        <h6 class="collapse-header">Order detail :</h6>
                        <a class="collapse-item" href="..allOrder.php">All</a>
                        <a class="collapse-item" href="newOrder.php">New order</a>
                        <a class="collapse-item active" href="checkOrder.php">Check order</a>
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
                                <span class="badge badge-counter badge-danger">3+</span>
                            </a>
                            <div class="shadow animated--grow-in dropdown-menu dropdown-menu-right dropdown-list"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">Alerts Center</h6>
                                <a href="#" class="dropdown-item align-items-center d-flex">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas text-white fa-file-alt"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item align-items-center d-flex">
                                    <div class="mr-3">
                                        <div class="bg-success icon-circle">
                                            <i class="fas text-white fa-donate"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item align-items-center d-flex">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas text-white fa-exclamation-triangle"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item small text-center text-gray-500">Show All Alerts</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
                                aria-haspopup="true" id="messagesDropdown" role="button">
                                <i class="fas fa-fw fa-envelope"></i>
                                <span class="badge badge-counter badge-danger">7</span>
                            </a>
                            <div class="shadow animated--grow-in dropdown-menu dropdown-menu-right dropdown-list"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">Message Center</h6>
                                <a href="#" class="dropdown-item align-items-center d-flex">
                                    <div class="mr-3 dropdown-list-image">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="..." />
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item align-items-center d-flex">
                                    <div class="mr-3 dropdown-list-image">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="..." />
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item align-items-center d-flex">
                                    <div class="mr-3 dropdown-list-image">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="..." />
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item align-items-center d-flex">
                                    <div class="mr-3 dropdown-list-image">
                                        <img class="rounded-circle" src="http://ssource.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="..." />
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item small text-center text-gray-500">Read More Messages</a>
                            </div>
                        </li>
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"
                                aria-haspopup="true" id="userDropdown" role="button">
                                <span class="small d-lg-inline d-none mr-2 text-gray-600">Douglas McGee</span>
                                <img class="rounded-circle img-profile" src="img/undraw_profile.svg" />
                            </a>
                            <div class="shadow animated--grow-in dropdown-menu dropdown-menu-right"
                                aria-labelledby="userDropdown">
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-fw fa-sm mr-2 text-gray-400 fa-user"></i>
                                    Profile
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-fw fa-sm mr-2 text-gray-400 fa-cogs"></i>
                                    Settings
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-fw fa-sm mr-2 text-gray-400 fa-list"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-fw fa-sm mr-2 text-gray-400 fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Check Order</h1>

                    <div class="shadow mb-4 card">
                        <div class="card-header py-3">
                            <button class="btn bg-primary text-white">Success</button>
                            <button class="btn bg-primary text-white">Transferring</button>
                            <button class="btn bg-primary text-white">Order fail</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table cellspacing="0" class="table table-bordered" id="dataTable" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Product Image</th>
                                            <th>Total Price</th>
                                            <th>Count</th>
                                            <th>User Name</th>
                                            <th>Bill</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><a href="#" title="order detail">0001</a></td>
                                            <td>Rich dad poor dad</td>
                                            <td>
                                                <div>
                                                    <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                                        alt="product image" height="60" width="50">
                                                </div>
                                            </td>
                                            <td>$ 30</td>
                                            <td>2</td>
                                            <td>kongmeng</td>
                                            <td>
                                                <a href="#" title="check bill">
                                                    <img src="https://th.bing.com/th/id/R.ad99ef4a0f25319dfb919efb3d32174c?rik=0gCgxcbt6nkgpg&riu=http%3a%2f%2fclipartmag.com%2fimages%2fbill-clipart-6.png&ehk=xMyVVDt%2fpRyBdEJ4FJLrPdFg%2bpclrJEfX0%2bfXwWiANI%3d&risl=&pid=ImgRaw&r=0"
                                                        alt="bill" height="60" width="50">
                                                </a>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td><a href="#" title="order detail">0001</a></td>
                                            <td>Rich dad poor dad</td>
                                            <td>
                                                <div>
                                                    <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                                        alt="product image" height="60" width="50">
                                                </div>
                                            </td>
                                            <td>$ 30</td>
                                            <td>2</td>
                                            <td>kongmeng</td>
                                            <td>
                                                <a href="#" title="check bill">
                                                    <img src="https://th.bing.com/th/id/R.ad99ef4a0f25319dfb919efb3d32174c?rik=0gCgxcbt6nkgpg&riu=http%3a%2f%2fclipartmag.com%2fimages%2fbill-clipart-6.png&ehk=xMyVVDt%2fpRyBdEJ4FJLrPdFg%2bpclrJEfX0%2bfXwWiANI%3d&risl=&pid=ImgRaw&r=0"
                                                        alt="bill" height="60" width="50">
                                                </a>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td><a href="#" title="order detail">0001</a></td>
                                            <td>Rich dad poor dad</td>
                                            <td>
                                                <div>
                                                    <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                                        alt="product image" height="60" width="50">
                                                </div>
                                            </td>
                                            <td>$ 30</td>
                                            <td>2</td>
                                            <td>kongmeng</td>
                                            <td>
                                                <a href="#" title="check bill">
                                                    <img src="https://th.bing.com/th/id/R.ad99ef4a0f25319dfb919efb3d32174c?rik=0gCgxcbt6nkgpg&riu=http%3a%2f%2fclipartmag.com%2fimages%2fbill-clipart-6.png&ehk=xMyVVDt%2fpRyBdEJ4FJLrPdFg%2bpclrJEfX0%2bfXwWiANI%3d&risl=&pid=ImgRaw&r=0"
                                                        alt="bill" height="60" width="50">
                                                </a>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td><a href="#" title="order detail">0001</a></td>
                                            <td>Rich dad poor dad</td>
                                            <td>
                                                <div>
                                                    <img src="https://cdn.gramedia.com/uploads/items/9786020333175_rich-dad-poor-dad-_edisi-revisi_.jpg"
                                                        alt="product image" height="60" width="50">
                                                </div>
                                            </td>
                                            <td>$ 30</td>
                                            <td>2</td>
                                            <td>kongmeng</td>
                                            <td>
                                                <a href="#" title="check bill">
                                                    <img src="https://th.bing.com/th/id/R.ad99ef4a0f25319dfb919efb3d32174c?rik=0gCgxcbt6nkgpg&riu=http%3a%2f%2fclipartmag.com%2fimages%2fbill-clipart-6.png&ehk=xMyVVDt%2fpRyBdEJ4FJLrPdFg%2bpclrJEfX0%2bfXwWiANI%3d&risl=&pid=ImgRaw&r=0"
                                                        alt="bill" height="60" width="50">
                                                </a>
                                            </td>
                                        </tr>



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

</body>

</html>