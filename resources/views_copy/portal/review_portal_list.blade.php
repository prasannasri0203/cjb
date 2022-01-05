@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection
<style>
.checked {
  color: orange;
}
</style>
@section('content')
          <!-- Page Header-->
          <header class="page-header">
<!--             <div class="container-fluid">
              <h2 class="no-margin-bottom">Print Type List</h2>
							<a href="javascript:void(0)" id="add_print_type" class="btn btn-primary" style="float: right;">Add Print Type</a>
            </div> -->
          </header>
          <section>   

              <label class="text-left">Review:</label>
              <select name="status_filter" id="status_filter">
                <option value="1" selected>Approved</option>
                <option value="0">Rejected</option>
<!--                 <option value="2">Rejected</option> -->
                <option value="3">All</option>
              </select>
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="print_type_table">
								<thead>
										<tr>
												<th>ID</th>
												<th>Product Name</th>
												<th>Review</th>
												<th>Date</th>
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
		         	<form id="review_form">
			            <input type="hidden" name="table_id" id="table_id" value="0">
	                        <div class="form-group">
	                        <h3 id="product_name"></h3>
	                        <br>
	                        <input type="hidden" id="review_id" name="review_id" >
	                          <label for="usr">Review<span class="mandatory_field">*<span></label>
<!-- 	                          <input type="text" class="form-control" name="print_type_name" id="" value="{{ old('print_type_name') }}"> -->
								<textarea id="review_des" class="form-control" name="review_des" rows="4" cols="50">
								</textarea>	
								<br>  
								<h2>Star Rating</h2>
								<span class="fa fa-star star_1"></span>
								<span class="fa fa-star star_2"></span>
								<span class="fa fa-star star_3"></span>
								<span class="fa fa-star star_4"></span>
								<span class="fa fa-star star_5"></span> 
								<div>
								<br>
								<label for="usr">Select the option<span class="mandatory_field">*<span></label>
								<select class="form-control" id="review_filter" name="review_filter">
									<option id="option_0" value="1">Approve</option>
									<option id="option_1" value="0">Reject</option>
<!-- 									<option id="option_2" value="2">Reject</option> -->
								</select>	
								</div>  
								<br>
                     
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
		var dataname= $(elem).data("name");
		var dataReview= $(elem).data("review");
		var datarating= $(elem).data("rating");
		var status= $(elem).data("status");
		var reviewId= $(elem).data("reviewid");
		$("#review_des").val(dataReview);
		$("#product_name").html(dataname);
		$("#review_id").val(reviewId);
		$("#review_filter option[id='option_0']").attr("selected", "selected");

		//alert(datarating);
		$(".fa-star").removeClass("checked");

		for(i=1; i<=datarating; i++)
		{
			 if(!$(".star_"+i).hasClass("checked"))
			 {
				$(".star_"+i).addClass("checked");
			 }

		}

		$('#myModal').modal('toggle');

	};

	$(".view_button").click(function(){
		alert();
	});

$(document).ready(function(){


        $("#status_filter").change(function(){
        	print_type_table.ajax.reload(); 
        });

	$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
				
        var print_type_table = $('#print_type_table').DataTable({
        processing: true,
        serverSide: true,
        //ajax: "{{ route('admin.review_list') }}",
        ajax: {
          url: "{{ route('admin.review_list') }}",
        type: "POST",
        data: function (d) {
            d.status_filter = $('#status_filter').val();
        }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'merchandise_product_name', name: 'merchandise_product_name'},
            {data: 'product_review', name: 'product_review'},
            {data: 'date',   name: 'date', orderable: false, searchable: false},
            {data: 'action',   name: 'action', orderable: false, searchable: false},
        ],
        "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }
     }); 

        var print_type_form = $("#review_form");
        print_type_form.submit(function(e){
            e.preventDefault();
            var form = new FormData($(this)[0]);
            $.ajax({
                          url:"{{route('admin.review_update_data')}}",
                          method:"POST",
                          data:form,
                          dataType: 'JSON',
                          processData: false,
                          contentType: false,
                          success:function(data){
                          	if(data.status == true)
                          	{
                        		$('#myModal').modal('hide');
								var table = $('#print_type_table').DataTable();
								table.ajax.reload();  
                          	}
                          },
            });

	});



				});

	
</script>						
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection




