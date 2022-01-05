@extends('front.app')


@section('header_script')
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')


          <section>   
          <div class="dashboard-sec slidpad">
            <div class="container dashbo">
              <div class="row">
              <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 ">

<ul class="left_menu regular slider">
<li>
        <a href="{{ url('/') }}">
            <i class="fa fa-home"></i>
            <span> Home</span>
        </a>
    </li>
    <li class="active">
        <a href="{{ url('order_list') }}">
            <i class="fas fa-shopping-basket" aria-hidden="true"></i>
            <span> Orders</span>
        </a>
    </li>

    <li>
        <a href="{{ url('edit-profile') }}">
            <i class="fas fa-edit"></i>
            <span> Edit Profile</span>
        </a>
    </li>
    <li>
        <a href="customer_addressbook.html">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span> Address Book</span>
        </a>
    </li>

</ul>

</div>
<div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 nopadding"> 
  <div class="view_return_bg_white">           
			          <div class="card">
                

                <table class="table advertise_sec ">
                <thead>
                  <tr>
                      @foreach($fault_edit->orderDetails->orderItemDetails as $value) 
                      @if($fault_edit->product_id == $value->merchandise_product_id)  
                      <div class="shopping-cart">
                            <div class="product">
                                <div class="product-image">
                                    <img src="{{URL::to('/merchandise-img/' .$value->orderProducts->merchProductImage[0]->image)}}">
                                </div>
                                <div class="product-details">
                                    <div class="product-title">{{$value->orderProducts->merchandise_product_name }}</div>
                                    
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
                                            <span>TOTAL:</span>
                                            <span>£{{ $value->product_quantity * $value->orderProducts->product_price }}</span>
                                        </div>
                                    </div>                                                   
                                </div>

                            </div>

                        </div>
                    @endif
                    @endforeach
                  </tr> 
                      <tr>
                      <th>@lang('general.order_id')</th>
                      <th>{{ $fault_edit->orderDetails->order_id }}</th>
                      </tr>
                      <tr>
                      <th>@lang('general.Customer_Name')</th>
                      <th>{{($fault_edit->customerName != null) ? $fault_edit->customerName->first_name : ""}} {{$fault_edit->customerName->last_name}}</th>
                      </tr>
                      <tr>
                      <th>@lang('general.Assign_Staff_Name')</th>
                      <th>{{($fault_edit->staffName != null) ? $fault_edit->staffName->first_name :""}} {{ ($fault_edit->staffName != null )? $fault_edit->staffName->last_name : 'Staff Yet Assign'}}</th>
                      </tr>  
                                           
                      <tr>
                      
                      <th>@lang('general.Status')</th>
                      <th>{{ $fault_edit->fault_history->status }}</th>
                      </tr>
                      <tr>
                      <th>@lang('general.Remarks')</th>
                      <th>{{ $fault_edit->fault_history->remarks }}</th>
                      </tr>
                      <th>@lang('general.Fault_image')</th>
                      <th>
                       @php $images = explode(',',$fault_edit->fault_image->fault_image); @endphp
                       @foreach($images as $image)
                      <img src="{{URL::to('/portal/img/fault/' .$image)}}"   alt="" width="120px" height="120px" class="fault_image"/>
                      @endforeach  </th>
                      </tr>
                      <tr>
                        <th></th>
                        <th></th>
                      </tr>
                </thead>
          </table>
          </div>
                <h4  style="margin-bottom:20px!important;">@lang('general.contact')</h4>
                  @comments([
                      'model' => $fault_edit,
                      'approved' => true
                  ])
                </div>               
              </div>
            </div>
                  </div>
                  </div>
                  <section>  
@endsection
@section('footer_script')

<style>
.view_return_bg_white{
  background:#fff;
  padding: 20px;
}
.view_return_bg_white .product-title{
  font-size:24px !important;
}
.view_return_bg_white .product_author {
    font-size: 16px;
}
.view_return_bg_white .product-description li{
  color: #212121;
    font-size: 16px;
    width: 100%;
    display: inline-block;
    padding-bottom: 4px;
    line-height: 1.4;
}
.view_return_bg_white .product-details ul li span:first-child{
  max-width: 100%;
    width: 145px;
    color: #383838;
    display: inline-block;
}
.view_return_bg_white .product-details ul li span:nth-child(2) {
    color: #212121;
    width: 30%;
    display: inline-block;
}
.view_return_bg_white .product-price span:nth-child(2) {
    float: right;
    font-family: "Rubik-Regular";
    font-size: 16px;
    font-weight: 900;
}
.view_return_bg_white table tr th:nth-child(2),.view_return_bg_white table tr td:nth-child(2){
  text-align:left;
  width:80%;
  font-size: 15px !important;
  font-weight: bold !important;
}
.view_return_bg_white table tr:last-child th{
  padding-bottom:25px;
}
.view_return_bg_white .table>thead>tr>th{
  border:0;
  vertical-align:top;
  color: #212121;
  font-weight: 100;
  font-size: 16px;
}
.view_return_bg_white .media{
  display:flex;
  align-items:flex-start;
}
.view_return_bg_white .mr-3{
  margin-right: 1rem!important;
}
.view_return_bg_white .media-body {
    -ms-flex: 1;
    flex: 1;
}
.view_return_bg_white .mb-1,.view_return_bg_white .my-1 {
    margin-bottom: .25rem!important;
}
.view_return_bg_white.mt-0,.view_return_bg_white .my-0 {
    margin-top: 0!important;
}
.view_return_bg_white .text-muted {
    color: #6c757d!important;
}
.view_return_bg_white .btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 13px;
    line-height: 1.5;
    border-radius: 0.2rem;
}
.view_return_bg_white .text-uppercase {
    letter-spacing: 0.2em;
    text-transform: uppercase;
}
.view_return_bg_white .text-danger {
    color: #dc3545 !important;
}
.view_return_bg_white h4 {
  font-weight: bolder;
}
.view_return_bg_white .advertise_sec{
  border-bottom: 3px solid #cef9ff;
}
.view_return_bg_white .btn-outline-success {
    color: #28a745;
    background-color: transparent;
    background-image: none;
    border:1px solid #28a745 !important;
}
.product-price{
  margin-top: 30px; 
}
@media (max-width:767px){
  .view_return_bg_white table{
    display:flex;
  }
  .view_return_bg_white table thead{
    width:100%;
  }
  .view_return_bg_white table tr{
    display:flex;
    flex-direction:column;
    align-items:flex-start;
    width:100%;
  }
  .view_return_bg_white table tr th{
    width:100%;
    text-align: left !important;
  }

}
</style>



  <!-- end of plugin scripts -->
@endsection