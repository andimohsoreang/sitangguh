<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sign in - Voler Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('be/assets/css/bootstrap.css') }}">
    
    <link rel="shortcut icon" href="{{ asset('be/assets/images/bpbdlogo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('be/assets/css/app.css') }}">
    <style>
        #auth {
            background-image: none;
        }
    </style>
</head>
<body>
    <div id="auth" class="bg-danger">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>
