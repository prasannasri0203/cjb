@extends('front.app')

@section('title', '')

@section('header_script')
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content') 

@php
$activeSidebar = 'Creation-Station';
@endphp
<style type="text/css">
    .modal-body
    {
        padding : 0px;
    }
</style>
    <section>
    <!-- <div class="overlay">
        <div class="loader"></div>
    </div> -->
    <div id="cover-spin"></div>
        <div class="dashboard-sec slidpad creabg">
            <div class="container">
                <div class="row">

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12">

                    @include('front.user-sidebar')

                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 nopadding">
                        <!--banner-->
                        <div class="banner">
                            <div class="item">
                                <img class="desk-banner" src="images/creation_banner_03.png" title="slidepicture" alt="slidepicture"> 
                                 <!-- <img class="mob-banner" src="images/creation_banner_04.png" title="slidepicture" alt="slidepicture"> -->
                                 <div class="caption station_caption"> 
                                    <h2 class="wlcr">Welcome to the Creation Station!</h2>
                                    <p>Follow your simple steps below to create your own unique Products!</p>
                                    <img class="mob-banner" src="images/mug.png" title="slidepicture" alt="slidepicture">
                                </div>
                            </div> 
                        </div>
                        <!--/.banner-->


                        <div class="createstation_tab">


                            <ul class="nav nav-tabs">
                                 <li> 
                                    <a data-toggle="tab" >Your Merchandise</a>
                                </li>
                                <li >
                                    <a data-toggle="tab" >Design and Customise</a>
                                </li> 
                                <li class="active">
                                    <a data-toggle="tab" href="#Products_wrap">Manage Your Products</a>
                                </li>

                            </ul>

                            <div id="tab_row_spacing" class="tab-content1">
                           
                                <div id="Products_wrap" class="mange_product_wr active">
                                    <div class="createstatn_cont product_content">
                                        <!-- <div class="cash_steps help_guides main_faq manageprod_faq"> -->
                                            <div class="row no-margin">

                                                <p class="title">Your Shop</p>
                                                <div class="help_guides_content faq_conent">
                                                    <p>Here you can view all your creations! The order they appear below MATCHES the order they will appear in
                                                        <span class="blu_clr">
                                                            <a href=""> Your Shop.</a>
                                                        </span> To change the order, just drag and drop the orange bars until you’re happy with them.
                                                    </p>
                                                </div>
                                                
                                                <div class="panel-group faq-accordion" id="accordion">
                                                    @php $init = 1; @endphp
                                               
                                                    @foreach($category_list as $key => $list)
                                                    
                                                        <div id="{{ $key }}" class="panel panel-default over_set">
                                                            <h3><a class="accord_ques">
                                                                <img src="images/six_dot.png" alt="" id="mover">
                                                                {{$key}}
                                                                <i class="fa fa-arrow-circle-down arrow_down"></i>
                                                            </a></h3>
                                                            <div>
                                                                <div class="panel-body">
                                                                    <div class="tshirt_sec">
                                                                        <div class="row">
                                                                    @foreach($list as $listkey => $listDetail)
                                                                   
                                                                            <div class="col-md-4 col-sm-6">
                                                                                <div class="tshirt_cart">
                                                                                    <img src="{{URL::to('/merchandise-img/' .$listDetail['image'])}}" data_id="{{ $key }}" class="img-responsive uploadimg">
                                                                                            
                                                                                               <?php $filePath = asset('merchandise-img').'/'.$listDetail['image']; $del_url = \URL::to('merchandise/product/delete').'/'.$listDetail['product_id']; ?>
                                                                                                
                                                                                          
                                                                                            <a href="{{$del_url}}" class="wishlisticon">
                                                                                                <span>
                                                                                                    <i class="fa fa-trash"></i>
                                                                                                </span>
                                                                                            </a>
                                                                                            
                                                                                    <div class="price_cart">
                                                                                        <div class="row">
                                                                                            <div class="col-xs-8">
                                                                                                <p> {{$listDetail['merchandise_product_name']}}</p>
                                                                                                <h4>{{ currency($listDetail['product_price'], 'GBP', session()->get('my_currency')) }}</h4>
                                                                                            </div>
                                                                                            <div class="col-xs-4 view_edit">
                                                                                                <!-- <a href="#"> -->
                                                                                                   <a href="{{ url('product_detail/'.$listDetail['product_id']) }}"> <i class="fa fa-eye"></i></a>
                                                                                                   <a data-toggle="modal" data-target="#editModal" data-id="{{ $listDetail['product_id'] }}" class="edit-marchan"><i class="fa fa-pencil-square-o"></i></a>
                                                                                                <!-- </a> -->
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                         @php $init++;  @endphp                                                 
                                                    @endforeach
                                                   
                                                </div>

                                            </div>




                                        <!-- </div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/.navtab-->
                        <!-- <button type="submit" class="btn btn-default savecrea1">SAVE AND CONTINUE <i class="fa fa-arrow-circle-right"></i></button> -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding " >
        <!-- <div class="add_popup ">
            <h6 data-toggle="modal" data-target="#editModal">{{ __('manage_merchandise_product.edit_product') }}<img src="images/add_popup.png"></h6>
        </div> -->
            <!-- Modal -->
            <div class="modal fade" id="editModal" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content edit_option">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body title_change">
                        <h5>{{ __('manage_merchandise_product.edit_product') }}</h5>
                        <div class="col-lg-12 col-md-12 col-sm-12 modal_fields">                            
                            
                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                <label>{{ __('manage_merchandise_product.categoryheader') }}: </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                <div class="form-group product_detail">
                                <select required class="form-control secsel" id="artist_category_id" name="artist_category_id">
                                    <!-- <option value="" data_id="0">Please Select Packing</option> -->
                                                                  
                                    @foreach($category_header as $value)    
                                        <option value="{{ $value->id }}" selected data_id="{{ $value->artist_category_id }}">{{ $value->category_name }}</option>                                                                                
                                    @endforeach
                                </select>
                                @error('category_name')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                <label>{{ __('manage_merchandise_product.product_name') }}: </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                <div class="form-group product_detail">
                                    <input type="text" class="form-control" name="merchandise_product_name" id="merchandise_product_name" value="">
                                    @error('merchandise_product_name')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                <label>{{ __('manage_merchandise_product.product_price') }}: </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                <div class="form-group product_detail">
                                    <input type="text" class="form-control"  name="product_price" id="product_price" value="">
                                    @error('product_price')
                                        <span class="help-block">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>  

                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                <label>{{ __('manage_merchandise_product.size') }}: </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                <div class="form-group product_detail">
                                    <input type="text" disable readonly class="form-control"  name="size" id="size" value="">
                                   
                                </div>
                            </div> 

                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                <label>{{ __('manage_merchandise_product.color') }}: </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                <div class="form-group product_detail">
                                    <input type="text" disable readonly class="form-control"  name="color" id="color" value="">
                                </div>
                            </div>   

                              
                            
                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                <label>{{ __('manage_merchandise_product.variant') }}: </label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                <div class="form-group product_detail">
                                <select required class="form-control secsel" id="product_variant_id" name="colors" multiple>
                                    <option value="" data_id="0">Please Select Packing</option>

                                </select>
                                @error('category_name')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            
                            
                        </div>
    <input type="hidden" value="" class="marchendise_header">
                          
                        <div class="btn_cards submit_data"><a href="javascript:void(0);" class="update_data">{{ __('manage_merchandise_product.save') }}</a></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
    
