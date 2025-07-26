@extends('layouts.master')
@section('title','Home Page | '. env('APP_NAME'))
@section('css')
<style>
    *{
              font-family: "Times New Roman", Times, serif;

    }
</style>
@endsection
@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<section class="accessories" id="sets">

<h2>Rings</h2>
  <div class="product-container">

 @foreach ($rings as $rings)
  <div class="product-box">
    <img src="{{ asset( $rings->image) }}" class="product-img">
    <h3 class="product-name">{{ $rings->name }}</h3>
    <p class="product-price">${{ $rings->price }}</p>

    <div class="product-actions">
      <a href="{{ route('front.details', $rings->id) }}" class="details-link">DETAILS</a>

      <form action="{{ route('front.cart.store') }}" method="POST" style="display:inline;">
        @csrf
         <input type="hidden" name="product_id" value="{{ $rings->id }}">
        <input type="hidden" name="product_type" value="set">
        <button type="submit" class="cart-btn" title="Add to Cart">
          <img src="{{ asset('assets/images/cart.png') }}" alt="Cart Icon" class="cart-icon">
        </button>
      </form>
    </div>
  </div>
@endforeach
</div>

</section>

@endsection
