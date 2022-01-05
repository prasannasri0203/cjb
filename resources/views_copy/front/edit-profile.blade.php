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
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

@php
$activeSidebar = 'edit-profile';
@endphp
        <!--Page Content Start-->

    <!--dashboard artist-->
    <section>
        <div class="dashboard-sec slidpad">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12  nopad-left-mob">

                        @include('front.user-sidebar')

                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 edit_mb_space">
                        <!--Edit_profile-->
                        <div class="edit_pf">


                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#Profile">{{ __('edit-profile.Profile Information') }}</a></li>
							<!--@if(Auth::user()->type == 1)<li><a data-toggle="tab" href="#About">{{ __('edit-profile.About me') }}</a></li>@endif -->
                            <li><a data-toggle="tab" href="#About">{{ __('edit-profile.About me') }}</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="Profile" class="tab-pane fade in active">
                                    <form method="post" class="form-validate" action="{{ url('edit-profile/update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="header_cont align-top-cont">
                                        <div class="custom_container">
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Profile Name') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group t_tip @error('name') has-error @enderror">
                                                    <input type="text" name="name" class="form-control" id="" value="{{Auth::user()->name}}">
                                                    <i class="fa fa-info-circle info1" aria-hidden="true"></i>
                                                    <div class="tooltip_content tp1 ">
                                                        <p>Lorem Ipsum how many characters etc.</p>
                                                    </div>
                                                    @error('name')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.First Name') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('first_name') has-error @enderror">
                                                    <input type="text" name="first_name" class="form-control" id="" value="{{Auth::user()->first_name}}">
                                                    @error('first_name')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Last Name') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('last_name') has-error @enderror">
                                                    <input type="text" name="last_name" class="form-control" id="" value="{{Auth::user()->last_name}}">
                                                    @error('last_name')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Email') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('email') has-error @enderror">
                                                    <input type="text" name="email" class="form-control" id="" value="{{Auth::user()->email}}">
                                                    @error('email')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Date of birth') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group t_tip @error('date_of_birth') has-error @enderror" id="date">
                                                    <input type="text" name="date_of_birth" class="form-control" value="{{Auth::user()->dob}}">
                                                    <i class="fa fa-info-circle info2" aria-hidden="true"></i>
                                                    <div class="tooltip_content tp2">
                                                        <p>Lorem Ipsum how many characters etc.</p>
                                                    </div>
                                                    @error('date_of_birth')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Telephone') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('telephone') has-error @enderror">
                                                    <input type="text" name="telephone" class="form-control" id="" value="{{Auth::user()->contact_number}}">
                                                    @error('telephone')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Address') }} 1:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('address_1') has-error @enderror">
                                                    <input type="text" name="address_1" class="form-control" id="" value="{{Auth::user()->address_1}}">
                                                    @error('address_1')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Address') }} 2:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('address_2') has-error @enderror">
                                                    <input type="text" name="address_2" class="form-control" id="" value="{{Auth::user()->address_2}}">
                                                    @error('address_2')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Town') }}/{{ __('edit-profile.City') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('city') has-error @enderror">
                                                    <input type="text" name="city" class="form-control" id="" value="{{Auth::user()->city}}">
                                                    @error('city')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Postcode') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('postcode') has-error @enderror">
                                                    <input type="text" name="postcode" class="form-control" id="" value="{{Auth::user()->post_code}}">
                                                    @error('postcode')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if(Auth::user()->type == 1)
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Facebook') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('facebook') has-error @enderror">
                                                    <input type="text" name="facebook" class="form-control" id="" value="{{Auth::user()->facebook_link}}">
                                                    @error('facebook')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Twitter') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('twitter') has-error @enderror">
                                                    <input type="text" name="twitter" class="form-control" id="" value="{{Auth::user()->twitter_link}}">
                                                    @error('twitter')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Instagram') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('instagram') has-error @enderror">
                                                    <input type="text" name="instagram" class="form-control" id="" value="{{Auth::user()->instagram_link}}">
                                                    @error('instagram')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>{{ __('edit-profile.Pinterest') }}:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group @error('pinterest') has-error @enderror">
                                                    <input type="text" name="pinterest" class="form-control" id="" value="{{Auth::user()->pinterest_link}}">
                                                    @error('pinterest')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            @endif
                                            @if(Auth::user()->type == 1)
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>Profile Image:</label>
                                            </div>  
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">

                                                <div class="form-group">
                                                    <input type="file" name="artist_image" class="form-control" id="" value="">
                                                </div>
                                                @if(Auth::user()->profile_image)
                                                <img src="{{asset('/profile/').'/'.Auth::user()->profile_image}}" id="image_upload" width="100px;" height="100px;">
                                                @endif
                                            </div>                                                                                      
                                            @endif
                                            <!-- <div class="col-lg-2 col-md-3 col-sm-12 form-hide-part no-padding">
                                                <label>&nbsp;</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding check_box_ct form-end-part">

                                                <div class="form-group t_tip">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" value=""><p>I’m happy to receive important account related emails from Cool Jelly Bean</p></label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" value=""><p>I’m happy to receive marketing emails from Cool Jelly Bean</p></label>
                                                    </div>

                                                </div>
                                            </div> -->
                                            <div class="col-lg-3 col-md-3 col-sm-12 form-hide-part no-padding">
                                                <label>&nbsp;</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding check_box_ct form-end-part">
                                                <div class="btn_group_cards">
                                                    <div class="btn_cards">
                                                        <button type="submit" id="login">{{ __('edit-profile.Save Profile') }}</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    </form>
                                    <form method="post" class="form-validate" action="{{ url('edit-profile/changepassword') }}">
                                    @csrf
                                    <h5 class="header_prof">Change Password</h5>

                                    <div class="header_cont password-sec">
                                        <div class="custom_container">
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>New Password:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div id="show_hide_password" class="form-group frm_relate t_tip">
                                                <div class="form-group @error('password') has-error @enderror">
                                                    <input id="password-field-1" type="password" class="form-control" name="password" value=""><span toggle="#password-field" class="fa fa-fw field-icon toggle-password fa-eye-slash" aria-hidden="true"></span>
                                                    @error('password')
                                                        <span class="help-block">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                    <div class="input-group-addon">
