@extends('front.app')

@section('title', 'Registration')

@section('header_script')
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"> -->
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
        section#checkout_completed_log .form-group.frm_relate.t_tip span {
          right: 20px;
          top: -3px;
}

section#checkout_completed_log  input.has-error+span {
    right: 28px !important;
}
.changeuser form.form-horizontal div#show_hide_password .fa-eye-slash:before {
    top: 0px !important;
    position: relative;
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
        .alert-danger {
            width: 95%;
        }
        span.fa.fa-fw.field-icon.toggle-password.fa-eye.eye_tops::before {
            top: 1px !important;
        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')
<!-- captcha style start -->
<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700);
@import url(https://fonts.googleapis.com/css?family=Roboto+Slab:400,100);
h1 {
  font-size: 28px; 
  font-weight: 700; 
  margin: 0px; 
  padding: 0px 0px 10px 0; 
  border-bottom : 1px solid #ccc;
}
h4 { font-size : 16px; font-weight: 300; margin-top: 5px; line-height: 22px; }
h4 > * { display: inline-block; vertical-align: top; }

fieldset { 
  border: 1px solid #ccc; 
  padding: 15px; 
  max-width: 345px;
  background-color: #fff;
  border-radius: 5px;
}

section { padding: 0 15px; }

.CaptchaWrap { position: relative; }
.CaptchaTxtField { 
  border-radius: 5px; 
  border: 1px solid #ccc; 
  display: block;  
  box-sizing: border-box;
}

#UserCaptchaCode { 
  padding: 15px 10px; 
  outline: none; 
  font-size: 18px; 
  font-weight: normal; 
  font-family: 'Open Sans', sans-serif;
  width: 343px;
}
#CaptchaImageCode { 
  text-align:center;
  margin-top: 15px;
  padding: 0px 0;
  width: 300px;
  overflow: hidden;
}

.capcode { 
  font-size: 46px; 
  display: block; 
  -moz-user-select: none;
  -webkit-user-select: none;
  user-select: none; 
  cursor: default;
  letter-spacing: 1px;
  color: #ccc;
  font-family: 'Roboto Slab', serif;
  font-weight: 100;
  font-style: italic;
}

.ReloadBtn { 
  background:url('https://cdn3.iconfinder.com/data/icons/basic-interface/100/update-64.png') left top no-repeat;   
  background-size : 100%;
  width: 32px; 
  height: 32px;
  border: 0px; outline none;
  position: absolute; 
  bottom: 30px;
  left : 310px;
  outline: none;
  cursor: pointer; /**/
}
.btnSubmit {
  margin-top: 15px;
  border: 0px;
  padding: 10px 20px; 
  border-radius: 5px;
  font-size: 18px;
  background-color: #1285c4;
  color: #fff;
  cursor: pointer;
}

.error { 
  color: red; 
  font-size: 12px; 
  display: none; 
}
.success {
  color: green;
  font-size: 18px;
  margin-bottom: 15px;
  display: none;
}
@media screen and (max-width:576px)
{
    input.ReloadBtn {
    left: 203px;
    top: 13px;
}
.CaptchaWrap, div#CaptchaImageCode, canvas#CapCode {
    width: 200px;
}
.enter_captcha { 
    width: 100% !important;
}
.rej_button {
    margin-left: 0;
}
}
@media screen and (max-width:767px)
{

.rej_button {
    margin-left: 0 !important;
}
.enter_captcha, input#UserCaptchaCode, .success_message {
    width: 100% !important;
}
.container_default_custom .form-group select.form-control {
    width: 100% !important;
    height: 40px;
}
}
.enter_captcha {
    float: left;
    width: 300px;
}
input#UserCaptchaCode {
    margin-top: 10px;
}
input.btnSubmit {
    float: left;
}
.rej_button {
    margin-left: 140px;
}
.success_message {
    float: left;
    width: 300px;
}
.redio_sec{
  margin-bottom: 30px;
}
</style>
<!-- captcha style end -->

        <!--Page Content Start-->
    <section id="checkout_completed_log" class="container_default_custom completed_log comp_guest_check">
        <div class="log-out">
            <h3>{{ __('signup.New To') }} Cool Jelly Bean?</h3>
            <div class="col-lg-12 col-md-12 col-sm-12 no-padding">
                <p class="custom_register">{{ __('signup.Register now to start making money') }}!
                        <a href="#">{{ __("signup.It’s FREE") }}!</a></p>
            </div>
            <div class="row d-f guestform">
                <form method="post" class="form-validate" action="{{ route('signup') }}" autocomplete="nope">
                @csrf
                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('signup.First Name') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('first_name') has-error @enderror">
                        <input type="text" class="form-control" id="" value="{{old('first_name')}}" placeholder="" name="first_name" required autocomplete="nope">
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
                        <input type="text" class="form-control" id="" value="{{old('last_name')}}" placeholder="" name="last_name" required autocomplete="nope">
                        @error('last_name')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
               <!--  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
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
                </div> -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('signup.Email') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group @error('email') has-error @enderror">
                        <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" required autocomplete="nope">
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
                        <input class="form-control @error('password') has-error @enderror" type="password" id="password-field" name="password" autocomplete="nope" autocomplete="nope" required/>
                        <span toggle="#password-field" class="fa fa-fw field-icon toggle-password eye_tops fa-eye" aria-hidden="true"></span>
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
                @php
                    @$id = Input::get('t');
                    @$u_id = explode('e',$id);
                    @$user = App\User::find($u_id[1]);
                @endphp
                @if($user)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>{{ __('Refered By') }}: </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding">
                    <div class="form-group frm_relate t_tip">
                        <input type="hidden" name="refer_id" value="{{$user->id}}">
                        {{@$user->first_name}} {{@$user->last_name}}
                    </div>
                </div> 
                @endif 

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">
                    <label>Captcha</label>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding success_message">
                    <!-- <span id="SuccessMessage" class="success">Hurray! Your have successfully entered the captcha.</span> -->
                    
                    <div class='CaptchaWrap'>
                      <div id="CaptchaImageCode" class="CaptchaTxtField">
                        <canvas id="CapCode"  class="capcode" width="300" height="80"></canvas>
                        
                      </div> 
                      <input type="hidden" id="captcha_code" name="capcode">
                      <input type="hidden" name="usercap_code" id="usercap_code">
                      <input type="button" class="ReloadBtn" onclick='CreateCaptcha();'>
                    </div>
                    <div class="enter_captcha">
                        <input type="text" id="UserCaptchaCode" class="CaptchaTxtField" placeholder='Enter Captcha'  required autocomplete="nope">
                        <!-- <span id="WrongCaptchaError" class="error"></span> -->
                        @error('usercap_code')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                </div>
                 


                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding">

                </div>
                     <div class="redio_sec">
 <p>Do you want to <a href="#">create your own shop</a> and start selling personalised products?</p>
                           <div class="redio-text col-sm-offset-3 col-sm-9 col-xs-12 logbt ">
                           <p>
                             <input type="radio" id="test1" name="is_own_shop" value="0" checked>
                             <label for="test1">No thanks</label>
                           </p>
                           <p style="margin-left: auto;">
                             <input type="radio" id="test2" name="is_own_shop" value="1">
                             <label for="test2">Yes Please!</label>
                           </p>
                        </div> 
                      </div>   


                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding hide_element">
                            <label>{{ __('signup.Profile Name') }}: </label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 no-padding hide_element">
                            <div class="form-group @error('profile_name') has-error @enderror">
                                <input type="text" class="form-control" id="" value="{{old('profile_name')}}" placeholder="" name="profile_name" >
                                @error('profile_name')
                                    <span class="alert-danger" role="alert" >
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

              <div class="redio_sec">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 rej_button">
                    <div class="btn_group_cards grp-btn-unique">
                        <div class="btn_cards reg-btn-unique">
                            <button type="submit"  class="btnSubmit" onclick="CheckCaptcha();" id="login">{{ __('signup.REGISTER NOW') }}</button>
                        </div>
                    </div>
                    <p class="terms">{{ __('signup.By clicking register now you agree to our') }}
                        <a href="{{url('others/terms-conditions')}}">{{ __('signup.Terms & Conditions') }}</a> {{ __('signup.and') }}
                        <a href="{{url('others/privacy-cookies')}}">{{ __('signup.Privacy') }} {{ __('signup.Policies') }}</a> </p>
                </div>
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
   <script type="text/javascript">
