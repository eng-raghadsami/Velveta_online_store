<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/index.css')}}">
    <title>>@yield('title', env('APP_NAME'))</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Hand+Pre:wght@400..700&family=Kapakana:wght@300..400&family=Lalezar&family=Lemonada:wght@300..700&family=Pacifico&display=swap');


    </style>

    @yield('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<header>
    <nav class="custom-navbar">
        <div class="logo">
            <img src="{{asset('assets/images/logo2.png')}}" alt="Velveta Logo" class="logo-img">
            <h1 class="logo-text pacifico-regular">Velveta</h1>
        </div>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}#">Home</a></li>
            <li><a href="{{ url('/') }}#sets">Accessories sets</a></li>
            <li><a href="{{ url('/') }}#rings">Rings</a></li>
            <li><a href="{{ url('/') }}#necklaces">Necklaces</a></li>
            <li><a href="{{ url('/') }}#bracelets">Bracelets</a></li>
            <li><a href="{{ url('/') }}#earrings">Earrings</a></li>
            <li><a href="{{ route('front.about') }}">About</a></li>
            <li><a href="{{ route('front.contact') }}">Contact</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>

            <li><a href="{{ route('front.cart.index') }}"><img src="{{asset('assets/images/cart.png')}}" alt="Cart Icon" class="nav-cart"></a></li>
        </ul>
    </nav>
</header>
@yield('content')
<footer class="site-footer">
    <div class="footer-content">
        <h3>Velveta</h3>
        <p>Elevating your elegance with timeless accessories.</p>
        <ul class="footer-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="footer-contact">
            <p><img src="{{asset('assets/images/email.svg')}}" alt="Email Icon"> Email: contact@velveta.com</p>
            <p><img src="{{asset('assets/images/whatsapp.svg')}}" alt="WhatsApp Icon"> WhatsApp: +123-456-7890</p>
            <p><img src="{{asset('assets/images/instagram.png')}}" alt="Instagram Icon"> Instagram: @velveta.store</p>
        </div>
        <div class="payment-icons">
            <img src="{{asset('assets/images/visa.png')}}" alt="Visa">
            <img src="{{asset('assets/images/mastercard.png')}}" alt="MasterCard">
            <img src="{{asset('assets/images/paypal.svg')}}" alt="PayPal">
        </div>
        <img src="{{asset('assets/images/logo2.png')}}" alt="Velveta Logo" class="footer-img">
        <p class="footer-copy">© 2025 Velveta. All rights reserved.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
