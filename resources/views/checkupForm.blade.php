<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Check Up </title>
    <link rel="shortcut icon" href="{{asset('notes_medical_solid.ico')}}" type="image/x-icon">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/checkUpStyles.css') }}">
</head>
<body>

    <main class="container">
        <h1>Doctor Checkup Form</h1>
        <form class="checkup-form">
            <div class="form-group">
                <label for="patient-name">Patient Name</label>
                <input type="text" id="patient-name" name="patient_name" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="symptoms">Symptoms</label>
                <textarea id="symptoms" name="symptoms" required></textarea>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div class="form-actions">
                <button type="button" class="submit-btn" onclick="window.location.href='doctorH.html';">Save</button>
                <button type="button" class="new-btn">Clear</button>
            </div>

            <div class="product-section">
                <h2>Product</h2>
                <div class="product-container">
                    <div class="product">
                        <p>Product 1</p>
                        <button type="button" onclick="window.location.href='paymentgat.html';">Buy Now</button>
                    </div>
                    <div class="product">
                        <p>Product 2</p>
                        <button type="button" onclick="window.location.href='paymentgat.html';">Buy Now</button>
                    </div>
                    <div class="product">
                        <p>Product 3</p>
                        <button type="button" onclick="window.location.href='paymentgat.html';">Buy Now</button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>