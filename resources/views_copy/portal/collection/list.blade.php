
@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Preset Collection</h2>
							<a href="{{ route('admin.collection.create') }}" class="btn btn-primary" style="float: right;"> + Add New</a>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="collection_table">
								<thead>
										<tr>
												<th>@lang('general.No')</th>
												<th>@lang('general.Name')</th>
												<th>Products</th>
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
								<h4 id="exampleModalLabel" class="modal-title">Delete Collection</h4>
								<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setId('')"><span aria-hidden="true">×</span></button>
							</div>
							<form method="POST" action="{{url('admin/collections/delete')}}">
								<div class="modal-body">
									Are You sure want to delete this?
									<input type="hidden" value="" id="setId" name="collectionId">
									@csrf
								</div>
								<div class="modal-footer">
									<button type="submit"  class="btn btn-success" >Yes</button>
									<button type="button" class="btn btn-danger" onclick="setId('')"  data-dismiss="modal">No</button>
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
				
        var collection_table = $('#collection_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.collectioninlist') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'collection_name', name: 'CollectionName'},
			{data: 'collection_count', name: 'Product'},
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
	function setId(id){
		$('#setId').val(id);
	}
</script>				

@endsection

@section('footer_script')

  <!-- end of plugin scripts -->
@endsection


