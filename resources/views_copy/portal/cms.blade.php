@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">CMS</h2>
							<a href="{{ url('/admin/cms/add') }}" class="btn btn-primary" style="float: right;"> +Add New</a>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="cms_table">
								<thead>
										<tr>
												<th>ID</th>
												<th>Page Type</th>
												<th>Page Name</th>
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
									<h4 id="exampleModalLabel" class="modal-title">Delete CMS Page</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setCmsId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{url('/admin/cms/delete')}}">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="cmsId" name="cmsId">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Yes</button>
										<button type="button" class="btn btn-danger" onclick="setCmsId('')"  data-dismiss="modal">No</button>
									</div>
								</form>
							</div>
						</div>
					</div>
			
<script>
$(document).ready(function(){
	$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
				
        var cms_table = $('#cms_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.cms_list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'type', name: 'type'},
            {data: 'name', name: 'name'},
            {data: 'date',   name: 'date', orderable: false, searchable: false},
            {data: 'action',   name: 'action', orderable: false, searchable: false},
        ],
        "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }
        }); 
    


	});
  $(document).ready( function() {
		$('.success').delay(1000).fadeOut();
	});
	function setCmsId(id){
		$('#cmsId').val(id);
	}
</script>						
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection




