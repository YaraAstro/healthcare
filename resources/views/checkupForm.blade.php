@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Check Up')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/checkUpStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <div class="container">
        <h1>Doctor Checkup Form</h1>

        <!-- Form Start -->
        <form action="{{ route('checkup.store') }}" method="POST" class="checkup-form">
            @csrf
            <!-- Patient Name -->
            <div class="form-group">
                <label for="patient-name">Patient Name</label>
                <input type="text" id="patient-name" name="patient_name" required>
            </div>

            <!-- Age -->
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <!-- Symptoms -->
            <div class="form-group">
                <label for="symptoms">Symptoms</label>
                <textarea id="symptoms" name="symptoms" required></textarea>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="submit-btn">Save</button>
                <button type="reset" class="new-btn">Clear</button>
            </div>

            <!-- Product Section -->
            <div class="product-section">
                <h2>Product</h2>
                <div class="product-container">
                    <div class="product">
                        <p>Product 1</p>
                        <button type="button" onclick="window.location.href='{{ route('payment') }}';">Buy Now</button>
                    </div>
                    <div class="product">
                        <p>Product 2</p>
                        <button type="button" onclick="window.location.href='{{ route('payment') }}';">Buy Now</button>
                    </div>
                    <div class="product">
                        <p>Product 3</p>
                        <button type="button" onclick="window.location.href='{{ route('payment') }}';">Buy Now</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

{{-- scripts --}}
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

