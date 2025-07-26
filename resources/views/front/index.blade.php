<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{asset('assets/index.css')}}">
    <title>Document</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Hand+Pre:wght@400..700&family=Lalezar&family=Lemonada:wght@300..700&family=Pacifico&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Hand+Pre:wght@400..700&family=Kapakana:wght@300..400&family=Lalezar&family=Lemonada:wght@300..700&family=Pacifico&display=swap');


@import url('https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Hand+Pre:wght@400..700&family=Kapakana:wght@300..400&family=Lalezar&family=Lemonada:wght@300..700&family=Pacifico&family=Sevillana&display=swap');
</style>

</head>
<body>
 <header>
 <nav class="custom-navbar">

   <div class="logo">
  <img src="{{asset('assets/images/logo2.png')}}" alt="Velveta Logo" class="logo-img">
  <h1 class="logo-text pacifico-regular">Velveta</h1>
</div>


<ul class="nav-links">
  <li><a href="#">Home</a></li>
  <li><a href="#sets">Accessories sets</a></li>
  <li><a href="#rings">Rings</a></li>
  <li><a href="#necklaces">Necklaces</a></li>
  <li><a href="#bracelets">Bracelets</a></li>
  <li><a href="#earrings">Earrings</a></li>
  <li><a href="{{ route('front.about') }}">About</a></li>
  <li><a href="{{ route('front.contact') }}">Contact</a></li>

    @if (auth()->check())
        <li>
            <a onclick="event.preventDefault(); document.querySelector('#logout-form').submit()" href="{{ route('logout') }}">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @else
        <li><a href="{{ route('login') }}">Login</a></li>
    @endif
  <li><a href="{{ route('front.cart.index') }}"><img src="{{asset('assets/images/cart.png')}}" alt="Cart Icon"  class="nav-cart"></a></li>

</ul>


  </nav>

</header>
<main class="main-content">
  <img src="{{asset('assets/images/main.png')}}" alt="">



<section class="overview">
        <h2> Sparkle Your Style</h2>
<div class="image-strip">
  <img src="{{asset('assets/images/earring4.webp')}}" alt="">
  <img src="{{asset('assets/images/bracelet10.webp')}}" alt="">
  <img src="{{asset('assets/images/ring1.jpg')}}" alt="">
  <img src="{{asset('assets/images/nike1.webp')}}" alt="">
  <img src="{{asset('assets/images/set1.jpg')}}" alt="">
  <img src="{{asset('assets/images/ring5.webp')}}" alt="">
  <img src="{{asset('assets/images/set10.webp')}}" alt="">
  <img src="{{asset('assets/images/bracelet6.jpeg')}}" alt="">
  <img src="{{asset('assets/images/ring2.jpg')}}" alt="">
  <img src="{{asset('assets/images/nike10.jpg')}}" alt="">
</div>
</main>


<section class="accessories" id="sets">

<h2>Accessories sets</h2>
  <div class="product-container">

 @foreach ($sets as $set)
  <div class="product-box">
    <img src="{{ asset( $set->image) }}" class="product-img">
    <h3 class="product-name">{{ $set->name }}</h3>
    <p class="product-price">${{ $set->price }}</p>

    <div class="product-actions">
      <a href="{{ route('front.details', $set->id) }}" class="details-link">DETAILS</a>

      <form action="{{ route('front.cart.store') }}" method="POST" style="display:inline;">
        @csrf
         <input type="hidden" name="product_id" value="{{ $set->id }}">
        <input type="hidden" name="product_type" value="set">
        <button type="submit" class="cart-btn" title="Add to Cart">
          <img src="{{ asset('assets/images/cart.png') }}" alt="Cart Icon" class="cart-icon">
        </button>
      </form>
    </div>
  </div>
@endforeach






</div>
<div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
    <a href="{{ route('front.sets') }}" class="see-all-btn">All Accessories sets</a>
</div>




</section>
<section class="accessories" id="rings">

<h2>Rings</h2>
  <div class="product-container">

 @foreach ($rings as $ring)
  <div class="product-box">
    <img src="{{ asset( $ring->image) }}" class="product-img">
    <h3 class="product-name">{{ $ring->name }}</h3>
    <p class="product-price">${{ $ring->price }}</p>

    <div class="product-actions">
      <a href="{{ route('front.details', $ring->id) }}" class="details-link">DETAILS</a>

      <form action="{{ route('front.cart.store') }}" method="POST" style="display:inline;">
        @csrf
         <input type="hidden" name="product_id" value="{{ $ring->id }}">
        <input type="hidden" name="product_type" value="ring">
        <button type="submit" class="cart-btn" title="Add to Cart">
          <img src="{{ asset('assets/images/cart.png') }}" alt="Cart Icon" class="cart-icon">
        </button>
      </form>
    </div>
  </div>
