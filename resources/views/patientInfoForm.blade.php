<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Examine</title>
    <link rel="shortcut icon" href="{{ asset('notes_medical_solid.ico') }}" type="image/x-icon">

    <!-- Styles -->
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/examineStyles.css') }}">
</head>
<body>

    <div class="container">
        <!-- Patient Information Section -->
        <section class="patient-info">
            <h2>Patient's Information Form</h2>
            <form action="{{ route('examine.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="patient-name">Patient Name:</label>
                    <input type="text" id="patient-name" name="patient_name" required>
                </div>

                <div class="form-group">
                    <label for="patient-id">Patient ID:</label>
                    <input type="text" id="patient-id" name="patient_id" required>
                </div>

                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="symptoms">Symptoms:</label>
                    <input type="text" id="symptoms" name="symptoms" required>
                </div>
            </form>
        </section>

        <!-- Drag Section -->
        <section class="drag-section">
            <div class="search-bar">
                <label for="search">Search</label>
                <input type="text" id="search" name="search">
                <button type="button">🔍</button>
            </div>

            <!-- Drag Items -->
            @foreach(range(1, 4) as $dragItem)
                <div class="drag-item">
                    <label for="drag{{ $dragItem }}">Drag {{ $dragItem }}:</label>
                    <input type="text" id="drag{{ $dragItem }}" name="drag{{ $dragItem }}">
                    <button type="button">❌</button>
                    <button type="button">✔️</button>
                </div>
            @endforeach

            <div class="form-actions">
                <button type="button">Add</button>
                <button type="submit">Submit</button>
            </div>
        </section>
    </div>
    
</body>
</html>
