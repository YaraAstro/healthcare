@extends('layout')

{{-- title --}}
@section('title', $user -> name . ' | Patient')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/patientDash.css') }}">
@endsection

{{-- content --}}
@section('content')
<div class="frame">
    <div class="subframe">
        <div class="box">
            <h1>{{ $user -> name }}</h1>
            <p class="email">{{ $user -> email }}</p>
            <p class="uniqData">{{ $user -> mobile }}</p>
        </div>
        <div class="box">
            <a href="{{ route('appointment') }}">
                <p>Make Appointment</p>
            </a>
            <a href="{{ route('cart') }}">
                <p>My Cart</p>
            </a>
            <a href="{{ route('logout') }}">
                <p>Log Out</p>
            </a>
        </div>
    </div>
    <div class="subframe">
        <p class="topic">Appointments</p>

        <div class="table">
            <div class="row">
                {{-- date --}}
                <div class="data">Lorem, ipsum.</div> 
                {{-- patient --}}
                <div class="data">Lorem, ipsum.</div>
                {{-- status --}}
                <div class="data">Lorem, ipsum.</div>
                {{-- action --}}
                <div class="data">
                    <a href="">Lorem, ipsum.</a>
                </div>
            </div>
        </div>
    </div>
    <div class="subframe">
        <p class="topic">History</p>
    </div>
</div>
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection
