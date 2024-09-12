<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Prescription</title>
    <link rel="shortcut icon" href="{{ asset('notes_medical_solid.ico') }}" type="image/x-icon">

    <!-- Styles -->
    {{-- Include Bootstrap if necessary --}}
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/prescriptionStyles.css') }}">

</head>
<body>
    
    <main>
        <div class="prescription-form">
            <h2>Prescription Form</h2>
            <h3>Prescription Details</h3>

            {{-- Assuming the form is meant to post data to a route for processing --}}
            <form action="{{ route('prescription.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="patientName">Patient Name:</label>
                    <input type="text" id="patientName" name="patient_name" required>
                </div>
                <div class="form-group">
                    <label for="patientId">Patient ID:</label>
                    <input type="text" id="patientId" name="patient_id" required>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" required>
                </div>
                <div class="form-group">
                    <label for="drugSearch">Drug Search:</label>
                    <input type="text" id="drugSearch" name="drug_search">
                    <button type="button" id="searchButton">Search</button>
                </div>
                <div class="form-group">
                    <label for="drug1">Drug 1:</label>
                    <input type="text" id="drug1" name="drug1">
                </div>
                <div class="form-group">
                    <label for="drug2">Drug 2:</label>
                    <input type="text" id="drug2" name="drug2">
                    <button type="button">✓</button>
                    <button type="button">✕</button>
                </div>
                <div class="form-group">
                    <label for="drug3">Drug 3:</label>
                    <input type="text" id="drug3" name="drug3">
                </div>
                <div class="form-group">
                    <label for="drug4">Drug 4:</label>
                    <input type="text" id="drug4" name="drug4">
                </div>
                <div class="form-actions">
                    <button type="submit">Checkout</button>
                    <button type="button">Buy Now</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
