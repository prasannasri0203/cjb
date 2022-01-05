@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Order List</h2>
            </div>
          </header>
            <form action="{{ route('admin.shipment_import') }}" id="file_immport"method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12 upload-btn-wrapper p-0" style="margin: 10px 0;">  
                  <button class="upload_btn">Upload a file</button>
                  <input class="import_file_choose" id="file" type="file" name="file" class="form-control">
                  <a href="{{asset('/portal/samplecsv/sample_shipping_address.xlsx')}}" class="sample-excel" download>Sample excel</a>            
                </div>
                <div class="col-lg-12" style="float:left;">
<!--          <button class="btn btn-success import_file">Import User Data</button> -->  
                @php $flag_error_check = 0; @endphp
                @if(session()->has('resultData'))
                  @if(session()->get('resultData')['un_inserted_records'])
                  @php $flag_error_check = 1; @endphp
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"  data-original-title="Error" class="btn btn-success assign-btn btn-sm">Error Report</a>
                  @endif
                @endif
                </div>
            </form> 
<!--           <a href="{{ route('admin.shipment_import') }}" class="btn btn-primary" style="float: right;">Import</a>   -->         
          @if (session()->has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session()->get('success') }}</li>
                </ul>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ session()->get('error') }}</li>
                </ul>
            </div>
        @endif
        @if (session()->has('resultData'))
        @php if(count((session()->get('resultData')['un_inserted_records'])) || (session()->get('resultData')['status']) == 'error' ){ @endphp
            <div class="alert alert-danger">
        @php } else { @endphp
          <div class="alert alert-success">
        @php } @endphp
                <ul>
                    <li>{{ session()->get('resultData')['message'] }}</li>
                </ul>
            </div>
        @endif
          <section style="padding:25px 0">   
            <div class="container-fluid">
            <div class="custom-list-select-row status-section cate table-responsive">
            <div class="row"> 
            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12"> 
            <div class="form-group">
              <label class="text-left">Customer</label>
              <select name="filter_customer"  id="filter_customer">
                <option selected disabled value="">All customers</option>
                @foreach ($customers as $data)
                <option value="{{ $data->id }}" @if($cust){{ $cust == $data->id ? 'selected' : ''}}@endif>{{ $data->name}}</option>
                @endforeach
              </select>
            </div>
            </div>
            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12"> 
            <div class="form-group">
              <label class="text-left">Supplier</label>
              <select name="filter_supplier" id="filter_supplier">
                <option selected disabled value="">All Suppliers</option>
                @foreach ($supplier_name as $data)
                <option value="{{ $data->id }}"  @if($sup){{ $sup == $data->id ? 'selected' : ''}}@endif>{{ $data->name}}</option>
                @endforeach
              </select>
              </div>
            </div>
              <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12"> 
            <div class="form-group">
              <label class="text-left">Artist</label>
              <select name="filter_artist" id="filter_artist">
                <option selected disabled value="">All Artist</option>
                @foreach ($user as $data)
                <option value="{{ $data->id }}" @if($art){{ $art == $data->id ? 'selected' : ''}}@endif>{{ $data->name}}</option>
                @endforeach
              </select>
              </div>
            </div>
              <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12"> 
            <div class="form-group">
              <label class="text-left">Order</label>
              <select name="filter_order" id="filter_order">
                <option selected disabled value="">All orders</option>
                @foreach ($order_id as $data)
                <option value="{{ $data->id }}">{{ $data->order_id}}</option>
                @endforeach
              </select>
              </div>
            </div>
              <div class="col-md-2 col-lg-2 col-sm-2 col-xs-12"> 
            <div class="form-group">
              <label class="text-left">products</label>
              <select name="filter_product" id="filter_product">
                <option selected disabled value="">All orders</option>
                @foreach ($product_name as $data)
                <option value="{{ $data->product_name }}">{{ $data->product_name }}</option>
                @endforeach
              </select>
            </div>
            </div>
            </div>
                <table class="table table-bordered" id="my_order">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Order Id</th>
                        <th>Item Count</th>
                        <th>Grand Total</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>						   
			  	</div>
            </div>
          <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel" class="modal-title">Delete User</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setUserId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{url('admin/order/delete')}}">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="userId" name="userId">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Yes</button>
										<button type="button" class="btn btn-danger" onclick="setUserId('')"  data-dismiss="modal">No</button>
									</div>
								</form>
							</div>
						</div>
					</div>


  <style>
  .assign-btn:focus, .sample-excel {
      color: #fff;
      text-decoration: none !important;
  }
  .assign-btn{
    width: 140px !important;
    font-size: 16px;
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
    padding: 6px;
    float: right;
    margin: 20px 0;
  }

  .sample-excel{
    float:right;
    margin-top:5px;
  }
 
  .import_file_choose{
    width: 200px;
    float: right;
    background: #eef5f9;
    border: none;
   
  }
  .import_file{
    float: right;
    margin: 20px 10px;
  }

  .upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
  float:left;
}

