@extends('front.app')

@section('title', '')

@section('header_script')
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
    <!-- <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script type="text/javascript" src="{{ asset('front/js/fabric.js')}}"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.3/fabric.min.js"></script> -->
    <script type="text/javascript" src="{{ asset('js/tshirtEditor.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-minicolors/2.3.5/jquery.minicolors.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-minicolors/2.3.5/jquery.minicolors.min.css">
    <script type="text/javascript" src="{{ asset('js/html5.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/loading.js')}}"></script>
    <!-- <script type="text/javascript" src="https://cdn.rawgit.com/eligrey/FileSaver.js/5733e40e5af936eb3f48554cf6a8a7075d71d18a/FileSaver.js"></script> -->
    <script type="text/javascript" src="{{ asset('js/FileSaver-1.3.3.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<link rel="stylesheet" href="{{ asset('js/Jcorp/jquery.Jcrop.min.css')}}" type="text/css" />
<script src="{{ asset('js/Jcorp/jquery.Jcrop.min.js')}}"></script>
    <style type="text/css">
    .mobdown .toggledropdown
    {
      display: block !important;
    }
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
        .thumbnail_image{
          width: 100px !important;
          height: 80px !important;
          -o-object-fit: cover;
          object-fit: cover;
          margin: 0px 5px;
          border: 1px solid #ededed;
          padding: 5px;
        }
        .thumbnail_image_list li{
          display: inline-block;
        }
        .colorpicker{
          border: 1px solid #ccc;
          width: 33.5px !important;
          height: 38.5px;
          display: inline-block;
        }
        #colorpicker1{
          background: #fff;
        }
        #colorpicker2{
          background: #b7d5f7;
        }
        #colorpicker3{
          background: #edf9b1;
        }
        #colorpicker4{
          background: #deaab6;
        }
        #colorpicker5{
          background: #edced6;
        }
        .colorpicker_radio{
          display: none;
        }
        .colpickers div > label{
          display: block;
        }
        .colpickers div{
          margin-top: 4px;
        }
        .form-group input,.form-group textarea{
          margin-bottom: 15px;
        }
        .Available-sizes-checkboxes input{
          display: inline-block;
        }
        .colpickers .colorpicker_radio:checked + label .fa-eye {
   display: none;
}

