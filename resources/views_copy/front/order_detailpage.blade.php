@extends('front.app')

@section('title', '')

@section('header_script')
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')
@php
$activeSidebar = 'order_list';
@endphp
    <!--dashboard artist-->
    <section>
        <div class="dashboard-sec slidpad">
            <div class="container dashbo">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 ">

                    @include('front.user-sidebar')

                    </div>
                    @php if($order_details != null){ @endphp
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 nopadding">

                            <!--advertise_sec-->

                            <div id="cust_men_one" class="advertise_sec advertise_over order_details_header order_details_header_comm">
                                <!--sales_stas-->
                                <div class="filtersec order_filter">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <h3>Order Information - {{ $order_details->order_id}}</h3>
                                            @if($order_details->status ==1)
                                                <a href="javascript:void(0);" class="cancel_order" data_id="{{ $order_details->id}}"> Cancel </a>
                                            @endif
                                           
                                        </div>

                                    </div>
                                </div>

                                <div class="sales_stats orders_tab order_details">

                                    <div class="table-responsive">

                                        <table class="table odered_lists" cellpadding="0" cellspacing="0" border="0">
                                            <thead>
                                                <tr>
                                                    <th>Dispatch to</th>
                                                    <th>Billing Address</th>
                                                    <th>Shipping Address</th>
                                                    <th>Date Ordered</th>
                                                    <th>Shipping Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{Auth::user()->name}}</td>
                                                    <td style="text-align: left;"> {{$order_details->customerBillingAddress->no}},
                                                        <br> {{$order_details->customerBillingAddress->street_1}}, {{$order_details->customerBillingAddress->street_2}}
                                                        <br> {{$order_details->customerBillingAddress->region}},
                                                        <br> {{$order_details->customerBillingAddress->country}}, {{$order_details->customerBillingAddress->zipcode}}.
                                                        <br> {{$order_details->customerBillingAddress->contact_no}}.
                                                        <br> {{ ($order_details->customerBillingAddress->landmark != null ) ? $order_details->customerBillingAddress->landmark:''}}.
                                                    </td>
                                                    <td style="text-align: left;">{{$order_details->customerBillingAddress->no}},
                                                        <br> {{$order_details->customerBillingAddress->street_1}}, {{$order_details->customerBillingAddress->street_2}}
                                                        <br> {{$order_details->customerBillingAddress->region}},
                                                        <br> {{$order_details->customerBillingAddress->country}}, {{$order_details->customerBillingAddress->zipcode}}.
                                                        <br> {{$order_details->customerBillingAddress->contact_no}}.
                                                        <br> {{ ($order_details->customerBillingAddress->landmark != null ) ? $order_details->customerBillingAddress->landmark:''}}.
                                                    </td>
                                                    <td>{{ $order_details->created_at}}</td>
                                                    <td>{{($shippingDate['shipping_date']==null)?'Not Available': $shippingDate['shipping_date']}}</td>
                                                    <td>{{ (($order_details->status ==1) ? 'Pending' :( ($order_details->status ==2) ? 'Completed' : (($order_details->status ==3) ? 'Cancelled' : 'Return') ) )}}</td>
                                                </tr>

                                            </tbody>
                                        </table>



                                    </div>

                                    <h3>Items Ordered:</h3>

                                    @foreach($order_details->orderItemDetails as $value) 
                                        <div class="shopping-cart">
                                            <h4 class="mob_display">-</h4>
                                            <div class="product">
                                                <div class="product-image">
                                                @php $offset = count( $value->orderProducts->merchProductImage)-1; @endphp
                                                    <img src="{{URL::to('/merchandise-img/' .$value->orderProducts->merchProductImage[$offset]->image)}}">
                                                </div>
                                                <div class="product-details">
                                                    @if($order_details->status == 2)

                                                    <div class="product-title">{{$value->orderProducts->merchandise_product_name }}</div>
                                                @if(($order_details->return_status == 1))
                                                                <a href="#" class="return_order" data-name="{{ $value->orderProducts->merchandise_product_name }}" data-id="{{ $value->merchandise_product_id }}" data-toggle="modal" data-target="#return_popup"> Return </a>
                                                @endif           
                                                <a href="#" class="review_order" data-name="" data-id="" data-toggle="modal" data-target="#myModal"> Review </a>
                                                    @endif
                                                </div>                            
                                                    <div class="product_author">
                                                        <span>By <a>Mr/Mrs {{$value->orderProducts->artistDetails->name }}</a></span>
                                                    </div>
                                                    <div class="product-description">
                                                        <ul>
                                                            <li>
                                                                <span>Price (each):</span>
                                                                <span style="font-weight: 800;">£{{$value->orderProducts->product_price }}</span>
                                                            </li>
                                                            <li>
                                                                <span> Choosed Option:</span>
                                                                </span>{{$value->orderProducts->variantDetails->variant_name }}</span>
                                                            </li>
                                                            
                                                            <li>
                                                                <span> Quantity:</span>
                                                                <span> {{ $value->product_quantity}}</span>
                                                            </li>

                                                        </ul>
                                                        <div class="product-price">
                                                            <span>TOTAL: <b>£{{ $value->product_quantity * $value->orderProducts->product_price }} </b></span>
                                                            <span></span>
                                                        </div>
                                                    </div>                                                   
                                                </div>

                                            </div>

                                        </div>
                                    @endforeach
                                    <div class="totals">

                                        <div class="totals-item totals-item-total">
                                            <label>Sub Total:</label>
                                            <div class="totals-value" id="cart-total">£{{$order_details->sub_total}}</div>
                                            <label>Delivery Total<i>({{$order_details->delivery_name}})</i>:</label>
                                            <div class="totals-value" id="cart-total">£{{$order_details->delivery_amount}}</div>
                                            <label>Packing Total<i>({{$order_details->packing_name}})</i>:</label>
                                            <div class="totals-value" id="cart-total">£{{$order_details->packing_amount}}</div>
                                        	<label>Additional Charge:</label>
                                            <div class="totals-value" id="cart-total">£{{$additional_charge->print_price}}</div>
                                            <label>Order Total:</label>
                                            <div class="totals-value" id="cart-total">£{{$order_details->grand_total}}</div>
                                        </div>
                                    </div>
<!--             						<p><b>Commission:</b></p>
                                    <div class="totals">

                                        <div class="totals-item totals-item-total">
                                            <label>Artist Revenue:</label>
                                            <div class="totals-value" id="cart-total">£{{round($order_details->artist_revenue, 2)}}</div>
                                            <label>Affiliate Revenue<i>({{$order_details->delivery_name}})</i>:</label>
                                            <div class="totals-value" id="cart-total">£{{round($order_details->affiliate_revenue, 2)}}</div>
                                            <label>Admin Revenue<i>({{$order_details->packing_name}})</i>:</label>
                                            <div class="totals-value" id="cart-total">£{{round($order_details->admin_revenue, 2)}}</div>
                                        </div>
                                    </div> -->
                                    <div class="payment_details_wr">

                                        <div class= "payment_details" style="width:100%; display:block;">
                                            <div class="col-lg-6 no-padding">
                                                <div>Payment Type:</div>
                                                <div class="totals-value" id="cart-total">{{$order_details->payment_type == 1 ? "Card" : "Cash"}}</div>
                                            </div>
                                            <div class="col-lg-6 no-padding">    
                                                <div>Payment Reference:</div>
                                                <div class="totals-value" id="cart-total">{{$order_details->order_ref_number}}</div>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="row add_variant_section">
        <div class="col-lg-12">
        @if(count($shippingInfo) > 0)
            <div class="daily-feeds card">
            
                <div class="card-header">
                    <h3 class="h4">Order History {{ count($shippingInfo)}}</h3>
                </div>
           
                <div class="card-body no-padding">
                    <!-- Item-->
                    <div class="item">
                        <div class="feed d-flex justify-content-between"><div class="error" id="form_error2"></div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                  <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Order ID</th>
                                        <th>Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @php $i=1 @endphp
                                      @foreach($shippingInfo as $index => $value) 
                                      <tr>
                                        <th>{{ $index + 1}}</th>
                                        <th>{{ $value['created_at']}}</th>
                                        <th>{{ $value['order_id'] }}</th>
                                        @if ($value['status'] == 1)
                                        <th>Ready To Ship</th>
                                        @elseif ($value['status'] == 2)
                                        <th>Shipped</th>
                                        @elseif ($value['status'] == 3)
                                        <th>Arrived Hub</th>
                                        @elseif ($value['status'] == 4)
                                        <th>Out for Delivery</th> 
                                        @elseif ($value['status'] == 5)
                                        <th>Delivered</th>
                                        @elseif ($value['status'] == 6)
                                        <th>Cancelled</th>                       
                                        @endif
                                      </tr>
                                      @php $i = $i+1; @endphp
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                     @endif
                    </div>
                </div>
            </div>
        </div>
      </div>


                                </div>
                                <!--sales_stas-->

                            </div>
                            <!--/.advertise_sec-->


                        </div>
                    @php } else{  @endphp
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 nopadding">
                            {{ 'No Order Details Found' }}
                        </div>
                    @php } @endphp

                </div>
            </div>
        </div>
    </section>
    <!--/.dashboard artist-->

    <!-- return popup start -->

    <div class="modal fade changeuser" id="return_popup" role="dialog">
        <div class="modal-dialog guestdia">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="media_gal">
                    <h4 class="modal-title">Return to Cool Jelly Bean</h4>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal"  enctype="multipart/form-data" action="{{ url('fault_add') }}" method="POST" >
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="fault_product">Fault Product:</label>
                            <div class="col-sm-9 col-xs-12">
                            <input type="hidden" class="form-control" id="fault_product" name="fault_product">
                            <input readonly disable class="form-control" id="fault_product_name" name="fault_product_name">
                           
                                @if ($errors->has('fault_product'))
                                    <div class="error">{{ $errors->first('fault_product') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="fault_image">Fault Image:</label>
                            <div class="col-sm-9 col-xs-12">
                                <input required type="file" class="form-control" name="fault_image[]" maxlength="10" id="usr" value="{{ old('fault_image') }}" multiple>
                                @if ($errors->has('fault_image'))
                                    <div class="error">{{ $errors->first('fault_image') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-12" for="remark">Remark:</label>
                            <div class="col-sm-9 col-xs-12">
                                <textarea class="form-control" name="remarks">{{ old('remarks') }}</textarea>
                                @if ($errors->has('remarks'))
                                    <div class="error">{{ $errors->first('remarks') }}</div>
                                @endif 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                            <input type="hidden" value="{{ $order_details->id}}" name="order_id">
                                <button class="btn btn-default" type="submit">Save</button>
                                <a href="javascript:void(0);" class="btn btn-default exit_return">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="tooltip_content">
            <p>Lorem Ipsum how many characters etc.</p>
        </div>
    </div>
      <!--Review Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <form  enctype="multipart/form-data" action="" method="POST" role="form" id="review_save_form">
                      {{ csrf_field() }}         
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Review Rating</h3>
            <span class="star fa fa-star" id="star_1" data-id="1" onclick="star_rating(this)"></span>
            <span class="star fa fa-star" id="star_2" data-id="2" onclick="star_rating(this)"></span>
            <span class="star fa fa-star" id="star_3" data-id="3" onclick="star_rating(this)"></span>
            <span class="star fa fa-star" id="star_4" data-id="4" onclick="star_rating(this)"></span>
            <span class="star fa fa-star" id="star_5" data-id="5" onclick="star_rating(this)"></span>
        </div>
         <div class="error" id="review_error"></div>
        <input type="hidden" id="rating_value" name="rating_value" @if ($review_data) value=" {{$review_data->product_rating}}" @endif >
        <input type="hidden" id="customer_id" name="customer_id" value="{{$order_details->customer_id}}">
        <input type="hidden" id="order_id" name="order_id" value="{{$order_details->id}}">
        <input type="hidden" id="product_id" name="product_id" value="{{$order_product->merchandise_product_id}}">        
        <input type="hidden" id="review_id" name="review_id" @if ($review_data) value=" {{$review_data->id}}"
        @else{
           value="0"
         }
         @endif >        
        <div class="modal-body">
          <label><h3>Review</h3></label><br>
          <textarea id="review_des" name="review_des" rows="4" cols="50">@if ($review_data) {{$review_data->product_review}} @endif</textarea>
        </div>
        <div class="modal-footer">
          <input type="submit" class="" id="review_submit"  @if ($review_data) value="Update"
        @else{
           value="Submit"
         }
         @endif>
<!--           <button type="button" id="review_close" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
     </form>
      
    </div>
  </div>


    <!-- return popup end -->
    <!--footer-->
@endsection
@section('footer_script')

    <script type="text/javascript">
        var win_width = $(window).width();

        $(document).on('ready', function() {
            var cancel_url = "{{ url('order_cancel/'.$order_details->id) }}";
            $('.exit_return').click(function() {
                $('#return_popup').modal('hide');
            }); 

            $(document).on("click", ".return_order", function () {
                    var product_name = $(this).data('name');
                    var product_id = $(this).data('id');
                    $(".modal-body #fault_product_name").val( product_name );
                    $(".modal-body #fault_product").val( product_id );
                });

            $('.cancel_order').click(function(e) {
                e.preventDefault();
                var confirmation = confirm("Are you sure you want to Cancel this?");
                if(confirmation){
                    // $("#delete-button").attr("href", cancel_url);
                    window.location.href = cancel_url;
                }
                else{
                    return false;
                }
            }); 
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

            if($("#rating_value").val())
            {
            data_id=$("#rating_value").val();
            for(i=1; i<=data_id; i++)
            {
                $("#star_"+i).addClass("checked");
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
        function star_rating(elem) 
        {
            var id = $(elem).attr("id");
            var class_name = $(elem).attr("class");
            var data_id = $(elem).attr("data-id");
            for(i=1; i<=5; i++)
            {
                $("#star_"+i).removeClass("checked");
            }
            for(i=1; i<=data_id; i++)
            {
                $("#star_"+i).addClass("checked");
            }
            $("#rating_value").val(data_id);

            // if ($("#"+id).hasClass("checked")) {
            //  $("#"+id).removeClass("checked");  
            //  alert(data_id);
            // }
            // else{
            //  $("#"+id).addClass("checked"); 
            //  alert(data_id);
            // }        
        }  
        var review_save_form = $("#review_save_form");  
        review_save_form.submit(function(e){
                e.preventDefault();
                var rating_value=$("#rating_value").val();
                var customer_id=$("#customer_id").val();
                var order_id=$("#order_id").val();
                var product_id=$("#product_id").val();
                var review_des=$("#review_des").val();
                var review_id=$("#review_id").val();
            $.ajax({
                          url:"{{route('review_save')}}",
                          type:'POST',
                          data:{
                                "_token": "{{ csrf_token() }}",
                                "product_rating": rating_value,
                                "customer_id": customer_id,
                                "order_id": order_id,
                                "product_id": product_id,
                                "review_des": review_des,
                                "review_id": review_id,
                               },
                          success:function(data){
                                if(data.status==false)
                                {
                                  $.each(data.errors,function(index,value){
                                    $("#validation_prepend").remove();
                                                $('#review_error ').append($('<div id="validation_prepend" style="color:red;">'+value[0]+'</div>'));
                                                }); 
                                }
                                else
                                {
                                    $("#validation_prepend").remove();
                                    $("#review_submit").attr('value', 'Update');
                                    $("#review_id").val(data.id);  
                                    $("#review_close").click(); 
                                    $('#myModal').modal('toggle');
                                }
                                //alert(JSON.stringify(data.id));
                              },
                      }); 

        });  
    </script>
    <style>
    .payment_details div{
        display: inline-block;
    }
    a.return_order, a.cancel_order, a.return_order_view, a.review_order {
        width: 100px;
        display: block;
        float: right;
        padding: 10px;
        border-radius: 5px;
        background: #f13b3b;
        text-align: center;
        color: #fff;
        margin: 0 10px;
        text-decoration:none;
    }
.checked {
  color: orange;
}    
    </style>
@endsection
