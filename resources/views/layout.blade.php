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
    <link rel="stylesheet" href="{{ asset('css/header_footer.css') }}">
    @yield('style')

</head>
<body>
    
    {{-- header --}}
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
            <a class="navbar-brand" href="{{ route('home') }}">D P S</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}">Product</a></li>
                    @if (session()->has('username'))
                        <li class="nav-item">
                            @php
                                $profileRoute = (session('role') === 'doctor') 
                                    ? route('profile.doctor', ['username' => session('username')]) 
                                    : route('profile.patient', ['username' => session('username')]);
                            @endphp
                            <a class="nav-link" href="{{ $profileRoute }}">{{ session('username') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li> --}}
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
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