@extends('layouts.front.app', ['title' => 'Home'])

@section('content')
<!-- knowledge section end -->
<div class="knowledge_section layout_padding">
    <div class="container">
        <div class="knowledge_main">
            <div class="left_main">
                <h1 class="knowledge_taital">Knowledge of center</h1>
                <p class="knowledge_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>
            <div class="right_main">
                <div class="play_icon"><a href="#"><img src="{{ asset('front/images/play-icon.png') }}"></a></div>
            </div>
        </div>
    </div>
</div>
<!-- knowledge section end -->

<!-- news section start -->
<div class="news_section layout_padding">
    <div class="container">
        <h1 class="health_taital">Why choose 24hr home care</h1>
        <p class="health_text">labore et dolore magna aliqua. Ut enim ad minim veniam</p>
        <div class="news_section_2 layout_padding">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="box_main">
                        <div class="icon_1"><img src="{{ asset('front/images/icon-2.png') }}"></div>
                        <h4 class="daily_text">Daily care experts</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="box_main active">
                        <div class="icon_1"><img src="{{ asset('front/images/icon-3.png') }}"></div>
                        <h4 class="daily_text_1">Available 24/7</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="box_main">
                        <div class="icon_1"><img src="{{ asset('front/images/icon-4.png') }}"></div>
                        <h4 class="daily_text_1">Balanced care</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="getquote_bt"><a href="#">Get A Quote <span><img src="{{ asset('front/images/right-arrow.png') }}"></span></a></div>
    </div>
</div>
<!-- news section end -->
@endsection