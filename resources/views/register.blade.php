<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Register</title>
    <link rel="shortcut icon" href="{{ asset('notes_medical_solid.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registerStyles.css') }}">
</head>
<body>
    
    <main>
        <h1>Register</h1>

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
        
        @if(session('success'))
            <div>
                <p>{{ session('success') }}</p>
                @if(session('user'))
                    <h3>Registered Data:</h3>
                    <ul>
                        <li>ID: {{ session('user')['id'] }}</li>
                        <li>Username: {{ session('user')['username'] }}</li>
                        <li>Email: {{ session('user')['email'] }}</li>
                        <li>{{ session('user')['password'] }}</li>
                    </ul>
                @endif
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
    </main>

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

</body>
</html>