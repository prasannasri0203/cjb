@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Fault & Return List</h2>							
            </div>
          </header>
          @if (session()->has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{{ session()->get('success') }}</li>
                </ul>
            </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
          <section>   
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="faults_returns">
								<thead>
                    <tr>
                        <th>ID</th>
                        <th>Order Id</th>
                        <th>Supplier Name</th>
                        <th>Fault Image</th>
                        <th>Customer Name</th>
                        <th>Assign Staff Name</th>
                        <th>Status</th>
                        <th>Modified On</th>
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
									<h4 id="exampleModalLabel" class="modal-title">Assign Staff</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setFaultId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{url('admin/fault_assign_staff')}}">
									<div class="modal-body">
                  <div class="form-group">
                    <label for="usr">@lang('general.Assign_Staff_Name') <span class="mandatory_field">*<span></label>
									      <select name="assign_staff_id" id="assign_staff_id" class="form-control" >
                        <!-- <option disabled selected value>Please select the Status</option> -->
                      </select> 
										<input type="hidden" value="" id="return_id" name="return_id">
                  </div>
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Submit</button>
										<button type="button" style="margin-start:10px;" class="btn btn-danger" onclick="setFaultId('')"  data-dismiss="modal">Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>



          <div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel1" class="modal-title">Status Update</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setReturnId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" id="status_update_form" action="{{url('admin/fault_status_update')}}">
									<div class="modal-body">
                  <div class="form-group">
                    <label for="usr">@lang('general.Status')</label>
                    <select name="status" id="status_assign_element" class="form-control">
                        <option disabled selected value>Please select the Status</option>
                        <option value="pending" {{ (old('status') == "pending" ? "selected":"") }}>Pending</option>
                        <option value="processing" {{ (old('status') == "processing" ? "selected":"") }}>{{ "Processing" }}</option>
                        <option value="completed" {{ (old('status') == "completed" ? "selected":"") }}>{{ "Completed" }}</option>
                      </select> 
										<input type="hidden" value="" id="status_return_id" name="status_return_id">
                  <span style="display: none;" id="validate_field"></span>
                  </div>

                  <div class="form-group">
                    <label for="usr">@lang('general.comments')</label>
                    <textarea name="remarks" class="form-control" style="overflow:auto;resize:none" rows="5" cols="10"></textarea>

                  </div>
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Submit</button>
										<button type="button" class="btn btn-danger" onclick="setReturnId('')"  data-dismiss="modal">Cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
<script>
$(document).ready(function(){

		var status_update_form = $("#status_update_form");
        status_update_form.submit(function(e){
        e.preventDefault();
        status_assign = $("#status_assign_element").val();
        if(status_assign == null)
        {
        $("#validate_field").html("The Status can not be blank.");
        $("#validate_field").show();
        }
        else
        {
         $("#validate_field").html("The Status can not be blank.");
        $("#validate_field").hide();    
        document.getElementById("status_update_form").submit()

        }
        
        
        
        
        });
	$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
				
        var faults_returns = $('#faults_returns').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.fault_list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'order_ref', name: 'order_ref'},
            {data: 'supplier', name: 'supplier'},
            {data: 'fault_image',  name: 'fault_image', orderable: false, searchable: false},
            {data: 'customer_id', name: 'customer_id'},
            {data: 'assign_staff_id', name: 'assign_staff_id'},
            {data: 'status', name: 'status'},
            {data: 'date',   name: 'date', orderable: false, searchable: false},
            {data: 'action',   name: 'action', orderable: false, searchable: false},
        ],
        "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }
        }); 

          url="{{ route('admin.fault_staff_list') }}"
          $.ajax({
            type: "POST",
            url: url,
            headers:  {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }, 
            processData: false,
            contentType: false,        
            // data:form_data,         
            success: function (data) {
                  if(data.status)
                  {
                   
                    var optionString = '<option value="" disable selected >Select the Staff</option>';
                    $.each(data.staffList,function(index,value){
                    console.log(value);
                      optionString += '<option value="'+value['id']+'" >'+value['first_name']+ ' '+value['last_name']+'</option>';
                    });
                    
                    $('#assign_staff_id').append(optionString);
                  }
                  
              },
            error: function (data) {
                console.log('Error:', data);
            }
        });

});

        $(document).ready( function() {

          

				$('.success').delay(1000).fadeOut();
				});
        function setFaultId(id){
          $('#return_id').val(id);
        }

        function setReturnId(id){
          $('#status_return_id').val(id);
        }
	
</script>						
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection




