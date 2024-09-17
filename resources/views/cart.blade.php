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

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors -> any())
        <div class="alert alert-danger">{{ $errors }}</div>
    @endif

    <table id="cart-items">
      <thead>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Cart items will be dynamically populated -->
        @foreach ($data as $item)
          <td>{{ $item -> name }}</td>
          <td>{{ $item -> qty }}</td>
          <td>{{ $item -> price }}</td>
          <td class="price">{{ $item -> total }}</td>
          <td>
            <a href="{{ route('cart.remove', ['id' => $item -> id ]) }}">
              &times;
            </a>
          </td>
        @endforeach
      </tbody>
    </table>
    <div class="cart-total">
      <h3>Total Cost: <span id="total-cost"></span></h3>
    </div>
    <!-- Checkout Button -->
    <form action="" method="post">
      <button id="checkout-btn">Proceed to Checkout</button>
    </form>
  </div>
@endsection

{{-- scripts --}}
@section('scripts')
  <script src="{{ asset('js/cart.js')}}"></script>
  <script>
    function calcTotal(selector) {
        let amounts = document.querySelectorAll(selector);
        let total = 0;

        amounts.forEach(element => {
            // Convert the text content to a number before adding it to the total
            total += parseFloat(element.textContent) || 0;
        });

        return total;
    }

    window.onload = function() {
        document.getElementById('total-cost').textContent = calcTotal('table td .price'). '.00';
    };


  </script>
@endsection

