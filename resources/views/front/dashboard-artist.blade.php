@extends('front.app')

@section('title', 'Home')

@section('header_script')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.min.css">
    <link rel="stylesheet" href="css/owl.default.css">
    <script src="js/owl.js"></script>
    <script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/slick.js"></script>
    <script src="js/custom.js"></script>
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
        $(document).ready(function(){
        $(".progress-bar").loading();
        $('input').on('click', function () {
             $(".progress-bar").loading();
        });
    });
        /*search tab*/
    </script>
    <style type="text/css">
         #img_demo {
            margin-bottom: 30px !important;
        }

        .dashicaro {
            display: none;
        }

        @media only screen and (max-width: 767px) {
            .dashicaro {
                display: block;
            }
            .dashboard-sec .banner .caption .advertise_btn {
                margin-top: 0px;
                width: 155px!important;
            }
            body .advertise_btn {
                top: 82% !important;
            }
            .dashicaro {
                margin-top: -25px;
            }
        }
        @media screen and (max-width: 767px){

div#circle_bar_jelly {
    position: relative;
    right: auto;
    left: 0px;
    margin: 20px auto 68px;
}
}

    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', '')

@section('content')

@php
$activeSidebar = 'dashboard';
@endphp

        <!--Page Content Start-->
         <!-- modal_start -->
         @if($login == 'register')
        <div class="modal fade changeuser changelog2" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close logclose" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thanks For Registering </h4>
                    </div>
                    <div class="modal-body">
                        Please check your email for login credentials<br>
                        Have any trouble ? Please <a href="#">contact us</a><br><br>
                        <img src="{{ asset('images/thanks.png') }}">
                    </div>

                </div>
            </div>
        </div>
        @endif
        <!-- modal_end -->


    <!--dashboard artist-->
