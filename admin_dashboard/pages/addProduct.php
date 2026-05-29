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
            <li class="nav-item ">
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
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Product management</span>
                </a>
                <div class="collapse" id="collapseProduct">
                    <div class="py-2 bg-white collapse-inner rounded">
                        <a class="collapse-item" href="allProduct.php">All product</a>
                        <a class="collapse-item" href="checkProduct.php">Check product</a>
                        <a class="collapse-item active" href="addProduct.php">Add product</a>
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
                    <button class="mr-3 btn btn-link d-md-none rounded-circle" id="sidebarToggleTop">
                        <i class="fa fa-bars"></i>
                    </button>
                    <form
                        class="d-none d-sm-inline-block form-inline ml-md-3 mr-auto mw-100 my-2 my-md-0 navbar-search">
                        <div class="input-group">
                            <input class="small bg-light border-0 form-control" type="text" placeholder="Search for..."
                                aria-describedby="basic-addon2" aria-label="Search" />
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
                    <form class="col ">
                        <div class="row">
                            <div class="" style="width: 50%;">
                                <div class="col-md-6">
                                    <label class="form-label" for="inputBookName4">BookName</label>
                                    <input class="form-control" type="BookName" id="inputBookName4"
                                        placeholder="Book name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="inputAuthorName4">AuthorName</label>
                                    <input class="form-control" type="AuthorName" id="inputAuthorName4"
                                        placeholder="Author name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="inputPrice4">Price</label>
                                    <input class="form-control" type="Price" id="inputPrice4" placeholder="0.0000" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="inputDateImport">Date Import</label>
                                    <input class="form-control" type="date" id="inputDateImport"
                                        placeholder="xx/xx/xx" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="inputCount2">Count</label>
                                    <input class="form-control" type="text" id="inputCount2" placeholder="123..." />
                                </div>
                                <div class="col-md-6 my-2 " style="display: flex; flex-direction: column;">
                                    <label class="form-label" for="inputDescription">Description</label>
                                    <textarea name="description" id="description" class="rounded p-2"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="inputCategory">Category</label>
                                    <select class="form-select" id="inputCategory">
                                        <option selected="selected">How to</option>
                                        <option>Story</option>
                                        <option>History</option>
                                        <option>Mindset</option>
                                    </select>
                                </div>
                                <div class="py-2 col-md-4">
                                    <label for="image">Select Image</label>
                                    <input type="file" id="selectImage">
                                </div>
                            </div>
                            <div class=" p-2" style="width: 50%;">
                                <div class="rounded h-100 w-100 justify-content-center align-items-center relative"
                                    style="display: flex; background-color: rgb(217, 235, 250);">
                                    <div
                                        style="width: 400px;max-height: 600px; position: relative; text-align: center;">
                                        <i class="fa-regular fa-images" style="font-size: 100px;" id="image-icon"></i>

                                        <img src="#" alt="image seleted" id="showImage"
                                            style="display: none; object-fit: cover;  width: 100%; max-height: 500px;">

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2" style="position: relative; left: 50%; translate: -56px;">
                            <button class="btn btn-primary" type="submit">Add Now</button>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const selectImage = document.getElementById("selectImage");
        const showImage = document.getElementById("showImage");
        selectImage.addEventListener('change', (event) => {
            const file = event.target.files[0]
            if (file) {
                const objectURL = URL.createObjectURL(file)
                showImage.src = objectURL;
                showImage.style.display = 'block';
                document.getElementById("image-icon").style.display = "none"
                showImage.onload = () => URL.revokeObjectURL(objectURL);
            }
        })

    </script>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>



</body>

</html>