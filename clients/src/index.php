<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopSystem</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts for a modern look -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <!-- Brand Logo -->
                <a class="navbar-brand" href="index.php">
                    <!-- <img src="./images/gemini.jpg" alt="Logo" width="30"
                        height="24" class="d-inline-block align-text-top me-2"> -->
                    E-book
                </a>

                <!-- Mobile Toggle Button -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links and Actions -->
                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Product.php">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="order.php">Order</a>
                        </li>

                    </ul>

                    <!-- Search Bar -->
                    <form class="d-flex gap-2" role="search">
                        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search..."
                            aria-label="Search">
                        <!-- <button class="btn btn-outline-primary btn-search" type="submit">Search</button> -->
                        <button class="btn btn-outline-primary btn-search " type="submit">
                            <a href="signup.php" class="text-decoration-none">SignUp</a>
                        </button>
                        <button class="btn btn-outline-primary btn-search " type="submit">
                            <a href="Cart.php" class="text-decoration-none">
                                Cart
                            </a>
                        </button>

                    </form>
                </div>
            </div>
        </nav>
        <!-- Hero Section -->
        <header class="container mt-5 pt-4 mb-4">
            <div class="row">
                <div class="col-12">
                    <h6 class="text-primary fw-bold text-uppercase small mb-2" style="letter-spacing: 1px;">Product
                    </h6>
                    <h1 class="display-5 fw-bold text-dark">Explore e-book</h1>
                </div>
            </div>
        </header>
        <main class="container mb-5">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

                <!-- Product 1 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="/assets/Logo.jpg" class="img-fluid w-100" alt="Aether Pro">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Audio</p>
                            <h6 class="card-title fw-bold mb-2">Aether Pro Wireless</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Hi-Res audio with active noise
                                cancellation.</p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$249</span>
                                <div class="d-flex gap-2">

                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold" onclick="">add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="/assets/car.jpg" class="img-fluid w-100" alt="Dock">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Accessory</p>
                            <h6 class="card-title fw-bold mb-2">PowerDock V2</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Multi-device wireless charging
                                station.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$89</span>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                            class="bi bi-plus-lg" id="Plus-function"></i></button>
                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="/assets/myimages.jpg" class="img-fluid w-100" alt="Voyage">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Travel</p>
                            <h6 class="card-title fw-bold mb-2">Voyager Hard Case</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Military-grade protection for gear.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$45</span>
                                <div class="d-flex gap-2">

                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="https://placehold.co/600x600/ec4899/ffffff?text=Mic" class="img-fluid w-100"
                                alt="Mic">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Studio</p>
                            <h6 class="card-title fw-bold mb-2">Studio Condenser</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$199</span>
                                <div class="d-flex gap-2">

                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="/assets/car.jpg" class="img-fluid w-100" alt="Mic">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Studio</p>
                            <h6 class="card-title fw-bold mb-2">Studio Condenser</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$199</span>
                                <div class="d-flex gap-2">

                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="https://placehold.co/600x600/ec4899/ffffff?text=Mic" class="img-fluid w-100"
                                alt="Mic">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Studio</p>
                            <h6 class="card-title fw-bold mb-2">Studio Condenser</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$199</span>
                                <div class="d-flex gap-2">

                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="https://placehold.co/600x600/ec4899/ffffff?text=Mic" class="img-fluid w-100"
                                alt="Mic">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Studio</p>
                            <h6 class="card-title fw-bold mb-2">Studio Condenser</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$199</span>
                                <div class="d-flex gap-2">

                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="https://placehold.co/600x600/ec4899/ffffff?text=Mic" class="img-fluid w-100"
                                alt="Mic">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Studio</p>
                            <h6 class="card-title fw-bold mb-2">Studio Condenser</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$199</span>
                                <div class="d-flex gap-2">

                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="https://placehold.co/600x600/ec4899/ffffff?text=Mic" class="img-fluid w-100"
                                alt="Mic">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Studio</p>
                            <h6 class="card-title fw-bold mb-2">Studio Condenser</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$199</span>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="https://placehold.co/600x600/ec4899/ffffff?text=Mic" class="img-fluid w-100"
                                alt="Mic">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Studio</p>
                            <h6 class="card-title fw-bold mb-2">Studio Condenser</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$199</span>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="https://placehold.co/600x600/ec4899/ffffff?text=Mic" class="img-fluid w-100"
                                alt="Mic">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Studio</p>
                            <h6 class="card-title fw-bold mb-2">Studio Condenser</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$199</span>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to card</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-2">
                        <div class="bg-body-secondary rounded-4 overflow-hidden mb-3">
                            <img src="https://placehold.co/600x600/ec4899/ffffff?text=Mic" class="img-fluid w-100"
                                alt="Mic">
                        </div>
                        <div class="card-body p-2 d-flex flex-column">
                            <p class="text-uppercase text-muted fw-bold mb-1"
                                style="font-size: 0.7rem; letter-spacing: 0.5px;">Studio</p>
                            <h6 class="card-title fw-bold mb-2">Studio Condenser</h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                                <span class="fw-bold fs-5 text-primary">$199</span>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary rounded-3 px-3 fw-semibold">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>




        <!-- this is footer section  -->
        <footer class="bg-dark text-white pt-5 pb-4 mt-5">
            <div class="container">
                <div class="row g-4">

                    <!-- Brand & Newsletter -->
                    <div class="col-lg-4 col-md-12">
                        <h5 class="fw-bold mb-4 d-flex align-items-center">
                            <div class="bg-primary rounded-2 p-1 me-2 d-flex align-items-center justify-content-center"
                                style="width: 28px; height: 28px;">
                                <i class="bi bi-lightning-fill text-white fs-6"></i>
                            </div>
                            AETHER
                        </h5>
                        <p class="text-secondary small mb-4">Elevating your digital experience with premium hardware and
                            innovative accessories. Designed for creators, by creators.</p>

                        <h6 class="small fw-bold text-uppercase mb-3" style="letter-spacing: 1px;">Stay Updated</h6>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bg-dark border-secondary text-white shadow-none"
                                placeholder="Enter your email" aria-label="Newsletter">
                            <button class="btn btn-primary fw-bold" type="button">Join</button>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <div class="col-lg-2 col-md-4 col-6">
                        <h6 class="small fw-bold text-uppercase mb-4 text-primary" style="letter-spacing: 1px;">Shop
                        </h6>
                        <ul class="list-unstyled text-secondary small">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-reset">All Products</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-reset">New Arrivals</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Best Sellers</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Gift Cards</a></li>
                        </ul>
                    </div>

                    <!-- Support Links -->
                    <div class="col-lg-2 col-md-4 col-6">
                        <h6 class="small fw-bold text-uppercase mb-4 text-primary" style="letter-spacing: 1px;">Support
                        </h6>
                        <ul class="list-unstyled text-secondary small">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Order Status</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Shipping Policy</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Returns & Refunds</a>
                            </li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-reset">Help Center</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-4 col-md-4">
                        <h6 class="small fw-bold text-uppercase mb-4 text-primary" style="letter-spacing: 1px;">Connect
                        </h6>
                        <div class="d-flex gap-3 mb-4">
                            <a href="#"
                                class="btn btn-outline-secondary btn-sm border-secondary text-white rounded-circle"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="#"
                                class="btn btn-outline-secondary btn-sm border-secondary text-white rounded-circle"><i
                                    class="bi bi-twitter-x"></i></a>
                            <a href="#"
                                class="btn btn-outline-secondary btn-sm border-secondary text-white rounded-circle"><i
                                    class="bi bi-youtube"></i></a>
                            <a href="#"
                                class="btn btn-outline-secondary btn-sm border-secondary text-white rounded-circle"><i
                                    class="bi bi-tiktok"></i></a>
                        </div>
                        <ul class="list-unstyled text-secondary small">
                            <li class="mb-2"><i class="bi bi-geo-alt me-2"></i> 123 Innovation Dr, CA 94025</li>
                            <li class="mb-2"><i class="bi bi-envelope me-2"></i> hello@aether.com</li>
                        </ul>
                    </div>

                </div>

                <!-- Copyright & Legal -->
                <hr class="border-secondary my-4">
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0 text-secondary smaller">&copy; 2024 Aether Electronics Inc. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                        <ul class="list-inline mb-0 smaller">
                            <li class="list-inline-item me-3"><a href="#"
                                    class="text-decoration-none text-secondary">Privacy Policy</a></li>
                            <li class="list-inline-item me-3"><a href="#"
                                    class="text-decoration-none text-secondary">Terms of Service</a></li>
                            <li class="list-inline-item"><a href="#" class="text-decoration-none text-secondary">Cookie
                                    Settings</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Cart Sidebar (Offcanvas) -->
        <div class="offcanvas offcanvas-end border-0 shadow rounded-start-5" tabindex="-1" id="cartSidebar">
            <div class="offcanvas-header p-4">
                <h5 class="offcanvas-title fw-bold fs-4">Your Bag</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-4">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-4 bg-light p-3 rounded-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-secondary-subtle rounded-3 p-1 me-3" style="width: 50px; height: 50px;">
                                <img src="https://placehold.co/50x50/6366f1/ffffff?text=A" class="img-fluid rounded-2"
                                    alt="p">
                            </div>
                            <div>
                                <p class="mb-0 fw-bold small">Aether Pro Wireless</p>
                                <p class="mb-0 text-muted small">$249.00</p>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-white border-0 text-danger"><i class="bi bi-trash"></i></button>
                    </div>
                </div>

                <div class="border-top pt-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fw-semibold text-muted">Estimated Total</span>
                        <span class="fw-bold fs-4 text-primary">$249.00</span>
                    </div>
                    <button class="btn btn-primary w-100 py-3 rounded-4 fw-bold shadow-sm">Checkout Now</button>
                </div>
            </div>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">



        </script>
    </body>

    </html>





    <!-- php section  -->



</body>

</html>