.colpickers .colorpicker_radio:checked + label .fa-eye-slash {
   display: block !important;
}
.colpickers .fa-eye-slash {
   display: none !important;
}
.form-group span {
  color: red;
}
.colpickers div{position:relative;}
.cpdyn{
display: block;
margin: 0;
position: absolute;
width: 30px;
height: 16px;
cursor: pointer;
opacity: 0;
}
/*Form less css fix*/
label {
  margin-bottom: 0px;
  padding: 0 5px;
}

  .jcrop-keymgr
    {
      display : none;
    }
    .addon{
        margin-right: 6px;
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
//$prd_layer = count($product_variant->ProductImages);
$prd_layer = $layerCount;

$desgin_data = array(
  'img' => @$product_img[0]['image'], 
  'img_thumb' => @$product_img[1]['image'], 
  'img_thumb' => @$product_variant->ProductImages[1]['image'], 
  'img_thumbs' => @$product_variant->ProductImages[2]['image'], 
  'img_thumbss' => @$product_variant->ProductImages[3]['image'],
  'prd_layer' => $prd_layer, 'prd_wdh' => '530px', 
  'prd_ht' => '630px', 
  'prd_drw_ht' => $product_variant->VariantProduct->height, 
  'prd_drw_wdh' => $product_variant->VariantProduct->width, 
  'prd_drw_top' => '100px', 'prd_drw_left' => '160px');

?>
<style type="text/css">
    .image_tools {
        text-align: left !important;
    }

/* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}

/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}

/* Animation */

@-webkit-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-moz-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-o-keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes spinner {
  0% {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    -moz-transform: rotate(360deg);
    -ms-transform: rotate(360deg);
    -o-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
/* .jcrop-holder {
    background: transparent;
    width: 100% !important;
}
.preview_class img {
    object-fit: contain;
} */

.fjs_thumb
{
  float: left;
}
</style>
        <!--Page Content Start-->
  <!--dashboard artist-->
<div class="loading" id="loading_screen" style="display: none;">Loading&#8230;</div>
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
                               <style type="text/css">
                                   .image_tools {
                                       /*position: relative;
                                       top: 360px;*/
                                   }
                               </style>
                               <div id="Customise" class="tab-pane fade in active ">
                                   <div class="createstatn_cont customise_content">

                                       <div class="container-fluid product_editor crebb ipad_pfrm">
                                           <div class="row">
                                                <div id="shirtDiv" class="col-sm-6">
                                                   <img src="{{ asset('portal/img/product') }}/{{$desgin_data['img']}}" alt="" class="img-responsive edituser_img edituser_img" id="tshirtFacing">
                                                   @if($desgin_data['prd_drw_wdh'] == 400)
                                                   <div id="drawingArea"
                                                        style="position: absolute;top: 10px;left: 62px;z-index: 10;width: 200;height: 360;">
                                                       <canvas id="tcanvas" width="{{$desgin_data['prd_drw_wdh']}}" height="{{$desgin_data['prd_drw_ht']}}" class="hover"
                                                               style="-webkit-user-select: none;"></canvas>
                                                   </div>
                                                   @else
                                                   <div id="drawingArea"
                                                        style="position: absolute;top: 90px;z-index: 10;width: 200;height: 360;">
                                                       <canvas id="tcanvas" width="{{$desgin_data['prd_drw_wdh']}}" height="{{$desgin_data['prd_drw_ht']}}" class="hover"
                                                               style="-webkit-user-select: none;"></canvas>
                                                   </div>
                                                   @endif
                                                   
                                                </div>
                                                <div class="col-sm-6 desgin_form">
                                                   <h3>{{$product_variant->variant_name}}</h3>
                                                   <!-- <form class="form-horizontal"> -->
                          <form enctype="multipart/form-data" id="upload_form" role="form" name="upload_form" method="GET" action="" >
                                                    <input name="merchandise_product_id" id="merchandise_product_id" type="hidden" value="">
                                                    <input name="merchandise_product_name" id="merchandise_product_name" type="hidden" value="{{$product_variant->variant_name}}">
                                                       <div class="form-group">
                                                           <label class="control-label col-sm-5">RRP:</label>
                                                           <div class="col-sm-7">
                                                              <label class="control-label boldprice">
                                                                <div class="artist-test">

                                                                  {{currency($product_variant->price, 'GBP', session()->get('my_currency'))}}
                                                                </div>
                                                              </label>
                                                              <input type="hidden" name="original_prise" id="original_prise" value="{{$product_variant->price }}" />
                                                                <input type="hidden" name="mer_price" id="mer_price" class="boldprice1">
                                                           </div>
                                                       </div>
                                                       <div class="form-group ">
                                                           <label class="control-label col-sm-5 ">Raise Price:</label>
                                                           <div class="col-sm-7 sign_sym">
                                                              <!--  <input name="artist_price" id="artist_price" type="number" class="form-control" value="" min="{{$product_variant->price}}"> -->
                                                              <input name="artist_price" id="artist_price" type="number" class="form-control" value="0" min="0">  
                                                              <span style="display : none;" id="artist_price_error">Enter the price above cost price</span>
                                                           </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="control-label col-sm-5 ">Your Earnings:</label>
                                                           <div class="col-sm-7 sign_sym">
                                                               <input type="number" name="artist_profit" id="artist_profit" class="form-control artist_profit" value="0" readonly="">
                                                               <input type="hidden" name="artist_profit_hidden" id="artist_profit_hidden" class="form-control artist_profit" value="0" readonly="">
                                                               <span style="display : none;" id="artist_profit_error">Enter the profit</span>
                                                           </div>
                                                       </div>

                                                       <div class="form-group">
                                                               <label class="control-label col-sm-5">Choose Available Colours:</label>
                                                               <label class="control-label sublabel">(Click to select / deselect)</label>
                                                           <div class="col-sm-7 colpickers">
                                                            <?php 
                                                            $tempArr = []; 
                                                            $first_clr ='';
                                                           
                                                            foreach($product->product_variant as $key => $vart){
                                                              
                                                              $v_bg_colour = json_decode($vart->attributes, true);
                                                              if(isset($_GET['clr'])){
                                                                if($_GET['clr'] == $v_bg_colour[1])
                                                                  $first_clr = $v_bg_colour[1];
                                                              }
                                                              else
                                                              {
                                                                if($key==0)
                                                                $first_clr = $v_bg_colour[1];
                                                              }
                                                                $tempArr[$v_bg_colour[1]]['color'][] = $vart->attributes;
                                                                $tempArr[$v_bg_colour[1]]['id'][] = $vart->id;

                                                            }
                                                          
                                                            foreach($tempArr as $clr => $test)
                                                            {
                                                            ?>
                                                               <div>
                                                                <input type="hidden" id="fa_eye_valid" value="{{$clr}}">
                                                                <a href="{{url('/design-creation/'.$test['id'][0])}}?check=approved&clr={{$clr}}" > 
                                                                <span class="colorpicker"  id="colorpicker_{{$vart->id}}" style="background: {{$clr}}"></span></a>
                                                                   <!-- </a> -->
                                                                   <input id="colorpicker_{{$test['id'][0]}}" class="colorpicker_radio cpdyn" name="colorpicker-radio1" type="checkbox"/>
                                                                   <label for="colorpicker_{{$test['id'][0]}}">
                                                                  <!--  <i class="fas fa-eye fa_eye_check" aria-hidden="true">
                                                                     </i>
                                                                     <i class="fas fa-eye-slash fa_eye_uncheck" aria-hidden="true">
                                                                   </i> -->
                                                                   </label>
                                                               </div>
                                                              <?php } ?>

                                                           </div>
                                                          <span style="display : none;" id="colorpicker_error">Select the colorpicker</span>
                                                       </div>
                                                       <div class="form-group Available-sizes-checkboxes">
                                                           <label class="control-label col-sm-5" id="size_error">Available Sizes:</label>
                                                           <div class="col-sm-7">
                                                            @foreach($product->product_variant as $vart)
                                                            @php $v_size = json_decode($vart->attributes, true); @endphp

                                                           <?php  
                                               
                                                           if($v_size[1] == $first_clr )
                                                           { ?>
                                                                <input id="{{$v_size[0]}}" class="size_picker_class colorpicker_radio" name="colorpicker-radio[]" value="{{$vart->id}}" type="checkbox"/>
                                                                <label for="{{$v_size[0]}}" style="color: {{$v_size[1]}}"> {{$v_size[0]}}-{{$v_size[1]}} </label>

                                                            <?php } ?>
                                                            @endforeach
                                                                <br>
                                                                <span style="display : none;" id="size_picker_error">Select the Size</span>
                                                               <!-- <label class="control-label">XXL, XL, M, S, XS</label> -->

                                                           </div>
                                                       </div>
                                                        <div class="form-group">
                                                           <label class="control-label col-sm-5 ">Promotional Image:</label>
                                                           <div class="col-sm-7 sign_sym">
                                                               <input type="file" name="promotional_image" id="promotional_image" class="form-control">
                                                               <span style="display : none;" id="promotional_image_error">Promotional Image is required</span>
                                                           </div>
                                                       </div>
                                                      <div class="form-group">
                                                        <button id="split_more" style="float: right;">Split More</button>
                                                       </div>
                                                       
                                                       <div class="form-group">
                                                           <label class="control-label col-sm-5">Category:</label>
                                                           <div class="col-sm-7">
                                                               <input name="creation_name" id="creation_name" type="text" class="form-control typeahead" value="">
                                                               <div id="countryList"></div>
                                                               <span style="display : none;" id="creation_name_error">Enter the Category</span>
                                                           </div>
                                                       </div>
                                                       <div class="form-group"></div>
                                                         <div class="form-group">
                                                           <label class="control-label col-sm-5">Name Your Creation:</label>
                                                           <div class="col-sm-7">
                                                               <input name="name_creation" id="name_creation" type="text" class="form-control" value="">
                                                               <span style="display : none;" id="name_creation_error">Enter the Name Your Creation</span>
                                                           </div>
                                                       </div>
                                                     
                                                       <div class="form-group">
                                                           <label class="control-label col-sm-5">Describe Your Creation:</label>
                                                           <div class="col-sm-7">
                                                               <textarea name="creation_description" id="creation_description" class="form-control" rows="2"></textarea>
                                                               <span style="display : none;" id="creation_description_error">Enter the description</span>
                                                           </div>
                                                       </div>
                                                        <div class="form-group">
                                                          @php

                                                          $url = Request::segment(2);
                                                          $chk = App\Product_variant::where('id',$url)->where('print_type','!=','N;')->first();
                                                          @endphp
                                                          @if($chk)
                                                           <label class="control-label col-sm-5">Add-On Features:</label>
                                                           @endif
                                                           <div class="col-sm-7">
                                                        <?php $i=0;?>
@if(@$productdetails->print_type != 'N;')
                        @foreach($print_type as $type)
                            <?php
                            $array = unserialize(@$productdetails->print_type);
                            $price = unserialize(@$productdetails->print_price);
                          $approved_type = unserialize(@$productdetails->approved_additional_type);
                          if($array){
                          if (in_array($type->id, $array))
                              {
                            ?>

                            <input type="checkbox" id="print_type_array<?php echo $i?>" class="print_type_array addon" data-id="<?php echo $price[$i] ?>" name="print_type_array"
                             value="{{$type->id}}" <?php if(@$productdetails->approved_additional_type){if(in_array($type->id, $approved_type)){echo "checked";}} ?>>{{$type->print_type_name}}

                             <?php
                              }
                            }
                            ?>


                             <?php
                             if($array){
                          if (in_array($type->id, $array))
                            {
                          $i++;
                            }
                        }
                        ?>
                        @endforeach
                         @endif
                                                           </div>
                                                       </div>
                                                       <div class="form-group form-group t_tip" style="display: none;">
                                                           <label class="control-label col-sm-5">Add Category keywords:</label>
                                                           <div class="col-sm-7">
                                                               <input name="category_keyword" id="category_keyword" type="text" class="form-control" value="">
                                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                           </div>
                                                       </div>
                                                       <div class="form-group form-group t_tip" style="display: none;">
                                                           <label class="control-label col-sm-5">Add Search keywords:</label>
                                                           <div class="col-sm-7">
                                                               <input type="text" name="search_keyword" id="search_keyword" class="form-control" value="">
                                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                           </div>
                                                       </div>

                                                       <div class="form-group">
                                                           <div class="col-sm-10">
                                                               <button id="imgsavejpg" class="btn btn-default savecrea">SAVE CREATION</button>
                                                           </div>
                                                       </div>
                                                    </form>
                                                 <div style="width:100%;margin:20px 0;float:left;display:flex;justify-content: center;">
                                                <div style="width:100px;height:100px;float:left;margin-right:10px;">
                                                <img id="display_1" style="object-fit:cover;width:100%" src="" />
                                                </div>
                                                 <div style="width:100px;height:100px;float:left;margin-right:10px;">
                                                  <img id="display_2" style="object-fit:cover;width:100%" src="" />
                                                </div>
                                                 <div style="width:100px;height:100px;float:left;margin-right:10px;">
                                                  <img id="display_3" style="object-fit:cover;width:100%" src="" />
                                                </div>
                                                 <div style="width:100px;height:100px;float:left;margin-right:10px;">
                                                  <img id="display_4" style="object-fit:cover;width:100%" src="" />
                                                </div>
                                                 </div>
                          <div class="preview_div" style="display: none;">
                                                     <div id="preview1" name="pv_name_1">
                                                       <img id="preview1_img" src=""/>
                                                     </div>
                                                   <input type="hidden" id="fsvalue_1" name="fsvalue_1[]" />
                                                   <div id="preview2" name="pv_name_2"></div>
                                                   <input type="hidden" id="fsvalue_2" name="fsvalue_2[]" />
                                                   <div id="preview3" name="pv_name_3"></div>
                                                   <input type="hidden" id="fsvalue_3" name="fsvalue_3[]" />
                                                   <div id="preview4" name="pv_name_4"></div>
                                                   <input type="hidden" id="fsvalue_4" name="fsvalue_4[]" />
                                                   </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <ul class="thumbnail_image_list" id="thumbFlip" data-original-title="Show Second View" class="thumbFlip_latest">
                                                    @if(@$product_img[0]['image'])
                                                    <li class="fjs_thumb"><img src="{{ asset('portal/img/product/thumbimages') }}/{{$product_img[0]['image']}}" alt="" class="img-responsive thumbnail_image" data-img="{{ asset('portal/img/product') }}/{{$product_img[0]['image']}}" id="thumbImageViewFirst"data-original-title="Show First View"></li>
                                                    @endif
                                                    @if(@$product_img[1]['image'])
                                                    <li class="fjs_thumb"><img src="{{ asset('portal/img/product/thumbimages') }}/{{$product_img[1]['image']}}" alt="" class="img-responsive thumbnail_image" id="thumbImageViewSecond" data-img="{{ asset('portal/img/product') }}/{{$product_img[1]['image']}}" data-original-title="Show Second View"></li>
                                                    @endif
                                                    @if(@$product_img[2]['image'])
                                                    <li class="fjs_thumb"><img src="{{ asset('portal/img/product/thumbimages') }}/{{$product_img[2]['image']}}" alt="" class="img-responsive thumbnail_image" id="thumbImageViewThird" data-img="{{ asset('portal/img/product') }}/{{$product_img[2]['image']}}" data-original-title="Show Third View"></li>
                                                    @endif
                                                    @if(@$product_img[3]['image'])
                                                    <li class="fjs_thumb"><img src="{{ asset('portal/img/product/thumbimages') }}/{{$product_img[3]['image']}}" alt="" class="img-responsive thumbnail_image" id="thumbImageViewFourth" data-img="{{ asset('portal/img/product') }}/{{$product_img[3]['image']}}" data-original-title="Show Fourth View"></li>
                                                    @endif
                                                  </ul>
                                                  <input type="hidden" name="current_canvas" id="current_canvas" value="Show First View">
                                                </div>
                                                
                                                <div class="col-sm-12">
                                                    <div class="image_tools">
                                                        <ul>
                                                            <li class="camera_modal"><i class="fa fa-camera" aria-hidden="true"></i></li>
                                                            <li class="text_modal"><i class="fa fa-font" aria-hidden="true"></i></li>
                                                            <!-- <li id="text-bgcolor"><i class="fa fa-text-width" aria-hidden="true"></i></li> -->
                                                            {{-- <li><i id="bring-to-front" class="fa fa-undo" aria-hidden="true"></i></li>
                                                            <li><i id="send-to-back" class="fa fa-repeat" aria-hidden="true"></i></li> --}}
                                                            <li id="remove-selected"><i class="fa fa-trash" aria-hidden="true"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">&nbsp;</div>
                                                <div class="col-sm-6">
                                                    <div class="clearfix">
                                                        <div class="btn-group inline pull-left" id="texteditor" style="display:none">
                                                            <button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown"
                                                                    title="Font Style"><i class="fa fa-font" style="width:19px;height:19px;"></i>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Arial');" class="Arial">Arial</a></li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a>
                                                                </li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad
                                                                        Pro</a></li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Delicious');" class="Delicious">Delicious</a>
                                                                </li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Verdana');" class="Verdana">Verdana</a>
                                                                </li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Georgia');" class="Georgia">Georgia</a>
                                                                </li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Courier');" class="Courier">Courier</a>
                                                                </li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic
                                                                        Sans MS</a></li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Impact');" class="Impact">Impact</a>
                                                                </li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Monaco');" class="Monaco">Monaco</a>
                                                                </li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Optima');" class="Optima">Optima</a>
                                                                </li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler
                                                                        Text</a></li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Plaster');" class="Plaster">Plaster</a>
                                                                </li>
                                                                <li><a tabindex="-1" href="javascript:void(0);" onclick="setFont('Engagement');" class="Engagement">Engagement</a>
                                                                </li>
                                                            </ul>
                                                            <button id="text-bold" class="btn" data-original-title="Bold"><img src="{{asset('/img/font_bold.png')}}"></button>
                                                            <button id="text-italic" class="btn" data-original-title="Italic"><img src="{{asset('/img/font_italic.png')}}" height="" width=""></button>
                                                            <button id="text-strike" class="btn" title="Strike" style=""><img src="{{asset('/img/font_strikethrough.png')}}" height="" width=""></button>
                                                            <button id="text-underline" class="btn" title="Underline" style=""><img src="{{asset('/img/font_underline.png')}}"></button>
                                                            <a class="btn" href="javascript:void(0);" rel="tooltip" data-placement="top" data-original-title="Font Color"><input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000"></a>
                                                            <a class="btn" href="javascript:void(0);" rel="tooltip" data-placement="top"
                                                               data-original-title="Font Border Color"><input type="hidden" id="text-strokecolor"class="color-picker" size="7" value="#000000"></a>
                                                               <!--- Background <input type="hidden" id="text-bgcolor" class="color-picker" size="7" value="#ffffff"> --->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h3>Item Details</h3>
                                                    <p>{!!$product->product_description!!}</p>
                                                </div>
                                           </div>
                                       </div>

                                   </div>
                               </div>


                                   <!--add img tshirt popup -->
                                   <div class="modal fade changeuser" id="camera_modal_view" role="dialog">
                                       <div class="modal-dialog">
                                           <!-- Modal content-->
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Add Your artwork</h4>
                                               </div>
                                               <div class="modal-body">
                                                   <p>Upload a new photo from your device:</p>
                                                   <form name="emjimage_upload" method="post" enctype="multipart/form-data">
                                                   <div class="fileupload">
                                                       <input class="" type="file" id="fileupload" name="fileupload" style="display: none">
                                                        <a href="{{ url('/artist/emoji_list/create') }}"  class="file-upload__label">Create </a>
                                                       <!-- <input class="" type="file" id="emoji_img_pload" name="fileupload"> -->
                                                   </div>
                                                   </form>
                                               </div>
                                               <div class="media_gal">
                                                   <h4 class="modal-title">Select from your Media Gallery</h4>
                                                   <div class="media_images1">
                                                       <div class="row media_images">
                                                        @foreach ($emojis as $key=>$emoji)
                                                           <div class="col-xs-4">
                                                               <img src="{{asset('/uploads/emoji/'.$emoji->file)}}" class="img-polaroid img-responsive uploadimg" />
                                                           </div>
                                                       @endforeach
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               <!--add img tshirt popup -->

                               <div class="modal fade changeuser" id="text_modal_view" role="dialog">
                                       <div class="modal-dialog">
                                           <!-- Modal content-->
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                   <h4 class="modal-title">Add Your Content</h4>
                                               </div>
                                               <div class="modal-body textadder">
                                                   <p>text</p>
                                                   <div class="added_texting">
                                                      <input class="form-control span2" id="text-string" type="text" placeholder="Add text here...">
                                                   <button id="add-text" class="btn btn-default savecrea" title="Add text here...">Add Text</button>
                                                   </div>
                                               </div>

                                           </div>
                                       </div>
                                   </div>



                               <style>
                                .image_tools {
                                   width: 100%;
                                   text-align: center;
                                   display: inline-block;
                               }

                               .image_tools ul {
                                   background: #00d2d3;
                                   display: inline-block;
                                   border-radius: 8px;
                               }

                               .image_tools ul li {
                                   font-size: 20px;
                                   float: left;
                                   padding: 8px 14px;
                                   color: #fff;
                                   cursor: pointer;
                               }

                               .product_editor .boldprice {
                                   font-family: "Rubik-Bold";
                               }
                               .colpickers #colorpicker {
                                   width: 33.5px!important;
                                   height: 38.5px;
                               }

                               .product_editor .colpickers i {
                                   font-size: 16px;
                               }

                               .form-group.t_tip i {
                                   right: 3px!important;
                               }

                               .form-horizontal input {
                                   width: 97%!important;
                               }

                               .form-horizontal textarea {
                                   width: 97%!important;
                               }

                               .savecrea {
                                   padding: 10px 14px!important;
                                   font-family: rubik-regular!important;
                                   font-weight: normal;
                                   font-size: 15px!important;
                               }

                               .createstatn_cont.customise_content {
                                   padding-top: 30px;
                               }
                               </style>


                               <script>
                                $(".changeuser").on('change', '#emoji_img_pload', function(){
                                    if (typeof (FileReader) != "undefined") {
                                        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                                        $($(this)[0].files).each(function () {
                                            var file = $(this);
                                            if (regex.test(file[0].name.toLowerCase())) {
                                                var reader = new FileReader();
                                                reader.onload = function (e) {
                                                  $('.media_images').append('<div class="col-xs-4"><img class="img-polaroid tt" src="' + e.target.result + '"></div>');

                                                }
                                                reader.readAsDataURL(file[0]);
                                            } else {
                                                alert(file[0].name + " is not a valid image file.");
                                                return false;
                                            }
                                        });
                                    } else {
                                        alert("This browser does not support HTML5 FileReader.");
                                    }
                                });
                                   $(".camera_modal").click(function() {
                                       $("#camera_modal_view").show();
                                   });
                                   $(".text_modal").click(function() {
                                       $("#text_modal_view").show();
                                   });

                                   $(".close").click(function() {
                                       $("#camera_modal_view").hide();
                                           $("#text_modal_view").hide();

                                   });
                               </script>
                                <!-- customise content  -->
                            </div>
                        </div>
                        <!--/.navtab-->
                        <!-- <button type="submit" class="btn btn-default savecrea1">SAVE AND CONTINUE <i class="fa fa-arrow-circle-right"></i></button> -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/.dashboard artist-->
<!--Page Content End-->
<script type="text/javascript">

    $(document).ready(function () {
       var Totprice = '<?php echo $product_variant->price; ?>';
      //var Totprice = $(".boldprice").text();

      if($('.addon').is(":checked")){

       addon = $(".addon").val();
       Totprice = parseFloat(Totprice)+parseFloat(addon);                                         
      }

      // Totprice = Totprice.replace(/[^0-9.]/g,'');
      alert(Totprice);
      var commissionValue = '<?php echo $artist_commission_val; ?>';
      var commission = (commissionValue / 100)*Totprice;
      $(".artist_profit").val(commission);
      $(".artist-test").html("£"+Totprice);

      $("#text-fontcolor").change(function(){
        //alert($("#text-fontcolor").val());
        canvas.fillStyle = "#ff00ff";
      });

       // if($("#artist_price").val() == 0)
       //  {
       //    var my_currency = '<?php echo session()->get('my_currency'); ?>';
       //    var price = $(".boldprice").text();
       //    price = Totprice.replace(/[^0-9.]/g,'');

       //    var artist_commission_val = '<?php echo $artist_commission_val; ?>';

       //    total=parseFloat(price) + parseFloat($("#artist_price").val());

       //    //commission = total / artist_commission_val;
       //    commission = (artist_commission_val / 100)*total;

       //   if(my_currency == 'GBP'){
       //      $(".boldprice").html("£"+total.toFixed(2));  
       //   }else if(my_currency == 'USD'){
       //      $(".boldprice").html("$"+total.toFixed(2));  
       //   }else if(my_currency == 'INR'){
       //      $(".boldprice").html(total.toFixed(2)+"₹");  
       //   }
          
       //    $(".artist_profit").val(commission);
       //    $(".boldprice1").val(total);
       //  }

      $("#artist_price").change(function(){

        if($("#artist_price").val() != '')
        {
          var price = '<?php echo $product_variant->price; ?>';
          
          var my_currency = '<?php echo session()->get('my_currency'); ?>'; 
          
          // var price = $("#artist_profit").val();
          // var price = $(".boldprice").text();
          // var  price = Totprice*0.1;
          // var price = $("#original_prise").val();

          if($('.addon').prop('checked') == true){
            price = Number(price) + Number(addon);
          }
          // price1 = price2.replace(/[^0-9.]/g,'');
          
          var artist_commission_val = '<?php echo $artist_commission_val; ?>';
           // alert("price1"+parseFloat(price1));
          
          total=parseFloat(price) + parseFloat($("#artist_price").val());
          
          //commission = total / artist_commission_val;
          commission = (artist_commission_val / 100)*total;
          // commission = (artist_commission_val / 100)+total;

          commission= Number((commission).toFixed(1));
          totalValue= Number((total).toFixed(1));

         if(my_currency == 'GBP'){
            $(".boldprice").html("£"+total.toFixed(2));  
         }else if(my_currency == 'USD'){
            $(".boldprice").html("$"+total.toFixed(2));  
         }else if(my_currency == 'INR'){
            $(".boldprice").html(total.toFixed(2)+"₹");  
         }
          
          $(".artist-test").html("£"+totalValue);
          $(".artist_profit").val(commission);
          $(".boldprice1").val(total);
        }

      })

      var min_value=$(".boldprice").text().slice(1);
      //$("#artist_price").val(min_value);

      // $(".fa_eye_check").click(function(){
      //   var count=parseFloat($("#fa_eye_valid").val());
      //     $("#fa_eye_valid").val(count+1);
      // });
      // $(".fa_eye_uncheck").click(function(){
      //   var count=parseFloat($("#fa_eye_valid").val());
      //   $("#fa_eye_valid").val(count-1);
      // })
        var width = {{$desgin_data['prd_drw_wdh']}};
        var width_less = width-1;
        var height = {{$desgin_data['prd_drw_ht']}};
        var height_less = height-1;


       line1 = new fabric.Line([0,0,width,0], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});
       line2 = new fabric.Line([width_less,0,width,height_less], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});
       line3 = new fabric.Line([0,0,0,height], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});

       // line33 = new fabric.Line([0,0,80,200], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});


       line4 = new fabric.Line([0,height,width,height_less], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});

        /*******************************************************************************/
        function triggerCanvas(id,viewArr){
          $('.fjs_thumb:nth-child('+id+')').trigger("click");
          setTimeout(function () {
            getContentImage(id,viewArr);
          }, 1000);
        }

        function getContentImage(id,viewArr) {
            //console.log(id);
            // console.log('tesss');

            //$('.fjs_thumb:nth-child('+id+')').trigger("click");
            var i=0;
            var inputElements = [].slice.call(document.querySelectorAll('.size_picker_class'));
            var checkedValue = inputElements.filter(chk => chk.checked).length;

            // if($("#artist_price").val()=='')
            // {
            //     $("#artist_price_error").show();
            //     var i=1;
            // }
            // else
            // {
            //     $("#artist_price_error").hide();
            // }

            if($("#artist_profit").val()=='')
            {
                $("#artist_profit_error").show();
                var i=1;
            }
            else
            {
                $("#artist_profit_error").hide();
            }


            if(($("#creation_name").val()==''))
            {
                $("#creation_name_error").show();
                var i=1;
            }
            else
            {
                $("#creation_name_error").hide();
            }

            if(($("#name_creation").val()==''))
            {
                $("#name_creation_error").show();
                var i=1;
            }
            else
            {
                $("#name_creation_error").hide();
            }
            
            // if(($("#promotional_image").val()==''))
            // {
            //     $("#promotional_image_error").show();
            //     var i=1;
            // }
            // else
            // {
            //     $("#promotional_image_error").hide();
            // }
            
            if(($("#creation_description").val()==''))
            {
                $("#creation_description_error").show();
                var i=1;
            }
            else
            {
                $("#creation_description_error").hide();
            }
            if(checkedValue==0)
            {
                 $("#size_picker_error").show();
                 var i=1;
            }
            else
            {
                $("#size_picker_error").hide();
            }
            if($("#fa_eye_valid").val()==6)
            {
                $("#colorpicker_error").show();
                 var i=1;
            }
            else
            {
                $("#colorpicker_error").hide();
            }
           if(i==1)
           {
            $("#loading_screen").hide();
            return false;
           }

            var activeObject = canvas.getActiveObject(),
                activeGroup = canvas.getActiveGroup();
            if (activeObject) {
                canvas.discardActiveObject();
            }
            else if (activeGroup) {
              var objectsInGroup = activeGroup.getObjects();
              canvas.discardActiveGroup();
            }

            // window.location.href=image; // it will save locally
            html2canvas(document.querySelector("#shirtDiv")).then(canvas => {

                $(canvas).get(0).toBlob(function (blob) {
                var urlCreator = window.URL || window.webkitURL;
                var imageUrl = urlCreator.createObjectURL(blob);
  
var fruitsGranted=[];
  $("input[name='colorpicker-radio[]']:checked").each(function(){
    var $this = $(this);

    fruitsGranted.push($this.attr("value"));
    
});

                var canvas_data = new FormData();
                
                canvas_data.append('layer', $(canvas).get(0).toDataURL("image/png"));
                canvas_data.append('_token', "{{ csrf_token() }}");
                canvas_data.append('product_id', "{{$product_variant->product_id}}");
                canvas_data.append('variant_id', "{{$product_variant->id}}");
              
                canvas_data.append('colorpicker_radio', fruitsGranted);

            canvas_data.append('merchandise_product_id', $('#merchandise_product_id').val());
            canvas_data.append('merchandise_product_name', $('#merchandise_product_name').val());
            canvas_data.append('artist_price', $('#artist_price').val());
            canvas_data.append('mer_price', $('#mer_price').val());
            canvas_data.append('promotional_image', $('#promotional_image').prop('files')[0]);
            canvas_data.append('name_creation', $('#name_creation').val());
            canvas_data.append('creation_name', $('#creation_name').val());
            canvas_data.append('creation_description', $('#creation_description').val());
            canvas_data.append('category_keyword', $('#category_keyword').val());
            canvas_data.append('search_keyword', $('#search_keyword').val());
            canvas_data.append('type', 'image');
            if(id==1){
            canvas_data.append('split_image_val1', $('#fsvalue_1').val());
            canvas_data.append('split_image_val2', $('#fsvalue_2').val());
            canvas_data.append('split_image_val3', $('#fsvalue_3').val());
            canvas_data.append('split_image_val4', $('#fsvalue_4').val());
            }

                $.ajax({
                    type: "POST",
                    url: "{{route('designUpload')}}",
                    data:  canvas_data,
                    enctype: 'multipart/form-data',
                    async: false,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    success: function(data)
                    {
                        if(data.merch_id!= '') {
                          
                            $('#merchandise_product_id').val(data.merch_id);
                        }
                        // some code after succes from php
                        // console.log(data);
                        
                        var loopLength = Object.keys(viewArr).length;
                        if(id == loopLength){
                          iziToast.success({ title: 'Success', message: 'Merchandise product added successfully', position: 'topRight', }); 
                          setTimeout(function () {
                            document.location.href="{!! route('manage_product'); !!}";
                          }, 5000);                  
                        }
                // document.location.href="{!! route('designCreation'); !!}";

                    },
                    beforeSend: function()
                    {
                        // some code before request send if required like LOADING....
                        //console.log('loading');
                    }
                });

            });
        });

var colorPickerValue=[];
  $("input[name='colorpicker-radio[]']:checked").each(function(){
    var $this = $(this);

    colorPickerValue.push($this.attr("value"));
    
});
            var canvas_data = new FormData();

            canvas_data.append('layer', canvas.toDataURL("image/png"));
            canvas_data.append('_token', "{{ csrf_token() }}");
            canvas_data.append('product_id', "{{$product_variant->product_id}}");
            canvas_data.append('variant_id', "{{$product_variant->id}}");

            canvas_data.append('colorpicker_radio', colorPickerValue);
            canvas_data.append('merchandise_product_id', $('#merchandise_product_id').val());
            canvas_data.append('merchandise_product_name', $('#merchandise_product_name').val());
            canvas_data.append('artist_price', $('#artist_price').val());
            canvas_data.append('mer_price', $('#mer_price').val());
            canvas_data.append('promotional_image', $('#promotional_image').prop('files')[0]);
            canvas_data.append('name_creation', $('#name_creation').val());
            canvas_data.append('creation_name', $('#creation_name').val());
            canvas_data.append('creation_description', $('#creation_description').val());
            canvas_data.append('category_keyword', $('#category_keyword').val());
            canvas_data.append('search_keyword', $('#search_keyword').val());
            canvas_data.append('type', 'layer');
            if(id==1){
            canvas_data.append('split_image_val1', $('#fsvalue_1').val());
            canvas_data.append('split_image_val2', $('#fsvalue_2').val());
            canvas_data.append('split_image_val3', $('#fsvalue_3').val());
            canvas_data.append('split_image_val4', $('#fsvalue_4').val());
            }
      $("#loading_screen").show();
            $.ajax({
                type: "POST",
                url: "{{route('designUpload')}}",
                data:  canvas_data,
                enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
                success: function(data)
                {
                    if(data.merch_id!= '') {
                        $('#merchandise_product_id').val(data.merch_id);
                    }
                    // some code after succes from php
                    // console.log(response);
                },
                beforeSend: function()
                {
                    // some code before request send if required like LOADING....
                    //console.log('loading');
                }
            });
        }

        function LoadeShirts(viewArr) {

            var layer_count = '<?php echo $layerCount; ?>';
            var canvasNew = 1;
            // var timeoutSec = 500;
            var newIndexArray = [];
            for(var canv = 0; canv < layer_count; canv++)
            {
              newIndexArray.push(canv);
            }
            //console.log(newIndexArray+"-layers");
            const requests = newIndexArray.map((item, index) =>
              new Promise(resolve => 
                setTimeout(() => resolve(triggerCanvas(index+1,viewArr)), index * 8000)
              ));

            Promise.all(requests).then((updatedArr) => {
              console.log(updatedArr);
            });
        }

        /*******************************************************************************/

        $('#imgsavejpg').on('click', function (e) {
        e.preventDefault();
            function save() {
                html2canvas(document.querySelector("#test")).then(canvas => {
                    // document.body.appendChild(canvas)
                    $(canvas).get(0).toBlob(function (blob) {
                    // var filesaver = saveAs(blob, "TShirt.png");
                    // filesaver.onwriteend = function () {

                    //     $('.loading-blink').hide();
                    //     $('#test').empty();
                    // }
                    $('.loading-blink').hide();
                    //     $('#test').empty();


                });
            });
            }
            $("#loading_screen").show();
            LoadeShirts(viewArr);
            
            setTimeout(function () {
                //save();
            }, 2200);

        });

        $('#rotate').click(function (e) {
            e.preventDefault();
            rotate();
        });

        function rotate() {
            //$('#thumbFlip').click();
            var currentView = $(this).find(".thumbnail_image").attr('data-original-title');
            var oldView = $("#current_canvas").val();
            $("#current_canvas").val(currentView);   
        }

        $("#addimg").on('click', function () {
            $('#imgInp').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.media_images').append('<div class="col-xs-4"><img class="img-polaroid tt" src="' + e.target.result + '"></div>');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        $('#shirtstyle').on('change', function () {
            $('#tshirtFacing').attr("src", "img/t-shirts/" + $(this).val() + "_front.png");
            IMAGE_NAME = $(this).val();
        });
          
        function autoLoad() {

           alert("Page is loaded"); 
        } 
        //page load 
 
                var viewArr = [];

                $('body').on('click', '.fjs_thumb', function (e){ 
   
                //$(this).attr('data-original-title', 'Show Second View');
                var imgSrc = $(this).find(".thumbnail_image").attr('data-img');
                //console.log(imgSrc);
                var currentView = $(this).find(".thumbnail_image").attr('data-original-title');
                var oldView = $("#current_canvas").val();
                //console.log(imgSrc);
                // $("#tshirtFacing").attr("src","{{ asset('portal/img/product') }}/{{$desgin_data['img']}}");
                $("#current_canvas").val(currentView);                    

                $("#tshirtFacing").attr("src",imgSrc);
                viewArr[oldView] = JSON.stringify(canvas);
                //a = JSON.stringify(canvas);
                canvas.clear();
                try
                {
                   var json = JSON.parse(viewArr[currentView]);
                   canvas.loadFromJSON(viewArr[currentView]);
                   // canvas.loadFromJSON(viewArr[currentView], canvas.renderAll.bind(canvas));
                }
                catch(e)
                {}
                canvas.renderAll();
                setTimeout(function() {
                    canvas.calcOffset();
                },200);
        });


    });

