<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Appointment</title>
    <link rel="shortcut icon" href="{{ asset('notes_medical_solid.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/appoStyles.css') }}">
</head>
<body>

    <div class="container">
        <h1>Appointment Form</h1>
        <form action="{{ route('appointment.store') }}" method="POST" class="appointment-form">
            @csrf
            <!-- Doctor Information -->
            <div class="form-section">
                <h2>Doctor Information</h2>
                <div class="form-group">
                    <label for="doctor-name">Doctor Name</label>
                    <input type="text" id="doctor-name" name="doctor_name" required>
                </div>

                <div class="form-group">
                    <label for="doctor-id">Doctor ID</label>
                    <input type="text" id="doctor-id" name="doctor_id" required>
                </div>

                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <input type="text" id="speciality" name="speciality" required>
                </div>

                <div class="form-group">
                    <label for="doctor-email">Email</label>
                    <input type="email" id="doctor-email" name="doctor_email" required>
                </div>

                <button type="submit" class="submit-btn">Submit</button>
            </div>

            <!-- Patient Information -->
            <div class="form-section">
                <h2>Patient Information</h2>
                <div class="form-group">
                    <label for="patient-name">Patient Name</label>
                    <input type="text" id="patient-name" name="patient_name" required>
                </div>

                <div class="form-group">
                    <label for="patient-id">Patient ID</label>
                    <input type="text" id="patient-id" name="patient_id" required>
                </div>

                <div class="form-group">
                    <label for="patient-age">Age</label>
                    <input type="number" id="patient-age" name="patient_age" required>
                </div>

                <div class="form-group">
                    <label for="patient-phone">Phone Number</label>
                    <input type="tel" id="patient-phone" name="patient_phone" required>
                </div>

                <button type="submit" class="submit-btn">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
