@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Faq</h2>
							<a href="{{ URL('/admin/faq/add') }}" class="btn btn-primary" style="float: right;">Create</a>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered" id="faq_table">
								<thead>
										<tr>
												<th>@lang('No')</th>
												<th>@lang('Question')</th>
												<!-- <th>@lang('Answer')</th> -->
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
									<h4 id="exampleModalLabel" class="modal-title">Delete FAQ</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setFaqId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{url('/admin/faq/delete')}}">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="faqId" name="faqId">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Yes</button>
										<button type="button" class="btn btn-danger" onclick="setFaqId('')"  data-dismiss="modal">No</button>
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
				
        var faq_table = $('#faq_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.faq_list') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
			{data: 'question', name: 'question'},
            // {data: 'answer', name: 'answer'},
			{data: 'action',   name: 'action', orderable: false, searchable: false},
        ],
        // "fnCreatedRow": function (row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        // }
        }); 
		

	});

	$(document).ready( function() {
		$('.success').delay(1000).fadeOut();
	});
	function setFaqId(id){
		$('#faqId').val(id);
	}
</script>						
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection
