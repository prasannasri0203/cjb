@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
          <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.min.css" rel="stylesheet">
<style>
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

</style>

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
      <input type="text" class="form-control" name="product_name" onchange="product_name_change()" id="product_name" value="{{ old('product_name') }}">  
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
    <div class="form-group">
      <label for="product_add_form">Supplier:  <span class="mandatory_field">*<span></label>
      <select name="supplier_id" id="supplier_name_product_add" class="form-control">
        <option disabled selected value>Please select the supplier</option>
        @foreach($supplier_list as $list)
        <option value="{{ $list->id }}" {{ (old('supplier_id') == $list->id ? "selected":"") }}>{{ $list->name }}</option>
        @endforeach
      </select>
      <div class="error" id="supplier_id_error"></div>
    </div>
    <div class="form-group">
      <label for="product_add_form">Shipping Cost:  <span class="mandatory_field">*<span></label>
      <input type="text" class="form-control" name="shipping_cost" id="shipping_cost" value="{{ old('shipping_cost') }}">  
      <div class="error" id="shipping_cost_error"></div>
    </div> 
    <div class="form-group custom-txt-align">
      <label for="product_add_form">Product Description:  <span class="mandatory_field">*<span></label><br />
      <textarea rows = "5" cols = "50" id="product_description"  name="product_description" form="product_add_form">{{ old('product_description', 'This is a test product description') }}</textarea>
      <div class="error" id="product_description_error"></div>
    </div>
      <div class="form-group">
      <label for="product_add_form">Fixed Dimension:  <span class="mandatory_field">*<span></label>
      <select name="" id="dimension_add" class="form-control">
        <option disabled selected value>Please select the dimension</option>
      	<option value="1">Rectangle </option>
      	<option value="2">Horizontal</option>
      	<option value="3">Vertical</option>
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
  <button type="button" id="add_print_type" class="btn btn-success">Add Print Type</button>
  <div class="print_type_append"></div>
  
 </div>
  </div>
  <div class="tab append_class" id="">
    <div class="append-form form_final">
      <div class="row add_variant_section">
        <div class="col-lg-12">
            <div class="daily-feeds card">
                <div class="card-header">
                    <h3 class="h4">Product Variant 1</h3><span id="add_variant_btn" data-value="1" class="btn btn-primary add_variant_btn" style="float: right;">Add</span>
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
<!--                         <label for="">Print Type</label><br> -->
                        <div class="print_type_checkbox_1 check_box_print_des"></div>
                    </div>
                    <div class="item clearfix">
                        <div class="feed d-flex justify-content-between">
                          @foreach($product_options as $po)
                          <div class="col-lg-6">
                            <div class="form-group custom-txt-align product-option" style="border: 1px solid grey;padding: 10px;">
                                <label for="product_add_form">Attribute: <span style="text-transform: capitalize;font-weight: bold;">{{$po->name}}</span></label><br />
                                <div class="row">
                                  <div class="col-lg-12">

                                    <div class="form-group">
                                      <select name="product_option_value_{{$po->id}}_1[]" id="pov{{$po->id}}" class="form-control dropdown_val_{{$po->id}}">
