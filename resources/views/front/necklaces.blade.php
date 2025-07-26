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

</section>

@endsection
