@extends('front.app')

@section('title', '')

@section('header_script')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript">
        var win_width = $(window).width();

        $(document).on('ready', function() {

            if ($(window).width() < 991) {
                $('.slider').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1
                });


            } else {
                if ($('.slider').hasClass('slick-initialized')) {
                    $('.slider').slick('unslick');
                }
            }

        });

        $(window).resize(function() {
            if ($(window).width() < 991) {

                $('.slider').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1
                });


            } else {
                if ($('.slider').hasClass('slick-initialized')) {
                    $('.slider').slick('unslick');
                }
            }
        });
    </script>
    <script>
        /*search tab*/
        $(document).ready(function() {
            $('.desktop_group').click(function() {
                $(".desktop_search_tab").slideToggle();
                $(".mob_search_tab").hide();
            });
            // $('.sub_search').click(function() {
            //     $(".desktop_search_tab").slideToggle();
            //     $(".mob_search_tab").hide();
            // });
            $('.mobile_group').click(function() {
                $(".mob_search_tab").slideToggle();
                $(".search_tab").hide();
            });


            $('.ipad_new_search .ipad_search').click(function() {
                $(".search_group input.form-control").show();
                if ($(".ipad_abs").length) {
                    $('.ipad_new_search').removeClass('ipad_abs');
                    //alert('bye' + $(".ipad_abs").length);
                    $(".search_group input.form-control").hide();

                } else {
                    $('.ipad_new_search').addClass('ipad_abs');
                    // alert('hi' + $(".ipad_abs").length);
                    $(".search_group input.form-control").show();


                }




            });



        });

        $(document).ready(function(){
        $(".progress-bar").loading();
        $('input').on('click', function () {
             $(".progress-bar").loading();
        });
    });

        /*search tab*/
    </script>
    <style type="text/css">
        .banner img {
            object-fit: cover;
            height: 100%;
        }

        .banner .item {
            height: 350px;
        }

        .carousel-inner {
            height: 265px!important;
        }

        .carousel .carousel-inner .item img {
            height: 265px!important;
        }

        .dashboard-sec .banner .item .caption {
            width: 100%!important;
        }

        .caption .advertise_btn a {
            width: 200px;
            height: 40px;
            font-family: "Rubik-Regular";
            font-weight: 600;
            margin-top: 20px;
        }

        .mariki h1 {
            margin-top: 18px!important;
        }

        @media only screen and (min-width:320px) and (max-width:767px) {
            .dash_art_mob .container.artist-dashboard .banner .advertise_btn a {
                margin: 0 auto;
                float: none;
            }
        }

        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'dash_board_art_banner')

@section('content')

