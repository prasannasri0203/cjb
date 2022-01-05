@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Enquiry</h2>
			   </div>
          </header>
          <section>   
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="enquiry_table">
								<thead>
										<tr>
												<th>@lang('general.No')</th>
												<th>@lang('general.Name')</th>
												<th>@lang('general.Email')</th>
												<th>Subject</th>
												<th width="280px">Action</th>
										</tr>
								</thead>
								<tbody>
								</tbody>
						</table>						   
			  		</div>
            </div>
<script>
$(document).ready(function(){
	$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
				
        var product_table = $('#enquiry_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.enquiry_list') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			{data: 'email', name: 'email'},
			{data: 'description', name: 'description'},
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





