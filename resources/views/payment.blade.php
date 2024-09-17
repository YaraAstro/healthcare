@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Payment')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/payStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <div class="container">
        <form action="{{ route('make.payment', ['id' => $data -> id]) }}" method="POST" onsubmit="showThankYouMessage(event)">
            @csrf
            <div class="row">
                <div class="col">
                    <h3 class="title">Billing Address</h3>
                    <div class="inputBox">
                        <span>Full Name :</span>
                        <input type="text" name="full_name" placeholder="John Doe" value={{ $user -> name }} readonly>
                    </div>
                    <div class="inputBox">
                        <span>Email :</span>
                        <input type="email" name="email" placeholder="example@example.com" value={{ $user -> email }} readonly>
                    </div>
                    <div class="inputBox">
                        <span>Address :</span>
                        <input type="text" name="address" placeholder="Room - Street - Locality" value={{ $user -> address }} readonly>
                    </div>
                    <div class="inputBox">
                        <span>City :</span>
                        <input type="text" name="city" placeholder="Mumbai" value={{ $user -> city }} readonly>
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>State :</span>
                            <input type="text" name="state" placeholder="India" value={{ $user -> state }} readonly>
                        </div>
                        <div class="inputBox">
                            <span>Zip Code :</span>
                            <input type="text" name="zip_code" placeholder="123 456" value={{ $user -> zip_code  }} readonly>
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
            <input type="hidden" name="appo_id" value="{{ $data -> appo_id }}">
            <input type="hidden" name="patient_id" value="{{ $user -> id }}">
            <div class="inputBox">
                <input class="price" type="text" name="amount" id="amount" value="{{ $data -> amount  }}.00" readonly>
            </div>
            <input type="submit" value="Proceed to Checkout" class="submit-btn">
        </form>
    </div>
@endsection

{{-- scripts --}}
@section('scripts')
    <script>
        function showThankYouMessage(event) {
            // Show thank you message
            alert("Thank you for your purchase!");

            // Form will be submitted after showing the message
        }
    </script>
@endsection

