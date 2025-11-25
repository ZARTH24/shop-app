@extends('layouts.app')

@section('content')

<style>
/* HERO SECTION */
.women-hero {
    text-align: center;
    padding: 60px 0;
    background: #fff;
}

.women-hero h1 {
    font-size: 32px;
    font-weight: 600;
}

/* FILTER BAR */
.filter-bar {
    background: #fff;
    border-radius: 8px;
    border: 1px solid #eee;
}

.category-select {
    width: 160px;
}

/* PRODUCT CARD */
.product-card {
    border-radius: 8px;
    background: #fff;
    transition: 0.2s ease;
}

.product-card:hover {
    transform: translateY(-5px);
}

.product-img img {
    width: 100%;
    border-radius: 8px;
}

/* TEXT INFO */
.product-title {
    font-size: 15px;
    font-weight: 500;
    margin: 0;
}

.product-price {
    color: #e74c3c;
    font-weight: bold;
    margin: 0;
}

/* BUTTON */
.add-btn {
    background: #e74c3c;
    color: #fff;
    border: none;
    padding: 6px 14px;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 5px;
}

.add-btn:hover {
    background: #c93a2b;
}

/* RESPONSIVE SETTINGS */
@media (max-width: 576px) {
    .women-hero h1 {
        font-size: 26px;
    }

    .product-title {
        font-size: 14px;
    }

    .product-price {
        font-size: 13px;
    }

    .add-btn {
        padding: 6px 12px;
        font-size: 13px;
    }
}

/* FOOTER */
.footer-section {
    background: #111;
    color: white;
    padding: 50px 0;
}

.footer-title {
    font-size: 15px;
    font-weight: 600;
}

.footer-links a {
    display: block;
    color: #d6d6d6;
    font-size: 13px;
    margin: 5px 0;
    text-decoration: none;
}

.footer-links a:hover {
    color: #fff;
}

.footer-social i {
    font-size: 18px;
    margin-right: 10px;
    cursor: pointer;
}

.footer-social i:hover {
    color: #e63946;
}
</style>

<!-- HERO TITLE -->
<div class="women-hero">
    <h1>Women's Collection</h1>
</div>

<!-- FILTER BAR -->
<div class="container mt-4">
    <div class="filter-bar d-flex align-items-center justify-content-between px-3 py-2">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-funnel"></i>
            <span>Filter by:</span>

            <select class="form-select form-select-sm category-select">
                <option>All Categories</option>
                <option>Dress</option>
                <option>Blouse</option>
                <option>Koko</option>
            </select>
        </div>

        <span class="showing-products">Showing 9 products</span>
    </div>
</div>

<!-- PRODUCT GRID -->
<div class="container mt-4">

    <div class="row g-4">

        @for ($i = 1; $i <= 9; $i++)
        <div class="col-6 col-md-4 col-lg-4">
            <div class="product-card p-2 shadow-sm">

                <!-- IMAGE -->
                <div class="product-img">
                    <img src="{{ asset('img/dny-9117-fe343d7992fbf95417f6f8df4805c566-33caad425eda9c54e4b43fff2adb0a73.png') }}">
                </div>

                <!-- INFO -->
                <div class="product-info px-2 mt-2">

                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="product-title">Saujana Koko Shirt Karawo</p>
                            <p class="product-price">$200</p>
                        </div>

                        <button class="add-btn">
                            <i class="bi bi-cart"></i> Add
                        </button>
                    </div>

                </div>

            </div>
        </div>
        @endfor

    </div>

</div>

<!-- FOOTER -->
<div class="footer-section mt-5">
    <div class="container">

        <div class="row">

            <div class="col-12 col-md-3">
                <p class="footer-title">KARAWO HUB</p>
                <p style="font-size: 13px;">
                    Experience modern fashion and timeless elegance through the artistry of Karawo embroidery.
                </p>
            </div>

            <div class="col-12 col-md-3 footer-links">
                <p class="footer-title">Shop</p>
                <a href="#">New Arrivals</a>
                <a href="#">Women</a>
                <a href="#">Men</a>
                <a href="#">Sale</a>
            </div>

            <div class="col-12 col-md-3 footer-links">
                <p class="footer-title">Help</p>
                <a href="#">Customer Service</a>
                <a href="#">Track Order</a>
                <a href="#">Contact Us</a>
            </div>

            <div class="col-12 col-md-3">
                <p class="footer-title">Newsletter</p>
                <input class="form-control form-control-sm" type="email" placeholder="Your Email">
                <button class="btn btn-danger btn-sm mt-2 w-100">Subscribe</button>

                <div class="footer-social mt-3">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-twitter"></i>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
