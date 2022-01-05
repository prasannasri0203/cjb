@extends('front.app')

@section('title', '')

@section('header_script')
    <!-- Header Script Start -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!--5d slider css-->
    <link rel="stylesheet" type="text/css" href="css/jquery-responsiveGallery.css">
    <!--5d slider css-->
    <script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="css/owl.min.css">
    <link rel="stylesheet" href="css/owl.default.css">
    <script src="js/owl.js"></script>
    <script src="js/custom.js"></script>
    <!--5d slider js-->
    <script type="text/javascript" src="js/modernizr.custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.responsiveGallery.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.responsiveGallery-wrapper').responsiveGallery({
                animatDuration: 400,
                $btn_prev: $('.responsiveGallery-btn_prev'),
                $btn_next: $('.responsiveGallery-btn_next')
            });
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
    <!--5d slider js-->
    <style type="text/css">
        .banner .item .caption.hlp_caption {
            width: 650px!important;
        }
        
        .banner .item .caption.hlp_caption p {
            font-family: 'rubik-bold';
            line-height: 50px;
        }
        
        .banner .item .caption.hlp_caption {
            align-self: center;
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: center;
            top: 0;
            width: 500px;
        }
        
        @media only screen and (max-width: 767px) {
            .banner .item .caption.hlp_caption {
                width: 80%!important;
                justify-content: end;
                top: 55px;
            }
            body .banner .item .caption p {
                font-size: 30px !important;
                line-height: 40px !important;
                margin-top: -25px;
            }
            .cash_steps.help_guides {
                border-top: none!important;
            }
        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')

     <section class="artist_header">
        <div class="container user_contain">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1 user_info">
                    <a href="Logged_In_edit.html"><img src="images/userimg.png" class="img-responsive user_img"></a>
                    <h2>Mrs. Hinch</h2>
                </div>
                <div class="col-md-3 col-sm-5 pull-right">
                    <ul>
                        <li>
                            <a href="artist_page.html">SHOP</a>
                        </li>
                        <li>
                            <a href="#">ABOUT ME</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--About me -->
    <div class="container product_caros" id="mypro_slider_tab">
        <div class="row">
            <div class="col-md-6 prcar">
                <div id="myCarousel" class="carousel slide procaro" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="changer">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"><img src="images/tshirt5.png" style="width:100%;"></li>
                        <li data-target="#myCarousel" data-slide-to="1"><img src="images/tshirt5.png" style="width:100%;"></li>
                        <li data-target="#myCarousel" data-slide-to="2"><img src="images/tshirt5.png" style="width:100%;"></li>
                        <li data-target="#myCarousel" data-slide-to="3"><img src="images/tshirt5.png" style="width:100%;"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="images/tshirt5.png" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="images/tshirt5.png" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="images/tshirt5.png" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="images/tshirt5.png" style="width:100%;">
                        </div>
                    </div>
                    <!-- Left and right controls -->
                    <div class="bigcarrow">
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <img src="images/leftarrow.png" class="img-responsive" />
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <img src="images/rightarrow.png" class="img-responsive" />
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="smallar">
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <i class="fa fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pro_deta">
                <h3>Lorem Ispum Product Title <span><i class="fa fa-heart-o heartin"></i></h3>
               <p>By <a href="#">Mrs Hinch</a></p>
               <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star notactive" aria-hidden="true"></i>
               <a href="#">14 Reviews</a>
               <h2>£16.50</h2>
               <form class="form-horizontal" action="/action_page.php">
                  <div class="form-group">
                     <div class="col-sm-2 col-xs-3">
                        <label class="control-label">Colour</label>
                     </div>
                     <div class="col-xs-9 colpickers">
                        <div>
                           <input type="color" id="colorpicker" name="color" value="#ffffff">
                        </div>
                        <div>
                           <input type="color" id="colorpicker" name="color" value="#e6c8a6">
                        </div>
                        <div>
                           <input type="color" id="colorpicker" name="color" value="#b7d5f7">
                        </div>
                        <div>
                           <input type="color" id="colorpicker" name="color" value="#edf9b1">
                        </div>
                        <div>
                           <input type="color" id="colorpicker" name="color" value="#deaab6">
                        </div>
                        <div>
                           <input type="color" id="colorpicker" name="color" value="#edced6">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="control-label col-sm-2 col-xs-3">Size:</label>
                     <div class="col-sm-6 col-xs-9">
                        <select class="form-control">
                           <option>--Please Select--</option>
                           <option>Large</option>
                           <option>Medium</option>
                           <option>Small</option>
                        </select>
                     </div>
                  </div>

                                    <div class="form-group">
                     <label class="control-label col-sm-2 col-xs-3">Quantity:</label>
                     <div class="col-sm-6 col-xs-9">
  <input type="text" class="form-control quan" value="1">
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10 col-xs-9 col-xs-offset-3 product_button_pb">
                        <button type="submit" class="btn btn-default savecrea"><img src="images/whitecart.png" class="img-responsive"/> Add to Basket</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="container_aboutme filtersec container">
         <!--About me content -->
         <div class="row">
            <div class="col-sm-12 col-lg-7">
               <div class="about_cont">
                  <h3>Item Details</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                     dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                     ex ea commodo consequat.
                  </p>
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                     Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                     est laborum.
                  </p>
               </div>
               <!--video carousel -->
               <div class="reviews_all">
                  <h3>Reviews</h3>
                  <div class="rev1">
                     <p class="title">Name Surname <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star notactive" aria-hidden="true"></i> <span>16th May 2019</span></p>
                    <p>Aenean fermentum tortor quis egestas venenatis. Vivamus pretium quis turpis ut luctus. Vestibulum ac eros ac est egestas pharetra. Mauris cursus justo ornare felis feugiat mattis. Vivamus eu diam arcu. Integer ut leo commodo dolor
                        elementum iaculis. </p>
                    <p>Sed id imperdiet arcu, et malesuada ex. Sed bibendum mi vitae congue tempus. Phasellus posuere odio in lacinia tincidunt. Nullam eget purus urna. Nunc nec pretium purus. Vestibulum pulvinar ac eros sed tempor. Quisque dictum volutpat
                        scelerisque. In imperdiet ipsum vel rhoncus dignissim.</p>
            </div>
            <div class="rev2">
                <p class="title">Name Surname <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star notactive" aria-hidden="true"></i>                    <span>14th May 2019</span></p>
                <p>Aenean fermentum tortor quis egestas venenatis. Vivamus pretium quis turpis ut luctus. Vestibulum ac eros ac est egestas pharetra. Mauris cursus justo ornare felis feugiat mattis. Vivamus eu diam arcu. Integer ut leo commodo dolor elementum
                    iaculis. </p>
                <p>Sed id imperdiet arcu, et malesuada ex. Sed bibendum mi vitae congue tempus. Phasellus posuere odio in lacinia tincidunt. Nullam eget purus urna. Nunc nec pretium purus. Vestibulum pulvinar ac eros sed tempor. Quisque dictum volutpat scelerisque.
                    In imperdiet ipsum vel rhoncus dignissim.</p>
            </div>
            <section class="hidden_reviews">
                <div class="rev3">
                    <p class="title">Name Surname <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star notactive" aria-hidden="true"></i> <i class="fa fa-star notactive"
                            aria-hidden="true"></i> <span>12th May 2019</span></p>
                    <p>Aenean fermentum tortor quis egestas venenatis. Vivamus pretium quis turpis ut luctus. Vestibulum ac eros ac est egestas pharetra. Mauris cursus justo ornare felis feugiat mattis. Vivamus eu diam arcu. Integer ut leo commodo dolor
                        elementum iaculis. </p>
                    <p>Sed id imperdiet arcu, et malesuada ex. Sed bibendum mi vitae congue tempus. Phasellus posuere odio in lacinia tincidunt. Nullam eget purus urna. Nunc nec pretium purus. Vestibulum pulvinar ac eros sed tempor. Quisque dictum volutpat
                        scelerisque. In imperdiet ipsum vel rhoncus dignissim.</p>
                </div>
            </section>
            <p class="read_mo">Read More <i class="fa fa-plus" aria-hidden="true"></i></p>
        </div>
        <!--video carousel -->
    </div>
    <div class="col-sm-12 col-lg-5">
        <div class="stats_sociallink">
            <div class="sizing">
                <p class="title">SIZING</p>
                <div class="pro_size">
                    <p>Size:</p>
                    <p>S</p>
                    <p>M</p>
                    <p>L</p>
                    <p>XL</p>
                    <p>XXL</p>
                </div>
                <div class="pro_uk">
                    <p>UK:</p>
                    <p>6 - 8</p>
                    <p>10</p>
                    <p>12</p>
                    <p>14</p>
                    <p>16 - 18</p>
                </div>
            </div>
            <div class="stats">
                <p class="title">Material</p>
                <ul>
                    <li>In vel mollis ex, in lobortis nisi</li>
                    <li>Fusce maximus eleifend eros, at porta augue tempus </li>
                    <li>Fusce maximus eleifend eros, at porta augue tempus </li>
                    <li>In ligula massa, placerat id ornare et, rhoncus et urna</li>
                    <li>Maecenas pharetra eget est ut tristique</li>
                    <li>Integer risus quam, pellentesque vel tortor tincidunt</li>
                </ul>
            </div>
            <div class="stats_para">
                <p class="title">Cras tincidunt aliquet</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
            </div>
        </div>
    </div>
    </div>
    <!--About me content -->
    <!--Best seller carousel -->
    <div class="container filtersec anotherfilter">
        <div class="row">
            <div class="col-sm-5 col-xs-6 rp">
                <h3>Related Product</h3>
            </div>
            <div class="col-sm-2 col-xs-6 filerby pull-right about_prod_p">
                <h3><a href="#">See all <span><img src="images/ar.png" width="10" height="11"/></span></a></h3>
            </div>
        </div>
    </div>
    <div class="container tshirt_sec probg_tshirt">
        <div class="row pp_cent">
            <div class="col-md-4 col-sm-6 pa_s">
                <div class="tshirt_cart add_bsk_btn">
                    <img src="images/tshirt3.png" class="img-responsive uploadimg" />
                    <a href="#" class="wishlisticon"><span ><i class="fa fa-heart-o heartin"></i></a>
                    <div class="price_cart">
                        <div class="row">
                            <div class="col-xs-7">
                                <p>Lorem Ispum Product Title</p>
                                <h4>£16.50</h4>
                            </div>
                            <div class="col-xs-5">
                                <a href="#" class="add_bsk"><img src="images/whitecart.png" class="img-responsive" /> Add <span>&nbsp;to Basket</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 pa_s">
                <div class="tshirt_cart add_bsk_btn">
                    <img src="images/tshirt4.png" class="img-responsive uploadimg" />
                    <a href="#" class="wishlisticon"><span ><i class="fa fa-heart-o heartin"></i></a>
                    <div class="price_cart">
                        <div class="row">
                            <div class="col-xs-7">
                                <p>Lorem Ispum Product Title</p>
                                <h4>£16.50</h4>
                            </div>
                            <div class="col-xs-5">
                                <a href="#" class="add_bsk"><img src="images/whitecart.png" class="img-responsive" /> Add <span>&nbsp;to Basket</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 pa_s">
                <div class="tshirt_cart add_bsk_btn">
                    <img src="images/tshirt5.png" class="img-responsive uploadimg" />
                    <a href="#" class="wishlisticon"><span ><i class="fa fa-heart-o heartin"></i></a>
                    <div class="price_cart">
                        <div class="row">
                            <div class="col-xs-7">
                                <p>Lorem Ispum Product Title</p>
                                <h4>£16.50</h4>
                            </div>
                            <div class="col-xs-5">
                                <a href="#" class="add_bsk"><img src="images/whitecart.png" class="img-responsive" /> Add <span>&nbsp;to Basket</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Best seller carousel -->
    </div>
    <!--About me -->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.rollingslider.js"></script>
    <script src="js/Carousel.js"></script>

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
    <!-- Footer Script End -->
@endsection