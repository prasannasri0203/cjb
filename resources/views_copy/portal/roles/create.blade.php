@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">@lang('Roles')</h2>
	</div>
</header>
<section> 
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<h3 class="h4">{{($role) ? 'Edit Role' : 'Add Role'}}</h3>
				</div>
				<div class="card-body">
					<p></p>
					@if($role)
					<form method="POST" action="{{route('admin.role.update') }}">
						@else
						<form method="POST" action="{{route('admin.roles.store')}}">
							@endif
							@csrf
							<div class="form-group">
								<label class="form-control-label">Name <span class="mandatory_field">*<span></label>
								<input type="text" placeholder="Name" class="form-control" name="name" value="{{($role) ? $role->name : old('name')}}">
								<span style='color:red'>{{ ($errors->has('name')) ? $errors->first('name') : '' }}</span>
							</div>
							<div class="form-group">
								<label class="form-control-label">Permission <span class="mandatory_field">*</span></label><br/>
								&emsp;<input type="checkbox" id="all" onchange="changePermission('all',this)"><b> All</b><br/>

								@if(!isset($rolePermissions))
								<div class="col-lg-12">
									@foreach($permission as $key => $permission)
									<div class="row">
										<div class="col-lg-3">
											<input type="checkbox" id="{{$key}}" class="all" onchange="changePermission('{{$key}}',this)"><b> {{ucfirst($key)}}</b>
										</div>
										<div class="col-lg-9">
											@foreach($permission as $value)
											<input type="checkbox" name="permission[]" value="{{$value->id}}" class="all {{$key}}" onchange="changePermission('all {{$key}}',this)"> {{ucfirst(explode('-',$value->name)[1])}} &ensp;
											@endforeach
										</div>
									</div>
									<br/>
									@endforeach
								</div>
								@else
								<div class="col-lg-12">
									@foreach($permission as $key => $permission)
									<div class="row">
										<div class="col-lg-3">
											<input type="checkbox" id="{{$key}}" class="all" onchange="changePermission('{{$key}}',this)"><b> {{ucfirst($key)}}</b>
										</div>
										<div class="col-lg-9">
											@foreach($permission as $value)
											<input type="checkbox" name="permission[]" value="{{$value->id}}" class="all {{$key}}" {{in_array($value->id, $rolePermissions) ? 'checked' : ''}} onchange="changePermission('all {{$key}}',this)">{{ucfirst(explode('-',$value->name)[1])}} &ensp;
											@endforeach
											</div>
										</div>
										<br/>
										@endforeach
										@endif

										<span style='color:red'>{{ ($errors->has('permission')) ? $errors->first('permission') : '' }}</span>
									</div>
									@if($role)
									<input type="hidden" value="{{base64_encode($role->id)}}" name="id">
									@endif
									<div class="form-group">       
										<input type="submit" value="{{($role) ? 'Update' : 'Save'}}" class="btn btn-primary">
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
			<script type="text/javascript">
				$(document).ready(function() {
					setTimeout(function(){
						$(".all").each(function(){
							if($(this).attr('id') != undefined){
								var id = $(this).attr('id');
								if ($('.'+id+':checked').length == $('.'+id).length) {
									$('#'+id).prop('checked', true);
								}
							}
						});
						if ($('.all:checked').length == $('.all').length) {
							$('#all').prop('checked', true);
						}
					},500);
				});



				function changePermission(_class, _this){
					if (_class.indexOf(' ') > -1){
						var classname = _class.split(' ');
						if ($('.'+classname[1]+':checked').length == $('.'+classname[1]).length) {
							$('#'+classname[1]).prop('checked', true);
						}
						if(!(_this.checked)){
							$('#'+classname[0]).prop('checked', false);
							$('#'+classname[1]).prop('checked', false);
						}
					}
					else{
						if(_this.checked){
							$('.'+_class).prop('checked', true);
						}
						else{
							$('.'+_class).prop('checked', false);
						}
					}
					if ($('.all:checked').length == $('.all').length) {
						$('#all').prop('checked', true);
					} else {
						$('#all').prop('checked', false);
					}
			//$('.'+_class).trigger('change');
		}
	</script>
	<!-- end of plugin scripts -->
	@endsection