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

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
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
        @if (empty($data))
          <tr class="empty"><td colspan="5">Nothing yet!</td></tr>
        @else
          @foreach ($data as $item)
            <tr>
              <td>{{ $item['name'] }}</td>
              <td>{{ $item['qty'] }}</td>
              <td>{{ $item['price'] }}</td>
              <td class="price">{{ $item['total'] }}</td>
              <td>
                <a href="{{ route('cart.remove', ['id' => $item['id']]) }}">
                  Remove Item
                </a>
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>

    <div class="cart-total">
      <h3>Total Cost: <span id="total-cost"></span></h3>
    </div>

    <!-- Checkout Button -->
    <form action="" method="post">
      @csrf
      <button id="checkout-btn" type="submit">Proceed to Checkout</button>
    </form>
  </div>
@endsection

{{-- scripts --}}
@section('scripts')
  <script src="{{ asset('js/cart.js') }}"></script>
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
        document.getElementById('total-cost').textContent = calcTotal('table .price') + '.00';
    };
  </script>
@endsection
