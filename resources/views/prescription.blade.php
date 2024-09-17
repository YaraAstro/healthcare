@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Prescription')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/prescriptionStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <div class="prescription-form">
        <h2>Prescription Form</h2>
        <h3>Prescription Details</h3>

        {{-- Assuming the form is meant to post data to a route for processing --}}
        <div>
            <div class="form-group">
                <label for="patientName">Patient Name:</label>
                <input type="text" id="patientName" name="patient_name" value="{{ $user -> name }}" disabled>
            </div>
            <div class="form-group">
                <label for="patientId">Patient ID:</label>
                <input type="text" id="patientId" name="patient_id" value="{{ $user -> id }}" disabled>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="{{ $user -> age }}" disabled>
            </div>
            @foreach ($med as $drug)
                <div class="form-group">
                    {{-- <label for="drug3">Drug 3:</label> --}}
                    <input type="text" name="drug3" value="{{ $drug -> name }}">
                </div>
            @endforeach

            <div class="form-group">
                <label for="total">Total</label>
                <input type="text" name="total" value="{{ $data -> amount }}.00">
            </div>
            
            <div class="form-actions">
                @if (session('role') === 'doctor')
                    <a href="{{ route('profile.doctor', ['username' => session('username')]) }}">
                        <button type="submit">Confirm</button>
                    </a>
                @else
                    <a href="">
                        <button type="button">Buy Now</button>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection

{{-- scripts --}}
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

