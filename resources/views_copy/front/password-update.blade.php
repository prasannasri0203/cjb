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
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

        <!--Page Content Start-->
    <section id="checkout_completed_log" class="container_default_custom completed_log comp_guest_check">
        <div class="log-out">
            <h3>{{ __('password-update.Existing users Login') }}</h3>
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
                <p class="custom_register">&nbsp;</p>
            </div>
            <div class="row custom_container d-f guestform">
                <form method="post" class="form-validate" action="{{ url('reset/update') }}">
                @csrf
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('password-update.Email') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('email') has-error @enderror">
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('password-update.Password') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group frm_relate t_tip">
                    	<input class="form-control @error('password') has-error @enderror" type="password" id="password-field" name="password" />
                        <span toggle="#password-field" class="fa fa-fw field-icon toggle-password fa-eye" aria-hidden="true"></span>
                        <i class="fa fa-info-circle info8" aria-hidden="true"></i>
                        <div class="tooltip_content tp8">
                            <p>Lorem Ipsum how many characters etc.</p>
                        </div>
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
                        	<button type="submit" id="login">{{ __('password-update.Login') }}</button>
                        </div>
                    </div>
                </div>
                </form>

            </div>
            <!-- <div class="btn_cards"><a href="#">CONTINUE SHOPPING</a></div> -->

            <div class="media_gal">
                <h4 class="modal-title">{{ __('password-update.New to') }} Cool Jelly Bean?</h4>
                <p>
                    <a href="{{ route('signup') }}">{{ __('password-update.Register now') }}</a> {{ __('password-update.to start making money') }}! {{ __("password-update.It’s FREE") }}!</p>
            </div>

        </div>
    </section>
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
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
    
    <!-- Footer Script End -->
@endsection