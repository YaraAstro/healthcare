<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Cart </title>
    <link rel="shortcut icon" href="{{asset('notes_medical_solid.ico')}}" type="image/x-icon">

    <!-- Styles -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/cartStyles.css') }}">
    
</head>
<body>

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
    
      <script src="{{ asset('js/cart.js')}}"></script>
</body>
</html>