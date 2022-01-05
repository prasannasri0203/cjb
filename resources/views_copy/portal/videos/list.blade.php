@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">@lang('Featured Videos')</h2>
	</div>
</header>
<style>
	.success{
		color: #22ce03;
	}

	a:not([href]):not([tabindex]){
		color: #fff;
	}
	a:not([href]):not([tabindex]):hover{
		color: #fff;
	}
	.paginate {
		float: right
	}
</style>
<section> 
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<div class="col-lg-3">
						<h3 class="h4">Featured Videos</h3>
					</div>
					<div class="col-lg-7">
						@if(session()->has('success'))
						<span class="success show">{{session()->get('success') }}</span>
						@endif
					</div>
					<!-- <div class="col-lg-3"></div> -->
					<div class="col-lg-2">
						@can('videos-create')
						<a href="{{route('admin.videos.create') }}"><input type="submit" value="+ Add New" class="btn btn-primary"></a>
						@endcan
					</div>    
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Video</th>
								<th>Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@if($videos->count() > 0)
							@foreach($videos as $key =>  $video)
							<tr>
								<td scope="row">{{ $key+1}}</td>
								<td>{{ $video->name }}</td>
								<td>{{ $video->video_link }}</td>
								<td>{{ $video->Type }}</td>
								<td>
									@can('videos-delete')
									<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="setUserId('{{$video->id}}')">Delete</a>  
									@endcan
									
								</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="4">No data available</td>
							</tr>
							@endif
						</tbody>
					</table>
					<div align="right" class="paginate">
						<?php  if(!$videos->isEmpty()) { ?>
							{{ $videos->links() }}
						<?php } ?>
					</div>
					<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel" class="modal-title">Delete User</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setUserId('')"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="{{route('admin.user.delete')}}">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="userId" name="userId">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="submit"  class="btn btn-success" >Yes</button>
										<button type="button" class="btn btn-danger" onclick="setUserId('')"  data-dismiss="modal">No</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('footer_script')
<script type="text/javascript">
	$(document).ready( function() {
		$('.success').delay(1000).fadeOut();
	});
	function setUserId(id){
		$('#userId').val(id);
	}
</script>
<!-- end of plugin scripts -->
@endsection
