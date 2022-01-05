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

<div class="login-box">

  <div class="login-logo">

    <b>Cool Jelly Bean</b>

  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('reset/update') }}">
                        @csrf

                        

                        <!-- <div class="form-group row"> -->
                        <div class="input-group mb-3">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            -->
                            <!-- <div class="col-md-6"> -->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ app('request')->input('email')  ?? old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                <div class="input-group-append">

                                <div class="input-group-text">

                                  <span class="fas fa-envelope"></span>

                                </div>

                              </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <!-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6"> -->
                            <div class="input-group mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                 <div class="input-group-append">

                                    <div class="input-group-text">

                                      <span class="fas fa-lock"></span>

                                    </div>

                                  </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <!-- </div> -->

                       <!--  <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6"> -->
                            <div class="input-group mb-3">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                                 <div class="input-group-append">

                                <div class="input-group-text">

                                  <span class="fas fa-lock"></span>

                                </div>

                              </div>
                            </div>
                        </div>

                        <!-- <div class="form-group row mb-0"> -->
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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