@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Category List</h2>
							<a href="{{ route('admin.suppliercreate') }}" class="btn btn-primary">+ Add New</a>
            </div>
          </header>
          <section>   
            <div class="container-fluid">
            <div class="status-section cate table-responsive">   
						<table class="table table-bordered data-table">
								<thead>
										<tr>
												<th>@lang('general.No')</th>
												<th>@lang('general.Name')</th>
												<th>@lang('general.Detail')</th>
												<th width="280px">Action</th>
										</tr>
								</thead>
								<tbody>
								</tbody>
						</table>						   
			  		</div>
            </div>


	
		

@endsection

@section('footer_script')
<script type="text/javascript">
	$(document).ready( function() {
		$('.success').delay(1000).fadeOut();
	});
	function setUserId(id){
		$('#setId').val(id);
	}
</script>

  <!-- end of plugin scripts -->
@endsection