// $(function() {
//     $("#artist_price").on("change", sum_profit);
//  function sum_profit() {
//  $("#artist_profit").val(Number($("#artist_price").val()) - {{$product_variant->price}} );
//  }
// });

</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> -->
<script type="text/javascript">
    // var path = "{{ route('ac_autocomplete') }}";
    // $('input.typeahead').typeahead({
    //     source:  function (query, process) {
    //     return $.get(path, { query: query }, function (data) {
    //             return process(data);
    //         });
    //     }
    // });
</script>
<script>



$(document).ready(function(){

  if($('.addon').is(":checked")){

    var artist_profit = '<?php echo $product_variant->price; ?>';
    addon = $(".addon").val();
    totalEarning = Number(artist_profit)+Number(addon);
    commission = (artist_commission_val / 100)*totalEarning;
    
    $(".artist-test").html(totalEarning);
    $(".artist_profit").val(commission);
  }

  var split_image_val1 = new Array();
  var split_image_val2 = new Array();
  var split_image_val3 = new Array();
  var split_image_val4 = new Array();

$("#split_more").hide();

$('#promotional_image').change(function () {
   // alert();
    var ext = $('#promotional_image').val();
    //console.log(ext);
    file = ext.toLowerCase();
    extension = file.substring(file.lastIndexOf('.') + 1);
    if($.inArray(extension, ['jpg','jpeg']) == -1)
    {
        $('#promotional_image').val('');
        alert("jpeg Image is only supported");
        return false;
    }
        fileCount = this.files.length;
        if(fileCount){
                // $('#upload-demo-i img').attr( 'src', URL.createObjectURL(event.target.files[0])
                // );
                var _URL = window.URL || window.webkitURL,
                    file = this.files[0],
                  image = new Image();
                  //console.log("n1");
            
              //console.log("n2");
              $('#demo').attr('src',  _URL.createObjectURL(file)).
              load(function() {
                //console.log("test");
                  pic_real_width = this.width + 30;   // Note: $(this).width() will not
                  pic_real_height = this.height; // work for in memory images.
                 //alert(pic_real_heigh);
                  $('.modal-dialog').css("height",this.height);
                  $('.modal-dialog').css("width",pic_real_width);
              });
              $("#myModal").modal({
                  backdrop: 'static',
                  keyboard: false
              });
              $('#myModal').modal('show');

              var class_count = $('.preview_class').length+1;
              if(class_count > 0)
              {
                $("#split_more").show();
              }

          var $target = $('#demo');
          $preview = $('#preview'+class_count);
          var size;
        $('#demo').Jcrop({
          aspectRatio: 1,
          onSelect: function(c){
            // console.log(c.h);
              if(c.h < 286)
              {
                $("#crp_save").prop("disabled",true);
              }
              else
              {
                $("#crp_save").prop("disabled",false);
              }
              coords = c;
          }

        });


    $('#crp_save').on('click', function () {
        // make a copy of the image with the original dimensions

        var class_count = $('.preview_class').length;
        //alert(class_count);

        var $img = $('<img/>', {
            src: $target[0].src,
            css: {
              position: 'absolute',
              left: '-' + Math.round(coords.x) + 'px',
              top: '-' + Math.round(coords.y) + 'px',
              width: $target.css('width'),
              height: $target.css('height')
            }
        });
        if(class_count == 0)
        {
            split_image_val1.push(Math.round(coords.x));
            split_image_val1.push(Math.round(coords.y));
            split_image_val1.push(Math.round(coords.x2));
            split_image_val1.push(Math.round(coords.x2));
            split_image_val1.push(Math.round(coords.w));
            split_image_val1.push(Math.round(coords.h));
            split_image_val1.push($target.css('width'));
            split_image_val1.push($target.css('height'));
          $("#fsvalue_1").val(split_image_val1);
          //console.log(split_image_val1);
          image_display(class_count,split_image_val1);
        }
        if(class_count == 2)
        {
            split_image_val2.push(Math.round(coords.x));
            split_image_val2.push(Math.round(coords.y));
            split_image_val2.push(Math.round(coords.x2));
            split_image_val2.push(Math.round(coords.x2));
            split_image_val2.push(Math.round(coords.w));
            split_image_val2.push(Math.round(coords.h));
            split_image_val2.push($target.css('width'));
            split_image_val2.push($target.css('height'));
          $("#fsvalue_2").val(split_image_val2);
          console.log(split_image_val2);
          image_display(class_count,split_image_val2);
        }
        if(class_count == 3)
        {
            split_image_val3.push(Math.round(coords.x));
            split_image_val3.push(Math.round(coords.y));
            split_image_val3.push(Math.round(coords.x2));
            split_image_val3.push(Math.round(coords.x2));
            split_image_val3.push(Math.round(coords.w));
            split_image_val3.push(Math.round(coords.h));
            split_image_val3.push($target.css('width'));
            split_image_val3.push($target.css('height'));
          $("#fsvalue_3").val(split_image_val3);
          console.log(split_image_val3);
          image_display(class_count,split_image_val3);
        }
        if(class_count == 4)
        {
            split_image_val4.push(Math.round(coords.x));
            split_image_val4.push(Math.round(coords.y));
            split_image_val4.push(Math.round(coords.x2));
            split_image_val4.push(Math.round(coords.x2));
            split_image_val4.push(Math.round(coords.w));
            split_image_val4.push(Math.round(coords.h));
            split_image_val4.push($target.css('width'));
            split_image_val4.push($target.css('height'));
          $("#fsvalue_4").val(split_image_val4);
          console.log(split_image_val4);
          image_display(class_count,split_image_val4);
        }
        // set the dimensions of the preview container
        $preview.css({
            position: 'relative',
            overflow: 'hidden',
            width: Math.round(coords.w) + 'px',
            height: Math.round(coords.h) + 'px'
        });
        // add+position image relative to its container
        $preview.html($img);
        $preview.addClass("preview_class");

        //$("#promotional_image").val('');
    });


 $("#split_more").click(function(e){

       e.preventDefault();

              var class_count = $('.preview_class').length+1;
              //alert(class_count);
              if(class_count > 4)
              {
                alert("Maximun 4 split images is allowed");
                return false;
              }
              if(class_count > 0)
              {
                $("#split_more").show();
              }

          var $target = $('#demo');
          $preview = $('#preview'+class_count);


        $('#myModal').modal('show');

        var $img = $('<img/>', {
            src: $target[0].src,
            css: {
              position: 'absolute',
              left: '-' + Math.round(coords.x) + 'px',
              top: '-' + Math.round(coords.y) + 'px',
              width: $target.css('width'),
              height: $target.css('height')
            }
        });
        //console.log($img);
        // set the dimensions of the preview container
        $preview.css({
            position: 'relative',
            overflow: 'hidden',
            width: Math.round(coords.w) + 'px',
            height: Math.round(coords.h) + 'px'
        });
        // add+position image relative to its container
        $preview.html($img);
        $preview.addClass("preview_class");

        //$("#promotional_image").val('');

 });

  function image_display(x,y)
      {

        // var filesSelected = document.getElementById("promotional_image").files[0];
        // console.log(filesSelected);
var form = document.forms.namedItem("upload_form"); // high importance!, here you need change "yourformname" with the name of your form
var formdata = new FormData(form); // high importance!
formdata.append('_token', "{{ csrf_token() }}");
formdata.append('count', x);
formdata.append('coords', y);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                          url:"{{route('image_display')}}",
                          type:'POST',
                          dataType: "json", // or html if you want...
                          contentType: false, // high importance!
                          //enctype: 'multipart/form-data',
                          data:formdata,
                          processData: false,
                          success:function(data){
                            //console.log(data);
                            if(data.count == 0)
                            {
                             $("#display_1").attr("src",data.img_src);
                            }
                            if(data.count == 2)
                            {
                             $("#display_2").attr("src",data.img_src);
                            }
                             if(data.count == 3)
                            {
                             $("#display_3").attr("src",data.img_src);
                            }
                            if(data.count == 4)
                            {
                             $("#display_4").attr("src",data.img_src);
                            }
                          }

                      });

      }


        $("#crop").click(function(){
            var img = $("#cropbox").attr('src');
            $("#cropped_img").show();
            $("#cropped_img").attr('src','image-crop.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
        });



        }else{
            $('#demo').attr( 'src','')
        }
    });

          var size;
        $('#cropbox_1').Jcrop({
          aspectRatio: 1,
          onSelect: function(c){
           size = {x:c.x,y:c.y,w:c.w,h:c.h};
           $("#crop").css("visibility", "visible");
          }
        });

        $("#crop").click(function(){
          //alert();
            var img = $("#cropbox").attr('src');
            $("#cropped_img").show();
            $("#cropped_img").attr('src','image-crop.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
        });

$('body').on('keyup', '#creation_name', function (){
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('ac_autocomplete') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn();
                    $('#countryList').html(data);
          }
         });
        }
    });

    $('body').on('click', '#countryList .dropdown-menu li a', function(){
        $('#creation_name').val($(this).text());
        $('#countryList').fadeOut();
    });

});

         $('.print_type_array').change(function() {

            id= $(this).attr('id');
            val = $("#"+id).val();
            //$('#price_add').modal('show');
            //$("#price_name_add_value").val(val);
            var _token = "{{ csrf_token() }}";
            $("#loading_screen").show();
    
          var artist_profit = '<?php echo $product_variant->price; ?>';
      
          addon = $(".addon").val();
          var commissionValue = '<?php echo $artist_commission_val; ?>';
          if($('.addon').is(":checked")){
             totalEarning = Number(artist_profit)+Number(addon)+parseFloat($("#artist_price").val());
          }else {
       
             totalEarning = Number(artist_profit)+parseFloat($("#artist_price").val());
          }
          commission = (commissionValue / 100) * totalEarning;

          $(".artist-test").html("£"+totalEarning);
          $(".artist_profit").val(commission);
  
        if(this.checked) {
          // alert($(this).attr("data-id"));
          //alert(val);

            type =val;
            price = $(this).attr("data-id");
            product_id = '<?php echo @$productdetails->id ?>';
            //alert(price);
            var status = 0;
            var _token = "{{ csrf_token() }}";
$.ajax({
            type: "POST",
            url: "{{ url('/print_type_add') }}",
            data: {
                    status: status,product_id:product_id, type: type, price:price,  _token : _token,
                },
            success: function (data) {
                if(data.status = 'success')
                {
                    //window.location.reload();
                    $("#loading_screen").hide();
                }
              },
            error: function (data) {

            }
        });
        }
         else
         {
            type = val;
            price = '';
            product_id = '<?php echo @$productdetails->id ?>';
            var status = 1;
      $.ajax({
            type: "POST",
            url: "{{ url('/print_type_add') }}",
            data: {
                    status: status,product_id:product_id, type: type, price:price,  _token : _token,
                },
            success: function (data) {
                if(data.status = 'success')
                {
                   //window.location.reload();
                   $("#loading_screen").hide();
                }
              },
            error: function (data) {

            }
        });
         }
        //$('#textbox1').val(this.checked);
    });

function ses_value(clr){
  var clr= clr;
  alert(clr);
  return false;

$('#demo').on('click', function() { 
    $imageFile.val(''); 
});
}

</script>
 <script>
         $(document).ready(function() {
            $(".mobdown .navbar-toggle").click(function(){
                $('.toggledropdown').slideToggle();
            });
          });
    </script>
<!-- <div style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index:999999;" id="loading-custom-overlay"
     class="loading-div loading-blink">
    <div id="custom-overlay">
        <div class="loading-spinner">
            Loading (custom)...
        </div>
    </div>
</div> -->
<div>
                    <div id="test"></div>
                </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog" style="height: 475px; width: 644px;">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close logclose" data-dismiss="modal">&times;</button>
        </div>
         <div class="modal-body">
            <input type="hidden" class="previewid" value="'+id+'"><img class="img-responsive img-fluid" id="demo" src="" />
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
            <button type="button" class="btn btn-success" id="crp_save" data-dismiss="modal" value="save">Crop Image</button>
         </div>
      </div>
   </div>
</div>
@endsection
