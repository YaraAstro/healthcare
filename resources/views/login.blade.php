@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Login')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/loginStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <h1>Login</h1>`

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors -> any())
        <div class="alert alert-danger">{{ $errors }}</div>
    @endif
    

    <form action="{{ route('login.action') }}" method="POST">
        @csrf
        @method('post')
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <input type="submit" value="Login">

        <p>Create New Account: <a href="{{ route('register') }}">Register</a></p>
    </form>
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection
