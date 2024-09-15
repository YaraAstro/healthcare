<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'page title')</title>
    <link rel="shortcut icon" href="{{ asset('notes_medical_solid.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @yield('style')

</head>
<body>
    
    {{-- header --}}
    <header>
        <nav class="navbar">
            <a class="navbar-brand" href="#">Your Brand</a>
            <div class="navbar-menu">
                <a class="nav-link" href="#">Home</a>
                <a class="nav-link" href="#">About Us</a>
                <a class="nav-link" href="#">Contact Us</a>
                <a class="nav-link" href="#">Product</a>
                <a class="nav-link" href="#">Register</a>
            </div>
        </nav>
    </header>

    {{-- main content --}}
    <main>
        @yield('content')
    </main>

    {{-- footer --}}
    <footer>
        <p>&copy; 2024 Your Company Name. All rights reserved.</p>
    </footer>

    @yield('scripts')

</body>
</html>