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
        .input-group-addon {
    position: absolute;
    top: 0;
    right: 11%;
    background: transparent;
    padding: 0 !important;
}
div#show_hide_password i {
    color: #ed1277;
}
.fa-eye:before {
     top: 8px !important;
    position: relative;
}

.fa-eye-slash:before {
     top: 8px !important;
    position: relative;
}
div#show_hide_password i.fa.fa-eye-slash {
    top: 2px;
}
.input-group-addon:last-child{
    border: 0;
}

 .custom-login-social-media-btns{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
    margin: 0 auto;
        }
        .custom-login-social-media-btns .btn_group_cards {
    width: auto;

        }
        a.login-page-insta-btn {
             background:#c028a1;
             border-color:#c028a1;
        }
         a.login-page-twitter-btn {
            background:#55acee;
             border-color:#55acee;
        }
        a.login-page-fb-btn {
    background: #4267b2;
    border-color: #4267b2;
}
        a.login-page-fb-btn i,a.login-page-twitter-btn i, a.login-page-insta-btn  i{
    margin-right: 7px;
}
i.fa.fa-eye-slash.eye-top:before,i.fa.fa-eye.eye-top:before{
    top:14px !important;
}
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

<!-- 1. INFORMATION WE COLLECT AND HOW WE USE IT -->
<!--Page Content Start-->
    <section id="checkout_completed_log" class="container_default_custom completed_log comp_guest_check">
        <div class="log-out">
            <h3>{{ __('login.Existing users Login') }}</h3>
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
                <p class="custom_register">&nbsp;</p>
            </div>
            <div class="row custom_container d-f guestform">
                <form method="POST" action="{{ url('reset/update') }}">
                @csrf
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('login.Email') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('email') has-error @enderror">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ app('request')->input('email')  ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('login.Password') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('email') has-error @enderror">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        <div class="input-group-addon pswd-eye">
                            <i class="fa fa-eye-slash eye-top" aria-hidden="true"></i>
                        </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('login.ConfirmPassword') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('email') has-error @enderror">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                        <div class="input-group-addon pswd-eye">
                            <i class="fa fa-eye-slash eye-top" aria-hidden="true"></i>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">

                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="btn_group_cards">
                        <div class="btn_cards">
                            <button type="submit" id="login">{{ __('login.Login') }}</button>
                        </div>
                    </div>
  <!--                   <a class="forgot-pass" href="{{ url('password/reset') }}" style="float: left;">
                          {{ __('Forgot Your Password?') }}
                      </a> -->
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding"></div>
                </form>

            </div>
        <!-- <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                    <div class="custom-login-social-media-btns">
                    <div class="btn_group_cards">
                        <div class="btn_cards">
                            <a class="login-page-fb-btn" href="{{ url('auth/facebook') }}">
<i class="fa fa-facebook-official" aria-hidden="true"></i> {{ __('login.Facebook') }}</a>
                        </div>
                    </div>
                    <div class="btn_group_cards">
                        <div class="btn_cards">
                            <a class="login-page-twitter-btn" href="{{ url('auth/twitter') }}"><i class="fa fa-twitter-square" aria-hidden="true"></i>
{{ __('login.Twitter') }}</a>
                        </div>
                    </div>
 <div class="btn_group_cards">
                        <div class="btn_cards">
                            <a class="login-page-insta-btn" href="{{ url('login/instagram/') }}"><i class="fa fa-instagram" aria-hidden="true"></i>
{{ __('login.Instagram') }}</a>
                        </div>
                    </div>
                </div>
                </div>
            </div> -->
            <!-- <div class="btn_cards"><a href="#">CONTINUE SHOPPING</a></div> -->

<!--             <div class="media_gal">
                <h4 class="modal-title">{{ __('login.New to') }} Cool Jelly Bean?</h4>
                <p>
                    <a href="{{ route('signup') }}">{{ __('login.Register now') }}</a> {{ __('login.to start making money') }}! {{ __("login.It’s FREE") }}!</p>
            </div> -->

        </div>
    </section>
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
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
         $('.pswd-eye').click(function () {
            if($(this).prev().is("input")){
                var pre = $(this).prev();
            } else {
                var pre = $(this).prev().prev();
            }
            console.log(pre);
            if ('password' == pre.attr('type')) {
                pre.prop('type', 'text');
                $(this).children().addClass( "fa-eye" );
                $(this).children().removeClass( "fa-eye-slash" );
            } else {
                pre.prop('type', 'password');
                $(this).children().addClass( "fa-eye-slash" );
                $(this).children().removeClass( "fa-eye" );
            }
        });

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
