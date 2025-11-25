@extends('layouts.app')

@section('content')

<style>
/* --- SALE BANNER --- */
.sale-banner {
    background: #e63946;
    color: white;
    text-align: center;
    padding: 40px 0 55px 0;
}

.sale-badge {
    background: white;
    color: #e63946;
    font-size: 12px;
    padding: 5px 14px;
    border-radius: 20px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.sale-banner h2 {
    font-size: 28px;
    font-weight: 600;
    margin-top: 18px;
}

.sale-banner p {
    font-size: 14px;
    opacity: 0.9;
    margin: 4px 0;
}

/* --- FILTER BAR --- */
.filter-bar {
    background: #ffffff;
    border: 1px solid #dfdfdf;
    border-radius: 8px;
    font-size: 14px;
}

.category-select {
    width: 160px;
    font-size: 13px;
}

.showing-products {
    font-size: 13px;
    color: #555;
}

/* --- PRODUCT CARD --- */
.product-card {
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 3px 10px rgba(0,0,0,0.08);
    transition: 0.2s ease;
}

.product-card:hover {
    transform: translateY(-4px);
}

.product-img img {
    width: 100%;
    height: auto;
    border-radius: 6px;
}

.product-title {
    font-size: 15px;
    margin: 0;
    font-weight: 500;
    color: #333;
}

.product-price {
    font-size: 14px;
    font-weight: 600;
    color: #e63946;
    margin: 0;
}

.add-btn {
    background: #e63946;
    color: white;
    border: none;
    font-size: 14px;
    padding: 6px 16px;
    border-radius: 6px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.add-btn:hover {
    background: #cf303c;
}

/* --- RESPONSIVE SETTINGS --- */
@media (max-width: 768px) {
    .sale-banner h2 {
        font-size: 22px;
    }
    .sale-banner p {
        font-size: 12px;
    }
    .product-title {
        font-size: 14px;
    }
    .product-price {
        font-size: 13px;
    }
    .add-btn {
        padding: 5px 12px;
        font-size: 13px;
    }
}

/* Grid responsif */
@media (max-width: 576px) {
    .col-custom {
        width: 50%;
        padding: 8px;
    }
}

/* --- FOOTER --- */
.footer-section {
    background: #111;
    color: white;
    padding: 50px 0;
    margin-top: 50px;
}

.footer-title {
    font-size: 15px;
    font-weight: 600;
    margin-bottom: 12px;
}

.footer-links a {
    display: block;
    color: #d6d6d6;
    font-size: 13px;
    margin: 5px 0;
    text-decoration: none;
}

.footer-links a:hover {
    color: white;
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


<!-- SALE BANNER -->
<div class="sale-banner">
    <div class="sale-badge">
        <i class="bi bi-tag"></i> UP TO 50% OFF
    </div>

    <h2>Karawo Day Sale - Up to 50% Off</h2>
    <p>Limited time offer on selected items</p>
    <p>23 January 2026</p>
</div>


<!-- FILTER -->
<div class="container mt-4">
    <div class="filter-bar d-flex align-items-center justify-content-between px-3 py-2">

        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-funnel"></i>
            <span>Filter by:</span>

            <select class="form-select form-select-sm category-select">
                <option>All Categories</option>
                <option>Koko</option>
                <option>Celana</option>
                <option>Bahu Boxy</option>
            </select>
        </div>

        <span class="showing-products">Showing 9 products</span>
    </div>
</div>


<!-- PRODUCT LIST -->
<div class="container mt-4">
    <div class="row g-3 g-md-4">

        @for ($i = 1; $i <= 9; $i++)
        <div class="col-6 col-md-4 col-lg-4">
            <div class="product-card p-2">

                <div class="product-img">
                    <img src="{{ asset('img/capture.png') }}" alt="Sale Product">
                </div>

                <div class="product-info px-2 mt-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="product-title">Karawo Bahu Boxy</p>
                            <p class="product-price">$200</p>
                        </div>

                        <button class="add-btn ms-auto">
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
