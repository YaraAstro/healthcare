@extends('layout')

{{-- title --}}
@section('title', $user -> name . ' | Patient')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/patientDash.css') }}">
@endsection

{{-- content --}}
@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors -> any())
        <div class="alert alert-danger">{{ $errors }}</div>
    @endif
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
            <a href="{{ route('cart', ['id' => $user->id]) }}">
                <p>My Cart</p>
            </a>
            <a href="{{ route('logout') }}">
                <p>Log Out</p>
            </a>
        </div>
    </div>

    <div class="subframe">
        <p class="topic">Approved Appointments</p>
        @foreach ($approve as $green)
            <div class="row">
                {{-- date --}}
                <div class="data">{{ $green['date'] }}</div> 
                {{-- doctor --}}
                <div class="data">{{ $green['doctor'] }}</div>
                {{-- status --}}
                <div class="data">{{ $green['status'] }}</div>
                {{-- action --}}
                <div class="data">
                    <a href="{{ route('prescription', ['id' => $green['presc']]) }}">View</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="subframe">
        <p class="topic">Pending Appointments</p>
        @foreach ($pending as $yellow)
            <div class="row">
                {{-- date --}}
                <div class="data">{{ $yellow['date'] }}</div> 
                {{-- doctor --}}
                <div class="data">{{ $yellow['doctor'] }}</div>
                {{-- status --}}
                <div class="data">{{ $yellow['status'] }}</div>
                {{-- action --}}
                <div class="data">
                    <a href="{{ route('prescription', ['id' => $yellow['presc']]) }}">View</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="subframe">
        <p class="topic">Rejected Appointments</p>
        @foreach ($reject as $red)
            <div class="row">
                {{-- date --}}
                <div class="data">{{ $red['date'] }}</div> 
                {{-- doctor --}}
                <div class="data">{{ $red['doctor'] }}</div>
                {{-- status --}}
                <div class="data">{{ $red['status'] }}</div>
                {{-- action --}}
                <div class="data">
                    <a href="{{ route('prescription', ['id' => $red['presc']]) }}">View</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="subframe">
        <p class="topic">Completed Appointments</p>
            @foreach ($done as $blue)
                <div class="row">
                    {{-- date --}}
                    <div class="data">{{ $blue['date'] }}</div> 
                    {{-- doctor --}}
                    <div class="data">{{ $blue['doctor'] }}</div>
                    {{-- status --}}
                    <div class="data">{{ $blue['status'] }}</div>
                    {{-- action --}}
                    <div class="data">
                        <a href="{{ route('prescription', ['id' => $blue['presc']]) }}">View</a>
                    </div>
                </div>
            @endforeach
    </div>
</div>
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection
