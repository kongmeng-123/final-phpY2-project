<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping-center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="/home">
                <!-- <img src="./images/gemini.jpg" alt="Logo" width="30"
                        height="24" class="d-inline-block align-text-top me-2"> -->
                E-book
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
                aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links and Actions -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product.php">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/order.php">Order</a>
                    </li>

                </ul>

                <!-- Search Bar -->
                <form class="d-flex gap-2" role="search" action="" method="get">
                    <input class="form-control me-2 rounded-pill" type="search" name="q" placeholder="Search..."
                        aria-label="Search">
                    <button class="btn btn-outline-primary btn-search" type="button" onclick="location.href='signup.php'">Sign Up</button>
                    <button class="btn btn-outline-primary btn-search" type="button" onclick="location.href='cart.php'">Cart</button>
                </form>
            </div>
        </div>
    </nav>

    <header class="container mt-5 pt-4 mb-4">
        <div class="row">
            <div class="col-12">
                <h6 class="text-primary fw-bold text-uppercase small mb-2" style="letter-spacing: 1px;">Product & Category
                </h6>
                <h5 class="display-5 fw-bold text-dark">Explore e-book</h5>
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
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Multi-device wireless charging station.
                        </p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$89</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Military-grade protection for gear.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$45</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$199</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$199</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$199</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$199</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$199</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$199</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$199</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$199</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
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
                        <p class="card-text text-muted small mb-3 flex-grow-1">Professional recording microphone.</p>
                        <div class="d-flex align-items-center justify-content-between mt-auto pt-3 border-top">
                            <span class="fw-bold fs-5 text-primary">$199</span>
                            <div class="d-flex gap-2">
                                <button class="btn btn-light rounded-3 px-2 py-1 border text-dark"><i
                                        class="bi bi-plus-lg"></i></button>
                                <button class="btn btn-primary rounded-3 px-3 fw-semibold">Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const CART_KEY = 'nuol_cart';

        function getCart() {
            return JSON.parse(localStorage.getItem(CART_KEY) || '[]');
        }

        function saveCart(cart) {
            localStorage.setItem(CART_KEY, JSON.stringify(cart));
        }

        function updateCartCount() {
            const cart = getCart();
            const count = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.getElementById('cart-count-badge');
            if (badge) badge.textContent = count;
        }

        function addToCart(product) {
            const cart = getCart();
            const existing = cart.find(item => item.id === product.id);
            if (existing) {
                existing.qty += 1;
            } else {
                cart.push(product);
            }
            saveCart(cart);
            updateCartCount();
            alert(`${product.name} has been added to your cart.`);
        }

        function parsePrice(priceText) {
            return parseFloat(priceText.replace(/[^0-9.]/g, '')) || 0;
        }

        document.querySelectorAll('.card .btn-primary').forEach(button => {
            button.addEventListener('click', () => {
                const card = button.closest('.card');
                if (!card) return;
                const name = card.querySelector('.card-title')?.textContent.trim();
                const priceText = card.querySelector('.text-primary')?.textContent || '';
                const img = card.querySelector('img')?.getAttribute('src') || '';
                if (!name) return;
                const id = name.toLowerCase().replace(/[^a-z0-9]+/g, '-');
                addToCart({ id, name, price: parsePrice(priceText), qty: 1, img });
            });
        });

        updateCartCount();
    </script>
</body>

</html>