@extends('front.app')

@section('title', 'View Shop')

@section('header_script')
    <!-- Header Script Start -->
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css"> -->
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
      @media only screen and (max-width: 767px){
#demos .owl-nav .owl-next {
    background-size: 30px !important;
    right: -43px !important;
}
}
      @media only screen and (max-width: 767px){
#demos .owl-nav.disabled .owl-next {
    right: -46px !important;
}
}
        @media only screen and (max-width: 767px) and (min-width: 320px) {
            .filtersec .filerby h3 {
                margin: 25px 0px;
            }
            section.artist_header, section.artist_header img {
    height: unset;
}

        }
        
        @media only screen and (min-width:320px) and (max-width:900px) and (orientation: landscape) {
            #demos {
                padding-left: 30px;
                padding-right: 30px;
            }
        }
   
         .theme{
            font-size: {{@$theme->font_size}}px !important;
            color: #000 !important; /*{{@$theme->font_colour}}*/
            font-family: {{@$theme->font_family}} !important;
        }
        .price_cart{
          background-color: {{@$theme->content_layer_colour}} !important;
        }
        .price_cart .theme {
          color: #fff !important;
        }
        .themes{
            color: {{@$theme->cart_colour}} !important;
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
            object-fit: cover;
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
.artist_header .user_contain ul li:nth-child(2) {
    width: 120px;
}

img.img-responsive.user_img.cus_img {
    /* height: 200px; */
}
div#merch_start {
    height: 100%;
    position: relative;
    /* min-height: 367px; */
}

/*
For slider nav btn color changes
*/

/*
button#triangle-down {
content: '';
border-left: 50px solid transparent;
border-right: 50px solid transparent;
border-top: 100px solid red;
}*/

.cjb_owl_slider button.owl-prev, .cjb_owl_slider button.owl-next {
width: 0;
height: 0;
border-top: 100px solid {{ $theme_style['dark_color'] }};
border-right: 100px solid transparent;
}

.cjb_owl_slider button.owl-prev:before, .cjb_owl_slider button.owl-next:before {
width: 0;
height: 0;
border-top: 100px solid {{ $theme_style['dark_color'] }};
border-right: 100px solid transparent;
}

.cjb_owl_slider span#tries {
width: 0;
height: 0;
border-top: 30px solid {{ $theme_style['dark_color'] }};
border-right: 30px solid transparent;
position: absolute;
left: 9px;
bottom: -11px;
z-index: -1;
transform: rotate(-50deg);
}
.cjb_owl_slider span#tries-nxt {
width: 0;
height: 0;
border-top: 30px solid {{ $theme_style['dark_color'] }};
border-right: 30px solid transparent;
position: absolute;
right: 0px;
bottom: -27px;
z-index: -1;
transform: rotate(350deg);
}

.cjb_owl_slider button.owl-prev,.cjb_owl_slider button.owl-next {
position: relative;
}

#demos.cjb_owl_slider .owl-nav .owl-prev {
/* background-image: url(../images/leftarrow.png) !important; /
/ padding: 55px !important; 
background-repeat: no-repeat;*/
position: absolute;
left: -25px;
top: 30%;
outline: none;
background:{{ $theme_style['dark_color'] }} !important;
padding: 0px !important;
width: 40px;
height: 80px;
content: '/f053';
font-size: 33px;
font-weight: bold;
color: #ffffff;
border-radius: 10px;
}
 #demos.cjb_owl_slider .owl-nav .owl-next {
/* background-image: url(../images/leftarrow.png) !important; /
/ padding: 55px !important; 
background-repeat: no-repeat;*/
position: absolute;
right: -12px !important;
top: 30%;
outline: none;
background: {{ $theme_style['dark_color'] }} !important;
padding: 0px !important;
width: 40px;
height: 80px;
content: '/f053';
font-size: 33px;
font-weight: bold;
color: #ffffff;
border-radius: 10px;
}

.cjb_owl_slider .owl-prev span, .cjb_owl_slider .owl-next span {
  display: block !important;
}
   
#heart_wish_icon:hover { fill: {{ $theme_style['dark_color'] }}; stroke: none; }


a.cjb_add_to_cart:hover { background: {{ $theme_style['dark_color'] }} !important; }
.add_bsk_btn.tshirt_cart .price_cart .add_bsk:hover { background: {{ $theme_style['dark_color'] }} !important; }
.tshirt_sec .tshirt_cart .price_cart { background: {{ $theme_style['light_color'] }} !important; }
.artist_header .user_contain .active { border-bottom: 3px solid {{ $theme_style['dark_color'] }} !important; }
.filtersec .filerby i { color: {{ $theme_style['dark_color'] }} !important; }
section.artist_header, section.artist_header img {
    height: 500px;
    width: 100%;
}
.tshirt_cart.add_bsk_btn span svg:hover path {
    fill: #fe6625;
}
.tshirt_cart.add_bsk_btn span svg:hover path {
    fill: #fff;
    stroke: #fe6625;
}

header .navbar-right li a i {
      color: {{session()->get('theme_style')}};
      font-size: 20px;
    }
    header .navbar-right li span {
        border-radius: 100px;
        font-size: 13px;
        color: white;
        background: {{session()->get('theme_style')}};
        position: absolute;
        top: 0px;
        left: 22px;
        width: 22px;
        height: 22px;
        text-align: center;
        cursor: pointer;
        padding-top: 2px;
        -webkit-box-shadow: 4px 0px 5px #e3e3e3;
                box-shadow: 4px 0px 5px #e3e3e3;
  }
  .advertise_btn a {
    background: {{session()->get('theme_style')}} none repeat scroll 0 0;
    border-radius: 50px;
    color: #fff;
    float: none;
    font-family: "Rubik-Regular";
    font-size: 16px;
    margin: 0 auto;
    padding: 12px 35px;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 700;
  }
  [type="radio"]:checked + label:before,
  [type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0px;
    top: 0px;
    width: 20px;
    height: 20px;
    border: 2px solid {{session()->get('theme_style')}};
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 9px;
    height: 9px;
    background: {{session()->get('theme_style')}};
    position: absolute;
    top: 5px;
    left: 5.5px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
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

    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')

<!--Page Content Start-->
    <section class="artist_header">
        
        <img src="{!! @$theme->banner_image ? asset('images/').'/'.@$theme->banner_image : asset('profile/artist-default-bg.png') !!}" class="newbanner" alt="">
        <div class="container user_contain">
          <?php
            if(Auth::check()){
                if(Auth::user()->type == 1){
                    $auth_id = Auth::user()->id;       
                }else{
                    $auth_id = 0;
                }
             
            }else{
              $auth_id = 0;
            }
           ?>
            <div class="row">
                <div class="col-sm-4 user_info">
                <!-- <a href="Logged_In_edit.html"> -->
                <a href="#">
                <img src="{{ $user->profile_image  ? asset('profile/').'/'.$user->profile_image : asset('images/userimg.png') }}" class="img-responsive user_img cus_img" />
                </a>
                    <h2 class="theme">{!!$user->name!!}</h2>
                </div>
                <div class="col-md-3 col-sm-5 pull-right tab-li">
                    <ul>
                        <li class="active"><a class="theme" href="#">{!! __('artist_shop.SHOP') !!}</a></li>
                        <li><a class="theme" href="{!! URL('artist/'.@$user->name) !!}">{!! __('artist_shop.ABOUT ME') !!}</a></li>
                        <?php if($user->id == $auth_id){ ?><li><a href="{{ url('/dashboard')}}" class="btn btn-success" style="color:black; float: right;">Admin area</a></li><?php } ?>
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
                <h3 class="art-pg">Best Products</h3>
            </div>
            @endif
            <div id="search_wall" class="col-sm-8 col-xs-5 filerby pull-right ordfilt">
                <h3 class="mob_filt">
                    <i class="fa fa-filter" aria-hidden="true"></i> Filter</h3>
                <h3>
                    <i class="fa fa-filter" aria-hidden="true"></i> Filter By:</h3>
                <h3 class="cate">Category:
                    <span>All
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
  <!-- <img src="{!! asset('images/filtdrop.png') !!}"/> -->
                    </span>
                </h3>
            </div>
        </div>
        <div id="seller_common_wrapp" class="row mob_dro mob_ipad_dro">
            <div class="col-sm-12 mob_drop_filter">
                <h3>Sort By:</h3>
                <form method="GET" action="{!! url('/shop').'/'.$user->name !!}">
                @csrf_token
                    <!-- <select class="form-control" id="sel1">
                    <option>Most Recent</option>
                    <option>Yesterday</option>
                    <option>Last Month</option>
                    <option>Popular</option>
                 </select> -->
                    <!-- <h3>Size:</h3>
                    <ul class="filter_drop">
                        <li><input type="checkbox" class="form-control" id="xxl1"> <label for="xxl1">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl2"> <label for="xxl2" class="active">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl3"> <label for="xxl3">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl4"> <label for="xxl4">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl5"> <label for="xxl5" class="active">XXL</label></li>
                        <li><input type="checkbox" class="form-control" id="xxl6"> <label for="xxl6">XXL</label></li>
                    </ul> -->
                    <h3>Category:</h3>
                    <!-- <ul class="filter_drop">
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
                 </ul> -->
                 <ul class="filter_drop" id="cat_fil">
            @if(count($get_cat) > 0)
                @foreach($get_cat as $product_names)
                            <li>
                                <input type="checkbox" name="merchandise_product_name[]" class="form-control" id="{!!$product_names->category_name !!}" value="{!!$product_names->category_name !!}">
                                <label class="cat_fil_class" for="{!!$product_names->category_name !!}"> {!!@$product_names->category_name !!}</label>
                            </li>
                @endforeach
            @endif
              
                </ul>
              </form>
              <a class="mobclearall" >Clear all <img src="{!! asset('images/refresh.png') !!}"/></a>
              <!-- <button type="submit" class="btn applybtn">APPLY</button> -->
           </div>
        </div>
        <form method="post"  action="{!! url('/shop').'/'.$user->name !!}" id="merch_filter_form">
        @csrf      
        <div class="row dro">
            <div class="col-sm-12 drop_filter">
                <i class="fa fa-times-circle closedrop"></i>
                <ul class="filter_drop" id="cat_fil">
                @if(count($get_cat) > 0)
                   @foreach($get_cat as $product_names)
                            <li>
                                <input type="checkbox" name="merchandise_product_name" class="form-control merchandise_product_name"  id="{!!@$product_names->category_name !!}" value="{!!@$product_names->category_name !!}">
                                <label class="cat_fil_class" for="{!!@$product_names->category_name !!}"> {!!@$product_names->category_name !!}</label>
                            </li>
                   @endforeach
                @endif
                </ul>
                <a class="clearall" id="clearData">Clear all
                    <img src="{!! asset('images/refresh.png') !!}" />
                </a>
            </div>
        </div>
      </form>
     </div>
     @if(count($best_artist) != 0)
      <section id="demos" class="container cjb_owl_slider">
         <div class="row">
            <div class="col-lg-12">
               <div class="owl-carousel owl-theme tshirt_sec">

               @foreach($best_artist as $product_value)

                  <div class="item">
                    <div class="tshirt_cart add_bsk_btn 1">
                       <a href="{{ URL('product_detail/'.$product_value->groupby) }}">
                        <img src="{!! $product_value->image  ? asset('merchandise-img/').'/'.$product_value->image : asset('/images/mug.png') !!}" style="object-fit: cover;" class="img-responsive uploadimg" />
                       </a>
                        <div class="price_cart">
                           <div class="row">
                              <div class="col-xs-7">
                                 <p class="theme">{{ @$product_value->name_creation}}</p>
                                 <h4 class="theme">{{currency(@$product_value->product_price, 'GBP', session()->get('my_currency'))}}</h4>
                              </div>
                              <div class="col-xs-5">
                                 <a href="#" data_id="{{ $product_value->groupby }}" class="add_bsk theme1"><img src="{!! asset('images/whitecart.png') !!}" class="img-responsive" /> Add <span>&nbsp;to Basket</span></a>
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
      @elseif($cat_name)

      @elseif($category)
      @else
      <h2 style="text-align:center; margin-bottom:25px;">No Products</h2>
      @endif
      @if($cat_name)
      
      @foreach($cat_list as $key => $new_value)

      <div class="container filtersec anotherfilter p-filter">
         <div class="row">
            <div class="col-sm-5 col-xs-6">
               <h3 class="theme">{{$new_value['category_name']}}</h3>
            </div>
            <div class="col-sm-2 col-xs-6 filerby pull-right">
            <?php 
                session()->put('light_color',$theme_style['light_color']);
                session()->put('theme_style',$theme_style['dark_color']);
            ?>

                <h3 class="theme"><a href="{!! url('/products').'/'.$user->name.'/'.$new_value['category_name'] !!}" class="theme">See all <span><i class="fa fa-caret-right" aria-hidden="true" style="font-size: 23px;"></i></span></a>
                </h3>
            </div>
         </div>
      </div>

      <div class="container tshirt_sec">
         <div class="row login_wrap_edit">

            @foreach($new_value['product_list'] as $listkey => $listDetail)
            @if($loop->index < 3)
    
            <div class="col-md-4 col-sm-6 lee">
               <div class="tshirt_cart add_bsk_btn">
               <a href="{{ URL('product_detail/'.$listDetail['product_id']) }}">
                  <img src="{!! $listDetail['image']  ? asset('merchandise-img/').'/'.$listDetail['image'] : asset('/images/mug.png') !!}" style="object-fit: cover;" class="img-responsive uploadimg" />
                  </a>
                  <a href="#" class="wishlisticon" data-data="{{$listDetail['product_id'] }}"><span >
                    
                    @php 
                      $wishlist = App\Wishlist::where('merch_product_id',$listDetail['product_id'])->first();
                    @endphp
                   
                    @if($wishlist != null || $wishlist != '')
                        <svg version="1.1" id="heart_wish_icon"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                       viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;width:30px;fill: {{ $theme_style['dark_color'] }};stroke: white;stroke-width: 20;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M376,30c-27.783,0-53.255,8.804-75.707,26.168c-21.525,16.647-35.856,37.85-44.293,53.268
                                  c-8.437-15.419-22.768-36.621-44.293-53.268C189.255,38.804,163.783,30,136,30C58.468,30,0,93.417,0,177.514
                                  c0,90.854,72.943,153.015,183.369,247.118c18.752,15.981,40.007,34.095,62.099,53.414C248.38,480.596,252.12,482,256,482
                                  s7.62-1.404,10.532-3.953c22.094-19.322,43.348-37.435,62.111-53.425C439.057,330.529,512,268.368,512,177.514
                                  C512,93.417,453.532,30,376,30z"/>
                              </g>
                            </g>
                    </svg>
                    @else
                     
                        <svg version="1.1" id="heart_wish_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                       viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;width:30px;fill: white;stroke:{{ $theme_style['dark_color'] }};stroke-width: 20;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M376,30c-27.783,0-53.255,8.804-75.707,26.168c-21.525,16.647-35.856,37.85-44.293,53.268
                                  c-8.437-15.419-22.768-36.621-44.293-53.268C189.255,38.804,163.783,30,136,30C58.468,30,0,93.417,0,177.514
                                  c0,90.854,72.943,153.015,183.369,247.118c18.752,15.981,40.007,34.095,62.099,53.414C248.38,480.596,252.12,482,256,482
                                  s7.62-1.404,10.532-3.953c22.094-19.322,43.348-37.435,62.111-53.425C439.057,330.529,512,268.368,512,177.514
                                  C512,93.417,453.532,30,376,30z"/>
                              </g>
                            </g>
                    </svg>
                    @endif
                  </a>
                  <div class="price_cart">
                     <div class="row">
                        <div class="col-xs-7">
                           <p class="theme">{!! $listDetail['name_creation'] !!}</p>
                           
                           <h4 class="theme">{!! currency($listDetail['product_price'], 'GBP', session()->get('my_currency')) !!}</h4>
                        </div>
                        <div class="col-xs-5">                           
                           <a href="javascript:void(0);" data_id="{!! $listDetail['product_id'] !!}" class="add_bsk cjb_add_to_cart">
                              <img src="{!! asset('images/whitecart.png') !!}" class="img-responsive" /><small> Add</small>
                              <span>&nbsp;to Basket</span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endif
            @endforeach
        </div>
     </div>
      
     @endforeach





      @endif
      @if($category) 
      <!-- <div class="container filtersec anotherfilter p-filter">
         <div class="row">
            <div class="col-sm-5 col-xs-6">
               <h3 class="theme">{!! $category->category_name !!}</h3>
            </div>
            <div class="col-sm-2 col-xs-6 filerby pull-right">
               <h3 class="theme"><a href="{!! url('/category').'/'.$user->name.'/'.$category->category_name !!}" class="theme">{!! __('artist_shop.See all') !!} <span><img src="{!! asset('images/ar.png') !!}" width="10" height="11"/></span> </a></h3>
            </div>
         </div>
      </div> -->
      <!-- <div id="space_mb_po" class="container tshirt_sec">
         <div class="row login_wrap_edit">
        
         @foreach($product as $product_list)
            <div class="col-md-4 col-sm-6 lee">
               <div class="tshirt_cart add_bsk_btn">
               <a href="{{ URL('product_detail/'.$product_list->merch_product_id) }}">               
                  <img src="{!! asset('merchandise-img/').'/'.$product_list->image !!}" style="object-fit: cover;" class="img-responsive uploadimg"/>
                  </a>
                  <a href="#" class="wishlisticon" data-data="{{$product_list->merch_product_id }}"><span ><i class="fa fa-heart-o heartin"></i></a>
                  <div class="price_cart">
                     <div class="row">
                        <div class="col-xs-7">
                           <p class="theme">{!!$product_list->merch_image->merchandise_product_name!!}</p>
                           <h4 class="theme">{!!currency($product_list->merch_image->product_price, 'GBP', session()->get('my_currency'))!!}</h4>
                        </div>
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
         </div> -->
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
                  <img src="{!! $products->image  ? asset('merchandise-img/').'/'.$products->image : asset('/images/mug.png') !!}" style="object-fit: cover;" class="img-responsive uploadimg"/>
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
                },
                navText: ["<span class='tries'><</span><span id='tries'></span>","<span class='tries'>></span><span id='tries-nxt'></span>"]
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
        $("#clearData").click(function() {

            // $(".merchandise_product_name").val('');
            $('#merch_filter_form')[0].reset()
            // $('#merch_filter_form').trigger("reset");
            // $data={{@$product_names->category_name}};
            // $('#'.$data).val('');

            location.reload();
        });
            $(document).ready(function() {
                $( ".cat_fil_class").click(function(e) {
                var value = $(this).attr('for');
                e.preventDefault();
                $('input[type="checkbox"][name="merchandise_product_name"][value="'+value+'"]').prop('checked', true);
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
                //   console.log(data);
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
               if(status != "0")
               {
                this_button_icon.removeClass("fa fa-heart-o").addClass("fa fa-heart");
                iziToast.success({ title: 'Success', message: 'Product added to wishlist successfully', position: 'topRight', });

               }
               else if(status != "1"){
                this_button_icon.removeClass("fa fa-heart").addClass("fa fa-heart-o");
                iziToast.success({ title: 'Success', message: 'Product removed from wishlist successfully', position: 'topRight', });

               }
               else
               {
                iziToast.error({ title: 'Error', message: 'Please register / login to add to your wish list', position: 'topRight', });
               }
               location.reload();
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