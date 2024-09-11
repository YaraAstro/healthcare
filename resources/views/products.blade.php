<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Store </title>
    <link rel="shortcut icon" href="{{asset('notes_medical_solid.ico')}}" type="image/x-icon">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/productsStyles.css') }}">

</head>
<body>
    
    <main class="container text-center mt-5">
        <h1>Our Products</h1>
        <p>Check out our wide range of products below.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('images/drag2.jpeg')}}" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">Description of Product 1.</p>
                        <a href="#" class="btn btn-success" onclick="buyNow('Product Name', 25.99)">Buy Now</a>
 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('images/drag4.jpg')}}" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">Description of Product 2.</p>
                        <a href="#" class="btn btn-success" onclick="buyNow('Product Name', 25.99)">Buy Now</a>
 
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('images/drag3.jpg')}}" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">Description of Product 3.</p>
                        <a href="#" class="btn btn-success" onclick="buyNow('Product Name', 25.99)">Buy Now</a>
 
                </div>
            </div>
        </div>
    </main>

</body>
</html>