@extends('layouts.master')

@section('title', 'Cart Page | ' . env('APP_NAME'))

@section('css')
<style>
    * {
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<div class="container py-5" style="margin-top: 100px;">
    <h2 class="cart-title">
        <img src="{{ asset('assets/images/cart.svg') }}" class="cart-icon" alt="Cart Icon">
        Your Cart
    </h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->count() > 0)
    <table class="table table-bordered">
        <thead class="bg-light">
            <tr>
                <th>Product</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $item)
            <tr>
<td>{{ $item->product ? $item->product->name : 'Product not found' }}</td>
                <td><img src="{{ asset( $item->product->image) }}" style="width: 80px; height:80px; object-fit;" alt=""></td>
                <td>${{ number_format($item->product->price, 2) }}</td>
                <td>
                    <form method="POST" action="{{ route('front.cart.update', $item->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control d-inline w-50" />
                        <button type="submit" class="btn btn-warning btn-sm">Update</button>
                    </form>
                </td>
                <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                <td>
                    <form method="POST" action="{{ route('front.cart.destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: ${{ number_format($total, 2) }}</h4>

    <div class="text-end">
        <a href="{{ route('front.index') }}" class="btn btn-outline-primary">← Continue Shopping</a>
        <a href="#" class="btn btn-success">Checkout</a> {{-- ربط لاحق بعملية الشراء --}}
    </div>
    @else
        <div class="alert alert-info">Your cart is empty.</div>
        <a href="{{ route('front.index') }}" class="btn btn-outline-primary">Start Shopping</a>
    @endif
</div>
@endsection
