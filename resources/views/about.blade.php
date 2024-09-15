@extends('layout')

{{-- title --}}
@section('title', 'Healthcare | About Us')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/aboutStyles.css') }}">
@endsection

{{-- content --}}
@section('content')
    <section class="about-content">
        <h1>About Us</h1>
        <h2>Our Mission</h2>
        <p>At Doctor Person Details, our mission is to provide comprehensive and accessible healthcare information to individuals seeking to improve their health and well-being. We are dedicated to connecting people with the medical resources they need to make informed decisions about their health.</p>

        <h2>Our Vision</h2>
        <p>We envision a world where everyone has access to reliable healthcare information and resources. Our goal is to empower individuals with the knowledge they need to lead healthier, happier lives.</p>

        <h2>Our Team</h2>
        <p>Our team is composed of experienced healthcare professionals and dedicated individuals who are passionate about improving access to healthcare information. We work tirelessly to ensure that the information we provide is accurate, up-to-date, and trustworthy.</p>

        <h2>Contact Us</h2>
        <p>If you have any questions or need more information, please don't hesitate to <a href="{{ url('/contact') }}">contact us</a>. We're here to help you on your journey to better health.</p>
    </section>
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection
