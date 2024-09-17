@extends('layout')

{{-- title --}}
@section('title', $user -> name . ' | Doctor')

{{-- style css --}}
@section('style')
    <link rel="stylesheet" href="{{ asset('css/doctorDash.css') }}">
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
                <p class="uniqData">{{ $user -> speciality }}</p>
            </div>
            <div class="box">
                {{-- <a href="{{ route('appointment') }}">
                    <p>Make Appointment</p>
                </a>
                <a href="{{ route('cart') }}">
                    <p>My Cart</p>
                </a> --}}
                <a href="{{ route('logout') }}">
                    <p>Log Out</p>
                </a>
            </div>
        </div>
        <div class="subframe">
            <p class="topic">Appointments</p>

            @foreach ($appo as $appointment) 
                @if ($appointment['status'] === 'approve')
                    <div class="row">
                        {{-- date --}}
                        <div class="data">{{ $appointment['date'] }}</div> 
                        {{-- patient --}}
                        <div class="data">{{ $appointment['patient'] }}</div>
                        {{-- status --}}
                        <div class="data">{{ $appointment['status'] }}</div>
                        {{-- action --}}
                        <div class="data">
                            <a href="{{ route('appointment.examine', ['id' => $appointment['id']]) }}">View</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="subframe">
            <p class="topic">History</p>
            @foreach ($appo as $appointment) 
                @if ($appointment['status'] === 'done')
                    <div class="row">
                        {{-- date --}}
                        <div class="data">{{ $appointment['date'] }}</div> 
                        {{-- patient --}}
                        <div class="data">{{ $appointment['patient'] }}</div>
                        {{-- status --}}
                        <div class="data">{{ $appointment['status'] }}</div>
                        {{-- action --}}
                        <div class="data">
                            <a href="{{ route('appointment.examine', ['id' => $appointment['id']]) }}">View</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection
