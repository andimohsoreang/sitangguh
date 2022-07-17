<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SI-LAPBEN | LOGIN</title>
    <link rel="stylesheet" href="{{ asset('be/assets/css/bootstrap.css') }}">
    
    <link rel="shortcut icon" href="{{ asset('be/assets/images/bpbdlogo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('be/assets/css/app.css') }}">
    <style>
        #auth {
            background-image: none;
        }
        .bg-new-warning {
            background-color: #ff990b !important;
        }

        .bg-new-dark {
            background-color: #252525 !important;
        }

        .text-new-warning {
            color: #ff990b !important;
        }

        .text-new-dark {
            color: #252525;
        }
    </style>
</head>
<body>
    <div id="auth" class="bg-new-warning">
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>
