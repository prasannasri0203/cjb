@extends('front.app')

@section('title', 'Customize Theme')

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
        .ck-editor__editable {
            min-height: 180px;
        }
        input[type="date"].form-control {
            line-height: 20px;
        }
    </style>
    <style>
        @media screen and (max-width:767px)
        {
            .edit_pf ul.nav.nav-tabs li {
                width: 180px;
            }
            .sp-replacer.sp-light,.custom_container .form-group input {
                border-radius: .25rem !important;
                border: 1px solid #ced4da !important;
                width: 100% !important;
                height: 38px;
                padding-left: 10px;
            }
            .form-group .sp-preview {
                width: 94% !important;
                height: 26px;
            }
            .sp-replacer.sp-light {
    height: unset;
}
            .form-group .font-select {
    width: 100%;
}
        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

@php
$activeSidebar = 'customise-theme';
@endphp
        <!--Page Content Start-->

    <!--dashboard artist-->
    <section class="sec-overback">
        <div class="dashboard-sec slidpad">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">

                        @include('front.user-sidebar')

                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 edit_mb_space">
                        <!--Edit_profile-->
                        <div class="edit_pf">


                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#Profile">{{ __('customise-theme.Customise Theme') }}</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="Profile" class="tab-pane fade in active">
                                    <form method="post" class="form-validate" action="{{ url('theme/update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="header_cont align-top-cont">
                                        <div class="custom_container">
                                            <div class="col-lg-4 col-md-4 col-sm-12 no-padding">
                                                <label>{{ __('customise-theme.Banner Image') }} (Recommended resolution is 1920x591):</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 no-padding">
                                                <div class="form-group @error('banner_image') has-error @enderror">
                                                    <input type="file" name="banner_image" class="form-control">
                                                    @error('banner_image')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 no-padding"></div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 no-padding">
                                                <img src="{{$data->banner_image}}" class="img-responsive" style="width: 240px;">
                                            </div>
                                            <div class="col-md-12 form-hide-part no-padding">
                                                <label>&nbsp;</label>
                                            </div>
                                            <!-- 
                                            <div class="col-lg-4 col-md-4 col-sm-12 no-padding">
                                                <label>{{ __('customise-theme.Details Layer Colour') }}:</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 no-padding">
                                                <div class="form-group @error('details_layer_colour') has-error @enderror">
                                                    <input id='details_layer_colour' type="text" name="details_layer_colour" class="form-control" value="{{$data->content_layer_colour}}" />
                                                    @error('details_layer_colour')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        -->

                                           <!--  <div class="col-lg-4 col-md-4 col-sm-12 no-padding">
                                                <label>{{ __('customise-theme.Font Family') }}</label>
                                            </div> -->
                                            <!-- <div class="col-lg-8 col-md-8 col-sm-12 no-padding">
                                                <div class="form-group @error('font_family') has-error @enderror">
                                                    <input type="text" name="font_family" class="" id="font_family" value="{{$data->font_family}}">
                                                    @error('font_family')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> -->

                                            <!-- <div class="col-lg-4 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('customise-theme.Font Size') }}</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 no-padding">
                                                <div class="form-group @error('font_size') has-error @enderror">
                                                    <input min="14" step="1" max="26" type="number" name="font_size" value="{{$data->font_size}}" class="form-control">
                                                    @error('font_size')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> -->

                                            <div class="col-lg-4 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('customise-theme.Theme') }}</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 no-padding">
                                                <div class="form-group @error('theme_name') has-error @enderror">
                                                    <select name="theme_name" class="form-control">
                                                        @foreach($themes as $theme)
                                                            @if (isset($data->theme_id))
                                                            <option {{ $data->theme_id == $theme->id ? 'selected' : '' }}  value="{{ $theme->id }}"> {{ $theme->theme_name }} </option>
                                                            @else
                                                            <option value="{{ $theme->id }}"> {{ $theme->theme_name }} </option>
                                                            @endif
                                                        @endforeach                                                        
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <!--
                                            <div class="col-lg-4 col-md-4 col-sm-12 no-padding">
                                                <label>{{ __('customise-theme.Font Colour') }}:</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 no-padding">
                                                <div class="form-group @error('font_colour') has-error @enderror">
                                                    <input id='font_colour' type="text" name="font_colour" class="form-control" value="{{$data->font_colour}}" />
                                                    @error('font_colour')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-12 no-padding">
                                                <label>{{ __('customise-theme.Cart Colour') }}:</label>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-12 no-padding">
                                                <div class="form-group @error('cart_colour') has-error @enderror">
                                                    <input id='cart_colour' type="text" name="cart_colour" class="form-control" value="{{$data->cart_colour}}" />
                                                    @error('cart_colour')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        -->

                                            <div class="col-lg-3 col-md-3 col-sm-12 form-hide-part no-padding">
                                                <label>&nbsp;</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding check_box_ct form-end-part">
                                                <div class="btn_group_cards">
                                                    <div class="btn_cards">
                                                        <button type="submit" id="login">{{ __('customise-theme.Save') }}</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    </form>
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
    <script
              src="https://code.jquery.com/jquery-3.5.0.slim.min.js"
              integrity="sha256-MlusDLJIP1GRgLrOflUQtshyP0TwT/RHXsI1wWGnQhs="
              crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fontselect.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <script src="{{ asset('js/jquery.fontselect.min.js') }}"></script>
     
    <script>
    $("#details_layer_colour").spectrum({
        preferredFormat: "name",
        color: "{{$data->content_layer_colour}}"
    });
    $("#font_colour").spectrum({
        preferredFormat: "name",
        color: "{{$data->font_colour}}"
    });
    $("#cart_colour").spectrum({
        preferredFormat: "name",
        color: "{{$data->cart_colour}}"
    });
    $(function(){
        $('#font_family').fontselect();
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