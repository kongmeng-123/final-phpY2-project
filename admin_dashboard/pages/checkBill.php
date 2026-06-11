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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    #btn_success,
    #btn_fail,
    #btn_wait {
        color: rgb(131, 131, 131);
    }

    #btn_success:hover {
        color: rgb(3, 217, 3);

    }

    #btnc_success:active {
        color: rgb(3, 217, 3);
    }

    #btn_fail:hover {
        color: rgb(255, 0, 0);


    }

    #btn_wait:hover {
        color: rgb(0, 0, 255);


    }
</style>

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
            <li class="nav-item active">
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
                <div class="container-fluid row justify-content-center" style="width: 100%;">
                    <div class="py-2 " style="gap:20px; display: flex;flex-direction: column;">

                        <div style="height: 70vh; width: 35vh; ">
                            <img src="../img/bill-one.jpg" alt="bill image" style="height: 100% ; width:100%; " />

                        </div>
                        <div style="font-size: 30px;" class="col align-items-center">
                            <div class="row justify-content-center">

                                <i class="fa-regular fa-circle-check " id="btn_success" title="success"
                                    onclick="chooseStatus('success')"></i>
                                <i class="fa-solid fa-ban " id="btn_fail" title="fail"
                                    onclick="chooseStatus('fail')"></i>
                                <i class="fa-regular fa-circle-pause" id="btn_wait" title="wait"
                                    onclick="chooseStatus('wait')"></i>

                            </div>
                            <div>
                                <a href="checkPayment.php">
                                    <button class="btn bg-primary w-100 text-white" onclick="updateStatus()">OK</button>
                                </a>
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
            const urlParams = new URLSearchParams(window.location.search);
            const orderId = urlParams.get('order_id');
            console.log("Order ID from URL:", orderId);

            let allOrder = []; // เก็บข้อมูลทั้งหมดไว้ที่นี่

            async function loadProduct() {
                try {
                    const response = await fetch('http://localhost:9090/api/api.php/orders');

                    if (!response.ok) throw new Error("network response was not ok");

                    allOrder = await response.json(); // เก็บข้อมูลใส่ตัวแปร Global
                    console.log("All Orders:", allOrder); // ตรวจสอบข้อมูลที่ได้รับ
                    randerStatus(allOrder);

                } catch (error) {
                    console.error("something wrong, " + error);
                }
            }
            loadProduct();



            let btn_success = document.getElementById("btn_success");
            let btn_fail = document.getElementById("btn_fail");
            let btn_wait = document.getElementById("btn_wait");
            let bill_status = "";

            function randerStatus(data) {
                const currentOrder = data.find(item => item.order_id == orderId);

                if (currentOrder && currentOrder.bill_status) {

                    chooseStatus(currentOrder.bill_status);

                }
            }

            function chooseStatus(status) {
                console.log(status);
                bill_status = status;

                // สเต็ปที่ 1: ล้างไพ่! เปลี่ยนทุกปุ่มให้เป็นสีเทาก่อนทั้งหมด
                btn_success.style.color = "rgb(131, 131, 131)";
                btn_fail.style.color = "rgb(131, 131, 131)";
                btn_wait.style.color = "rgb(131, 131, 131)";

                // สเต็ปที่ 2: เจาะจงเปลี่ยนสีเฉพาะปุ่มที่ถูกเลือกเท่านั้น
                switch (status) {
                    case "success":
                        btn_success.style.color = "rgb(3, 217, 3)";
                        break;
                    case "fail":
                        btn_fail.style.color = "rgb(255, 0, 0)";
                        break;
                    case "wait":
                        btn_wait.style.color = "rgb(0, 0, 255)";
                        break;
                }

            }
            // ฟังก์ชันส่งค่าไปอัปเดตที่ฝั่ง Server (API)
            function updateStatus() {
                // 1. ตรวจสอบก่อนว่ามีข้อมูลพร้อมส่งไหม
                if (!orderId) {
                    alert("ไม่พบรหัสออเดอร์ (orderId)");
                    return;
                }
                if (!bill_status) {
                    alert("กรุณาเลือกสถานะก่อนกดบันทึก");
                    return;
                }

                // 2. กำหนด URL โดยเอา orderId ไปต่อท้ายตามโครงสร้าง API ของคุณ
                const apiUrl = `http://localhost:9090/api/api.php/orders/${orderId}`;

                // 3. เตรียม Data ที่จะส่ง (ส่งฟิลด์ "status" ให้ตรงกับ $allowedFields ใน PHP)
                const dataToSend = {
                    order_id: orderId, // อาจจะไม่จำเป็นต้องส่งก็ได้ถ้า URL มี orderId อยู่แล้ว ขึ้นอยู่กับการออกแบบ API ของคุณ
                    bill_status: bill_status,
                    order_status: bill_status ==="fail" ? "fail": "rendering" 
                };

                // 4. ยิง API ด้วย fetch() แบบสั้นและคลีน
                fetch(apiUrl, {
                    method: "PATCH", // หรือ "PUT" ตามที่หลังบ้านของคุณกำหนดไว้
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(dataToSend)
                })
                    .then(response => {
                        if (!response.ok) {
                            // ถ้าหลังบ้านตอบกลับมาเป็น Error (เช่น 400, 404) ให้โยนข้อผิดพลาดไปที่ .catch
                            return response.json().then(err => { throw err; });
                        }
                        return response.json();
                    })
                    .then(data => {
                        // อัปเดตสำเร็จ!
                        alert("update success!");
                        console.log("Success:", data);

                        // (ตัวเลือกเพิ่มเติม) คุณอาจจะสั่งให้หน้าเว็บรีเฟรชเพื่อแสดงข้อมูลล่าสุด
                        // window.location.reload();
                    })
                    .catch(error => {
                        // จัดการกรณีเกิดข้อผิดพลาด
                        console.error("Error:", error);
                        alert("some thing wrong: " + (error.error || "ไม่สามารถเชื่อมต่อกับเซิร์ฟเวอร์ได้"));
                    });
            }




        </script>

</body>

</html>