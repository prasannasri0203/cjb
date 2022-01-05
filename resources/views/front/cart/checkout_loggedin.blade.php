<?php 
$session = session()->all(); 

if(isset($session['theme_style']) && $session['theme_style'] !=''){
   
   $clr = $session['theme_style']; 

}else{

    $clr = '#ed1277';
}
?>
@extends('front.app')

@section('title', 'Checkout')

@section('header_script')
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')  
<style type="text/css">
    @media only screen and (max-width: 479px) and (min-width: 320px){
body .container_default_custom .modal-content {
    width: 100% !important;
    margin: 0 !important;
    min-width: auto !important;
    height: 400px;
    overflow-y: scroll;
}
.container_default_custom .modal-dialog {
    width: 86% !important;
    }
}
.container_default_custom .modal-content .modal-body label {
     font-size: 12px !important;
}
.validation-err{
    border: 1px solid red;
    }
.man_star{
    color: red;
}
.btn_cards a {
    background: <?php echo $clr; ?> none repeat scroll 0 0;
    border-radius: 50px;
    color: #fff;
    float: none;
    font-family: "Rubik-Bold";
    font-size: 16px;
    margin: 0 auto;
    padding: 10px 26px;
    text-decoration: none;
    text-transform: uppercase;
    cursor: pointer;
}
.form-group.delivery_details ul li.current {
    border: 1px solid <?php echo @$session['theme_style'] ?>;
}
</style>
    <div class="banner wishbanner">
        <div class="container-fluid" id="headcarousel_container" style="padding: 0;">
            <div id="headcarouselid" class="carousel slide" data-ride="carousel">
                <!-- indicators -->
                <ul class="carousel-indicators">
                    <li class="" data-target="#headcarouselid" data-slide-to="0"></li>
                    <li class="" data-target="#headcarouselid" data-slide-to="1"></li>
                    <li class="active" data-target="#headcarouselid" data-slide-to="2"></li>
                    <li class="" data-target="#headcarouselid" data-slide-to="3"></li>
                </ul>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item">
                        <img src="images/checkout.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/checkout.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>{{ __('cart.Checkout') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/checkout.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/checkout.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>{{ __('cart.Checkout') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="item active">
                        <img src="images/checkout.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/checkout.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>{{ __('cart.Checkout') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/checkout.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/checkout.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption ">
                                <p>{{ __('cart.Checkout') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---checkout_loggedin--->
    <section id="checkout_guest" class="container_default_custom checkout_wrapper checkout_login_in">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 no-padding">
            <h3>{{ __('cart.Delivery Details') }}</h3>
        </div>
        <div class="header_content_details">
            <div class="header_cont lt_table">
            <form class="form-horizontal" action="{{ url('checkout_customer') }}" method="POST" id="checkout_form">
            @csrf
                <div class="custom_container">
                    <div class="col-lg-3 col-md-3 col-sm-3  col-xs-5 no-padding label_wt">
                        <label>{{ __('cart.First Name') }}:</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9  col-xs-7  no-padding">
                        <div class="form-group">
                            <h5>{{ $customerDetails->first_name}}</h5>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5  no-padding label_wt">
                        <label>{{ __('cart.Last Name') }}:</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9  col-xs-7   no-padding">
                        <div class="form-group">
                            <h5>{{ $customerDetails->last_name}}</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5  no-padding label_wt">
                        <label>{{ __('cart.Email') }}:</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9   col-xs-7   no-padding">
                        <div class="form-group">
                            <h5>{{ $customerDetails->email }}</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5  no-padding label_wt">
                        <label>{{ __('cart.Delivery To') }}:</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9  col-xs-12  no-padding">
                        <div class="form-group delivery_details">
                            <ul>
                            @foreach($customerAddress as $value)
                                <li class="current">
                                    <div class="radio">
                                        <label><input type="radio" class="address_radio" value="{{ $value->id }}" id="billing_address" name="billing_address" @if($value->is_primary) checked @endif>
                                        <p>  
                                              <b class="checkout_list">{{ $value->delivery_name }},</b>
                                               <small>{{ $value->no }},</small>
                                              <small>{{ $value->street_1 }},</small>
                                                <small>{{ $value->street_2 }},</small>
                                                    <small> {{ $value->region }}, </small>
                                                    <small> {{ $value->country }},</small>
                                                        <small> {{ $value->zipcode }},</small>
                                                            <small>{{ $value->contact_no }}</small></p>
                                        </label>
                                    </div>
                                </li>
                            @endforeach    
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 no-padding">

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding">
                        <div class="add_popup ">
                            <h6 data-toggle="modal" data-target="#myModal">{{ __('cart.Add New Address') }}<img src="images/add_popup.png"></h6>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>{{ __('cart.Add a new Address') }}</h5>
                                        <div class="col-lg-12 col-md-12 col-sm-12 modal_fields">
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('Delivery Name') }}: <span class="man_star">*</span></label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="delivery_name" id="delivery_name" value="">
                                                    <span class="error_no" style="width:100%;color: #f00;font-style: italic;font-size: 13px;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('cart.Door No') }}:<span class="man_star">*</span> </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="no" id="no" value="">
                                                    <span class="error_no" style="width:100%;color: #f00;font-style: italic;font-size: 13px;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('cart.Address 1') }}: <span class="man_star">*</span></label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="street_1" id="street_1" value="">
                                                    <span class="error_street1" style="width:100%;color: #f00;font-style: italic;font-size: 13px;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('cart.Address 2') }}: </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  name="street_2" id="street_2" value="">
                                                    <!-- <span class="error_street2" style="width:100%;color: #f00;font-style: italic;font-size: 13px;"></span> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>Town/City: <span class="man_star">*</span></label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="region" id="region" value=" ">
                                                    <span class="error_region" style="width:100%;color: #f00;font-style: italic;font-size: 13px;"></span>
                                                </div>
                                            </div>                                           
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('cart.Country') }}:<span class="man_star">*</span> </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  name="country" id="country" value="">
                                                    <span class="error_country" style="width:100%;color: #f00;font-style: italic;font-size: 13px;"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('cart.Postcode') }}:<span class="man_star">*</span> </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"  name="zipcode" id="zipcode" value=" ">
                                                    <span class="error_country" style="width:100%;color: #f00;font-style: italic;font-size: 13px;"></span>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 no-padding">
                                                <label>{{ __('cart.Telephone') }}:<span class="man_star">*</span> </label>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-12 no-padding">
                                                <div class="form-group  ">
                                                    <input type="text" class="form-control" name="contact_no"  id="contact_no" value="">
                                                    <span class="error_contact_no" style="width:100%;color: #f00;font-style: italic;font-size: 13px;"></span>
                                                </div>
                                            </div>
                                            <div class="btn_cards"><a href="javascript:void(0);" class="save_address">{{ __('cart.SAVE ADDRESS') }}</a></div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 no-padding">

                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12  no-padding check_box_ct  or_lan_ipad lg-in">
                        <div class="checkbox">
                            <label><span class="inline-label"><input type="checkbox" value="" name="terms" id="terms"><p>{{ __('cart.I agree to the') }} <span><a href="{{ url('term-and-condition') }}">{{ __('cart.Terms') }} &amp; {{ __('cart.Conditions') }}</a></span> {{ __('cart.and') }} <span><a href="{{ url('privacy-policy') }} ">{{ __('cart.Privacy Policies') }}</a></p></span></label>
                        </div>
                        <div class="btn_group_cards light">
                            <input type="hidden" name="payment_type" id="payment_type" value="">
                            <div class="btn_cards btn_stripe"><a href="{{ url('stripe/page') }}" data_id="stripe" id="checkout_submit_stripe" >{{ __('cart.Pay with Card') }}</a></div>
                            <!--                             <div class="btn_paypal"><a href="{{ url('payment/paypal') }}" data_id="paypal" id="checkout_submit_paypal" >{{ __('cart.Pay with PayPal') }}</a></div> -->
