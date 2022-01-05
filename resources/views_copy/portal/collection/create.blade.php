@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">@lang('Preset Collections')</h2>
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
<link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">

<section> 
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h3 class="h4">{{($data) ? 'Edit Collection' : 'Add Collection'}}</h3>
				</div>
				<div class="card-body">
					<p></p>
					@if($data)
					<form method="POST" action="{{route('admin.collection.update') }}" enctype="multipart/form-data">
						@else
						<form method="POST" action="{{route('admin.collection.store')}}" enctype="multipart/form-data">
							@endif
							@csrf
							<div class="form-group">
								<label class="form-control-label">Collection Name <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="Name" class="form-control" name="collection_name" value="{{($data) ? $data->collection_name : old('collection_name')}}">
								<?php if($errors->has('collection_name')){?><span style='color:red'> {{$errors->first('collection_name')}}</span> <?php }?>
							</div>
							<div class="form-group">
								<label class="form-control-label">Products <span class="mandatory_field">*<span></label>
								<select class="form-control js-example-basic-multiple" name="products[]" multiple="multiple" placeholder="Select products">
									@if(!$data)
									@foreach($products as $product)
									<option value="{{$product->id}}">{{ ucfirst($product->product_name) }}</option>
									@endforeach
									@else

									@foreach($products as $aKey => $product)
									
									<option value="{{$product->id}}" @if(in_array($product->id, array_column($data->collections->toArray(), 'id')))selected="selected"@endif>{{$product->product_name}}</option>
									@endforeach
									@endif
								</select>
								<?php if($errors->has('products')){?><span style='color:red'> {{$errors->first('products')}}</span> <?php }?>
							</div>
							@if($data)
							<input type="hidden" value="{{base64_encode($data->id)}}" name="id">
							@endif
							<div class="form-group">       
								<input type="submit" value="{{($data) ? 'Update' : 'Save'}}" class="btn btn-primary">
								<a href="{{route('admin.collection.index')}}"> <input type="button" value="Cancel" class="btn btn-danger"> </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection

	@section('footer_script')
	<script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.js-example-basic-multiple').select2({
    placeholder: "Select products",
	 
    allowClear: true
});
		});
	</script>
	<style>
	span.selection {
    width: 100%;
}
</style>
	<!-- end of plugin scripts -->
	@endsection