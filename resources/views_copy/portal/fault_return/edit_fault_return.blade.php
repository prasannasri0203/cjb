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
                <h2 >@lang('general.order_details')</h2>
			          <div class="card">
                

                <table class="table">
                <thead>
                      <tr>
                      <th>@lang('general.order_id')</th>
                      <th>{{ $fault_edit->orderDetails->order_id }}</th>
                      </tr>
                      <tr>
                      <th>@lang('general.Customer_Name')</th>
                      <th>{{($fault_edit->customerName != null) ? $fault_edit->customerName->first_name : ""}}</th>
                      </tr>
                      <tr>
                      <th>@lang('general.Assign_Staff_Name')</th>
                      <th>{{($fault_edit->staffName != null) ? $fault_edit->staffName->first_name :""}} {{ ($fault_edit->staffName != null )? $fault_edit->staffName->last_name : ''}}</th>
                      </tr>  
                      <tr>
                      <th>@lang('general.Supplier_Name')</th>
                      <th>
                      @php if($fault_edit->orderDetails != null){                       
                             foreach ($fault_edit->orderDetails->orderItemDetails as $key => $value) {                                
                                 if($value->merchandise_product_id == $fault_edit->product_id){                                  
                                    echo  $value->supplierName->name;
                                 }                           
                            }                            
                        }
                        @endphp 
                        </th>
                     
                      </tr>                      
                      <tr>
                      <th>@lang('general.Fault_image')</th>
                      <th>
                       @php $images = explode(',',$fault_edit->fault_image->fault_image); @endphp
                       @foreach($images as $image)
                      <img src="{{URL::to('/portal/img/fault/' .$image)}}"   alt="" width="120px" height="120px" class="fault_image"/>
                      @endforeach  </th>
                      </tr>
                      <tr>
                      <th>@lang('general.Status')</th>
                      <th>{{ $fault_edit->fault_history->status }}</th>
                      </tr>
                      <tr>
                      <th>@lang('general.Remarks')</th>
                      <th>{{ $fault_edit->fault_history->remarks }}</th>
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
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection