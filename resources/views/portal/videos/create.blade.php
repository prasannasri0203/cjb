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
<section> 
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h3 class="h4">Add Video</h3>
				</div>
				<div class="card-body">
					<p></p>
					<form method="POST" action="{{route('admin.videos.store')}}"  class="custom-form">
						@csrf
						<div class="form-group">
							<label class="form-control-label">Name</label>
							<input type="text" placeholder="Name" class="form-control" name="name">
							<span style='color:red'>{{ ($errors->has('name')) ? $errors->first('name') : '' }}</span>
						</div>
						<div class="form-group">
							<label class="form-control-label">Type</label>
							<input type="text" placeholder="Type" class="form-control" name="type">
							<span style='color:red'>{{ ($errors->has('type')) ? $errors->first('type') : '' }}</span>
						</div>
						<div class="form-group">
							<label class="form-control-label">Upload Video</label><br/>
							<input type="file" name="video" class="form-control">

							<?php if($errors->has('video')){?><span style='color:red'> {{$errors->first('video')}}</span><?php }?>
						</div>
						<div class="form-group">
							<label class="form-control-label">Video Thumbnail</label><br/>
							<input type="file" name="video_thumbnail" class="form-control">

							<?php if($errors->has('video_thumbnail')){?><span style='color:red'> {{$errors->first('video_link')}}</span><?php }?>
						</div>	
							
						<div class="form-group">       
							<input type="submit" value="Save" class="btn btn-primary">
							<a href="{{route('admin.roles.index')}}"> <input type="button" value="Cancel" class="btn btn-danger"> </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
	@endsection

	@section('footer_script')
	<!-- end of plugin scripts -->
	@endsection