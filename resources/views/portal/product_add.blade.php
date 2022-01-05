@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')

<!-- end of plugin styles -->
@endsection

@section('content')
<!-- Page Header-->
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('editor/jquery-te-1.4.0.css') }}" type="text/css">

<!-- auto complete -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" /> 
<script type="text/javascript" src="{{ asset('editor/jquery-te-1.4.0.min.js') }}"></script>

<style>

  .jqte_tool.jqte_tool_1 .jqte_tool_label {
    height:21px; /*change*/
  }
  .jqte_tool_label{
    padding-top: 1px !important; /*add*/
    height: 25px !important; /*add*/
  }

  * {
    box-sizing: border-box;
  }

  body {
    background-color: #f1f1f1;
  }

  #product_add_form {
    background-color: #ffffff;
    margin: 100px auto;
    font-family: Raleway;
    padding: 40px;
    width: 70%;
    min-width: 300px;
  }

  h1 {
    text-align: center;  
  }

  input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }

  /* Mark input boxes that gets an error on validation: */
  input.invalid {
    background-color: #ffdddd;
  }

  /* Hide all steps by default: */
  .tab {
    display: none;
  }

  button {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
  }

  button:hover {
    opacity: 0.8;
  }


  #prevBtn {
    background-color: #bbbbbb;
  }

  /* Make circles that indicate the steps of the form: */
  .step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;  
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
  }

  .step.active {
    opacity: 1;
  }

  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #4CAF50;
  }

  .checkbox-template::before, .radio-template::before
  {
    left: 6px;
    position: relative;
  }

  .checkbox-template::after, .radio-template::after
  {
    left: 7px;
  }

  .checkbox-template + label
  {
    margin-top: -4px;
  }

  .i-checks {
    margin-right: 25px;
  }

  .i-checks label input
  {
    height: 20px;
    width: 50px;
    font-size: 14px;
    margin-left: 10px;
  }

  .colpick
  {
    width: 55px!important;
    height: 40px;
    padding: 0px 3px;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
  }
  span.mandatory_field {
    color: red;
    font-size: x-large;
  }
 span.multi_supplier_input {
    width: 100%;
    max-width: 800px !important;
  }

  #product_image_error1 {
    margin-top: -17px;
    margin-bottom: 13px;
    font-size: 13px;
    color: #f00;
  }
  small, .small {
    font-size: 50%;
  }
  .file_add_more, .file_add_rmv {
    position: relative;
    top: 45px;
  }
  .col-lg-9, .col-lg-3, .col-lg-2 {
    float: left;
  }
  .prw_crp_div {
    padding: 5px;
    text-align: center;
  }
  input[type="file"]{
    text-overflow: ellipsis;
    overflow: hidden;
    font-size:12px;
  }
  .crp_edit {
    max-width: 78%;
    border: 1px solid #ccc;
    padding-left: 4px;
    color: blue !important;
    cursor: pointer;
    text-align: center;
    font-weight: 600;
  }
  span.crop_del {
    position: absolute;
    top: 0;
    right: 0;
    color: red;
  }
  .add_more_file_hide, .prw_crp_div, .crp_edit, .crop_del {
    display: none;
  }
  div#myModal a#squ_crop {
    text-align: center;
    width: 100%;
    display: flex;
    background: #c2c6ca;
    max-width: 40%;
    margin: 0px auto;
    float: none;
    justify-content: center;
    margin-top: 15px;
    color: #000;
    font-weight: bold;
    height: 32px;
    align-items: center;
    Cursor:pointer;
  }
  .fileupload_sp {
    float: left;
    width: 70%;
  }
  .daily-feeds span {
    color: #fff;
  }
  .daily-feeds .product-option span, .daily-feeds .mandatory_field span {
    color: #000;
  }
  .modal-dialog {
    max-width: min-content;
  }

  /*Print type*/
  .validate_price
  {
    width: 75px;
    height: 34px;
    padding: 3px 10px;
    border: 1px solid #dee2e6;
    margin-left: 10px;
    margin-top: 0;
  }

  .print_type_append {
    padding: 20px;
    border: 1px solid #ededed;
    margin: 15px 0;
  }
  .print_type_append label {
    margin-bottom: 15px;
  }
  .print_type_close_btn{
    height: 32px;
    line-height: 0 !important;
    display: inline-block;
    margin-left: 13px;
    vertical-align: top;
    padding: 0 8px;
  }
  .print_type_close_btn i{
    font-size: 20px;
    color: #fff;
    vertical-align: middle;
    margin-top: 4px;
  }
  .print_type_append div{
    margin-bottom: 15px;
  }
  .print_type_dropdown
  {
    padding: 3px 10px;
    border: 1px solid #dee2e6;
    margin-left: 20px;
    height: 35px;
    padding-right: 20px;
  }

  .checkbox_class
  {
    width : unset;
    margin: 6px;
  }


  .check_box_print_des
  {
    width: 100%;
    float: left;
    display: flex;  
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
  /*size,color changes*/
  span.select2.select2-container {
    width: 100% !important;    
    max-width: 800px;
  }
  .form-group.color_show select{
    background: url(../images/selectarrow.png); 
    background-position: 98%;
    background-repeat: no-repeat;
    background-size: 13px;
    -webkit-appearance: none;
  }
  .select2-selection__rendered{
    background: url(../images/selectarrow.png);
    background-position: center right 10px;
    background-repeat: no-repeat;
    background-size: 13px;
  }
  .color_valshow {
    padding: 3px;
    width: 100%;
    max-width: 40px;
  }
  .form-group.color_show {
    display: flex;
    align-items: center;
  }
  .form-group.color_show .pov2 {
    margin-right: 10px;
  }
  ul.select2-selection__rendered .select2-selection__choice {
    background-color: #2b8fda !important;
  }
  input.select2-search__field {
    font-size: 15px !important;
    padding: 3px 5px !important;
    width: 50px !important;
  }
  span.selection .select2-selection {
    border-radius: unset;
  }
  span.selection {
    width: 100%;
    max-width: 800px !important;
  }  
  ul.select2-selection__rendered .select2-selection__choice {
    background-color: #2b8fda !important;
    font-size: 12px;
    padding: 0px 9px !important;
    color: #ffffff;
    font-weight: 600;
  }
  span.select2-selection__choice__remove {
    color: #ffffff !important;
    font-size: 18px; 
    text-transform: uppercase;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #999;
    cursor: pointer;
    display: inline-block;
    font-weight: bold;
    margin-right: 2px;
    margin-left: 7px;
  }
  ul.select2-selection__rendered .select2-selection__choice { 
    background-color: #2b8fda !important;
    font-size: 14px;
    padding: 0px 9px !important;
    color: #ffffff;
    font-weight: 600;
    display: flex;
    flex-direction: row-reverse; 
    justify-content: space-between;
    padding-right: 2px !important; 
    align-items: center; 
    padding-left:6px;
    max-width: 150px;
    min-width: 50px;
  }
  .dvPreview_1 img {
    margin: 0px 10px;
    border-radius: 2px;
  }
  .add_multi_img img {
    margin: 0px 10px;
    border-radius: 2px;
  }
  .multi_supplier{
    display: flex;
    flex-direction: column;
  }

</style>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<div class="loading" id="loading_screen" style="display: none;">Loading&#8230;</div>

<form id="product_add_form" action="{{ route('admin.productSave') }}" class="form_class_validation" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="status" value="0">  
  <input type="hidden" id="count_value" name="">
  <h1>Add Product:</h1>
  <!-- One "tab" for each step in the form: -->
  <div id="form_validation_div" style="color: red;"></div>
  <div class="tab card-body">
    <div class="form-group">
      <label for="product_add_form">Product Name:  <span class="mandatory_field">*<span></label>
        <input type="text" class="form-control" name="product_name"  id="product_name" value="{{ old('product_name') }}">  
        <!-- onchange="product_name_change()" -->
        <div class="error" id="product_name_error"></div> 
      </div> 
      <div class="form-group">
        <label for="product_add_form">Category:  <span class="mandatory_field">*<span></label>
          <select name="category_id" id="category_name_product_add" onchange="category_dropdown_change()" class="form-control">
            <option disabled selected value>Please select the category</option>
            @foreach($category_list as $list)
            <option value="{{ $list->id }}"{{ (old('category_id') == $list->id ? "selected":"") }}>{{ $list->category_name }}</option>
            @endforeach
          </select>
          <div class="error" id="category_id_error"></div>
        </div>
        <div class="form-group" id="sub_category_name_div" style="display:none;">
          <label for="product_add_form">Sub Category:</label>
          <select name="sub_category_id" id="sub_category_name_product_add" class="form-control">
          </select> 
          <div class="error" id="sub_category_id_error"></div>        
        </div> 
        <div class="form-group multi_supplier">
          <label for="product_add_form" style="width: 100%;">Supplier :  <span class="mandatory_field multi_supplier_sel ">*<span></label>
            <select name="supplier_id[]" id="supplier_name_product_add" multiple class="form-control multi_supplier_input"> 
              @foreach($supplier_list as $list)
              <option value="{{ $list->id }}" {{ (old('supplier_id') == $list->id ? "selected":"") }}>{{ $list->name }}</option>
              @endforeach
            </select>
            <div class="error" id="supplier_id_error"></div>
          </div>
          <div class="form-group">
            <label for="product_add_form">Shipping Cost:  <span class="mandatory_field">*<span></label>
              <input type="number" class="form-control" name="shipping_cost" id="shipping_cost" value="{{ old('shipping_cost') }}">  
              <div class="error" id="shipping_cost_error"></div>
            </div> 
            <div class="form-group">
              <label for="product_add_form">Supplier Reference Number:  <span class="mandatory_field">*<span></label>
                <input type="number" class="form-control" name="reference_number" id="reference_number" value="{{ old('reference_number') }}">  
                <div class="error" id="reference_number_error"></div>
              </div> 
              <div class="form-group custom-txt-align">
                <label for="product_add_form">Product Description:  <span class="mandatory_field">*<span></label><br />
                  <textarea rows = "5" cols = "50" id="product_description" class="product_description_editor"  name="product_description" form="product_add_form">{{ old('product_description', 'This is a product description') }}</textarea>
                  <script>
                    CKEDITOR.replace( 'product_description');
                  </script>
                  <div class="error" id="product_description_error"></div>
                </div>
                <div class="form-group">
                  <label for="product_add_form">Fixed Dimension:  <span class="mandatory_field">*<span></label>
                    <select name="" id="dimension_add" class="form-control">
                      <option disabled selected value>Please select the dimension</option>
                      <!-- <option value="1">Rectangle </option> -->
                      <option value="3">Horizontal</option>
                      <option value="2">Vertical</option>
                      <option value="4">Square</option>
                    </select>
                    <div class="error" id="dimension_error"></div>
                  </div>
                  <div class="form-group">
                    <label style="display : none;" for="product_add_form">Product Width:  <span class="mandatory_field">*<span></label>
                      <input type="hidden" class="form-control" name="product_width" id="product_width" value="{{ old('product_width') }}">  
                      <div class="error" id="product_width_error"></div>
                    </div>
                    <div class="form-group">
                      <label style="display : none;" for="product_add_form">Product Height:  <span class="mandatory_field">*<span></label>
                        <input type="hidden" class="form-control" name="product_height" id="product_height" value="{{ old('product_height') }}"> 
                        <div class="error" id="product_height_error"></div>
                      </div>
                      <div class="form-group">
                        <button type="button" id="add_print_type" class="btn btn-success">Add-on</button>
                        <div class="print_type_append"></div>

                      </div>
                    </div>
                    <div class="tab append_class" id="">
                      <div class="append-form form_final">
                        <div class="row add_variant_section">
                          <div class="col-lg-12">
                            <div class="daily-feeds card">
                              <div class="card-header">
                                <h3 class="h4">Product Variants</h3><span id="add_variant_btn" data-value="1" class="btn btn-primary add_variant_btn" style="float: right;">Add</span>
                              </div>
                              <div class="card-body no-padding">
                                <!-- Item-->
                                <div class="item">
                                  <div class="feed d-flex justify-content-between"><div class="error" id="form_error2"></div>
                                  <div class="col-lg-4">
                                    <div class="form-group">
                                      <label for="product_add_form">Name:  <span class="mandatory_field">*<span></label>
                                        <input type="text" class="form-control" name="pv_name[1]" value="">
                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group">
                                        <label for="product_add_form">Price:  <span class="mandatory_field">*<span></label>
                                          <input type="text" class="form-control" name="pv_price[1]" value="">
                                        </div>
                                      </div>
                                      <div class="col-lg-4">
                                        <div class="form-group">
                                          <label for="product_add_form">Quantity:  <span class="mandatory_field">*<span></label>
                                            <input type="text" class="form-control" name="pv_quantity[1]" value="">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="item clearfix" style="display: inline-block;">
                                      <!--     <label for="">Print Type</label><br> -->
                                      <div class="print_type_checkbox_1 check_box_print_des"></div>
                                    </div>
                                    <div class="item clearfix attribute_class">
                                      <div class="feed">
                                        
                                        <div class="row">
                                          @foreach($product_options as $po)
                                          <?php
if ($po->id == 1)
{
    $size = $po->name;
}
else
{
    $color = $po->name;
}

?>

                                          @endforeach 
                                          <div class="col-lg-6">
                                            <div class="form-group custom-txt-align product-option" style="border: 1px solid grey;padding: 10px;"> 
                                              <label for="product_add_form">Attribute : <span style="text-transform: capitalize;font-weight: bold;">{{$size}}</span></label><br />
                                              <div class="row">
                                                <div class="col-lg-12">

                                                  <div class="form-group">
                                                   <select name="product_option_size_value[]" id="povid" multiple class="form-control  size_attr" required>
                                                    @foreach($options_varaints as $pov)
                                                    @if($pov->product_option_id == '1')
                                                    <option value="{{$pov->name}}">{{$pov->name}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                  </select>

                                                </div>
                                              </div>
                                            </div>     
                                          </div>
                                        </div>
                                        <div class="col-lg-6">
                                          <div class="form-group custom-txt-align product-option" style="border: 1px solid grey;padding: 10px;">
                                            <label for="product_add_form">Attribute : <span style="text-transform: capitalize;font-weight: bold;">{{$color}}</span></label><br />
                                            <div class="row">
                                              <div class="col-lg-12">

                                                <div class="form-group color_show">
                                                  <select name="product_color_option_value" id="pov22" class="form-control pov22 color_attr pov_color2">
                                                    @foreach($options_varaints as $pov)
                                                    @if($pov->product_option_id == '2')
                                                    <option value="{{$pov->name}}">{{$pov->name}} @if($pov->color_code)- {{$pov->color_code}} @endif</option>
                                                    @endif
                                                    @endforeach
                                                  </select>
                                                  <input type="text" readonly="readonly" value="" class="color_valshow" name="color_valshow" id="color_valshow">

                                                </div>
                                              </div>
                                            </div>     
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                          <label for="product_variant_ref_no">Variant Reference No:  <span class="mandatory_field">*<span></label>
                                            <input type="number" class="form-control"  style="padding:22px;" name="product_variant_ref_no" value="">
                                          </div>
                                        </div>
                                        <!-- start image -->
                                        <div class="col-sm-6 col-xs-6">
                                          <div class="form-group">
                                           <label for="product_add_form">Image:  <span class="mandatory_field">*<span> <small>Upto 4 images allowed.</small></label>
                                            <input id="fileupload_1" class="fileupload" type="file" data-name="1" name="pv_upload[1][m][]" multiple="multiple" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_1"></div>
                                            <div class="item clearfix">
                                              <div class="feed d-flex justify-content-between">
                                                <div class="dvPreview_1"></div>
                                              </div>
                                              <div class="feed d-flex justify-content-between">
                                                <div class="col-lg-12 dvPreview_sp_1">
                                                  <div class="col-lg-2 prw_crp_div input-group-prw_1">
                                                   <div class="prw_crp">
                                                    <img id="cropbox_1_1" class="cropbox"  width="100" height="100"  />
                                                    <canvas id="preview_1_1" class="preview" style="width:100px;height:100px;display:none;"></canvas>
                                                    <a class="crp_edit" id="crop_1_1" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>
                                                  </div>
                                                  <span data-type="1" data-type-value="1" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>
                                                </div>
                                                <div class="col-lg-2 prw_crp_div input-group-prw_2">
                                                 <div class="prw_crp">
                                                  <img id="cropbox_1_2" class="cropbox"  width="100" height="100"  />
                                                  <canvas id="preview_1_2" class="preview" style="width:100px;height:100px;display:none;"></canvas>
                                                  <a class="crp_edit" id="crop_1_2" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>
                                                </div>
                                                <span data-type="1" data-type-value="2" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>
                                              </div>
                                              <div class="col-lg-2 prw_crp_div input-group-prw_3">
                                               <div class="prw_crp">
                                                <img id="cropbox_1_3" class="cropbox"  width="100" height="100"  />
                                                <canvas id="preview_1_3" class="preview" style="width:100px;height:100px;display:none;"></canvas>
                                                <a class="crp_edit" id="crop_1_3" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>
                                              </div>
                                              <span data-type="1" data-type-value="3" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>
                                            </div>
                                            <div class="col-lg-2 prw_crp_div input-group-prw_4">
                                             <div class="prw_crp">
                                              <img id="cropbox_1_4" class="cropbox"  width="100" height="100"  />
                                              <canvas id="preview_1_4" class="preview" style="width:100px;height:100px;display:none;"></canvas>
                                              <a class="crp_edit" id="crop_1_4" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>
                                            </div>
                                            <span data-type="1" data-type-value="4" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>  
                                </div> 
                                <!-- end image -->

                                
                              </div>
                            </div>
                            <div class="item clearfix">
                              <div class="feed d-flex justify-content-between">

                                <div class="col-lg-6">
                                  {{-- <div class="form-group">
                                    <label for="product_add_form">Promo Image:  <span class="mandatory_field">*<span> <small>Upto 4 images split allowed.</small></label>
                                      <input id="fileupload_sp_1" class="fileupload_sp" type="file" data-name="1" name="promotional_image" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_sp'+pv_type+'"></div>
                                      <button id="fileupload_sp_button_1" class="fileupload_sp_button" data-type="1" type="button" style="margin-left: 15px;">Split</button><div class="error pv_upload_sp_1" style="float: left;"></div>
                                    </div> --}}
                                    <input type="hidden" id="fsvalue_1" name="fsvalue_1[]" />
                                    <div style="width:100%;margin:20px 0;float:left;display:flex;justify-content: center;">
                                      <div style="width:100px;height:100px;float:left;margin-right:10px;">
                                        <img id="display_1" style="object-fit:cover;width:100%" src="" />
                                        <input type="hidden" id="display_1_img_name" name="promo_image[]" value="0" /> 
                                      </div>
                                      <div style="width:100px;height:100px;float:left;margin-right:10px;">
                                        <img id="display_2" style="object-fit:cover;width:100%" src="" />
                                        <input type="hidden" id="display_2_img_name" value="0" name="promo_image[]"/>
                                      </div>
                                      <div style="width:100px;height:100px;float:left;margin-right:10px;">
                                        <img id="display_3" style="object-fit:cover;width:100%" src="" />
                                        <input type="hidden" id="display_3_img_name" value="0" name="promo_image[]" />
                                      </div>
                                      <div style="width:100px;height:100px;float:left;margin-right:10px;">
                                        <img id="display_4" style="object-fit:cover;width:100%" src="" />
                                        <input type="hidden" id="display_4_img_name" value="0" name="promo_image[]"/>
                                      </div>
                                    </div>
                                    <div class="preview_div" style="display: none;">
                                     <div id="preview1" name="pv_name_1">
                                       <img id="preview1_img" src=""/>
                                     </div>
                                     <input type="hidden" id="class_initialise" value="0" />  
                                     <input type="hidden" id="fsvalue_1" name="fsvalue_1[]" />
                                     <div id="preview2" name="pv_name_2"></div>
                                     <input type="hidden" id="fsvalue_2" name="fsvalue_2[]" />
                                     <div id="preview3" name="pv_name_3"></div>
                                     <input type="hidden" id="fsvalue_3" name="fsvalue_3[]" />
                                     <div id="preview4" name="pv_name_4"></div>
                                     <input type="hidden" id="fsvalue_4" name="fsvalue_4[]" />
                                   </div> 

                                 </div>  
                               </div>
                             </div>
                             <input type="hidden" id="x_1_1" name="x_1_1" />
                             <input type="hidden" id="y_1_1" name="y_1_1" />
                             <input type="hidden" id="w_1_1" name="w_1_1" />
                             <input type="hidden" id="h_1_1" name="h_1_1" />
                             <input type="hidden" id="x_1_2" name="x_1_2" />
                             <input type="hidden" id="y_1_2" name="y_1_2" />
                             <input type="hidden" id="w_1_2" name="w_1_2" />
                             <input type="hidden" id="h_1_2" name="h_1_2" />
                             <input type="hidden" id="x_1_3" name="x_1_3" />
                             <input type="hidden" id="y_1_3" name="y_1_3" />
                             <input type="hidden" id="w_1_3" name="w_1_3" />
                             <input type="hidden" id="h_1_3" name="h_1_3" />
                             <input type="hidden" id="x_1_4" name="x_1_4" />
                             <input type="hidden" id="y_1_4" name="y_1_4" />
                             <input type="hidden" id="w_1_4" name="w_1_4" />
                             <input type="hidden" id="h_1_4" name="h_1_4" />
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div style="overflow:auto;">
                  <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="submit_page(1)">Next</button>
                  </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:15px;">
                  <span class="step"></span>
                  <span class="step"></span>
                </div>
              </form>

              @endsection

              @section('footer_script')

              <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

              <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js" ></script>


              <script language="javascript" type="text/javascript">



    // $(".fileupload").on('change', function() {
      $(".form_final").on('change', '.fileupload', function(){ 
        var dvptype=$(this).attr("data-name"); 
        $(".append_class .dvPreview_sp_"+dvptype+" .prw_crp_div").hide();
        var dvPreview = $(".dvPreview_"+dvptype);
        dvPreview.html(""); 
        $(".append_class .pv_upload_"+dvptype).removeClass('valid_class').text('');
        if (parseInt($(this).get(0).files.length)>4) {
          $(this).val("");
          $(".append_class #fileupload_sp_"+dvptype).prop('disabled', false);
          // alert("You can only upload a maximum of 4 files");
          $(".append_class .pv_upload_"+dvptype).addClass('valid_class').text('You can only upload a maximum of 4 files');
          return false;
        } 
        // $(".append_class #fileupload_sp_"+dvptype).prop('disabled', true).val('');
        if (typeof (FileReader) != "undefined") {
          var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
          $($(this)[0].files).each(function () {
            var file = $(this);
            if (regex.test(file[0].name.toLowerCase())) {
              var reader = new FileReader();
              reader.onload = function (e) {
                var img = $("<img />");
                img.attr("style", "height:100px;width: 100px");
                img.attr("src", e.target.result);
                dvPreview.append(img);
              }
              reader.readAsDataURL(file[0]);
            } else {
              alert(file[0].name + " is not a valid image file.");
              dvPreview.html("");
              return false;
            }
          });
        } else {
          alert("This browser does not support HTML5 FileReader.");
        }
      });


      $(".form_final").on('change', '.fileupload_sp', function(){
        var dvptype=$(this).attr("data-name");
        
        $(".append_class #fsvalue_"+dvptype).val('');
        var dvPreview = $(".dvPreview_"+dvptype);
        dvPreview.html("");
        $(".append_class .pv_upload_"+dvptype).removeClass('valid_class').text('');
        if (typeof (FileReader) != "undefined") {
          var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
          $($(this)[0].files).each(function () {
            var file = $(this);
            if (regex.test(file[0].name.toLowerCase())) {
              var reader = new FileReader();
              reader.onload = function (e) {
                $(".append_class .dvPreview_sp_"+dvptype+" .cropbox").attr('src', e.target.result);
                $(".append_class .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_1").click();
                $("#demo").attr("src",e.target.result);
                $('#demo').Jcrop({
                  aspectRatio: 1,
                  onSelect: function(c){
                    coords = c;     
                  }
                });
              }
              reader.readAsDataURL(file[0]);
            } else {
              alert(file[0].name + " is not a valid image file.");
              dvPreview.html("");
              return false;
            }
          });
        } else {
          alert("This browser does not support HTML5 FileReader.");
        }
      });
      $(document).on('click', "#crp_save", function() {
   // alert();
        // make a copy of the image with the original dimensions
        var split_image_val1 = new Array();
        var split_image_val2 = new Array();
        var split_image_val3 = new Array();
        var split_image_val4 = new Array();

        var class_count = $("#class_initialise").val();
        if(class_count == 5)
        {
          alert("Only 4 images are allowed")
          return false;
        }

        var $target = $('#demo');
        //alert(class_count);
        console.log($target.css('width'));

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
          split_image_val1.push("625px");
          split_image_val1.push($target.css('height'));
          $("#fsvalue_1").val(split_image_val1);
          console.log(split_image_val1);
          $("#class_initialise").val(2)
          image_display(class_count,split_image_val1);
        }
        if(class_count == 2)
        {
          split_image_val2.push(Math.round(coords.x));
          split_image_val2.push(Math.round(coords.y));
          split_image_val2.push("625px");
          split_image_val2.push($target.css('height'));
          $("#fsvalue_2").val(split_image_val2);
          console.log(split_image_val2); 
          $("#class_initialise").val(3)  
          image_display(class_count,split_image_val2);
        }
        if(class_count == 3)
        {
          split_image_val3.push(Math.round(coords.x));
          split_image_val3.push(Math.round(coords.y));
          split_image_val3.push("625px");
          split_image_val3.push($target.css('height'));
          $("#fsvalue_3").val(split_image_val3);
          console.log(split_image_val3);   
          $("#class_initialise").val(4)
          image_display(class_count,split_image_val3);
        }
        if(class_count == 4)
        {
          split_image_val4.push(Math.round(coords.x));
          split_image_val4.push(Math.round(coords.y));
          split_image_val4.push("625px");
          split_image_val4.push($target.css('height'));
          $("#fsvalue_4").val(split_image_val4);
          console.log(split_image_val4); 
          $("#class_initialise").val(5)
          image_display(class_count,split_image_val4);
        }
        // set the dimensions of the preview container
        // $preview.css({
        //     position: 'relative',
        //     overflow: 'hidden',
        //     width: Math.round(coords.w) + 'px',
        //     height: Math.round(coords.h) + 'px'
        // });
        // // add+position image relative to its container 
        // $preview.html($img);
        // $preview.addClass("preview_class");

        //$("#promotional_image").val('');
      });
      function image_display(x,y)
      {

        // var filesSelected = document.getElementById("promotional_image").files[0];
        // console.log(filesSelected);
var form = document.forms.namedItem("product_add_form"); // high importance!, here you need change "yourformname" with the name of your form
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

                            if(data.count == 0)
                            {
                             $("#display_1").attr("src",data.img_src); 
                             $("#display_1_img_name").val(data.get_filename);
                           }
                           if(data.count == 2)
                           {
                             $("#display_2").attr("src",data.img_src); 
                             $("#display_2_img_name").val(data.get_filename);
                           }
                           if(data.count == 3)
                           {
                             $("#display_3").attr("src",data.img_src); 
                             $("#display_3_img_name").val(data.get_filename);
                           }
                           if(data.count == 4)
                           {
                             $("#display_4").attr("src",data.img_src);
                             $("#display_4_img_name").val(data.get_filename); 
                           }                          
                         }

                       });  

}
function updateCoords(c)
{
          // alert(c);

          // $('#crp_save').click(function(){
            $("#myModal").on('click', '#crp_save', function(){
            // console.log(c);
       // if(c!=""){
        // var xArr = [];
        // xArr.push($('#x').val());
        // xArr.push(c.x);

        var pid=$(".previewid").val();
        var pimg = $('#demo').attr('src');
          // alert(pid);
          // console.log("preview"+pid);
          var split =pid.split("_");
          var split_nxt = parseInt(split[1]) + 1;
          var dvp_split_nxt = split[0]+'_'+split_nxt;


          $(".dvPreview_sp_"+split[0]+" #cropbox_"+split[0]+"_"+split[1]).attr('src', pimg);
          $(".append_class .dvPreview_sp_"+split[0]+" .input-group-prw_"+split[1]).show();

          $('#x_'+pid).val(c.x);
          $('#y_'+pid).val(c.y);
          $('#w_'+pid).val(c.w);
          $('#h_'+pid).val(c.h);


          $('#src_'+pid).val(split[1]);
       // }
       //     else{
       //       $('#x').val(100);
       //     $('#y').val(100);
       //     $('#w').val(240);
       //     $('#h').val(240);
       //     }
       
          // console.log(c.w);
          
              // window.close();
              if(parseInt(c.w) > 0) {
              // Show image preview
              var imageObj = $("#cropbox_"+pid)[0];
              var canvas = $("#preview_"+pid)[0];
              var context = canvas.getContext("2d");

              context.drawImage(imageObj, c.x, c.y, c.w, c.h, 0, 0, canvas.width, canvas.height);
              $("#cropbox_"+pid).hide();
              $("#preview_"+pid).show();

              // iziToast.success({title: 'Success', message: 'Image splitted successfully..!!', position: 'topRight',  });

              $(".append_class .dvPreview_sp_"+split[0]+" #crop_"+split[0]+"_"+split_nxt).click();

            }
          });

          };

          function readdemoURL(input,id) {
        // console.log(input,id);


        if (input.files && input.files[0]) {
          // alert();
        // console.log("hi2");
            // $('#demo').attr('src'," ");
            var reader = new FileReader();

            reader.onload = function(e) {
            // console.log(e.target.result);
            // $('#demo').attr('src', e.target.result);
            // if(e.target.result!=" "){
            // var dva_value=id.split("_");spl[1]
            $('.modal-body').html('<input type="hidden" class="previewid" value="'+id+'"><img id="demo"  width="50" height="50" src="'+e.target.result+'" />');
            $('.modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><button type="button" class="btn btn-success" id="crp_save" data-dismiss="modal" value="save">Split</button>');
            $('#myModal').modal('show');
          //   }else{  
          //   console.log("test");
          // $('.modal-body').html('<input type="hidden" class="previewid" value="'+id+'"><img id="demo"  width="50" height="50" src="/projectAssets/cls_images.png" /><a id="squ_crop">Crop to sqaure</a>');
          //   }
          $('#demo').Jcrop({
            boxWidth: 650,   
            boxHeight: 400,
            // aspectRatio: 150/100,
            // setSelect: [0,0,150,100],
            aspectRatio: NaN,
            // setSelect:   [50, 0, 300,300],
            allowResize: false,
            bgFade: true, // use fade effect
            bgOpacity: .3, // fade opacity
            onSelect: updateCoords,
            // setSelect: [100, 100, 240, 240],
            // onChange: showPreview,
            // onChange : updatePreview,
            
          });


        }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }

      }

      $(".form_final").on( "click", ".crp_edit", function() {
        var id = $(this).attr("id");
              // console.log(id);

              var spl=id.split("_");
              
              $('#fileupload_sp_'+spl[1]).each(function(index, value){
                console.log(this.value);

                readdemoURL(this,spl[1]+'_'+spl[2])
              });
              

         // alert(spl);
             // $('#cropimgs').show();
             // $("#preview").hide();
           });
         </script>
         <script>

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function submit_page(n)
{

  var print_type_array_field = {};
  var print_type_array_price = {};
  var total = {};
  var count_data = $("#count_value").val();
  if(document.getElementById("nextBtn").innerHTML!="Submit")
  {

    if(count_data > 0)
    {
      for(i=1; i<= count_data; i++)
      {
        print_type_array_field[i-1]= $("#print_type_"+i).val();
        print_type_array_price[i-1] = $("#print_type_price_"+i).val();

        $.each(print_type_data, function (key, val) {  
          if($("#print_type_"+i).val() == val.id)
          {
            display_name = val.print_type_name;
            console.log(display_name);
          }
        }); 

        $(".print_type_checkbox_1").append('<input id="print_type_print_name'+i+'" type="hidden" class="validate_price" name="print_type_print_name[]"><input id="print_type_price_name'+i+'" type="hidden" class="validate_price" name="print_type_price_name[]"><input type="checkbox" checked=checked class="checkbox_class check_box_product" data-count="'+i+'" data-id="'+$("#print_type_price_"+i).val()+'" value="'+$("#print_type_"+i).val()+'" name="check_box_product"  id="check_box_'+i+'" /> ' + display_name + '<br />')
      }  
    }
    $(".print_type_checkbox_1").hide();

  }
  //alert(n);
  if(document.getElementById("nextBtn").innerHTML=="Submit")
  {
    $('#nextBtn').prop('disabled', true);
    document.getElementById("nextBtn").innerHTML="Processing";

    $('.check_box_product:checked').each(function () {
            //alert($(this).val());
           // alert($(this).data("id"));
           //alert($(this).data("count"));
           console.log($(this).data("id"));
           id = $(this).data("count");
           $("#print_type_price_name"+id).val($(this).data("id"));
           $("#print_type_print_name"+id).val($(this).val());
         });
    form_validation_check();
    return false;
  }  
  nextPrev(n)
}

