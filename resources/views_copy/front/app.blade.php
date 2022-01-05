<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title'){{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
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
    width: 120px !important;
    overflow: hidden !important;
    white-space: nowrap !important;
    text-overflow: ellipsis !important;
}
    
    .fa-eye:before {
    top: 0px !important;
    position: relative;
}

.fa-eye-slash:before {
    top: 0px !important;
    position: relative;
}
    </style>
	@yield('header_script')
</head>

<body>

    <div class="@yield('main_div_class')">
        <header>
            <div class="container" style="width: 100%;">
                <div class="row mobheader">

                    <div class="col-xs-3">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.png') }}" class="img-responsive" />
                        </a>
                    </div>
                    <div class="col-xs-9">
                        <ul class="nav navbar-nav navbar-right" style="left:0px !important">
                            @guest
                            <li class="logreg">
                                <a class="logModal">LOGIN</a>
                                <a class="regModel">REGISTER</a>
                            </li>
                            @endguest
                            @auth
                            <li>
                                <div class="dropdown mrs_hinch">
                                <img src="{{ Auth::user()->profile_image  ? asset('profile').'/'.Auth::user()->profile_image : asset('images/userimg.png') }}" class="profile_ico" />
                                    <button class="btn btn-primary" >{{Auth::user()->name}}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('order_list') }}">Orders</a>
                                        </li>@if(Auth::user()->type == 1)
                                        <li>
                                            <a href="javascript:void(0);">View Shop</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('theme') }}">Creation Station</a>
                                        </li>@endif
                                        <li>
                                            <a href="javascript:void(0);">Edit Profile</a>
                                        </li>@if(Auth::user()->type == 1)
                                        <li>
                                            <a href="javascript:void(0);">Media Gallery</a>
                                        </li>@endif
                                        <li class="sign_out">
                                             <a href="#" class="sign_out_confirm">Sign Out</a>
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
                                <a href="javascript:void(0);">
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
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
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
                                            <input type="text" class="form-control" placeholder="Search" name="search">
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
                                        <div class="mob_search_tab">
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
                                        </div>
                                        <!--search_tab-->

                                    </form>
                                    <!--newlyadded-->
                                </div>
                                <div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav links">
                                        <li>
                                            <a href="{{ url('/') }}">HOME</a>
                                        </li>@if(@Auth::user()->type == 1)
                                        <li>
                                            <a href="{{ url('merch_category') }}">MERCH</a>
                                        </li>@endif
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
                                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default sub_search" type="submit">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                        </div>

                                                    </div>
                                                    <!--search_tab-->
                                                    <div class="desktop_search_tab">
                                                        <div class="search_wrap">
                                                            <label>Search:</label>
                                                            <div class="search_lst">
                                                                <input type="radio" id="Products2" name="drone" value="Products">
                                                                <label for="Products">Products</label>
                                                            </div>
                                                            <!-- <div class="search_lst">
                                                                <input type="radio" id="Artists2" name="drone" value="Artists" checked>
                                                                <label for="Artists">Artists</label>
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
                                                        <input type="text" class="form-control desktop_group" placeholder="Search" name="search">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default sub_search ipad_search" type="submit">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                        </div>

                                                    </div>
                                                    <!--search_tab-->
                                                    <div class="desktop_search_tab">
                                                        <div class="search_wrap">
                                                            <label>Search:</label>
                                                            <div class="search_lst">
                                                                <input type="radio" id="Products3" name="drone" value="Products">
                                                                <label for="Products">Products</label>
                                                            </div>
                                                            <!-- <div class="search_lst">
                                                                <input type="radio" id="Artists3" name="drone" value="Artists" checked>
                                                                <label for="Artists">Artists</label>
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
                                            <a  class="logModal">LOGIN</a>
                                            <a  class="regModel">REGISTER</a>
                                        </li>
                                        @endguest
                                        @auth
                                        <li>
                                            <div class="dropdown mrs_hinch">
                                            <img src="{{ Auth::user()->profile_image  ? asset('profile').'/'.Auth::user()->profile_image : asset('images/userimg.png') }}" style="width: 36px; height: 36px;" />
                                                <button class="btn btn-primary">{{Auth::user()->name}}
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ url('dashboard') }}">Home</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('order_list') }}">Orders</a>
                                                    </li>
                                                	<li>
                                                        <a href="{{ URL('shop/'.Auth::user()->name) }}">View Shop</a>
                                                    </li>
                                                	@if(Auth::user()->type == 1)
                                                    
                                                    <li>
                                                        <a href="{{ url('design-creation') }}">Creation Station</a>
                                                    </li>@endif
                                                    <li>
                                                        <a href="{{ url('edit-profile') }}">Edit Profile</a>
                                                    </li>@if(Auth::user()->type == 1)
                                                    <li>
                                                        <a href="{{ url('media-gallery') }}">Media Gallery</a>
                                                    </li>@endif
                                                    <li class="sign_out">
                                                         <a href="#" class="sign_out_confirm">Sign Out</a>
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
                                                <i class="fas fa-shopping-basket img-responsive" style="color:#08adea"></i>
                                            </a>
                                        @php } else{ @endphp
                                            <a href="javascript:void(0);" class="cart_count_a">
                                                <i class="fas fa-shopping-basket img-responsive" style="color:#08adea"></i>
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

        <!--Content -->
        @yield('content')

        <!--Content -->

        <!--footer-->
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
                        <div class="desktop_foot_link">
                            <a href="{{ url('shipping') }}" class="link">Shipping & Returns </a> <a class="link">|</a>
                            <a href="{{ url('term-and-condition') }}" class="link"> Terms & Conditions </a><a class="link">|</a>
                            <a href="{{ url('privacy') }}" class="link"> Privacy & Cookies</a>
                        </div>
                        <div class="mobl_foot_link">
                            <p> <a href="#" class="link">Shipping & Returns </a> <a class="link">|</a>
                                <a href="{{ url('term-and-condition') }}" class="link"> Terms & Conditions </a></p>
                            <p><a href="{{ url('privacy-policy') }}" class="link"> Privacy & Cookies</a></p>
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
                    <h4 class="modal-title"> kindly login to add product to your persnolised whilist</h4>
                    <img src="/images/thanks.png" class="img-responsive" />
                </div>
            </div>
        </div>
    </div>
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
    <script src="{{ asset('js/Carousel.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
        
      $(".sign_out_confirm").click(function(){

     var r = confirm("Are you want to logout");
      if (r == true) {
         document.getElementById('logout-form').submit();
      } 

    });     
        
            var _token = "{{ csrf_token() }}";
            var currency_set ="{{ url('currency_set') }}";
            $( ".currency").change(function(){
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

            $("div#myNavbar .mrs_hinch .btn").click(function(){
            //   $("div#myNavbar .dropdown.mrs_hinch .dropdown-menu").removeClass("inits");
              $("div#myNavbar .mrs_hinch .dropdown-menu").toggleClass("inits");
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
button.btn.btn-primary.contentAddclass::after {
    content: "...";
    display: block;
    position: absolute;
    right: -3px;
    z-index: 999;
    bottom: 0;
}
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