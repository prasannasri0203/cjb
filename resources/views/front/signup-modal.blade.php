<style type="text/css">
        @media (max-width:767px){
        .fa-eye-slash:before {
     top: 0 !important; 
     position: unset !important; 
}
.fa-eye {
    top: 8px !important;
    position: relative;
}
 .fa-eye-slash{
    top: 8px !important;
    position: relative;
}
    }
.fa-eye:before {
    top: 8px;
    position: relative;
}
.fa-eye-slash:before {
    top: 0px !important;
    position: relative;
}    

.custom-signup-modal-select{
  appearance:none;
  -moz-appearance:none;
  -webkit-appearance:none;
  background:url("../images/selectdrop.png") no-repeat 95% #ffffff
}
    </style>
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
.CaptchaTxtField1 { 
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
</style>
<!-- captcha style end -->
<div class="modal fade changeuser" id="regModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width:auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ __('signup-modal.New To') }} Cool Jelly Bean? </h4>
                    <p>{{ __('signup-modal.Register now to start making money') }}!
                        <a href="#">{{ __("signup-modal.It’s FREE") }}!</a>
                </p>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ route('signup') }}">
                    @csrf
                        
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="first_name">{{ __('signup-modal.First Name') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="last_name">{{ __('signup-modal.Last Name') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                        </div>
                      <!--   <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="type">{{ __('signup-modal.Type') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <select name="user_type" id="user_type" class="form-control custom-signup-modal-select" required>
                                    <option value="1">{{ __('signup-modal.Artist') }}</option>
                                    <option value="2">{{ __('signup-modal.Customer') }}</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="type">Date of Birth:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="date" id="date"  name="dob" class="form-control" placeholder="DOB"  autocomplete="off">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="email">{{ __('signup-modal.Email') }}:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="password">{{ __('signup-modal.Password') }}</label>
                            <div id="show_hide_password" class="col-sm-9 col-xs-12">
                                <input class="form-control" type="password" id="password-field" name="password" required/>
                                <div class="input-group-addon" style="position: absolute;top: 10px;">
                                    <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                    <label  class="control-label col-sm-3 col-xs-12">Captcha</label>
               
                    <div class="col-sm-9 col-xs-12">
                      <div id="CaptchaImageCode1" class="CaptchaTxtField1" style="border:none;margin-left:-18px;">
                        <canvas id="CapCode1"   class="capcode1" width="300" height="80" style="margin-left:-18px;"></canvas>
                        
                      </div> 
                      <input type="hidden" id="captcha_code" name="capcode">
                      <input type="hidden" name="usercap_code" id="usercap_code">
                      <input type="button" class="ReloadBtn" style="margin-left: 18px;" onclick='CreateCaptcha1();'>
                    </div>
                    <div class="enter_captcha">
                        <input style="margin-left:125px;width:100%;" type="text" id="UserCaptchaCode" autocomplete="off" class="CaptchaTxtField1" placeholder='Enter Captcha'  required>
                        <!-- <span id="WrongCaptchaError" class="error"></span> -->
                        @error('usercap_code')
                            <span class="alert-danger" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
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

                        <div class="form-group">
                            <label class="control-label hide_element col-sm-3 col-xs-12" for="profile_name">{{ __('signup-modal.Profile Name') }}:</label>

                            <div class="col-sm-9 col-xs-12">
                               <input type="text" class="form-control hide_element profilename_unique" id="profile_name" name="profile_name" placeholder="Unique name for your profile page">
                                <i class="fa fa-info-circle info1 hide_element" aria-hidden="true"></i>
                            </div>
                        </div>                          

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                                <button type="submit" class="btn btn-default file-upload__label" style="margin: -22px -39px 40px 151px;">{{ __('signup-modal.REGISTER NOW') }}</button>
                            <p class="terms redio_reg-text">{{ __('signup-modal.By clicking register now you agree to our') }}
                                    <a href="{{url('others/terms-conditions')}}">{{ __('signup-modal.Terms & Conditions') }}</a> {{ __('signup-modal.and') }}
                                    <a href="{{url('others/privacy-cookies')}}">{{ __('signup-modal.Privacy') }} {{ __('signup-modal.Policies') }}</a> </p>

                            </div>
                        </div>
                      </div>
                    </form>
                </div>
                <div class="media_gal">
                    <h4 class="modal-title">{{ __('signup-modal.Already Registered') }}</h4>
                    <p>Cras tinciduent aliquet risus blandit
                        <a href="{{ route('login') }}">{{ __('signup-modal.login here') }}</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="tooltip_content tp1">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
        <div class="tooltip_content tp2">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
    </div>
    <script type="text/javascript">
$(document).ready(function(){
    $(".hide_element").hide();
    $('.profilename_unique').keypress(function(e) { 
    if(e.which==32){
      return false;
    }else{
      return true;
    }
  });
  
    // $("#user_type").change(function(){
    //     if($("#user_type").val() == 1)
    //     {
    //         $(".hide_element").show();
    //     }
    //     else
    //     {
    //         $(".hide_element").hide();
    //     }
    // });

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
      <!-- captcha script start -->
    <script type="text/javascript">
                var cd;

        $(function(){
          CreateCaptcha1();
    });

        // Create Captcha
        function CreateCaptcha1() {
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
          $('#CaptchaImageCode1').empty().append('<canvas id="CapCode1" class="capcode1" width="300" height="80"></canvas>')
          
          var c = document.getElementById("CapCode1"),
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