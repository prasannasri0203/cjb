@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">@lang('Enquiry Details')</h2>
	</div>
</header>
<style>



    .custom-order-modal-title{
        margin-left:27px;
    }
    .custom-order-modal-upload-btn{
        height: 45px;
        padding-left: 5px;
    }
    .success{
      color: #22ce03;
  }

  a:not([href]):not([tabindex]){
      color: #fff;
  }
  a:not([href]):not([tabindex]):hover{
      color: #fff;
  }
  .paginate {
      float: right
  }
  .product-table{
      background-color: #e8e8e8 !important;
  }
  .product-image img{
    width: 100%;
}
.product-details {
    float: left;
    width: 100%;
}
.totals  {
    border-top: 3px solid #ed1277;
    border-bottom: 3px solid #ed1277;
    padding: 8px 0px;
    margin: 15px 0;
}
.totals .totals-item {
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin-bottom: 5px;
}
.totals .totals-item label {
    margin-bottom: 0;
    float: left;
    clear: both;
    text-align: right;
    color: #212121;
    font-weight: 100;
    font-size: 18px;
}
.totals .totals-item .totals-value {
    float: right;
    text-align: right;
    font-size: 18px;
    font-family: "Rubik-Bold";
    font-weight: bold;
}
.sales_stats.orders_tab.order_details{
  margin-top:20px; 
}
.product .product-details .product-title {
    font-size: 18px;
    color: #212121;
    margin-right: 20px;
    font-weight: 600;
}
.order_details .product_author {
    font-size: 16px;
}
.product_author a {
    color: #0083b4;
    cursor: pointer;
    text-decoration: underline;
}
a.return_order, a.cancel_order, a.return_order_view, a.review_order{
  width: 120px !important;
}
.product .product-details .product-description {
    margin: 5px 0px 5px 0;
    line-height: 1.4em;
}
.order_details_header .product-details ul li {
    color: #212121;
    font-size: 16px;
    width: 100%;
    display: inline-block;
    padding-bottom: 4px;
    line-height: 1.4;
}
.order_details_header .product-details ul li span:first-child,.product-price span:first-child {

    max-width: 100%;
    width: 107px;
    font-weight: normal !important;
}
.order_details_header .product-price span:nth-child(2) {
    float: right;
    font-family: "Rubik-Regular";
    font-size: 16px;
    font-weight: 900;
}
.card
{
    background-color: #fff;
    border: 0 solid #eee;
    border-radius: 0;
    width: 156%;
}

.daily-feeds.card {
    width: 100% !important;
}

.add_variant_section {
    width: 100% !important;
}


.btn-primary{ margin-right: 10px; }





</style>
<section>

    <div class="dashboard-sec slidpad">
        <div class="container dashbo">

            <div class="row1">

                @php if($order_details != null){ @endphp
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">

                    <!--advertise_sec-->

                    <div id="cust_men_one" class="advertise_sec advertise_over order_details_header order_details_header_comm">
                        <!--sales_stas-->
                        <div class="filtersec order_filter">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <h3>Order Information - {{ $order_details->order_id}}</h3>

                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">

                                     <!--  <a href="{{url('admin/add_shipping_details').'/'.$order_details['id']}}" class="btn btn-primary" style="float: right;">Add Shipping Details</a> -->
                                     @if(is_null($order_details['release_status']))       
                                     <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" data-id="1"  onclick="setOrderId({{$order_details['id']}})" data-original-title="Delete">
                                        Paid
                                    </a>
                                    @else
                                    <a href="#" class="btn btn-primary">Not Paid</a>
                                    @endif
                                </div>
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
                                        <td>{{!empty($customer->name)?$customer->name:''}}</td>
                                        <td style="text-align: left;"> 
                                          @php if($order_details->customerBillingAddress != null){ @endphp
                                          {{$order_details->customerBillingAddress->no}},
                                          <br> {{$order_details->customerBillingAddress->street_1}}, {{$order_details->customerBillingAddress->street_2}}
                                          <br> {{$order_details->customerBillingAddress->region}},
                                          <br> {{$order_details->customerBillingAddress->country}}, {{$order_details->customerBillingAddress->zipcode}}.
                                          <br> {{$order_details->customerBillingAddress->contact_no}}.
                                          <br> {{ ($order_details->customerBillingAddress->landmark != null ) ? $order_details->customerBillingAddress->landmark:''}}.
                                          @php } @endphp
                                      </td>
                                      <td style="text-align: left;">
                                          @php if($order_details->customerBillingAddress != null){ @endphp
                                          {{$order_details->customerBillingAddress->no}},
                                          <br> {{$order_details->customerBillingAddress->street_1}}, {{$order_details->customerBillingAddress->street_2}}
                                          <br> {{$order_details->customerBillingAddress->region}},
                                          <br> {{$order_details->customerBillingAddress->country}}, {{$order_details->customerBillingAddress->zipcode}}.
                                          <br> {{$order_details->customerBillingAddress->contact_no}}.
                                          <br> {{ ($order_details->customerBillingAddress->landmark != null ) ? $order_details->customerBillingAddress->landmark:''}}.
                                          @php } @endphp

                                      </td>
                                      <td>{{ $order_details->created_at}}</td>
                                      <td>{{($shippingDate==null)?'Not Available': $shippingDate->created_at}}</td>
                                      <td>{{ (($order_details->status ==1) ? 'Pending' :( ($order_details->status ==2) ? 'Completed' : (($order_details->status ==3) ? 'Cancelled' : 'Return') ) )}}</td>
                                  </tr>

                              </tbody>
                          </table>



                      </div>

                      <h3>Items Ordered</h3> 

                      @foreach($order_details->orderItemDetails as $value) 
                      <?php
                      $order_product_variant='';
                      $variant_ref_no='';
                      $order_product_variant=optional($value->orderProducts)->variantDetails;
                      $variant_ref_no=!empty($order_product_variant->product_variant_ref_no) ? $order_product_variant->product_variant_ref_no : " ";  
                      ?>
                      <div class="shopping-cart">

                        <div class="product">
                          <div class="row mt-5">
                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <div class="product-image">
                                    <?php // dd($value->orderProducts->id); //echo $count = count($value->orderProducts->merchProductImage);
                                    //supplier list count
                                        $pro_sup_list=App\ProductSupplier::where('product_id',optional($value->orderProducts)->product_id)->pluck('supplier_id');
                                        if($pro_sup_list){
                                            $sup_list=App\Supplier::whereIn('id',$pro_sup_list)->get(); 
                                        }
                                        $cnt_supplier=count($sup_list);
                                        echo $cnt_supplier;
                                    // tracking change
                                        $trackhistory=App\TrackingHistory::where('order_id',$value->order_id)->where('item_id',optional($value->orderProducts)->id)->orderBy('id', 'ASC')->get();
                                       // print_r(count($trackhistory));
                                        $cnt_track=count($trackhistory);


                                    $img=$value->orderProducts; 
                                    $image_path = '';
                                    if($img!=''){
                                        $image_path=optional($img->merchProductImage[0])->image;
                                    }
                                    ?>
                                    <img class="img-responsive" src="{{URL::to('/merchandise-img/' .$image_path )}}"
                                    >                                             
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
                                <div class="product-details">
                                    <div class="product-title">{{optional($value->orderProducts)->name_creation }}

                                     <a href="{{url('admin/add_shipping_item_details').'/'.$order_details['id'].'/'.optional($value->orderProducts)->id}}" class="btn btn-primary" style="float: right;">Add Item Shipping Details</a>
                                     @if($cnt_track > 0)
                                         <a href="#" class="supplier_change btn btn-primary" data-toggle="modal"   onclick="nottrackchnge_supplier('{{$cnt_track}}')"  style="float: right;">   Supplier Change   </a>
                                     @endif

                                     @if($cnt_supplier > 1 && $cnt_track < 0)
                                     <a href="#" class="supplier_change btn btn-primary" data-id="{{$value->supplier_id}}"  data-toggle="modal" data-target="#supplier_change_popup"   onclick="chnge_supplier('{{$value->supplier_id}}','{{optional($value->orderProducts)->product_id }}','{{$value->id}}')"  style="float: right;">   Supplier Change   </a> 
                                     @elseif($cnt_supplier <= 1 && $cnt_track < 0)                                     
                                     <a href="#" class="supplier_change btn btn-primary" data-toggle="modal"   onclick="notchnge_supplier('{{$cnt_supplier}}')"  style="float: right;">   Supplier Change   </a> 
                                     @endif

                                 </div>
                                 @if($order_details->status ==2)
                                 @if(!(in_array($value->merchandise_product_id,$return_array)))
                                 <!-- <a href="#" class="return_order" data-name="{{ optional($value->orderProducts)->merchandise_product_name }}" data-id="{{ $value->merchandise_product_id }}" data-toggle="modal" data-target="#return_popup"> Return </a> -->
                                 @else
                                 <!-- <a href="{{ url('return_view/'.$order_details->id.'/'. $value->merchandise_product_id) }}" class="return_order_view" >View Return</a> -->
                                 @endif
                                 @endif
                                 @if($order_details->status == 4)
                                 <!-- <a href="{{ url('return_view/'.$order_details->id.'/'. $value->merchandise_product_id) }}" class="return_order_view" >View Return</a> -->
                                 @endif                                                    
                                 <div class="product_author">   
                                    <span>By <a>Mr/Mrs {{ !empty($value->orderProducts) ? optional($value->orderProducts->artistDetails)->name : " "  }}</a></span>
                                </div>
                                <div class="product-description">
                                    <ul>
                                        <li>
                                            <span>Price (each):</span>
                                            <span style="font-weight: 800;">£{{optional($value->orderProducts)->product_price }}</span>
                                        </li>
                                        <li>
                                            <span> Choosed Option:</span>
                                            <span> 
                                                {{!empty($value->orderProducts->variantDetails->variant_name) ? optional($value->orderProducts->variantDetails)->variant_name : " "}}

                                            </span>
                                        </li> 
                                        <li>
                                            <span> Supplier Name :</span>
                                            <span> 
                                                {{!empty($value->supplierName->name) ? optional($value->supplierName)->name : " "}}

                                            </span>
                                        </li>
                                        @if($variant_ref_no)
                                        <li>
                                            <span> Variant Ref No:</span>
                                            <span> 
                                                {{ !empty($variant_ref_no) ? $variant_ref_no : " "}}

                                            </span>
                                        </li> 
                                        @endif
                                        <li>
                                            <span> Quantity:</span>
                                            <span> {{ $value->product_quantity}}</span>
                                        </li>

                                    </ul>
                                </div>
                                <div class="product-price">
                                    <span>TOTAL:</span>
                                    <span>£{{ $value->product_quantity * optional($value->orderProducts)->product_price }}</span>
                                </div>
                            </div> 
                        </div> 
                    </div>                      
                </div>
            </div>
            @endforeach



            <div class="totals">

                <div class="totals-item totals-item-total">
                    <label>Sub Total:</label>
                    <span class="totals-value" id="cart-total">£{{$order_details->sub_total}}</span>
                </div>
                <div class="totals-item totals-item-total">
                    <label>Delivery Total<i>({{$order_details->delivery_name}})</i>:</label>
                    <span class="totals-value" id="cart-total">£{{$order_details->delivery_amount}}</span>
                </div>
                <div class="totals-item totals-item-total">
                    <label>Packing Total<i>({{$order_details->packing_name}})</i>:</label>
                    <span class="totals-value" id="cart-total">£{{$order_details->packing_amount}}</span>
                </div>
                <div class="totals-item totals-item-total">
                    <label>Additional Charges:</label>
                    <span class="totals-value" id="cart-total">£{{optional($additional_charge)->print_price}}</span>
                </div>
                <div class="totals-item totals-item-total">
                    <label>Order Total:</label>
                    <span class="totals-value" id="cart-total">£{{$order_details->grand_total}}</span>
                </div>
                <div class="totals-item totals-item-total">
                    <label>Payment Type:</label>
                    <span class="totals-value" id="cart-total">{{$order_details->payment_type == 1 ? "Card" : "Cash"}}</span>
                </div>
                <div class="totals-item totals-item-total">
                    <label>Payment Reference:</label>
                    <span class="totals-value" id="cart-total">{{$order_details->order_ref_number}}</span>
                </div>
            </div>
            <h4>Commission</h4>

            <div class="totals">

                <div class="totals-item totals-item-total">
                    <label>Artist Revenue: <i>{{$order_details->artist_percent}} %</i></label>
                    <span class="totals-value" id="cart-total">£{{round($order_details->artist_percent * ($order_details->grand_total/100), 2)}}</span>
                </div>
                <div class="totals-item totals-item-total">
                   <label>Affiliate Revenue: <i>{{$order_details->affiliate_percent}} %</i> </label>
                   <span class="totals-value" id="cart-total">£{{round($order_details->affiliate_percent * ($order_details->grand_total/100), 2)}}</span>
               </div>
               <div class="totals-item totals-item-total">
                   <label>Admin Revenue: <i>{{$order_details->admin_percent}} %</i></label>
                   <span class="totals-value" id="cart-total">£{{round($order_details->admin_percent * ($order_details->grand_total/100), 2)}}</span>
               </div>                                           



                                    <!-- <div class="payment_details_wr">

                                        <div class= "payment_details" style="width:100%; display:block;">
                                            <div class="col-lg-6 no-padding">
                                                <label>Payment Type:</label>
                                                <span class="totals-value" id="cart-total">{{$order_details->payment_type == 1 ? "Card" : "Cash"}}</span>
                                            </div>
                                            <div class="col-lg-6 no-padding">    
                                                <label>Payment Reference:</label>
                                                <span class="totals-value" id="cart-total">{{$order_details->order_ref_number}}</span>
                                            </div>    
                                        </div>
                                    </div> -->

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

            @if(count($shippingInfo) > 0)

            <div class="row add_variant_section">
                <div class="col-lg-12">
                    <div class="daily-feeds card">
                        <div class="card-header">
                            <h3 class="h4">Order History</h3>
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
                                            <th> Item </th>
                                            <th>Shipping Company</th>
                                            <th>Order status</th> 
                                            <th>Comments</th> 
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @php $i=1 @endphp
                                      @foreach($shippingInfo as $index => $value) 
                                      <tr>
                                        <th>{{ $index + 1}}</th> 
                                        <th>{{optional($value->orderTrackProducts)->name_creation }}</th>
                                        <th>{{ $value->shipping_company}}</th>
                                        @if ($value['order_status_id'] == 1)
                                        <th>Ready To Ship</th>
                                        @elseif ($value['order_status_id'] == 2)
                                        <th>Shipped</th>
                                        @elseif ($value['order_status_id'] == 3)
                                        <th>Arrived Hub</th>
                                        @elseif ($value['order_status_id'] == 4)
                                        <th>Out for Delivery</th> 
                                        @elseif ($value['order_status_id'] == 5)
                                        <th>Delivered</th>
                                        @elseif ($value['order_status_id'] == 6)
                                        <th>Cancelled</th>                       
                                        @endif
                                        <th>{{ $value['comments'] }}</th>   
                                        <th>{{ date('Y-m-d h:i A', strtotime($value['created_at'])) }}</th>                                       
                                    </tr>
                                    @php $i = $i+1; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endif

@if(count($faults_returns) > 0)
<div class="row add_variant_section">
    <div class="col-lg-12">
        <div class="daily-feeds card">
            <div class="card-header">
                <h3 class="h4">Faults and Returns History</h3>
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
                                <th>Shipping Company</th>
                                <th>Order status</th>
                                <th>Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                          @php $i=1 @endphp
                          @foreach($faults_returns as $index => $value) 
                          <tr>
                            <th>{{ $index + 1}}</th>
                            <th>{{ $value->product_name }}</th>
                            <th>{{ $value->remarks }}</th>
                            <th>{{ date('Y-m-d h:i A', strtotime($value->created_at)) }}</th>
                        </tr>
                        @php $i = $i+1; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@endif
</section>
<!--/.dashboard artist-->

<!-- return supplier change popup start -->


<div class="modal fade changeuser" id="supplier_change_popup" role="dialog">
    <div class="modal-dialog guestdia">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="custom-order-modal-title modal-title">Supplier Change </h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
            <form class="form-horizontal"  enctype="multipart/form-data" action="{{ route('admin.supplier_change') }}" method="POST" >
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-3 col-xs-12" for="fault_product">Supplier List:</label>
                    <div class="col-sm-9 col-xs-12"> 
                        <input type="hidden" class="form-control" id="pro_orderid" name="pro_orderid" value="">
                        <input type="hidden" class="form-control" id="procut_supplier_id" name="procut_supplier_id" value="">
                        <input type="hidden" class="form-control" id="procut_supplier_id" name="procut_supplier_id" value="">
                        <input type="hidden" class="form-control" id="pro_id" name="pro_id" value="">
                        <select name="supplierid" id="pro_supid">

                        </select>

                        @if ($errors->has('fault_product'))
                        <div class="error">{{ $errors->first('fault_product') }}</div>
                        @endif
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt"> 
                    <button class="btn btn-default" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>

</div>
</div>

<!-- return popup start -->

<div class="modal fade changeuser" id="return_popup" role="dialog">
    <div class="modal-dialog guestdia">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
             <h4 class="custom-order-modal-title modal-title">Return to Cool Jelly Bean</h4>
             <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <form class="form-horizontal"  enctype="multipart/form-data" action="{{ url('fault_add') }}" method="POST" >
                @csrf
                <div class="form-group">
                    <label class="control-label col-sm-3 col-xs-12" for="fault_product">Fault Product:</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="hidden" class="form-control" id="fault_product" name="fault_product">
                        <input type="text" class="form-control" id="fault_product_name" name="fault_product_name">

                        @if ($errors->has('fault_product'))
                        <div class="error">{{ $errors->first('fault_product') }}</div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-xs-12" for="fault_image">Fault Image:</label>
                    <div class="col-sm-9 col-xs-12">
                        <input required type="file" onchange="loadFile(event)" class="custom-order-modal-upload-btn form-control" name="fault_image[]" maxlength="10" id="usr" value="{{ old('fault_image') }}" multiple>
                        @if ($errors->has('fault_image'))
                        <div class="error">{{ $errors->first('fault_image') }}</div>
                        @endif
                        <img id="output" height="70px;"/>
                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
  }
};
</script>
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
          <input type="hidden" id="order_id" name="order_id" value="{{$order_details->order_id}}">
          <input type="hidden" id="product_id" name="product_id" value="{{@$order_product->merchandise_product_id}}">        
          <input type="hidden" id="review_id" name="review_id" @if ($review_data) value=" {{@$review_data->id}}"
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
      <button type="button" id="review_close" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
</form>

</div>
</div>

<!-- return popup end -->
<!-- modal release start -->
<div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setArtistId('')"><span aria-hidden="true">×</span></button>
            </div>
            <form method="POST" action="{{url('admin/delivered')}}">
                <div class="modal-body">
                    Are You sure want to release this?
                    <input type="hidden" value="" id="orderId" name="orderId">
                    @csrf
                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-success" >yes</button>
                    <button type="button" class="btn btn-danger" onclick="setOrderId('')"  data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal release end -->
<!--footer-->

@endsection
@section('footer_script')

<script type="text/javascript">
    var win_width = $(window).width(); 
    function setOrderId(id){
        $('#orderId').val(id);
    }

    // not  change for tracking supplier
    function nottrackchnge_supplier(cnt_track) { 
        if(cnt_track >= 0){
            alert("Shipping Already started we can't change the supplier");
        }
    }
    // not change supplier
    function notchnge_supplier(cnt_sup) {
        if(cnt_sup<=1){
            alert("You can't change Supplier this item have in one supplier only");
        } 
    }

// change supplier list  pro_supid
function chnge_supplier(id,pid,orderid) {
    $('#procut_supplier_id').val(id);
    $('#pro_id').val(pid);
    $('#pro_orderid').val(orderid);
    $.ajax({
      url:"{{route('admin.get_pro_supplier')}}",
      type:'POST',
      data:{
        "_token": "{{ csrf_token() }}", 
        "product_id": pid, 
    },
    success:function(data){ 
        sup_list='';  
        if(data.status==true)
        {

            sup_list += '<option value="">Select  Supplier Name </option>';    
            $.each(data.supplier_list,function(index,value){ 
             if(id==value.id) 
             {
               sup_list+='<option value='+value.id+' selected>'+value.name+'</option>';
           }else{
             sup_list+='<option value='+value.id+'>'+value.name+'</option>';
         }
     }); 
            $('#pro_supid').html(sup_list);

        }
        console.log(data.supplier_list);

    },
}); 
}

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
                    $('#review_error ').append($('<div id="validation_prepend">'+value[0]+'</div>'));
                }); 
              }
              else
              {
                $("#validation_prepend").remove();
                $("#review_submit").attr('value', 'Update');
                $("#review_id").val(data.id);  
                $("#review_close").click(); 
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
