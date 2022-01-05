@extends('portal.app')

@section('title', 'Dashboard | ')

@section('header_css')
  
  <!-- end of plugin styles -->
@endsection

@section('content')
          <!-- Page Header-->
          <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
</style>

<body>


<form id="product_add_form" class="form_class_validation" method="POST" enctype="multipart/form-data">
@csrf
<input type="hidden" name="status" value="0">  
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
    <div>
    <label for="product_add_form">Supplier:  <span class="mandatory_field">*<span></label>
    <select name="supplier_id" id="supplier_name_product_add" class="form-control">
    <option disabled selected value>Please select the supplier</option>
    @foreach($supplier_list as $list)
    <option value="{{ $list->id }}" {{ (old('supplier_id') == $list->id ? "selected":"") }}>{{ $list->name }}</option>
    @endforeach
    </select>  
    <div class="error" id="supplier_id_error"></div>        
    </div>
    <div class="form-group custom-txt-align">
    <label for="product_add_form">Product Description:  <span class="mandatory_field">*<span></label><br />
    <textarea rows = "5" cols = "50" id="product_description"  name="product_description" form="product_add_form">{{ old('product_description') }}</textarea>
    <div class="error" id="product_description_error"></div>        
    </div>
   
  </div>
  <div class="tab append_class" id="">
  <div class="append-form">
    <label for="product_add_form">Product Image:  <span class="mandatory_field">*<span></label>
    <button type="button" class="btn btn-success" style="float:right" id="add_element_btn">Add</button><input type="hidden" name="append_field_count" id="append_field_count" value="1">
    <p>
      <label class="frm-lbl">Upload</label>
      <input  type="file" id="imageupload_id1" class="image_upload" name="product_image[front_side]"  onchange="validateImage()">

      <div class="error" id="product_image_error1"></div> 

      <label class="frm-lbl">Upload</label>
      <input  type="file" class="" id="imageupload_id_back1" oninput="this.className = ''" name="product_image[back_side]"></p>
    <label for="product_add_form">Product Color:</label><br />
    <p><input type="text" class="jquery_col_pick" name="product_colour" id="product_colour" value="#ff0000" style="width:25%;"><br>
    <label for="product_add_form">Product Price</label>
    <input type="text" class="numeric_only" name="price" id="price_val1"  value="0" placeholder="Product Price"></p>
    <div class="error" id="price_error1"></div> 
    @if ($errors->has('product_image'))
          <div class="error">{{ $errors->first('price') }}</div>
    @endif
    <label for="product_add_form">Product Size:</label>
    <div class="d-flex">
                           <div class="i-checks d-flex">
                              <label for="checkboxCustom2" class="d-flex">S <input type="text" name="product_size[s]" maxlength="3" class="form-control numeric_only" value="0"/></label>
                            </div>

                            <div class="i-checks d-flex">
                              <label for="checkboxCustom2" class="d-flex">M <input type="text" name="product_size[m]" maxlength="3" class="form-control numeric_only" value="0"/></label>
                            </div>

                            <div class="i-checks d-flex">
                              <label for="checkboxCustom2" class="d-flex">L <input type="text" name="product_size[l]" maxlength="3" class="form-control numeric_only" value="0"/></label>
                            </div>

                            <div class="i-checks d-flex">
                              <label for="checkboxCustom2" class="d-flex">XL <input type="text" name="product_size[xl]" maxlength="3" class="form-control numeric_only" value="0"/></label>
                            </div>

                            <div class="i-checks d-flex">
                              <label for="checkboxCustom2" class="d-flex">XXL <input type="text" name="product_size[xxl]" maxlength="3" class="form-control numeric_only" value="0"/></label>
                            </div>
                       
                            @if ($errors->has('product_size'))
                                  <div class="error">{{ $errors->first('product_size') }}</div>
                            @endif                            
    </div>
     <div class="i-checks d-flex">
                              <label for="checkboxCustom2" class="d-flex">Width<input type="text" name="product_width"  class="product_width"/></label>
                            </div>
                            <div class="i-checks d-flex">
                              <label for="checkboxCustom2" class="d-flex">Height<input type="text" name="product_height"  class="product_height"/></label>
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

