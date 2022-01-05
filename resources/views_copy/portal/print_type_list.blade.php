@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Print Type List</h2>
							<a href="javascript:void(0)" id="add_print_type" class="btn btn-primary" style="float: right;">Add Print Type</a>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="print_type_table">
								<thead>
										<tr>
												<th>ID</th>
												<th>Print Type Name</th>
												<th width="280px">Action</th>
										</tr>
								</thead>
								<tbody>
								</tbody>
						</table>						   
			  		</div>
            </div>

		<div id="myModal" class="modal fade" role="dialog">
		   <div class="modal-dialog">
		      <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Print Type</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

		         <div class="modal-body">
		         	<form id="print_type_form">
			            <input type="hidden" name="table_id" id="table_id" value="0">
	                        <div class="form-group">
	                          <label for="usr">Print Type Name <span class="mandatory_field">*<span></label>
	                          <input type="text" class="form-control" name="print_type_name" id="print_type_name" value="{{ old('print_type_name') }}">
	                          <div class="error" id="print_type_name_error"></div>  
	                        </div> 
	                   <input type="submit" >       		         		
		         	</form>                    		            
		         </div>
		         <div class="modal-footer">
<!-- 		            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		            <button type="button" class="btn btn-success" id="print_type_save" data-dismiss="modal" value="save">Save</button> -->
		         </div>
		      </div>
		   </div>
		</div>

<script>
	function ShowModal(elem){
		var dataValue= $(elem).data("value");
		var dataId= $(elem).data("id");
		$("#print_type_name").val(dataValue);
		$("#table_id").val(dataId);
		$('#myModal').modal('toggle');
	};
	function removeId(elem){
		alert(elem);

		$.ajax({
		  url:"{{route('admin.print_type_delete')}}",
		  data: { date: elem },
		  type: "GET",  
		  success: function(data){
		  	if(data.status == true)
		  	{
				var table = $('#print_type_table').DataTable();
				table.ajax.reload();
		  	}
		   }
		  });

	};

$(document).ready(function(){

	$("#add_print_type").click(function(){
		$("#table_id").val(0);
		$("#print_type_name").val('');
		$('#myModal').modal('toggle');

	});

	
        var print_type_form = $("#print_type_form");
        print_type_form.submit(function(e){
            e.preventDefault();
            var form = new FormData($(this)[0]);
            $.ajax({
                          url:"{{route('admin.print_type_list_post')}}",
                          method:"POST",
                          data:form,
                          dataType: 'JSON',
                          processData: false,
                          contentType: false,
                          success:function(data){
                          	if(data.success == false)
                          	{
                                  $.each(data.errors,function(index,value){
                                                // $("#validation_prepend").remove();
                                                // $("#prepend_img").remove();               
                                                $('#print_type_name_error ').append($('<div id="validation_prepend">'+value[0]+'</div>'));
                                                });  
                          	}
                          	else
                          	{
                          		$('#validation_prepend').html('');
                          		$("#print_type_name").val('');
                          		$('#myModal').modal('toggle');
								var table = $('#print_type_table').DataTable();
								table.ajax.reload();                        		
                          	}
                          },
            });

	});



	$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
				
        var print_type_table = $('#print_type_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.print_type_list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'print_type_name', name: 'print_type_name'},
            //{data: 'date',   name: 'date', orderable: false, searchable: false},
            {data: 'action',   name: 'action', orderable: false, searchable: false},
        ],
        "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }
     }); 



				});

	
</script>						
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection




