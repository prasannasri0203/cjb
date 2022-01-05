@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Product List</h2>
		<a href="{{ route('admin.productAdd') }}" class="btn btn-primary" style="float: right;">Add Product</a>
		
	</div>

</header>
<section>   
	<div class="row">
		<div class="col-lg-9 mt-0">
			<form style="border: 0px solid #a1a1a1;margin-top: 15px;padding: 10px; padding-left:33px; display: flex;" class="mt-0 pt-0 pr-2" action="{{ route('admin.product-import')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
			<input type="file" name="product_import_file" /> 
			<div style="align-content: center; display: flex;">
				 @php 
	              $resultData = session('resultData');  
	            @endphp           
	    
	                @php $flag_error_check = 0; @endphp
	                @if(session()->has('error')) 
	                <div style="color:red;">No File Selected</div>
	                @endif 
	                <?php
	                $insert_count=0;
	               	$error_report=0;

	                if(isset($resultData['inserted_records']))
	                	{
	                		$insert_count=count($resultData['inserted_records']);
	                	}

	                	if(isset($resultData['un_inserted_supplier']) )
	                	{
	                		$error_report=1;
	                	} 
	                	if(isset($resultData['un_inserted_records'])  )
	                	{
	                		$error_report=1;
	                	}
	                ?>

	               @if($insert_count > 0)
	               		<p class="mb-0 mr-2"><b>{{$insert_count}}</b> Data Imported Sucessfully </p>

	               @endif
	               @if($error_report==1)
	                 <a href="javascript:void(0)" data-toggle="modal" data-target="#myModaleError"  data-original-title="Error Report" class="btn btn-danger assign-btn btn-sm" style="display: flex;">Error Report</a>
	               @endif
	            </div>
			
		</div>

		<div class="col-lg-3 mb-4">
			<a href="{{asset('/portal/samplecsv/product-sample.xlsx')}}" class="sample-excel" download>Sample excel</a> 
			<button class="btn btn-primary"><b>Import Products</b></button>
			           
		</form>
		</div>
	</div>

	 
		 
	<div class="container-fluid">
		<div class="status-section cate table-responsive">   
			<table class="table table-bordered" id="product_table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Product Name</th>
						<th>Supplier Name</th>
						<th>Modified On</th>
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
					<h4 id="exampleModalLabel" class="modal-title">Delete Product</h4>
					<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setProductId('')"><span aria-hidden="true">×</span></button>
				</div>
				<form method="POST" action="{{url('admin/product/delete')}}">
					<div class="modal-body">
						Are You sure want to delete this?
						<input type="hidden" value="" id="userId" name="userId">
						@csrf
					</div>
					<div class="modal-footer">
						<button type="submit"  class="btn btn-success" >Yes</button>
						<button type="button" class="btn btn-danger" onclick="setProductId('')"  data-dismiss="modal">No</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- myModaleError -->
	<div id="myModaleError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
		<div role="document" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 id="exampleModalLabel" class="modal-title"> Product Import Error Report</h4>
					<button type="button" data-dismiss="modal" aria-label="Close" class="close" onclick="setProductId('')"><span aria-hidden="true">×</span></button>
				</div> 
					<div class="modal-body">  
						 <?php 
						 $un_inserted_records = [];
						 $un_inserted_supplier = [];
						 $record=0;
						 $supplier=0;

							 if(isset($resultData['un_inserted_records'])){
							 	$un_inserted_records=$resultData['un_inserted_records'];
							 	$record=count($un_inserted_records);
							 }
							 if(isset($resultData['un_inserted_supplier'])){
							 	$un_inserted_supplier=$resultData['un_inserted_supplier'];
							 	$supplier=count($un_inserted_supplier);
							 }

							 if($record>0){
								 	foreach ($un_inserted_records as $key => $uninsert_recod) {
								 	 echo '<p style="margin: 0px 0px 10px 22px;">'.$uninsert_recod."</p>";
								 }
							 }

							 if($supplier>0){
								foreach ($un_inserted_supplier as $key => $uninsert_sup) {
									echo '<p style="margin: 0px 0px 10px 22px;">'.$uninsert_sup."</p>";
								}
							 }
   
            ?>
					</div>
					 <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    </div>
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

			var product_table = $('#product_table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "{{ route('admin.product_list') }}",
				columns: [
				{data: 'id', name: 'id'},
				{data: 'image',   name: 'image', orderable: false, searchable: false},
				{data: 'product_name', name: 'product_name'},
				{data: 'supplier_name', name: 'supplier_name', orderable: false, searchable: false},
				{data: 'date',   name: 'date', orderable: false, searchable: false},
				{data: 'action',   name: 'action', orderable: false, searchable: false},
				],
				"fnCreatedRow": function (row, data, index) {
					$('td', row).eq(0).html(index + 1);
				},
				"createdRow": function (row, data, index) {
					var info = product_table.page.info();
					$('td', row).eq(0).html(index + 1 + info.page * info.length);
				}
			}); 

		});

		$(document).ready( function() {
			$('.success').delay(1000).fadeOut();
		});
		function setProductId(id){
			$('#userId').val(id);
		}

	</script>						
	@endsection

	@section('footer_script')
	<!-- end of plugin scripts -->
	@endsection