$(document).ready(function(){
    $(".hide_element").hide();


     $('input[type="radio"]').click(function() { 
              if($(this).val() == true) {
            $(".hide_element").show();
              }
              else if($(this).val() == false) { 
            $(".hide_element").hide();
              }
            });

});
    </script>
    <!-- Footer Script Start -->
    <script src="js/bootstrap.min.js"></script>
    <!-- captcha script start -->
    <script type="text/javascript">

                var cd;

        $(function(){
          CreateCaptcha();
    });

        // Create Captcha
        function CreateCaptcha() {
          //$('#InvalidCapthcaError').hide();
          var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                            
          var i;
          for (i = 0; i < 6; i++) {
            var a = alpha[Math.floor(Math.random() * alpha.length)];
            var b = alpha[Math.floor(Math.random() * alpha.length)];
            var c = alpha[Math.floor(Math.random() * alpha.length)];
            var d = alpha[Math.floor(Math.random() * alpha.length)];
            var e = alpha[Math.floor(Math.random() * alpha.length)];
            var f = alpha[Math.floor(Math.random() * alpha.length)];
          }
          cd = a + ' ' + b + ' ' + c + ' ' + d + ' ' + e + ' ' + f;
          $('#CaptchaImageCode').empty().append('<canvas id="CapCode" class="capcode" width="300" height="80"></canvas>')
          
          var c = document.getElementById("CapCode"),
              ctx=c.getContext("2d"),
              x = c.width / 2,
              img = new Image();

          img.src = "https://pixelsharing.files.wordpress.com/2010/11/salvage-tileable-and-seamless-pattern.jpg";
          img.onload = function () {
              var pattern = ctx.createPattern(img, "repeat");
              ctx.fillStyle = pattern;
              ctx.fillRect(0, 0, c.width, c.height);
              ctx.font="46px Roboto Slab";
              ctx.fillStyle = '#ccc';
              ctx.textAlign = 'center';
              ctx.setTransform (1, -0.12, 0, 1, 0, 15);
              ctx.fillText(cd,x,55);
          };
          
          
        }

        // Validate Captcha
        function ValidateCaptcha() {
          var string1 = removeSpaces(cd);
            $("#captcha_code").val(function() {
                return string1;
            });
          var string2 = removeSpaces($('#UserCaptchaCode').val());
          $("#usercap_code").val(function() {
                return string2;
            });
          if (string1 == string2) {
            return true;
            }
          else {
            return false;
          }
        }

        // Remove Spaces
        function removeSpaces(string) {
          return string.split(' ').join('');
        }

        // Check Captcha
        function CheckCaptcha() {
          var result = ValidateCaptcha();
          if( $("#UserCaptchaCode").val() == "" || $("#UserCaptchaCode").val() == null || $("#UserCaptchaCode").val() == "undefined") {
            $('#WrongCaptchaError').text('Please enter code given above in a picture.').show();
            $('#UserCaptchaCode').focus();
          } else {
            if(result == false) { 
              $('#WrongCaptchaError').text('Invalid Captcha! Please try again.').show();
              CreateCaptcha();
              $('#UserCaptchaCode').focus().select();
            }
            else { 
              // $('#UserCaptchaCode').val('').attr('place-holder','Enter Captcha - Case Sensitive');
              // CreateCaptcha();
              // $('#WrongCaptchaError').fadeOut(100);
              // $('#SuccessMessage').fadeIn(500).css('display','block').delay(5000).fadeOut(250);
              $('#SuccessMessage').fadeIn(1000);
            }
          }  
        }
    </script>
    <!-- captcha script end -->
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