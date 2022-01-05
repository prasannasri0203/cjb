@extends('front.app')

@section('title', 'Video Gallery')

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
        $(document).ready(function() {
            // $(".toggle-password").click(function() {

            //     $(this).toggleClass("fa-eye fa-eye-slash");
            //     var input = $($(this).attr("toggle"));
            //     if (input.attr("type") == "password") {
            //         input.attr("type", "text");
            //     } else {
            //         input.attr("type", "password");
            //     }
            // });
            // $(".fa-info-circle").mouseover(function() {
            //     $(".tooltip_content").show();
            // });

            // $(".fa-info-circle").mouseout(function() {
            //     $(".tooltip_content").hide();
            // });

        });
    </script>
    <script>
        /*search tab*/
        $(document).ready(function() {
            $('.desktop_group').click(function() {
                // $(".desktop_search_tab").slideToggle();
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
    <style type="text/css">
        .form-group.t_tip i {
            right: -20px;
        }
        
        body .form-group .tooltip_content {
            right: -5% !important;
            left: unset;
            top: -140%;
            z-index: 9999;
        }
        
        <!-- .custom_container .form-group {
            display: inline-block;
            width: 84%;
        }
        
        .edit_pf ul.nav.nav-tabs li a {
            font-size: 28px;
        }
        
        .edit_pf .nav>li>a {
            padding: 10px 34px 10px 32px;
        }
        
        .custom_container {
            width: 78%;
        }
        
        .custom_container .form-group input {
            font-size: 16px;
        }
        
        .check_box_ct .checkbox p {
            font-size: 14px !important;
            color: #666666;
        }
        
        .advertise_btn a {
            font-family: "Rubik-light";
            font-size: 15px;
        }
        
        .edit_pf h5.header_prof {
            margin-top: 20px;
            /* margin-: 20px; */
            float: left;
            font-size: 28px;
        }
        
        h6.sub_txt {
            font-size: 16px;
        }
        
        .custom_container .form-group input {
            width: 100%;
        }
        
        .check_box_ct .checkbox label {
            width: auto;
        }
        
        .custom_container .form-end-part input {
            width: auto;
        }
        
        .form-end-part .checkbox {
            margin-bottom: 5px;
        }
        
        .custom_container label {
            text-align: right;
            width: 100%;
        }
        
        .edit_pf h5.header_prof {
            padding-left: 30px;
        }
        
        @media only screen and (max-width:768px) {
            .edit_pf .nav>li>a {
                padding: 10px 1% 10px 6%;
            }
            .edit_pf li:first-child {
                width: 60%;
            }
            .edit_pf li:last-child {
                width: 39%;
            }
            .edit_pf ul.nav.nav-tabs li a {
                font-size: 22px;
            }
            .custom_container label {
                text-align: left;
            }
            .form-group.t_tip i {
                right: -20px;
                top: 7px;
            }
            .custom_container {
                width: 100%;
            }
            .custom_container .col-lg-3 {
                padding-left: 0!important;
            }
            .advertise_btn {
                top: 0 !important;
                width: 100%!important;
                position: relative !important;
                left: 0px;
                display: inline-block;
                margin-top: 30px!important;
            }
            .form-hide-part {
                display: none;
            }
            .custom_container {
                margin: 0px auto;
                max-width: 90%;
            }
            .custom_container .form-group {
                width: 98%;
            }
            .edit_pf {
                margin-top: 10px;
            }
            .edit_pf ul.nav.nav-tabs li a {
                text-align: center;
            }
        }

        section#checkout_completed_log .log-out .btn_cards button {
            font-family: "Rubik-Light";
        }
        .d-f.guestform .check_box_ct .btn_cards button {
            padding: 12px 22px !important;
        }
        .btn_cards button:hover {
            background: 
        #00aff0 !important;
        -webkit-transition: 1s ease-in;
        -o-transition: 1s ease-in;
        transition: 1s ease-in;
        -webkit-transition: 1s ease-out;
        -o-transition: 1s ease-out;
        transition: 1s ease-out;
        color:
            #fff;
        }
        .btn_cards button {
            background: #ed1277 none repeat scroll 0 0;
            border-radius: 50px;
            color: #fff;
            float: none;
            font-family: "Rubik-Bold";
            font-size: 16px;
            margin: 0 auto;
            padding: 10px 26px;
            text-decoration: none;
            text-transform: uppercase;
            cursor: pointer;
        }
        .form-group.frm_relate span {
            color: #a94442 !important;
        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

@php
$activeSidebar = 'video-gallery';
@endphp

        <!--Page Content Start-->

    <!--dashboard artist-->
    <section class="sec-overback">
        <div class="dashboard-sec slidpad">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12  nopad-left-mob">
                    @include('front.user-sidebar')
                        <!-- <ul class="left_menu regular slider">
                            <li><a href="#"><i class="fa fa-home"></i> <span> {{ __('media-gallery.Home') }}</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span> {{ __('media-gallery.Orders') }}</span></a></li>
                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i><span> {{ __('media-gallery.View Shop') }}</span></a></li>
                            <li><a href="#"><i class="fa fa-paint-roller" aria-hidden="true"></i><span> {{ __('media-gallery.Creation Station') }}</span></a></li>
                            <li><a href="{{ url('edit-profile') }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                <span> {{ __('media-gallery.Edit Profile') }}</span></a></li>
                            <li class="active"><a href="{{ url('media-gallery') }}"><i class="fas fa-images" aria-hidden="true"></i>
                                <span> {{ __('media-gallery.Video Gallery') }}</span></a></li>

                        </ul> -->

                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 edit_mb_space">
                        <!--Edit_profile-->
                        <div class="edit_pf">


                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#Profile">{{ __('media-gallery.Video Gallery') }}</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="Profile" class="tab-pane fade in active">
                                    <!-- @if ($errors->any())

                                      <ul class="alert alert-danger">

                                        @foreach($errors->all() as $error)

                                          <li>{{ $error }}</li>

                                        @endforeach

                                      </ul>

                                    @endif -->
                                    <form method="post" class="form-validate" action="{{ url('media-gallery/add') }}">
                                    @csrf
                                    <div class="header_cont align-top-cont">
                                        <div class="custom_container">
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('media-gallery.Title') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group">
                                                    <input type="text" name="title" class="form-control" id="" value="{{Auth::user()->title}}" max="32">
                                                </div>
                                                @error('title')
                                                    <span class="alert-danger" role="alert" style="display: block;width: 84%;margin-bottom: 25px;padding: 5px;">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <!-- <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>Description:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group">
                                                    <input type="text" name="description" class="form-control" id="" value="{{Auth::user()->description}}" max="255">
                                                </div>
                                            </div> -->

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('media-gallery.Youtube Link') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group">
                                                    <input type="text" name="link" class="form-control" id="" value="{{Auth::user()->link}}">
                                                </div>
                                                @error('link')
                                                    <span class="alert-danger" role="alert" style="display: block;width: 84%;margin-bottom: 25px;padding: 5px;">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 form-hide-part no-padding">
                                                <label>&nbsp;</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding check_box_ct form-end-part">
                                                <div class="btn_group_cards">
                                                    <div class="btn_cards">
                                                        <button type="submit" id="login">{{ __('media-gallery.Add Gallery') }}</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    </form>



                                    <!--Merchandise Block -->
                                    <div id="mymerchand" class="merchandise-blk m_tlt">

                                        <div class="container tshirt_sec merch-prod">
                                            <div class="row">
                                                @foreach($data as $list)
                                                <?php

                                                $link = $list->link;
                                                $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
                                                if (!isset($video_id[1]))
                                                    $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..
                                                if(isset($video_id[1]))
                                                $video_id = explode("&", $video_id[1]); // Deleting any other params
                                                $video_id = $video_id[0];

                                                $linkURL = url('media-gallery').'/'.$list->id.'/destory';

                                                ?>
                                                <div class="col-md-4 col-sm-6">
                                                    <div class="tshirt_cart" style="border: none;">
                                                        <a class="mediaGalleryRemove" href="{{$linkURL}}" style="position: absolute;right: 0;" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times" aria-hidden="true" style="font-size: 32px;color: red;"></i></a>
                                                        <img src="https://img.youtube.com/vi/{{$video_id}}/hqdefault.jpg" class="img-responsive uploadimg">

                                                        <!-- <div class="price_cart">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p>T-shirts</p>

                                                                </div>

                                                            </div>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>

                                    </div>
                                    <!--Merchandise Block -->



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(".info1 ").mouseover(function() {
            $(".tp1 ").show();
        });

        $(".info1 ").mouseout(function() {
            $(".tp1 ").hide();
        });

        $(".info2 ").mouseover(function() {
            $(".tp2 ").show();
        });

        $(".info2 ").mouseout(function() {
            $(".tp2 ").hide();
        });

        $(".info3 ").mouseover(function() {
            $(".tp3 ").show();
        });

        $(".info3 ").mouseout(function() {
            $(".tp3 ").hide();
        });

        $(".info4 ").mouseover(function() {
            $(".tp4 ").show();
        });

        $(".info4 ").mouseout(function() {
            $(".tp4 ").hide();
        });

        $(".info5 ").mouseover(function() {
            $(".tp5 ").show();
        });

        $(".info5 ").mouseout(function() {
            $(".tp5 ").hide();
        });
    </script>
    @if ($message = Session::get('success'))
    <script type="text/javascript">
         iziToast.success({
             title: 'OK',
             message: '{{ $message }}',
             position: 'topRight',
         });
         
    </script>
    @endif
    @if ($message = Session::get('failure'))
    <script type="text/javascript">
        iziToast.error({
            title: 'Error',
            message: '{{ $message }}',
             position: 'topRight',
        });
    </script>
    @endif
    <!-- Footer Script End -->
@endsection