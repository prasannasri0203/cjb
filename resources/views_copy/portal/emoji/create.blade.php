@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Create Artwork</h2>
            </div>
          </header>
          <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                <form  action="{{ route('admin.emojiSave') }}" method="POST" role="form" enctype="multipart/form-data" class="custom-form">

                {{ csrf_field() }}
                @if ($alert = Session::get('alert-success'))
                <div class="alert alert-warning">
                  {{ $alert }}
                </div>
                @endif
            <input type="hidden" name="status" value="{{Auth::user()->type}}">
                  <div class="form-group">
                    <label for="usr">Name<span class="mandatory_field">*<span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="usr">Image Upload<span class="mandatory_field">*<span></label>
                    <input type="file" class="form-control" name="image" accept="image/jpeg, image/png" id="image">
                    @if ($errors->has('image'))
                    <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                  </div>

                  <div class="form-group">
                    <input type="submit" class="" id="usr">
                  </div>
                </form>
                </div>
              </div>
            </div>
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection
