<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Healthcare | Error</title>
    <link rel="shortcut icon" href="{{ asset('notes_medical_solid.ico') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/errorStyles.css') }}">

</head>
<body>
    <main class="d-flex justify-content-center align-items-center bg-danger">
        <div class="d-flex align-items-center flex-column text-danger">
            <div class="row">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM176.4 176a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm128 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM160 336l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                </div>
                <div class="topic">
                    <h2>Oops ! :(</h2>
                    <p>something went wrong!</p>
                </div>
            </div>
            <div class="details">
                @if ($errors->any())
                    <ul>
                        @foreach ($errors -> all as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </main>
</body>
</html>