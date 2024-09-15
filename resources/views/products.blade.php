@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Store')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/productsStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <div class="container text-center mt-5">
        <h1>Our Products</h1>
        <p>Check out our wide range of products below.</p>
        <div class="row">
            <!-- Product 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/drag2.jpeg') }}" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">Description of Product 1.</p>
                        <a href="#" class="btn btn-success" onclick="buyNow('Product 1', 25.99)">Buy Now</a>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/drag4.jpg') }}" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">Description of Product 2.</p>
                        <a href="#" class="btn btn-success" onclick="buyNow('Product 2', 30.99)">Buy Now</a>
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/drag3.jpg') }}" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">Description of Product 3.</p>
                        <a href="#" class="btn btn-success" onclick="buyNow('Product 3', 15.99)">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- scripts --}}
@section('scripts')
    <script>
        function buyNow(productName, price) {
            // Implement the logic for the Buy Now button
            alert(`You have chosen to buy ${productName} for $${price}.`);
            // Optionally, redirect to the payment page or add to cart
            // window.location.href = "paymentPage.html";
        }
    </script> 
@endsection

