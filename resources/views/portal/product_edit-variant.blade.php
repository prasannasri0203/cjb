		@extends('portal.app')

		@section('title', 'Dashboard | ')

		@section('header_css')

		<!-- end of plugin styles -->
		@endsection

		@section('content')
		<!-- Page Header-->
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.min.css" rel="stylesheet">
		<style>
			* {
				box-sizing: border-box;
			}

			body {
				background-color: #f1f1f1;
			}

			#product_add_form {
				background-color: #ffffff;
				margin: 100px auto;
				font-family: Raleway;
				padding: 40px;
				width: 70%;
				min-width: 300px;
			}

			h1 {
				text-align: center;  
			}

			input {
				padding: 10px;
				width: 100%;
				font-size: 17px;
				font-family: Raleway;
				border: 1px solid #aaaaaa;
			}


			/* Mark input boxes that gets an error on validation: */
			input.invalid {
				background-color: #ffdddd;
			}

			/* Hide all steps by default: */
			.tab {
				display: none;
			}

			button {
				background-color: #4CAF50;
				color: #ffffff;
				border: none;
				padding: 10px 20px;
				font-size: 17px;
				font-family: Raleway;
				cursor: pointer;
			}

			button:hover {
				opacity: 0.8;
			}

			#prevBtn {
				background-color: #bbbbbb;
			}

			/* Make circles that indicate the steps of the form: */
			.step {
				height: 15px;
				width: 15px;
				margin: 0 2px;
				background-color: #bbbbbb;
				border: none;  
				border-radius: 50%;
				display: inline-block;
				opacity: 0.5;
			}

			.step.active {
				opacity: 1;
			}

			/* Mark the steps that are finished and valid: */
			.step.finish {
				background-color: #4CAF50;
			}

			.checkbox-template::before, .radio-template::before
			{
				left: 6px;
				position: relative;
			}

			.checkbox-template::after, .radio-template::after
			{
				left: 7px;
			}

			.checkbox-template + label
			{
				margin-top: -4px;
			}

			.i-checks {
				margin-right: 25px;
			}

			.i-checks label input
			{
				height: 20px;
				width: 50px;
				font-size: 14px;
				margin-left: 10px;
			}

			.colpick
			{
				width: 55px!important;
				height: 40px;
				padding: 0px 3px;
				font-size: 17px;
				font-family: Raleway;
				border: 1px solid #aaaaaa;
			}
			span.mandatory_field {
				color: red;
				font-size: x-large;
			}

			#product_image_error1 {
				margin-top: -17px;
				margin-bottom: 13px;
				font-size: 13px;
				color: #f00;
			}

			#form_validation_div{
				margin-top: -17px;
				margin-bottom: 13px;
				font-size: 13px;
				color: #f00;
				margin-left: -39px;
			}

			.icon {
				color: #d92b4b !important;
			}
			a:not([href]):not([tabindex]) {
				color: inherit;
				text-decoration: none;
			}


			.file-image {
				position: relative;
				width: 100%;
				max-width: 80px;
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

			.overlay {
				position: absolute;
				top: 40px;
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

			.fa-close:hover {
				color: #c10c2d;
			}
			.icon{
				color: #d92b4b !important;
			}

			.product-image {
				display: block;
				width: 80px;
				height: 80px;
			}

			.product-image {
				border: 1px solid;
				border-radius: 5px;
			}
			ul {
				list-style-type: none;
			}
			small, .small {
				font-size: 50%;
			}
			.file_add_more, .file_add_rmv {
				position: relative;
				top: 45px;
			}
			.col-lg-9, .col-lg-3, .col-lg-2 {
				float: left;
			}
			.prw_crp_div {
				padding: 5px;
				text-align: center;
			}
			.crp_edit {
				max-width: 78%;
				border: 1px solid #ccc;
				padding-left: 4px;
				color: blue !important;
				cursor: pointer;
				text-align: center;
				font-weight: 600;
			}
			span.crop_del {
				position: absolute;
				top: 0;
				right: 0;
				color: red;
			}
			.add_more_file_hide, .prw_crp_div, .crp_edit, .crop_del {
				display: none;
			}
			div#myModal a#squ_crop {
				text-align: center;
				width: 100%;
				display: flex;
				background: #c2c6ca;
				max-width: 40%;
				margin: 0px auto;
				float: none;
				justify-content: center;
				margin-top: 15px;
				color: #000;
				font-weight: bold;
				height: 32px;
				align-items: center;
				Cursor:pointer;
			}

			.fileupload_sp {
				float: left;
				width: 70%;
			}
		</style>
		<!-- Page Header-->
		<header class="page-header">
			<div class="container-fluid">
				<h2 class="no-margin-bottom">Edit Product Variant</h2>
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
			.modal-dialog {
				max-width: min-content;
			}

		</style>
		<section> 
			<div class="container-fluid">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header d-flex align-items-center">
							<h3 class="h4">Edit Product Variant </h3>
						</div>
						<div class="card-body pve_item">

							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif

							<p></p>
							<form method="POST" action="{{route('admin.pvUpdate')}}" enctype="multipart/form-data"  class="custom-form">
								@csrf
								<input type="hidden" name="product_variant_id" id="product_variant_id" value="{{$product_data[0]->id}}">
								<input type="hidden" name="product_id" id="product_id" value="{{$product_data[0]->product_id}}">
								@foreach($product_data as $pov)
								<div class="row pov_item_1">
									<div class="col-lg-12">
										<div class="daily-feeds card">
											<div class="card-header">
												<h3 class="h4">{{strtoupper($pov->variant_name)}}</h3>
											</div>
											<div class="card-body no-padding">
												<!-- Item-->
												<div class="item">
													<div class="feed d-flex justify-content-between"><div class="error" id="form_error2"></div>
													<div class="col-lg-4">
														<div class="form-group">
															<label for="product_add_form">Name:  <span class="mandatory_field">*<span></label>
																<input type="text" class="form-control" name="pv_name" value="{{$pov->variant_name}}">
															</div>
														</div>
														<div class="col-lg-4">
															<div class="form-group">
																<label for="product_add_form">Price:  <span class="mandatory_field">*<span></label>
																	<input type="text" class="form-control" name="pv_price" value="{{$pov->price}}">
																</div>
															</div>
															<div class="col-lg-4">
																<div class="form-group">
																	<label for="product_add_form">Quantity:  <span class="mandatory_field">*<span></label>
																		@if($pov->quantites == null)
																		<input type="text" class="form-control" name="pv_quantity" value="u">
																		@else
																		<input type="text" class="form-control" name="pv_quantity"  value="{{$pov->quantites}}">
																		@endif
																	</div>
																</div>
															</div>
														</div>
														<div class="item clearfix">
															<div class="feed d-flex justify-content-between">


																<?php $testt= json_decode($pov->attributes, true);
						                        	// echo '<pre>';print_r($testt); ?>
						                        	@php $brandIds = collect($pov->attributes)->toArray() @endphp
						                        	@foreach($product_options as $po)
						                        	<?php  
						                        	if($po->id == 1)
						                        	{
						                        		$val = $size_val;	
						                        	}else
						                        	{
						                        		$val = $color_val;	
						                        	}

						                        	?>
						                        	<div class="col-lg-6">
						                        		<div class="form-group custom-txt-align product-option" style="border: 1px solid grey;padding: 10px;">
						                        			<label for="product_add_form">Attribute: <span style="text-transform: capitalize;font-weight: bold;">{{$po->name}}</span></label><br />
						                        			<div class="row">
						                        				<div class="col-lg-12">

						                        					<div class="form-group">
						                        						<select name="product_option_value_{{$po->id}}" id="pov{{$po->id}}" class="form-control color_attr" onchange="checkattirbutes()" required>
						                        							@foreach($val as $ov)
						                        							<option value="{{$ov}}" @if(in_array($ov, $testt)) selected @endif >{{$ov}}</option>
						                        							@endforeach 

		<!-- 	             @foreach($options_varaints as $ov)
						                                  @if($ov->product_option_id == $po->id)
						                                        <option value="{{$ov->name}}"
		            @if(in_array($ov->name, $testt)) selected @endif
						                                        	>{{$ov->name}}</option>
						                                  @endif
						                                  @endforeach -->
						                              </select>
						                          </div>
						                      </div>
						                  </div>     
						              </div>
						          </div>
						          @endforeach
						      </div>
						  </div>
						  <div class="item clearfix">
						  	<div class="feed">
						  		<div class="row">
						  			<div class="col-lg-6">
						  				<div class="form-group">
						  					<label for="product_variant_ref_no">Variant Reference No:  <span class="mandatory_field">*<span></label>
						  						<input type="number" style="padding: 19px;" class="form-control" name="product_variant_ref_no" value="{{$pov->product_variant_ref_no}}">
						  					</div>
						  				</div>
						  				<div class="col-lg-6">
						  					<div class="form-group">
						  						<label for="product_add_form">Image:  <span class="mandatory_field">*<span> <small>Upto 4 images allowed.</small></label>
						  							<input id="fileupload_1" class="fileupload" type="file" data-name="1" name="pv_upload[1][m][]" multiple="multiple" style="padding: 4px !important;" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_1"></div>
						  						</div>
						  					</div>


						  				</div>
							                        <!-- <div class="col-lg-6">
							                            <div class="form-group">
							                                <label for="product_add_form">Promo Image:  <span class="mandatory_field">*<span> <small>Upto 4 images split allowed.</small></label>
							                                <input id="fileupload_sp_1" class="fileupload_sp" type="file" data-name="1" name="pv_upload[1][s][]" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_sp1"></div>
							                                <button id="fileupload_sp_button_1" class="fileupload_sp_button" data-type="1" type="button">Split</button><div class="error pv_upload_sp_1" style="float: left;"></div>
							                            </div>
							                            <input type="hidden" id="fsvalue_1" name="fsvalue_1[]" />
							                        </div>   -->
							                    </div>

							                </div>
							                <input type="hidden" id="x_1_1" name="x_1_1" />
							                <input type="hidden" id="y_1_1" name="y_1_1" />
							                <input type="hidden" id="w_1_1" name="w_1_1" />
							                <input type="hidden" id="h_1_1" name="h_1_1" />
							                <input type="hidden" id="x_1_2" name="x_1_2" />
							                <input type="hidden" id="y_1_2" name="y_1_2" />
							                <input type="hidden" id="w_1_2" name="w_1_2" />
							                <input type="hidden" id="h_1_2" name="h_1_2" />
							                <input type="hidden" id="x_1_3" name="x_1_3" />
							                <input type="hidden" id="y_1_3" name="y_1_3" />
							                <input type="hidden" id="w_1_3" name="w_1_3" />
							                <input type="hidden" id="h_1_3" name="h_1_3" />
							                <input type="hidden" id="x_1_4" name="x_1_4" />
							                <input type="hidden" id="y_1_4" name="y_1_4" />
							                <input type="hidden" id="w_1_4" name="w_1_4" />
							                <input type="hidden" id="h_1_4" name="h_1_4" />
							                <div class="item clearfix">
							                	<div class="feed d-flex justify-content-end">
							                		<div class="dvPreview_1">
							                			@foreach($pvi_data as $img)
							                			@if($img->image)
							                			<img style="height:100px;width: 100px" src="{{url('portal/img/product/'.$img->image)}}">
							                			@endif
							                			@endforeach
							                		</div>
							                	</div>
							                	<div class="feed d-flex justify-content-between">
							                		<div class="col-lg-12 dvPreview_sp_1">
							                			<div class="col-lg-2 prw_crp_div input-group-prw_1">
							                				<div class="prw_crp">
							                					<img id="cropbox_1_1" class="cropbox"  width="100" height="100"  />
							                					<canvas id="preview_1_1" class="preview" style="width:100px;height:100px;display:none;"></canvas>
							                					<a class="crp_edit" id="crop_1_1" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>
							                				</div>
							                				<span data-type="1" data-type-value="1" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>
							                			</div>
							                			<div class="col-lg-2 prw_crp_div input-group-prw_2">
							                				<div class="prw_crp">
							                					<img id="cropbox_1_2" class="cropbox"  width="100" height="100"  />
							                					<canvas id="preview_1_2" class="preview" style="width:100px;height:100px;display:none;"></canvas>
							                					<a class="crp_edit" id="crop_1_2" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>
							                				</div>
							                				<span data-type="1" data-type-value="2" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>
							                			</div>
							                			<div class="col-lg-2 prw_crp_div input-group-prw_3">
							                				<div class="prw_crp">
							                					<img id="cropbox_1_3" class="cropbox"  width="100" height="100"  />
							                					<canvas id="preview_1_3" class="preview" style="width:100px;height:100px;display:none;"></canvas>
							                					<a class="crp_edit" id="crop_1_3" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>
							                				</div>
							                				<span data-type="1" data-type-value="3" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>
							                			</div>
							                			<div class="col-lg-2 prw_crp_div input-group-prw_4">
							                				<div class="prw_crp">
							                					<img id="cropbox_1_4" class="cropbox"  width="100" height="100"  />
							                					<canvas id="preview_1_4" class="preview" style="width:100px;height:100px;display:none;"></canvas>
							                					<a class="crp_edit" id="crop_1_4" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>
							                				</div>
							                				<span data-type="1" data-type-value="4" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>
							                			</div>
							                		</div>
							                	</div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
							@endforeach


							<div class="offset-md-5 col-lg-2">
								<div class="form-group">       
									<input type="submit" value="Update" class="btn btn-primary">
								</div>				
							</div>


						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endsection

	@section('footer_script')

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<input type="hidden" class="previewid" value="'+id+'"><img id="demo"  width="50" height="50" src="{{ asset('images/cls_images.png') }}" /><a id="squ_crop">Crop to Square</a>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-success" id="crp_save" data-dismiss="modal" value="save">Save</button>
				</div>
			</div>
		</div>
	</div>


	<script language="javascript" type="text/javascript">

		function checkattirbutes()
		{
			var size= $('#pov1').val();
			var color= $('#pov2').val();
			var product_variant_id= $('#product_variant_id').val();
			var product_id= $('#product_id').val();  
			$.ajax({ 
				url: '{{url("/admin/attribute_check")}}?product_variant_id='+product_variant_id+'&product_id='+product_id+'&size='+size+'&color='+color,  
				type: 'GET',
				success: function(response){ 
					if(response.status==true){
						alert("already existing size and color this product");
					}  	       
				}  
			});

		}

			//color attr functionality
			$(document).ready(function(){
				$("#pov2 option").each(function()
				{
					var colorVal = $(this).val();
					var t = colourNameToHex(colorVal);
					$(this).css('background-color', t);
					$(this).html(colorVal+' - '+t);
				});
			});
		// $(".fileupload").on('change', function() {
			$(".pve_item").on('change', '.fileupload', function(){
				var dvptype=$(this).attr("data-name"); 
				$(".pve_item .dvPreview_sp_"+dvptype+" .prw_crp_div").hide();
				var dvPreview = $(".dvPreview_"+dvptype);
				dvPreview.html("");
				$(".pve_item .pv_upload_"+dvptype).removeClass('valid_class').text('');
				if (parseInt($(this).get(0).files.length)>4) {
					$(this).val("");
					$(".pve_item #fileupload_sp_"+dvptype).prop('disabled', false);
		      // alert("You can only upload a maximum of 4 files");
		      $(".pve_item .pv_upload_"+dvptype).addClass('valid_class').text('You can only upload a maximum of 4 files');
		      return false;
		  }
		  $(".pve_item #fileupload_sp_"+dvptype).prop('disabled', true).val('');
		  if (typeof (FileReader) != "undefined") {
		  	var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
		  	$($(this)[0].files).each(function () {
		  		var file = $(this);
		  		if (regex.test(file[0].name.toLowerCase())) {
		  			var reader = new FileReader();
		  			reader.onload = function (e) {
		  				var img = $("<img />");
		  				img.attr("style", "height:100px;width: 100px; margin: 0px 10px;border-radius: 2px;");
		  				img.attr("src", e.target.result);
		  				dvPreview.append(img);
		  			}
		  			reader.readAsDataURL(file[0]);
		  		} else {
		  			alert(file[0].name + " is not a valid image file.");
		  			dvPreview.html("");
		  			return false;
		  		}
		  	});
		  } else {
		  	alert("This browser does not support HTML5 FileReader.");
		  }
		});


			$(".pve_item").on('change', '.fileupload_sp', function(){
				var dvptype=$(this).attr("data-name");
				console.log(dvptype);
				$(".pve_item #fsvalue_"+dvptype).val('');
				var dvPreview = $(".dvPreview_"+dvptype);
				dvPreview.html("");
				$(".pve_item .pv_upload_"+dvptype).removeClass('valid_class').text('');
				if (typeof (FileReader) != "undefined") {
					var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
					$($(this)[0].files).each(function () {
						var file = $(this);
						if (regex.test(file[0].name.toLowerCase())) {
							var reader = new FileReader();
							reader.onload = function (e) {
								$(".pve_item .dvPreview_sp_"+dvptype+" .cropbox").attr('src', e.target.result);
								$(".pve_item .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_1").click();
							}
							reader.readAsDataURL(file[0]);
						} else {
							alert(file[0].name + " is not a valid image file.");
							dvPreview.html("");
							return false;
						}
					});
				} else {
					alert("This browser does not support HTML5 FileReader.");
				}
			});

			function updateCoords(c)
			{
		      // alert();

		      $('#crp_save').click(function(){
		        // console.log(c);
		   // if(c!=""){
		    // var xArr = [];
		    // xArr.push($('#x').val());
		    // xArr.push(c.x);

		    var pid=$(".previewid").val();
		    var pimg = $('#demo').attr('src');
		      // alert(pid);
		      // console.log("preview"+pid);
		      var split =pid.split("_");
		      var split_nxt = parseInt(split[1]) + 1;
		      var dvp_split_nxt = split[0]+'_'+split_nxt;


		      $(".dvPreview_sp_"+split[0]+" #cropbox_"+split[0]+"_"+split[1]).attr('src', pimg);
		      $(".pve_item .dvPreview_sp_"+split[0]+" .input-group-prw_"+split[1]).show();

		      $('#x_'+pid).val(c.x);
		      $('#y_'+pid).val(c.y);
		      $('#w_'+pid).val(c.w);
		      $('#h_'+pid).val(c.h);


		      $('#src_'+pid).val(split[1]);
		   // }
		   //     else{
		   //       $('#x').val(100);
		   //     $('#y').val(100);
		   //     $('#w').val(240);
		   //     $('#h').val(240);
		   //     }
		   
		      // console.log(c.w);
		      
		          // window.close();
		          if(parseInt(c.w) > 0) {
		          // Show image preview
		          var imageObj = $("#cropbox_"+pid)[0];
		          var canvas = $("#preview_"+pid)[0];
		          var context = canvas.getContext("2d");

		          context.drawImage(imageObj, c.x, c.y, c.w, c.h, 0, 0, canvas.width, canvas.height);
		          $("#cropbox_"+pid).hide();
		          $("#preview_"+pid).show();

		          iziToast.success({title: 'Success', message: 'Image splitted successfully..!!', position: 'topRight',  });

		          $(".pve_item .dvPreview_sp_"+split[0]+" #crop_"+split[0]+"_"+split_nxt).click();

		      }
		  });
		      
		  };

		  function readdemoURL(input,id) {
		    // console.log(input,id);


		    if (input.files && input.files[0]) {
		      // alert();
		    // console.log("hi2");
		        // $('#demo').attr('src'," ");
		        var reader = new FileReader();

		        reader.onload = function(e) {
		        // console.log(e.target.result);
		        // $('#demo').attr('src', e.target.result);
		        // if(e.target.result!=" "){
		        // var dva_value=id.split("_");spl[1]
		        $('.modal-body').html('<input type="hidden" class="previewid" value="'+id+'"><img id="demo"  width="50" height="50" src="'+e.target.result+'" />');
		        $('.modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" id="crp_save" data-dismiss="modal" value="save">Split</button>');
		        $('#myModal').modal('show');
		      //   }else{  
		      //   console.log("test");
		      // $('.modal-body').html('<input type="hidden" class="previewid" value="'+id+'"><img id="demo"  width="50" height="50" src="/projectAssets/cls_images.png" /><a id="squ_crop">Crop to sqaure</a>');
		      //   }
		      $('#demo').Jcrop({
		      	boxWidth: 650,   
		      	boxHeight: 400,
		        // aspectRatio: 150/100,
		        // setSelect: [0,0,150,100],
		        aspectRatio: NaN,
		        // setSelect:   [50, 0, 300,300],
		        allowResize: false,
		        bgFade: true, // use fade effect
		        bgOpacity: .3, // fade opacity
		        onSelect: updateCoords,
		        // setSelect: [100, 100, 240, 240],
		        // onChange: showPreview,
		        // onChange : updatePreview,
		        
		    });


		  }

		      reader.readAsDataURL(input.files[0]); // convert to base64 string
		  }

		}

		$(document).on( "click", ".crp_edit", function() {
			var id = $(this).attr("id");
		          // console.log(id);

		          var spl=id.split("_");
		          
		          $('#fileupload_sp_'+spl[1]).each(function(index, value){
		          	console.log(this.value);

		          	readdemoURL(this,spl[1]+'_'+spl[2])
		          });
		          

		     // alert(spl);
		         // $('#cropimgs').show();
		         // $("#preview").hide();
		     });
		 </script>
		 <script>

		var currentTab = 0; // Current tab is set to be the first tab (0)
		showTab(currentTab); // Display the current tab

		function showTab(n) {
		// This function will display the specified tab of the form...
		var x = document.getElementsByClassName("tab");
		x[n].style.display = "block";
		//... and fix the Previous/Next buttons:
		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == (x.length - 1)) {
			document.getElementById("nextBtn").innerHTML = "Submit";
		} else {
			document.getElementById("nextBtn").innerHTML = "Next";
		}
		//... and run a function that will display the correct step indicator:
		fixStepIndicator(n)
	}

	function submit_page(n)
	{
		//alert(n);
		if(document.getElementById("nextBtn").innerHTML=="Submit")
		{
			$('#nextBtn').prop('disabled', true);
			document.getElementById("nextBtn").innerHTML="Processing";
			form_validation_check();
			return false;
		}  
		nextPrev(n)
	}

	function nextPrev(n) {
		var style=document.getElementById("sub_category_name_div").style.display;
		var product_name=$("#product_name").val();
		var category_name=$("#category_name_product_add").val();
		var supplier_name=$("#supplier_name_product_add").val();
		var product_description=$("#product_description").val();
		var product_width=$("#product_width").val();
		var product_height=$("#product_height").val();
		var checked_values = [];

		// Loop through the checked checkboxes in the same group
		// and add their values to an array
		$('.product-option input[type="checkbox"]:checked').each(function(){
			checked_values.push($(this).val());
		});
		var total_checked_values = checked_values.length;
		$('#product_option_error').removeClass('valid_class').text('');

		var valid=0;
		if(total_checked_values == 0)
		{
			$('#product_option_error').addClass('valid_class');
			$("#product_option_error").text('The product option field is required.');
			valid=1;
		}
		if(product_name=='')
		{
			$('#product_name_error').addClass('valid_class');
			$("#product_name_error").text('The product name field is required.');
			valid=1;
		}
		if(product_name=='')
		{
			$('#product_name_error').addClass('valid_class');
			$("#product_name_error").text('The product name field is required.');
			valid=1;
		}
		if(product_name!='')
		{
			$('#product_name_error').removeClass('valid_class');
			$("#product_name_error").text('');
			valid=0;
		}
		if(category_name==null)
		{
			$('#category_id_error').addClass('valid_class');
			$("#category_id_error").text('The category field is required.');
			valid=1;
		}
		if(category_name!=null)
		{
			$('#category_id_error').removeClass('valid_class');
			$("#category_id_error").text('');
			valid=0;
		}
		if(supplier_name==null)
		{
			$('#supplier_id_error').addClass('valid_class');
			$("#supplier_id_error").text('The supplier field is required.');
			valid=1;
		}
		if(supplier_name!=null)
		{
			$('#supplier_id_error').removeClass('valid_class');
			$("#supplier_id_error").text('');
			valid=0;
		}
		if(product_description=='')
		{
			$('#product_description_error').addClass('valid_class');
			$("#product_description_error").text('The product description field is required.');
			valid=1;
		}
		if(product_description!='')
		{
			if(product_description.length < 20){
				$('#product_description_error').addClass('valid_class');
				$("#product_description_error").text('The product description must contain 20 characters.');
				valid=1;
			}
			else if(product_description.length > 60){
				$('#product_description_error').addClass('valid_class');
				$("#product_description_error").text('The product description must be in below 60 characters .');
				valid=1;
			}
			else{
				$('#product_description_error').removeClass('valid_class');
				$("#product_description_error").text('');
				valid=0;
			}
		}

		if(product_width=='')
		{
			$('#product_width_error').addClass('valid_class');
			$("#product_width_error").text('The product width field is required.');
			valid=1;
		}
		if(product_width!='')
		{
			$('#product_width_error').removeClass('valid_class');
			$("#product_width_error").text('');
			valid=0;
		}

		if(product_height=='')
		{
			$('#product_height_error').addClass('valid_class');
			$("#product_height_error").text('The product height field is required.');
			valid=1;
		}
		if(product_height!='')
		{
			$('#product_height_error').removeClass('valid_class');
			$("#product_height_error").text('');
			valid=0;
		}
		// if(product_image=='')
		// {
		//   $('#product_image_error1').addClass('valid_class');
		//   $("#product_image_error1").text('The product image field is required.');
		//   valid=1;
		// }
		// if(product_image!='')
		// {
		//   $('#product_image_error1').removeClass('valid_class');
		//   $("#product_image_error1").text('');
		//   valid=0;
		// }
		if(style!='none')
		{
		//alert($("#sub_category_name_product_add").val());
		if($("#sub_category_name_product_add").val()==null)
		{
			$("#sub_category_id_error").text('The sub category id field is required.');
			return false;
		}
		else
		{
			$("#sub_category_id_error").text('');
		}

	}
	if($('.valid_class').length>0)
	{
		return false;
	}

		// $("#product_description_error").text('The product description field is invalid.');
		// return false;

		// $('.form_final').html('');

		$('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
			e.preventDefault();
		   var max_fields_limit      = 8; //set limit for maximum input fields
		   var x = 1; //initialize counter for text box
		   if(x < max_fields_limit){ //check conditions
		       x++; //counter increment
		       $('.input_fields_container_part').append('<div><input type="text" name="tags"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
		   }
		});  
		$('.input_fields_container_part').on("click",".remove_field", function(e){ //user click on remove text links
			e.preventDefault(); $(this).parent('div').remove(); x--;
		})

		// console.log(checked_values.length);

		//alert(n);
		// This function will figure out which tab to display
		var x = document.getElementsByClassName("tab");
		// Exit the function if any field in the current tab is invalid:
		if (n == 1 && !validateForm()) return false;
		// Hide the current tab:
		if(currentTab<=1)
		{
			x[currentTab].style.display = "none";
		}
		// Increase or decrease the current tab by 1:
		currentTab = currentTab + n;
		// if you have reached the end of the form...
		if (currentTab >= x.length) {
		// ... the form gets submitted:
		//document.getElementById("product_add_form").submit();
		form_validation_check();
		return false;
	}
		// Otherwise, display the correct tab:
		showTab(currentTab);
	}

	function validateForm() {
		// This function deals with validation of the form fields
		valid = true;
		// If the valid status is true, mark the step as finished and valid:
		if (valid) {
			document.getElementsByClassName("step")[currentTab].className += " finish";
		}
		return valid; // return the valid status
	}

	function fixStepIndicator(n) {
		// This function removes the "active" class of all steps...
		var i, x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++) {
			x[i].className = x[i].className.replace(" active", "");
		}
		//... and adds the "active" class on the current step:
		x[n].className += " active";
	}

	function form_validation_check()
	{
		alert("n1");
		var append_field_valid=0;
		if(append_field_valid==1)
		{
			return false;
		}





		var data = document.getElementById("product_add_form");
		var form_data=new FormData(data);
		$(".error").html('');
		url="{{ route('admin.productUpdate') }}"
		$.ajax({
			type: "POST",
			url: url,
			headers:  {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}, 
			processData: false,
			contentType: false,        
			data:form_data,         
			success: function (data) {
				if(data.status==false)
				{
		                //alert(JSON.stringify(data.status));
		                var errorString = '<ul>';
		                $.each(data.errors,function(k, v){
		                     // alert(("#" + index + "_error"));
		                      //$("#" + index + "_error").text(value[0]);
		                      errorString += '<li>' + v + '</li>';
		                      // console.log(k);
		                      // $("."+k).html('tester'+v[0]);
		                  });
		                errorString += '</ul>';
		                $("#form_validation_div").html('');
		                $("#form_validation_div").append(errorString);
		                $(window).scrollTop($('#form_validation_div').position().top);
		                document.getElementById("nextBtn").innerHTML="Submit";
		                $('#nextBtn').prop('disabled', false);

		            }
		            else
		            {
		                // alert(JSON.stringify(data.status));
		                document.location.href="{!! route('admin.product_list'); !!}";
		            }
		        },
		        error: function (data) {
		        	document.getElementById("nextBtn").innerHTML="Submit";
		        	$('#nextBtn').prop('disabled', false);
		        	console.log('Error:', data);
		        }
		    });

	}

	function category_dropdown_change(category_id)
	{
		//alert(category_id);
		category_name_product_add=category_id.value;
		url="{{ route('admin.get_sub_category') }}";
		$.ajax({
			type: "get",
			url: url+'/'+category_id,
			data:{
				"_token": "{{ csrf_token() }}",
			},         
			success: function (data) {
				if(data.category_name!='')
				{
					$("#sub_category_name_product_add").empty();
					$("#sub_category_name_div").show();
					$('select[name="sub_category_id"]').append('<option disabled selected="selected">Please select a sub category name</option>');
					$.each(data.category_name, function (key, val) {
		                // console.log(val)
		                $('select[name="sub_category_id"]').append('<option value="'+ val.id +'">'+ val.category_name +'</option>').attr('selected', true);

		                var tmp = $('#sub_category_value').val();
		                if(tmp){
		                	$('#sub_category_name_product_add').val(tmp)
		                }

		              // console.log(val.category_name);  
		          });  
				}
				else
				{
					$("#sub_category_name_product_add").empty();
					$("#sub_category_name_div").hide();
				}
			},
			error: function (data) {
				console.log('Error:', data);
			}
		});
	}

	function product_name_change()
	{
		product_name=$("#product_name").val();
		product_id_value=$("#product_id_value").val();
		url="{{ route('admin.productNameCheckUpdate') }}";
		if(product_name!='')
		{
			$.ajax({
				type: "get",
				url: url+'/'+product_name+'/'+product_id_value,
				data:{
					"_token": "{{ csrf_token() }}",
				},         
				success: function (data) {
					if(data.status==false)
					{
						$("#product_name").val('');
						$.each(data.errors, function (key, val) {
							$("#" + key + "_error").text(val[0]);
						});
					}
					else{
						$("#product_name_error").text('');
					}
				},
				error: function (data) {
					console.log('Error:', data);
				}
			}); 
		} 
	}

		// function add_element()
		// {
		//   var maxField = 3; 
		//   var fieldHtml='<label for="product_add_form">Product Image:</label><br /><p><input  type="file" name="" ></p><label for="product_add_form">Product Color:</label><br /><p><input type="color" class="colpick" name="favcolor" value="#ff0000" style="width:10%;"></p> <label for="product_add_form">Product Size:</label><div class="d-flex"><div class="i-checks d-flex"><input id="checkboxCustom2" type="checkbox" value="" class="checkbox-template"><label for="checkboxCustom2" class="d-flex">Small <input type="text" class="form-control" value="0"/></label></div><div class="i-checks d-flex"><input id="checkboxCustom2" type="checkbox" value=""  class="checkbox-template"><label for="checkboxCustom2" class="d-flex">Medium <input type="text" class="form-control" value="0"/></label></div><div class="i-checks d-flex"><input id="checkboxCustom2" type="checkbox" value="" class="checkbox-template"><label for="checkboxCustom2" class="d-flex">Large <input type="text" class="form-control" value="0"/></label></div><button type="button" class="btn btn-danger" style="float:right" onclick="remove_element()">Remove</button>';
		//   x=1;
		//   alert(x);
		//   if(x < maxField){ 
		//     $(".pve_item").append(fieldHtml);
		//     x++;
		//   }

		// }


		$(document).ready(function(){

			function removeImage(id){

				$('#'+id).val('');
				$('#img_'+id).remove();
				$('#remove_front'+id).hide();
				$('#remove_back'+id).hide();

				console.log();
			}

			function updateImage(){
				$('#is_edit_image').val('1');
			}

			function updateImages(){
				var images = ($('#front_side').val());
				var filtered = images.filter(function (el) {
					return el != '';
				});
				$('#front_side').val(filtered);
				$('#back_side').val(filtered);
				$('#product_add_form').submit();
			}

			function removeFunction(_this)
			{
				console.log(_this.value);
				var id = _this.value;
		// alert(id);

		$('#removeId').val(id);
		// console.log(id);
	}
	function removeForm()
	{


		var id1= $('#removeId').val();
		$('#variant_item'+id1).remove();

		$("#myModal").modal("hide");
		$(".modal-backdrop").remove();

	}

	$('.pve_item').on('click', '.file_add_rmv', function(e) {
		var data_type=$(this).attr("data-name");
		var dvptypevalue=$(this).attr("data-remove");
		  // console.log(data_type+dvptypevalue);
		  $(".pve_item #added_field_"+data_type+"_"+dvptypevalue).remove();
		  $(".pve_item .dvPreview_"+data_type+" .input-group-prw_"+dvptypevalue).remove();
		});

	function dvpRemove(v) {
		var data_type=$(v).attr("data-type");
		var dvptypevalue=$(v).attr("data-type-value");
		  // $(".pve_item #added_field_"+data_type+"_"+dvptypevalue).remove();
		  $(".pve_item #upload_"+data_type+"_"+dvptypevalue).val('');
		  // $(".pve_item .dvPreview_"+data_type+" .input-group-prw_"+dvptypevalue).remove();
		  $(".pve_item .dvPreview_"+data_type+" .input-group-prw_"+dvptypevalue).hide();
		  $(".pve_item .dvPreview_"+data_type+" .input-group-prw_"+dvptypevalue+" img").removeAttr("src");
		  $(".pve_item #upload_"+data_type+"_"+dvptypevalue).prop('disabled', false);
		}

		$('#product_add_form').on('change', '.pov_check', function(e) {
			var ischecked= $(this).is(':checked');
			var checkedValue = $(this).val().toLowerCase();
			if(!ischecked) {
		    // console.log(checkedValue + ' Removed');
		    $('.pov_item_'+checkedValue).remove();
		} else {
		    // console.log(checkedValue + ' Added');
		    var item_data = addPVItem(checkedValue);
		    $('.form_final').append(item_data);
		}
	});
	});

		function addPVItem(pv_type) {

			var res = '';
		// var pv_type = pv_type;
		  // console.log(item);
		  // return false;
		  res +=
		  '<div class="row pov_item_'+pv_type+'">'+
		  '<div class="col-lg-12">'+
		  '<div class="daily-feeds card">'+
		  '<div class="card-header">'+
		  '<h3 class="h4">'+pv_type.toUpperCase()+'</h3>'+
		  '</div>'+
		  '<div class="card-body no-padding">'+
		  '<!-- Item-->'+
		  '<div class="item">'+
		  '<div class="feed d-flex justify-content-between"><div class="error" id="form_error2"></div>'+
		  '<div class="col-lg-4">'+
		  '<div class="form-group">'+
		  '<label for="product_add_form">Name:  <span class="mandatory_field">*<span></label>'+
		  '<input type="text" class="form-control" name="pv_name['+pv_type+']" value=""> '+
		  '</div>'+
		  '</div>'+
		  '<div class="col-lg-4">'+
		  '<div class="form-group">'+
		  '<label for="product_add_form">Price:  <span class="mandatory_field">*<span></label>'+
		  '<input type="text" class="form-control" name="pv_price['+pv_type+']" value=""> '+
		  '</div>'+
		  '</div>'+
		  '<div class="col-lg-4">'+
		  '<div class="form-group">'+
		  '<label for="product_add_form">Quantity:  <span class="mandatory_field">*<span></label>'+
		  '<input type="text" class="form-control" name="pv_quantity['+pv_type+']" value="">'+
		  '</div>'+
		  '</div>'+
		  '</div>'+
		  '</div>'+
		  '<div class="item clearfix">'+
		  '<div class="feed d-flex justify-content-between">'+
		  '<div class="col-lg-6">'+
		  '<div class="form-group">'+
		  '<label for="product_add_form">Image:  <span class="mandatory_field">*<span> <small>Upto 4 images allowed.</small></label>'+
		  '<input id="fileupload_'+pv_type+'" class="fileupload" type="file" data-name="'+pv_type+'" name="pv_upload['+pv_type+'][m][]" multiple="multiple" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_'+pv_type+'"></div>'+
		  '</div>'+
		  '</div>'+
		  '<div class="col-lg-6">'+
		  '<div class="form-group">'+
		  '<label for="product_add_form">Split Image:  <span class="mandatory_field">*<span> <small>Upto 4 images split allowed.</small></label>'+
		  '<input id="fileupload_sp_'+pv_type+'" class="fileupload_sp" type="file" data-name="'+pv_type+'" name="pv_upload['+pv_type+'][s][]" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_sp'+pv_type+'"></div>'+
		  '<button id="fileupload_sp_button_'+pv_type+'" class="fileupload_sp_button" data-type="'+pv_type+'" type="button">Split</button><div class="error pv_upload_sp_'+pv_type+'" style="float: left;"></div>'+
		  '</div>'+
		  '<input type="hidden" id="fsvalue_'+pv_type+'" name="fsvalue_'+pv_type+'[]" />'+
		  '</div>'+
		  '</div>'+
		  '</div>'+
		                  // '<input type="hidden" id="x_'+pv_type+'_1" name="x_'+pv_type+'_1" />'+
		                  '<input type="hidden" id="y_'+pv_type+'_1" name="y_'+pv_type+'_1" />'+
		                  '<input type="hidden" id="w_'+pv_type+'_1" name="w_'+pv_type+'_1" />'+
		                  '<input type="hidden" id="h_'+pv_type+'_1" name="h_'+pv_type+'_1" />'+
		                  '<input type="hidden" id="x_'+pv_type+'_2" name="x_'+pv_type+'_2" />'+
		                  '<input type="hidden" id="y_'+pv_type+'_2" name="y_'+pv_type+'_2" />'+
		                  '<input type="hidden" id="w_'+pv_type+'_2" name="w_'+pv_type+'_2" />'+
		                  '<input type="hidden" id="h_'+pv_type+'_2" name="h_'+pv_type+'_2" />'+
		                  '<input type="hidden" id="x_'+pv_type+'_3" name="x_'+pv_type+'_3" />'+
		                  '<input type="hidden" id="y_'+pv_type+'_3" name="y_'+pv_type+'_3" />'+
		                  '<input type="hidden" id="w_'+pv_type+'_3" name="w_'+pv_type+'_3" />'+
		                  '<input type="hidden" id="h_'+pv_type+'_3" name="h_'+pv_type+'_3" />'+
		                  '<input type="hidden" id="x_'+pv_type+'_4" name="x_'+pv_type+'_4" />'+
		                  '<input type="hidden" id="y_'+pv_type+'_4" name="y_'+pv_type+'_4" />'+
		                  '<input type="hidden" id="w_'+pv_type+'_4" name="w_'+pv_type+'_4" />'+
		                  '<input type="hidden" id="h_'+pv_type+'_4" name="h_'+pv_type+'_4" />'+
		                  '<div class="item clearfix">'+
		                  '<div class="feed d-flex justify-content-between">'+
		                  '<div class="dvPreview_'+pv_type+'"></div>'+
		                  '</div>'+
		                  '<div class="feed d-flex justify-content-between">'+
		                  '<div class="col-lg-12 dvPreview_sp_'+pv_type+'">'+
		                  '<div class="col-lg-2 prw_crp_div input-group-prw_1">'+
		                  '<div class="prw_crp">'+
		                  '<img id="cropbox_'+pv_type+'_1" class="cropbox"  width="100" height="100"  />'+
		                  '<canvas id="preview_'+pv_type+'_1" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
		                  '<a class="crp_edit" id="crop_'+pv_type+'_1" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
		                  '</div>'+
		                  '<span data-type="'+pv_type+'" data-type-value="1" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
		                  '</div>'+
		                  '<div class="col-lg-2 prw_crp_div input-group-prw_2">'+
		                  '<div class="prw_crp">'+
		                  '<img id="cropbox_'+pv_type+'_2" class="cropbox"  width="100" height="100"  />'+
		                  '<canvas id="preview_'+pv_type+'_2" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
		                  '<a class="crp_edit" id="crop_'+pv_type+'_2" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
		                  '</div>'+
		                  '<span data-type="'+pv_type+'" data-type-value="2" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
		                  '</div>'+
		                  '<div class="col-lg-2 prw_crp_div input-group-prw_3">'+
		                  '<div class="prw_crp">'+
		                  '<img id="cropbox_'+pv_type+'_3" class="cropbox"  width="100" height="100"  />'+
		                  '<canvas id="preview_'+pv_type+'_3" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
		                  '<a class="crp_edit" id="crop_'+pv_type+'_3" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
		                  '</div>'+
		                  '<span data-type="'+pv_type+'" data-type-value="3" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
		                  '</div>'+
		                  '<div class="col-lg-2 prw_crp_div input-group-prw_4">'+
		                  '<div class="prw_crp">'+
		                  '<img id="cropbox_'+pv_type+'_4" class="cropbox"  width="100" height="100"  />'+
		                  '<canvas id="preview_'+pv_type+'_4" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
		                  '<a class="crp_edit" id="crop_'+pv_type+'_4" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
		                  '</div>'+
		                  '<span data-type="'+pv_type+'" data-type-value="4" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
		                  '</div>'+
		                  '</div>'+
		                  '</div>'+
		                  '</div>'+
		                  '</div>'+
		                  '</div>'+
		                  '</div>'+
		                  '</div>';

		                  return res;
		// $('.form_final').append(res);
	}


	$('.pve_item').on('click', '.fileupload_sp_button', function(e) {
		var dvptype=$(this).attr("data-type");
		$(".pve_item .pv_upload_sp_"+dvptype).removeClass('valid_class').text('');
		if (! $('#fileupload_sp_'+dvptype).val()) {
			$(".pve_item .pv_upload_sp_"+dvptype).addClass('valid_class').text('No files selected.');
			return false;
		}

		var crop1 = $('#x_'+dvptype+'_1').val();
		if(!crop1) {
			$(".pve_item .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_1").click();
			return false;
		}

		var crop2 = $('#x_'+dvptype+'_2').val();
		if(!crop2) {
			$(".pve_item .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_2").click();
			return false;
		}

		var crop3 = $('#x_'+dvptype+'_3').val();
		if(!crop3) {
			$(".pve_item .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_3").click();
			return false;
		}

		var crop4 = $('#x_'+dvptype+'_4').val();
		if(!crop4) {
			$(".pve_item .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_4").click();
			return false;
		}


	});
		//color attr functionslity
		function colourNameToHex(colour)
		{
			var colours = {"aliceblue":"#f0f8ff","antiquewhite":"#faebd7","aqua":"#00ffff","aquamarine":"#7fffd4","azure":"#f0ffff",
			"beige":"#f5f5dc","bisque":"#ffe4c4","black":"#000000","blanchedalmond":"#ffebcd","blue":"#0000ff","blueviolet":"#8a2be2","brown":"#a52a2a","burlywood":"#deb887",
			"cadetblue":"#5f9ea0","chartreuse":"#7fff00","chocolate":"#d2691e","coral":"#ff7f50","cornflowerblue":"#6495ed","cornsilk":"#fff8dc","crimson":"#dc143c","cyan":"#00ffff",
			"darkblue":"#00008b","darkcyan":"#008b8b","darkgoldenrod":"#b8860b","darkgray":"#a9a9a9","darkgreen":"#006400","darkkhaki":"#bdb76b","darkmagenta":"#8b008b","darkolivegreen":"#556b2f",
			"darkorange":"#ff8c00","darkorchid":"#9932cc","darkred":"#8b0000","darksalmon":"#e9967a","darkseagreen":"#8fbc8f","darkslateblue":"#483d8b","darkslategray":"#2f4f4f","darkturquoise":"#00ced1",
			"darkviolet":"#9400d3","deeppink":"#ff1493","deepskyblue":"#00bfff","dimgray":"#696969","dodgerblue":"#1e90ff",
			"firebrick":"#b22222","floralwhite":"#fffaf0","forestgreen":"#228b22","fuchsia":"#ff00ff",
			"gainsboro":"#dcdcdc","ghostwhite":"#f8f8ff","gold":"#ffd700","goldenrod":"#daa520","gray":"#808080","green":"#008000","greenyellow":"#adff2f",
			"honeydew":"#f0fff0","hotpink":"#ff69b4",
			"indianred ":"#cd5c5c","indigo":"#4b0082","ivory":"#fffff0","khaki":"#f0e68c",
			"lavender":"#e6e6fa","lavenderblush":"#fff0f5","lawngreen":"#7cfc00","lemonchiffon":"#fffacd","lightblue":"#add8e6","lightcoral":"#f08080","lightcyan":"#e0ffff","lightgoldenrodyellow":"#fafad2",
			"lightgrey":"#d3d3d3","lightgreen":"#90ee90","lightpink":"#ffb6c1","lightsalmon":"#ffa07a","lightseagreen":"#20b2aa","lightskyblue":"#87cefa","lightslategray":"#778899","lightsteelblue":"#b0c4de",
			"lightyellow":"#ffffe0","lime":"#00ff00","limegreen":"#32cd32","linen":"#faf0e6",
			"magenta":"#ff00ff","maroon":"#800000","mediumaquamarine":"#66cdaa","mediumblue":"#0000cd","mediumorchid":"#ba55d3","mediumpurple":"#9370d8","mediumseagreen":"#3cb371","mediumslateblue":"#7b68ee",
			"mediumspringgreen":"#00fa9a","mediumturquoise":"#48d1cc","mediumvioletred":"#c71585","midnightblue":"#191970","mintcream":"#f5fffa","mistyrose":"#ffe4e1","moccasin":"#ffe4b5",
			"navajowhite":"#ffdead","navy":"#000080",
			"oldlace":"#fdf5e6","olive":"#808000","olivedrab":"#6b8e23","orange":"#ffa500","orangered":"#ff4500","orchid":"#da70d6",
			"palegoldenrod":"#eee8aa","palegreen":"#98fb98","paleturquoise":"#afeeee","palevioletred":"#d87093","papayawhip":"#ffefd5","peachpuff":"#ffdab9","peru":"#cd853f","pink":"#ffc0cb","plum":"#dda0dd","powderblue":"#b0e0e6","purple":"#800080",
			"rebeccapurple":"#663399","red":"#ff0000","rosybrown":"#bc8f8f","royalblue":"#4169e1",
			"saddlebrown":"#8b4513","salmon":"#fa8072","sandybrown":"#f4a460","seagreen":"#2e8b57","seashell":"#fff5ee","sienna":"#a0522d","silver":"#c0c0c0","skyblue":"#87ceeb","slateblue":"#6a5acd","slategray":"#708090","snow":"#fffafa","springgreen":"#00ff7f","steelblue":"#4682b4",
			"tan":"#d2b48c","teal":"#008080","thistle":"#d8bfd8","tomato":"#ff6347","turquoise":"#40e0d0",
			"violet":"#ee82ee",
			"wheat":"#f5deb3","white":"#ffffff","whitesmoke":"#f5f5f5",
			"yellow":"#ffff00","yellowgreen":"#9acd32"};

			if (typeof colours[colour.toLowerCase()] != 'undefined')
				return colours[colour.toLowerCase()];

			return false;
		} 


	</script>

	<!-- end of plugin scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.min.js"></script>
</body>
@endsection