@extends('front.app')

@section('title', '')

@section('header_script')

<!-- <script src="https://code.jquery.com/jquery-migrate-1.4.1.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('front/js/fabric.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/tshirtEditor.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.miniColors.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/html5.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/loading.js')}}"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/eligrey/FileSaver.js/5733e40e5af936eb3f48554cf6a8a7075d71d18a/FileSaver.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

    <style type="text/css">
        #typography {
            margin-top: 90px;
        }

        .color-preview {
            border: 1px solid #CCC;
            margin: 2px;
            zoom: 1;
            vertical-align: top;
            display: inline-block;
            cursor: pointer;
            overflow: hidden;
            width: 20px;
            height: 20px;
        }

        .rotate {
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            /* filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=1.5); */
            -ms-transform: rotate(90deg);
        }

        .Arial {
            font-family: "Arial";
        }

        .Helvetica {
            font-family: "Helvetica";
        }

        .MyriadPro {
            font-family: "Myriad Pro";
        }

        .Delicious {
            font-family: "Delicious";
        }

        .Verdana {
            font-family: "Verdana";
        }

        .Georgia {
            font-family: "Georgia";
        }

        .Courier {
            font-family: "Courier";
        }

        .ComicSansMS {
            font-family: "Comic Sans MS";
        }

        .Impact {
            font-family: "Impact";
        }

        .Monaco {
            font-family: "Monaco";
        }

        .Optima {
            font-family: "Optima";
        }

        .HoeflerText {
            font-family: "Hoefler Text";
        }

        .Plaster {
            font-family: "Plaster";
        }

        .Engagement {
            font-family: "Engagement";
        }

        .img-polaroid {
            padding: 0;
            margin: 0;
            border: 2px solid transparent;
            max-height: 92px;
            max-width: 92px;
            min-height: 92px;
            min-width: 92px;

        }

        .img-polaroid:hover {
            cursor: pointer;
            border-color: #00a5f7;
        }

        .tt {
            margin-right: 4px;
        }
        .tshirttumbnail {
            min-height: 135px;
        }
        .tshirttumbnail img {
            width: 50%;
            float: left;
        }
        #flip {
            display: none;
        }
        #test {
            text-align: center;
            font-size: 20px;
        }
        #test a {

        }
    </style>
    <!-- Header Script End -->
@endsection

@section('body_class', '')

@section('main_div_class', '')

@section('content')

@php
$activeSidebar = 'Creation-Station';
@endphp

<?php 

$desgin_type = Request::get('type');


if($desgin_type == 'mug')
{
    $desgin_data = array('img' => 'coffee-bug.png', 'prd_layer' => '1', 'prd_wdh' => '530px', 'prd_ht' => '630px', 'prd_drw_ht' => '360', 'prd_drw_wdh' => '200', 'prd_drw_top' => '100px', 'prd_drw_left' => '50px');
}
else if($desgin_type == 'pillow')
{
    $desgin_data = array('img' => 'white-pillow.png', 'prd_layer' => '1', 'prd_wdh' => '530px', 'prd_ht' => '630px', 'prd_drw_ht' => '220', 'prd_drw_wdh' => '360', 'prd_drw_top' => '120px', 'prd_drw_left' => '80px');
}
else if ($desgin_type == 'hoodie')
{
    $desgin_data = array('img' => 'mens_hoodie_front.png', 'img_thumb' => 'mens_hoodie_back.png', 'prd_layer' => '2', 'prd_wdh' => '530px', 'prd_ht' => '630px', 'prd_drw_ht' => '400', 'prd_drw_wdh' => '200', 'prd_drw_top' => '140px', 'prd_drw_left' => '160px');
}
else
{
    $desgin_data = array('img' => $product->pv_image, 'img_thumb' => $product->pv_image, 'prd_layer' => '2', 'prd_wdh' => '530px', 'prd_ht' => '630px', 'prd_drw_ht' => '400', 'prd_drw_wdh' => '200', 'prd_drw_top' => '100px', 'prd_drw_left' => '160px');
}

?>
        <!--Page Content Start-->
  <!--dashboard artist-->
    <section>
        <div class="dashboard-sec slidpad creabg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">
                        <!-- Side Bar -->
                        @include('front.user-sidebar')
                        <!-- Side Bar -->
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 nopadding">
                        <!-- Top Banner-->
                        @include('front.design-tool.top-banner')
                        <!-- Top Banner-->

                        <div class="createstation_tab">
                            <!-- Top Navigation Tabs -->
                            @include('front.design-tool.top-nav-tabs')
                            <!-- Top Navigation Tabs -->

                            <div id="tab_row_spacing" class="tab-content">
                                <!-- customise content  -->
                                @include('front.design-tool.content.customise')
                                <!-- customise content  -->
                            </div>
                        </div>
                        <!--/.navtab-->
                        <button type="submit" class="btn btn-default savecrea1">SAVE AND CONTINUE <i class="fa fa-arrow-circle-right"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/.dashboard artist-->
<!--Page Content End-->

@endsection
