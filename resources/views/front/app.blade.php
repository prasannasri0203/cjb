<?php 
$session = session()->all(); 

if(isset($session['theme_style']) && $session['theme_style'] !=''){
   
   $clr = $session['theme_style']; 

}else{

    $clr = '#ed1277';
}
?>
<style type="text/css">

header .navbar-right li span {
    border-radius: 100px;
    font-size: 13px;
    color: white;
    background: <?php echo @$clr; ?> !important;
    position: absolute;
    top: 0px;
    left: 22px;
    width: 22px;
    height: 22px;
    text-align: center;
    cursor: pointer;
    padding-top: 2px;
    -webkit-box-shadow: 4px 0px 5px #e3e3e3;
    box-shadow: 4px 0px 5px #e3e3e3;
}

header .navbar-right li a i {
    color: <?php echo @$clr; ?> !important;
    font-size: 20px;
}

.basi .row:nth-child(1) {
    border-top: 2px solid <?php echo @$clr; ?> !important;
}

.basi .row {
    border-bottom: 2px solid <?php echo @$clr; ?> !important;
    padding-top: 15px;
    padding-bottom: 5px;
}
</style>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- <title>@yield('title'){{ config('app.name') }}</title> -->
    <title>CoolJellyBean - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('title')">
    <meta name="image" content="@yield('image')">

    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('title')" />
    <meta property="og:image" content="@yield('image')" />
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <!-- Font Awesome -->
    <script type="text/javascript" src="{{ asset('js/font_awesome_5.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/font-awesome_5.min.css') }}">
    <!-- <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
    <!-- <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.default.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-responsiveGallery.css') }}">
    <script type="/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
   <script type="text/javascript" src="{{ asset('js/jquery.responsiveGallery.js') }}"></script>
    <script src="{{ asset('js/jquery.rollingslider.js') }} "></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <style>
  .mrs_hinch  button.btn.btn-primary:focus {
    color: #09adea;
}
#myNavbar .mrs_hinch ul.dropdown-menu.inits
{
    display:block;
}
.dropdown.mrs_hinch .btn-primary.dropdown-toggle {
    /* width: 120px !important; */
    overflow: hidden !important;
    white-space: nowrap !important;
    text-overflow: ellipsis !important;
}
.sign_out_no{
    margin-left: 10px !important;
}
.fa-eye:before {
    top: 0px !important;
    position: relative;
}

ul.left_menu.regular.slider .fa-eye:before {
    top: 0px !important;
}

.fa-eye-slash:before {
    top: 0px !important;
    position: relative !important;
}
.mr-0 {
    margin-right: 0px !important;
    margin-left: 0px !important;
}
@media screen and (max-width:991px)
{
    ul.dropdown-menu.inits {
    display: block;
    top: 142px;
}
}
@media (min-width: 768px){
    .navbar-right {
        margin-right: 0px ! important;
    }  
}

.removeClass-div,.removeClass{
    display: none;
}

    </style>
    @yield('header_script')
</head>

