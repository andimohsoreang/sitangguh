<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        SILAPBEN - 
        @role('admin') Administartor @endrole
        @role('petugas') Petugas @endrole
        @role('user') Masyarakat @endrole
        {{ $title ?? '' }}
    </title>

    <link rel="stylesheet" href={{ asset('be/assets/css/bootstrap.css') }}>

    <link rel="stylesheet" href={{ asset('be/assets/vendors/chartjs/Chart.min.css') }}>
    <link rel="stylesheet" href={{ asset('be/assets/vendors/simple-datatables/style.css') }}>
    <link rel="stylesheet" href={{ asset('be/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}>
    <link rel="stylesheet" href={{ asset('be/assets/css/app.css') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href={{ asset('be/assets/images/bpbdlogo.png') }} type="image/x-icon">
    @yield('csscustom')
</head>

<body>
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            @include('partials.navbar')

            <div class="main-content container-fluid">
                <div class="page-title">
                    @yield('section')
                </div>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; <small>SITAGGGUH</small></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src={{ asset('be/assets/js/feather-icons/feather.min.js') }}></script>
    <script src={{ asset('be/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}></script>
    <script src={{ asset('be/assets/js/app.js') }}></script>

    <script src={{ asset('be/assets/vendors/chartjs/Chart.min.js') }}></script>
    <script src={{ asset('be/assets/vendors/apexcharts/apexcharts.min.js') }}></script>
    <script src={{ asset('be/assets/vendors/leaflet/leaflet.js') }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src={{ asset('be/assets/js/pages/dashboard.js') }}></script> --}}

    <script src={{ asset('be/assets/js/main.js') }}></script>
       
    <script src={{ asset('be/assets/vendors/simple-datatables/simple-datatables.js') }}></script>
    <script src={{ asset('be/assets/js/vendors.js') }}></script>

    <script>
        $(document).ready(function() {
            $('.image-link').magnificPopup({
                delegate: 'a',
                type: 'image',
            });
        });
    </script>
    @yield('scripts')
</body>

</html>