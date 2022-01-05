<?php echo "text";exit; ?>
<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
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
</style>
    <div class="homepg_Cont home-banner">
        <header>
            <div class="container">
                <div class="row mobheader">

                    <div class="col-xs-3">
                        <a href="#">
                            <img src="images/logo.png" class="img-responsive" />
                        </a>
                    </div>
                    <div class="col-xs-9">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="logreg">
                                <a href="#" class="logModal">LOGINdsfds</a>
                                <a href="#" class="regModel">REGISTER</a>
                            </li>
                            <li>
                                <a href="#" class="thankModel">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-shopping-basket" style="color:#08adea"></i>
                                </a>
                                <span>2</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mobdown">
                        <nav class="navbar">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                                    <a class="navbar-brand" href="homepage.html">
                                        <img src="images/logo.png" class="img-responsive" />
                                    </a>
                                    <form action="/action_page.php">
                                        <div class="input-group search_group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default sub_search" type="submit">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div  id="myNavbar">
                                    <ul class="nav navbar-nav links">
                                        <li class="active">
                                            <a href="#">HOME</a>
                                        </li>
                                        <li>
                                            <a href="CoolJellyBean_Merch.html">MERCH</a>
                                        </li>
                                        <li>
                                            <a href="faq.html">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="#">IDEAS</a>
                                        </li>
                                        <li>
                                            <a href="artist_page.html">ARTISTS SHOPS</a>
                                        </li>
                                        <li>
                                            <a href="cooljellybean_help.html">HELP</a>
                                        </li>
                                        <li>
                                            <form action="/action_page.php">
                                                <div class="input-group search_group">
                                                    <input type="text" class="form-control" placeholder="Search" name="search">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default sub_search" type="submit">
                              <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="logreg">
                                            <a href="#" class="logModal">LOGIN</a>
                                            <a href="#" class="regModel">REGISTER</a>
                                        </li>
                                        <li>
                                            <a href="#" class="thankModel">
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                             <i class="fas fa-shopping-basket img-responsive" style="color:#08adea"></i>
                                            </a>
                                            <span>2</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!--banner carousel -->
        <div class="banner">
            <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
                <div id="headcarouselid" class="carousel slide" data-ride="carousel">
                    <!-- indicators -->
                    <ul class="carousel-indicators">
                        <li class="active" data-target="#headcarouselid" data-slide-to="0"></li>
                        <li class="" data-target="#headcarouselid" data-slide-to="1"></li>
                        <li class="" data-target="#headcarouselid" data-slide-to="2"></li>
                        <li class="" data-target="#headcarouselid" data-slide-to="3"></li>
                    </ul>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="images/banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                             <img src="images/mobl_banner.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="caption">
                                <p>So you have your fans and followers – now earn money selling your personalised products...</p>
                                <div class="advertise_btn"><a href="#">Register Now</a></div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                             <img src="images/mobl_banner.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="caption">
                                <p>So you have your fans and followers – now earn money selling your personalised products...</p>
                                <div class="advertise_btn"><a href="#">Register Now</a></div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                             <img src="images/mobl_banner.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="caption">
                                <p>So you have your fans and followers – now earn money selling your personalised products...</p>
                                <div class="advertise_btn"><a href="#">Register Now</a></div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/banner.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                             <img src="images/mobl_banner.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="caption">
                                <p>So you have your fans and followers – now earn money selling your personalised products...</p>
                                <div class="advertise_btn"><a href="#">Register Now</a></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!--banner carousel -->

        <!--cash steps -->
        <div class="cash_steps">
            <div class="row no-margin">
                <div class="container">

                    <p class="title">Turn your popularity into cash with
                        <span class="blue_clr">no risk </span> or investment.</p>
                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk">
                        <img src="images/one_circle.png" alt="">
                        <p>Create Your page</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk ">
                        <img src="images/two_circle.png" alt="">
                        <p>Upload Your artwork</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk ">
                        <img src="images/three_circle.png" alt="">
                        <p>Sell your Stuff</p>
                    </div>
                </div>
            </div>
        </div>
        <!--cash steps -->

        <!--video carousel -->
        <section id="responsiveGallery-container" class="responsiveGallery-container">
            <p class="text-center responseGalleryText">
                Lorem ipsum dolor sit amet, consectetur elit...
            </p>
            <a class="responsiveGallery-btn responsiveGallery-btn_prev" href="javascript:void(0);">
              <i class="fas fa-angle-left" style="font-size:120px;color:#2196F3"></i>
            </a>
            <a class="responsiveGallery-btn responsiveGallery-btn_next" href="javascript:void(0);">
              <i class="fas fa-angle-right" style="font-size:120px;color:#2196F3"></i>
            </a>
            <ul class="responsiveGallery-wrapper">
    
                <li class="responsiveGallery-item" style="transform: translate(-50%,20%);left: 50%;">
                    <a href="#" class="responsivGallery-link">
                        <img src="images/box-slider-images/0.png" width="496" height="283" alt="" class="responsivGallery-pic">
                    </a>

                </li>
                <li class="responsiveGallery-item">
                    <a href="#" class="responsivGallery-link">
                        <img src="images/box-slider-images/1.png" width="496" height="283" alt="" class="responsivGallery-pic">
                    </a>

                </li>
                <li class="responsiveGallery-item">
                    <a href="#" class="responsivGallery-link">
                        <img src="images/box-slider-images/2.png" width="496" height="283" alt="" class="responsivGallery-pic">
                    </a>

                </li>
                <li class="responsiveGallery-item">
                    <a href="#" class="responsivGallery-link">
                        <img src="images/box-slider-images/3.png" width="496" height="283" alt="" class="responsivGallery-pic">
                    </a>

                </li>
                <li class="responsiveGallery-item">
                    <a href="#" class="responsivGallery-link">
                        <img src="images/box-slider-images/4.png" width="496" height="283" alt="" class="responsivGallery-pic">
                    </a>

                </li>
                <li class="responsiveGallery-item">
                    <a href="#" class="responsivGallery-link">
                        <img src="images/box-slider-images/0.png" width="496" height="283" alt="" class="responsivGallery-pic">
                    </a>

                </li>
                <li class="responsiveGallery-item">
                    <a href="#" class="responsivGallery-link">
                        <img src="images/box-slider-images/1.png" width="496" height="283" alt="" class="responsivGallery-pic">
                    </a>

                </li>
                <li class="responsiveGallery-item">
                    <a href="#" class="responsivGallery-link">
                        <img src="images/box-slider-images/2.png" width="496" height="283" alt="" class="responsivGallery-pic">
                    </a>

                </li>
                <li class="responsiveGallery-item">
                    <a href="#" class="responsivGallery-link">
                        <img src="images/box-slider-images/3.png" width="496" height="283" alt="" class="responsivGallery-pic">
                    </a>

                </li>
            </ul>
        </section>
        <!--video carousel -->

        <!--Image carousel -->
        <div class="carousel Image_carousel">
            <p class="text-center">
                <span class="rosepnk_clr">Personalise</span> your own collection of products and
                <span class="rosepnk_clr">sell</span> them...
            </p>
            <section id="img_demo">
                <div class="row">
                    <div class="large-12 columns">

                        <div class="owl-carousel">
                            <div class="item"><a href="#" data-panel="0"> <img src="images/t-shirt.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="1"> <img src="images/cup.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="2"> <img src="images/bag.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="3"> <img src="images/t-shirt.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="4"> <img src="images/hat.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="5"> <img src="images/hat.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="6"> <img src="images/cushion.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="7"> <img src="images/hat.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="8"> <img src="images/t-shirt.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="9"> <img src="images/cup.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="10"> <img src="images/bag.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="11"> <img src="images/t-shirt.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="12"> <img src="images/hat.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="13"> <img src="images/hat.png" alt=""> </a></div>
                            <div class="item"><a href="#" data-panel="14"> <img src="images/cushion.png" alt=""> </a></div>

                        </div>

                         <div class="slider-container">
                          <input class="range-slider" type="range" id="range" value="0" name="range" min="0" step="1" max="14" />

                          </div>

                    </div>
                </div>

            </section>
        </div>
        <!--Image carousel -->

        <!--Help Guide -->
        <div class="cash_steps help_guides">
            <div class="row no-margin">
                <div class="container">

                    <p> Need more info? Have a look at our
                        <span class="rosepnk_clr">help guides..</span>
                    </p>

                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk">
                        <img src="images/helpguide_img1.png" alt="">
                        <p class="blue_clr">Who's it for?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <button class="registr_btn">FIND OUT MORE</button>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 steps-blk">
                        <img src="images/helpguide_img2.png" alt="">
                        <p class="blue_clr">How does it work?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <button class="registr_btn">FIND OUT MORE</button>
                    </div>
                    <div class="col-lg-4 col-md-4  col-sm-12 steps-blk">
                        <img src="images/helpguide_img3.png" alt="">
                        <p class="blue_clr">FAQs</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <button class="registr_btn">FIND OUT MORE</button>
                    </div>
                </div>
            </div>

        </div>
        <!--Help Guide -->

        <!--footer-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="images/footer_logo.png" class="img-responsive inverlogo" />
                    </div>
                    <div class="col-sm-6 footcenter">
                        <a href="#">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-pinterest-square"></i>
                        </a>
                        <p>© Cool Jelly Bean 2019</p>
                        <div class="desktop_foot_link">
                                <a href="#" class="link">Shipping & Returns </a> <a class="link">|</a>
                                <a href="{{url('others/terms-conditions')}}" class="link"> Terms & Conditions </a><a class="link">|</a>
                                <a href="{{url('others/privacy-cookies')}}" class="link"> Privacy & Cookies</a>
                        </div>
                        <div class="mobl_foot_link">
                               <p> <a href="#" class="link">Shipping & Returns </a> <a class="link">|</a>
                                <a href="{{url('others/terms-conditions')}}" class="link"> Terms & Conditions </a></p>
                                <p><a href="{{url('others/privacy-cookies')}}" class="link"> Privacy & Cookies</a></p>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="foot_pay">
                            <h3>Secure Payments</h3>
                            <img src="images/pay.png" class="img-responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer-->
    </div>
    <!--login popup-->
    <div class="modal fade changeuser" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Existing users Login... </h4>
                </div>
                <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <form method="POST" id="login_form">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" formnovalidate  class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <a href="{{url('auth/facebook')}}" class="fb btn">
                                    <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                                </a>

                                   <a href="{{ url('auth/twitter') }}" class="fb btn">
                                    <i class="fa fa-twitter-square"></i> Login with Twitter
                                </a>
                            </div>


                            <img src="images/login_loading.gif" id="loading_gif" style="width: 25%; display: none;"class="img-responsive" />
                        </div>
                    </form>
                </div>
                <div class="media_gal">
                    <h4 class="modal-title">New to Cool Jelly Bean?sadsaa</h4>
                    <p>
                        <a href="#">Register now</a> to start making money! It’s FREE!</p>
                </div>
            </div>
        </div>
        <div class="tooltip_content">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
    </div>
    <!--login popup-->

    <!--signup popup-->
    <div class="modal fade changeuser" id="regModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New To Cool Jelly Bean? </h4>
                    <p>Register now to start making money!
                        <a href="#">It’s FREE!</a>
                    </p>
                </div>
                <div class="modal-body">
                <div class="alert alert-danger print-error-msg-register" style="display:none">
                    <ul></ul>
                </div>
                    <form class="form-horizontal" id="register_form">
                    @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="email">Profile Name:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Unique name for your artist page">
                                <i class="fa fa-info-circle info1" aria-hidden="true">
                </i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">First Name:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">Last Name:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">Email:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="pwd">Password:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input class="form-control" type="password" id="password-field" name="password" />
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-ico"></span>
                                <i class="fa fa-info-circle info2" aria-hidden="true">
                </i>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-3 col-xs-12" for="pwd">User Type:</label>
                        <div class="col-sm-9 col-xs-12">
                            <select class="form-control" name="user_type">
                                <option value=3>Customer</option>
                                <option value=4>Artist</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                                <button type="submit" class="btn btn-default file-upload__label">REGISTER NOW</button>
                                <p class="terms">By clicking register now you agree to our
                                    <a href="{{url('others/terms-conditions')}}">Terms & Conditions</a> and
                                    <a href="{{url('others/privacy-cookies')}}">Privacy Policies</a></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="media_gal">
                    <h4 class="modal-title">Already Registered</h4>
                    <p>Cras tinciduent aliquet risus blandit
                        <a href="#">login here</a>
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
    <!--signup popup-->

    <!--Thanks popup-->
    <div class="modal fade changeuser" id="thankModel" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thanks for registering!</h4>
                    <p>Please check your email for login credentials</p>
                    <p>Having trouble? Please
                        <a href="#">contact us</a>
                    </p>
                    <img src="images/thanks.png" class="img-responsive" />
                </div>
            </div>
        </div>
    </div>
    <!--Thanks popup-->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.rollingslider.js"></script>
    <script src="js/Carousel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script>
         $(document).ready(function() {
            $(".mobdown .navbar-toggle").click(function(){
                $("#myNavbar").slideToggle();
            });
          });
    </script>
   <script>
      $(document).ready(function() {
    var owl = $(".owl-carousel"),

        inputType =$("input[type=range]");
    owl.owlCarousel({
    //  'loop': true,
     'mouseDrag': true,
      'autoplay': true,
      'responsive': {
        0: {
          items: 1,
          slideBy: 1

        },
        600: {
          items: 3,
          slideBy: 1

        },
        1280: {
          items: 5,
          slideBy: 1


        }
      }
    });

        owl.on('changed.owl.carousel', function(event) {
        console.log(event.item.index);
        inputType.val(event.item.index);

      });


    $("input").on("change", function(e) {
      e.preventDefault();
      console.log(inputType.val());

      $('.owl-carousel').trigger('to.owl.carousel', [inputType.val(),1,true]);

    });
  });

  </script>
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

    <!-- image carousel -->
    <!-- owl carousel-->
    <script src="js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 7,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })

            var login_form = $("#login_form");
            login_form.submit(function(e){
                e.preventDefault();
                $("#loading_gif").show();
                var formData = login_form.serialize();
                $.ajax({
                        url:'api/login-post',
                        type:'POST',
                        data:formData,
                        success:function(data){
                            //console.log(data);
                            $("#loading_gif").hide();
                            if($.isEmptyObject(data.error)){
                                $(".print-error-msg").hide();
                                //alert(JSON.stringify(data.success))
                                if(JSON.stringify(data.success)==1){
                                        alert("Logged In");
                                }
                                else{
                                    alert("Enter correct credential")
                                }
                            }
                            else
                            {
                                $(".print-error-msg").find("ul").html('');
                                $(".print-error-msg").css('display','block');
                                $.each( data.error, function( key, value ) {
                                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                                });
                            }
                        },
                        error: function (data) {
                            //console.log(data);
                            $("#loading_gif").hide();
                        }
                    });

            });

            var register_form = $("#register_form");
            register_form.submit(function(e){
                e.preventDefault();
                $("#register_loading_gif").show();
                var registerForm = register_form.serialize();
                $.ajax({
                        url:'api/register-post',
                        type:'POST',
                        data:registerForm,
                        success:function(data){
                            //console.log(data);
                            if($.isEmptyObject(data.error)){
                               $(".print-error-msg-register").hide();
                            }
                            else{
                                $(".print-error-msg-register").find("ul").html('');
                                $(".print-error-msg-register").css('display','block');
                                $.each( data.error, function( key, value ) {
                                    $(".print-error-msg-register").find("ul").append('<li>'+value+'</li>');
                                });
                            }
                        },
                        error: function (data) {
                            //console.log(data);
                            $("#register_loading_gif").hide();
                        }
                    });
            });

            function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
            }
        })
    </script>
    <!-- owl carousel-->

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
        });
    </script>


</body>

</html>
