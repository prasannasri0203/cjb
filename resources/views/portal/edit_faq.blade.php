@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">FAQ</h2>
	</div>
</header>
<section> 
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h3 class="h4">Edit FAQ</h3>
				</div>
				<div class="card-body">
					<p></p>
					<form method="POST" action="{{URL('admin/faq/save')}}"  class="custom-form">
						@csrf
						<div class="form-group">
							<label class="form-control-label">Title <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Question" class="form-control" name="title" value="{{$faq->title}}" >
							<span style='color:red'>{{ ($errors->has('title')) ? $errors->first('title') : '' }}</span>
						</div>
						<div class="form-group">
							<label class="form-control-label">Question <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Question" class="form-control" name="question" value="{{$faq->question}}" >
							<span style='color:red'>{{ ($errors->has('question')) ? $errors->first('question') : '' }}</span>
						</div>
						<div class="form-group">       
							<label class="form-control-label">Answer <span class="mandatory_field">*<span></label>
							<textarea class="form-control" name="answer" id="contenteditor">{{($faq) ? $faq->answer : old('answer')}}</textarea>
							<span style='color:red'>{{ ($errors->has('answer')) ? $errors->first('answer') : '' }}</span>
						</div><?php /*
						<div class="form-group">       
							<label class="form-control-label">Keywords <span class="mandatory_field">*<span></label>
							<input type="text" placeholder="Keywords" class="form-control" name="keyword"  value="{{$faq->keywords}}">
							<span style='color:red'>{{ ($errors->has('keyword')) ? $errors->first('keyword') : '' }}</span>
						</div> */ ?>
						@if($faq)
						<input type="hidden" value="{{base64_encode($faq->id)}}" name="id">
						@endif
						<div class="form-group">       
							<input type="submit" value="{{'Update'}}" class="btn btn-primary">
							<a href="{{route('admin.faq_list')}}"> <input type="button" value="Cancel" class="btn btn-danger"> </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('footer_script')
<script src="{{ asset('portal/js/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
	CKEDITOR.replace( 'contenteditor' );
    // CKEDITOR.replace( 'contenteditor', {
    //     filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });
	
</script>
<!-- end of plugin scripts -->
@endsection