@section('footer_script')

    <script  src="https://code.jquery.com/ui/1.10.4/jquery-ui.js" integrity="sha256-tp8VZ4Y9dg702r7D6ynzSavKSwB9zjariSZ4Snurvmw=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
    var active = false,
        sorting = false;


    $('#accordion').accordion({
        collapsible: true,
        active: false,
        height: "fill",
        header: '> div > h3',
        activate: function( event, ui){
            if(sorting){

                $(this).sortable("refresh");   
                
            }
        }
    })
    .sortable({
        handle: "#mover",
        axis: "y",
        placeholder: "ui-state-highlight",
        start: function( event, ui ){
            console.log(event);
            $(this).removeAttr('style');
            sorting=true;
            active = $(this).accordion( "option", "active" ); 
            $(this).accordion( "option", "animate", { easing: 'swing', duration: 0 } );
            $(this).accordion({ active:false });          
            
        },
        stop: function(event, ui) {
            ui.item.children("h3").triggerHandler("focusout");
            $(this).accordion("option", "animate", {});
            $(this).accordion("option", "active", active);
            sorting = false;
            var productOrder = $(this).sortable('toArray');
            var myArrayNew = productOrder.filter(function (el) {
                return el != null && el != "";
            });

           var _token = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                url: "{{ url('/artist/sort/order') }}",
                data: {
                    category_order: myArrayNew,  _token : _token,
                },    
                beforeSend: function() {
                    $('#cover-spin').show();
                    // $('.loader').show();
                },  
                success: function (data) {
                      if(data.status){
                        $('#cover-spin').hide();
                        // $('.loader').hide();
                      }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
                console.log(myArrayNew);

      }
    
    });

    $('.accord_ques').on('click', function() {

        if ($('.arrow_down', this).hasClass('arrow_up')) {

            $('.arrow_down', this).removeClass('arrow_up');
        } else {
            $('.arrow_down').removeClass('arrow_up');

            $('.arrow_down', this).addClass('arrow_up');
        }
    });
</script>
<script>
	$(document).ready(function() {

            var _token = "{{ csrf_token() }}";

            $(document).on("click", ".edit-marchan",function(){
                var myProductId = $(this).data('id');
                $('.marchendise_header').val(myProductId)
                $.ajax({
                    type: "GET",
                    url: "{{ url('/merchandise/product/edit/') }}"+'/'+myProductId,        
                   
                    success: function (data) {
                    {   
                        if(data.status == 'success')
                            $('#merchandise_product_name').val(data.data['merchandise_product_name']);
                            $('#product_price').val(data.data['product_price']);
                            $('#artist_category_id').val(data.data['artist_category_id']);
                            $('#product_variant_id').html('');
                            options = '<option value="0">Please Select Variant</option>';
                            $.each(data.data['variant'], function (key, value) {
                                options += '<option value="' + key + '">'+value+'</option>';
                            });
                            $('#product_variant_id').html(options);
                            $.each(data.data['selected'], function (key, value) {
                                if(key == 'size'){
                                    $('#size').val(value);
                                } else{
                                    $('#color').val(value);
                                }
                                 
                            });
                            
                            
                            // alert('Product Details Updated successfully');
                            // window.location.reload();
                            
                        }
                        
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            });
            

            $('.update_data').click(function(e){
                e.preventDefault();              
                var myProductId =  $('.marchendise_header').val();  
                merchandise_product_name = $('#merchandise_product_name').val();
                product_price = $('#product_price').val();
                artist_category_id=$('#artist_category_id').val();
                product_variant_id=$('#product_variant_id').val();
                if(product_variant_id != 0 && artist_category_id !=0 && product_price !='' && merchandise_product_name !=''){
                    $.ajax({
                    type: "POST",
                    url: "{{ url('/merchandise/product/update') }}",        
                        data: {
                            id:myProductId,merchandise_product_name: merchandise_product_name, product_price:product_price,artist_category_id:artist_category_id, _token : _token,product_variant_id:product_variant_id
                            }, 
                        success: function (data) {
                            if(data.status == 'success')
                            {   
                                $("#editModal").modal("hide");
                                $('#editModal').find("input,textarea,select").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
                                // alert('Product Details Updated successfully');
                                // window.location.reload();
                                // this_button_icon.removeClass("fa fa-heart-o").addClass("fa fa-heart");
                                iziToast.success({ title: 'Success', message: 'Product Updated successfully', position: 'topRight', });
                                
                            }
                            
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                } else{
                    return 0;
                }
                
            });
    });
            </script>

    <style>
        #mover{cursor:move}
        /* .group { zoom: 1 } */
        /* #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
        #sortable li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 1.5em; }
        html>body #sortable li { height: 1.5em; line-height: 1.2em; }
        .ui-state-highlight { height: 1.5em; line-height: 1.2em; } */
        #cover-spin {
            position:fixed;
            width:100%;
            left:0;right:0;top:0;bottom:0;
            background-color: rgba(255,255,255,0.7);
            z-index:9999;
            display:none;
        }

@-webkit-keyframes spin {
	from {-webkit-transform:rotate(0deg);}
	to {-webkit-transform:rotate(360deg);}
}

@keyframes spin {
	from {transform:rotate(0deg);}
	to {transform:rotate(360deg);}
}

#cover-spin::after {
    content:'';
    display:block;
    position:absolute;
    left:48%;top:40%;
    width:40px;height:40px;
    border-style:solid;
    border-color:black;
    border-top-color:transparent;
    border-width: 4px;
    border-radius:50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
}
.over_set h3{
    margin-top: 5px;
}
/* div#Products_wrap, div#tab_row_spacing {
    width: 100%;
    float: left;
    overflow: hidden;
    position: relative;
}
.createstation_tab {
    width: 100%;
    float: left;
}
.faq-accordion 
{
    position: relative;
    overflow: hidden;
}*/
.panel-group.faq-accordion .panel-default a.accord_ques {
    background: #faa013;
} 
.edit_option{
    height:500px;
    width:500px;
}
.product_detail{
    width: 230px;
}
.title_change h5{
    font-weight: 800;
    text-align: center;
    font-size: 20px;
    padding-bottom: 10px;
}
.submit_data{
    text-align: center;    
    
}
.view_edit a:hover{
    background:none !important;
    flex-direction: column;
    align-items: flex-end !important;
   
}
.view_edit {
    display: flex;
}
    </style>
@endsection