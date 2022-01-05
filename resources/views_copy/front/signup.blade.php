@extends('front.app')

@section('title', '')

@section('header_script')
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
        /*search tab*/
    </script>
    <!-- Header Script Start -->
    <style type="text/css">
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
        .alert-danger {
            width: 95%;
        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

        <!--Page Content Start-->
    <section id="checkout_completed_log" class="container_default_custom completed_log comp_guest_check">
        <div class="log-out">
            <h3>{{ __('signup.New To') }} Cool Jelly Bean?</h3>
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
                <p class="custom_register">{{ __('signup.Register now to start making money') }}!
                        <a href="#">{{ __("signup.It’s FREE") }}!</a></p>
            </div>
            <div class="row d-f guestform">
                <form method="post" class="form-validate" action="{{ route('signup') }}">
                @csrf
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('signup.Profile Name') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('profile_name') has-error @enderror">
                        <input type="text" class="form-control" id="" value="{{old('profile_name')}}" placeholder="" name="profile_name">
                        @error('profile_name')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('signup.First Name') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('first_name') has-error @enderror">
                        <input type="text" class="form-control" id="" value="{{old('first_name')}}" placeholder="" name="first_name">
                        @error('first_name')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('signup.Last Name') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('last_name') has-error @enderror">
                        <input type="text" class="form-control" id="" value="{{old('last_name')}}" placeholder="" name="last_name">
                        @error('last_name')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('signup.Type') }}: {{old('user_type')}}</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('type') has-error @enderror">
                        <select name="user_type" class="form-control" style="width: 95%;">
                            <option value="1" {{ old('user_type') == 1 ? 'selected' : '' }}> {{ __('signup.Artist') }}</option>
                            <option value="2" {{ old('user_type') == 2 ? 'selected' : '' }}>{{ __('signup.Customer') }}</option>
                        </select>
                        @error('type')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('signup.Email') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('email') has-error @enderror">
                        <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email">
                        @error('email')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('signup.Password') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group frm_relate t_tip">
                        <input class="form-control @error('password') has-error @enderror" type="password" id="password-field" name="password" />
                        <span toggle="#password-field" class="fa fa-fw field-icon toggle-password fa-eye" aria-hidden="true"></span>
                        <!-- <i class="fa fa-info-circle info8" aria-hidden="true"></i>
                        <div class="tooltip_content tp8">
                            <p>Lorem Ipsum how many characters etc.</p>
                        </div> -->
                        @error('password')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">

                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="btn_group_cards">
                        <div class="btn_cards">
                            <button type="submit" id="login">{{ __('signup.REGISTER NOW') }}</button>
                        </div>
                    </div>
                    <p class="terms">{{ __('signup.By clicking register now you agree to our') }}
                        <a href="#">{{ __('signup.Terms & Conditions') }}</a> {{ __('signup.and') }}
                        <a href="#">{{ __('signup.Privacy') }}</a> {{ __('signup.Policies') }}</p>
                </div>
                </form>

            </div>
            <!-- <div class="btn_cards"><a href="#">CONTINUE SHOPPING</a></div> -->

            <div class="media_gal">
                <h4 class="modal-title">{{ __('signup.Already Registered') }}</h4>
                <p>Cras tinciduent aliquet risus blandit
                        <a href="{{ route('login') }}">{{ __('signup.login here') }}</a>
                    </p>
            </div>

        </div>
    </section>
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
            
            $(".toggle-password").click(function(){
                    var input = $("#password-field");
                    if($('.fa-eye').length == 1)
                    {
                        $(".toggle-password").removeClass('fa-eye')
                        $(".toggle-password").addClass('fa-eye-slash')

                    }
                    else
                    {
                        $(".toggle-password").addClass('fa-eye')
                        $(".toggle-password").removeClass('fa-eye-slash')                    
                    }


                        input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

                });
            
                var submitIcon = $('.searchbox-icon');
                var inputBox = $('.searchbox-input');
                var searchBox = $('.searchbox');
                var isOpen = false;
                submitIcon.click(function() {
                    if (isOpen == false) {
                        searchBox.addClass('searchbox-open');
                        inputBox.focus();
                        isOpen = true;
                    } else {
                        searchBox.removeClass('searchbox-open');
                        inputBox.focusout();
                        isOpen = false;
                    }
                });
                submitIcon.mouseup(function() {
                    return false;
                });
                searchBox.mouseup(function() {
                    return false;
                });
                $(document).mouseup(function() {
                    if (isOpen == true) {
                        $('.searchbox-icon').css('display', 'block');
                        submitIcon.click();
                    }
                });
            });

            function buttonUp() {
                var inputVal = $('.searchbox-input').val();
                inputVal = $.trim(inputVal).length;
                if (inputVal !== 0) {
                    $('.searchbox-icon').css('display', 'none');
                } else {
                    $('.searchbox-input').val('');
                    $('.searchbox-icon').css('display', 'block');
                }
            }
        </script>    
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


    </script>
    <!-- register -->
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