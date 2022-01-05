@extends('front.app')

@section('title', 'Artists Shop')

@section('header_script')
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.default.css') }}">
    <style type="text/css">

        @media only screen and (min-width:320px) and (max-width:900px) and (orientation: landscape) {
            #demos {
                padding-left: 30px;
                padding-right: 30px;
            }
        }

        .filt-inner img.dwn-img {
            position: relative;
            right: 30px;
            top:7px;
        }
        .restshirt.tshirt_sec .tshirt_cart .price_cart .restex a.add_bsk {
    display: block;
    margin: 0px auto;
    text-align: center;
}
.restshirt.tshirt_sec .tshirt_cart .price_cart .restex a.add_bsk p  {
    margin-top:0;
    padding-left:0;
}

.filt-inner img {
    height: 11px;
    margin: 10px;
}

.filter-right {
    display: flex;
    width: 100%;
    align-items: center;
    padding: 10px;
}

select#status_val {
    margin-left: 10px;
}
.filt-inner span {
    margin: 7px;
}
.filt-inner {
    width: 300px;
    max-width:100%;
    display: flex;
}
.custom_cat_wr{
    width: 100%;
    max-width: 300px;
}
.filt-inner.fil-by {
    width: 105px;
}
span.page-link {
    margin: 0px 5px;
}
@media only screen and (max-width: 767px){
#demos .owl-nav .owl-next {
    background-size: 30px !important;
    right: -47px !important;
}
}
@media only screen and (min-width: 320px) and (max-width: 767px){
    .filter-right {display: block;}
    .clear_all {
    margin-top: 10px;
    margin-left: 10px;
    }
    .tshirt_sec .tshirt_cart .price_cart a {width: auto!important;}
}
form#order_filter_form {
    margin-top: 15px;
    margin-bottom: 15px;
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
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')
        <!--banner carousel -->
        <div class="banner wishbanner">
            <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
                <div id="headcarouselid" class="carousel slide merch_content" data-ride="carousel">
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
                            <img src="images/artist-shop.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="images/artist-shop.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption">
                                    <p>{{ __('artist_list.Artists Shops') }}  </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!--banner carousel -->
        <div class="container"><div class="row">
        <!-- filter start -->
        <form id="order_filter_form"  action="{{ route('artist_search_list') }}" method="POST" >
                                    @csrf
                            <div class="filter-right">
                                <div class="filt-inner fil-by"><img src="./images/filtfilt.png">
                                    <span>Filter By:</span></div>

                                    <div class="filt-inner custom_cat_wr">
                                        <span>Catagory:</span>
                                        <select class="form-control" id="status_val" name="status_val">

                                                <option value=" ">select</option>
                                                @foreach($cat_list as $list)
                                                <option value="{{ @$list->id }}" {{ (@$choosen['status_val'] == @$list->id) ? 'selected' :'' }} >{{ @$list->category_name}}</option>
                                                @endforeach
                                        </select>
                                        <img src="{{ url('images/affiliate_images/down-arrow.jpg') }}" class="dwn-img">
                                    </div>


                                    <div class="clear_all">
                                        <span >Clear All:</span>
                                                <input type="hidden" name="clear" id="clear" value="">
                                                <a href="javascript:void(0);" data_id="reset" id="reset" class="reset">Reset</a>
                                            <!-- </h3> -->
                                    </div>
                            </div>
                        </form>
        <!-- filter end -->
        </div></div>
        @if(count($data) >= 3)
        <div class="container filtersec firstfilter ws_order">
            <div class="row">
                <div class="col-sm-4 col-xs-7">
                    <h3>{{ __('artist_list.Best Sellers') }}</h3>
                </div>
            </div>
        </div>

    <section id="demos" class="container ws_ordershop ws_ordershop">
        <div class="row">
           <div class="col-lg-12">
              <div id="myside_filter" class="owl-carousel owl-theme tshirt_sec owl-loaded owl-drag restshirt">


              <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-833px, 0px, 0px); transition: all 0.25s ease 0s; width: 2084px;">
              @foreach($data as $value)
              <div class="owl-item" style="width: 396.667px; margin-right: 20px;"><div class="item">
                    <div class="tshirt_cart">
                    @php
                        $user = App\User::where('id',$value->artist_id)->first();

                    @endphp
                    <!-- <img src="{{asset('images/userimg.png') }}" class="img-responsive uploadimg" /> -->

                     <img src="{{ @$user->profile_image ? asset('profile/').'/'.@$user->profile_image : asset('images/userimg.png') }}" class="img-responsive uploadimg" />
                    
                       <div class="price_cart">
                        <div class="row">
                            <div class="col-xs-12 restex">
                            <img src="{{ @$user->profile_image ? asset('profile/').'/'.@$user->profile_image : asset('images/userimg.png') }}" class="img-responsive uploadimg">

                           <a href="{{ URL('shop/'.@$user->name) }}" class="add_bsk">
                                <p>{{ @$user->name }}</p></a>

                            </div>
                        </div>
                    </div>
                    </div>
                 </div></div>
                 @endforeach
                 </div></div><div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next disabled"><span aria-label="Next">›</span></button></div><div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button></div></div>
           </div>
        </div>
     </section>
     @endif
     @if(count($artist_list) > 0)
    <div class="container filtersec firstfilter shop_rc">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h3>{{ __('artist_list.Artist List') }}</h3>
                </div>

            </div>


    </div>
        <div class="container tshirt_sec wishtshirt restshirt ws_ordershop">

        <div class="row ipad_cent">
            
        @foreach($artist_list as $artist)
            <div class="col-md-4 col-sm-6 ipad_lee">
                <div class="tshirt_cart">
                    <!-- <img src="{{ asset('images/girlres.png') }}" class="img-responsive uploadimg" /> -->
                     <img src="{{ @$artist->profile_image  ? asset('profile/').'/'.@$artist->profile_image : asset('images/girlres.png') }}" class="img-responsive uploadimg" />
                    <div class="price_cart">
                        <div class="row">
                            <div class="col-xs-12 restex">
                            <img src="{{ @$artist->profile_image  ? asset('profile/').'/'.@$artist->profile_image : asset('/images/userimg.png') }}" class="img-responsive uploadimg" />
                                <a href="{{ URL('shop/'.$artist->name) }}" class="add_bsk">
                                <p>{{$artist->name}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
</div>

@endif
<div class="col-md-12 col-sm-12 pager">
            {{ $artist_list->links() }}
        </div>
  
@endsection

@section('footer_script')
        <!--footer-->

    <!--login popup-->
    <!--Thanks popup-->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.rollingslider.js') }}"></script>
    <script src="{{ asset('js/Carousel.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
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
                        items: 2,
                        nav: true
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: false,

                    }
                }
            })


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


            // $(".navbar-toggle").click(function() {
            //     $("#myNavbar").slideToggle();
            // });

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
        // search functionality
        $(document).ready(function() {



            $( "#status_val , #sort_by").change(function(e) {
                e.preventDefault();
                $( "#order_filter_form" ).submit();
            });

            $( "#reset").click(function(e) {
                e.preventDefault();
                $('#clear').val(1);
                $( "#order_filter_form" ).submit();
            });

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
            submitIcon.mouseup(function() {
                return false;
            });
            searchBox.mouseup(function() {
                return false;
            });
            $(document).mouseup(function() {
                if (isOpen == true) {
                    $('.searchbox-icon').css('display', 'block');
                    submitIcon.click();
                }
            });
        });
    </script>
    <!-- thanks -->
    @endsection
