@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">@lang('Enquiry Details')</h2>
	</div>
</header>
<style>
	.success{
		color: #22ce03;
	}

	a:not([href]):not([tabindex]){
		color: #fff;
	}
	a:not([href]):not([tabindex]):hover{
		color: #fff;
	}
	.paginate {
		float: right
	}
	.product-table{
		background-color: #e8e8e8 !important;
	}
</style>
<section> 
	<div class="container-fluid">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header d-flex align-items-center">
					<div class="col-lg-3">
						<h3 class="h4">Enquiry Details</h3>
					</div>
					<div class="col-lg-7">
						@if(session()->has('success'))
						<span class="success show">{{session()->get('success') }}</span>
						@endif
					</div>
        </div>
				<div class="card-body">
					<table class="table">
						<thead>
                  <tr>
                  <th>Name</th>
                  <th>{{ $data->name }}</th>
                  </tr>
                  <tr>
                  <th>Email</th>
                  <th>{{ $data->email }}</th>
                  </tr>
                  <tr>
                  <th>Subject</th>
                  <th>{{ $data->description }}</th>
                  </tr>
                  @if($data->reply_status == 1)
                  <tr>
                  <th>Replayed Message</th>
                  <th>{{ $data->replay_message }}</th>
                  </tr>
                  @endif
            </thead>
          </table>
          @if($data->reply_status != 1)
          <form method="post" action="{{ URL('admin/maill/')}}" enctype="multipart/form-data">
		
          @csrf
          <div class="form-group">
            <h4 style="float:left">Reply</h4>
              <!-- <input type="submit" style="float:right" value="edit" class="btn btn-primary"> -->
              <input type="hidden" value="{{ $data->id }}" name="enquiry_id"><br>&nbsp;<br>
              <input type="hidden" value="{{ $data->email }}" name="email">
              <textarea rows="4" cols="50" name="description" value="" minlength="20" required></textarea><br>&nbsp;<br>
              <input type="submit" value="{{($user) ? 'Edit' : 'submit'}}" class="btn btn-primary">
          </div>
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection
