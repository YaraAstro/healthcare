# Manually Handle Login with a Custom Model

Sure! Here’s a simple explanation of how to manually handle login with a custom Patient model:

### 1. *Update Login Controller*

In your login controller, modify the login method to manually check the patient's email and password.
```
php
public function login(Request $request)
{
    // Validate the login form inputs
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Get the login credentials
    $credentials = $request->only('email', 'password');

    // Find the patient by email
    $patient = Patient::where('email', $credentials['email'])->first();

    // Check if the patient exists and the password is correct
    if ($patient && Hash::check($credentials['password'], $patient->password)) {
        // Log in the patient
        Auth::login($patient);

        // Redirect to the dashboard or intended page
        return redirect()->intended('dashboard');
    }

    // Return an error if credentials are incorrect
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}
```

### 2. *Ensure Passwords are Hashed*

When creating or updating patients, make sure their passwords are hashed. This is important for security.

```
php
use Illuminate\Support\Facades\Hash;

$patient = new Patient;
$patient->email = 'example@example.com';
$patient->password = Hash::make('password'); // Hash the password
$patient->save();
```

### 3. *Setup Patient Model*

Make sure your Patient model is set up correctly to work with authentication.
```
php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    use Notifiable;

    // Additional attributes or methods
}
```

### 4. *Test Everything*

Check if your login process works as expected:
- Use valid credentials to log in.
- Ensure incorrect credentials show an error.
- Verify that users are redirected properly after logging in.

By following these steps, you manually handle login by checking the email and password directly and then logging in the patient if the credentials are correct. 

---
# Blade.php & Controllers
---

To connect a controller function with a Blade file in Laravel, you need to follow these steps:

### 1. *Define a Route*

First, define a route that maps to your controller function. This route is responsible for handling HTTP requests and directing them to the correct controller and method.

In `routes/web.php`:

```
php
use App\Http\Controllers\YourController;

Route::get('/details', [YourController::class, 'showDetails'])->name('details');
```

This route listens for GET requests to /details and calls the showDetails method in YourController.

### 2. *Create or Update the Controller*

In your controller, define the method that retrieves the data and returns the view. Make sure this method matches the one used in the route.

For example, in `app/Http/Controllers/YourController.php`:

```
php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class YourController extends Controller
{
    public function showDetails()
    {
        // Retrieve data from the database using session variable
        $patientId = session('patient_id');
        $patient = Patient::find($patientId);

        // Pass the data to the Blade view
        return view('details', ['patient' => $patient]);
    }
}
```

### 3. *Create or Update the Blade View*

In the Blade view file, use the data passed from the controller to display information. This file should be located in `resources/views`.

For example, in `resources/views/details.blade.php`:
```
blade
<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
</head>
<body>
    <h1>Patient Details</h1>

    @if($patient)
        <p><strong>Name:</strong> {{ $patient->name }}</p>
        <p><strong>Email:</strong> {{ $patient->email }}</p>
        <!-- Add more details as needed -->
    @else
        <p>No patient data found.</p>
    @endif
</body>
</html>
```

### Summary

1. *Define a Route*: Set up a route in routes/web.php that maps to the controller method.
2. *Create/Update Controller*: Write a method in the controller to fetch data and return the view with that data.
3. *Create/Update Blade View*: Design the Blade template to display the data passed from the controller.

When you visit the URL corresponding to the route (e.g., /details), Laravel will call the controller method, fetch the data, and render the Blade view with that data.

---
# Routing with Dynamic Routes
---

If you have a custom Patient model and you need to redirect users to a dashboard route like `/profile/{username}` based on a session variable, you can achieve this by following these steps:

### 1. *Define the Route for the Dashboard*

In your web.php file, define the route for the profile dashboard:

```
php
Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
```

### 2. *Redirect Based on Session Variable*

In your controller or any place where you handle the logic for routing, use the session variable to determine the username and redirect accordingly.

Assuming you have a Patient model and a username stored in the session after a custom login procedure, you can do something like this:

*Example Controller Method:*
```
php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;  // Import your Patient model

class SomeController extends Controller
{
    public function someMethod()
    {
        // Access the username from the session
        $username = session('username');

        if ($username) {
            // Redirect to the profile route with the username
            return redirect()->route('profile.show', ['username' => $username]);
        }

        // Handle the case where the session variable is not set
        // For example, redirect to a login page or show an error
        return redirect('/login')->with('error', 'Please log in.');
    }
}
```

### 3. *Profile Controller*

Create a ProfileController if you haven't already:

```
php artisan make:controller ProfileController
```

Then, implement the show method in ProfileController:

```
php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;  // Import your Patient model

class ProfileController extends Controller
{
    public function show($username)
    {
        // Retrieve the patient using the username
        $patient = Patient::where('username', $username)->first();

        if (!$patient) {
            // Handle the case where the patient is not found
            return redirect('/error')->with('error', 'Profile not found.');
        }

        // Return the profile view with patient data
        return view('profile.show', ['patient' => $patient]);
    }
}
```

### 4. *Ensure the Route is Accessible*

Make sure you have the necessary view file `resources/views/profile/show.blade.php` to display the patient's profile information.

### 5. *Session Management*

Ensure that the session is properly managed and the username is correctly stored in the session during the login process. This typically involves setting the session variable after the user logs in:

```
php
// Example login process
session(['username' => $patient->username]);
```

By following these steps, you ensure that users are redirected to their profile dashboard based on the session variable, handling custom authentication without relying on Laravel's built-in authentication features.

---
# Sessions in Laravel
---

Certainly! Here's a simplified approach to redirect users to a profile page based on a session variable in Laravel:

1. *Define the Route:*
   - Create a route for the user profile page in routes/web.php:
    ```
     php
     Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
    ```

2. *Redirect to Profile Based on Session Variable:*
   - In your controller, use the session variable to redirect the user to their profile page:

    ```
     php
     namespace App\Http\Controllers;

     use Illuminate\Http\Request;

     class SomeController extends Controller
     {
         public function someMethod()
         {
             // Get the username from the session
             $username = session('username');

             if ($username) {
                 // Redirect to the profile page with the username
                 return redirect()->route('profile.show', ['username' => $username]);
             }

             // If no username in session, redirect to login or error page
             return redirect('/login')->with('error', 'Please log in.');
         }
     }
    ```

3. *Create the Profile Controller:*
   - Generate a controller for the profile page:

    ```
     php artisan make:controller ProfileController
    ```

   - Implement the method to handle showing the profile in ProfileController:

    ```
     php
     namespace App\Http\Controllers;

     use App\Models\Patient;

     class ProfileController extends Controller
     {
         public function show($username)
         {
             // Find the patient by username
             $patient = Patient::where('username', $username)->first();

             if (!$patient) {
                 // Handle the case where the patient is not found
                 return redirect('/error')->with('error', 'Profile not found.');
             }

             // Return the view with patient data
             return view('profile.show', ['patient' => $patient]);
         }
     }
    ```

4. *Session Management:*
   - Make sure to store the username in the session after the user logs in:
    
    ```
     php
     // Example after successful login
     session(['username' => $patient->username]);
    ``` 

This approach redirects users to `/profile/{username}` based on their session data and shows their profile information.

---
# Layouts with Dynamic Styles & Titles
---
Sure! Here’s a simple way to handle different CSS files and titles for pages that use the same layout in a Laravel project:

1. *Create Your Layout*:
   - In your main layout file (resources/views/layouts/app.blade.php), set up placeholders for the title and CSS. 
    ```
     html
     <!DOCTYPE html>
     <html>
     <head>
         <title>@yield('title', 'Default Title')</title>
         @yield('styles') <!-- Placeholder for CSS -->
     </head>
     <body>
         <header>
             <h1>My Application</h1>
         </header>

         <main>
             @yield('content') <!-- Placeholder for main content -->
         </main>

         <footer>
             <p>&copy; {{ date('Y') }} My Application</p>
         </footer>
     </body>
     </html>
    ```

