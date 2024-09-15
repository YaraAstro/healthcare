@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Cart')

{{-- style css --}}
@section('style')
  <link rel="stylesheet" href="{{ asset('css/cartStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
  <div class="cart-container">
    <h2>Your Cart</h2>
    <table id="cart-items">
      <thead>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <!-- Cart items will be dynamically populated -->
      </tbody>
    </table>
    <div class="cart-total">
      <h3>Total Cost: <span id="total-cost">$0.00</span></h3>
    </div>
    <!-- Checkout Button -->
    <button id="checkout-btn" onclick="checkout()">Proceed to Checkout</button>
  </div>
@endsection

{{-- scripts --}}
@section('scripts')
  <script src="{{ asset('js/cart.js')}}"></script>
@endsection

