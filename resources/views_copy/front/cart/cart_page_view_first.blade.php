@extends('front.app')

@section('title', '')

@section('header_script')
@endsection

@section('body_class', '')

@section('main_div_class', 'homepg_Cont')

@section('content')   
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
                        <img src="images/basket.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/basket.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption">
                                <p>{{ __('cart.Your Shopping Basket') }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/basket.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/basket.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption">
                                <p>{{ __('cart.Your Shopping Basket') }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="item active">
                        <img src="images/basket.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/basket.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption">
                                <p>{{ __('cart.Your Shopping Basket') }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/basket.png" class="dsktp_banner" title="slidepicture" alt="slidepicture">
                        <img src="images/basket.png" class="mobile_banner" title="slidepicture" alt="slidepicture">
                        <div class="container">
                            <div class="caption hlp_caption">
                                <p>{{ __('cart.Your Shopping Basket') }} </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <section id="checkout_guest" class="container_default_custom">
        <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 no-padding">
        <h3><span class="total_item_count">{{ session()->get('cartCount') }}</span> {{ __('cart.items in your basket') }} </h3>
        </div>
        <div class="header_content_details basi">

        @php $sub_total = 0 ; $shipping_price=0;

            if( count($cartList) != 0){
            foreach($cartList as $key => $value) { 
                @endphp
                <div class="row" id="cart_item_{{$value['id']}}">
                    <div class="col-lg-4">
                    <img src="{{URL::to('/merchandise-img/' .$value['image'])}}" data_id="{{ $value['id'] }}" class="img-responsive uploadimg">
                    </div>
                    <div class="col-lg-8 d-flex">
                        <div class="forme-flex namefle">
                            <div class="userdit">
                                <h4 class="mob_display">{{ $value['name'] }}
                                    <a href="javascript:void(0);" class="remove_item" data_id="{{ $value['id'] }}">
                                        <img src="images/bin.png" alt="trash" />
                                    </a>
                                </h4>
                                <h5>{{ __('cart.By') }} <a href="#">{{ $value['artist'] }}</a></h5>
                            </div>

                        </div>
                        <form action="#">
                            <div class="form_sub_division">
                                <div class="forme-flex">
                                    <div class="form-group" style="width: 45%;">
                                        <label>{{ __('cart.Price (each)') }}:</label>
                                        <label style="width: auto;">{{ currency($value['price'], 'GBP', session()->get('my_currency'))}}</label>
                                    </div>

                                    <div class="form-group forme-flex quanf">
                                        <label>{{ __('cart.Quantity') }}:</label>
                                        <input style="height: 30px;width: 100px;padding-left: 12px;" value="{{ $value['quantity'] }}" id="cart_qty">
                                        <a href="javascript(0);" class="quantity_update" data_id="{{ $value['id'] }}">{{ __('cart.Update') }}</a>
                                    
                                    </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group forme-flex">
                                    <label>Colour:</label>
                                    <span></span>
                                    <select class="form-control">
                                    <option>Black</option>
                                    <option>Red</option>
                                    <option>Yellow</option>
                                </select>
                                </div> -->

                                <div class="form-group forme-flex">
                                    <label>{{ __('cart.Choosed Option') }}:</label>
                                    <span>{{ $value['variant'] }}</span>
                                    <!-- <select class="form-control">
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option> -->
                                <!-- </select> -->
                                </div>
                            </div>
                            <h2>{{ __('cart.Total') }}: <span id="item_wise_sub_{{$value['id']}}">{{ currency(($value['price'] * $value['quantity']), 'GBP', session()->get('my_currency'))}}</span></h2>
                            @php $sub_total =$sub_total+($value['price'] * $value['quantity']); @endphp
                        </form>
                    </div>
                </div>
            @php } @endphp
        @php } else { @endphp
            <div class="no_item_div"> No Data Found In Cart </div>
        @php }  @endphp
        </div>
        <div class="header_cont rt_table basi1">
            <div  class="table_basket">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2" scope="col">{{ __('cart.Basket Summary') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ __('cart.Items total') }}:</th>
                                <td><span id="sub_total">{{ currency($sub_total, 'GBP', session()->get('my_currency'))}}</span></td>
                        </tr>
                        <tr>
                            <td scope="row" colspan="2">{{ __('cart.Delivery') }}:</th>

                        </tr>

                        <tr class="seltd">
                            <td class="info_select">
                            @php $delivery_amt = 0; @endphp
                                <select required class="form-control" id="delivery" name="delivery">
                                    <option value="" data_id="0">Please Select Delivery</option>
                                    @foreach($delivery as $value)
                                         @if($delivery_id == $value->id)
                                            <option value="{{ $value->id }}" selected data_id="{{ $value->delivery_value }}">{{ $value->delivery_name }}</option>
                                            @php $delivery_amt = $value->delivery_value; @endphp
                                        @else
                                            <option value="{{ $value->id }}" data_id="{{ $value->delivery_value }}">{{ $value->delivery_name }}</option>
                                            
                                        @endif
                                    @endforeach
                                    
                                </select>
                                <span class="error delivery"></span>
                            </td>
                            <td><span id="delivery_cost">{{ currency($delivery_amt, 'GBP', session()->get('my_currency'))}}</span> </td>
                        </tr>
                        <tr class="w_100">
                            <td colspan="2">{{ __('cart.Packaging Options') }}:</th>

                        </tr>
                        <tr class="seltd">
                            <td class="info_select">
                            @php $packing_amt = 0; @endphp
                                <select required class="form-control secsel" id="packing" name="packing">
                                    <option value="" data_id="0">Please Select Packing</option>
                                    @foreach($packing as $value)
                                        @if(($packing_id == $value->id))
                                            <option value="{{ $value->id }}" selected data_id="{{ $value->delivery_value }}">{{ $value->delivery_name }}</option>
                                            @php $packing_amt = $value->delivery_value; @endphp
                                        @else
                                            <option value="{{ $value->id }}" data_id="{{ $value->delivery_value }}">{{ $value->delivery_name }}</option>
                                            
                                        @endif
                                    @endforeach
                                </select>
                                <span class="error packing"></span>
                            </td>
                            <td><span id="packing_cost">{{ currency($packing_amt, 'GBP', session()->get('my_currency'))}}</span> </td>
                        </tr>
                        <tr class="total_order">
                            <td>{{ __('cart.Order Total') }}</td>
                            @php $grant_total = $delivery_amt+$packing_amt+$sub_total; @endphp
                            <td><span id="grand_total">{{ currency($grant_total, 'GBP', session()->get('my_currency'))}}<span></td>
                        </tr>
                        <tr>
                            <td id="table-basket" colspan="2">
                            @php if( Auth::check() && Auth::user()->type == 2 ) { @endphp
                                <div class="btn_cards"><a class="checkout_from_cart" href="{{ url('checkout_loggedin') }}" data-toggle="modal">{{ __('cart.CHECKOUT') }}</a></div>
                            @php } else { @endphp
                                <div class="btn_cards"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart_login">{{ __('cart.CHECKOUT') }}</div>
                            @php } @endphp
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="payment_gateway">
                <p>{{ __('cart.SECURE PAYMENTS') }}</p>
                <img src="images/pay.png" alt="" title="" />
            </div>
        </div>
        </div>

    </section>


    </div>
    <!--login popup-->
    @php if (Auth::check()) { 
            if(!Auth::user()->type == 2){
    @endphp

            <div class="modal fade changeuser" id="cart_login" role="dialog">
                <div class="modal-dialog guestdia">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="media_gal">
                            <h4 class="modal-title">{{ __('cart.New to Cool Jelly Bean') }} ?</h4>
                            <a href="{{ url('guest_checkout_page') }}" class="btn btn-default guestbt">{{ __('cart.Guest Checkout') }}t</a>
                            <!-- <button type="submit" class="btn btn-default guestbt">Guest Checkout</button> -->
                            <p class="newp">{{ __('cart.You can save your information and create an account later') }} </p>
                        </div>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{ __('cart.Existing users Login') }}... </h4>
                        </div>
                        <div class="modal-body">
                            <!-- <form class="form-horizontal" action="#"> -->
                            <form class="form-horizontal" action="{{ url('checkout_loggedin_form') }}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-xs-12" for="email">{{ __('cart.Email') }}:</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-xs-12" for="pwd">{{ __('cart.Password') }}:</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <input class="form-control" type="password" id="password" name="Password" />
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-ico"></span>
                                        <i class="fa fa-info-circle" aria-hidden="true">
                                        </i>
                                    </div>
                                </div>
                                <!-- <div class="form-group forgot">
                                    <div class="col-sm-9 col-xs-12 pull-right">
                                        <a href="#">Forgot Password?</a>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                                        <button class="btn btn-default ajax_login">{{ __('cart.LOGIN') }} LOGIN</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="tooltip_content">
                    <p>Lorem Ipsum how many characters etc.</p>
                </div>
            </div>
    @php 
            }
        } else{
    @endphp
            <div class="modal fade changeuser" id="cart_login" role="dialog">
                <div class="modal-dialog guestdia">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="media_gal">
                            <h4 class="modal-title">{{ __('cart.New to Cool Jelly Bean') }} ?</h4>
                            <a href="{{ url('guest_checkout_page') }}" class="btn btn-default guestbt">{{ __('cart.Guest Checkout') }}</a>
                            <!-- <button type="submit" class="btn btn-default guestbt">Guest Checkout</button> -->
                            <p class="newp">{{ __('cart. You can save your information and create an account later') }}</p>
                        </div>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{ __('cart.Existing users Login') }} ... </h4>
                        </div>
                        <div class="modal-body">
                            <!-- <form class="form-horizontal" action="#"> -->
                            <form class="form-horizontal" action="{{ url('checkout_loggedin_form') }}" method="POST" >
                                @csrf
                                <span class="login_error"></span>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-xs-12" for="email">{{ __('cart.Email') }}:</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 col-xs-12" for="pwd">{{ __('cart.Password') }}:</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <input class="form-control" type="password" id="password" name="Password" />
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password eye-ico"></span>
                                        <i class="fa fa-info-circle" aria-hidden="true">
                                        </i>
                                    </div>
                                </div>
                                <!-- <div class="form-group forgot">
                                    <div class="col-sm-9 col-xs-12 pull-right">
                                        <a href="#">Forgot Password?</a>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9 col-xs-12 logbt">
                                        <button class="btn btn-default ajax_login">{{ __('cart.LOGIN') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="tooltip_content">
                    <p>Lorem Ipsum how many characters etc.</p>
                </div>
            </div>

    @php
        }
    @endphp
@endsection
@section('footer_script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        $('#demo').RollingSlider({
            showArea:"#example",
            prev:"#jprev",
            next:"#jnext",
            moveSpeed: 300,
            autoPlay: true
        });
    </script>
    <script type="text/javascript">
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
            var checkout ="{{ url('checkout_loggedin') }}"
            var cart_url ="{{ url('cart') }}"

                // price =  $( "#packing option:selected" ).attr('data_id');
                // if(price != ""){
                //     $('#packing_cost ').html(parseFloat(price).toFixed(2));
                //     delivery = $('#delivery_cost ').html();
                //     sub_total = $('#sub_total ').html();
                //     grand_total = parseFloat(sub_total) + parseFloat(delivery) + parseFloat(price);
                //     $('#grand_total').html(changed_price);
                // }

                // delivery_price =  $( "#delivery option:selected" ).attr('data_id');
                // if(delivery_price != ""){
                //     $('#delivery_cost ').html(parseFloat(delivery_price).toFixed(2));
                //     packing = $('#packing_cost ').html();
                //     sub_total = $('#sub_total ').html();
                //     grand_total = parseFloat(sub_total) + parseFloat(packing) + parseFloat(delivery_price);
                //     test = parseFloat(grand_total).toFixed(2);
                //     $('#grand_total').html(changed_price);
                // }


            $( "#packing").change(function(){
                price =  $( "#packing option:selected" ).attr('data_id');
                id=$(this).val();
                $('#packing_cost ').html(parseFloat(price).toFixed(2));
                delivery = $('#delivery_cost ').html();
                sub_total = $('#sub_total ').html();
                grand_total = parseFloat(sub_total) + parseFloat(delivery) + parseFloat(price);
                $('#grand_total').html(parseFloat(grand_total).toFixed(2));
                $('.packing').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ url('/packing/update') }}",        
                    data: {
                        id: id, _token : _token
                        }, 
                    success: function (data) {
                        if(data.status == 'success')
                        {
                            // $('.cart_count').html(data.item_count);
                            window.location.reload();
                        }
                        
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            $( "#delivery").change(function(){
                price =  $( "#delivery option:selected" ).attr('data_id');
                id=$(this).val();
                $('#delivery_cost ').html(parseFloat(price).toFixed(2));
                packing = $('#packing_cost ').html();
                sub_total = $('#sub_total ').html();
                grand_total = parseFloat(sub_total) + parseFloat(packing) + parseFloat(price);
                $('#grand_total').html(parseFloat(grand_total).toFixed(2));
                $('.delivery').hide();
                $.ajax({
                    type: "POST",
                    url: "{{ url('/delivery/update') }}",        
                    data: {
                        id: id, _token : _token
                        }, 
                    success: function (data) {
                        if(data.status == 'success')
                        {
                            // $('.cart_count').html(data.item_count);
                            window.location.reload();
                        }
                        
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            $('.quantity_update').click(function(e){
                e.preventDefault();
                merchandise_id = $(this).attr('data_id');
                quantity = $(this).prev('input').val();
           
                $.ajax({
                    type: "POST",
                    url: "{{ url('/update-cart-qty') }}",        
                    data: {
                            product_id: merchandise_id,  _token : _token,quantity:quantity
                        }, 
                    success: function (data) {
                        if(data.status == 'success')
                        {   
                            packing =$("#packing option:selected").attr('data_id');
                            delivery =$("#delivery option:selected").attr('data_id');
                            item_id = '#item_wise_sub_'+data.data['product_id'];
                            $('.cart_count').html(data.item_count);
                            $('#sub_total').html(data.data['sub_total']);
                            grand_total = parseFloat(data.data['sub_total']) + parseFloat(packing) + parseFloat(delivery);
                            $('#grand_total').html(parseFloat(grand_total).toFixed(0));
                            $(item_id).html('£'+data.data['item_wise']);
                        	iziToast.success({ title: 'Success', message: 'Product quantity updated  successfully', position: 'topRight', });
                            window.location.href = cart_url;
                        }
                        
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            $('.ajax_login').click(function(e){
                e.preventDefault();
                email = $('#email').val();
                password = $('#password').val();
                $.ajax({
                    type:"POST",
                    url:"{{ url('checkout_loggedin_form') }}",        
                    data: {
                            email: email, password: password, _token : _token,
                        }, 
                    success: function (data) {
                        if(data.status == 'success')
                        {   
                            window.location.href = cart_url;
                        } else{
                            $('.login_error').html('Invalid User Name Or Password.')
                        }
                        
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            $('.remove_item').click(function(e){
                e.preventDefault();
                merchandise_id = $(this).attr('data_id')
                $.ajax({
                    type:"POST",
                    url:"{{ url('/add-to-cart/remove') }}",        
                    data: {
                            product_id: merchandise_id,  _token : _token,
                        }, 
                    success: function (data) {
                        if(data.status == 'success')
                        {
                            $('.cart_count').html(data.item_count);
                        	$('.total_item_count').html(data.item_count);
                            id_name="#cart_item_"+merchandise_id;
                            $(id_name).remove();

                            packing =$("#packing option:selected").attr('data_id');
                            delivery =$("#delivery option:selected").attr('data_id');
                            $('.cart_count').html(data.item_count);
                            $('#sub_total').html(data.data['sub_total']);
                            grand_total = parseFloat(data.data['sub_total']) + parseFloat(packing) + parseFloat(delivery);
                            $('#grand_total').html(parseFloat(grand_total).toFixed(0));
                            // window.location.href = cart_url;
                        }
                        
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });


            $('.checkout_from_cart').click(function(e) {
                e.preventDefault();
      
                if($('#delivery').val() != '' && $('#packing').val() != '' ){
                    window.location.href = checkout;
                } else{
                    if($('#delivery').val() == ''){
                       $('.error.delivery').html('Delivery Option Missing')
                    }
                    if($('#packing').val() == ''){
                       $('.error.packing').html('Packing Option Missing')
                    }
                }
            });

        });
    </script>
    <style>
    a.quantity_update {
        text-align: center;
        display: block;
        width: 75px;
        background: #2bb14e;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        float: left;
        padding: 5px;
        margin-left: 10px;
    }

    .no_item_div{
        display: block;
        float: left;
        background: #ffd36c;
        padding: 10px;
        margin: 25px auto;
        text-align: center;
        width: 100%;
    }
    .ajax_login, .ajax_login:hover{
        color: #fff;
        background-color: #ee1178;
    }
    span.error,span.login_error {
        display: block;
        text-align: center;
        font-style: italic;
        color: #f00;
        padding: 10px 10px 10px 10px;
    }
</style>
@endsection
