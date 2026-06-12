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
                                <img class="rounded-circle img-profile"
                                    src="https://cdn-icons-png.flaticon.com/512/9703/9703596.png" />
                            </a>

                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <form class="col ">
                        <div class="row">
                            <div class="" style="width: 50%;">
                                <div class="col-md-6">
                                    <label class="form-label" for="BookName">BookName</label>
                                    <input class="form-control" type="BookName" id="BookName" placeholder="Book name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="AuthorName">AuthorName</label>
                                    <input class="form-control" type="AuthorName" id="AuthorName"
                                        placeholder="Author name" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="Price">Price</label>
                                    <input class="form-control" type="Price" id="Price" placeholder="0.00 kip" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="DateImport">Date Import</label>
                                    <input class="form-control" type="date" id="DateImport" placeholder="xx/xx/xx" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="Count">Count</label>
                                    <input class="form-control" type="text" id="Count" placeholder="123..." />
                                </div>
                                <div class="col-md-6 my-2 " style="display: flex; flex-direction: column;">
                                    <label class="form-label" for="Description">Description</label>
                                    <textarea name="description" id="Description" class="rounded p-2"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="Category">Category</label>
                                    <select class="form-select" id="Category">
                                        <option value="how to">How to</option>
                                        <option value="story">Story</option>
                                        <option value="history">History</option>
                                        <option value="mindset">Mindset</option>
                                        <option value="books">Books</option>
                                    </select>
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
                            <a href="allProduct.php">
                                <button class="btn btn-primary" type="button" onclick="handleSubmit()">Update
                                Product</button>
                            </a>
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


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');
        console.log("Product ID from URL:", productId);

        fetch('http://localhost:9090/api/api.php/products')
            .then(response => response.json())
            .then(data => {
                Allproduct = data;
                const product = Allproduct.find(p => p.id == productId);
                if (product) {
                    document.getElementById("BookName").value = product.product_name;
                    document.getElementById("AuthorName").value = product.author;
                    document.getElementById("Price").value = product.price;
                    document.getElementById("DateImport").value = product.import_date;
                    document.getElementById("Count").value = product.count;
                    document.getElementById("Description").value = product.description;
                    document.getElementById("Category").value = product.category;
                    if (product.image_src) {
                        const imageUrl = `../img/${product.image_src}`;
                        const showImage = document.getElementById("showImage");
                        showImage.src = imageUrl;
                        showImage.style.display = 'block';
                        document.getElementById("image-icon").style.display = "none";
                    }
                } else {
                    console.error("Product not found with ID:", productId);
                }
            })
            .catch(error => console.error('Error fetching products:', error));


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
        let bookName = document.getElementById("BookName");
        let authorName = document.getElementById("AuthorName");
        let price = document.getElementById("Price");
        let dateImport = document.getElementById("DateImport");
        let count = document.getElementById("Count");
        let description = document.getElementById("Description");
        let category = document.getElementById("Category");
        let imageSrc = document.getElementById("selectImage");

        function handleSubmit(e) {
            if (e) e.preventDefault(); // ป้องกันหน้าเว็บรีเฟรชตัวเอง

            if (!productId) {
                alert("ไม่พบรหัสสินค้า (Product ID) สำหรับทำการอัปเดต");
                return;
            }

            // 1. จัดการเรื่องรูปภาพ: 
            // ค้นหาข้อมูลเดิมของสินค้าตัวนี้จากตาราง Allproduct ที่โหลดมาตอนแรก
            const currentProduct = Allproduct.find(p => p.id == productId);
            let fileName = currentProduct ? currentProduct.image_src : "";

            // ถ้าผู้ใช้มีการคลิกเลือกรูปภาพใหม่ ให้เปลี่ยนไปใช้ชื่อไฟล์ใหม่
            if (imageSrc.files[0]) {
                fileName = imageSrc.files[0].name;
            }

            // 2. มัดรวมข้อมูลที่จะส่งไปอัปเดต
            const productData = {
                product_name: bookName.value,
                author: authorName.value,
                price: price.value,
                import_date: dateImport.value,
                count: count.value,
                description: description.value,
                category: category.value,
                image_src: fileName // หากไม่ได้เลือกใหม่ จะใช้ชื่อรูปเดิม ไม่โดนลบหาย
            };

            console.log("ข้อมูลที่จะทำการอัปเดต:", productData);

            // 3. กำหนด URL ปลายทางโดยเอา productId ต่อท้ายตามโครงสร้าง API ของคุณ
            const updateUrl = `http://localhost:9090/api/api.php/products/${productId}`;

            // 4. ยิง Fetch ด้วย Method PUT หรือ PATCH 
            fetch(updateUrl, {
                method: 'PUT', // หรือใช้ 'PATCH' ให้ตรงกับระบบหลังบ้านของคุณ
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(productData)
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    alert("Product updated successfully!");
                    console.log("Update Success:", data);

                    // (Optional) ย้ายหน้ากลับไปที่หน้ารายการสินค้าหลักหลังจากบันทึกเสร็จ
                    // window.location.href = "products_list.html";
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert(error.error);
                });
        }
    </script>




</body>

</html>