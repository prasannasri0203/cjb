@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">@lang('Revenue Settings')</h2>
	</div>
</header>
<style type="text/css">
	#xButton {
		float: right;
		position: absolute;
		/* top: 50%; */
		left: 8%;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		background-color: #b3b3b3;
		color: white;
		font-size: 12px;
		/* padding: 12px 24px; */
		border: none;
		cursor: pointer;
		border-radius: 5px;
	}
	.cms-image {
		border: 1px solid;
		border-radius: 5px;
	}

	.file-image {
		position: relative;
		width: 100%;
		max-width: 80px;
	}

	.cms-image {
		display: block;
		width: 80px;
		height: 80px;
	}

	.overlay {
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		height: 80px;
		width: 80px;
		opacity: 0;
		transition: .3s ease;
		background-color: #c5c5c5d9;
	}

	.file-image:hover .overlay {
		opacity: 1;
	}

	.icon {
		color: white;
		font-size: 20px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		text-align: center;
	}

	.fa-close:hover {
		color: #c10c2d;
	}
	.icon{
		color: #d92b4b !important;
	}

</style>

<section> 
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h3 class="h4">Add</h3>
				</div>
				<div class="card-body">
					<p></p>
					
						<form method="POST" action="{{route('admin.revenue.store')}}" enctype="multipart/form-data">
							
							@csrf
							<div class="form-group">
								<label class="form-control-label">Setting Name <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="Name" class="form-control" name="setting_name" value="{{ old('setting_name') }}">
                                <?php if($errors->has('setting_name')){?><span style='color:red'> {{$errors->first('setting_name')}}</span> <?php }?>

							</div>
                            <div class="form-group">
								<label class="form-control-label">Setting Key <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="setting key" class="form-control" name="setting_key" value="{{ old('setting_key') }}">
								<?php if($errors->has('setting_key')){?><span style='color:red'> {{$errors->first('setting_key')}}</span> <?php }?>
							</div>
                            <div class="form-group">
								<label class="form-control-label">Setting Value <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="setting_value" class="form-control" name="setting_value" value="{{ old('setting_value') }}">
								<?php if($errors->has('setting_value')){?><span style='color:red'> {{$errors->first('setting_value')}}</span> <?php }?>
							</div>
                            <div class="form-group">
								<label class="form-control-label">Setting Description <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="setting_desc" class="form-control" name="setting_desc" value="{{ old('setting_desc') }}">
								<?php if($errors->has('setting_desc')){?><span style='color:red'> {{$errors->first('setting_desc')}}</span> <?php }?>
							</div>
        						<div class="form-group">       
								<input type="submit" value="Save" class="btn btn-primary">
								<a href="{{route('admin.revenue_list')}}"> <input type="button" value="Cancel" class="btn btn-danger"> </a>
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