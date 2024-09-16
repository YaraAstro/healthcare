@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Examine')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/examineStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <div class="container">
        <!-- Patient Information Section -->
        <section class="patient-info">
            <h2>Patient's Information Form</h2>
            <form action="{{ route('appointment.examine.action') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="patient-name">Patient Name:</label>
                    <input type="text" id="patient-name" name="patient_name" value="{{ $user['name'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="patient-id">Patient ID:</label>
                    <input type="text" id="patient-id" name="patient_id" value="{{ $user['patient_id'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" value="{{ $user['age'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{ $user['email'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="symptoms">Symptoms:</label>
                    <input type="text" id="symptoms" name="symptoms" value="{{ $user['symptoms'] }}" disabled>
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" value="{{ $user['description'] }}" disabled>
                </div>
            </form>
        </section>

        <!-- Drag Section -->
        <section class="drag-section">
            <div class="search-bar">
                <label for="search">Search</label>
                <input type="text" id="search" name="search">
                <button type="button">🔍</button>
            </div>

            <!-- Drag Items -->
            @foreach(range(1, 4) as $dragItem)
                <div class="drag-item">
                    <label for="drag{{ $dragItem }}">Drag {{ $dragItem }}:</label>
                    <input type="text" id="drag{{ $dragItem }}" name="drag{{ $dragItem }}">
                    <button type="button">❌</button>
                    <button type="button">✔️</button>
                </div>
            @endforeach

            <div class="form-actions">
                <button type="button">Add</button>
                <button type="submit">Submit</button>
            </div>
        </section>
    </div>
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection

