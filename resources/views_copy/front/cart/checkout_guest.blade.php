<!DOCTYPE html>
<html lang="en">

<head>
    <title>Merchandise</title>
    <meta charset="utf-8">
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
    </style>
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
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
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
                                <div class="collapse navbar-collapse" id="myNavbar">
                                    <ul class="nav navbar-nav links">
                                        <li>
                                            <a href="homepage.html">HOME</a>
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
                                        <li class="active">
                                            <a href="artist_page.html">ARTISTS SHOPS</a>
                                        </li>
                                        <li>
                                            <a href="cooljellybean_help.html">HELP</a>
                                        </li>
                                        <li>

                                            <div class="desktop_search">
                                                <form action="/action_page.php">
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
                                                <form action="/action_page.php">
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
                                <p>Checkout</p>
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
        <div class="header_content_details">
            <div class="header_cont lt_table">
                <div class="custom_container gus_com_txt">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>First Name:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" id="first_name" value="">

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>Last Name:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" id="last_name" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>Email:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9  col-xs-12 no-padding">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>Door No:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <div class="form-group">
                            <input type="text" class="form-control" name="no" id="no" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>Address 1:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <div class="form-group">
                            <input type="text" class="form-control" name="street_1" id="street_1" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>Address 2:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <div class="form-group">
                            <input type="text" class="form-control" name="street_2" id="street_2" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>Town/City:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <div class="form-group">
                            <input type="text" class="form-control" name="region" id="region" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>Postcode:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <div class="form-group">
                            <input type="text" class="form-control ps_code" name="zipcode" id="zipcode" value="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>Country:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <div class="form-group">
                            <input type="text" class="form-control" name="country" id="country" value="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 no-padding label_wt">
                        <label>Phone:<small>*</small></label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                        <div class="form-group t_tip">
                            <input type="text" class="form-control" name="contact_no" id="contact_no" value="">
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
                            <label><input type="checkbox" value=""><p>I agree to the <span>Terms & Conditions</span> and <span>Privacy</span> policies.</p></label>
                        </div>
                        <div class="btn_group_cards light">
                            <div class="btn_cards"><a href="#">Pay with Card</a></div>
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
                    <table class="table  ">
                        <thead>
                            <tr>
                                <th colspan="2" scope="col">Basket Summary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Items total:</th>
                                    <td>£49.50</td>
                            </tr>
                            <tr>
                                <td scope="row" colspan="2">Delivery:</th>

                            </tr>

                            <tr>
                                <td class="pl-left">Standard</th>
                                    <td>£2.99 </td>
                            </tr>
                            <tr>
                                <td colspan="2">Packaging Options:</th>

                            </tr>
                            <tr>
                                <td class="pl-left" style="padding-bottom: 23px !important;">None</th>
                                    <td style="padding-bottom: 23px !important;">0.00</td>
                            </tr>
                            <tr class="total_order ">
                                <td>Order Total</th>
                                    <td>£49.50</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="payment_gateway">
                    <p>SECURE PAYMENTS</p>
                    <img src="images/pay.png" alt="" title="" />
                </div>
            </div>
        </div>

    </section>

    <!--footer-->
    <footer>
        <div class="container ">
            <div class="row ">
                <div class="col-sm-3 ">
                    <img src="images/footer_logo.png " class="img-responsive inverlogo " />
                </div>
                <div class="col-sm-6 footcenter ">
                    <a href="# ">
                        <i class="fa fa-facebook-square " aria-hidden="true "></i>
                    </a>
                    <a href="# ">
                        <i class="fa fa-twitter-square " aria-hidden="true "></i>
                    </a>
                    <a href="# ">
                        <i class="fa fa-instagram "></i>
                    </a>
                    <a href="# ">
                        <i class="fa fa-pinterest-square "></i>
                    </a>
                    <p>© Cool Jelly Bean 2019</p>
                    <div class="desktop_foot_link ">
                        <a href="# " class="link ">Shipping & Returns </a> <a class="link ">|</a>
                        <a href="# " class="link "> Terms & Conditions </a><a class="link ">|</a>
                        <a href="# " class="link "> Privacy & Cookies</a>
                    </div>
                    <div class="mobl_foot_link ">
                        <p> <a href="# " class="link ">Shipping & Returns </a> <a class="link ">|</a>
                            <a href="# " class="link "> Terms & Conditions </a></p>
                        <p><a href="# " class="link "> Privacy & Cookies</a></p>
                    </div>

                </div>
                <div class="col-sm-3 ">
                    <div class="foot_pay ">
                        <h3>Secure Payments</h3>
                        <img src="images/pay.png " class="img-responsive " />
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer-->
    </div>
    <!--login popup-->
    <div class="modal fade changeuser " id="myModal " role="dialog ">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button " class="close " data-dismiss="modal ">&times;</button>
                    <h4 class="modal-title ">Existing users Login... </h4>
                </div>
                <div class="modal-body ">
                    <form class="form-horizontal " action="# ">
                        <div class="form-group ">
                            <label class="control-label col-sm-3 col-xs-12 " for="email ">Email:</label>
                            <div class="col-sm-9 col-xs-12 ">
                                <input type="email " class="form-control " id="email " name="email ">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-3 col-xs-12 " for="pwd ">Password:</label>
                            <div class="col-sm-9 col-xs-12 ">
                                <input class="form-control " type="password " id="password-field " name="Password " />
                                <span toggle="#password-field " class="fa fa-fw fa-eye field-icon toggle-password eye-ico "></span>
                                <i class="fa fa-info-circle " aria-hidden="true ">
                </i>
                            </div>
                        </div>
                        <div class="form-group forgot ">
                            <div class="col-sm-9 col-xs-12 pull-right ">
                                <a href="# ">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt ">
                                <button type="submit " class="btn btn-default file-upload__label ">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="media_gal ">
                    <h4 class="modal-title ">New to Cool Jelly Bean?</h4>
                    <p>
                        <a href="# ">Register now</a> to start making money! It’s FREE!</p>
                </div>
            </div>
        </div>
        <div class="tooltip_content ">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
    </div>
    <!--login popup-->

    <!--signup popup-->
    <div class="modal fade changeuser " id="regModal " role="dialog ">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button " class="close " data-dismiss="modal ">&times;</button>
                    <h4 class="modal-title ">New To Cool Jelly Bean? </h4>
                    <p>Register now to start making money!
                        <a href="# ">It’s FREE!</a>
                    </p>
                </div>
                <div class="modal-body ">
                    <form class="form-horizontal " action="# ">
                        <div class="form-group ">
                            <label class="control-label col-sm-3 col-xs-12 " for="email ">Profile Name:</label>
                            <div class="col-sm-9 col-xs-12 ">
                                <input type="email " class="form-control " id="email " name="email " placeholder="Unique name for your artist page ">
                                <i class="fa fa-info-circle info1 " aria-hidden="true ">
                </i>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-3 col-xs-12 " for="pwd ">First Name:</label>
                            <div class="col-sm-9 col-xs-12 ">
                                <input type="text " class="form-control " id="pwd " name="pwd ">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-3 col-xs-12 " for="pwd ">Last Name:</label>
                            <div class="col-sm-9 col-xs-12 ">
                                <input type="text " class="form-control " id="pwd " name="pwd ">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-3 col-xs-12 " for="pwd ">Email:</label>
                            <div class="col-sm-9 col-xs-12 ">
                                <input type="text " class="form-control " id="pwd " name="pwd ">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-sm-3 col-xs-12 " for="pwd ">Password</label>
                            <div class="col-sm-9 col-xs-12 ">
                                <input class="form-control " type="password " id="password-field " name="Password " />
                                <span toggle="#password-field " class="fa fa-fw fa-eye field-icon toggle-password eye-ico "></span>
                                <i class="fa fa-info-circle info2 " aria-hidden="true ">
                </i>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt ">
                                <button type="submit " class="btn btn-default file-upload__label ">REGISTER NOW</button>
                                <p class="terms ">By clicking register now you agree to our
                                    <a href="# ">Terms & Conditions</a> and
                                    <a href="# ">Privacy</a> Policies</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="media_gal ">
                    <h4 class="modal-title ">Already Registered</h4>
                    <p>Cras tinciduent aliquet risus blandit
                        <a href="# ">login here</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="tooltip_content tp1 ">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
        <div class="tooltip_content tp2 ">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
    </div>
    <!--signup popup-->

    <!--Thanks popup-->
    <div class="modal fade changeuser " id="thankModel " role="dialog ">
        <div class="modal-dialog ">
            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button " class="close " data-dismiss="modal ">&times;</button>
                    <h4 class="modal-title ">Thanks for registering!</h4>
                    <p>Please check your email for login credentials</p>
                    <p>Having trouble? Please
                        <a href="# ">contact us</a>
                    </p>
                    <img src="images/thanks.png " class="img-responsive " />
                </div>
            </div>
        </div>
    </div>
    <!--Thanks popup-->
    <script src="js/jquery-2.2.3.min.js "></script>
    <script src="js/bootstrap.js "></script>
    <script src="js/jquery.rollingslider.js "></script>
    <script src="js/owl.carousel.min.js "></script>
    <script src="js/Carousel.js "></script>

    <!--bannaer carousel-->

    <!--bannaer carousel-->

    <!-- video carousel -->
    <script>
        $('#demo').RollingSlider({
            showArea: "#example ",
            prev: "#jprev ",
            next: "#jnext ",
            moveSpeed: 300,
            autoPlay: true
        });
    </script>
    <script type="text/javascript ">
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
        $(".filter_drop label ").click(function() {
            $(this).toggleClass("active ");
        });

        $(".clearall ").click(function() {
            $(".filter_drop label ").removeClass("active ");
        });

        $(".mobclearall ").click(function() {
            $(".mob_drop_filter label ").removeClass("active ");
        });

        $(".closedrop ").click(function() {
            $(".drop_filter ").slideToggle();
            $(".cate ").removeClass("togcate ");
        });

        $(".drop_filter ").hide();

        $(".cate ").click(function() {
            $(".drop_filter ").slideToggle();
        });

        $(".cate ").click(function() {
            $(".cate ").toggleClass("togcate ");
        });

        $(".mob_filt ").click(function() {
            $(".mob_dro ").slideToggle();
            $(".mob_filt ").toggleClass("filtdro ");
        });
    </script>
    <!--filter dropdown-->
    <!-- Login -->
    <script>
        $(".logModal ").click(function() {
            $("#myModal ").show();
        });

        $(".fa-info-circle ").mouseover(function() {
            $(".tooltip_content ").show();
        });

        $(".fa-info-circle ").mouseout(function() {
            $(".tooltip_content ").hide();
        });

        $(".close ").click(function() {
            $("#myModal ").hide();
        });
    </script>
    <!-- Login -->
    <!-- register -->
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
                        items: 3,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })


            $(".regModal ").click(function() {
                $("#regModal ").show();
            });

            $(".info1 ").mouseover(function() {
                $(".tp1 ").show();
            });

            $(".info1 ").mouseout(function() {
                $(".tp1 ").hide();
            });


            $(".info2 ").mouseover(function() {
                $(".tp2 ").show();
            });

            $(".info2 ").mouseout(function() {
                $(".tp2 ").hide();
            });

            $(".close ").click(function() {
                $("#regModal ").hide();
            });


            $(".navbar-toggle ").click(function() {
                $("#myNavbar ").slideToggle();
            });

        });


        $(document).ready(function() {
            $(".toggle-password ").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash ");
                var input = $($(this).attr("toggle "));
                if (input.attr("type ") == "password ") {
                    input.attr("type ", "text ");
                } else {
                    input.attr("type ", "password ");
                }
            });

        });
    </script>
    <!-- register -->

    <!-- thanks -->
    <script>
        $(".thankModel ").click(function() {
            $("#thankModel ").show();
        });

        $(".close ").click(function() {
            $("#thankModel ").hide();
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