function nextPrev(n) {
  var style=document.getElementById("sub_category_name_div").style.display;
  var product_name=$("#product_name").val();
  var category_name=$("#category_name_product_add").val();
  var supplier_name=$("#supplier_name_product_add").val();
  var product_description=$("#product_description").val();
  var product_width=$("#product_width").val();
  var product_height=$("#product_height").val();
// var checked_values = [];

// Loop through the checked checkboxes in the same group
// and add their values to an array
// $('.product-option input[type="checkbox"]:checked').each(function(){
//     checked_values.push($(this).val());
// });
// var total_checked_values = checked_values.length;
// $('#product_option_error').removeClass('valid_class').text('');

var valid=0;
// if(total_checked_values == 0)
// {
//   $('#product_option_error').addClass('valid_class');
//   $("#product_option_error").text('The product option field is required.');
//   valid=1;
// }
if(product_name=='')
{
  $('#product_name_error').addClass('valid_class');
  $("#product_name_error").text('The product name field is required.');
  valid=1;
}
if(product_name!='')
{
  $('#product_name_error').removeClass('valid_class');
  $("#product_name_error").text('');
  valid=0;
}
if(category_name==null)
{
  $('#category_id_error').addClass('valid_class');
  $("#category_id_error").text('The category field is required.');
  valid=1;
}
if(category_name!=null)
{
  $('#category_id_error').removeClass('valid_class');
  $("#category_id_error").text('');
  valid=0;
}
if(supplier_name==null)
{
  $('#supplier_id_error').addClass('valid_class');
  $("#supplier_id_error").text('The supplier field is required.');
  valid=1;
}
if(supplier_name!=null)
{
  $('#supplier_id_error').removeClass('valid_class');
  $("#supplier_id_error").text('');
  valid=0;
}
if(product_description=='')
{
  $('#product_description_error').addClass('valid_class');
  $("#product_description_error").text('The product description field is required.');
  valid=1;
}
if(product_description!='')
{
  if(product_description.length < 20){
    $('#product_description_error').addClass('valid_class');
    $("#product_description_error").text('The product description must contain 20 characters.');
    valid=1;
  }
  // else if(product_description.length > 60){
  //   $('#product_description_error').addClass('valid_class');
  //   $("#product_description_error").text('The product description must be in below 60 characters .');
  // valid=1;
  // }
  else{
    $('#product_description_error').removeClass('valid_class');
    $("#product_description_error").text('');
    valid=0;
  }
}

if(product_width=='')
{
  $('#dimension_error').addClass('valid_class');
  $("#dimension_error").text('The product dimension field is required.');
  valid=1;
}
if(product_width!='')
{
  $('#dimension_error').removeClass('valid_class');
  $("#dimension_error").text('');
  valid=0;
}

if(product_height=='')
{
  $('#dimension_error').addClass('valid_class');
  $("#dimension_error").text('The product dimension field is required.');
  valid=1;
}
if(product_height!='')
{
  $('#dimension_error').removeClass('valid_class');
  $("#dimension_error").text('');
  valid=0;
}

if(style!='none')
{
    //alert($("#sub_category_name_product_add").val());
    if($("#sub_category_name_product_add").val()==null)
    {
      $("#sub_category_id_error").text('The sub category id field is required.');
      return false;
    }
    else
    {
      $("#sub_category_id_error").text('');
    }

  }
  if($('.valid_class').length>0)
  {
    return false;
  }
// $('.form_final').html('');

$('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
 e.preventDefault();
       var max_fields_limit      = 8; //set limit for maximum input fields
       var x = 1; //initialize counter for text box
       if(x < max_fields_limit){ //check conditions
           x++; //counter increment
           $('.input_fields_container_part').append('<div><input type="text" name="tags"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
         }
       });  
   $('.input_fields_container_part').on("click",".remove_field", function(e){ //user click on remove text links
     e.preventDefault(); $(this).parent('div').remove(); x--;
   })

// console.log(checked_values.length);

  //alert(n);
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  if(currentTab<=1)
  {
    x[currentTab].style.display = "none";
  }
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    //document.getElementById("product_add_form").submit();
    form_validation_check();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  valid = true;
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function form_validation_check()
{
  var append_field_valid=0;
  
  var variant_length = $('.append_class .add_variant_section').length;
  for(i=1; i<=variant_length; i++)
  {
    if(($('#fileupload_'+i).val()=='')&&($('#fileupload_sp_'+i).val()==''))
    {
      append_field_valid=1;
      alert("Please select the image");
      $('#fileupload_'+i).focus(); 
      $('#fileupload_sp_'+i).focus(); 
    }
  }
  
  if(append_field_valid==1)
  {
    return false;
  }
  
  var data = document.getElementById("product_add_form");
  // $("#product_add_form").submit();

  $(".error").html('');
  // $("#loading_screen").show();
  var form_data=new FormData(data);
  url="{{ route('admin.productSave') }}";
  $.ajax({
    type: "POST",
    url: url,
    headers:  {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }, 
    processData: false,
    contentType: false,        
    data:form_data,     

    success: function (data) {
      if(data.status==false)
      {
                    //alert(JSON.stringify(data.status));
                    var errorString = '<ul>';
                    $.each(data.errors,function(k, v){
                         // alert(("#" + index + "_error"));
                          //$("#" + index + "_error").text(value[0]);
                          errorString += '<li>' + v + '</li>';
                          // console.log(k);
                          // $("."+k).html('tester'+v[0]);
                        });
                    errorString += '</ul>';
                    $("#form_validation_div").html('');
                    $("#form_validation_div").append(errorString);
                    $(window).scrollTop($('#form_validation_div').position().top);
                    document.getElementById("nextBtn").innerHTML="Submit";
                    $('#nextBtn').prop('disabled', false); 
                  }
                  else
                  {
                    iziToast.success({ title: 'Success', message: 'Product added successfully', position: 'topRight', });
                    document.location.href="{!! route('admin.product_list'); !!}";
                  }
                },
                error: function (data) {
                  document.getElementById("nextBtn").innerHTML="Submit";
                  $('#nextBtn').prop('disabled', false);
                  console.log('Error:', data);
                }
              });

}


function category_dropdown_change()
{
  category_name_product_add=$("#category_name_product_add").val();
  url="{{ route('admin.get_sub_category') }}";
  $.ajax({
    type: "get",
    url: url+'/'+category_name_product_add,
    data:{
      "_token": "{{ csrf_token() }}",
    },         
    success: function (data) {
      trainindIdArray = data.size_val;
      trainindIdArray = trainindIdArray.substring(1, trainindIdArray.length-1);
      trainindIdArray = trainindIdArray.split(',');
      trainindIdArray_val = trainindIdArray;
      console.log(trainindIdArray);
      for(i = 0; i< trainindIdArray_val.length; i++){
        val = trainindIdArray[i].replace(/\"/g, "")
        $(".dropdown_val_1").append($('<option></option>').val(val).html(val));
      }

      trainindIdArray2 = data.color_val;
      trainindIdArray2 = trainindIdArray2.substring(1, trainindIdArray2.length-1);
      trainindIdArray2 = trainindIdArray2.split(',');
      trainindIdArray_val2 = trainindIdArray2;
      console.log(trainindIdArray2);
      for(i = 0; i< trainindIdArray_val2.length; i++){
        val2 = trainindIdArray2[i].replace(/\"/g, "");
        var t = colourNameToHex(val2);
        $(".dropdown_val_2").append($('<option style="color:#000000;background-color:'+t+'"></option>').val(val2).html(val2+'-'+t));
      }


      var size_array_val = data.size_val;
      var color_array_val = data.color_val;
      if(data.category_name!='')
      {
        $("#sub_category_name_product_add").empty();
        $("#sub_category_name_div").show();
        $('select[name="sub_category_id"]').append('<option disabled selected="selected">Please select a sub category name</option>');
        $.each(data.category_name, function (key, val) {
          $('select[name="sub_category_id"]').append('<option value="'+ val.id +'">'+ val.category_name +'</option>');
                  //console.log(val.category_name);
                  var color_array_val = data.category_name[1]['color_val'];
                  var size_array_val = data.category_name[1]['size_val'];
                });  
      }
      else
      {
        $("#sub_category_name_product_add").empty();
        $("#sub_category_name_div").hide();
      }
    },
    error: function (data) {
      console.log('Error:', data);
    }
  });
}
function product_name_change()
{
  product_name=$("#product_name").val();
  if(product_name!='')
  {
    url="{{ route('admin.productNameCheck') }}";
    $.ajax({
      type: "get",
      url: url+'/'+product_name,
      data:{
        "_token": "{{ csrf_token() }}",
      },         
      success: function (data) {
        if(data.status==false)
        {
          $("#product_name").val('');
          $.each(data.errors, function (key, val) {
            $("#" + key + "_error").text(val[0]);
                        //$("#" + key + "_error").text('');
                      });
        }
        else{
          $("#product_name_error").text('');
        }
      },
      error: function (data) {
        console.log('Error:', data);
      }
    }); 
  }

}

// function add_element()
// {
//   var maxField = 3; 
//   var fieldHtml='<label for="product_add_form">Product Image:</label><br /><p><input  type="file" name="" ></p><label for="product_add_form">Product Color:</label><br /><p><input type="color" class="colpick" name="favcolor" value="#ff0000" style="width:10%;"></p> <label for="product_add_form">Product Size:</label><div class="d-flex"><div class="i-checks d-flex"><input id="checkboxCustom2" type="checkbox" value="" class="checkbox-template"><label for="checkboxCustom2" class="d-flex">Small <input type="text" class="form-control" value="0"/></label></div><div class="i-checks d-flex"><input id="checkboxCustom2" type="checkbox" value=""  class="checkbox-template"><label for="checkboxCustom2" class="d-flex">Medium <input type="text" class="form-control" value="0"/></label></div><div class="i-checks d-flex"><input id="checkboxCustom2" type="checkbox" value="" class="checkbox-template"><label for="checkboxCustom2" class="d-flex">Large <input type="text" class="form-control" value="0"/></label></div><button type="button" class="btn btn-danger" style="float:right" onclick="remove_element()">Remove</button>';
//   x=1;
//   alert(x);
//   if(x < maxField){ 
//     $(".append_class").append(fieldHtml);
//     x++;
//   }

// }


$(document).ready(function(){

  $("#dimension_add").change(function(){
    id = $("#dimension_add").val();
    if(id == 1)
    {
      x = 400;
      y = 200;
    }
    if(id == 2)
    {
      x = 600;
      y = 400;
    }
    if(id == 3)
    {
      x = 300;
      y = 500;
    }
    if(id == 4)
    {
      x = 500;
      y = 500;
    }
    $("#product_width").val(y);
    $("#product_height").val(x);
    //alert(x+" "+y);


  });

  window.print_type_data = {};
  window.print_type_data_instance = {};
  var count = 1;

  function print_type_data_get()
  {
   $.ajax({
    url:"{{ route('admin.print_type_get') }}",
    method:"GET",
    success:function(response){
            //alert(JSON.stringify(response.data));
            print_type_data = response.data;
            var z = 0;
            $.each(print_type_data, function (key, val) {  

              print_type_data_instance[z]= val.print_type_name;
              z++;
            });        

          }
        });
 }

 print_type_data_get();

 window.hide = function hide(sel)
 {
       // alert(sel);
       $("#print_type_"+sel).hide();
       $("#print_type_price_"+sel).hide();
       $("#close_"+sel).hide();
       $("#print_type_label_"+sel).hide();

     } 


     $("#add_print_type").click(function(){
      console.log(print_type_data_instance);
      $(".print_type_append").append('<div><label for="cars" id="print_type_label_'+count+'">Choose a Add-on Type:</label><select id="print_type_'+count+'" class="print_type_dropdown" ></select> <input id="print_type_price_'+count+'" type="number" class="validate_price"><a id="close_'+count+'"class="print_type_close_btn btn btn-danger"><i class="fa fa-times"  aria-hidden="true" onclick="hide('+count+')"></i></a></div>');

      $.each(print_type_data, function (key, val) {

        $('#print_type_'+count).append($('<option>', { 
          value: val.id,
          text : val.print_type_name,
        }));
      });
      $("#count_value").val(count);
      count++;
    });

     var trainindIdArray_val;
     var trainindIdArray_val2;
     $('.jquery_col_pick').each( function() {
      $(this).minicolors({
        control: $(this).attr('data-control') || 'hue',
        defaultValue: $(this).attr('data-defaultValue') || '',
        format: $(this).attr('data-format') || 'hex',
        keywords: $(this).attr('data-keywords') || '',
        inline: $(this).attr('data-inline') === 'true',
        letterCase: $(this).attr('data-letterCase') || 'lowercase',
        opacity: $(this).attr('data-opacity'),
        position: $(this).attr('data-position') || 'bottom',
        swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
        change: function(value, opacity) {
          if( !value ) return;
          if( opacity ) value += ', ' + opacity;
          if( typeof console === 'object' ) {
            console.log(value);
          }
        },
        theme: 'bootstrap'
      });

    });   

    //  $('.append_class').on('click','.remove_button',function(e){
    //    alert('jfkgvg');
    //   e.preventDefault();
    //   //$("#variant_item2").remove();
    //   var remove_id=$(this).val();

    //     $("#variant_item"+remove_id).remove();

    //   $("#append_field_count").val(x);


    //  });
    
      // $(document).ready( function() {
      //     $('.success').delay(1000).fadeOut();
      //     });
      //   function setUserId(id){
      //   $('#userId').val(id);
      //   }

      $(".image_upload").change(function(){
        image_valid($(this).attr("id"))
      });
      $('.append_class').on('change', '.image_upload', function(e){
        image_valid($(this).attr("id"))
      });


     //image validation in javascript

     function image_valid(element_id)
     {

      var formData = new FormData();

      var file = document.getElementById("imageupload_id1").files[0];

      formData.append("Filedata", file);
      var t = file.type.split('/').pop().toLowerCase();
      if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        $('#myModal1').modal();
        document.getElementById("imageupload_id1").value = '';
        return false;
      }
      if (file.size > 1024000) {
        $('#myModal2').modal();
        document.getElementById("imageupload_id1").value = '';
        return false;
      }
      return true;
    }



    $( ".numeric_only" ).keypress(function(e) {
      var key = e.keyCode;
      if (key != 46 && key > 31 
       && (key < 48 || key > 57))
      {
        e.preventDefault();
      }
    });  
    $( ".numeric_only" ).change(function(e) {
                  //alert();
                  if($(this).val()=='')
                  {
                    $(this).val('0');
                  }
                });            

    $('.append_class').on('keypress', '.numeric_only', function(e){
            //alert();
            var key = e.keyCode;
            if (key != 46 && key > 31 
             && (key < 48 || key > 57))
            {
              e.preventDefault();
            }     
          });       
    $('.append_class').on('change', '.numeric_only', function(e){
            //alert();
            if($(this).val()=='')
            {
              $(this).val('0');
            }
          }); 


    $('.jquery_col_pick ').change(function(e) {
      if($(this).val()=='')
      {
        $(this).val('#ff0000');
      }            
    });

    $('.append_class').on('change', '.jquery_col_pick', function(e){
      if($(this).val()=='')
      {
        $(this).val('#ff0000');
      }   
    });

    $(document).on('click', "#add_element_btn", function() {

      $('.jquery_col_pick').each( function() {
        $(this).minicolors({
          control: $(this).attr('data-control') || 'hue',
          defaultValue: $(this).attr('data-defaultValue') || '',
          format: $(this).attr('data-format') || 'hex',
          keywords: $(this).attr('data-keywords') || '',
          inline: $(this).attr('data-inline') === 'true',
          letterCase: $(this).attr('data-letterCase') || 'lowercase',
          opacity: $(this).attr('data-opacity'),
          position: $(this).attr('data-position') || 'bottom',
          swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
          change: function(value, opacity) {
            if( !value ) return;
            if( opacity ) value += ', ' + opacity;
            if( typeof console === 'object' ) {
              console.log(value);
            }
          },
          theme: 'bootstrap'
        });

      });
    });
  });

function removeFunction(_this)
{
  console.log(_this.value);
  var id = _this.value;
    // alert(id);
    
    $('#removeId').val(id);
    // console.log(id);
  }
  function removeForm()
  {


    var id1= $('#removeId').val();
    $('#variant_item'+id1).remove();
    
    $("#myModal").modal("hide");
    $(".modal-backdrop").remove();
    
  }

  function dvpRemove(v) {
    // alert(342);
    var data_type=$(v).attr("data-type");
    var dvptypevalue=$(v).attr("data-type-value");
    // $(".append_class #added_field_"+data_type+"_"+dvptypevalue).remove();
    $(".append_class #upload_"+data_type+"_"+dvptypevalue).val('');
    // $(".append_class .dvPreview_"+data_type+" .input-group-prw_"+dvptypevalue).remove();
    $(".append_class .dvPreview_"+data_type+" .input-group-prw_"+dvptypevalue).hide();
    $(".append_class .dvPreview_"+data_type+" .input-group-prw_"+dvptypevalue+" img").removeAttr("src");
    $(".append_class #upload_"+data_type+"_"+dvptypevalue).prop('disabled', false);
  }

  $('.append_class').on('click', '.fileupload_sp_button', function(e) {
    var dvptype=$(this).attr("data-type");
    $(".append_class .pv_upload_sp_"+dvptype).removeClass('valid_class').text('');
    if (! $('#fileupload_sp_'+dvptype).val()) {
      $(".append_class .pv_upload_sp_"+dvptype).addClass('valid_class').text('No files selected.');
      return false;
    }

    var crop1 = $('#x_'+dvptype+'_1').val();
    if(!crop1) {
      $(".append_class .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_1").click();
      return false;
    }

    var crop2 = $('#x_'+dvptype+'_2').val();
    if(!crop2) {
      $(".append_class .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_2").click();
      return false;
    }

    var crop3 = $('#x_'+dvptype+'_3').val();
    if(!crop3) {
      $(".append_class .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_3").click();
      return false;
    }

    var crop4 = $('#x_'+dvptype+'_4').val();
    if(!crop4) {
      $(".append_class .dvPreview_sp_"+dvptype+" #crop_"+dvptype+"_4").click();
      return false;
    }


  });
  function avsremove(v) {
    var data_value=$(v).attr("data-value");
    $(".form_final .avs_"+data_value).remove();
  }


  function addvariant_old(v, n) {
    var res = '';
    pv_type = v;
    res +=
    '<div class="row add_variant_section avs_'+v+'">'+
    '<div class="col-lg-12">'+
    '<div class="daily-feeds card">'+
    '<div class="card-header">'+
    '<h3 class="h4">Product variants</h3><span data-value="'+v+'" class="btn btn-danger" style="float: right;"onclick="avsremove(this);">Remove</span>'+
    '</div>'+
    '<div class="item clearfix">'+
    '<div class="feed d-flex justify-content-between">'+
    @foreach($product_options as $po)
    '<div class="col-lg-6">'+
    '<div class="form-group custom-txt-align product-option" style="border: 1px solid grey;padding: 10px;">'+
    '<label for="product_add_form">Attribute: <span style="text-transform: capitalize;font-weight: bold;">{{$po->name}}</span></label><br />'+
    '<div class="row">'+
    '<div class="col-lg-12">'+
    '<div class="form-group">'+
    '<select name="product_option_value_{{$po->id}}_1[]" id="pov{{$po->id}}" class="form-control 1 dropdown_val_{{$po->id}}">'+
    '</select>'+
    '</div>'+
    '</div>'+
    '</div>'+       
    '</div>'+
    '</div>'+
    @endforeach
    '</div>'+    
    '</div>'+  
    '</div>'+
    '</div>'+
    '</div>'+
    '</div>';

    $('.attribute_class').append(res);
  }

// });


// $('.form_final').append(res);

$('.append_class').on('click', '.add_variant_btn', function(e) {
  console.log(trainindIdArray_val2);
  e.preventDefault();
  var dvalue = $(this).attr("data-value");
  var count_data = $("#count_value").val();
  var numItems = $('.append_class .add_variant_section').length;
  var max_fields_limit      = 8; //set limit for maximum input fields
   if(numItems < max_fields_limit){ //check conditions
       dvalue++; //counter increment
       numItems++; //counter increment
       $('#add_variant_btn').attr('data-value', dvalue);
       addvariant(dvalue, numItems);
     }

     if(count_data > 0)
     {
      for(i=1; i<= count_data; i++)
      {
        //print_type_array_field[i-1]= $("#print_type_"+i).val();
        //print_type_array_price[i-1] = $("#print_type_price_"+i).val();
        //var display_name = print_type_data_instance.indexOf("bronze layer")
        //console.log(display_name);
        var display_name;

        $.each(print_type_data, function (key, val) {  
          if($("#print_type_"+i).val() == val.id)
          {
            display_name = val.print_type_name;
            console.log(display_name);
          }
        }); 

        $(".print_type_checkbox_"+dvalue).append('<input id="print_type_print_name'+dvalue+i+'" type="hidden" class="validate_price" name="variant_print_type_print_name_'+dvalue+'[]"><input id="print_type_price_name'+dvalue+i+'" type="hidden" class="validate_price" name="variant_print_type_price_name_'+dvalue+'[]"><input type="checkbox" class="checkbox_class" onChange="check_box_func($(this))" data-dvalue="'+dvalue+'" data-count="'+i+'" data-id="'+$("#print_type_price_"+i).val()+'" value="'+$("#print_type_"+i).val()+'" name="check_box_product" class="check_box_product" id="check_box_'+i+'" /> ' + display_name + '<br />')

      }  

    }
    $(".check_box_print_des").hide();

    for(i = 0; i< trainindIdArray_val2.length; i++){
      val2 = trainindIdArray2[i].replace(/\"/g, "")
                // $(".dropdown_val_2").append($('<option></option>').val(val2).html(val2));
                var t = colourNameToHex(val2);
                $(".dropdown_val_2").append($('<option style="color:#000000;background-color:'+t+'"></option>').val(val2).html(val2+'-'+t));
              }

              for(i = 0; i< trainindIdArray_val.length; i++){
                val = trainindIdArray[i].replace(/\"/g, "")
                $(".dropdown_val_1").append($('<option></option>').val(val).html(val));
              }                


            });
function check_box_func(elam_value)
{
  console.log(elam_value.val());
  console.log(elam_value.data("id"));
  console.log(elam_value.data("count"));
  console.log(elam_value.data("dvalue"));

  var dvalue = elam_value.data("dvalue");
  var count = elam_value.data("count");

  $("#print_type_price_name"+dvalue+count).val(elam_value.val());
  $("#print_type_print_name"+dvalue+count).val(elam_value.data("id"));
}
function addvariant(v, n) {
  var res = '';
  pv_type = v; 
  res +=
  '<input type="hidden" class="addvariant_count" value="'+v+'" name="addvariant_count" id="addvariant_count">'+ 
  '<div class="row add_variant_section avs_'+v+'">'+
  '<div class="col-lg-12">'+
  '<div class="daily-feeds card">'+
  '<div class="card-header">'+
  '<h3 class="h4">Product variants</h3><span data-value="'+v+'" class="btn btn-danger" style="float: right;"onclick="avsremove(this);">Remove</span>'+
  '</div>'+
  '<div class="item clearfix">'+
  '<div class="feed">'+ 
  '<div class="row">'+ 
  
  @foreach($product_options as $po)
  <?php
if ($po->id == 1)
{
    $size = $po->name;
}
else
{
    $color = $po->name;
}

?>
  @endforeach 
  '<div class="col-lg-6">'+
  '<div class="form-group custom-txt-align product-option" style="border: 1px solid grey;padding: 10px;">'+
  '<label for="product_add_form">Attribute : <span style="text-transform: capitalize;font-weight: bold;">{{$size}}</span></label><br />'+
  '<div class="row">'+
  '<div class="col-lg-12">'+

  '<div class="form-group">'+
  '<select name="product_option_size_value_2_'+v+'[]" id="povid'+v+'" style="padding:22px;" multiple class="form-control povids size_attr_multi size_attr" required>'+
  @foreach($options_varaints as $pov)
  @if($pov->product_option_id == '1')
  '<option value="{{$pov->name}}">{{$pov->name}}</option>'+
  @endif
  @endforeach
  '</select>'+
  '</div>'+
  '</div>'+
  '</div>'+   
  '</div>'+
  '</div>'+
  '<div class="col-lg-6">'+
  '<div class="form-group custom-txt-align product-option" style="border: 1px solid grey;padding: 10px;">'+
  '<label for="product_add_form">Attribute : <span style="text-transform: capitalize;font-weight: bold;">{{$color}}</span></label><br />'+
  '<div class="row">'+
  '<div class="col-lg-12">'+ 

  '<div class="form-group color_show">'+
  '<select name="product_color_option_value_2[]" id="pov2_'+v+'" onchange="addColorId('+v+')" class="form-control pov2 color_attr'+v+' ">'+ 
  @foreach($options_varaints as $pov)
  @if($pov->product_option_id == '2')
  '<option value="{{$pov->name}}">{{$pov->name}} @if($pov->color_code)- {{$pov->color_code}} @endif</option>'+
  @endif
  @endforeach
  '</select>'+
  '<input type="text" class="color_attr_multi color_valshow" value="" name="color_attr_multi" id="color_attr_multi'+v+'">'+

  '</div>'+
  '</div>'+
  '</div>'+     
  '</div>'+
  '</div>'+
  '</div>'+
  '</div>'+
  '</div>'+
  '<div class="row">'+ 
  
  '<div class="col-sm-6 col-xs-6">'+
  '<div class="form-group">'+
  '<label for="product_variant_ref_no">Variant Reference No:  <span class="mandatory_field">*<span></label>'+
  '<input type="number" class="form-control" style="padding:22px;" name="product_variant_ref_no_2_'+v+'[]" value="">'+
  '</div>'+
  '</div>'+

  '<div class="col-sm-6 col-xs-6">'+
  '<div class="form-group">'+
  '<label for="product_add_form">Image:  <span class="mandatory_field">*<span> <small>Upto 4 images allowed.</small></label>'+
  '<input id="fileupload_img_'+v+'" class="fileupload_add'+v+'" type="file" data-name="'+v+'" name="pv_upload_['+v+'][]" multiple="multiple" accept="image/x-png,image/jpg,image/jpeg"/ onChange="addMultipleImage('+v+')"><div class="error pv_upload_img_'+v+'"></div>'+
  '<div class="item clearfix">'+
  '<div class="feed d-flex justify-content-between">'+
  '<div class="add_multi_img dvPreview_add_vari_1_'+v+'"></div>'+
  '</div>'+
  '<div class="feed d-flex justify-content-between">'+
  '<div class="col-lg-12 dvPreview_sp_add_vari_1'+v+'">'+
  '<div class="col-lg-2 prw_crp_div input-group-prw_1">'+
  '<div class="prw_crp">'+
  '<img id="cropbox_1_1" class="cropbox"  width="100" height="100"  />'+
  '<canvas id="preview_1_1" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
  '<a class="crp_edit" id="crop_1_1" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
  '</div>'+
  '<span data-type="1" data-type-value="1" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
  '</div>'+
  '<div class="col-lg-2 prw_crp_div input-group-prw_2">'+
  '<div class="prw_crp">'+
  '<img id="cropbox_1_2" class="cropbox"  width="100" height="100"  />'+
  '<canvas id="preview_1_2" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
  '<a class="crp_edit" id="crop_1_2" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a></div>'+
  '<span data-type="1" data-type-value="2" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
  '</div>'+
  '<div class="col-lg-2 prw_crp_div input-group-prw_3">'+
  '<div class="prw_crp">'+
  '<img id="cropbox_1_3" class="cropbox"  width="100" height="100"  />'+
  '<canvas id="preview_1_3" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
  '<a class="crp_edit" id="crop_1_3" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
  '</div>'+
  '<span data-type="1" data-type-value="3" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
  '</div>'
  '<div class="col-lg-2 prw_crp_div input-group-prw_4">'+
  '<div class="prw_crp">'+
  '<img id="cropbox_1_4" class="cropbox"  width="100" height="100"  />'+
  '<canvas id="preview_1_4" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
  '<a class="crp_edit" id="crop_1_4" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
  '</div>'+
  '<span data-type="1" data-type-value="4" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
  '</div>'+
  '</div>'+
  '  </div>'+
  '</div>'+
  '</div>'+
  '<div class="col-sm-6 col-xs-6">'+
  '<div class="form-group">'+
  '<label for="product_variant_ref_no">Variant Reference No:  <span class="mandatory_field">*<span></label>'+
  '<input type="number" class="form-control" name="product_variant_ref_no_2_'+v+'[]" value="">'+
  '</div>'+
  '</div>'+

  '</div>'+ 
  '</div>'+  
  '</div>'+
  '</div>'+
  '</div>'+
  '</div>';

  $('.attribute_class').append(res);
  addVariantActive();
}


// $('.product_description_editor').jqte();
$(document).ready(function(){  

  var addvariant_count=$('#addvariant_count').val();
  console.log(addvariant_count+' count');

  $("#supplier_name_product_add").select2(); // static supplier multiple select

  $("#povid").select2(); // static size multiple select

  $(".povids").select2(); //add size multiple select

  $(".pov2 option").each(function()
  {
    var colorVal = $(this).val();
    var t = colourNameToHex(colorVal);
    $(this).css('background-color', t);
    $(this).html(colorVal+' - '+t); 
  }); 


  $('#pov2').on('change', function() { 
    var colorVal = $(this).val(); 
    var t = colourNameToHex(colorVal);    
    $('#color_valshow').css('background-color', t);
    $('#color_valshow').html(colorVal+' - '+t);  
  }); 

  $('#pov22').on('change', function() { 
    var colorVal = $(this).val();
    var color_Val = $( "#pov22 option:selected" ).text();
    var code = color_Val.split(" - ");
    var t = colourNameToHex(colorVal);   
    if(t==false){ 
      t=code[1];
    }
    $('#color_valshow').css('background-color', t);
    $('#color_valshow').html(colorVal+' - '+t);  
  }); 
  var def_color_val=$('.color_attr').val();  
  var t = colourNameToHex(def_color_val);
  $('#color_valshow').css('background-color', t);
  $('#color_valshow').html(colorVal+' - '+t); 

}); 

function addVariantActive() {
 $(".povids").select2();   
}

function addMultipleImage(count_no) {

      // $(".fileupload_add"+count_no).on('change', function(){ 
        var dvptype=$('#fileupload_img_'+count_no).attr("data-name"); 
        // var dvptype=count_no; 
        $(".append_class .dvPreview_sp_add_vari_"+dvptype+" .prw_crp_div").hide();
        var dvPreview = $(".dvPreview_add_vari_1_"+dvptype); 
        dvPreview.html(""); 
        $(".append_class .pv_upload_img_"+dvptype).removeClass('valid_class').text('');
        if (parseInt($('#fileupload_img_'+dvptype).get(0).files.length)>4) {
          $('#fileupload_img_'+count_no).val("");
          $(".append_class #fileupload_sp_"+dvptype).prop('disabled', false);
          // alert("You can only upload a maximum of 4 files");
          $(".append_class .pv_upload_img_"+dvptype).addClass('valid_class').text('You can only upload a maximum of 4 files');
          return false;
        } 
        // $(".append_class #fileupload_sp_"+dvptype).prop('disabled', true).val('');
        if (typeof (FileReader) != "undefined") {
          var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
          $($('#fileupload_img_'+count_no)[0].files).each(function () {
            var file = $(this);
            if (regex.test(file[0].name.toLowerCase())) {
              var reader = new FileReader();
              reader.onload = function (e) {
                var img = $("<img />");
                img.attr("style", "height:100px;width: 100px");
                img.attr("src", e.target.result);
                dvPreview.append(img);

              }
              reader.readAsDataURL(file[0]);
            } else {
              alert(file[0].name + " is not a valid image file.");
              dvPreview.html("");
              return false;
            }
          });
        } else {
          alert("This browser does not support HTML5 FileReader.");
        }
      // });
    }

function addColorId(count_no) { 
  // alert(23);
  var colorVal = $('#pov2_'+count_no).val(); 
  var color_Val = $( "#pov2_"+count_no+" option:selected" ).text();
  var code = color_Val.split(" - ");
  var t = colourNameToHex(colorVal);   
    // alert(color_Val);
    if(t==false){ 
      t=code[1];
    }
    $('#color_attr_multi'+count_no).css('background-color', t);
    $('#color_attr_multi'+count_no).html(colorVal+' - '+t);

  }

function colourNameToHex(colour)
{
  var colours = 

  {"aliceblue":"#f0f8ff","antiquewhite":"#faebd7","aqua":"#00ffff","aquamarine":"#7fffd4","azure":"#f0ffff",
  "beige":"#f5f5dc","bisque":"#ffe4c4","black":"#000000","blanchedalmond":"#ffebcd","blue":"#0000ff","blueviolet":"#8a2be2","brown":"#a52a2a","burlywood":"#deb887",
  "cadetblue":"#5f9ea0","chartreuse":"#7fff00","chocolate":"#d2691e","coral":"#ff7f50","cornflowerblue":"#6495ed","cornsilk":"#fff8dc","crimson":"#dc143c","cyan":"#00ffff",
  "darkblue":"#00008b","darkcyan":"#008b8b","darkgoldenrod":"#b8860b","darkgray":"#a9a9a9","darkgreen":"#006400","darkkhaki":"#bdb76b","darkmagenta":"#8b008b","darkolivegreen":"#556b2f",
  "darkorange":"#ff8c00","darkorchid":"#9932cc","darkred":"#8b0000","darksalmon":"#e9967a","darkseagreen":"#8fbc8f","darkslateblue":"#483d8b","darkslategray":"#2f4f4f","darkturquoise":"#00ced1",
  "darkviolet":"#9400d3","deeppink":"#ff1493","deepskyblue":"#00bfff","dimgray":"#696969","dodgerblue":"#1e90ff",
  "firebrick":"#b22222","floralwhite":"#fffaf0","forestgreen":"#228b22","fuchsia":"#ff00ff",
  "gainsboro":"#dcdcdc","ghostwhite":"#f8f8ff","gold":"#ffd700","goldenrod":"#daa520","gray":"#808080","green":"#008000","greenyellow":"#adff2f",
  "honeydew":"#f0fff0","hotpink":"#ff69b4",
  "indianred ":"#cd5c5c","indigo":"#4b0082","ivory":"#fffff0","khaki":"#f0e68c",
  "lavender":"#e6e6fa","lavenderblush":"#fff0f5","lawngreen":"#7cfc00","lemonchiffon":"#fffacd","lightblue":"#add8e6","lightcoral":"#f08080","lightcyan":"#e0ffff","lightgoldenrodyellow":"#fafad2",
  "lightgrey":"#d3d3d3","lightgreen":"#90ee90","lightpink":"#ffb6c1","lightsalmon":"#ffa07a","lightseagreen":"#20b2aa","lightskyblue":"#87cefa","lightslategray":"#778899","lightsteelblue":"#b0c4de",
  "lightyellow":"#ffffe0","lime":"#00ff00","limegreen":"#32cd32","linen":"#faf0e6",
  "magenta":"#ff00ff","maroon":"#800000","mediumaquamarine":"#66cdaa","mediumblue":"#0000cd","mediumorchid":"#ba55d3","mediumpurple":"#9370d8","mediumseagreen":"#3cb371","mediumslateblue":"#7b68ee",
  "mediumspringgreen":"#00fa9a","mediumturquoise":"#48d1cc","mediumvioletred":"#c71585","midnightblue":"#191970","mintcream":"#f5fffa","mistyrose":"#ffe4e1","moccasin":"#ffe4b5",
  "navajowhite":"#ffdead","navy":"#000080",
  "oldlace":"#fdf5e6","olive":"#808000","olivedrab":"#6b8e23","orange":"#ffa500","orangered":"#ff4500","orchid":"#da70d6",
  "palegoldenrod":"#eee8aa","palegreen":"#98fb98","paleturquoise":"#afeeee","palevioletred":"#d87093","papayawhip":"#ffefd5","peachpuff":"#ffdab9","peru":"#cd853f","pink":"#ffc0cb","plum":"#dda0dd","powderblue":"#b0e0e6","purple":"#800080",
  "rebeccapurple":"#663399","red":"#ff0000","rosybrown":"#bc8f8f","royalblue":"#4169e1",
  "saddlebrown":"#8b4513","salmon":"#fa8072","sandybrown":"#f4a460","seagreen":"#2e8b57","seashell":"#fff5ee","sienna":"#a0522d","silver":"#c0c0c0","skyblue":"#87ceeb","slateblue":"#6a5acd","slategray":"#708090","snow":"#fffafa","springgreen":"#00ff7f","steelblue":"#4682b4",
  "tan":"#d2b48c","teal":"#008080","thistle":"#d8bfd8","tomato":"#ff6347","turquoise":"#40e0d0",
  "violet":"#ee82ee",
  "wheat":"#f5deb3","white":"#ffffff","whitesmoke":"#f5f5f5",
  "yellow":"#ffff00","yellowgreen":"#9acd32"};

  if (typeof colours[colour.toLowerCase()] != 'undefined')
    return colours[colour.toLowerCase()];

  return false;
}

</script>


@endsection

@section('footer_script')
<!-- end of plugin scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-body">
    <input type="hidden" class="previewid" value="'+id+'"><img id="demo" src="" />
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="button" class="btn btn-success" id="crp_save" data-dismiss="modal" value="save">Save</button>
  </div>
</div>
</div>
</div>
@endsection
