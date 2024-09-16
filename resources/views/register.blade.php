@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Register')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/registerStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <h1>Register</h1>

    @if ($errors -> any())
        <div class="alert alert-danger">{{ $errors }}</div>
    @endif

    <!-- Registration Form -->
    <form action="{{ route('register.action') }}" method="POST">
        @csrf
        @method('post')

        <div class="radio-container">
            <label class="radio-label">
                <input type="radio" id="role_doctor" name="role" value="doctor">
                Doctor
                <span class="radio-mark"></span>
            </label>
            <label class="radio-label">
                <input type="radio" id="role_patient" name="role" value="patient" >
                Patient
                <span class="radio-mark"></span>
            </label>
        </div>
        
        <input type="hidden" id="selected_role" name="selected_role" value="patient">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Register">
    </form>
@endsection

{{-- scripts --}}
@section('scripts')
    <script>
        // Function to update the hidden input field
        function updateHiddenInput() {
            const selectedRole = document.querySelector('input[name="role"]:checked').value;
            document.getElementById('selected_role').value = selectedRole;
        }

        // Attach event listeners to radio buttons
        const radioButtons = document.querySelectorAll('input[name="role"]');
        radioButtons.forEach(button => {
            button.addEventListener('change', updateHiddenInput);
        });

        // Initial update in case a default value is set
        updateHiddenInput();
    </script> 
@endsection

