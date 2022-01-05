<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cool Jellybean</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/slick.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
    <link rel="stylesheet" href="css/owl.min.css">
    <link rel="stylesheet" href="css/owl.default.css">



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
</head>

<body>
    <!--header-->

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
                            <a href="#">LOGIN</a>
                            <a href="#">REGISTER</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-shopping-basket img-responsive" style="color:#08adea" aria-hidden="true"></i>
                            </a>
                            <span>2</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mobdown">
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
                                    <li class="active">
                                        <a href="homepage.html">HOME</a>
                                    </li>
                                    <li>
                                        <a href="CoolJellyBean_Merch.html">MERCH</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="">IDEAS</a>
                                    </li>
                                    <li>
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

                                    <li>
                                        <div class="dropdown mrs_hinch">
                                            <img src="images/profile-icon.png" class="profile_ico" />
                                            <button class="btn btn-primary dropdown-toggle contentAddclass" data-toggle="dropdown">MRS HINCH
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
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-basket img-responsive" style="color:#08adea" aria-hidden="true"></i>
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
    <!--/.header-->

    <!--dashboard artist-->
    <section>
        <div class="dashboard-sec slidpad creabg">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">

                        <ul class="left_menu regular slider">
                            <li>
                                <a href="dashboard_artist.html">
                                    <i class="fa fa-home"></i>
                                    <span> Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="orders.html">
                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    <span> Orders</span>
                                </a>
                            </li>
                            <li>
                                <a href="viewshop.html">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    <span> View Shop</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="CreateStation_1C.html">
                                    <i class="fa fa-paint-roller"></i>
                                    <span> Creation Station</span>
                                </a>
                            </li>
                            <li>
                                <a href="edit_profile.html">
                                    <i class="fa fa-edit"></i>
                                    <span> Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="media_gallery.html">
                                    <i class="fa fa-images"></i>
                                    <span> Media Gallery</span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 nopadding">
                        <!--banner-->
                        <div class="banner">
                            <div class="item">
                                <img class="desk-banner" src="images/creation_banner_03.png" title="slidepicture" alt="slidepicture">
                                <!-- <img class="mob-banner" src="images/creation_banner_04.png" title="slidepicture" alt="slidepicture"> -->
                                <div class="caption station_caption">
                                    <h2 class="wlcr">Welcome to the Creation Station!</h2>
                                    <p>Follow your simple steps below to create your own unique Products!</p>
                                    <img class="mob-banner" src="images/mug.png" title="slidepicture" alt="slidepicture">
                                </div>
                            </div>
                        </div>
                        <!--/.banner-->

                        <!--navtab-->

                        <div class="createstation_tab">


                            <ul class="nav nav-tabs">
                                <li>
                                    <a data-toggle="tab" href="#Merchandise">Your Merchandise</a>
                                </li>
                                <li class="active">
                                    <a data-toggle="tab" href="#Customise">Design and Customise</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#Products_wrap">Manage Your Products</a>
                                </li>

                            </ul>

                            <div id="tab_row_spacing" class="tab-content">
                                <div id="Merchandise" class="tab-pane fade ">
                                    <div class="createstatn_cont merchandise_content">
                                        <!-- <p class="txt">You haven't added any merchandise yet use the "add new item" button below to choosw your first item, or select 
                                                a preset merch collection below  to get startd quickly with our carefully selected range.
                                        </p> -->
                                        <p class="txt"> You currently have
                                            <span class="blue_clr">8</span>/20 items of merchandise in your collection</p>
                                        <section id="demos" class="container ws_ordershop ws_ordershop createstn_demo">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="owl-carousel owl-theme tshirt_sec owl-loaded owl-drag restshirt">





                                                        <div class="owl-stage-outer">
                                                            <div class="owl-stage" style="transform: translate3d(-833px, 0px, 0px); transition: all 0.25s ease 0s; width: 2084px;">
                                                                <div class="owl-item" style="width: 396.667px; margin-right: 20px;">
                                                                    <div class="item">
                                                                        <div class="prod_blk">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12">
                                                                                            <p>
                                                                                                <span>Tshirts</span> >
                                                                                                <span>Basic T-shirt</span>
                                                                                                <span class="info_icon">
                                                                            <i class="fa fa-info-circle"></i>
                                                                        </span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="owl-item" style="width: 396.667px; margin-right: 20px;">
                                                                    <div class="item">
                                                                        <div class="prod_blk">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12">
                                                                                            <p>
                                                                                                <span>Tshirts</span> >
                                                                                                <span>Basic T-shirt</span>
                                                                                                <span class="info_icon">
                                                                            <i class="fa fa-info-circle"></i>
                                                                        </span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="owl-item active" style="width: 396.667px; margin-right: 20px;">
                                                                    <div class="item">
                                                                        <div class="prod_blk">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12">
                                                                                            <p>
                                                                                                <span>Tshirts</span> >
                                                                                                <span>Basic T-shirt</span>
                                                                                                <span class="info_icon">
                                                                            <i class="fa fa-info-circle"></i>
                                                                        </span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="owl-item active" style="width: 396.667px; margin-right: 20px;">
                                                                    <div class="item">
                                                                        <div class="prod_blk">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12">
                                                                                            <p>
                                                                                                <span>Tshirts</span> >
                                                                                                <span>Basic T-shirt</span>
                                                                                                <span class="info_icon">
                                                                            <i class="fa fa-info-circle"></i>
                                                                        </span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="owl-item active" style="width: 396.667px; margin-right: 20px;">
                                                                    <div class="item">
                                                                        <div class="prod_blk">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12">
                                                                                            <p>
                                                                                                <span>Tshirts</span> >
                                                                                                <span>Basic T-shirt</span>
                                                                                                <span class="info_icon">
                                                                            <i class="fa fa-info-circle"></i>
                                                                        </span>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next disabled"><span aria-label="Next">›</span></button></div>
                                                        <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div>
                                                    </div>
                                                </div>
                                            </div>


                                        </section>
                                        <div class="tshirt_sec cs1b cs_mobile_hide">
                                            <div class="row">

                                                <div class="prod_blk">
                                                    <div class="tshirt_cart">
                                                        <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                        <a href="#" class="wishlisticon">
                                                            <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                        </a>
                                                        <div class="price_cart">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p><span>Tshirts</span> ><span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prod_blk">
                                                    <div class="tshirt_cart">
                                                        <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                        <a href="#" class="wishlisticon">
                                                            <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                        </a>
                                                        <div class="price_cart">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p><span>Tshirts</span> ><span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prod_blk">
                                                    <div class="tshirt_cart">
                                                        <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                        <a href="#" class="wishlisticon">
                                                            <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                        </a>
                                                        <div class="price_cart">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p><span>Tshirts</span> ><span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prod_blk">
                                                    <div class="tshirt_cart">
                                                        <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                        <a href="#" class="wishlisticon">
                                                            <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                        </a>
                                                        <div class="price_cart">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p><span>Tshirts</span> ><span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prod_blk">
                                                    <div class="tshirt_cart">
                                                        <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                        <a href="#" class="wishlisticon">
                                                            <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                        </a>
                                                        <div class="price_cart">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p><span>Tshirts</span> ><span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prod_blk">
                                                    <div class="tshirt_cart">
                                                        <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                        <a href="#" class="wishlisticon">
                                                            <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                        </a>
                                                        <div class="price_cart">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p><span>Tshirts</span> ><span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prod_blk">
                                                    <div class="tshirt_cart">
                                                        <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                        <a href="#" class="wishlisticon">
                                                            <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                        </a>
                                                        <div class="price_cart">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p><span>Tshirts</span> ><span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="prod_blk">
                                                    <div class="tshirt_cart">
                                                        <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                        <a href="#" class="wishlisticon">
                                                            <span>
                                                                <i class="fa fa-trash"></i>

                                                            </span>
                                                        </a>
                                                        <div class="price_cart">
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <p><span>Tshirts</span> ><span>Basic T-shirt</span> <span class="info_icon"><i class="fa fa-info-circle"></i></span></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="txt">
                                            <button class="btn add_item">ADD NEW ITEM <i class="fa fa-plus-circle"></i> </button>
                                            <span>or select one of our preset collections:
                                                 <select class="form-control ">
                                                     <option>--Please Select--</option>
                                                     <option>1</option>
                                                     <option>2</option>
                                                 </select></span>
                                        </p>

                                    </div>

                                </div>
                                <div id="Customise" class="tab-pane fade in active">
                                    <div class="createstatn_cont customise_content">

                                        <div class="container-fluid product_editor crebb ipad_pfrm">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img src="images/tshirtedit2.png" alt="" class="img-responsive edituser_img" />
                                                </div>
                                                <div class="col-sm-6">
                                                    <h3>Basic T-shirt</h3>
                                                    <form class="form-horizontal" action="/action_page.php">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-5">Cost Price:</label>
                                                            <div class="col-sm-7">
                                                                <label class="control-label boldprice">£16.50</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="control-label col-sm-5 ">Your Price:</label>
                                                            <div class="col-sm-7 currency-rt">
                                                                <!--<span>£</span>--><input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-5 ">Your Profit:</label>
                                                            <div class="col-sm-7 currency-rt">
                                                                <!--<span>£</span>--><input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-5">
                                                                <label class="control-label">Choose Available Colours:</label>
                                                                <label class="control-label sublabel">(Click to select / deselect)</label>
                                                            </div>
                                                            <div class="col-sm-7 colpickers">
                                                                <div>
                                                                    <input type="color" id="colorpicker" name="color" value="#ffffff">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                </div>
                                                                <div>
                                                                    <input type="color" id="colorpicker" name="color" value="#e6c8a6">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                </div>
                                                                <div>
                                                                    <input type="color" id="colorpicker" name="color" value="#b7d5f7">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                </div>
                                                                <div>
                                                                    <input type="color" id="colorpicker" name="color" value="#edf9b1">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                </div>
                                                                <div>
                                                                    <input type="color" id="colorpicker" name="color" value="#deaab6">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                </div>
                                                                <div>
                                                                    <input type="color" id="colorpicker" name="color" value="#edced6">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-5">Available Sizes:</label>
                                                            <div class="col-sm-7">
                                                                <label class="control-label">XXL, XL, M, S, XS</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-5">Name Your Creation:</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-5">Describe Your Creation:</label>
                                                            <div class="col-sm-7">
                                                                <textarea class="form-control text-control" rows="2"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group t_tip">
                                                            <label class="control-label col-sm-5">Add Category keywords:</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control">
                                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group t_tip">
                                                            <label class="control-label col-sm-5">Add Search keywords:</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control">
                                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-10">
                                                                <button type="submit" class="btn btn-default savecrea">SAVE CREATION</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h3>Item Details</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                        aliquip ex ea commodo consequat.</p>
                                                    <p>
                                                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                                                            id est laborum.</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div id="Products_wrap" class="tab-pane fade">
                                    <div class="createstatn_cont product_content">
                                        <div class="cash_steps help_guides main_faq manageprod_faq">
                                            <div class="row no-margin">

                                                <p class="title">Your Shop</p>
                                                <div class="help_guides_content faq_conent">
                                                    <p>Here you can view all your creations! The order they appear below MATCHES the order they will appear in
                                                        <span class="blu_clr">
                                                            <a href=""> Your Shop.</a>
                                                        </span> To change the order, just drag and drop the orange bars until you’re happy with them.
                                                    </p>
                                                </div>
                                                <div class="panel-group faq-accordion" id="accordion">
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq1" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <!-- <i class="fa fa-arrow-circle-up"></i> -->
                                                        <div id="faq1" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq2" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq2" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq3" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq3" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq4" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq4" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq5" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq5" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq6" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq6" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq7" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq7" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq8" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq8" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq9" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq9" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq10" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq10" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-default">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq11" class="accord_ques">
                                                            <img src="images/six_dot.png" alt=""> Category header
                                                            <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                        </a>
                                                        <div id="faq11" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="tshirt_sec">
                                                                    <div class="row">
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt1.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt2.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-6">
                                                                            <div class="tshirt_cart">
                                                                                <img src="images/tshirt3.png" class="img-responsive uploadimg">
                                                                                <a href="#" class="wishlisticon">
                                                                                    <span>
                                                                                        <i class="fa fa-trash"></i>
                                                                                        
                                                                                    </span>
                                                                                </a>
                                                                                <div class="price_cart">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-8">
                                                                                            <p>Lorem Ispum Product Title</p>
                                                                                            <h4>£16.50</h4>
                                                                                        </div>
                                                                                        <div class="col-xs-4">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-eye"></i>
                                                                                                <i class="fa fa-pencil-square-o"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/.navtab-->
                        <button type="submit" class="btn btn-default savecrea1">SAVE AND CONTINUE <i class="fa fa-arrow-circle-right"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/.dashboard artist-->

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
                        <img src="images/pay.png" class="img-responsive" />
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/.footer-->
    <script>
        //accord 
        $('.accord_ques').on('click', function() {

            if ($('.arrow_down', this).hasClass('arrow_up')) {

                $('.arrow_down', this).removeClass('arrow_up');
            } else {
                $('.arrow_down').removeClass('arrow_up');

                $('.arrow_down', this).addClass('arrow_up');
            }
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Carousel.js"></script>
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
                        items: 1,
                        nav: true
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        loop: false,

                    }
                }
            })

        });
    </script>


</body>

</html>