<body>


    <div class="modal fade changeuser " id="logoutModal" role="dialog ">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button " class="close sign_out_no" data-dismiss="modal ">&times;</button>
                    <h4 class="modal-title " style="font-size: 17px;">Are you sure, do you want to Log out? </h4>
                </div>
                <div class="modal-body ">
                    <form class="form-horizontal " action="# ">
                        <div class="form-group ">
                            <button type="button"  class="btn btn-default file-upload__label sign_out_yes">Yes</button>
                            <button type="button" class="btn btn-default file-upload__label sign_out_no">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="@yield('main_div_class')">
        @if(session::get('admin_user'))
        <div class="row">
        <div class='col-xs-12'>
            <div class='' style="background: #ccc; padding-bottom: 80px;">
                <div class="advertise_btn showadminbtn" style="top: 30px;">
                    <a href="{{ route('returnAdmin') }}">Return to Admin</a>
                </div>
            </div>
        </div>
        </div>
     @endif
        <header>
            <div class="container home_head" style="width: 100%;">
                <div class="row mobheader header_content">

                    <div class="col-xs-3">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" class="img-responsive" />
                        </a>
                    </div>
                    <div class="col-xs-9">
                        <ul class="nav navbar-nav navbar-right" style="left:0px !important">
                            @guest
                            <li class="logreg">
                                <a style="cursor: pointer;" class="logModal">LOGIN</a>
                                <a style="cursor: pointer;" class="regModel">REGISTER</a>
                            </li>
                            @endguest
                            @auth
                            <li>
                                <div class="dropdown mrs_hinch">
                                <img src="{{ Auth::user()->profile_image  ? asset('profile').'/'.Auth::user()->profile_image : asset('images/userimg.png') }}" class="profile_ico" />
                                    <button class="btn btn-primary dropdown-toggle contentAddclass" >{{Auth::user()->name}}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('order_list') }}">Orders</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('artist_sale_product') }}">Sale Order</a>
                                        </li>
                                        @if(Auth::user()->type == 1)
                                        @if(\Auth::user()->is_own_shop==1)
                                        <li>
                                            <a href="{{ URL('shop/'.Auth::user()->name) }}">View Shop</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('design-creation') }}">Creation Station</a>
                                        </li>@endif
                                        @endif
                                        <li>
                                            <a href="{{ URL('2fa') }}">2FA</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('edit-profile') }}">Edit Profile</a>
                                        </li>@if(Auth::user()->type == 1)
                                        <li>
                                            <a href="{{ url('media-gallery') }}">Media Gallery</a>
                                        </li>@endif
                                        <li class="sign_out">
                                             <a href="javascript:void(0)" class="sign_out_confirm">Sign Out</a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                            @endauth
                            <li>
                                <a href="{{ url('wishlist') }}" class="thankModel">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="javascript:void(0);">
                                    <i class="fas fa-shopping-basket" style="color:#08adea"></i>
                                </a>
                                <span>2</span>
                            </li> -->
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
                <div class="row mr-0">
                    <div class="col-sm-12 mobdown">
                        <nav class="navbar">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="{{ route('home') }}">
                                        <img src="{{ asset('images/logo.png') }}" class="img-responsive" />
                                    </a>
                                     <!--newlyadded-->
                                     <form action="#">
                                        <div class="input-group search_group mobile_group">
                                            <input type="text" class="form-control" autocomplete="off" placeholder="Search" name="search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default sub_search" type="submit">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <select style="border-radius: 17px;" name="currency" id="currency" class="currency form-control fc-for-mb">
                                                <option {{ (session()->get('my_currency') == "GBP") ? "selected" : ""}} value="GBP">£ GBP</option>
                                                <option {{ (session()->get('my_currency') == "USD") ? "selected" : ""}} value="USD">$ USD</option>
                                                <option {{ (session()->get('my_currency') == "INR") ? "selected" : ""}} value="INR">₹ INR</option>
                                            </select>
                                        <!--search_tab-->
                                      <!--   <div class="mob_search_tab">
                                            <div class="search_wrap">
                                                <label>Search:</label>
                                                <div class="search_lst">
                                                    <input type="radio" id="Products1" name="drone" value="Products" checked>
                                                    <label for="Products">Products</label>
                                                </div>
                                                <div class="search_lst">
                                                    <input type="radio" id="Artists1" name="drone" value="Artists" checked>
                                                    <label for="Artists">Artists</label>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!--search_tab-->
                                    </form>
                                    <!--newlyadded-->
                                </div>
                                <div  id="myNavbar">
                                    <ul class="nav navbar-nav links">
                                        <li>
                                            <a href="{{ url('/') }}">HOME</a>

                                        </li>
                                        @if(@Auth::user()->type == 1)
                                        <li>
                                            <a href="{{ url('merch_category') }}">MERCH</a>
                                        </li>
                                        @endif
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
                                                    <!--search_tab-->
                                                    <div class="desktop_search_tab removeClass">
                                                        <div class="search_wrap">
                                                            <!-- <label>Search:</label> -->
                                                            <div class="search_lst removeClass-div">
                                                                <input type="radio" id="Products2" name="drone" value="Products"/>
                                                                <label for="Products2">Products</label>
                                                                <input type="radio" id="Artists2" name="drone" value="Artists" checked="" />
                                                                <label for="Artists2">Artists</label>
                                                            </div>
                                                            <!-- <div class="search_lst">
                                                                
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <!--search_tab-->
                                                </form>
                                            </div>

                                            <div class="ipad_new_search">
                                            <form action="/search" method="POST" role="search">
                                                 {{ csrf_field() }}
                                                    <div class="input-group search_group ">
                                                        <input type="text" class="form-control desktop_group" placeholder="Search" name="search" id="header_search">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default sub_search ipad_search" type="submit">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                          </button>
                                                        </div>

                                                    </div>
                                                    <!--search_tab-->
                                                    <!-- <div class="desktop_search_tab">
                                                        <div class="search_wrap"> -->
                                                            <!-- <label>Search:</label> -->
                                                            <!-- <div class="search_lst">
                                                                <input type="radio" id="Products3" name="drone" value="Products"/>
                                                                <label for="Products2">Products</label>
                                                                <input type="radio" id="Artists3" name="drone" value="Artists" checked="" />
                                                                <label for="Artists2">Artists</label>
                                                            </div> -->
                                                            <!-- <div class="search_lst">
                                                                <input type="radio" id="Artists3" name="drone" value="Artists" checked>
                                                                <label for="Artists">Artists</label>
                                                            </div> -->
                                                        <!-- </div>
                                                    </div> -->
                                                    <div class="desktop_search_tab removeClass">
                                                        <div class="search_wrap">
                                                            <!-- <label>Search:</label> -->
                                                            <div class="search_lst removeClass-div">
                                                                <input type="radio" id="Products2" name="drone" value="Products"/>
                                                                <label for="Products2">Products</label>
                                                                <input type="radio" id="Artists2" name="drone" value="Artists" checked="" />
                                                                <label for="Artists2">Artists</label>
                                                            </div>
                                                            <!-- <div class="search_lst">
                                                                
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                    <!--search_tab-->
                                                </form>
                                            </div>

                                        </li>
                                        <li class="only-dsk-view">
                                            <select style="border-radius: 17px;" name="currency" id="currency" class="currency form-control">
                                                <option {{ (session()->get('my_currency') == "GBP") ? "selected" : ""}} value="GBP">£ GBP</option>
                                                <option {{ (session()->get('my_currency') == "USD") ? "selected" : ""}} value="USD">$ USD</option>
                                                <option {{ (session()->get('my_currency') == "INR") ? "selected" : ""}} value="INR">₹ INR</option>
                                            </select>
                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right" style="left:0px !important">
                                    <!-- <li><a href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a></li> -->

                                    <!-- <li><a href="{{ url('locale/fr') }}" ><i class="fa fa-language"></i> FR</a></li> -->

                                    <ul class="nav navbar-nav navbar-right" style="left:0px !important">
                                        @guest
                                        <li class="logreg">
                                            <a style="cursor: pointer;"  class="logModal">LOGIN</a>
                                            <a style="cursor: pointer;" class="regModel">REGISTER</a>
                                        </li>
                                        @endguest
                                        @auth
                                        <li>
                                            <div class="dropdown mrs_hinch" style="width: 120px;">
                                            <img src="{{ Auth::user()->profile_image  ? asset('profile').'/'.Auth::user()->profile_image : asset('images/userimg.png') }}"  class="profile_ico"/>
                                                <button class="btn btn-primary dropdown-toggle contentAddclass">{{Auth::user()->first_name}} {{Auth::user()->last_name}}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        @if(Auth::user()->type == 0)
                                                        <a href="{{ url('/admin') }}">Home</a>
                                                        @else
                                                        <a href="{{ url('dashboard') }}">Home</a>
                                                        @endif
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('order_list') }}">Orders</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('artist_sale_product') }}">Sale Order</a>
                                                    </li> 
                                                     
                                                    @if(\Auth::user()->is_own_shop==1)
                                                   
                                                    <li>
                                                        <a href="{{ URL('shop/'.Auth::user()->name) }}">View Shop</a>
                                                    </li>
                                                    @if(Auth::user()->type == 1)
                                                    <li>
                                                        <a href="{{ url('design-creation') }}">Creation Station</a>
                                                    </li>@endif
                                                    @endif
                                                    <li>
                                                        <a href="{{ url('edit-profile') }}">Edit Profile</a>
                                                    </li>@if(Auth::user()->type == 1)
                                                    <li>
                                                        <a href="{{ url('media-gallery') }}">Media Gallery</a>
                                                    </li>@endif
                                                    <li class="sign_out">
                                                         <a href="javascript:void(0)" class="sign_out_confirm">Sign Out</a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        @endauth
                                        <li>
                                            <a href="{{ url('wishlist') }}" class="thankModel">
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
                              
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div class="overallPage clr-change"> 

        <!--Content -->
        @yield('content')

        <!--Content -->

        <!--footer-->
    </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="{{ asset('images/footer_logo.png') }}" class="img-responsive inverlogo" />
                    </div>
                    <div class="col-sm-6 footcenter">
                        <a href="https://www.facebook.com">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        </a>
                        <a href="https://mobile.twitter.com/login">
                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.instagram.com/accounts/login">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://in.pinterest.com">
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
<!--     <div class="modal fade changeuser" id="thankModel" role="dialog">
        <div class="modal-dialog"> -->
            <!-- Modal content-->
<!--             <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Please register / login to add to your wish list</h4>
                    <img src="/images/thanks.png" class="img-responsive" />
                </div>
            </div> -->
<!--         </div>
    </div> -->
    <!--Thanks popup-->
    @yield('footer_script')
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
</script>
<!--End of Tawk.to Script-->
    <!-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script> -->
    <script src="{{ asset('js/Carousel.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $(".mobdown .navbar-toggle").click(function(){
            
                $("#myNavbar").toggleClass('toggledropdown');
            });

            
            $('#header_search').mouseover(function() {
            $('.removeClass-div').removeClass(); 
               $('.desktop_search_tab').stop(true, true).show(400);
            });
            $('.search_lst').mouseout(function() {
               $('.search_lst').addClass(); 
               $('.desktop_search_tab').stop(true, true).hide(400);
            });
        });
        
    </script>
   <script>
        
        $(document).ready(function() {

            var _token = "{{ csrf_token() }}";
            var currency_set ="{{ url('currency_set') }}";
        
            $(".currency").change(function(){
                id=$(this).val();
                $.ajax({
                    type: "POST",
                    url: currency_set,
                    data: {
                        id: id, _token : _token
                        },
                    success: function (data) {
                        if(data.status == 'success')
                        {
                            window.location.reload();
                        }

                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

          $(".sign_out_confirm").click(function(){

          $("#logoutModal").show();

         // var r = confirm("Are you want to logout");
         //  if (r == true) {
         //     document.getElementById('logout-form').submit();
         //  }

    });

        $(".sign_out_yes").click(function(){
            document.getElementById('logout-form').submit();
        });
        $(".sign_out_no").click(function(){
            $("#logoutModal").hide();
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
                        items: 1,
                        nav: true
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        loop: false,

                    }
                }
            });

            $(" .mrs_hinch .btn").click(function(){
            //   $(" .dropdown.mrs_hinch .dropdown-menu").removeClass("inits");
              $(" .mrs_hinch .dropdown-menu").toggleClass("inits");
            });

        });
    </script>
    <script>
$(document).ready(function(){
$(".logModal").click(function(){
$(".changelog").show();
});
$(".logclose").click(function(){
$(".changelog").hide();
});

});


//   togglePassword.addEventListener('click', function (e) {
//     // toggle the type attribute
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);
//     // toggle the eye slash icon
//     this.classList.toggle('fa-eye-slash');
// },false);
</script>

<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');

       $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});
</script>

<script>
// The number of characters
var namelength = 9;

$('.mrs_hinch button').filter(function() {
    return $(this).text().length > namelength;
}).addClass('contentAddclass');
</script>
   <style>
button.btn.btn-primary.contentAddclass {
    overflow: hidden;
    width: 83px;
}
/* button.btn.btn-primary.contentAddclass::after {
    content: "...";
    display: block;
    position: absolute;
    right: -3px;
    z-index: 999;
    bottom: 0;
} */
select#currency.fc-for-mb{
    display:none;
}

@mdia only screen and (max-width:767px){
    select#currency.fc-for-mb {
        margin-top: 19px;
        display: inline-block;
        width: 40%;
        float: right;
    }
    .only-dsk-view{
        display:none;
    }
}
   </style>
</body>

</html>
