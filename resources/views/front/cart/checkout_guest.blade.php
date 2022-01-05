<!DOCTYPE html>
<html lang="en">

<head>
    <title>Merchandise</title>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/owl.min.css">
    <link rel="stylesheet" href="css/owl.default.css">
    <script src="js/custom.js"></script>
    <style>
        .tp5 {
            top: -130%!important;
            left: 70%!important;
        }
        .removeClass-div,.removeClass{
             display: none;
        }
        .btn_cards button{
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
    </style>
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
</head>

<body>

    <div class="homepg_Cont">
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
                                     <!--newlyadded-->
                                  <form action="/action_page.php">
                                    <div class="input-group search_group mobile_group">
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default sub_search" type="submit">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>

                                    </div>
                          
                                </form>
                                <!--newlyadded-->
                                </div>
                                <div id="myNavbar">
                                    <ul class="nav navbar-nav links">
                                        <li>
                                            <a href="{{ url('/') }}">HOME</a>

                                        </li>
                                        <li>
                                            <a href="{{ url('merch_category') }}">MERCH</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('faq') }}">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('ideas') }}">IDEAS</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('artist_list') }}">ARTISTS SHOPS</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('help') }}">HELP</a>
                                        </li>
                                        <li>
                                               <div class="desktop_search">
                                                <form action="/search" method="POST" role="search">
                                                  {{ csrf_field() }}
                                                    <div class="input-group search_group desktop_group">
                                                        <input type="text" class="form-control" placeholder="Search" autocomplete="off" name="search" id="header_search">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default sub_search" type="submit">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                        </div>
                                                    </div>
                                                    <div class="desktop_search_tab removeClass">
                                                        <div class="search_wrap">
                                                            <div class="search_lst removeClass-div">
                                                                <input type="radio" id="Products2" name="drone" value="Products"/>
                                                                <label for="Products2">Products</label>
                                                                <input type="radio" id="Artists2" name="drone" value="Artists" checked="" />
                                                                <label for="Artists2">Artists</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!--search_tab-->
                                                </form>
                                            </div>

                                            <div class="ipad_new_search">
                                                <form action="/action_page.php">
                                                    <div class="input-group search_group ">
                                                        <input type="text" class="form-control desktop_group" placeholder="Search" name="search">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default sub_search ipad_search" type="button">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>

                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right" style="margin-right: 45px !important">
                                        <!--
                                                                            <li>
                                        <div class="dropdown mrs_hinch">
                                            <img src="images/profile-icon.png" class="profile_ico" />
                                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">MRS HINCH
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="dashboard_artist.html"> Home </a>
                                                </li>
                                                <li>
                                                    <a href="orders.html">Orders</a>
                                                </li>
                                                <li>
                                                    <a href="viewshop.html">View Shop</a>
                                                </li>
                                                <li>
                                                    <a href="creation_station.html">Creation Station</a>
                                                </li>
                                                <li>
                                                    <a href="edit_profile.html">Edit Profile</a>
                                                </li>
                                                <li>
                                                    <a href="media_gallery.html">Media Gallery</a>
                                                </li>
                                                <li class="sign_out">
                                                    <a href="#">Sign Out</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li> -->
                                       <li class="logreg">
                                            <a style="cursor: pointer;"  class="logModal">LOGIN</a>
                                            <a style="cursor: pointer;" class="regModel">REGISTER</a>
                                        </li>
                                        <li>
                                            <a href="#" class="thankModel">
                                                <i class="fa fa-heart" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            @php if( session()->get('cartCount')  > 0) { @endphp
                                                <a href="{{ url('cart') }}" class="cart_count_a">
                                                    <i class="fa fa-shopping-basket img-responsive" style="color:#08adea"></i>
                                                </a>
                                            @php } else{ @endphp
                                                <a href="javascript:void(0);" class="cart_count_a">
                                                    <i class="fa fa-shopping-basket img-responsive" style="color:#08adea"></i>
                                                </a>
                                            @php } @endphp
                                            <span class="cart_count">{{ session()->get('cartCount') ? session()->get('cartCount') : 0 }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="banner wishbanner">
        <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
            <div id="headcarouselid" class="carousel slide" data-ride="carousel">
                <!-- indicators -->
                <ul class="carousel-indicators">
                    <li class="" data-target="#headcarouselid" data-slide-to="0"></li>
                    <li class="" data-target="#headcarouselid" data-slide-to="1"></li>
                    <li class="active" data-target="#headcarouselid" data-slide-to="2"></li>
                    <li class="" data-target="#headcarouselid" data-slide-to="3"></li>
                </ul>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">


                    <div class="item active">
                        <img src="images/checkout.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/checkout.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>Guest Checkout</p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>
    <!--bean_basket-->
    <section id="checkout_guest" class="container_default_custom checkout_wrapper checkout_guest_wrap guest_wrap">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 no-padding">
            <h3>Delivery Details</h3>
        </div>
    <form method="GET" action="{{url('checkout_customer')}}" id="checkout_form">
        <div class="header_content_details">
            <div class="header_cont lt_table">
                <div class="custom_container gus_com_txt">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>First Name:<small style="color:red">*</small></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{old('first_name')}}">
                                    @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>Last Name:<small style="color:red">*</small></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{old('last_name')}}">
                                    @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>Email:<small style="color:red">*</small></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9  col-xs-12 no-padding">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{old('email')}}">
                                    @error('email')
                                   <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                </div>
                                   
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>Door No:<small style="color:red">*</small></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('no') is-invalid @enderror" name="no" id="no" value="{{old('no')}}">
                                    @error('no')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>Address 1:<small style="color:red">*</small></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('street_1') is-invalid @enderror" name="street_1" id="street_1" value="{{old('street_1')}}">
                                    @error('street_1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>Address 2:</label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                                <div class="form-group">
                                    <input type="text" class="form-control " name="street_2" id="street_2" value="{{old('street_2')}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>Town/City:<small style="color:red">*</small></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('region') is-invalid @enderror" name="region" id="region" value="{{old('region')}}">
                                    @error('region')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>Postcode:<small style="color:red">*</small></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                                <div class="form-group">
                                    <input type="text" class="form-control ps_code @error('zipcode') is-invalid @enderror" name="zipcode" id="zipcode" value="{{old('zipcode')}}">
                                    @error('zipcode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>Country:<small style="color:red">*</small></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{old('country')}}">
                                    @error('country')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                                <label>Phone:<small style="color:red">*</small></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                                <div class="form-group t_tip">
                                    <input type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" id="contact_no" value="{{old('contact_no')}}">
                                    @error('contact_no')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <i class="fa fa-info-circle info5" aria-hidden="true"></i>
                                </div>
                                <div class="tooltip_content tp5">
                                    <p>Lorem Ipsum how many characters etc.</p>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 no-padding">

                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding check_box_ct or_lan_ipad">
                                <div class="checkbox">
                                    <label><span class="inline-label"><input type="checkbox" value="" name="terms" id="terms"><p>I agree to the<span><a href="{{ url('term-and-condition') }}"> Terms &amp; Conditions</a></span> and <span><a href="{{ url('privacy-policy') }} "> Privacy Policies</a></p></span></label>
                                </div>
                                <div class="btn_group_cards light">
                                    <input type="hidden" name="payment_type" id="payment_type" value="">
                                    <input type="hidden" name="guest" id="guest" value="guest">
                                    <div class="btn_cards"><button type="submit" data_id="stripe" id="checkout_submit_stripe">Pay with Card</button></div>
                                    <div class="btn_paypal">
                                        <a href="#">
                                             Pay with <i><strong>Pay</strong><strong>Pal</strong></i>
                                         </a>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            <div class="header_cont rt_table">
                <div class="table_basket">
                      <table class="table">
                        <thead>
                            <tr>
                                <th colspan="2" scope="col">{{ __('cart.Basket Summary') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="td-summary">{{ __('cart.Items total') }}:</td>
                                    <td>{{ currency($sub_total, 'GBP', session()->get('my_currency'))}}</td>
                            </tr>
                            <tr>
                                <td scope="row" class="td-summary">{{ __('cart.Delivery') }}:</td>

                               
                                <td>{{currency($shipping_price , 'GBP', session()->get('my_currency'))}}</td>
                                  
                            </tr>
                            <tr>
                                <td colspan="2" class="td-summary">{{ __('cart.Packaging Options') }}:</td>

                            </tr>
                            <tr class="end_cell">
                                @foreach($packing as $value)
                                    @if($packing_id == $value->id)
                                    @php $packing_value = @$value->delivery_value;  @endphp
                                    
                                    <td class="pl-left" style="font-weight: 600;"> {{ $value->delivery_name }}:</td>
                                        <td>{{ currency($value->delivery_value, 'GBP', session()->get('my_currency'))}}</td>
                                    @endif
                                @endforeach
                            </tr>
                            <tr class="total_order ">
                                <td class="td-summary">{{ __('cart.Order Total') }}:</th>
                                @php $grant_total = $sub_total + @$packing_value + $shipping_price; @endphp
                                  <input type="hidden" name="grand_total" value="{{ $grant_total }}">
                                  <input type="hidden" name="sub_total" value="{{ $sub_total }}">
                                  <input type="hidden" name="cart_id" value="{{ $cart_id }}">
                                  <input type="hidden" name="packing_id" value="{{ $value->id }}">
                                    <td>{{ currency($grant_total, 'GBP', session()->get('my_currency'))}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
                <div class="payment_gateway">
                    <p>SECURE PAYMENTS</p>
                    <img src="images/pay.png" alt="" title="" />
                </div>
            </div>
        </div>
    </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="{{ asset('images/footer_logo.png') }}" class="img-responsive inverlogo" />
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
                       <!--  <div class="desktop_foot_link">
                            <a href="{{ url('shipping') }}" class="link">Shipping & Returns </a> <a class="link">|</a>
                            <a href="{{ url('term-and-condition') }}" class="link"> Terms & Conditions </a><a class="link">|</a>
                            <a href="{{ url('privacy') }}" class="link"> Privacy & Cookies</a>
                        </div> -->
                          <div class="desktop_foot_link"><?php $other_link = DB::table('cms')->where('type','others')->whereNull('deleted_at')->get();
                        foreach ($other_link as $key => $list) { ?>
                            <a href="{{ url('others/'.$list->slug) }}" class="link">{{$list->name}}</a> <?php if(count($other_link)-1!=$key){ ?><a class="link">|</a> <?php }} ?>
                        </div>
                        <div class="mobl_foot_link">
                            <p>   <?php foreach ($other_link as $key => $list) { ?>
                            <a href="{{ url('others/'.$list->slug) }}" class="link">{{$list->name}}</a> <?php if(count($other_link)-1!=$key){ ?><a class="link">|</a> <?php }} ?></p>
                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="foot_pay">
                            <h3>Secure Payments</h3>
                            <img src="{{ asset('images/pay.png') }}" class="img-responsive" />
                        </div>
                    </div>
                </div>
            </div>
            <!--Start of Tawk.to Script-->
            <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5ebd661a8ee2956d73a124ac/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            //console.log(Tawk_API);
            </script>
            <!--End of Tawk.to Script-->
                </footer>
            <!--footer-->
        </div>
    <!--login popup-->
    @include('front.login-modal')
    <!--login popup-->

<!--signup popup-->
    @include('front.signup-modal')
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
                    <img src="images/thanks.png" class="img-responsive " />
                </div>
            </div>
        </div>
    </div>
    <!--Thanks popup-->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.rollingslider.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/Carousel.js"></script>

    <!--bannaer carousel-->

    <!--bannaer carousel-->

    <!-- video carousel -->
    <script>

         $(document).ready(function() {

            $('#demo').RollingSlider({
                showArea: "#example",
                prev: "#jprev",
                next: "#jnext",
                moveSpeed: 300,
                autoPlay: true
            });

            var _token = "{{ csrf_token() }}";
    
            $( "#checkout_submit_paypal , #checkout_submit_stripe" ).click(function(e) {
                e.preventDefault();
                payment_type = $(this).attr('data_id');
                    // $("#payment_type").val(payment_type);
                    // $( "#checkout_form" ).submit();
                    if($('#terms').prop("checked") == true){
                        $("#payment_type").val(payment_type);
                        $( "#checkout_form" ).submit();
                        $('.delivery_details ul li').click(function() {
                        $('ul li.current').removeClass('current');
                        $(this).closest('li').addClass('current');
                    });
                    } else {
                        
                        if($('#terms').prop("checked") == false){

                           alert('Kindly check the Tearms and Conditions')
                        } 
                    }
            });
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
    <!--filter dropdown-->
    <script>

        $(".filter_drop label").click(function() {
            $(this).toggleClass("active");
        });

        $(".clearall").click(function() {
            $(".filter_drop label").removeClass("active");
        });

        $(".mobclearall").click(function() {
            $(".mob_drop_filter label").removeClass("active");
        });

        $(".closedrop").click(function() {
            $(".drop_filter").slideToggle();
            $(".cate").removeClass("togcate");
        });

        $(".drop_filter").hide();

        $(".cate").click(function() {
            $(".drop_filter").slideToggle();
        });

        $(".cate").click(function() {
            $(".cate").toggleClass("togcate");
        });

        $(".mob_filt").click(function() {
            $(".mob_dro").slideToggle();
            $(".mob_filt").toggleClass("filtdro");
        });
    </script>
    <!--filter dropdown-->
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
        $(document).ready(function() {

            $('#header_search').mouseover(function() {

            $('.removeClass-div').removeClass(); 
               $('.desktop_search_tab').stop(true, true).show(400);
            });
            $('.search_lst').mouseout(function() {
               $('.search_lst').addClass(); 
               $('.desktop_search_tab').stop(true, true).hide(400);
            });

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
                        items: 3,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })


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

        $(".info5").mouseover(function() {
            $(".tp5").show();
        });

        $(".info5").mouseout(function() {
            $(".tp5").hide();
        });

    </script>
    <!-- thanks -->
</body>
</html>