@php
$activeSidebar = 'dashboard';
@endphp

        <!--Page Content Start-->

        <!--dashboard artist-->
        <section>
            <div class="dashboard-sec dash_art_mob slidpad">
                <div class="container artist-dashboard">
                    <div class="row">


                        <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">

                            @include('front.user-sidebar')

                        </div>
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">
                            <!--banner-->
                            @if($profile_percentage == 100)                            <div class="banner dasban artist_vbann  bann_btm">
                            <div class="item">
                                <img src="images/ban1.png" title="slidepicture" alt="slidepicture" class="deskbani">
                                <!-- <img src="images/mobdash.png" title="slidepicture" alt="slidepicture" class="mobbani"> -->
                                <div class="caption">
                                    <h2>Welcome back!</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="advertise_btn">
                                        <a href="#">View Orders</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @else
                            <div class="banner">
                                <div class="item">
                                    <img src="images/artist1.png" title="slidepicture" alt="slidepicture" class="deskbani img-responsive">
                                    <!-- <img src="images/mobcaro.png" title="slidepicture" alt="slidepicture" class="mobbani"> -->

                                   <div style="width: 100% !important;" id="caption_wrapper" class="caption">
                                        <div class="captions_width">
                                        <h2>{{ __('dashboard-artist.Welcome to') }} Cool Jelly Bean!</h2>
                                        <p>{{ __('dashboard-artist.Thanks for registering! Before you can start selling, your shop needs to be') }} <span class="rosepnk_clr"> 100%</span> completed... don’t worry it won’t take long! Follow our simple steps below to get up and running...</p>
                                        

                                        <div class="advertise_btn">
                                            <a href="{{ url('edit-profile') }}">{{ __('dashboard-artist.COMPLETE PROFILE') }}</a>
                                        </div>
                                    

                                    </div>

                                    <div id="circle_bar_jelly" class="header_completion">
                                        <div class="progress-bar position" data-percent="{{ $profile_percentage }}" data-color="#17b4e8,#ed1277">
                                            <div id="bar_content">
                                                <p>{{ __('dashboard-artist.SHOP') }}</p>
                                                <h4>{{ $profile_percentage }}%</h4>
                                                <p>{{ __('dashboard-artist.complete') }}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </div>

                            </div>
                            @endif


                            <!--/.banner-->
                           

                            <!-- Products__list--Types -->
                            <div class="productslist">
                            @if($profile_percentage < 100)

                                <div class="product__details Product__orange--theme">
                                    <div class="product_images">
                                        <img src="./images/product_images/product_sno1.png" alt="Product_list_no" />
                                        <!-- <span class="product__counts">1</span> -->
                                    </div>
                                    <div class="product_content">
                                        <h2>{{ __('dashboard-artist.Complete your profile') }}</h2>
                                        <ul>
                                            <li>
                                                <i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('dashboard-artist.Fil in your personal information') }}</li>
                                            <li class="product__times--circle"><i class="fa fa-times-circle-o" aria-hidden="true"></i> {{ __('dashboard-artist.Add your payment details to receive money') }}</li>
                                        </ul>
                                    </div>
                                    <div class="product_images--display">
                                        <img src="./images/product_images/product_display1.png" alt="product_list_display" />
                                    </div>
                                    <div class="product_button">
                                        <a class="product__click--btn" href="{{ url('edit-profile') }}">{{ __('dashboard-artist.Complete profile') }}</a>
                                    </div>
                                </div>
                                @endif

                                <div class="product__details Product__blue--theme">
                                    <div class="product_images">
                                        <img src="./images/product_images/product_sno2.png" alt="Product_list_no" />
                                        <!-- <span class="product__counts">2</span> -->
                                    </div>
                                    <div class="product_content">
                                        <h2>{{ __('dashboard-artist.Customise your shop') }}</h2>
                                        <ul>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i>{{ __('dashboard-artist.Upload your Profile Picture') }}</li>
                                            <li class="product__times--circle"><i class="fa fa-times-circle-o" aria-hidden="true"></i> {{ __('dashboard-artist.Upload your Shop Cover Photo') }}</li>
                                        </ul>
                                    </div>
                                    <div class="product_images--display">
                                        <img src="./images/product_images/product_display2.png" alt="product_list_display" />
                                    </div>
                                    <div class="product_button">
                                        <a class="product__click--btn" href="#">{{ __('dashboard-artist.View shop') }}</a>
                                    </div>
                                </div>
                                <div class="product__details Product__pink--theme">
                                    <div class="product_images">
                                        <img src="./images/product_images/product_sno3.png" alt="Product_list_no" />
                                        <!-- <span class="product__counts">3</span> -->
                                    </div>
                                    <div class="product_content">
                                        <h2>{{ __('dashboard-artist.Create your products') }}</h2>
                                        <ul>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i>{{ __('dashboard-artist.Upload your Artwork') }}</li>
                                            <li class="product__times--circle"><i class="fa fa-times-circle-o" aria-hidden="true"></i>{{ __('dashboard-artist.Personalise your unique product range') }}</li>
                                        </ul>
                                    </div>
                                    <div class="product_images--display">
                                        <img src="./images/product_images/product_display3.png" alt="product_list_display" />
                                    </div>
                                    <div class="product_button">
                                        <a class="product__click--btn" href="#">{{ __('dashboard-artist.Creation station') }}</a>
                                    </div>
                                </div>
                            </div>
                            <!-- //END Products__list--Types -->

                            <!--Faq and Marketing-->
                            <div class="f_m">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopad-left">
                                    <div class="fm_wrap">
                                        <div class="fm_sec">
                                            <div class="fm_list ">
                                                <div class="mg_fit ">
                                                    <img src="images/faq.png " class="img-responsive " />
                                                </div>
                                                <h1>{{ __('dashboard-artist.FAQs') }}</h1>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                                <a href="{{route('faq')}}" class="btn_common ">{{ __('dashboard-artist.read faqs') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  nopad-right">
                                    <div class="fm_wrap">
                                        <div class="mg_fit_full">
                                            <img src="images/marketing.png " class="img-responsive " />
                                        </div>
                                        <div class="fm_sec">
                                            <div class="fm_list mariki">

                                                <h1>{{ __('dashboard-artist.Marketing Collateral') }}</h1>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                                <a href="# " class="btn_common ">{{ __('dashboard-artist.Products') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.Faq and Marketing-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/.dashboard artist-->
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jQuery-plugin-progressbar.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jQuery-plugin-progressbar.css') }}">
    <!-- Footer Script End -->
@endsection
