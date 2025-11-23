<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KarawoHub</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .navbar {
            background: #ffffff !important;
            border-bottom: 1px solid #eee;
            padding: 6px 0;
        }

        .navbar-brand img {
            width: 38px;
            height: auto;
        }

        .navbar-brand span {
            font-size: 15px;
            font-weight: 600;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .navbar-nav .nav-link {
            font-weight: 400;
            color: #333 !important;
            padding: 6px 10px;
        }

        .navbar-nav .nav-link:hover {
            color: #000 !important;
        }

        .navbar .bi {
            font-size: 18px;
            color: #333;
            transition: 0.2s;
        }

        .navbar .bi:hover {
            color: #000;
        }

        .navbar .d-flex.gap-3 > a {
            display: flex;
            align-items: center;
        }

        @media (max-width: 991px) {
            .mx-auto {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container d-flex align-items-center">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="https://cdn-icons-png.flaticon.com/512/892/892781.png" class="me-2" alt="Logo">
                <span>KARAWO HUB</span>
            </a>

            <!-- Center Menu -->
             <div class="mx-auto d-none d-lg-flex">
            <ul class="navbar-nav gap-4 fs-6">
            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('user.dashboard') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('products.women') }}">Women</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('products.men') }}">Men</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-dark" href="{{ route('products.sale') }}">Sale</a>
            </li>
        </ul>
            </div>

            <!-- Right Icons -->
            <div class="d-flex align-items-center gap-3 fs-5">
            <a href="{{ route('search') }}"><i class="bi bi-search"></i></a>
            <a href="{{ route('wishlist') }}"><i class="bi bi-heart"></i></a>
            <a href="{{ route('profile') }}"><i class="bi bi-person-circle"></i></a>
            <a href="{{ route('cart') }}"><i class="bi bi-bag"></i></a>
            </div>


            <!-- Mobile toggler -->
            <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
