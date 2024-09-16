@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | '. $user -> name .' | Check Up')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/checkUpStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <div class="container">
        <h1>Doctor Checkup Form</h1>

        @if ($errors -> any())
            <div class="alert alert-danger">{{ $errors }}</div>
        @endif

        <!-- Form Start -->
        <form action="{{ route('appointment.symptoms.action') }}" method="POST" class="checkup-form">
            @csrf

            <input type="hidden" name="patient_id" value="{{ $user -> id }}">

            <!-- Patient Name -->
            <div class="form-group">
                <label for="patient-name">Patient Name</label>
                <input type="text" id="patient-name" name="patient_name" value="{{ $user -> name }}" disabled>
            </div>

            <!-- Age -->
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" value="{{ $user -> age }}" disabled>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $user -> email }}" disabled>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{ $user -> mobile }}" disabled>
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

            <!-- Dropdown for selecting a doctor -->
            <div class="form-group">
                <label for="doctor">Doctor</label>
                <select id="doctor" name="doctor_id" required>
                    <option value="">Select a doctor</option>
                    @foreach ($doctors as $name => $id)
                        <option value="{{ $id }}" {{ old('doctor_id') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-actions">
                <label for="pik_date">Schedule Date</label>
                <input type="date" name="pik_date" id="pik_date" >
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="submit-btn">Save</button>
                <button type="reset" class="new-btn">Clear</button>
            </div>

            <!-- Product Section -->
            <div class="product-section">
                <h2>Product</h2>
                {{-- <div class="product-container">
                    <div class="product">
                        <p>Product 1</p>
                        <button type="button" onclick="window.location.href=''>Buy Now</button>
                    </div>
                    <div class="product">
                        <p>Product 2</p>
                        <button type="button" onclick="window.location.href=''>Buy Now</button>
                    </div>
                    <div class="product">
                        <p>Product 3</p>
                        <button type="button" onclick="window.location.href=''>Buy Now</button>
                    </div>
                </div> --}}
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