<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel" class="modal-title">Delete</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="">
									<div class="modal-body">
										Are You sure want to delete this?
										<input type="hidden" value="" id="removeId" name="removeId">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-success remove" onclick="removeForm()">Yes</button>
										<button type="button" id="id" class="btn btn-danger"   data-dismiss="modal">No</button>
									</div>
								</form>
							</div>
						</div>
					</div>

          
          <div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel1" class="modal-title">Product Image</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="">
									<div class="modal-body">
                    Please select a valid image file
										<input type="hidden" value="" id="imageValidation" name="imageValidation">
										@csrf
									</div>
									<div class="modal-footer">
										<button type="button" id="id2" class="btn btn-danger"   data-dismiss="modal">ok</button>
									</div>
								</form>
							</div>
						</div>
					</div>

          <div id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" class="modal fade text-left" style="display: none;" aria-hidden="true">
						<div role="document" class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel2" class="modal-title">Product Image</h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<form method="POST" action="">
									<div class="modal-body">
                    Max Upload size is 1MB only
										<input type="hidden" value="" id="imageValidation1" name="imageValidation1">
										@csrf
									</div>
									<div class="modal-footer">
									
										<button type="button" id="id3" class="btn btn-danger"   data-dismiss="modal">ok</button>
									</div>
								</form>
							</div>
						</div>
					</div>



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
  //alert(n);
  if(document.getElementById("nextBtn").innerHTML=="Submit")
  {
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
var valid=0;
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
  var product_append=$('.image_upload').length
  $("#product_add_form").find("input.image_upload[type=file]").each(function(index, field){
    //alert(index);

   const file = field.files[0];
   var x=index+1;
   //alert("#product_image_error"+x);
    if(file)
    {
      $("#product_image_error"+x).text('');
    }
   

});
    var price_val=$("#price_val1").val();
    if(price_val=='')
    {
      $("#price_error1").text('The product price for product field is required.');
    }
    else
    {
      $("#price_error1").text('');    
    }
  
  if(append_field_valid==1)
  {
      return false;
  }





  var data = document.getElementById("product_add_form");
  var form_data=new FormData(data);
  url="{{ route('admin.productSave') }}"
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
                    $.each(data.errors,function(index,value){
                         // alert(("#" + index + "_error"));
                          //$("#" + index + "_error").text(value[0]);
                          errorString += '<li>' + value + '</li>';
                    });
                    errorString += '</ul>';
                    $("#form_validation_div").html('');
                    $("#form_validation_div").append(errorString);
                    $(window).scrollTop($('#form_validation_div').position().top);

                  }
                  else
                  {
                    //alert(JSON.stringify(data.status));
                    document.location.href="{!! route('admin.product_list'); !!}";
                  }
              },
            error: function (data) {
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
              if(data.category_name!='')
              {
                $("#sub_category_name_product_add").empty();
                $("#sub_category_name_div").show();
                $('select[name="sub_category_id"]').append('<option disabled selected="selected">Please select a sub category name</option>');
                  $.each(data.category_name, function (key, val) {
                $('select[name="sub_category_id"]').append('<option value="'+ val.id +'">'+ val.category_name +'</option>');
                  //console.log(val.category_name);  
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
   
    var maxField = 6; 
    var x=1;
    $("#add_element_btn").click(function(){
    if(x < maxField){ 
      var d = x++;
      $("#append_field_count").val(x);
      $(".append_class").append('<div class="append-form" id=variant_item'+x+'><h1 for="product_add_form">Product Variant '+parseInt(d)+':</h1><br><label for="product_add_form">Product Image:</label><br /><p><input  type="file" name="product_image_variant'+x+'[front_side]" class="image_upload" id="imageupload_id'+x+'"><input  type="file" name="product_image_variant'+x+'[back_side]" class="" id="imageupload_id_back'+x+'"></p><div class="error" id="product_image_error'+x+'"></div><label for="product_add_form">Product Color:</label><br /><p><input type="text" class="jquery_col_pick" name="favcolor'+x+'" value="#ff0000" style="width:25%;"><input type="text" class="numeric_only" id="price_val'+x+'" name="variant_price'+x+'" placeholder="Addition price" value="0"></p> <div class="error" id="price_error'+x+'"></div><label for="product_add_form">Product Size:</label><div class="d-flex"><div class="i-checks d-flex"><label for="checkboxCustom2" class="d-flex">S <input type="text" class="form-control numeric_only" maxlength="3" name="product_variant_size'+x+'[s]" value="0"/></label></div><div class="i-checks d-flex"><label for="checkboxCustom2" class="d-flex">M <input type="text" class="form-control numeric_only" maxlength="3"  value="0" name="product_variant_size'+x+'[m]"/></label></div><div class="i-checks d-flex"><label for="checkboxCustom2" class="d-flex">L <input type="text" class="form-control numeric_only" name="product_variant_size'+x+'[l]" maxlength="3" value="0"/></label></div><div class="i-checks d-flex"><label for="checkboxCustom2" class="d-flex">XL <input type="text" name="product_variant_size'+x+'[xl]" class="form-control numeric_only" maxlength="3"  value="0"/></label></div><div class="i-checks d-flex"><label for="checkboxCustom2" class="d-flex">XXL <input type="text" name="product_variant_size'+x+'[xxl]" class="form-control numeric_only" maxlength="3"  value="0"/></label></div><button value='+x+' type="button" class="btn btn-success remove_button" data-toggle="modal" data-target="#myModal" onclick="removeFunction(this)"  style="float:right">Remove</button><br></div>');
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
    else{
      alert("Can't add more products")
    }

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



</script>

</body>
@endsection

@section('footer_script')
  <!-- end of plugin scripts -->
@endsection