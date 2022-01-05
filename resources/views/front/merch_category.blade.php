@extends('front.app')

@section('title', 'Merch')

@section('header_script')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
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
    <style>
    .filter-right{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-right: 40px;
    margin-bottom:10px;
    }
    select#status_val {
    background: url(http://127.0.0.1:8000/images/affiliate_images/down-arrow.jpg) no-repeat 95%;
    }
    .filt-inner.custom_cat_wr {
    display: flex !important;
    align-items: center;
    }
    .filter-right span{
    margin: 0px 10px;
    }
    @media only screen and (min-width:320px) and (max-width:425px){
        .filter-right {display: block;margin-left: 20px;}
        .filt-inner.custom_cat_wr,.clear_all {margin-left:20px;margin-bottom:10px;}
    }
    </style>
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')
        <!--banner carousel -->
        <div class="banner">
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
                            <img src="{{ asset('images/merch_banner.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/merch_banner_mbl.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p>Have a look at our range of merchandise adipiscing elit sed do eiusmod tempor</p>
                                    <div class="advertise_btn">
                                        <!-- <a href="#">Register Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/merch_banner.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/merch_banner_mbl.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p>Have a look at our range of merchandise adipiscing elit sed do eiusmod tempor</p>
                                    <div class="advertise_btn">
                                        <!-- <a href="#">Register Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/merch_banner.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/merch_banner_mbl.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p>Have a look at our range of merchandise adipiscing elit sed do eiusmod tempor</p>
                                    <div class="advertise_btn">
                                        <!-- <a href="#">Register Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="{{ asset('images/merch_banner.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/merch_banner_mbl.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p>Need some help? Adipiscing elit sed do eiusmod tempor unde omnis iste natus</p>
                                    <div class="advertise_btn">
                                        <!-- <a href="#">Register Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!--banner carousel -->

        <!--Merchandise Block -->
        @if(count($category) > 0)

        <div id="mymerchand" class="merchandise-blk m_tlt">
            <div class="container filtersec firstfilter ws_order">
                <div class="row">
                    <div class="col-sm-4 col-xs-7">
                        <h3>Categories</h3>
                    </div>
                </div>
            </div>

             <!-- filter start -->
             <!-- <form id="order_filter_form"  action="{{ route('merch_search_list') }}" method="POST" >
                                    @csrf
                <div class="filter-right">
                    <div class="filt-inner fil-by"><img src="{{asset('images/filtfilt.png')}}">
                        <span>Filter By:</span></div>

                        <div class="filt-inner custom_cat_wr">
                            <span>Catagory:</span>
                            <select class="form-control" id="status_val" name="status_val">

                                    <option value=" ">select</option>
                                    @foreach($cat_list as $list)
                                    <option value="{{ @$list->id }}" {{ (@$choosen['status_val'] == @$list->id) ? 'selected' :'' }} >{{ @$list->category_name}}</option>
                                    @endforeach
                            </select> -->
                            <!-- <img src="{{ url('images/affiliate_images/down-arrow.jpg') }}" class="dwn-img"> -->
                        <!-- </div>

                        <div class="clear_all">
                            <span >Clear All:</span>
                                    <input type="hidden" name="clear" id="clear" value=""> -->
                                  <!--   <a href="javascript:void(0);" data_id="reset" id="reset" class="reset">Reset</a> -->
                                    <!-- <a href="{{url('merch_category')}}" data_id="reset"  >Reset</a> -->
                                <!-- </h3> -->
                       <!--  </div>
                </div>
            </form> -->
                    <!-- filter end -->



            <div class="container tshirt_sec merch-prod">
                <div class="row">
                    @foreach($category as $catvalue)
                    <div class="col-md-4 col-sm-6">
                        <div class="tshirt_cart">
                            <a href="{{ URL('merch_sub_category/'.$catvalue->id) }}">
                            <img src="{{ $catvalue->category_image  ? asset('category/').'/'.$catvalue->category_image : asset('/images/mug.png') }}" class="img-responsive uploadimg">
                            </a>
                            <div class="price_cart">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p>{{ ucfirst($catvalue->category_name) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <!--Merchandise Block -->

@endsection

@section('footer_script')

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

         //search functionality
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
@endsection
