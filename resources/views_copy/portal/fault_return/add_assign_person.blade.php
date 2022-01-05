@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">@lang('general.Fault_return')</h2>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                <form  action="{{ route('admin.fault_add') }}"  enctype="multipart/form-data" method="POST" role="form"  class="custom-form">
                
                {{ csrf_field() }}      
                @if ($alert = Session::get('alert-success'))
                <div class="alert alert-warning">
                  {{ $alert }}
                </div>
                @endif        
                <input type="hidden" name="status" value="0">                  
                  <div class="form-group">
                    <label for="usr">@lang('general.Customer_Name') <span class="mandatory_field">*<span></label>
                    <input type="text" class="form-control" name="customer_id" id="usr" value="{{ old('customer_id') }}">
                    @if ($errors->has('customer_id'))
                    <div class="error">{{ $errors->first('customer_id') }}</div>
                    @endif   
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.Assign_Staff_Name') <span class="mandatory_field">*<span></label>
                    <input type="text" class="form-control" name="assign_staff_id" id="usr" value="{{ old('assign_staff_id') }}">                                      
                    @if ($errors->has('assign_staff_id'))
                    <div class="error">{{ $errors->first('assign_staff_id') }}</div>
                    @endif                    
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.Fault_image') <span class="mandatory_field">*<span></label>
                    <input required type="file" class="form-control" name="fault_image[]" maxlength="10" id="usr" value="{{ old('fault_image') }}" multiple>
                    @if ($errors->has('fault_image'))
                    <div class="error">{{ $errors->first('fault_image') }}</div>
                    @endif                     
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.Status') <span class="mandatory_field">*<span></label>
                    <!-- <input type="text" class="form-control" name="status" maxlength="10" id="usr" value="{{ old('status') }}"> -->
                      <select name="status" id="" class="form-control">
                        <option disabled selected value>Please select the Status</option>
                        <option value="pending" {{ (old('status') == "pending" ? "selected":"") }}>Pending</option>
                        <option value="processing" {{ (old('status') == "processing" ? "selected":"") }}>{{ "Processing" }}</option>
                        <option value="completed" {{ (old('status') == "completed" ? "selected":"") }}>{{ "Completed" }}</option>
                      </select> 
                                      @if ($errors->has('status'))
                    <div class="error">{{ $errors->first('status') }}</div>
                    @endif                     
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.Remarks') <span class="mandatory_field">*<span></label>
                    <textarea class="form-control" name="remarks">{{ old('remarks') }}</textarea>
                    @if ($errors->has('remarks'))
                    <div class="error">{{ $errors->first('remarks') }}</div>
                    @endif                     
                  </div>   
                  <div class="form-group">
                    <input type="submit" class="" id="usr">
                  </div>               
                </form> 
                </div>               
              </div>
            </div>
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection