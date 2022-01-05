@extends('front.app')

@section('title',$cat_name)
@section('image',asset('merchandise-img/'.$get_product[0]['image']))

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
<style>
 .print_type_array{
    vertical-align:middle;
    margin:0 10px !important;
    }
.additional-label{
    margin-right: 15px;
}
.pro_deta .fa-star {
    color: #000000;
}
</style>
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

        select.form-control.w-s {
            width: 115px;
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
        <!-- <img src="{!! $theme && $theme->banner_image ? asset('images/').'/'.$theme->banner_image : asset('profile/artist-default-bg.png') !!}" class="newbanner" alt=""> -->
          <img src="{!! @$theme->banner_image ? asset('images/').'/'.@$theme->banner_image : asset('profile/artist-default-bg.png') !!}" class="newbanner" alt="">
     <div class="container user_contain">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1 user_info">
                <a href="{{ URL('shop/'.@$user_name->name) }}">
                  <img src="{{ isset($user_name->profile_image)  ? asset('profile/').'/'.$user_name->profile_image : asset('images/userimg.png') }}" class="img-responsive user_img cus_img" />
                </a>
                
                    <h2><a href="{{ URL('shop/'.@$user_name->name) }}">{{$user_name->name}}</a></h2>
                </div>
             <!--  <div class="col-md-3 col-sm-5 pull-right">
                    <ul>
                        <li>
                            <a href="artist_page.html">SHOP</a>
                        </li>
                        <li>
                            <a href="#">ABOUT ME</a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>

    </section>
<div class="modal fade" id="price_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title" id="myModalLabel">Modal title</h4>

            </div>
            <div class="modal-body">
               <input type="hidden" id="price_name_add_value" >
            <label class="additional-label control-label">Additional feautures</label>
               <input type="text" id="price_add_value" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="price_add_btn" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
    <!--About me -->
    <div class="container product_caros" id="mypro_slider_tab">
        <div class="row">
            <div class="col-md-6 prcar">
                <div id="myCarousel" class="carousel slide procaro" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="changer">
                    @foreach($get_product as $prdkey => $prd_val)
                        <li data-target="#myCarousel" data-slide-to="0"><img src="{{ asset('merchandise-img/'.$prd_val->image)}}" style="width:100%;"></li>
                    @endforeach
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    
                         @foreach($get_product as $key => $value)
                         
                        <div class="{{ $key == 0 ? 'item active':'item'}}">
                        <img src="{{URL::to('/merchandise-img/' .$value['image'])}}"  style="width:100%; ">
                            </div>
                    @endforeach
                        </div>
                
                    <!-- Left and right controls -->
                    @if (count($get_product) > 1)
                    <div class="bigcarrow">
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <img src="{{ asset('images/leftarrow.png') }}" class="img-responsive" />
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <img src="{{ asset('images/rightarrow.png') }}" class="img-responsive" />
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    @endif
                    @if (count($get_product) > 2)
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
                    @endif
                </div>
            </div>
            <div class="col-md-6 pro_deta">
                
                <h3>{{$merchproduct->name_creation}}<span>
                <a class="wishlisticon" id="wishlist" href='javascript:;'  data-data="{{$merchproduct->id }}">
                <input type="hidden" name="merch_product_id" value="{{$merchproduct->id }}">
                 
             <!--    @php 
                  $wishlist = App\Wishlist::where('merch_product_id',$merchproduct->id)->first();
                @endphp -->

                @php 
                    $wishlist = App\Wishlist::where('merch_product_id',$merchproduct->id)->first();
                @endphp
            

                @if($wishlist != null && $wishlist !='')
                    <i class="heartin fa fa-heart" aria-hidden="true"></i>
                @else
                    <i class="heartin fa fa-heart-o"></i>
                @endif
            
                </a></span></h3>
               <p>By <a href="{{ URL('shop/'.@$user_name->name) }}">{{$user_name->name}}</a></p>
                @for ($i = 1; $i <= $review_point; $i++)
                    <i class="star fa fa-star" style="color : orange"></i>
                @endfor
                @for ($i = 1; $i <= 5-$review_point; $i++)
                    <i class="star fa fa-star"></i>
                @endfor  &nbsp  &nbsp
                <p>{{count($product_review)}}&nbspReviews</p>
    
               <h4>{{currency($merchproduct->product_price, 'GBP', session()->get('my_currency'))}}</h4>


               <form class="form-horizontal" action="/action_page.php">
                  <div class="form-group">
                     <div class="col-sm-2 col-xs-3">
                        <label class="control-label">Colour</label>
                     </div>
                     <div class="col-xs-9 colpickers">
                        @php $t=explode(',',$variants[0]); @endphp
                            <label class="control-label">{{str_replace(array('"',']'), '', $t[1])}}</label>
                            <!-- @foreach($variants as $K=>$v) -->
                    <!-- @endforeach -->
                     </div>
                  </div>

                    <div class="form-group">
                        <div class="col-sm-2 col-xs-3">
                            <label class="control-label">Size:</label>

                        </div>
                        <div class="col-sm-6 col-xs-9">
                          <select onChange="merchandise_products_value(this)" class="form-control w-s"> 
                           <option value="">Select Size</option>
                        @foreach($variants_id as $kid=>$vid)
                        @php $t=explode(',',$vid); @endphp
                        <!-- <label class="control-label">{{str_replace(array('"','['), '', $t[0])}}</label> -->
                         
                            <option value='{{$kid}}' @if($selected_id ==$kid) selected @endif>{{str_replace(array('"','['), '', $t[0])}}</option>
                  
                        @endforeach
                         </select>
                        </div>
                    </div>
                
                @if(isset($productdetails->print_type) && $productdetails->print_type != 'N;')

                    <div class="form-group">
                        <div class="col-sm-2 col-xs-3">
                            <label class="control-label">Additional Features:</label>
                        </div>
                        <div class="col-sm-6 col-xs-9"><label class="control-label"> <?php $i=0;?>
                  
                        @foreach($print_type as $type)
                            <?php

                            $array = unserialize($productdetails->print_type);
                            $price = unserialize($productdetails->print_price);
                            $approved_type = unserialize($productdetails->approved_additional_type);
                            // echo "prasana";print_r($array);exit;
                            if (in_array($type->id, $array))
                              {
                            ?>

                            <?php if($productdetails->approved_additional_type){if(in_array($type->id, $approved_type)){echo $type->print_type_name.",";}} ?>

                             <?php
                              }
                            ?>

                             <?php
                            if (in_array($type->id, $array))
                            {
                            $i++;
                            }
                        ?>
                        @endforeach
<!--                         @if(!$productdetails->print_type)
                        @foreach($print_type as $type)
                            <input type="checkbox" id="print_type_array<?php echo $i?>" class="print_type_array" name="print_type_array"
                             value="{{$type->id}}">{{$type->print_type_name}}
                             <?php $i++;?>
                        @endforeach
                         @endif -->
                        </label>
                        </div>
                    </div>
                         @endif
<br>
                    <!-- <div class="form-group">
                        <label class="control-label col-sm-2 col-xs-3">Quantity:</label>
                        <div class="col-sm-6 col-xs-9">
                            <input type="text" class="form-control quan" value="1">
                        </div>
                    </div> -->

                  <div class="form-group">
                     <div class="col-sm-offset-2 col-sm-10 col-xs-9 col-xs-offset-3 product_button_pb quick_buy">
                        <!-- <button type="submit" class="btn btn-default savecrea"><img src="images/whitecart.png" class="img-responsive"/> Add to Basket</button> -->
                        <a href="javascript:void(0);" data_id="{{ $merchproduct->id }}" class="add_bsk">
                            <img src="{{ asset('images/whitecart.png') }}" class="img-responsive" /><small> Add</small>
                                <span>&nbsp;to Basket</span>
                        </a>
                
                         <a href="javascript:void(0);" data_id="{{ $merchproduct->id }}" class="add_bsk_cart">
                            <img src="{{ asset('images/whitecart.png') }}" class="img-responsive" /><small> Quick Buy</small>
                                <span class="cart_count_a">&nbsp; </span>
                        </a>

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
                @if(isset($productdetails['product_description']) && $productdetails['product_description'] != null)
                  <p> {!! $productdetails['product_description'] !!}</p>
                @endif
                  <h3 >Review</h3>
                  <p>
                    @for ($i = 1; $i <= $review_average; $i++)
                      <i class="star fa fa-star" style="color : orange"></i>
                    @endfor
                    @for ($i = 1; $i <= 5-$review_average; $i++)
                      <i class="star fa fa-star"></i>
                    @endfor
                  </p>
               </div>
               <!--video carousel -->
               <div class="reviews_all" style="">
                @if($product_review)

               @foreach($product_review as $review)
               @if($review->review_status == 1)
                  <h3>Reviews</h3>
               @endif
                     <p class="title">{{$review->first_name}} {{$review->last_name}}
                    @for ($i = 1; $i <= $review->product_rating; $i++)
                      @if($review->review_status == 1)
                      <i class="star fa fa-star" style="color : orange"></i>
                      @endif
                    @endfor
                    @for ($i = 1; $i <= 5-$review->product_rating; $i++)
                     @if($review->review_status == 1)
                      <i class="star fa fa-star"></i>
                     @endif
                    @endfor
                    <?php
                      $dt = new DateTime($review->updated_at);
                    ?>
                     @if($review->review_status == 1)
                       <span>{{$dt->format('F jS Y')}}</span></p>
                    <p>{{$review->product_review}}</p>
                      @endif
               @endforeach

              @endif
                </div>

            </div>
        </div>
        <!--video carousel -->
    </div>
    <!-- <div class="col-sm-12 col-lg-5">
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
    </div> -->
    </div>
    <!--About me content -->
    <!--Best seller carousel -->
    <div class="container filtersec anotherfilter">
        <div class="row">
            <div class="col-sm-5 col-xs-6 rp">
                <h3>Related Products</h3>
            </div>
            <div class="col-sm-2 col-xs-6 filerby pull-right about_prod_p">
                {{--  <h3><a href="{{url('merch_sub_category/'.$productdetails->category_id) }}">See all<span><img src="{{ asset('images/ar.png') }}" width="10" height="11"/></span></a></h3>  --}}
                {{--<h3><a href="{{url('merchandise_product_list/artist_id='.$merchproduct->artist_id) }}">See all<span><img src="{{ asset('images/ar.png') }}" width="10" height="11"/></span></a></h3> --}}
                <!-- <h3><a href="{{url('/manage_merchandise_product') }}">See all</a></h3>  -->
            
            </div>
        </div>
    </div>
    <div class="container tshirt_sec probg_tshirt">
        <div class="row pp_cent">
        
        @foreach($productList as  $listDetail)
         @if($listDetail->quantites > 0 )
            <div class="col-md-4 col-sm-6 pa_s">
                <div class="tshirt_cart add_bsk_btn">
                    <a href="{{ url('product_detail/'.$listDetail->merch_product_id) }}">    <img src="{{URL::to('/merchandise-img/' .$listDetail->image)}}" class="img-responsive uploadimg" />
                    </a>  

                    <a href="#" class="wishlisticon" data-data="{{$listDetail->merch_product_id}}"><span >
                        @php 
                          $wishlist = App\Wishlist::where('merch_product_id',$listDetail->merch_product_id)->first();
                        @endphp

                        @if(isset($wishlist->like) && $wishlist->like == 1)
                            <i class="heartin fa fa-heart" aria-hidden="true"></i>
                        @else
                            <i class="heartin fa fa-heart-o"></i>
                        @endif
                    </a>
                    <div class="price_cart">
                        <div class="row">

                            <div class="col-xs-7">
                            <p> {{$listDetail->name_creation}}</p>
                            <h4>{{currency($listDetail->product_price, 'GBP', session()->get('my_currency'))}}</h4>
                            </div>
                            <div class="col-xs-5">
                                <!-- <a href="#" class="add_bsk"><img src="images/whitecart.png" class="img-responsive" /> Add <span>&nbsp;to Basket</span></a> -->
                                <a href="javascript:void(0);" data_id="{{ $listDetail->merch_product_id }}" class="add_bsk">
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
    <!--Best seller carousel -->
    </div>
    <!--About me -->
@endsection

@section('footer_script')
    <!-- Footer Script Start -->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.rollingslider.js') }}"></script>
    <script src="{{ asset('js/Carousel.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
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
    <script>
     $(document).ready(function() {

        $('.print_type_array').change(function() {

            id= $(this).attr('id');
            val = $("#"+id).val();
            //$('#price_add').modal('show');
            //$("#price_name_add_value").val(val);


        if(this.checked) {
            //alert($(this).attr("data-id"));
            //alert(val);
            type =val;
            price = $(this).attr("data-id");
            product_id = '<?php echo isset($productdetails->id) ? $productdetails->id :'' ?>';
            var status = 0;
        $.ajax({
            type: "POST",
            url: "{{ url('/print_type_add') }}",
            data: {
                    status: status,product_id:product_id, type: type, price:price,  _token : _token,
                },
            success: function (data) {
                if(data.status = 'success')
                {
                    window.location.reload();
                }
              },
            error: function (data) {

            }
        });
        }
         else
         {

            type = val;
            price = '';
            product_id = '<?php echo isset($productdetails->id) ? $productdetails->id :''?>';
            var status = 1;
            $.ajax({
            type: "POST",
            url: "{{ url('/print_type_add') }}",
            data: {
                    status: status,product_id:product_id, type: type, price:price,  _token : _token,
                },
            success: function (data) {
                if(data.status = 'success')
                {
                   window.location.reload();
                }
              },
            error: function (data) {

            }
        });

         }
        //$('#textbox1').val(this.checked);
    });

    $("#price_add_btn").click(function(){
            type = $("#price_name_add_value").val();
            price = $("#price_add_value").val();
            product_id = '<?php echo isset($productdetails->id) ? $productdetails->id :''?>';
            var status = 0;
        $.ajax({
            type: "POST",
            url: "{{ url('/print_type_add') }}",
            data: {
                    status: status,product_id:product_id, type: type, price:price,  _token : _token,
                },
            success: function (data) {
                if(data.status = 'success')
                {
                    window.location.reload();
                }
              },
            error: function (data) {

            }
        });
    });

    var _token = "{{ csrf_token() }}";
    var cart_url = "{{ url('cart') }}";

     $('.add_bsk').click(function(e){
        e.preventDefault();
        var merchandise_id = $(this).attr('data_id');
        var variant_id = $('#variant_id').val();

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

  $('.add_bsk_cart').click(function(e){
        e.preventDefault();
        var merchandise_id = $(this).attr('data_id');
        var variant_id = $('#variant_id').val();

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
                    window.location.href ="{{ url('cart')}}";
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
               if(status == "error")
               {
                iziToast.error({ title: 'Error', message: 'Please register / login to add to your wish list', position: 'topRight', });
               }
          }
       });
    });
    //onChnage  
    function  merchandise_products_value(selectObject){
        
        if(selectObject.value != ''){
            var value = selectObject.value;  
            window.location.href ="{{ url('product_detail')}}/"+value;   
        }  
    }
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
    <style>

        .add_bsk img.img-responsive {
            display: inline;
            margin-right: 5px;
        }
        a.add_bsk {
            background: #ed1277 !important;
            border-radius: 100px !important;
            padding: 7px 10px !important;
            width: 200px !important;
            -webkit-box-pack: center !important;
            -ms-flex-pack: center !important;
            display: block;
            color: #fff;
            text-align:center;
            margin-right: 20px;
        }
        a.add_bsk:hover {
            /* background: #ed1277 !important; */
            color: #fff;
        }
         .add_bsk_cart img.img-responsive {
            display: inline;
            margin-right: 5px;
        }
        a.add_bsk_cart {
            background: #ed1277 !important;
            border-radius: 100px !important;
            padding: 7px 10px !important;
            width: 170px !important;
            -webkit-box-pack: center !important;
            -ms-flex-pack: center !important;
            display: block;
            color: #fff;
            text-align:center;
        }
        a.add_bsk_cart:hover {
            /* background: #ed1277 !important; */
            color: #fff;
        }
        .product_button_pb.quick_buy {
            margin-left: 0px !important;
            display: flex;
        }

    </style>
    <!-- thanks -->
    <!-- Footer Script End -->
@endsection