2. *Set Titles and CSS in Views*:
   - In your specific page views, define the title and CSS. For example:

    ```
     html
     <!-- resources/views/page1.blade.php -->
     @extends('layouts.app')

     @section('title', 'Page 1 Title')

     @section('styles')
         <link rel="stylesheet" href="{{ asset('css/page1.css') }}">
     @endsection

     @section('content')
         <h2>Welcome to Page 1</h2>
         <p>This is Page 1.</p>
     @endsection
    ```
    ```
     html
     <!-- resources/views/page2.blade.php -->
     @extends('layouts.app')

     @section('title', 'Page 2 Title')

     @section('styles')
         <link rel="stylesheet" href="{{ asset('css/page2.css') }}">
     @endsection

     @section('content')
         <h2>Welcome to Page 2</h2>
         <p>This is Page 2.</p>
     @endsection
    ``` 

3. *Load Views in Controller*:
   - In your controller, return the view as needed. For example:
    ```
     php
     public function showPage1() {
         return view('page1'); // Uses the title and CSS from page1.blade.php
     }

     public function showPage2() {
         return view('page2'); // Uses the title and CSS from page2.blade.php
     }
    ```     

This setup lets you use the same layout but customize the title and CSS for each page.

---
# Layouting in Laravel
---

To handle Blade views in Laravel that use the same layout but require different CSS files and titles, you can pass these values from your controller to the view and dynamically inject them into the layout. Here’s how you can manage this:

1. *Update Your Layout File*:
   - Modify your layout file (`resources/views/layouts/app.blade.php`) to accept dynamic CSS and title values. Use Blade directives to include the CSS and set the title.
    ```
     html
     <!DOCTYPE html>
     <html>
     <head>
         <title>@yield('title', 'Default Title')</title>
         @yield('styles')
         <!-- Default or shared CSS -->
         <link rel="stylesheet" href="{{ asset('css/app.css') }}">
     </head>
     <body>
         <header>
             <h1>My Application</h1>
             <!-- Navigation goes here -->
         </header>

         <main>
             @yield('content')
         </main>

         <footer>
             <p>&copy; {{ date('Y') }} My Application</p>
         </footer>

         @yield('scripts')
     </body>
     </html>
    ``` 

2. *Define CSS and Title in Views*:
   - In your individual views, specify the CSS files and title using Blade sections. For example:
    
    ```
     html
     <!-- resources/views/page1.blade.php -->
     @extends('layouts.app')

     @section('title', 'Page 1 Title')

     @section('styles')
         <link rel="stylesheet" href="{{ asset('css/page1.css') }}">
     @endsection

     @section('content')
         <h2>Welcome to Page 1</h2>
         <p>This is the content of Page 1.</p>
     @endsection
    ``` 
    ```
     html
     <!-- resources/views/page2.blade.php -->
     @extends('layouts.app')

     @section('title', 'Page 2 Title')

     @section('styles')
         <link rel="stylesheet" href="{{ asset('css/page2.css') }}">
     @endsection

     @section('content')
         <h2>Welcome to Page 2</h2>
         <p>This is the content of Page 2.</p>
     @endsection
    ``` 

3. *Pass Dynamic Data from Controllers*:
   - In your controllers, you can pass data to your views, although for title and CSS this is handled directly in the views as shown. For more complex scenarios, you can pass data like this:
    ```
     php
     public function showPage1() {
         return view('page1'); // Uses the title and CSS defined in the view
     }

     public function showPage2() {
         return view('page2'); // Uses the title and CSS defined in the view
     }
    ``` 

By setting up your Blade layouts and views in this manner, you can efficiently manage different CSS files and titles for various pages while maintaining a consistent layout structure.

