@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Store')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/productsStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <div class="frame">
        <h1>Our Products</h1>
        <p>Check out our wide range of products below.</p>
        <div class="medCont">

            @foreach ($drug as $med)
                <div class="medCard">
                    <img src="{{ $med -> img_path }}" alt="medicine_img" class="card-img-top">
                    <div class="medBody">
                        <h5>{{ $med -> name }}</h5>
                        <p>{{ $med -> description }}</p>
                        <h2>{{ $med -> amount }}</h2>
                        <form action="{{ route('cart.add') }}" method="get">
                            <input type="hidden" name="drug_id" value="{{ $med -> id }}">
                            <input type="number" name="drug_qty" id="drug_qty" value="{{ old('drug_qty', 1) }}">
                            <button type="submit" class="addBtn">Add to Cart +</button>
                        </form>
                    </div>
                </div>
            @endforeach
            
            
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

