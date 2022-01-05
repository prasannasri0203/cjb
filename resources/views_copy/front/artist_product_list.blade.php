@extends('front.app')

@section('title', '')

@section('header_script')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <style type="text/css">
        .banner .item .caption.hlp_caption p {
            font-family: 'rubik-bold';
        }
        .pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 231px !important;
    border-radius: 4px;
}
    .sdrop_filter .clearall {
    color: #333;
    float: right;
    margin-top: -40px;
    margin-right: 5px;
    font-size: 15px;
    cursor: pointer;
}
.sdrop_filter .sclosedrop {
    cursor: pointer;
    color: #01aef0;
    font-size: 20px;
    position: absolute;
    right: 25px;
    top: 5px;
}

.drop_filters .clearall {
    color: #333;
    float: right;
    margin-top: -40px;
    margin-right: 5px;
    font-size: 15px;
    cursor: pointer;
}
.drop_filters .closedrops {
    cursor: pointer;
    color: #01aef0;
    font-size: 20px;
    position: absolute;
    right: 25px;
    top: 5px;
}
.wishlist
{
    color: #ed1277;
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
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')
<!--banner carousel -->
<div class="banner wishbanner">
            <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
                <div id="headcarouselid" class="carousel slide search_result_bann" data-ride="carousel">
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
                            <img src="{{ asset('images/resartist.png') }}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{{ asset('images/resartist.png') }}" class="mobile_banner" title="slidepicture" alt="slidepicture">
                            <div class="container">
                                <div class="caption hlp_caption ">
                                    <p> </p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!--banner carousel -->
        <div id="mymerchand" class="container filtersec firstfilter ws_order">
            <div class="row">
                <div class="col-sm-4 col-xs-7">
                    <h3>Product List</h3>
                </div>
            </div>
        </div>
        <div class="container tshirt_sec wishtshirt">
        <div class="row ipad_cent" id="filter_prod"> 
        @foreach($cat_image as $cat_value)
           
            <div class="col-md-4 col-sm-6 lee">
               <div class="tshirt_cart add_bsk_btn">
                    <a href="{{ URL('product_detail/'.$cat_value->id) }}">               
                  <img src="{{ $cat_value->merchProductImage[0]->image  ? asset('merchandise-img/').'/'.$cat_value->merchProductImage[0]->image : asset('/images/mug.png') }}" class="img-responsive uploadimg" />
                  </a>
                  <a href="#" class="wishlisticon"><span ><i class="fa fa-heart-o heartin"></i></a>
                  <div class="price_cart">
                     <div class="row">
                        <div class="col-xs-7">
                        <p class="theme">{{ $cat_value->merchandise_product_name}}</p>
                           <h4 class="theme">{{ currency($cat_value->product_price, 'GBP', session()->get('my_currency'))}}</h4>
                        </div>
                        <div class="col-xs-5">
                           <a href="#" class="add_bsk theme"><i class="fas fa-shopping-basket img-responsive themes themes" style="color:#fff;padding-right:5px;font-size:20px;" aria-hidden="true"></i> Add <span>&nbsp;to Basket</span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
         </div>
      </div>

@endsection

@section('footer_script')
    <!--Thanks popup-->
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

    var _token = "{{ csrf_token() }}";
    var cart_url = "{{ url('cart') }}";

     $('.add_bsk').click(function(e){
         e.preventDefault();
         merchandise_id = $(this).attr('data_id')
        $.ajax({
            type: "POST",
            url: "{{ url('/add-to-cart/store') }}",        
            data: {
                    product_id: merchandise_id,  _token : _token,
                }, 
            success: function (data) {
                  if(data.status == 'success')
                  {
                    $('.cart_count').html(data.item_count);
                    $('.cart_count_a').attr('href',cart_url)
                    iziToast.success({ title: 'Success', message: 'Product added to cart successfully', position: 'topRight', });
                  }
                  if(data.status == 'error')
                  {
                    iziToast.error({ title: 'Error', message: 'out of stock', position: 'topRight', });
                  }
                 if(data.status == 'auth')
                  {
                    iziToast.error({ title: 'Error', message: 'Artist not able to add product to cart', position: 'topRight', });
                  }
                  
              },
            error: function (data) {
                console.log('Error:', data);
                iziToast.error({ title: 'Error', message: 'out of stock', position: 'topRight', });
            }
        });
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
    @endsection