<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Login</title>
    <link rel="shortcut icon" href="{{ asset('notes_medical_solid.ico') }}" type="image/x-icon">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/loginStyles.css') }}">
</head>
<body>
    
    <main>
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Login">

            <p>Create New Account: <a href="{{ route('register') }}">Register</a></p>
        </form>
    </main>

</body>
</html>
