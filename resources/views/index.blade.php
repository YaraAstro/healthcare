@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | Home')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/homeStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <main class="container text-center mt-5">
        <h1>Welcome to Our Website</h1>
        <p>This is the homepage. We are glad to have you here.</p>
        <a href="/login" class="btn btn-success">Get Started</a>
    </main>
@endsection

{{-- scripts --}}
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

