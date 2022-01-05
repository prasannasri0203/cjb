@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Manage Artist</h2>
							<a href="{{ route('admin.artistcreate') }}" class="btn btn-primary" style="float: right;"> + Add New</a>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="artist_table">
								<thead>
										<tr>
												<th>No</th>
												<th>Name</th>
												<th>Email</th>
												
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
									<h4 id="exampleModalLabel" class="modal-title">Delete Artist</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setArtistId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{url('admin/artist/delete')}}">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="userId" name="userId">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Yes</button>
										<button type="button" class="btn btn-danger" onclick="setArtistId('')"  data-dismiss="modal">No</button>
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
				
        var artist_table = $('#artist_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.artist_list') }}",
        columns: [
            {data: 'id', name: 'id'},
			{data: 'name', name: 'name'},
			{data: 'email', name: 'email'},
         
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
		function setArtistId(id){
		$('#userId').val(id);
		}
	
</script>				

@endsection

@section('footer_script')

  <!-- end of plugin scripts -->
@endsection



