<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title'){{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('header_script')
</head>

<body>

    <div class="@yield('main_div_class')">
        <header>
            <div class="container">
                <div class="row mobheader">

                    <div class="col-xs-3">
                        <a href="#">
                            <img src="{{ asset('images/logo.png') }}" class="img-responsive" />
                        </a>
                    </div>
                    <div class="col-xs-9">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="logreg">
                                @guest
                                <a href="#" class="logModal">LOGIN</a>
                                <a href="#" class="regModel">REGISTER</a>
                                @else
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                @endguest
                            </li>
                            <li>
                                <a href="#" class="thankModel">
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-shopping-basket" style="color:{{$theme->cart_colour}}"></i>
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
                                    <a class="navbar-brand" href="{{ route('home') }}">
                                        <img src="{{ asset('images/logo.png') }}" class="img-responsive" />
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
                                        <!--search_tab-->
                                        <div class="mob_search_tab">
                                            <div class="search_wrap">
                                                <label>Search:</label>
                                                <div class="search_lst">
                                                    <input type="radio" id="Products" name="drone" value="Products" checked>
                                                    <label for="Products">Products</label>
                                                </div>
                                                <div class="search_lst">
                                                    <input type="radio" id="Artists" name="drone" value="Artists" checked>
                                                    <label for="Artists">Artists</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!--search_tab-->

                                    </form>
                                    <!--newlyadded-->
                                </div>
                                <div   id="myNavbar">
                                    <ul class="nav navbar-nav links">
                                        <li>
                                            <a href="homepage.html">HOME</a>
                                        </li>
                                        <li>
                                            <a href="CoolJellyBean_Merch.html">MERCH</a>
                                        </li>
                                        <li class="active">
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

                                            <div class="desktop_search">
                                                <form action="#">
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
                                                                <input type="radio" id="Products" name="drone" value="Products" checked>
                                                                <label for="Products">Products</label>
                                                            </div>
                                                            <div class="search_lst">
                                                                <input type="radio" id="Artists" name="drone" value="Artists" checked>
                                                                <label for="Artists">Artists</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--search_tab-->
                                                </form>
                                            </div>

                                            <div class="ipad_new_search">
                                                <form action="#">
                                                    <div class="input-group search_group ">
                                                        <input type="text" class="form-control desktop_group" placeholder="Search" name="search">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default sub_search ipad_search" type="button">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                        </div>

                                                    </div>
                                                    <!--search_tab-->
                                                    <div class="desktop_search_tab">
                                                        <div class="search_wrap">
                                                            <label>Search:</label>
                                                            <div class="search_lst">
                                                                <input type="radio" id="Products" name="drone" value="Products" checked>
                                                                <label for="Products">Products</label>
                                                            </div>
                                                            <div class="search_lst">
                                                                <input type="radio" id="Artists" name="drone" value="Artists" checked>
                                                                <label for="Artists">Artists</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--search_tab-->
                                                </form>
                                            </div>

                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="logreg">
                                            @guest
                                            <a href="#" class="logModal">LOGIN</a>
                                            <a href="#" class="regModel">REGISTER</a>
                                            @else
                                            <style type="text/css">
                                                .logreg a:nth-child(1)::after {
                                                    display: none;
                                                }
                                            </style>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            @endguest
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
        @if(!Route::currentRouteName() == 'login' || !Route::currentRouteName() == 'singup' || !Route::currentRouteName() == 'home')
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
                            <img src="{{ asset('images/faq_banner.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/faq_banner_mbl.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption faq_caption">
                                    <p>
                                        Have a look through our Frequently Asked Questions...
                                    </p>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>
        <!--banner carousel -->
        @endif

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
                            <a href="#" class="link">Shipping & Returns </a> <a class="link">|</a>
                            <a href="#" class="link"> Terms & Conditions </a><a class="link">|</a>
                            <a href="#" class="link"> Privacy & Cookies</a>
                        </div>
                        <div class="mobl_foot_link">
                            <p> <a href="#" class="link">Shipping & Returns </a> <a class="link">|</a>
                                <a href="#" class="link"> Terms & Conditions </a></p>
                            <p><a href="#" class="link"> Privacy & Cookies</a></p>
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
                    <img src="images/thanks.png" class="img-responsive" />
                </div>
            </div>
        </div>
    </div>
    <!--Thanks popup-->
    @yield('footer_script')
</body>

</html>
