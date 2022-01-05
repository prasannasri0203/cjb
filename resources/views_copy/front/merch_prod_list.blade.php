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

.sdrop_filter {
    position: absolute;
    z-index: 999;
    top: -11px;
}
.drop_filters {
    position: absolute;
    z-index: 999;
    top: -11px;
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
                            <img src="{!! asset('images/resartist.png')  !!}" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                            <img src="{!! asset('images/resartist.png')  !!}" class="mobile_banner" title="slidepicture" alt="slidepicture">
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
        <!-- <form action="{!! URL('merchandise_product_list')  !!}" method="post">
        {!! csrf_field() !!} -->
        <div id="mymerchand" class="container filtersec firstfilter ws_order">
            <div class="row">
                <div class="col-sm-4 col-xs-7">
                    <h3>Product List</h3>
                </div>
                <div class="col-sm-8 col-xs-5 filerby pull-right ordfilt">
                    <h3 id="mob_filtee" class="mob_filt">
                        <i class="fa fa-filter"></i> Filter</h3>
                    <h3>
                        <img src="{!! asset('images/filtfilt.png')  !!}" /> Filter By:</h3>
                    <h3 class="cate">Category:
                        <span>All
                            <img src="{!! asset('images/filtdrop.png')  !!}"/>
                        </span>
                    </h3>
                    <h3 class="size">Name:
                        <span>All
                        <img src="{!! asset('images/filtdrop.png')  !!}"/>
                    </span>
                    </h3>
                    <h3 class="sort">Sort by:
                        <span>Best Sellers
                        <img src="{!! asset('images/filtdrop.png')  !!}"/>
                    </span>
                    </h3>
                </div>
            </div>
            <div id="seller_common_wrapp" class="row mob_dro mob_ipad_dro">
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
                        </li>
                    </ul>
                </form>
                <a class="mobclearall">Clear all
                    <img src="{!! asset('images/refresh.png')  !!}" />
                </a>
                <button class="btn applybtn">APPLY</button>
            </div>
        </div>
        <form method="GET" action="{{ url('/merchandise_product_list') }}" id="merch_filter_form">
        @csrf      
        <div class="row dro">
            <div class="col-sm-12 drop_filter">
                <i class="fa fa-times-circle closedrop"></i>
                <ul class="filter_drop" id="cat_fil">
                @foreach($get_cat as $product_names)
                            <li>
                                <input type="checkbox" name="merchandise_product_name[]" class="form-control" id="{{$product_names->category_name}}" value="{{$product_names->category_name}}">
                                <label for="{{$product_names->category_name}}"> {{$product_names->category_name}}</label>
                            </li>
                @endforeach
                </ul>
                <a class="clearall">Clear all
                    <img src="{{ asset('images/refresh.png') }}" />
                </a>
            </div>
        </div>

        <div class="row dro">
            <div class="col-sm-12 sdrop_filter">
                <i class="fa fa-times-circle sclosedrop"></i>
                <ul class="filter_drop" id="fil_drp">
                @foreach($user as $user_name)
                                    <li>
                                        <input type="checkbox" name="artist_id[]" class="form-control" id="{{$user_name->id}}" value="{{$user_name->id}}">
                                        <label for="{{$user_name->id}}">{{$user_name->name}}
                                        </label>
                                    </li>
                @endforeach
                </ul>
                <a class="clearall">Clear all
                    <img src="{{ asset('images/refresh.png') }}" />
                </a>
            </div>
        </div>
        <div class="row dro">
            <div class="col-sm-12 drop_filters">
                <i class="fa fa-times-circle closedrops"></i>
        <ul class="filter_drop" id="sort_by">
                            <li>
                                <input type="checkbox" name="product_value" class="form-control" id="recent" value="0">
                                <label for="recent">Recent</label>
                                <input type="checkbox" name="product_value" class="form-control" id="low" value="1">
                                <label for="low">Low To High</label>
                                <input type="checkbox" name="product_value" class="form-control" id="high" value="2">
                                <label for="high">High To Low</label>
                            </li>
                </ul>
                <a class="clearall">Clear all
                    <img src="{{ asset('images/refresh.png') }}" />
                </a>
            </div>
        </div>
        </form>
    </div>

    
    <!-- <input type="submit" id="fill_sub">
</form> -->
    <div class="container tshirt_sec wishtshirt">
        <div class="row ipad_cent" id="filter_prod"> 
        @foreach($product as $product_list)
            <div class="col-md-4 col-sm-6 ipad_lee filter_product_image" >
                <div class="tshirt_cart add_bsk_btn">
                    <a href="{!! URL('product_detail/'.$product_list->id) !!}">
                        <img src="{!! $product_list['image']  ? asset('merchandise-img/').'/'.$product_list['image'] : asset('/images/mug.png') !!}" class="img-responsive uploadimg" />
                    </a>
                    <a class="wishlisticon" id="wishlist" href='javascript:;'  data-data="{!! $product_list->merch_product_id !!}">
                        <input type="hidden" name="merch_product_id" value="{!! $product_list->merch_product_id !!}">
                        <span>
                            <i class="fa fa-heart-o whishstate"></i>
                        </span>
                    </a>
                    <div class="price_cart">
                        <div class="row">
                            @if($product_list->merch_image)
                            <div class="col-xs-7">
                                <p>{!! ucfirst($product_list->merch_image->merchandise_product_name)!!}</p>
                                <h4>{!! currency($product_list->merch_image->product_price, 'GBP', session()->get('my_currency')) !!}</h4>
                            </div>
                            @endif
                            <div class="col-xs-5">
                                <a href="javascript:void(0);" data_id="{!! $product_list->merch_product_id !!}" class="add_bsk">
                                    <img src="{!! asset('images/whitecart.png') !!}" class="img-responsive" /><small> Add</small>
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
        <div class="col-md-12 col-sm-12 pagination">  
            <ul class="pagination pagination">    
                    {{ $product->links() }}
            </ul>
        </div>
    </div>
@endsection

@section('footer_script')
    <!--Thanks popup-->
    <script src="{!! asset('js/jquery-2.2.3.min.js')  !!}"></script>
    <script src="{!! asset('js/bootstrap.js')  !!}"></script>
    <script src="{!! asset('js/jquery.rollingslider.js')  !!}"></script>
    <script src="{!! asset('js/Carousel.js')  !!}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

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
            $(document).ready(function() {
                $( "#cat_fil , #fil_drp , #sort_by").change(function(e) {
                e.preventDefault();
                $(this).toggleClass("active");
                $( "#merch_filter_form" ).submit();
                });
            });
        </script>
<script>
        $(".wishlisticon").on('click', function(evt) {
        var link_data = $(this).data('data');
        var this_button_icon = $(this).find("i");
        var baseurl = "{{url('/')}}";
        $.ajax({
          type: "POST",
          url: baseurl+"/wishlistadd",
          data: {
            "_token": "{{ csrf_token() }}",
              merch_product_id: link_data},
          success: function(status) {
              console.log(status);
               if(status == "1")
               {
                this_button_icon.removeClass("fa fa-heart-o").addClass("fa fa-heart");
                iziToast.success({ title: 'Success', message: 'Product added to wishlist successfully', position: 'topRight', });

               }
               if(status == "0"){
                this_button_icon.removeClass("fa fa-heart").addClass("fa fa-heart-o");
                iziToast.error({ title: 'Error', message: 'Product removed from wishlist successfully', position: 'topRight', });

               }
               else
               {
                iziToast.error({ title: 'Error', message: 'kindly login to add product to your persnolised whilist', position: 'topRight', });
               }
          }   
       });   
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
            $(".size").removeClass("togsize");
            $(".sort").removeClass("togsort");
            $('.sdrop_filter').hide();
            $('.drop_filters').hide();
        });

        $(".sclosedrop").click(function() {
            $(".sdrop_filter").slideToggle();
            $(".size").removeClass("togsize");

        });

        $(".sdrop_filter").hide();

        $(".size").click(function() {
            $(".sdrop_filter").slideToggle();
        });

        $(".size").click(function() {
            $(".size").toggleClass("togsize");
            $(".cate").removeClass("togcate");
            $(".sort").removeClass("togsort");
            $('.drop_filter').hide();
            $('.drop_filters').hide();
        });

        $(".closedrops").click(function() {
            $(".drop_filters").slideToggle();
            $(".sort").removeClass("togsort");
        });

        $(".drop_filters").hide();

        $(".sort").click(function() {
            $(".drop_filters").slideToggle();
        });

        $(".sort").click(function() {
            $(".sort").toggleClass("togsort");
            $(".cate").removeClass("togcate");
            $(".size").removeClass("togsize");
            $('.drop_filter').hide();
            $('.sdrop_filter').hide();
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