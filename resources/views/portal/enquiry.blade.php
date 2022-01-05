@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
<style type="text/css">
  table td a{
    width:55px;margin-top:0px;
  }
  table td button{
    margin: 10px 5px;
  }
  .dataTables_wrapper td a {
    margin-top: 0px !important;
    width: 90px !important;
}
</style>
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Enquiry</h2>
			   </div>
          </header>
          <section>  
              <label class="text-left" style="padding-left:30px;">Enquiry:</label>
              <select name="status_filter" id="status_filter">
                <option value="0" selected>Open</option>
                <option value="1">Archieved</option>
<!--                 <option value="2">Rejected</option> -->
                <option value="2">Deleted</option>
              </select> 
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="enquiry_table">
								<thead>
										<tr>
												<th>@lang('general.No')</th>
												<th>@lang('general.Name')</th>
												<th>@lang('general.Email')</th>
												<th>Subject</th>
                        <th>Replay Status</th>
                        <th>Status</th>
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
        ajax: {
          url: "{{ route('admin.enquiry_list') }}",
        type: "POST",
        data: function (d) {
            d.status_filter = $('#status_filter').val();
        }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
			{data: 'email', name: 'email'},
			{data: 'description', name: 'description'},
      {data: 'reply_status', name: 'reply_status'},
      {data: 'status', name: 'status'},
        	{data: 'action',   name: 'action', orderable: false, searchable: false},
        ],
        "fnCreatedRow": function (row, data, index) {
            $('td', row).eq(0).html(index + 1);
        }
        });

        $("#status_filter").change(function(){
          product_table.ajax.reload(); 
        });

	});
      function activate_enquiry(id, status)
      {
         if(confirm("Are You Sure about this?"))
                      $.ajax({
                          url:"{{ url('/admin/enquiry_status_change') }}",
                          type:'POST',
                          headers:  {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },        
                          data:{id : id, status : status},  
                          success:function(data){
                            if(data.status == true)
                            {
                              var table = $('#enquiry_table').DataTable();
                              table.draw();                           
                            }
                              },
                      });
      }
</script>				

@endsection

@section('footer_script')

  <!-- end of plugin scripts -->
@endsection





