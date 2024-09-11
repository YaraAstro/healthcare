<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Register </title>
    <link rel="shortcut icon" href="{{asset('notes_medical_solid.ico')}}" type="image/x-icon">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/registerStyles.css') }}">

</head>
<body>
    
    <main>
        <h1>Register</h1>
        <div class="radio-container">
            <label class="radio-label">
                <input type="radio" name="role" value="doctor" checked>
                Doctor
                <span class="radio-mark"></span>
            </label>
            <label class="radio-label">
                <input type="radio" name="role" value="patient">
                Patient
                <span class="radio-mark"></span>
            </label>
        </div>
        <form action="./login.html" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Register">
        </form>
    </main>

</body>
</html>