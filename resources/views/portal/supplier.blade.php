@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">@lang('general.Supplier') </h2>
            </div>
          </header>
          <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                <form  action="{{ route('admin.postSupplierSave') }}" method="POST" role="form"  class="custom-form">

                {{ csrf_field() }}
                @if ($alert = Session::get('alert-success'))
                <div class="alert alert-warning">
                  {{ $alert }}
                </div>
                @endif
                <input type="hidden" name="status" value="0">
                  <div class="form-group">
                    <label for="usr">@lang('general.Name') <span class="mandatory_field">*<span></label>
                    <input type="text" class="form-control" name="name" id="usr" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.Email') <span class="mandatory_field">*<span></label>
                    <input type="text" class="form-control" name="email" id="usr" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.Phone_number') <span class="mandatory_field">*<span></label>
                    <input type="text" class="form-control" name="phone_number" maxlength="20" id="usr" value="{{ old('phone_number') }}">
                    @if ($errors->has('phone_number'))
                    <div class="error">{{ $errors->first('phone_number') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.Address') <span class="mandatory_field">*<span></label>
                    <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                    @if ($errors->has('address'))
                    <div class="error">{{ $errors->first('address') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="usr"> Pincode <span class="mandatory_field">*<span></label>
                    <input type="text" class="form-control" name="pincode" maxlength="20" id="usr" value="{{ old('pincode') }}">
                    @if ($errors->has('pincode'))
                    <div class="error">{{ $errors->first('pincode') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.Primary_Contact')</label>
                    <input type="text" class="form-control" name="primary_conduct" maxlength="20" id="usr" value="{{ old('primary_conduct') }}">
                    @if ($errors->has('primary_conduct'))
                    <div class="error">{{ $errors->first('primary_conduct') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="usr">@lang('general.Position')</label>
                    <input type="text" class="form-control" name="position" maxlength="64" id="usr" value="{{ old('position') }}">
                    @if ($errors->has('position'))
                    <div class="error">{{ $errors->first('position') }}</div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="usr">@lang('general.General_Notes')</label>
                    <textarea class="form-control" name="general_notes">{{ old('general_notes')}}</textarea>
                    @if ($errors->has('general_notes'))
                    <div class="error">{{ $errors->first('general_notes') }}</div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="usr">@lang('general.Payment_Terms')</label>
                    <textarea class="form-control" name="payment_terms">{{ old('payment_terms') }}</textarea>
                    @if ($errors->has('payment_terms'))
                    <div class="error">{{ $errors->first('payment_terms') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <input type="submit" class="" id="usr" value="Save">
                  </div>
                </form>
                </div>
              </div>
            </div>
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection
