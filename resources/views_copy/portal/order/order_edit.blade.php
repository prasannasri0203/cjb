@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">@lang('CMS')</h2>
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
					<h3 class="h4">Edit Order Details</h3>
					<div>				
					<a href="{{ url('admin/add_shipping_details').'/'.$order_item->id }}" class="btn btn-primary" style="float: right;">Add Shipping Details</a>
					</div>
				</div>
	
				<div class="card-body">
					<p></p>
					<form method="POST" action="{{url('admin/order_update')}}" enctype="multipart/form-data"  class="custom-form" id="updateCms">
						@csrf
                        <div class="form-group">
							<label class="form-control-label">Order Id</label>
							<input type="text" placeholder="order id" class="form-control" name="order_id" value="{{$order_id_data}}">
							<input type="hidden" name="id" value="{{$order_item->id}}">
							<span style='color:red'>{{ ($errors->has('id')) ? $errors->first('id') : '' }}</span>
						</div>
                        <div class="form-group">
							<label class="form-control-label">Supplier Id<span class="mandatory_field">*<span></label>
							<input type="text" placeholder="sup id" class="form-control" name="sup_id" value="{{$order_item->supplier_id}}">
							<span style='color:red'>{{ ($errors->has('sup_id')) ? $errors->first('sup_id') : '' }}</span>
						</div>
                        <div class="form-group">
							<label class="form-control-label">Product Price <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Page Name" class="form-control" name="product_price" value="{{$order_item->product_price}}">
							<span style='color:red'>{{ ($errors->has('product_price')) ? $errors->first('product_price') : '' }}</span>
						</div>
                        <div class="form-group">
							<label class="form-control-label">Tax Amount <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Page Name" class="form-control" name="tax_total" value="{{$order_detail->tax_total}}">
							<span style='color:red'>{{ ($errors->has('tax_total')) ? $errors->first('tax_total') : '' }}</span>
						</div>
                        <div class="form-group">
							<label class="form-control-label">Discount Amount: <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Page Name" class="form-control" name="discount_total" value="{{$order_detail->discount_total}}">
							<span style='color:red'>{{ ($errors->has('discount_total')) ? $errors->first('discount_total') : '' }}</span>
						</div>
                        <div class="form-group">
							<label class="form-control-label">Shipping Amount: <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Page Name" class="form-control" name="shipping_total" value="{{$order_detail->shipping_total}}">
							<span style='color:red'>{{ ($errors->has('shipping_total')) ? $errors->first('shipping_total') : '' }}</span>
						</div>
                        <div class="form-group">
							<label class="form-control-label">Grand Total:	 <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Page Name" class="form-control" name="grand_total" value="{{$order_detail->grand_total}}">
							<span style='color:red'>{{ ($errors->has('grand_total')) ? $errors->first('grand_total') : '' }}</span>
						</div>
                        <div class="form-group">
							<label class="form-control-label">Status:	 <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Page Name" class="form-control" name="status" value="{{$order_item->status}}">
							<span style='color:red'>{{ ($errors->has('status')) ? $errors->first('status') : '' }}</span>
						</div>
						<div class="form-group">       
							<input type="submit" value="{{'Update'}}" class="btn btn-primary">
							<a href="{{route('admin.order_list')}}"> <input type="button" value="Cancel" class="btn btn-danger"> </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('footer_script')
@endsection