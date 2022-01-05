@extends('front.app')

@section('title', 'Product List')

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
   display: block;
    padding-left: 0;
    margin: 20px auto !important;
    border-radius: 4px;
    width: max-content;
    height: auto;
}

.pagination>li {
    display: inline-block;
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

.filter-right {
    display: flex;
    justify-content: flex-end;
    align-items: center;
}
.filter-right div {
    margin: 0px 10px;
}
.filt-inner.custom_cat_wr {
    display: flex;
    align-items: center;
}

.filt-inner.custom_cat_wr select {
    margin-left: 10px;
}
.pager li>a, .pager li>span {
    display: inline-block;
    padding: 5px 14px !important;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 15px !important;
}
.filt-inner.fil-by1 span {
    margin-top: 9px !important;
}
.filt-inner.fil-by1 {
    width: 73px !important;
    display: flex;
    align-items: center;
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
        <!-- <form action="{{ URL('merchandise_product_list') }}" method="post">
        {{ csrf_field()}} -->
        <div id="mymerchand" class="container filtersec firstfilter ws_order">
            <div class="row">
                <div class="col-sm-4 col-xs-7">
                    <h3>Product List</h3>
                </div>
                
            </div>

            <!-- filter start -->
                        <form id="order_filter_form"  action="" method="GET" >
                                    @csrf
                            <div class="filter-right">
                                <div class="filt-inner fil-by1"><img src="{{asset('images/filtfilt.png')}}">
                                    <span>Filter By:</span></div>
                                    <div class="filt-inner custom_cat_wr">
                                     @if(isset($data) && $data ==true)   
                                        @php
                                        $subcats[] = $subcat;
                                        @endphp
                                    @else
                                    @php
                                        $subcats = $subcat;
                                        @endphp
                                    @endif
                                        <span>Catagory:</span>
                                        <select class="form-control" id="status_val" name="status_val">
                                                <option value=" ">Select Category</option>
                                                @foreach($subcats as $lists)
                                        
                                                @if($lists !='')
                                                  @foreach($lists as $list)
                                                 @if($list !='')
                                                <option value="{{ @$list->id }}" {{ (@$subCategoryId == @$list->id) ? 'selected' :'' }} >{{ @$list->category_name}}</option>
                                           @endif          
                                        @endforeach
                                                @endif
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="clear_all">
                                        <span >Clear All:</span>
                                                <a href="{{ url('merch_sub_category',$category_id) }}" class="reset">Reset</a>
                                            <!-- </h3> -->
                                    </div>
                            </div>
                        </form>
                    <!-- filter end -->
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
                    <img src="{{ asset('images/refresh.png') }}" />
                </a>
                <button class="btn applybtn">APPLY</button>
            </div>
        </div>
    </div>

    <div class="container tshirt_sec wishtshirt">
        <div class="row ipad_cent" id="filter_prod"> 
            @if($product_data->count() > 0)
                @foreach($product_data as $product_list)
                    <div class="col-md-4 col-sm-6 ipad_lee filter_product_image" >
                        <div class="tshirt_cart add_bsk_btn">
                            <input type="hidden" name="productId" value="{{ URL('merch_description_page/'.$product_list->product_id) }}">
                            <a href="{{ URL('merch_description_page/'.$product_list->product_id) }}" ><img src="{{ $product_list->image  ? asset('portal/img/product/').'/'.$product_list->image : asset('/images/mug.png') }}" class="img-responsive uploadimg" /></a>
                             <div class="price_cart">    
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4>{{ $product_list->product_name }}</h4>
                                       
                                    </div>      
                                </div>
                            </div>                            
                        </div>
                        
                    </div>
                   @endforeach
            @else
                <div class="col-md-12 col-sm-12 ipad_lee filter_product_image" >
                 <h1 class="text-center">No Products...</h1>
                </div>
            @endif
        </div>
{!! $product_data->links() !!}
        </div>
    </div>
@endsection

@section('footer_script')
    <!--Thanks popup-->
    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery.rollingslider.js') }}"></script>
    <script src="{{ asset('js/Carousel.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

    <!--bannaer carousel-->

    <!--bannaer carousel-->

    <!-- video carousel -->
    <script>

        //search functionality
        $(document).ready(function() {

            $( "#status_val , #sort_by").change(function() {
                var selectedCategory = $("#status_val").val();
                if(selectedCategory !=''){
                    var category_id = '<?php echo $category_id; ?>';
                    var base_url = "{{ url('/') }}";
                    window.location.href = base_url+'/merch_sub_category/'+category_id+'/'+selectedCategory;
                }
        
                    // $.ajax({
                    //     'url': base_url+'/merch_sub_category/1/4',
                    //     'type': 'GET',
                    //     'data': {},

                    //     success: function(response){ // What to do if we succeed
                    //         console.log(response);
                    //         // if(data == "success")
                    //         //     alert(response);
                    //     },
                    //     error: function(response){
                    //         alert('Error'+response);
                    //     }
                    // });

               //  if(selectedCategory != ''){
               //     var base_url = "{{ url('/') }}";
               //      $.ajax({
               //          type: "post",
               //          url: "{{ route('sub_category_ajax') }}",
               //          data: {"_token": "{{csrf_token()}}","selectedCategory":selectedCategory},
               //          success: function (res) { 
               //                let response=JSON.parse(res);

               //                if(response.data != ''){
               //                   $('#filter_prod').empty();
               //                   var htmlMarkup = "";
               //                   $.each(response.data,function(key,value){
               //                      console.log(value);
               //                      let img = value.image ? base_url+ '/portal/img/product/'+value.image  : base_url +'/images/mug.png';
               //                          htmlMarkup += '<div class="col-md-4 col-sm-6 ipad_lee filter_product_image" >';
               //                          htmlMarkup += '<div class="tshirt_cart add_bsk_btn">';
               //                          htmlMarkup += '<img src="'+img+'" class="img-responsive uploadimg" />';
               //                          htmlMarkup += '</div>';
               //                          htmlMarkup += '</div>';
                                       
               //                   });
               //                   $("#filter_prod").html(htmlMarkup);
                                    
               //                   console.log(response.data);

               //                }else{
               //                   $("#filter_prod").html("No Record");
               //                }
               //              }
               //      });
               // }
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
        //end search functionality

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
               if(status == "error")
               {
                iziToast.error({ title: 'Error', message: 'Please register / login to add to your wish list', position: 'topRight', });
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