@extends('front.app')

@section('title', '')

@section('header_script')
    <!-- Header Script Start -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.default.css') }}">
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <style type="text/css">
        @media only screen and (max-width: 767px) and (min-width: 320px) {
            .filtersec .filerby h3 {
                margin: 25px 0px;
            }
        }
        
        @media only screen and (min-width:320px) and (max-width:900px) and (orientation: landscape) {
            #demos {
                padding-left: 30px;
                padding-right: 30px;
            }
        }
   
         .theme{
            font-size: {{$theme->font_size}}px !important;
            color:{{$theme->font_colour}} !important;
            font-family: {{$theme->font_family}} !important;
        }
        .price_cart{
          background-color: {{$theme->content_layer_colour}} !important;
        }
        .themes{
            color: {{$theme->cart_colour}} !important;
        }
   
        .newbanner{
            background: #fff;
            background-size: initial;
            height: 370px;
            background-position: center;
            background-repeat: no-repeat;
            margin-top: 0px;
            position: relative;
            margin-bottom: 90px;
            width: 100%;
        }

        .mob_dro .applybtn {
    background: #ed1278;
    color: white;
    padding: 10px 25px;
    border-radius: 100px;
    margin-left: 25px;
    font-family: "Rubik-Regular";
    font-size: 16px;
    font-weight: 700;
    letter-spacing: 1px;
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

    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')

<!--Page Content Start-->
    <section class="artist_header">
        <img src="{!! $theme->banner_image ? asset('images/').'/'.$theme->banner_image : asset('profile/artist-default-bg.png') !!}" class="newbanner" alt="">
        <div class="container user_contain">
            <div class="row">
                <div class="col-sm-4 user_info">
                <a href="Logged_In_edit.html">
                <img src="{{ $user->profile_image  ? asset('profile/').'/'.$user->profile_image : asset('images/userimg.png') }}" class="img-responsive user_img" />
                </a>
                    <h2 class="theme">{!!$user->name!!}</h2>
                </div>
                <div class="col-md-3 col-sm-5 pull-right tab-li">
                    <ul>
                        <li class="active"><a class="theme" href="#">{!! __('artist_shop.SHOP') !!}</a></li>
                        <li><a class="theme" href="{!! URL('artist/'.$user->name) !!}">{!! __('artist_shop.ABOUT ME') !!}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--shop-->
    <div id="merch_start" class="container filtersec firstfilter  ws_order container_default_custom content_fillself">
        <div class="row">
            @if(count($best_artist) > 0)
            <div class="col-sm-4 col-xs-7">
                <h3 class="art-pg">Best Product</h3>
            </div>
            @endif
            <div id="search_wall" class="col-sm-8 col-xs-5 filerby pull-right ordfilt">
                <h3 class="mob_filt">
                    <i class="fa fa-filter" aria-hidden="true"></i> Filter</h3>
                <h3>
                    <i class="fa fa-filter" aria-hidden="true"></i> Filter By:</h3>
                <h3 class="cate">Category:
                    <span>All
                     <img src="{!! asset('images/filtdrop.png') !!}"/>
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
                        <li><input type="checkbox" class="form-control" id="xxl1"> <label for="xxl1">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl2"> <label for="xxl2" class="active">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl3"> <label for="xxl3">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl4"> <label for="xxl4">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl5"> <label for="xxl5" class="active">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl6"> <label for="xxl6">XXL</label></li>
                    </ul>
                    <h3>Category:</h3>
                    <ul class="filter_drop">
                        <li><input type="checkbox" class="form-control" id="tshirt"> <label for="tshirt">T-shirts <span>[6]</span></label></li>
                        <li><input type="checkbox" class="form-control" id="tshirt"> <label for="tshirt">Hoodies <span>[4]</span></label></li>
                        <li><input type="checkbox" class="form-control" id="tshirt"> <label for="tshirt" class="active">Baseball Caps <span>[2]</span></label></li>
                        <li><input type="checkbox" class="form-control" id="tshirt"> <label for="tshirt" class="active">Mugs <span>[12]</span></label></li>
                        <li><input type="checkbox" class="form-control" id="tshirt"> <label for="tshirt">Coasters <span>[20]</span></label></li>
                        <li><input type="checkbox" class="form-control" id="tshirt"> <label for="tshirt" class="active">Phone Covers <span>[3]</span></label></li>
                        <li><input type="checkbox" class="form-control" id="tshirt"> <label for="tshirt">Wall Art <span>[16]</span></label></li>
                        <li><input type="checkbox" class="form-control" id="tshirt"> <label for="tshirt">Postcards <span>[8]</span></label></li>
                        <li><input type="checkbox" class="form-control" id="tshirt"> <label for="tshirt">Baby Grows <span>[8]</span></label></li>
                        <li>
                            <input type="checkbox" class="form-control" id="tshirt">
                            <label for="tshirt">
                          Lorem ipsum <span>[14]</span>
                    </li>
                 </ul>
              </form>
              <a class="mobclearall">Clear all <img src="{!! asset('images/refresh.png') !!}"/></a>
              <button class="btn applybtn">APPLY</button>
           </div>
        </div>
        <form method="GET" action="{!! url('/shop').'/'.$user->name !!}" id="merch_filter_form">
        @csrf      
        <div class="row dro">
            <div class="col-sm-12 drop_filter">
                <i class="fa fa-times-circle closedrop"></i>
                <ul class="filter_drop" id="cat_fil">
                @foreach($get_cat as $product_names)
                            <li>
                                <input type="checkbox" name="merchandise_product_name[]" class="form-control" id="{!!$product_names->category_name !!}" value="{!!$product_names->category_name !!}">
                                <label for="{!!$product_names->category_name !!}"> {!!$product_names->category_name !!}</label>
                            </li>
                @endforeach
                </ul>
                <a class="clearall">Clear all
                    <img src="{!! asset('images/refresh.png') !!}" />
                </a>
            </div>
        </div>
      </form>
     </div>
     @if(count($best_artist) > 0)
      <section id="demos" class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="owl-carousel owl-theme tshirt_sec">
               @foreach($best_artist as $product_value)
                  <div class="item">
                    <div class="tshirt_cart add_bsk_btn 1">
                       <a href="{{ URL('product_detail/'.$product_value->product_id) }}">
                        <img src="{!! $product_value->image  ? asset('merchandise-img/').'/'.$product_value->image : asset('/images/mug.png') !!}" class="img-responsive uploadimg" />
                       </a>
                        <div class="price_cart">
                           <div class="row">
                              <div class="col-xs-7">
                                 <p class="theme">{{ $product_value->merchandise_product_name}}</p>
                                 <h4 class="theme">{{currency($product_value->product_price, 'GBP', session()->get('my_currency'))}}</h4>
                              </div>
                              <div class="col-xs-5">
                                 <a href="#" data_id="{{ $product_value->product_id }}" class="add_bsk theme1"><i class="fas fa-shopping-basket img-responsive themes" style="color:#fff;padding-right:5px;font-size:20px;" aria-hidden="true"></i> Add <span>&nbsp;to Basket</span></a>
                              </div>
                           </div>
                        </div>                       
                    </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
         </div>
         </div>
      </section>
      @endif
      @if($cat_name)
      <div class="container filtersec anotherfilter p-filter">
         <div class="row">
            <div class="col-sm-5 col-xs-6">
               <h3 class="theme">{!!$cat_name->merchandise_product_name!!}</h3>
            </div>
            <div class="col-sm-2 col-xs-6 filerby pull-right">
               <h3 class="theme"><a href="{!! url('/products').'/'.$user->name.'/'.$cat_name->merchandise_product_name!!}" class="theme">See all <span><img src="{!! asset('images/ar.png') !!}" width="10" height="11"/></a></h3></span>
            </div>
         </div>
      </div>
      <div class="container tshirt_sec">
         <div class="row login_wrap_edit">
       
         @foreach($new_cat as $new_value)
            <div class="col-md-4 col-sm-6 lee">
               <div class="tshirt_cart add_bsk_btn">
               <a href="{{ URL('product_detail/'.$new_value->merch_product_id) }}">
                  <img src="{!! $new_value['image']  ? asset('merchandise-img/').'/'.$new_value['image'] : asset('/images/mug.png') !!}" class="img-responsive uploadimg" />
                  </a>
                  <a href="#" class="wishlisticon" data-data="{{$new_value->merch_product_id }}"><span ><i class="fa fa-heart-o heartin"></i></a>
                  <div class="price_cart">
                     <div class="row">
                        <div class="col-xs-7">
                           <p class="theme">{!! $new_value->merch_image->merchandise_product_name !!}</p>
                           
                           <h4 class="theme">{!! currency($new_value->merch_image->product_price, 'GBP', session()->get('my_currency')) !!}</h4>
                        </div>
                        <div class="col-xs-5">                           
                           <a href="javascript:void(0);" data_id="{!! $new_value->merch_product_id !!}" class="add_bsk">
                              <img src="{!! asset('images/whitecart.png') !!}" class="img-responsive" /><small> Add</small>
                              <span>&nbsp;to Basket</span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
         </div>
      </div>
      @endif
      @if($category)
      <div class="container filtersec anotherfilter p-filter">
         <div class="row">
            <div class="col-sm-5 col-xs-6">
               <h3 class="theme">{!! $category->category_name !!}</h3>
            </div>
            <div class="col-sm-2 col-xs-6 filerby pull-right">
               <h3 class="theme"><a href="{!! url('/category').'/'.$user->name.'/'.$category->category_name !!}" class="theme">{!! __('artist_shop.See all') !!} <span><img src="{!! asset('images/ar.png') !!}" width="10" height="11"/></span> </a></h3>
            </div>
         </div>
      </div>
      <div id="space_mb_po" class="container tshirt_sec">
         <div class="row login_wrap_edit">
        
         @foreach($product as $product_list)
            <div class="col-md-4 col-sm-6 lee">
               <div class="tshirt_cart add_bsk_btn">
               <a href="{{ URL('product_detail/'.$product_list->merch_product_id) }}">               
                  <img src="{!! asset('merchandise-img/').'/'.$product_list->image !!}" class="img-responsive uploadimg"/>
                  </a>
                  <a href="#" class="wishlisticon" data-data="{{$product_list->merch_product_id }}"><span ><i class="fa fa-heart-o heartin"></i></a>
                  <div class="price_cart">
                     <div class="row">
                        <div class="col-xs-7">
                           <p class="theme">{!!$product_list->merch_image->merchandise_product_name!!}</p>
                           <h4 class="theme">{!!currency($product_list->merch_image->product_price, 'GBP', session()->get('my_currency'))!!}</h4>
                        </div>
                        <div class="col-xs-5">
                           <!-- <a href="#" class="add_bsk theme3"><i class="fas fa-shopping-basket img-responsive themes" style="color:#fff;padding-right:5px;font-size:20px;" aria-hidden="true"></i> {!! __('artist_shop.Add') !!} <span>&nbsp;{!! __('artist_shop.to Basket') !!}</span></a> -->
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
         @endif        
      @if($category_id)      
      <div class="container filtersec anotherfilter p-filter">
         <div class="row">
            <div class="col-sm-5 col-xs-6">
               <h3 class="theme">{!! $category_id->category_name !!}</h3>
            </div>
            <div class="col-sm-2 col-xs-6 filerby pull-right">
               <h3 class="theme"><a href="{!! url('/category').'/'.$user->name.'/'.$category_id->category_name !!}" class="theme"> {!! __('artist_shop.See all') !!} <span><img src="{!! asset('images/ar.png') !!}" width="10" height="11"/></span></a></h3>
            </div>
         </div>
      </div>
      <div class="container tshirt_sec">
         <div class="row login_wrap_edit">
         @foreach($product_id as $products)
            <div class="col-md-4 col-sm-6 lee">
               <div class="tshirt_cart add_bsk_btn">
               <a href="{{ URL('product_detail/'.$products->merch_product_id) }}">               
                  <img src="{!! asset('merchandise-img/').'/'.$products->image !!}" class="img-responsive uploadimg"/>
                  </a>
                  <a href="#" class="wishlisticon" data-data="{{$products->merch_product_id }}"><span ><i class="fa fa-heart-o heartin"></i></a>
                  <div class="price_cart">
                     <div class="row">
                        <div class="col-xs-7">
                           <p class="theme">{!!$products->merch_image->merchandise_product_name!!}</p>
                           <h4 class="theme">{!!currency($products->merch_image->product_price, 'GBP', session()->get('my_currency'))!!}</h4>
                        </div>
                        <div class="col-xs-5">                           
                           <a href="javascript:void(0);" data_id="{!! $products->merch_product_id !!}" class="add_bsk">
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
      @endif    

      <!--shop end -->
@endsection

@section('footer_script')
    <!-- Footer Script Start -->

    <script>
        $(document).ready(function() {
           
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    650: {
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
        })
    </script>
<script>
// if(document.getElementById("testName").checked) {
//     document.getElementById('testNameHidden').disabled = true;
// }
</script>
    <!--filter dropdown-->

    <script>
            $(document).ready(function() {
                $( "#cat_fil").change(function(e) {
                e.preventDefault();
                // $(this).toggleClass("active");
                $( "#merch_filter_form" ).submit();
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
               else if(status == "0"){
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
    <!--filter dropdown-->
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


    </script>
    <!-- register -->
   
    @endsection