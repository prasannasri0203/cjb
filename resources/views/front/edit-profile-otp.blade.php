@extends('front.app')

@section('title', 'Edit Profile')

@section('header_script')

@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

@php
$activeSidebar = 'edit-profile';
@endphp

<style>
    .container-fluid.qr_main {
        background: rgb(227, 227, 227);
        padding-top: 50px;
    }
    .panel-default>.panel-heading{
        font-size: 19px;
    }
    .panel-body p{
        font-size: 17px;
    }
    .panel-body {
        padding: 30px 0px;
    }
    .btn-primary{
        padding: 10px 20px;
        border-radius: 5px;
        margin: 30px 0px; 
        font-size: 15px;
    }       
    label.col-md-2.control-label {
        font-size: 15px;
    } 
</style>

<div class="form-group t_tip @error('name') has-error @enderror">
            
</div>
<div class="container-fluid qr_main">
    <div class="row">
         <div  class="col-lg-2 qr_lefts">
            @include('front.user-sidebar')
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Two Factor Authentication</div>
                @error('message')
                    <span class="help-block btn btn-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="panel-body">
                    @if(@$otpPage == 1)
                        <form class="form-horizontal" method="POST" action="{{ route('update_otp') }}">
                            @csrf
                            <div class="form-group">
                                <label for="one_time_password" class="col-md-2 control-label">One Time Password</label>
                                <div class="col-md-6">
                                    <input id="one_time_password" type="number" class="form-control" name="one_time_password" required autofocus>
                                    <input type="hidden" name="flag" value="{{@$flag}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                     @else
                        <form class="form-horizontal" method="POST" action="{{ route('edit-profile/2fa') }}">
                            @csrf
                            <div class="form-group">
                                <label for="one_time_password" class="col-md-2 control-label">One Time Password</label>
                                <div class="col-md-6">
                                    <input id="one_time_password" type="number" class="form-control" name="one_time_password" required autofocus>
                                    <input type="hidden" name="flag" value="{{@$flag}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_script')
@if ($message = Session::get('success'))
    <script type="text/javascript">
         iziToast.success({
             title: 'OK',
             message: '{{ $message }}',
             position: 'topRight',
         });
         
    </script>
    @endif
    @if ($message = Session::get('failure'))
    <script type="text/javascript">
        iziToast.error({
            title: 'Error',
            message: '{{ $message }}',
             position: 'topRight',
        });
    </script>
    @endif
@endsection