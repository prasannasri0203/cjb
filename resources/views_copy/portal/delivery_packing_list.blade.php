@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Delivery And Packing List</h2>
			 <a href="{{ route('admin.delivery_packingcreate') }}" class="btn btn-primary" style="float: right;">Add New Option</a> 
            </div>
          </header>
          <section>   
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="delivery_packing_table">
								<thead>
										<tr>
												<th>ID</th>
												<th>Name</th>
                                                <th>Type</th>
                                                <th>Price</th>
                                                <th>Detail</th>
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
									<h4 id="exampleModalLabel" class="modal-title">Delete Settings</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setSetingId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{url('admin/delivery_packing/delete')}}">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="userId" name="userId">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Yes</button>
										<button type="button" class="btn btn-danger" onclick="setSetingId('')"  data-dismiss="modal">No</button>
									</div>
								</form>
							</div>
						</div>
					</div>

<script type="text/javascript">
  $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var delivery_packing_table = $('#delivery_packing_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.delivery_packing_list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'delivery_name', name: 'Name'},
            {
                data: 'type', 'render': function (data, type, row) {

                    if (data == 1) {
                        return '<p><span class="badge badge-success">Delivery</span></p>';
                    }
                    else {
                        return '<p><span class="badge badge-success">Packing</span></p>';
                    }
                }
            },
            {data: 'delivery_value', name: 'Price'},
            {data: 'delivery_desc', name: 'Detail'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }
    });
  
  
});


$(document).ready( function() {
				$('.success').delay(1000).fadeOut();
				});
		function setSetingId(id){
		$('#userId').val(id);
		}

</script>

@endsection

@section('footer_script')

  <!-- end of plugin scripts -->
@endsection
