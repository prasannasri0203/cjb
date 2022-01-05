@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">@lang('Delivery / Packing Delivery / Packings')</h2>
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
					<h3 class="h4">Edit</h3>
				</div>
				<div class="card-body">
					<p></p>
				
					<form method="POST" action="{{route('admin.delivery_packing.update') }}" enctype="multipart/form-data">
						
							@csrf
							<div class="form-group">
								<label class="form-control-label">Delivery / Packing Name <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="Name" class="form-control" name="delivery_name" value="{{$data->delivery_name}}">
								<?php if($errors->has('delivery_name')){?><span style='color:red'> {{$errors->first('delivery_name')}}</span> <?php }?>
							</div>
                            <div class="form-group">
								<label class="form-control-label">Delivery / Packing Type <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="delivery Type" class="form-control" name="delivery_type" value="{{ ($data->type == 1) ? 'Delivery' : 'Packing' }}" disabled>
								<?php if($errors->has('delivery_type')){?><span style='color:red'> {{$errors->first('delivery_type')}}</span> <?php }?>
							</div>
                            <div class="form-group">
								<label class="form-control-label">Delivery / Packing Key <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="delivery key" class="form-control" name="delivery_key" value="{{$data->delivery_key}}" disabled>
								<?php if($errors->has('delivery_key')){?><span style='color:red'> {{$errors->first('delivery_key')}}</span> <?php }?>
							</div>
                            <div class="form-group">
								<label class="form-control-label">Delivery / Packing Value <span class="mandatory_field">*<span></label>
								<input type="number" placeholder="delivery_value" class="form-control" name="delivery_value" value="{{$data->delivery_value}}">
								<?php if($errors->has('delivery_value')){?><span style='color:red'> {{$errors->first('delivery_value')}}</span> <?php }?>
							</div>
                            <div class="form-group">
								<label class="form-control-label">Delivery / Packing Description <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="delivery_desc" class="form-control" name="delivery_desc" value="{{$data->delivery_desc}}">
								<?php if($errors->has('delivery_desc')){?><span style='color:red'> {{$errors->first('delivery_desc')}}</span> <?php }?>
							</div>
        						<div class="form-group"> 
                                <input type="hidden" value="{{$data->id}}" name="delivery_id"> 
                                <input type="hidden" value="{{$data->type}}" name="delivery_type">     
								<input type="submit" value="{{'Update'}}" class="btn btn-primary">
								<a href="{{route('admin.delivery_packing_list')}}"> <input type="button" value="Cancel" class="btn btn-danger"> </a>
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