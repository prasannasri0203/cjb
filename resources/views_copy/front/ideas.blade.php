@extends('front.app')

@section('title', '')

@section('header_script')
    <!-- Header Script Start -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!--5d slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-responsiveGallery.css') }}">
    <!--5d slider css-->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script>

    <link rel="stylesheet" href="{{ asset('css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.default.css') }}">
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!--5d slider js-->
    <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.responsiveGallery.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.responsiveGallery-wrapper').responsiveGallery({
                animatDuration: 400,
                $btn_prev: $('.responsiveGallery-btn_prev'),
                $btn_next: $('.responsiveGallery-btn_next')
            });
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
        /*search tab*/
    </script>
    <!--5d slider js-->
    <style type="text/css">
        .banner .item .caption.hlp_caption {
            width: 650px!important;
        }
        
        .banner .item .caption.hlp_caption p {
            font-family: 'rubik-bold';
            line-height: 50px;
        }
        
        .banner .item .caption.hlp_caption {
            align-self: center;
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: center;
            top: 0;
            width: 500px;
        }
        
        @media only screen and (max-width: 767px) {
            .banner .item .caption.hlp_caption {
                width: 80%!important;
                justify-content: end;
                top: 55px;
            }
            body .banner .item .caption p {
                font-size: 30px !important;
                line-height: 40px !important;
                margin-top: -25px;
            }
            .cash_steps.help_guides {
                border-top: none!important;
            }
        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')

        <!--Page Content Start-->
        <!--banner carousel -->
        <div class="banner wishbanner">
        <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
            <div id="headcarouselid" class="carousel slide" data-ride="carousel">
                <!-- indicators -->
                <ul class="carousel-indicators">
                    <li class="" data-target="#headcarouselid" data-slide-to="0"></li>
                    <li class="" data-target="#headcarouselid" data-slide-to="1"></li>
                    <li class="active" data-target="#headcarouselid" data-slide-to="2"></li>
                    <li class="" data-target="#headcarouselid" data-slide-to="3"></li>
                </ul>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item">
                        <img src="{{ asset('images/banner_ideas_header.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="{{ asset('images/banner_ideas_header.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>{{ __('ideas.IDEAS') }} - Fusce malesuada imperdiet lacus id vestibulum. </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/banner_ideas_header.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="{{ asset('images/banner_ideas_header.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>{{ __('ideas.IDEAS') }} - Fusce malesuada imperdiet lacus id vestibulum. </p>
                            </div>
                        </div>
                    </div>
                    <div class="item active">
                        <img src="{{ asset('images/banner_ideas_header.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="{{ asset('images/banner_ideas_header.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>{{ __('ideas.IDEAS') }} - Fusce malesuada imperdiet lacus id vestibulum. </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/banner_ideas_header.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="{{ asset('images/banner_ideas_header.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>{{ __('ideas.IDEAS') }} - Fusce malesuada imperdiet lacus id vestibulum. </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
        <!--banner carousel -->

       

        <!--video carousel -->
        <!---bean_basket--->
    <section id="ideas_basket" class="container_default_custom container container">
    @if($ideas)
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding ideas_section">
            <div class="col-lg-6 col-md-6 col-sm-12 no-padding">
                <div class="idead_header_img">
                @foreach(json_decode($ideas->images) as $key => $image)
                            @if($image)
                            <img src="{{asset('uploads/'.$image)}}"/>
                            @else
                            <img src="{{asset('uploads/faq.png')}}"/>
                            @endif
                            @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12  ">
                <div class="ideas_text">
                    <h4>{{$ideas->name}}</h4>
                    @php
                    $taglessBody = strip_tags($ideas->content);
                    @endphp
                    <p>{{ \Illuminate\Support\Str::limit($taglessBody, 100, $end='...')}}</p>
                    <div class="btn_cards"><a href="{{ URL::to('detailpage/')}}/{{$ideas->id }}">READ MORE</a></div>
                </div>
            </div>
        </div>
        @endif
         @if($data)
        <div class="col-lg-12 col-md-12 col-sm-12 no-padding ideas_section_gallery">
        @foreach($data as $value)
            <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
                <div class="sub_image_gallery">
                    <div class="gallery_img">
                         <?php 
                            ?>
                            @foreach(json_decode($value->images) as $key => $image)
                            <img src="{{asset('uploads/'.$image)}}"/>
                            @endforeach
                    </div>
                    <h4>{{$value->name}}</h4>
                    @php
                    $taglessBody = strip_tags($value->content);
                    @endphp
                            <p>{{\Illuminate\Support\Str::limit($taglessBody, 100, $end='...')}}</p>
                            <p>{!!substr($ideas->content,0,100)!!}</p>
                    <div class="btn_cards"><a href="{{ URL::to('detailpage/')}}/{{$value->id }}">READ MORE</a></div>
                </div>
               
            </div>
            @endforeach
        </div>
        
        <div class="col-md-12 col-sm-12 pager">
            <!-- <ul class="pagination pagination">
                <li><a href="#" class="active">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>

                <li><a href="#" class="nexts">Next</a></li>
            </ul> -->
            
            {{ $data->links() }}
        </div>
        @endif
    </section>
        <!--video carousel -->
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.rollingslider.js') }}"></script>
    <script src="{{ asset('js/Carousel.js') }}"></script>

    <!--bannaer carousel-->

    <!--bannaer carousel-->

    <!-- video carousel -->
    <script>
        $('#demo').RollingSlider({
            showArea: "#example",
            prev: "#jprev",
            next: "#jnext",
            moveSpeed: 300,
            autoPlay: true
        });
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <!-- video carousel -->

    <!-- Login -->
    <script>
        $(".logModal").click(function() {
            $("#myModal").show();
        });



        $(".fa-info-circle").mouseover(function() {
            $(".tooltip_content").show();
        });

        $(".fa-info-circle").mouseout(function() {
            $(".tooltip_content").hide();
        });

        $(".close").click(function() {
            $("#myModal").hide();
        });
    </script>
    <!-- Login -->
    <!-- register -->
    <script>
        $(".regModel").click(function() {
            $("#regModal").show();
        });

        $(".info1").mouseover(function() {
            $(".tp1").show();
        });

        $(".info1").mouseout(function() {
            $(".tp1").hide();
        });


        $(".info2").mouseover(function() {
            $(".tp2").show();
        });

        $(".info2").mouseout(function() {
            $(".tp2").hide();
        });

        $(".close").click(function() {
            $("#regModal").hide();
        });


        $(".navbar-toggle").click(function() {
            $("#myNavbar").slideToggle();
        });

        $(document).ready(function() {
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });

        });
    </script>
    <!-- register -->

    <!-- thanks -->
    <script>
        $(".thankModel").click(function() {
            $("#thankModel").show();
        });

        $(".close").click(function() {
            $("#thankModel").hide();
        });
    </script>
    <!-- thanks -->
    <!-- Footer Script End -->
@endsection