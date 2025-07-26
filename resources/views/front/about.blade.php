@extends('layouts.master')
@section('title','Home Page | '. env('APP_NAME'))
@section('css')
@section('content')
 <main class="about-section">
    <h1>About Velveta</h1>
    <p>
      Velveta is more than just an accessory store – it’s a destination for timeless elegance and self-expression.
      We specialize in high-quality, handmade jewelry that complements every style and occasion.
      Our mission is to empower individuals to shine with confidence, beauty, and charm.
    </p>
    <p>
      Each piece in our collection is carefully selected for its unique design and craftsmanship.
      From minimalist rings to luxurious necklace sets, we provide something special for everyone.
    </p>
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
@endsection
