@extends('layouts.master')
@section('title', $product->name . ' | ' . env('APP_NAME'))
@section('css')
<style>
    *{
              font-family: "Times New Roman", Times, serif;

    }
</style>
@endsection
@section('content')
<section class="product-details">
  <div class="product-image">
    <img src="{{ asset($product->image) }}" alt="Product Image">
  </div>

  <div class="product-info">
    <h2>{{ $product->name }}</h2>
    <p class="description">{{ $product->description ?? 'No description available.' }}</p>
    <p class="price">${{ $product->price }}</p>

    <form action="{{ route('front.cart.store') }}" method="POST">
      @csrf
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <input type="hidden" name="product_type" value="{{ $type }}">
      <button type="submit" class="buy-btn">
        Add to Cart <img src="{{ asset('assets/images/cart.png') }}" alt="Cart Icon" class="nav-cart">
      </button>
    </form>
  </div>
</section>

<section class="related-products">
  <h2>You May Also Like</h2>
  <div class="product-container">
    @foreach ($relatedProducts as $item)
      <div class="product-box">
        <img src="{{ asset($item->image) }}" class="product-img">
        <h3 class="product-name">{{ $item->name }}</h3>
        <p class="product-price">${{ $item->price }}</p>

        <div class="product-actions">
          <a href="{{ route('front.details', $item->id) }}" class="details-link">DETAILS</a>

          <form action="{{ route('front.cart.store') }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="product_id" value="{{ $item->id }}">
            <input type="hidden" name="product_type" value="{{ $type }}">
            <button type="submit" class="cart-btn">
              <img src="{{ asset('assets/images/cart.png') }}" alt="Cart Icon" class="cart-icon">
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endsection
