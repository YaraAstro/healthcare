<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Payment</title>
    <link rel="shortcut icon" href="{{ asset('notes_medical_solid.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/payStyles.css') }}">

</head>
<body>
    
    <div class="container">
        <form action="{{ route('payment.process') }}" method="POST" onsubmit="showThankYouMessage(event)">
            @csrf
            <div class="row">
                <div class="col">
                    <h3 class="title">Billing Address</h3>
                    <div class="inputBox">
                        <span>Full Name :</span>
                        <input type="text" name="full_name" placeholder="John Doe" required>
                    </div>
                    <div class="inputBox">
                        <span>Email :</span>
                        <input type="email" name="email" placeholder="example@example.com" required>
                    </div>
                    <div class="inputBox">
                        <span>Address :</span>
                        <input type="text" name="address" placeholder="Room - Street - Locality" required>
                    </div>
                    <div class="inputBox">
                        <span>City :</span>
                        <input type="text" name="city" placeholder="Mumbai" required>
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>State :</span>
                            <input type="text" name="state" placeholder="India" required>
                        </div>
                        <div class="inputBox">
                            <span>Zip Code :</span>
                            <input type="text" name="zip_code" placeholder="123 456" required>
                        </div>
                    </div>
                </div>
    
                <div class="col">
                    <h3 class="title">Payment</h3>
                    <div class="inputBox">
                        <span>Cards Accepted :</span>
                        <img src="{{ asset('images/img15.png') }}" alt="Card logos">
                    </div>
                    <div class="inputBox">
                        <span>Name on Card :</span>
                        <input type="text" name="card_name" placeholder="Mr. John Doe" required>
                    </div>
                    <div class="inputBox">
                        <span>Credit Card Number :</span>
                        <input type="text" name="card_number" placeholder="1111-2222-3333-4444" required>
                    </div>
                    <div class="inputBox">
                        <span>Exp Month :</span>
                        <input type="text" name="exp_month" placeholder="January" required>
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>Exp Year :</span>
                            <input type="text" name="exp_year" placeholder="2024" required>
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" name="cvv" placeholder="123" required>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Proceed to Checkout" class="submit-btn">
        </form>
    </div> 

    <script>
        function showThankYouMessage(event) {
            event.preventDefault(); // Prevent the form from submitting
            alert("Thank you for your purchase!");
            // Optionally, you can redirect to another page after showing the message
            // window.location.href = "thankyou.html";
        }
    </script>

</body>
</html>
