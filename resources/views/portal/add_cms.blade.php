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
					<h3 class="h4">Add CMS</h3>
				</div>
				<div class="card-body">
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					<p></p>
					<form method="POST" action="{{url('/admin/cms/save')}}" enctype="multipart/form-data"  class="custom-form">
						@csrf
						<div class="form-group">
							<label class="form-control-label">Page Type <span class="mandatory_field">*<span></label><br>
							<select name="type" id="type" style="min-width: 100%;">
								<option value="help">Help</option>
								<option value="ideas">Ideas</option>
								<option value="others">Others</option>

                            </select>
							<span style='color:red'>{{ ($errors->has('type')) ? $errors->first('type') : '' }}</span>
						</div>
						<div class="form-group">
							<label class="form-control-label">Page Name <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Page Name" class="form-control" name="pagename" value="{{old('pagename')}}">
							<span style='color:red'>{{ ($errors->has('pagename')) ? $errors->first('pagename') : '' }}</span>
						</div>
						<div class="form-group">
							<label for="slug">Slug <span class="mandatory_field">*<span></label>
							<input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="post-slug">
							<span style='color:red'>{{ ($errors->has('slug')) ? $errors->first('slug') : '' }}</span>
						</div>
						<div class="form-group">       
							<label class="form-control-label">Content <span class="mandatory_field">*<span></label>
							<textarea class="form-control" id="contenteditor" name="content" >{{old('content')}}</textarea>
							<span style='color:red'>{{ ($errors->has('content')) ? $errors->first('content') : '' }}</span>
						</div>
						<div class="form-group">       
							<label class="form-control-label">Upload Image</label>
							<input type="file" id="profileUpload" name="files[]" class="form-control" value= {{old('files')}} onchange="(event)">
							@if(Session::has('files')) <span style='color:red'>{{ Session::get('files') }}</span> @endif
						</div>
						@if($cms)
						<input type="hidden" value="{{base64_encode($cms->id)}}" name="id">
						<input type="hidden" value="" name="images" id="deleted_images">
						<div class="form-group">
							@if($cms->images)
							@foreach(json_decode($cms->images) as $key => $image)
							<span class="file-image" id="image">
								<img src="{{asset('uploads/'.$image)}}" height="80px" width="80px" class="cms-image"/>
								<div class="overlay" title="Remove" >
									<a class="icon">
										<i class="fa fa-close"></i>
									</a>
								</div>
							</span>
							@endforeach
							@endif
						</div>
						
						@endif
						<div class="form-group">       
							<input type="submit" value="{{($cms) ? 'Update' : 'Save'}}" class="btn btn-primary" onclick="getContent()">
							<a href="{{route('admin.cms_list')}}"> <input type="button" value="Cancel" class="btn btn-danger"> </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('footer_script')
<script type="text/javascript">
$(document).ready(function(){
  $(".cms-image").click(function(){
    console.log(this);
  });
});


function updateImage(event){
	var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.png)$/;
	var file = event.target.files[0].name;
	if (!regex.test(file.toLowerCase())) {
		alert(file + " is not a valid image file.");
		$("#profileUpload").val(null);
        return false;
	}
	// console.log(event.target.files[0].name)
}

		// function removeImage(img,id){
		// 	console.log(id);
		// 	$('#image'+id).hide();
		// 	$('input[type="file"]').val('');
		// }

		
	
	</script>
<script src="{{ asset('portal/js/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
	CKEDITOR.replace( 'contenteditor' );
    // CKEDITOR.replace( 'contenteditor', {
    //     filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });
	
</script>


<!-- <script type="text/javascript" src="{{asset('js/tinymce/jquery.tinymce.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent"
	});
	function getContent(){
		var content = tinymce.activeEditor.getContent();
	}
	var removedImages = [];
	function removeImage(image, index){
		$('#image'+index).hide();
		removedImages.push(image);
		$('#deleted_images').val(JSON.stringify(removedImages));
	}
</script> -->
<!-- end of plugin scripts -->
@endsection