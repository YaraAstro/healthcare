<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Healthcare | Contact Us</title>
    <link rel="shortcut icon" href="{{ asset('notes_medical_solid.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/contactStyles.css') }}">
</head>
<body>
    
    <main class="container text-center mt-5">
        <h1>Contact Us</h1>
        <p>If you have any questions, feel free to reach out to us through the form below.</p>

        <!-- Contact Form -->
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <!-- Message Field -->
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
            </div>

            <!-- Submit Button -->
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