.upload_btn, .sample-excel {
    border: 2px solid #28a745;
    color: #28a745;
    background-color: white;
    padding: 6px 8px;
    border-radius: 8px;
    float: right;
    width: 160px;
    margin:0 10px 10px 10px;
    text-align: center;
}
/* .sample-excel{
  text-decoration:none;
} */
.sample-excel:hover{
  /* text-decoration:none; */
    border: 2px solid #28a745;
    color: #fff;
    background-color: #28a745;
}
.error_table thead th{
  border:0 !important;
}

.upload-btn-wrapper input[type=file] {
  
  position: absolute;
  right: 0;
  top: 0;
  opacity: 0;
}
.alert{
  width: 98%;
    margin: 0 auto;
    height: 50px;
}

.alert ul {
  padding: 0;
    list-style: none;
}
</style> 
<script>
// $(document).ready(function(){
  $("select[name='filter_customer']").on('change', function()
  {
    val = $(this).val();
    my_order.ajax.reload(); 
  })
  $("select[name='filter_supplier']").on('change', function()
  {
    val = $(this).val();
    my_order.ajax.reload(); 
  })
  $("select[name='filter_order']").on('change', function()
  {
    val = $(this).val();
    my_order.ajax.reload(); 
  })
  $("select[name='filter_product']").on('change', function()
  {
    val = $(this).val();
    my_order.ajax.reload(); 
  })
  $("select[name='filter_artist']").on('change', function()
  {
    val = $(this).val();
    my_order.ajax.reload(); 
  })
	$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
        var my_order = $('#my_order').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
    "url": "{{ url('/admin/order_index') }}",
    "type": 'POST',
    // "data": { 'customer': $('#filter_customer').val(),
    //           'supplier': $('#filter_supplier').val(),
    //           'order': $('#filter_order').val(),
    //           'product': $('#filter_product').val()}
    // },
        "dataType": "json",
    "data": function(d){
        d.customer = $("#filter_customer").val();
        d.supplier =  $('#filter_supplier').val();
        d.order_ids = $('#filter_order').val();
        d.product = $('#filter_product').val();
        d.artist = $('#filter_artist').val();
    },
    },
    columns: [
    {data: 'id', name: 'id'},
    {data: 'order_id', name: 'order_id'},
    {data: 'shipping_item_count', name: 'shipping_item_count'},
    {data: 'grand_total', name: 'grand_total'},
    {data: 'status', name: 'status'},
    {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    "fnCreatedRow": function (row, data, index) {
    $('td', row).eq(0).html(index + 1);
    }
    
	
		});

		$(document).ready( function() {
				$('.success').delay(1000).fadeOut();
				});
		function setUserId(id){
		$('#userId').val(id);
		}
 function enableReturn(id){
    //alert(id);
                      $.ajax({
                          url:"{{ url('/admin/enable_return') }}",
                          type:'POST',
                          headers:  {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },        
                          data:{id : id},  
                          success:function(data){
                                if(data.status==true)
                                {
                                  if(data.return_status == 1)
                                  {
                                  alert("Order return has been enabled");
                                  $("#button_id_"+id).html("Disable return");
                                  $("#button_id_"+id).css("background-color","black");                                 
                                  }
                                else
                                {
                                  alert("Order return has been disabled");
                                  $("#button_id_"+id).html("Enable return");
                                  $("#button_id_"+id).css("background-color","#2b90d9");                            
                                }

                                } 
                                else
                                {
                                  alert("Order Not exist");
                                }                             
                              },
                      });    
    }
</script>
<script>
  var check_error = '<?php echo $flag_error_check; ?>';

console.log(check_error);

  $(document).ready( function() {
    if(check_error){
      $('.assign-btn').trigger('click');
    }   
    $('#file').change(function(){
      var val_check = $("#file").val();
      if(val_check != ''){
        $('#file_immport').submit();
      } else{
        alert('NO File Choosed')
      }
    });      

    $('.success').delay(1000).fadeOut();
  });

  
</script>

           
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection




