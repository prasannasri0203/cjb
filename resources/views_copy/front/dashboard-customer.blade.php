
@extends('front.app')

@section('title', '')

@section('header_script')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.min.css">
    <link rel="stylesheet" href="css/owl.default.css">
    <script src="js/owl.js"></script>
    <script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/slick.js"></script>
    <script src="js/custom.js"></script>
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
        #img_demo {
            margin-top: 0px;
            margin-bottom: 30px;
        }
        
        .dashicaro {
            display: none;
        }
        
        @media only screen and (max-width: 767px) {
            .dashicaro {
                display: block;
            }
            .dashboard-sec .banner .caption .advertise_btn {
                margin-top: 0px;
                width: 155px!important;
            }
            body .advertise_btn {
                top: 82% !important;
            }
            .dashicaro {
                margin-top: -25px;
            }
        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', '')

@section('content')

@php
$activeSidebar = 'dashboard';
@endphp
              

        <!--Page Content Start-->

    <!--dashboard artist-->
    <section>
        <div class="dashboard-sec dash_art_mob dash_custom slidpad">
            <div class="container dashbo">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 ">

                        @include('front.user-sidebar')

                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 nopadding">
                        <!--banner-->


                        <div class="banner dasban artist_vbann bann_btm">
                            <div class="item">
                                <img src="images/ban1.png" title="slidepicture" alt="slidepicture" class="deskbani">
                                <!-- <img src="images/mobdash.png" title="slidepicture" alt="slidepicture" class="mobbani"> -->
                                <div class="caption" style="width: 100% !important;">
                                <div style="width:60%;">
                                    <h2>{{ __('dashboard-customer.Welcome back') }}!</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="advertise_btn">
                                        <a href="#">{{ __('dashboard-customer.View Orders') }}</a>
                                    </div>
                                    </div>
                                    <?php print_r($profile_percentage);exit; ?>
                                    @if($profile_percentage < 100)
                                  <div id="circle_bar_jelly" class="header_completion">
                                         <div class="progress-bar position" data-percent="{{ $profile_percentage }}" data-color="#17b4e8,#ed1277">
                                            <div id="bar_content">
                                                <p>SHOP</p>
                                                 <h4>{{ $profile_percentage }}%</h4>
                                                  <p>complete</p>                                            
                                              </div>
                                           </div>
                                    </div>
                                       @endif

                                </div>
                            </div>

                        </div>

                        <!--/.banner-->
                        <!--advertise_sec-->

                        <div class="advertise_sec advertise_over customer_adv">
                            <!--sales_stas-->
                            <div class="title_product">

                                <div class="col-sm-12 ">
                                    <h2 class="ro">{{ __('dashboard-customer.Recent Orders') }}</h2>

                                </div>

                            </div>
                            <div class="sales_stats orders_tab recent_tabs">

                                <div class="table-responsive">

                                    <table class="table" cellpadding="0" cellspacing="0" border="0">
                                        <thead>
                                            <tr>

                                                <th>{{ __('dashboard-customer.Order no') }}.</th>
                                                <th>{{ __('dashboard-customer.Date Ordered') }}</th>
                                                <th>{{ __('dashboard-customer.TOTAL') }}</th>
                                                <th>{{ __('dashboard-customer.Shipping Date') }}</th>
                                                <th>{{ __('dashboard-customer.Status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>345678</td>
                                                <td>31/05/2019</td>
                                                <td>£27.74</td>
                                                <td>TBC</td>
                                                <td>Processing</td>
                                                <td class="view_det"><a href="#">{{ __('dashboard-customer.View Details') }} <img src="images/view_btn.png"/></a></td>
                                            </tr>

                                            </tr>
                                            <tr>
                                                <td>345678</td>
                                                <td>31/05/2019</td>
                                                <td>£27.74</td>
                                                <td>21/05/2019</td>
                                                <td>Shipped</td>
                                                <td class="view_det"><a href="#">{{ __('dashboard-customer.View Details') }} <img src="images/view_btn.png"/></a></td>
                                            </tr>
                                            <tr>
                                                <td>345678</td>
                                                <td>31/05/2019</td>
                                                <td>£27.74</td>
                                                <td>30/04/2019</td>
                                                <td>Completed</td>
                                                <td class="view_det"><a href="#">View Details <img src="images/view_btn.png"/></a></td>
                                            </tr>
                                            <tr>
                                                <td>345678</td>
                                                <td>31/05/2019</td>
                                                <td>£27.74</td>
                                                <td>30/04/2019</td>
                                                <td>Completed</td>
                                                <td class="view_det"><a href="#">View Details <img src="images/view_btn.png"/></a></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!--sales_stas-->

                            <!--Best_seller-->
                            <div class="best_seller dc_bs">

                                <div class="title_product">

                                    <div class="col-sm-12">
                                        <h3>{{ __('dashboard-customer.Recent Wishlist items') }}...<span>{{ __('dashboard-customer.See all') }} <img src="images/view_btn.png"/></span></h3>
                                    </div>

                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12 col-lg-4 tshirt_sec">
                                    <div class="tshirt_cart add_bsk_btn">
                                        <img src="images/best_seller_1.png" class="img-responsive uploadimg" />
                                        <a href="#" class="wishlisticon"><span ><i class="fa fa-heart-o heartin"></i></a>
                                        <div class="price_cart">
                                            <div class="row">
                                                <div class="col-xs-7">
                                                    <p>{{ __('dashboard-customer.Product Title') }} Lore...</p>
                                                    <h4>£16.50</h4>
                                                </div>
                                                <div class="col-xs-5 align-rt">
                                                    <a href="#" class="add_bsk"><i class="fas fa-shopping-basket img-responsive" style="color:#fff;padding-right:5px;font-size:20px;" aria-hidden="true"></i> Add <span>&nbsp;to Basket</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12 col-lg-4  tshirt_sec cs-dev">
                                    <div class="tshirt_cart add_bsk_btn">
                                        <img src="images/best_seller_2.png" class="img-responsive uploadimg" />
                                        <a href="#" class="wishlisticon"><span ><i class="fa fa-heart-o heartin"></i></a>
                                        <div class="price_cart">
                                            <div class="row">
                                                <div class="col-xs-7">
                                                    <p>Product Title Lore...</p>
                                                    <h4>£16.50</h4>
                                                </div>
                                                <div class="col-xs-5 align-rt">
                                                    <a href="#" class="add_bsk"><i class="fas fa-shopping-basket img-responsive" style="color:#fff;padding-right:5px;font-size:20px;" aria-hidden="true"></i> Add <span>&nbsp;to Basket</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12 col-lg-4  tshirt_sec">
                                    <div class="tshirt_cart add_bsk_btn">
                                        <img src="images/best_seller_3.png" class="img-responsive uploadimg" />
                                        <a href="#" class="wishlisticon"><span ><i class="fa fa-heart-o heartin"></i></a>
                                        <div class="price_cart">
                                            <div class="row">
                                                <div class="col-xs-7">
                                                    <p>Product Title Lore...</p>
                                                    <h4>£16.50</h4>
                                                </div>
                                                <div class="col-xs-5 align-rt">
                                                    <a href="#" class="add_bsk"><i class="fas fa-shopping-basket img-responsive" style="color:#fff;padding-right:5px;font-size:20px;" aria-hidden="true"></i> Add <span>&nbsp;to Basket</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/.Best_seller-->




                        </div>
                        <!--/.advertise_sec-->

                        <!--Faq and Marketing-->
                        <div class="f_m ">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopad-left">
                                <div class="fm_wrap">
                                    <div class="fm_sec">
                                        <div class="fm_list ">
                                            <div class="mg_fit ">
                                                <img src="images/faq.png " class="img-responsive " />
                                            </div>
                                            <h1>Cool Jelly Bean Community</h1>
                                            <div class="update_adv">
                                                <div class="col-lg-6 col-sm-6  col-xs-6">
                                                    <a href="# ">{{ __('dashboard-customer.Updates') }}
                                                <br/> {{ __('dashboard-customer.Coming soon') }}</a>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                                    <a href="# ">{{ __('dashboard-customer.News') }}
                                                <br/> {{ __('dashboard-customer.Give us your ideas') }}</a>
                                                </div>
                                            </div>
                                            <a href="{{route('faq')}}" class="btn_common ">{{ __('dashboard-customer.read faqs') }}</a>
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

                                            <h1>{{ __('dashboard-customer.Special Offer') }}</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                            <a href="# " class="btn_common ">Lorem Ipsum</a>
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
  <!-- Footer Script Start -->
    <script src="{{ asset('js/jQuery-plugin-progressbar.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jQuery-plugin-progressbar.css') }}">
    <!-- Footer Script End -->
    <!-- image carousel -->
    <!-- owl carousel-->
    <!--<script src="js/owl.carousel.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js "></script>
    <script>
        $(document).ready(function() {
            var owl = $(".owl-carousel "),

                inputType = $("input[type=range] ");
            owl.owlCarousel({
                //  'loop': true,
                'mouseDrag': true,
                'margin': 10,
                'autoplay': true,
                'responsive': {
                    0: {
                        items: 1,
                        slideBy: 1

                    },
                    600: {
                        items: 3,
                        slideBy: 1

                    },
                    1280: {
                        items: 3,
                        slideBy: 1

                    }
                }
            });

            owl.on('changed.owl.carousel', function(event) {
                console.log(event.item.index);
                inputType.val(event.item.index);

            });


            $("input ").on("change ", function(e) {
                e.preventDefault();
                console.log(inputType.val());

                $('.owl-carousel').trigger('to.owl.carousel', [inputType.val(), 1, true]);

            });
        });
    </script>-->
    <!-- Footer Script End -->
@endsection