<!--                                   @foreach($options_varaints as $pov)
                                  @if($pov->product_option_id == $po->id)
                                        <option value="{{$pov->name}}">{{$pov->name}}</option>
                                  @endif
                                  @endforeach -->
                                      </select>
                                    </div>
                                  </div>
                                </div>     
                              </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="item clearfix">
                        <div class="feed d-flex justify-content-between">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="product_add_form">Image:  <span class="mandatory_field">*<span> <small>Upto 4 images allowed.</small></label>
                                    <input id="fileupload_1" class="fileupload" type="file" data-name="1" name="pv_upload[1][m][]" multiple="multiple" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_1"></div>
                                </div>
                            </div><?php /*
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="product_add_form">Split Image:  <span class="mandatory_field">*<span> <small>Upto 4 images split allowed.</small></label>
                                    <input id="fileupload_sp_1" class="fileupload_sp" type="file" data-name="1" name="pv_upload[1][s][]" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_sp'+pv_type+'"></div>
                                    <button id="fileupload_sp_button_1" class="fileupload_sp_button" data-type="1" type="button">Split</button><div class="error pv_upload_sp_1" style="float: left;"></div>
                                </div>
                                <input type="hidden" id="fsvalue_1" name="fsvalue_1[]" />
                            </div> */ ?>
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
        $(".append_class #fileupload_sp_"+dvptype).prop('disabled', true).val('');
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
        console.log(dvptype);
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

     function updateCoords(c)
        {
          // alert();
            
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
  else if(product_description.length > 60){
    $('#product_description_error').addClass('valid_class');
    $("#product_description_error").text('The product description must be in below 60 characters .');
  valid=1;
  }
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
  $("#loading_screen").show();
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
                    // alert(JSON.stringify(data.status));
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
                val2 = trainindIdArray2[i].replace(/\"/g, "")
                $(".dropdown_val_2").append($('<option></option>').val(val2).html(val2));
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
         	x = 24;
         	y = 18;
         }
		 if(id == 2)
         {
         	x = 30;
         	y = 24;
         }
		 if(id == 3)
         {
         	x = 18;
         	y = 12;
         }
		 if(id == 4)
         {
         	x = 15;
         	y = 16;
         }
		$("#product_width").val(y);
		$("#product_height").val(x);


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
$(".print_type_append").append('<div><label for="cars" id="print_type_label_'+count+'">Choose a Print Type:</label><select id="print_type_'+count+'" class="print_type_dropdown" ></select> <input id="print_type_price_'+count+'" type="number" class="validate_price"><a id="close_'+count+'"class="print_type_close_btn btn btn-danger"><i class="fa fa-times"  aria-hidden="true" onclick="hide('+count+')"></i></a></div>');

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


function addvariant(v, n) {
    var res = '';
    pv_type = v;
    res +=
    '<div class="row add_variant_section avs_'+v+'">'+
        '<div class="col-lg-12">'+
            '<div class="daily-feeds card">'+
                '<div class="card-header">'+
                    '<h3 class="h4">Product variant '+n+'</h3><span data-value="'+v+'" class="btn btn-danger" style="float: right;"onclick="avsremove(this);">Remove</span>'+
                '</div>'+
                '<div class="card-body no-padding">'+
                    '<!-- Item-->'+
                    '<div class="item">'+
                        '<div class="feed d-flex justify-content-between"><div class="error" id="form_error2"></div>'+
                            '<div class="col-lg-4">'+
                                '<div class="form-group">'+
                                    '<label for="product_add_form">Name:  <span class="mandatory_field">*<span></label>'+
                                    '<input type="text" class="form-control" name="pv_name['+pv_type+']" value=""> '+
                                '</div>'+
                            '</div>'+
                            '<div class="col-lg-4">'+
                                '<div class="form-group">'+
                                    '<label for="product_add_form">Price:  <span class="mandatory_field">*<span></label>'+
                                    '<input type="text" class="form-control" name="pv_price['+pv_type+']" value=""> '+
                                '</div>'+
                            '</div>'+
                            '<div class="col-lg-4">'+
                                '<div class="form-group">'+
                                    '<label for="product_add_form">Quantity:  <span class="mandatory_field">*<span></label>'+
                                    '<input type="text" class="form-control" name="pv_quantity['+pv_type+']" value="">'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
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
                    '<div class="item clearfix" style="display: inline-block;">'+
                      '<label for="">Print Type</label><br>'+
                        '<div class="print_type_checkbox_'+pv_type+' check_box_print_des"></div>'+
                    '</div>'+    
                    '<div class="item clearfix">'+
                        '<div class="feed d-flex justify-content-between">'+
                            '<div class="col-lg-6">'+
                                '<div class="form-group">'+
                                    '<label for="product_add_form">Image:  <span class="mandatory_field">*<span> <small>Upto 4 images allowed.</small></label>'+
                                    '<input id="fileupload_'+pv_type+'" class="fileupload" type="file" data-name="'+pv_type+'" name="pv_upload['+pv_type+'][m][]" multiple="multiple" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_'+pv_type+'"></div>'+
                                '</div>'+
                            '</div>'+<?php /*
                            '<div class="col-lg-6">'+
                                '<div class="form-group">'+
                                    '<label for="product_add_form">Split Image:  <span class="mandatory_field">*<span> <small>Upto 4 images split allowed.</small></label>'+
                                    '<input id="fileupload_sp_'+pv_type+'" class="fileupload_sp" type="file" data-name="'+pv_type+'" name="pv_upload['+pv_type+'][s][]" accept="image/x-png,image/jpg,image/jpeg"/><div class="error pv_upload_sp'+pv_type+'"></div>'+
                                    '<button id="fileupload_sp_button_'+pv_type+'" class="fileupload_sp_button" data-type="'+pv_type+'" type="button">Split</button><div class="error pv_upload_sp_'+pv_type+'" style="float: left;"></div>'+
                                '</div>'+
                                '<input type="hidden" id="fsvalue_'+pv_type+'" name="fsvalue_'+pv_type+'[]" />'+
                            '</div>'+ */ ?>
                        '</div>'+
                    '</div>'+
                    '<input type="hidden" id="x_'+pv_type+'_1" name="x_'+pv_type+'_1" />'+
                    '<input type="hidden" id="y_'+pv_type+'_1" name="y_'+pv_type+'_1" />'+
                    '<input type="hidden" id="w_'+pv_type+'_1" name="w_'+pv_type+'_1" />'+
                    '<input type="hidden" id="h_'+pv_type+'_1" name="h_'+pv_type+'_1" />'+
                    '<input type="hidden" id="x_'+pv_type+'_2" name="x_'+pv_type+'_2" />'+
                    '<input type="hidden" id="y_'+pv_type+'_2" name="y_'+pv_type+'_2" />'+
                    '<input type="hidden" id="w_'+pv_type+'_2" name="w_'+pv_type+'_2" />'+
                    '<input type="hidden" id="h_'+pv_type+'_2" name="h_'+pv_type+'_2" />'+
                    '<input type="hidden" id="x_'+pv_type+'_3" name="x_'+pv_type+'_3" />'+
                    '<input type="hidden" id="y_'+pv_type+'_3" name="y_'+pv_type+'_3" />'+
                    '<input type="hidden" id="w_'+pv_type+'_3" name="w_'+pv_type+'_3" />'+
                    '<input type="hidden" id="h_'+pv_type+'_3" name="h_'+pv_type+'_3" />'+
                    '<input type="hidden" id="x_'+pv_type+'_4" name="x_'+pv_type+'_4" />'+
                    '<input type="hidden" id="y_'+pv_type+'_4" name="y_'+pv_type+'_4" />'+
                    '<input type="hidden" id="w_'+pv_type+'_4" name="w_'+pv_type+'_4" />'+
                    '<input type="hidden" id="h_'+pv_type+'_4" name="h_'+pv_type+'_4" />'+
                    '<div class="item clearfix">'+
                        '<div class="feed d-flex justify-content-between">'+
                            '<div class="dvPreview_'+pv_type+'"></div>'+
                        '</div>'+
                        '<div class="feed d-flex justify-content-between">'+
                            '<div class="col-lg-12 dvPreview_sp_'+pv_type+'">'+
                                '<div class="col-lg-2 prw_crp_div input-group-prw_1">'+
                                   '<div class="prw_crp">'+
                                      '<img id="cropbox_'+pv_type+'_1" class="cropbox"  width="100" height="100"  />'+
                                      '<canvas id="preview_'+pv_type+'_1" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
                                      '<a class="crp_edit" id="crop_'+pv_type+'_1" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
                                   '</div>'+
                                   '<span data-type="'+pv_type+'" data-type-value="1" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
                                '</div>'+
                                '<div class="col-lg-2 prw_crp_div input-group-prw_2">'+
                                   '<div class="prw_crp">'+
                                      '<img id="cropbox_'+pv_type+'_2" class="cropbox"  width="100" height="100"  />'+
                                      '<canvas id="preview_'+pv_type+'_2" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
                                      '<a class="crp_edit" id="crop_'+pv_type+'_2" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
                                   '</div>'+
                                   '<span data-type="'+pv_type+'" data-type-value="2" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
                                '</div>'+
                                '<div class="col-lg-2 prw_crp_div input-group-prw_3">'+
                                   '<div class="prw_crp">'+
                                      '<img id="cropbox_'+pv_type+'_3" class="cropbox"  width="100" height="100"  />'+
                                      '<canvas id="preview_'+pv_type+'_3" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
                                      '<a class="crp_edit" id="crop_'+pv_type+'_3" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
                                   '</div>'+
                                   '<span data-type="'+pv_type+'" data-type-value="3" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
                                '</div>'+
                                '<div class="col-lg-2 prw_crp_div input-group-prw_4">'+
                                   '<div class="prw_crp">'+
                                      '<img id="cropbox_'+pv_type+'_4" class="cropbox"  width="100" height="100"  />'+
                                      '<canvas id="preview_'+pv_type+'_4" class="preview" style="width:100px;height:100px;display:none;"></canvas>'+
                                      '<a class="crp_edit" id="crop_'+pv_type+'_4" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">&nbsp;</a>'+
                                   '</div>'+
                                   '<span data-type="'+pv_type+'" data-type-value="4" class="crop_del remove_this" onclick="dvpRemove(this);"><i class="fa fa-times-circle"></i></span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>';

    $('.form_final').append(res);
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
                $(".dropdown_val_2").append($('<option></option>').val(val2).html(val2));
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
</script>

@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.min.js"></script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
            <input type="hidden" class="previewid" value="'+id+'"><img id="demo"  width="50" height="50" src="{{ asset('images/cls_images.png') }}" />
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success" id="crp_save" data-dismiss="modal" value="save">Save</button>
         </div>
      </div>
   </div>
</div>
@endsection