<div class="btn_paypal"><a href="{{ url('payment/paypal') }}" data_id="paypal" id="checkout_submit_paypal">Pay with <i><strong>Pay</strong><strong>Pal</strong></i></a></div>
                       
                        </div>
                    </div>

                </div>
                
            
            </div>
            <div class="header_cont rt_table">
                <div class="table_basket">
                    <table class="table  ">
                        <thead>
                            <tr>
                                <th colspan="2" scope="col">{{ __('cart.Basket Summary') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="td-summary">{{ __('cart.Items total') }}:</td>
                                    <td>{{ currency($sub_total, 'GBP', session()->get('my_currency'))}}</td>
                            </tr>
                            <tr>
                                <td scope="row" class="td-summary">{{ __('cart.Delivery') }}:</td>

                               
                                <td>{{currency($shipping_price , 'GBP', session()->get('my_currency'))}}</td>
                                  
                            </tr>
                            <tr>
                                <td colspan="2" class="td-summary">{{ __('cart.Packaging Options') }}:</td>

                            </tr>
                            <tr class="end_cell">

                                @foreach($packing as $value)
                                    @if($packing_id == $value->id)
                                    @php @$packing_value = $value->delivery_value;  @endphp
                                    
                                    <td class="pl-left" style="font-weight: 600;"> {{ $value->delivery_name }}:</td>
                                        <td>{{ currency($value->delivery_value, 'GBP', session()->get('my_currency'))}}</td>
                                    @endif
                                @endforeach
                            </tr>
								<!-- <td>Additional Charges:</th>
                                
                                    @php
                                    if($print_price)
                                    {
                                    @endphp
                                        <td class="pl-left">{{ currency($print_price, 'GBP', session()->get('my_currency'))}}</td>

                                    @php 
                                    }
                                    @endphp
 -->
                            <!-- </tr> -->
                            <tr class="total_order ">
                                <td class="td-summary">{{ __('cart.Order Total') }}:</th>
                                <!-- @php $grant_total = $sub_total + $packing_value + $shipping_price + $print_price; @endphp -->
                                @php $grant_total = $sub_total + @$packing_value + $shipping_price; @endphp
                                  <input type="hidden" name="grand_total" value="{{ $grant_total }}">
                                  <input type="hidden" name="sub_total" value="{{ $sub_total }}">
                                  <input type="hidden" name="cart_id" value="{{ $cart_id }}">
                                    <td>{{ currency($grant_total, 'GBP', session()->get('my_currency'))}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="payment_gateway">
                    <p>{{ __('cart.SECURE PAYMENTS') }}</p>
                    <img src="images/pay.png" alt="" title="" />
                </div>
            </div>
            </form> 
        </div>
    </section>

@endsection
@section('footer_script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        $('#demo').RollingSlider({
            showArea: "#example ",
            prev: "#jprev ",
            next: "#jnext ",
            moveSpeed: 300,
            autoPlay: true
        });
    </script>
    <script type="text/javascript ">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
  
        $(document).ready(function() {

            var _token = "{{ csrf_token() }}";

            $( "#checkout_submit_paypal , #checkout_submit_stripe" ).click(function(e) {
                e.preventDefault();
                payment_type = $(this).attr('data_id');
                if($('#terms').prop("checked") == true && $("input[name='billing_address']:checked").val() != null){
                    $("#payment_type").val(payment_type);
                    $( "#checkout_form" ).submit();
                } else{
                    if($('#terms').prop("checked") == false){
                        alert('Kindly check the Tearms and Conditions')
                    } 
                    if($("input[name='billing_address']:checked").val() == null){
                        alert('Kindly add Delivery Address')
                    }
                }
            });
            // var cart_url = "{{ url('add-address') }}";

            $('.save_address').click(function(e){
                e.preventDefault();
                delivery_name = $('#delivery_name').val();
                no = $('#no').val();
                street_1 = $('#street_1').val();
                street_2 = $('#street_2').val();
                region = $('#region').val();
                country = $('#country').val();
                zipcode = $('#zipcode').val();
                contact_no = $('#contact_no').val();

                $.ajax({
                    type: "POST",
                    url: "{{ url('add-address') }}",        
                    data: {
                       delivery_name:delivery_name,no: no, street_1:street_1,street_2:street_2,region:region,country:country,zipcode:zipcode,contact_no:contact_no, _token : _token,
                        }, 
                    success: function (data) {
                        if(data.status == 'success')
                        {
                            alert('Address added successfully');
                            window.location.reload();
                            
                        }    
                        if(data.status == 'error'){
                          $.each(data.message,function(index,value){
                            
                            if(index == 'no')
                            {
                                $('.error_no').html(value)
                                $('#delivery_name').addClass("validation-err");
                            }	
                          	if(index == 'no')
                            {
                            	$('.error_no').html(value)
                                $('#no').addClass("validation-err");
                            }
                          	if(index == 'street_1')
                            {
                            	$('.error_street1').html(value)
                                $('#street_1').addClass("validation-err");
                            }
                          	if(index == 'street_2')
                            {
                            	$('.error_street2').html(value)
                            }                          
                          	if(index == 'region')
                            {
                            	$('.error_region').html(value)
                                $('#region').addClass("validation-err");
                            }                          
                          	if(index == 'country')
                            {
                            	$('.error_country').html(value)
                                $('#country').addClass("validation-err");
                            }                          
                          
                           	if(index == 'zipcode')
                            {
                            	$('.error_zipcode').html(value)
                                $('#zipcode').addClass("validation-err");
                            }                         
                          
                           	if(index == 'contact_no')
                            {
                            	$('.error_contact_no').html(value)
                                $('#contact_no').addClass("validation-err");
                            }                         
                          
                         });
                        	//alert("ff");
                            //console.log(data.message);
                            // $('.error_no').html(data.message.no[0])
                            // $('.error_street1').html(data.message.street_1[0])
                            // $('.error_street2').html(data.message.street_2[0])
                            // $('.error_region').html(data.message.region[0])
                            // $('.error_country').html(data.message.country[0])
                            // $('.error_zipcode').html(data.message.zipcode[0])
                            // $('.error_contact_no').html(data.message.contact_no[0])

                        }
                    },
                    error: function (data) {
                                         
                    }
                });
            });

            $('.delivery_details ul li').click(function() {
                $('ul li.current').removeClass('current');
                $(this).closest('li').addClass('current');
            });
        });        

    </script>
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

    <style>
        .container_default_custom .modal-content {
        min-width: 450px;
        }
        .modal_fields>div {
            margin-bottom: 20px;
        }
        .container_default_custom .modal-content .modal-body h5{
            margin-bottom:30px;
        }
    </style>
@endsection
    