@endforeach




</div>

<div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
    <a href="{{ route('front.rings') }}" class="see-all-btn">All Rings</a>
</div>
</section>
<section class="accessories"  id="necklaces">

<h2>Necklaces</h2>
  <div class="product-container">

@foreach ($necklaces as $necklace)
  <div class="product-box">
    <img src="{{ asset( $necklace->image) }}" class="product-img">
    <h3 class="product-name">{{ $necklace->name }}</h3>
    <p class="product-price">${{ $necklace->price }}</p>

    <div class="product-actions">
      <a href="{{ route('front.details', $necklace->id) }}" class="details-link">DETAILS</a>

      <form action="{{ route('front.cart.store') }}" method="POST" style="display:inline;">
        @csrf
         <input type="hidden" name="product_id" value="{{ $necklace->id }}">
        <input type="hidden" name="product_type" value="necklace">
        <button type="submit" class="cart-btn" title="Add to Cart">
          <img src="{{ asset('assets/images/cart.png') }}" alt="Cart Icon" class="cart-icon">
        </button>
      </form>
    </div>
  </div>
@endforeach




</div>
<div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
    <a href="{{ route('front.necklaces') }}" class="see-all-btn">All Necklaces</a>
</div>

</section>
<section class="accessories" id="bracelets">

<h2>Bracelets</h2>
  <div class="product-container">

  @foreach ($bracelets as $bracelet)
  <div class="product-box">
    <img src="{{ asset( $bracelet->image) }}" class="product-img">
    <h3 class="product-name">{{ $bracelet->name }}</h3>
    <p class="product-price">${{ $bracelet->price }}</p>

    <div class="product-actions">
      <a href="{{ route('front.details', $bracelet->id) }}" class="details-link">DETAILS</a>

      <form action="{{ route('front.cart.store') }}" method="POST" style="display:inline;">
        @csrf
         <input type="hidden" name="product_id" value="{{ $bracelet->id }}">
        <input type="hidden" name="product_type" value="bracelet">
        <button type="submit" class="cart-btn" title="Add to Cart">
          <img src="{{ asset('assets/images/cart.png') }}" alt="Cart Icon" class="cart-icon">
        </button>
      </form>
    </div>
  </div>
@endforeach


</div>
<div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
    <a href="{{ route('front.bracelets') }}" class="see-all-btn">All Bracelets</a>
</div>

</section>
<section class="accessories" id="earrings">

<h2>Earrings</h2>
  <div class="product-container">

 @foreach ($earrings as $earring)
  <div class="product-box">
    <img src="{{ asset( $earring->image) }}" class="product-img">
    <h3 class="product-name">{{ $earring->name }}</h3>
    <p class="product-price">${{ $earring->price }}</p>

    <div class="product-actions">
      <a href="{{ route('front.details', $earring->id) }}" class="details-link">DETAILS</a>

      <form action="{{ route('front.cart.store') }}" method="POST" style="display:inline;">
        @csrf
         <input type="hidden" name="product_id" value="{{ $earring->id }}">
        <input type="hidden" name="product_type" value="earring">
        <button type="submit" class="cart-btn" title="Add to Cart">
          <img src="{{ asset('assets/images/cart.png') }}" alt="Cart Icon" class="cart-icon">
        </button>
      </form>
    </div>
  </div>
@endforeach




</div>
<div style="display: flex; justify-content: flex-end; margin-bottom: 10px;">
    <a href="{{ route('front.earrings') }}" class="see-all-btn">All Earrings</a>
</div>

</section>
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
      <p> <img src="{{asset('assets/images/email.svg')}}" alt="Email Icon"> Email: contact@velveta.com</p>
      <p>  <img src="{{asset('assets/images/whatsapp.svg')}}" alt="WhatsApp Icon"> WhatsApp: +123-456-7890</p>
      <p>  <img src="{{asset('assets/images/instagram.png')}}" alt="Instagram Icon">  Instagram: @velveta.store</p>
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


</body>
</html>