<!--                                                         <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a> -->
                                                    </div>
                                                    <!-- <span toggle="#password-field-1" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                                    <!-- <i class="fa fa-info-circle info4" aria-hidden="true"></i> -->
                                                    <div class="tooltip_content tp4 ">
                                                        <p>Lorem Ipsum how many characters etc.</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">

                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 form-hide-part no-padding">
                                                <label>&nbsp;</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding check_box_ct form-end-part">
                                                <div class="btn_group_cards">
                                                    <div class="btn_cards">
                                                        <button type="submit" style="margin-left: 200px;">{{ __('Save Password') }}</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    </form>
                                    <!-- <h5 class="header_prof">Payment Information</h5>

                                    <div class="header_cont">
                                        <div class="custom_container">
                                            <div class="col-lg-2 col-md-3 col-sm-12 no-padding">

                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <h6 class="sub_txt">
                                                        We only use this information to send you money from your orders
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>Bank Name:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group t_tip">
                                                    <input type="text" class="form-control" id="" value="HSBC">
                                                    <i class="fa fa-info-circle info5" aria-hidden="true"></i>
                                                    <div class="tooltip_content tp5 ">
                                                        <p>Lorem Ipsum how many characters etc.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>Sort Code:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="" value="68-79-80">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding label_tt">
                                                <label>Account no.:</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="" value="76553789">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-3 col-sm-12 no-padding">

                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <h6 class="sub_txt">
                                                        Or you can <a href="#">link a PayPal account </a> to receive payments via PayPal
                                                    </h6>
                                                </div>
                                            </div>


                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">

                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding check_box_ct">
                                                <div class="advertise_btn nth-position"><a href="#">Save Details</a></div>
                                            </div>

                                        </div>
                                    </div> -->
                                </div>
                                <div id="About" class="tab-pane fade">
                                     <form method="post" class="form-validate" action="{{ url('edit-profile/about-me') }}">
                                    @csrf
                                    <div class="custom_container">

                                            <div class="col-lg-3 col-md-3 col-sm-12 label_tt">
                                                <label>{{ __('edit-profile.About Me') }}</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12">

                                                <div class="form-group">
                                                    <textarea class="form-control" rows="10" name="about_me" id="editor">{{Auth::user()->about_me}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 label_tt">
                                                <label>{{ __('edit-profile.About Stats') }}</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12">

                                                <div class="form-group">
                                                    <textarea class="form-control" rows="10" name="about_stats" id="editor2">{{Auth::user()->about_stats}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 label_tt">
                                                <label>{{ __('edit-profile.About Descriptions') }}</label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12">

                                                <div class="form-group">
                                                    <textarea class="form-control" rows="10" name="about_desc" id="editor3">{{Auth::user()->about_desc}}</textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">

                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding check_box_ct">
                                                <div class="advertise_btn nth-position">

                                                    <div class="btn_group_cards">
                                                        <div class="btn_cards">
                                                            <button type="submit" id="login">{{ __('edit-profile.Update') }}</button>
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
    
<script>	
$(document).ready(function() {
     $(".toggle-password").click(function(){
                    var input = $("#password-field-1");
                    if($('#password-field-1').attr('type') != 'password')
                    {
                        $(".toggle-password").removeClass('fa-eye')
                        $(".toggle-password").addClass('fa-eye-slash')

                    }
                    if($('#password-field-1').attr('type') == 'password')
                    {
                        $(".toggle-password").addClass('fa-eye')
                        $(".toggle-password").removeClass('fa-eye-slash')                    
                    }


                        input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

                });
});
</script>
    <script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor3' ) )
            .catch( error => {
                console.error( error );
            } );
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $('#date input').datepicker({
            format: 'yyyy-mm-dd',
            endDate: '0d',
            autoclose: true
        });
        
        $(":file").on("change", function(e) {

        var file = this.files[0];
        var fileType = file["type"];
        var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
        if ($.inArray(fileType, validImageTypes) < 0) {
            $(":file").val('');
            alert("Please upload correct image format");
        }       
        })

    </script>
    <!-- Footer Script End -->
@endsection