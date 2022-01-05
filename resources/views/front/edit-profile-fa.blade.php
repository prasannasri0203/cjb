
@extends('front.app')

@section('title', 'Edit Profile')

@section('header_script')

    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont home-banner home-tablet')

@section('content')

@php
$activeSidebar = 'edit-profile';
@endphp
        <!--Page Content Start-->
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
            .btn-primary{
                padding: 10px 20px;
                border-radius: 5px;
                margin: 30px;
            }
            .qr_code_img {
                margin: 30px 0px;
            }
        </style>

<div class="container-fluid qr_main">
    <div class="row">
        <div  class="col-lg-2 qr_lefts">
            @include('front.user-sidebar')
        </div>
        <div class="col-md-10 qr_right_main">

            <div class="panel panel-default">

                <div class="panel-heading">Set up Google Authenticator</div>

                <div class="panel-body" style="text-align: center;">
                    <div class="qr_code_img">
                        {!! $QR_Image !!}
                    </div>
                <div>
                        <!-- <a href="/edit-profile/complete-fap/{{@$flag}}"><button class="btn-primary">Scan the Barcode</button></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <!--Page Content End-->
@endsection

@section('footer_script')
@endsection