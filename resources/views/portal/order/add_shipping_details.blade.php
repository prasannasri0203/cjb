@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">@lang('general.add_shipping_details') </h2>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                <form  action="{{ route('admin.save_shipping_details') }}"  enctype="multipart/form-data" method="POST" role="form"  class="custom-form">
                
                {{ csrf_field() }}      
                @if ($alert = Session::get('alert-success'))
                <div class="alert alert-warning">
                  {{ $alert }}
                </div>
                @endif        
                <input type="hidden" name="status" value="0">   
                <input type="hidden" name="order_prime_id" value="{{$id}}">                  
                  <div class="form-group">
                    <label for="usr">@lang('general.order_id') <span class="mandatory_field">*<span></label>
                    <input type="text" class="form-control" name="order_id" maxlength="10" id="usr" value="{{ $order_detail->order_id }}" >
                    @if ($errors->has('order_id'))
                    <div class="error">{{ $errors->first('order_id') }}</div>
                    @endif   
                  </div>
                  <!-- <div class="form-group">
                    <label for="usr">@lang('general.shipping_method') <span class="mandatory_field">*<span></label>
                    <select name="shipping_method" id="" class="form-control">
                      <option disabled selected value>Please select the Shipping Method</option>
                      <option value="pending" {{ (old('shipping_method') == "pending" ? "selected":"") }}>{{"Cash On Delivery"}}</option>
                      <option value="processing" {{ (old('shipping_method') == "processing" ? "selected":"") }}>{{ "Flat Rate" }}</option>                      
                    </select>                                       
                    @if ($errors->has('shipping_method'))
                    <div class="error">{{ $errors->first('shipping_method') }}</div>
                    @endif                    
                  </div> -->
                  <div class="form-group">
                    <label for="usr">@lang('general.shipping_company') <span class="mandatory_field">*<span></label>
                    <select name="" id="shipping_company_id" class="form-control"  @if ($trackhistory) disabled  @endif >
                      <option disabled selected value>Please select the Shipping Company</option>
                      <option value="DHL" {{ (old('shipping_company') == "pending" ? "selected":"") }}@if ($trackhistory) @if ($trackhistory->shipping_company == 'DHL')  selected @endif @endif>{{"DHL"}}</option>
                      <option value="Fedex" {{ (old('shipping_company') == "processing" ? "selected":"") }} @if ($trackhistory) @if ($trackhistory->shipping_company == 'Fedex')  selected @endif @endif>{{ "Fedex" }}</option>
                      <option value="Blue Dart" {{ (old('shipping_company') == "completed" ? "selected":"") }} @if ($trackhistory) @if ($trackhistory->shipping_company == 'Blue Dart')  selected @endif @endif>{{ "Blue Dart" }}</option>
                    </select> 
                    @if ($errors->has('shipping_company'))
                    <div class="error">{{ $errors->first('shipping_company') }}</div>
                    @endif  
                    <input type="hidden" id="shipping_company_hidden" name="shipping_company"  @if ($trackhistory) value="{{ $trackhistory->shipping_company }}"  @endif >                   
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.shipping_date') <span class="mandatory_field">*<span></label>
                    <input type="text" id="date"  name="shipping_date" class="form-control" placeholder="Shipping Date" value="{{(old('shipping_date') )}}" autocomplete="off">
                    @if ($errors->has('shipping_date'))
                    <div class="error">{{ $errors->first('shipping_date') }}</div>
                    @endif                     
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.tracking_num') <span class="mandatory_field">*<span></label>
                    <input  type="text" class="form-control" name="tracking_num" maxlength="10" id="usr"  @if ($trackhistory) value="{{ $trackhistory->tracking_num }}" readonly @endif    >
                    @if ($errors->has('tracking_num'))
                    <div class="error">{{ $errors->first('tracking_num') }}</div>
                    @endif                     
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.order_status') <span class="mandatory_field">*<span></label>                   
                      <select name="order_status_id" id="" class="form-control">                      
                        <option disabled selected value>Please select the Status</option>
                        @foreach($status_list as $list)                       
                          <option value="{{ $list->id }}" {{ (old('order_status_id') == $list->id ? "selected":"") }}>{{ $list->order_status_label}}</option>
                          <!-- <option value="pending" {{ (old('status') == "pending" ? "selected":"") }}>Pending</option> -->
                        @endforeach                        
                      </select> 
                                      @if ($errors->has('order_status_id'))
                    <div class="error">{{ $errors->first('order_status_id') }}</div>
                    @endif                     
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.comments') </label>
                    <textarea class="form-control" name="comments">{{ old('comments') }}</textarea>
                    @if ($errors->has('comments'))
                    <div class="error">{{ $errors->first('comments') }}</div>
                    @endif                     
                  </div>   
                  <div class="form-group">
                    <input type="submit" class="" id="usr">
                    <a href="{{ URL('admin/order_view/'.$id) }}" class="btn btn-danger" style="color: #fff;">Cancel</a>
                  </div>               
                </form> 
                </div>               
              </div>
            </div>
@endsection

@section('footer_script')
<script type="text/javascript">

$(document).ready(function($) {

  $('#shipping_company_id').change(function() {
    //alert($('#shipping_company_id').val());
    $("#shipping_company_hidden").val($('#shipping_company_id').val());
  });

$('#date').datepicker({
	uiLibrary: 'bootstrap',
	// endDate : 'now',
  format: 'dd-mm-yyyy',
}).on('change', function(){
        $('.datepicker').hide();
    }); 

});
</script>
@endsection