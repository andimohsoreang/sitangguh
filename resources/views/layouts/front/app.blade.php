<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>SILAPBEN - BNPB Gorontalo</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('front/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo">
                <a href="{{ route('front.home') }}" class="d-flex align-items-center">
                    <img style="width: 40px;" src="{{ asset('front/images/bnpblogo.png') }}"> 
                    <h3 class="m-0 mt-2 ml-2 font-weight-bold">SI-LAPBEN</h3>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    @auth                          
                        <li class="nav-item">
                            <a class="nav-link bg-warning text-white"
                            @role('admin')
                                href="{{ route('admin.index') }}"
                            @endrole
                            @role('user')
                                href="{{ route('petugas.index') }}"
                            @endrole
                            @role('user')
                                href="{{ route('user.index') }}"
                            @endrole
                            >
                                <i class="fa fa-arrow-left"></i> Back to My Page
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link bg-warning text-white" href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a>
                        </li>                 
                    @endauth                
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="health.html">Page 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="medicine.html">Medicine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.html">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="client.html">Client</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li> --}}
                </ul>
            </div>
        </nav>
        <!-- header section end -->

        @if (request()->routeIs('front.home'))
            <!-- banner section start -->
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="banner_section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="banner_taital">SI - LAPBEN <br><span
                                                style="color: #151515;">Gorontalo</span></h1>
                                        <p class="banner_text">Sistem Informasi Laporan Penanggulangan Bencana</p>
                                        <div class="btn_main">
                                            <div class="more_bt"><a href="#">Contact Now</a></div>
                                            <div class="contact_bt"><a href="#">Get A Quote</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="image_1"><img src="{{ asset('front/images/logobencana.png') }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="banner_section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="banner_taital">SI - LAPBEN <br><span
                                                style="color: #151515;">Gorontalo</span></h1>
                                        <p class="banner_text">Sistem Informasi Laporan Penanggulangan Bencana</p>
                                        <div class="btn_main">
                                            <div class="more_bt"><a href="#">Contact Now</a></div>
                                            <div class="contact_bt"><a href="#">Get A Quote</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="image_1"><img src="{{ asset('front/images/logobencana.png') }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="banner_section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h1 class="banner_taital">SI - LAPBEN <br><span
                                                style="color: #151515;">Gorontalo</span></h1>
                                        <p class="banner_text">Sistem Informasi Laporan Penanggulangan Bencana</p>
                                        <div class="btn_main">
                                            <div class="more_bt"><a href="#">Contact Now</a></div>
                                            <div class="contact_bt"><a href="#">Get A Quote</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="image_1"><img src="{{ asset('front/images/logobencana.png') }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                    <i class="fa fa-long-arrow-left" style="font-size:24px; padding-top: 4px;"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                    <i class="fa fa-long-arrow-right" style="font-size:24px; padding-top: 4px;"></i>
                </a>
            </div>
        </div>
        <!-- banner section end -->
    @endif
        

    @yield('content')

    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer_logo"><a href="index.html"><img src="{{ asset('front/images/bnpblogo.png') }}"></a></div>
                    <h1 class="adderss_text">Contact Us</h1>
                    <div class="map_icon"><img src="{{ asset('front/images/map-icon.png') }}"><span class="paddlin_left_0">Page when looking
                            at its</span></div>
                    <div class="map_icon"><img src="{{ asset('front/images/call-icon.png') }}"><span
                            class="paddlin_left_0">+7586656566</span></div>
                    <div class="map_icon"><img src="{{ asset('front/images/mail-icon.png') }}"><span
                            class="paddlin_left_0">volim@gmail.com</span></div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h1 class="adderss_text">BNPB</h1>
                    <div class="hiphop_text_1">There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered alteration in some form, by injected humour,</div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h1 class="adderss_text">Keterangan</h1>
                    <div class="Useful_text">There are many variations of passages of Lorem Ipsum available, but the
                        majority have suffered ,</div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <h1 class="adderss_text">Newsletter</h1>
                    <input type="text" class="Enter_text" placeholder="Masukan Email Anda" name="Enter your Emil">
                    <div class="subscribe_bt"><a href="#">Subscribe</a></div>
                    <div class="social_icon">
                        <ul>
                            <li><a href="#"><img src="{{ asset('front/images/fb-icon.png') }}"></a></li>
                            <li><a href="#"><img src="{{ asset('front/images/twitter-icon.png') }}"></a></li>
                            <li><a href="#"><img src="{{ asset('front/images/linkedin-icon.png') }}"></a></li>
                            <li><a href="#"><img src="{{ asset('front/images/instagram-icon.png') }}"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">2022 All Rights Reserved.</p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('front/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('front/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ asset('front/js/owl.carousel.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