<!-- <div class="overallPage">  -->
    <section>
        <div class="dashboard-sec dash_art_mob dash_custom slidpad">
            <div class="container dashbo">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 ">

                        @include('front.user-sidebar')

                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 nopadding">
                        <!--banner-->

                        <div class="banner dasban artist_vbann bann_btm">
                            <div class="item">
                                <img src="images/ban1.png" title="slidepicture" alt="slidepicture" class="deskbani">
                                <!-- <img src="images/mobdash.png" title="slidepicture" alt="slidepicture" class="mobbani"> -->
                                <div class="caption" style="width: 100% !important;">
                                <div style="width:60%;">
                                    <h2>{{ __('dashboard-customer.Welcome back') }}!</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="advertise_btn">
                                        <a href="{{ url('order_list') }}">{{ __('dashboard-customer.View Orders') }}</a>
                                    </div>
                                    </div>
                                    @if($profile_percentage < 100)
                                  <div id="circle_bar_jelly" class="header_completion">
                                         <div class="progress-bar position" data-percent="{{ $profile_percentage }}" data-color="#17b4e8,#ed1277">
                                            <div id="bar_content">
                                                <p>SHOP</p>
                                                 <h4>{{ $profile_percentage }}%</h4>
                                                  <p>complete</p>
                                              </div>
                                           </div>
                                    </div>
                                       @endif

                                </div>
                            </div>

                        </div>
                        <!--/.banner-->
                        @if($profile_percentage < 100)
                        <!-- Products__list--Types -->
                            <div class="productslist">
                            @if($profile_percentage < 100)

                                <div class="product__details Product__orange--theme">
                                    <div class="product_images">
                                        <img src="./images/product_images/product_sno1.png" alt="Product_list_no" />
                                        <!-- <span class="product__counts">1</span> -->
                                    </div>
                                    <div class="product_content">
                                        <h2>{{ __('dashboard-artist.Complete your profile') }}</h2>
                                        <ul>
                                            <li>
                                                <i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('dashboard-artist.Fil in your personal information') }}</li>
                                            <li class="product__times--circle"><i class="fa fa-times-circle-o" aria-hidden="true"></i> {{ __('dashboard-artist.Add your payment details to receive money') }}</li>
                                        </ul>
                                    </div>
                                    <div class="product_images--display">
                                        <img src="./images/product_images/product_display1.png" alt="product_list_display" />
                                    </div>
                                    <div class="product_button">
                                        <a class="product__click--btn" href="{{ url('edit-profile') }}">{{ __('dashboard-artist.Complete profile') }}</a>
                                    </div>
                                </div>
                                @endif

                                <div class="product__details Product__blue--theme">
                                    <div class="product_images">
                                        <img src="./images/product_images/product_sno2.png" alt="Product_list_no" />
                                        <!-- <span class="product__counts">2</span> -->
                                    </div>
                                    <div class="product_content">
                                        <h2>{{ __('dashboard-artist.Customise your shop') }}</h2>
                                        <ul>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i>{{ __('dashboard-artist.Upload your Profile Picture') }}</li>
                                            <li class="product__times--circle"><i class="fa fa-times-circle-o" aria-hidden="true"></i> {{ __('dashboard-artist.Upload your Shop Cover Photo') }}</li>
                                        </ul>
                                    </div>
                                    <div class="product_images--display">
                                        <img src="./images/product_images/product_display2.png" alt="product_list_display" />
                                    </div>
                                    <div class="product_button">
                                        <a class="product__click--btn" href="{{ URL('shop/'.Auth::user()->name) }}">{{ __('dashboard-artist.View shop') }}</a>
                                    </div>
                                </div>
                                <div class="product__details Product__pink--theme">
                                    <div class="product_images">
                                        <img src="./images/product_images/product_sno3.png" alt="Product_list_no" />
                                        <!-- <span class="product__counts">3</span> -->
                                    </div>
                                    <div class="product_content">
                                        <h2>{{ __('dashboard-artist.Create your products') }}</h2>
                                        <ul>
                                            <li><i class="fa fa-check-circle" aria-hidden="true"></i>{{ __('dashboard-artist.Upload your Artwork') }}</li>
                                            <li class="product__times--circle"><i class="fa fa-times-circle-o" aria-hidden="true"></i>{{ __('dashboard-artist.Personalise your unique product range') }}</li>
                                        </ul>
                                    </div>
                                    <div class="product_images--display">
                                        <img src="./images/product_images/product_display3.png" alt="product_list_display" />
                                    </div>
                                    <div class="product_button">
                                        <a class="product__click--btn" href="{{ url('design-creation') }}">{{ __('dashboard-artist.Creation station') }}</a>
                                    </div>
                                </div>
                            </div>
                            @else
                       <!--advertise_sec-->
    
                            <div class="advertise_sec advertise_over customer_adv">
                                <!--sales_stas-->
                                @if(isset($salestats))
                                <div class="sales_stats sales_tab nopadcs mob-tab_wrap">
                                    <div class="table-responsive ">
                             
                                        <table class="table des_res " cellpadding="0 " cellspacing="0 " border="0 ">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <h2>Sales Stats</h2>
                                                    </th>
                                                    <th class="cen_align">This Week</th>
                                                    <th class="cen_align">This Month</th>
                                                    <th class="cen_align">This Year</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <tr>
                                                    <th class="cen_align1">Sales</th>
                                                    <td class="cen_align">{{$salestats['sw']['salesOrdercountWeek']}}</td>
                                                    <td class="cen_align">{{$salestats['sm']['salesOrdercountMonth']}}</td>
                                                    <td class="cen_align">{{$salestats['sy']['salesOrdercountYear']}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="cen_align1">Amount</th>
                                                    <td class="cen_align">£{{$salestats['sw']['total']}}</td>
                                                    <td class="cen_align">£{{$salestats['sm']['total']}}</td>
                                                    <td class="cen_align">£{{$salestats['sy']['total']}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="cen_align1">units</th>
                                                    <td class="cen_align">{{$salestats['sw']['quantity']}}</td>
                                                    <td class="cen_align">{{$salestats['sm']['quantity']}}</td>
                                                    <td class="cen_align">{{$salestats['sy']['quantity']}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="cen_align1">Earnings</th>
                                                    <td class="cen_align">£{{$salestats['sw']['artistRevenue']}}</td>
                                                    <td class="cen_align">£{{$salestats['sm']['artistRevenue']}}</td>
                                                    <td class="cen_align">£{{$salestats['sy']['artistRevenue']}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @endif
                                <!--sales_stas-->
    
                                <!--Best_seller-->
                               
                                @if(isset($best_artist) && count($best_artist) > 1 && $sellerflag==1)
                                        <div class="best_seller nopadcs best_sell_ipad">
                                            <div class="title_product ">
                                                <div class="col-sm-12 ">
                                                    <h3>Best Sellers</h3>
                                                </div>
                                            </div>
                                            
                                            <div class="hidee"> 
                                            
                                                @foreach($best_artist as $key => $product_value)
                                                    @if($key < 3)
                                                        <div class="col-md-4 col-sm-6 tshirt_sec ">
                                                            <div class="tshirt_cart  add_bsk_btn">
                                                                @if($product_value->image !='')
                                                                  <img src="{{URL::to('/merchandise-img/' .$product_value->image)}}">
                                                                    
                                                                @else
                                                                    <img src="{!! file_exists(asset('merchandise-img/').'/'.$product_value->image)  ? asset('merchandise-img/').'/'.$product_value->image : asset('/images/mug.png') !!}" style="object-fit: cover;" class="img-responsive uploadimg" />
                                                                @endif
                                                                <div class="price_cart price-dashboard">
                                                                    <div class="row ">
                                                                        <div class="col-xs-6 col-sm-6 ">
                                                                            <p>{{$product_value->name_creation}}</p>
                                                                            <p>Qty:{{$product_value->product_quantity}}</p>
                                                                        </div>
                                                                       <div class="col-sm-offset-2 col-sm-10 col-xs-9 col-xs-offset-3 product_button_pb btn-dashboard">

                        <a href="javascript:void(0);" data_id="{{ $product_value->product_id }}" class="add_bsk">
                            <img src="{{ asset('images/whitecart.png') }}" class="img-responsive" /><small> Add</small>
                                <span>&nbsp;to Basket</span>
                        </a>

                     </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                @endif
                                <!--/.Best_seller-->
                                @if(isset($categories) && !empty($categories))
                                    <div class="title_product ">
                                        <div class="col-sm-12 ">
                                            <h3>Latest Products</h3>
                                        </div>
                                    </div>
                                    <!--Image carousel -->
                                    <div class="carousel Image_carousel artist-img_carousel">
                                        <section id="img_demo">
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    
                                                    <div class="owl-carousel">
                                                        
                                                        @foreach($categories as $category)
                                                            <div class="item">
                                                                <a href="{{ URL('merch_sub_category/'.$category->id) }}" data-panel="0"> <img src="{{ asset('category/').'/'.$category->category_image }}" alt=""> </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="slider-container">
                                                        <input class="range-slider" type="range" id="range" value="1" name="range" min="0" step="1" max="14" />
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                @endif
                                <!--Image carousel -->
    
                                <!--profile_shop_prod-->
                                <div class="psp_list nopadcs">
    
                                    <div class="col-md-4 col-sm-6 ">
                                        <div class="fm_list one_cir ">
                                            <img src="images/one_circle.png " class="img-responsive " />
                                            <h1>Edit Your Profile</h1>
                                            <p>Here you can edit your personal details, or change your password and payment information.</p>
                                            <a href="{{url('/edit-profile')}}" class="btn_common ">Edit Profile</a>
                                        </div>
                                    </div>
    
                                    <div class="col-md-4 col-sm-6 ">
                                        <div class="fm_list two_cir ">
                                            <img src="images/two_circle.png " class="img-responsive " />
                                            <h1>Customise Your Shop</h1>
                                            <p>Keep your shop front looking fresh! Change your profile picture or upload a new shop cover photo.</p>
                                            <a href="{{url('/shop/cjbartist1')}}" class="btn_common ">view shop</a>
                                        </div>
                                    </div>
    
                                    <div class="col-md-4 col-sm-6 ">
                                        <div class="fm_list three_cir ">
                                            <img src="images/three_circle.png " class="img-responsive " />
                                            <h1>Your Products</h1>
                                            <p>Manage your products, change your merch range and create new products to sell. </p>
                                            <a href="{{url('/design-creation')}}" class="btn_common ">Creation Station</a>
                                        </div>
                                    </div>
    
                                </div>
                                <!--/.profile_shop_prod-->
                            </div>
                            @endif
                            <!--/.advertise_sec-->

                        <!--Faq and Marketing-->
                        <div class="f_m ">

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopad-left">
                                <div class="fm_wrap">
                                    <div class="fm_sec">
                                        <div class="fm_list ">
                                            <div class="mg_fit ">
                                                <img src="images/faq.png " class="img-responsive " />
                                            </div>
                                            <h1>Cool Jelly Bean Community</h1>
                                            <div class="update_adv">
                                                <div class="col-lg-6 col-sm-6  col-xs-6">
                                                    <a href="# ">{{ __('dashboard-customer.Updates') }}
                                                <br/> {{ __('dashboard-customer.Coming soon') }}</a>
                                                </div>
                                                <div class="col-lg-6 col-sm-6 col-xs-6">
                                                    <a href="# ">{{ __('dashboard-customer.News') }}
                                                <br/> {{ __('dashboard-customer.Give us your ideas') }}</a>
                                                </div>
                                            </div>
                                            <a href="{{route('faq')}}" class="btn_common ">{{ __('dashboard-customer.read faqs') }}</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  nopad-right">
                                <div class="fm_wrap">
                                    <div class="mg_fit_full">
                                        <img src="images/marketing.png " class="img-responsive " />
                                    </div>
                                    <div class="fm_sec">
                                        <div class="fm_list mariki">

                                            <h1>{{ __('dashboard-customer.Special Offer') }}</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                            <a href="# " class="btn_common ">Lorem Ipsum</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.Faq and Marketing-->
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- </div> -->
   
    <!--/.dashboard artist-->
        <!--Page Content End-->

@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js "></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jQuery-plugin-progressbar.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jQuery-plugin-progressbar.css') }}">
    <script src="js/owl.carousel.min.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js "></script>
    <script>

        $(document).ready(function(){
            $(".changelog2").modal('show');
        });

        var _token = "{{ csrf_token() }}";
        var cart_url = "{{ url('cart') }}";

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
                iziToast.error({ title: 'Error', message: 'Please register / login to add to your wish list', position: 'topRight', });
               }
          }   
       });   
    }); 

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
    </script>
    <!-- Footer Script End -->
    <!-- image carousel -->
    <!-- owl carousel-->
    <script>
        $(document).ready(function() {
            var owl = $(".owl-carousel "),

                inputType = $("input[type=range] ");
            owl.owlCarousel({
                //  'loop': true,
                'mouseDrag': true,
                'margin': 10,
                'autoplay': true,
                // 'autoplayTimeout':1000,
                // 'autoplayHoverPause':true
                'responsive': {
                    0: {
                        items: 1,
                        slideBy: 1

                    },
                    600: {
                        items: 1,
                        slideBy: 1

                    },
                    1280: {
                        items: 5,
                        slideBy: 1

                    }
                }
            });

            owl.on('changed.owl.carousel', function(event) {
                console.log(event.item.index);
                inputType.val(event.item.index);

            });


            $("input ").on("change ", function(e) {
                e.preventDefault();
                console.log(inputType.val());

                $('.owl-carousel').trigger('to.owl.carousel', [inputType.val(), 1, true]);

            });
        });
    </script>
 
 
    <!-- Footer Script End -->
@endsection
