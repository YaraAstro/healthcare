@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Appointment')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/appoStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <div class="container">
        <h1>Appointment Form</h1>

        <form action="{{ route('appointment.doctor') }}" method="post" class="appointment-form">
            @csrf
            @method('post')
            <!-- Doctor Information -->
            <div class="form-section">
                <h2>Doctor Information</h2>
                
                <div class="form-group">
                    <label for="doctor-id">Doctor ID</label>
                    <input type="text" id="doctor-id" name="doctor_id" required>
                </div>

                <div class="form-group">
                    <label for="doctor-name">Doctor Name</label>
                    <input type="text" id="doctor-name" name="doctor_name" required>
                </div>

                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <input type="text" id="speciality" name="speciality" required>
                </div>

                <div class="form-group">
                    <label for="doctor-email">Email</label>
                    <input type="email" id="doctor-email" name="doctor_email" required>
                </div>

                <button type="submit" class="submit-btn">Submit</button>
            </div>

        </form>

        <form action="{{ route('appointment.patient') }}" method="POST" class="appointment-form">
            @csrf
            @method('post')
            <!-- Patient Information -->
            <div class="form-section">
                <h2>Patient Information</h2>
                
                <div class="form-group">
                    <label for="patient-id">Patient ID</label>
                    <input type="text" id="patient-id" name="patient_id" required>
                </div>

                <div class="form-group">
                    <label for="patient-name">Patient Name</label>
                    <input type="text" id="patient-name" name="patient_name" required>
                </div>

                <div class="form-group">
                    <label for="patient-age">Age</label>
                    <input type="number" id="patient-age" name="patient_age" required>
                </div>

                <div class="form-group">
                    <label for="patient-phone">Phone Number</label>
                    <input type="tel" id="patient-phone" name="patient_phone" required>
                </div>

                <div class="form-group">
                    <label for="patient-address">Address</label>
                    <input type="text" id="patient-address" name="patient_address" required>
                </div>

                <div class="form-group">
                    <label for="patient-city">City</label>
                    <input type="text" id="patient-city" name="patient_city" required>
                </div>

                <div class="form-group">
                    <label for="patient-state">State</label>
                    <input type="text" id="patient-state" name="patient_state" required>
                </div>

                <div class="form-group">
                    <label for="patient-zip">Zip Code</label>
                    <input type="text" id="patient-zip" name="patient_zip" required>
                </div>

                <button type="submit" class="submit-btn">Submit</button>
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


