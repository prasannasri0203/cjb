@extends('front.app')

@section('title', '')

@section('header_script')
    <!-- Header Script Start -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!--5d slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-responsiveGallery.css') }}">
    <!--5d slider css-->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script>

    <link rel="stylesheet" href="{{ asset('css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.default.css') }}">
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!--5d slider js-->
    <script type="text/javascript" src="{{ asset('js/modernizr.custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.responsiveGallery.js') }}"></script>

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

        <!--Page Content Start-->
        <!--banner carousel -->
          <!--banner carousel -->
          <div class="banner wishbanner">
            <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
                <div id="headcarouselid" class="carousel slide wishlist_item_bann" data-ride="carousel">
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
                            <img src="{{ asset('images/wishlist.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/wishlist.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p>Your wishlist... Excepteur sint occaecat cupidatat non proident.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!--banner carousel -->
       

        <!--video carousel -->
        <div id="mymerchand" class="container filtersec firstfilter ws_order">
            <div class="row">
                <div class="col-sm-4 col-xs-7">
                    <h3>Wishlist</h3>
                </div>
                <div class="col-sm-8 col-xs-5 filerby pull-right ordfilt">
                    <h3 id="mob_filtee" class="mob_filt">
                        <i class="fa fa-filter"></i> Filter</h3>
                    <h3>
                        <img src="images/filtfilt.png" /> Filter By:</h3>
                    <h3 class="cate">Category:
                        <span>All
                        <img src="images/filtdrop.png"/></span>
                    </h3>
                    <h3>Size:
                        <span>All
                        <img src="images/filtdrop.png"/>
                    </span>
                    </h3>
                    <h3>Sort by:
                        <span>Best Sellers
                        <img src="images/filtdrop.png"/>
                    </span>
                    </h3>
                </div>
            </div>
            <div id="seller_common_wrapp" class="row mob_dro">
                <div class="col-sm-12 mob_drop_filter">
                    <h3>Sort By:</h3>
                    <form>
                        <select class="form-control" id="sel1">
                        <option>Most Recent</option>
                        <option>Yesterday</option>
                        <option>Last Month</option>
                        <option>Popular</option>
                    </select>
                        <h3>Size:</h3>
                        <ul class="filter_drop">
                            <li>
                                <input type="checkbox" class="form-control" id="xxl1">
                                <label for="xxl1">XXL</label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="xxl2">
                                <label for="xxl2" class="active">XXL</label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="xxl3">
                                <label for="xxl3">XXL</label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="xxl4">
                                <label for="xxl4">XXL</label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="xxl5">
                                <label for="xxl5" class="active">XXL</label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="xxl6">
                                <label for="xxl6">XXL</label>
                            </li>
                        </ul>
                        <h3>Category:</h3>
                        <ul class="filter_drop">
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">T-shirts
                                <span>[6]</span>
                            </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Hoodies
                                <span>[4]</span>
                            </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt" class="active">Baseball Caps
                                <span>[2]</span>
                            </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt" class="active">Mugs
                                <span>[12]</span>
                            </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Coasters
                                <span>[20]</span>
                            </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt" class="active">Phone Covers
                                <span>[3]</span>
                            </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Wall Art
                                <span>[16]</span>
                            </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Postcards
                                <span>[8]</span>
                            </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Baby Grows
                                <span>[8]</span>
                            </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">
                                Lorem ipsum
                                <span>[14]</span>
                                </label>
                        </li>
                    </ul>
                </form>
                <a class="mobclearall">Clear all
                    <img src="images/refresh.png" />
                </a>
                <button class="btn applybtn">APPLY</button>
            </div>
        </div>
        <div class="row dro">
            <div class="col-sm-12 drop_filter">
                <i class="fa fa-times-circle closedrop"></i>
                <ul class="filter_drop">
                    <li>
                        <input type="checkbox" class="form-control" id="tshirt">
                        <label for="tshirt">T-shirts
                            <span>[6]</span>
                        </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Hoodies
                            <span>[4]</span>
                        </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt" class="active">Baseball Caps
                            <span>[2]</span>
                        </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt" class="active">Mugs
                            <span>[12]</span>
                        </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Coasters
                            <span>[20]</span>
                        </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt" class="active">Phone Covers
                            <span>[3]</span>
                        </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Wall Art
                            <span>[16]</span>
                        </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Postcards
                            <span>[8]</span>
                        </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Baby Grows
                            <span>[8]</span>
                        </label>
                            </li>
                            <li>
                                <input type="checkbox" class="form-control" id="tshirt">
                                <label for="tshirt">Lorem ipsum
                            <span>[14]</span>
                            </label>
                    </li>
                </ul>
                <a class="clearall">Clear all
                    <img src="images/refresh.png" />
                </a>
            </div>
        </div>
    </div>

    <div class="container tshirt_sec wishtshirt wishlist-tr">
        <div class="row ipad_cent">
        @foreach($data as $value)
            <div class="col-md-4 col-sm-6 ipad_lee">
                <div class="tshirt_cart add_bsk_btn">
                @php
                $image = App\MerchandiseProductImages::where('merch_product_id',$value->id)->first();
                @endphp
                    <img src="{{ $image['image']  ? asset('merchandise-img/').'/'.$image['image'] : asset('/images/mug.png') }}" class="img-responsive uploadimg" />
                    <a class="wishlisticon">
                        <span>
                            <i onclick="return wishlistadd(1)" class="fa fa-heart heartin"></i>
                        </span>
                    </a>
                    <div class="price_cart">
                        <div class="row">
                            <div class="col-xs-7">
                            @php
                            $proct_name = App\MerchandiseProduct::where('id',$value->id)->first();
                            @endphp
                                <p>{{ $proct_name->merchandise_product_name}}</p>
                                <h4>{{ $proct_name->product_price}}</h4>
                            </div>
                            <div class="col-xs-5">
                                <a href="#" class="add_bsk">
                                    <img src="{{ asset('images/whitecart.png') }}" class="img-responsive" /><small> Add</small>
                                    <span>&nbsp;to Basket</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
<div class="row">
<div class="col-md-12 col-sm-12 pager">
  {{ $data->links() }}

</div>
</div>
    <!-- </section> -->
        <!--video carousel -->
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.rollingslider.js') }}"></script>
    <script src="{{ asset('js/Carousel.js') }}"></script>

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

    <script>
          function wishlistadd(id){
         
            $.ajax({
           type: 'POST',
       url: "{{route('wishlistadd')}}",
      data: { 
        'merch_product_id': id,"_token": "{{ csrf_token() }}",
    },
    success: function(status){
      console.log(status);
 }
});
          }
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
    <!-- thanks -->
    <!-- Footer Script End -->
@endsection