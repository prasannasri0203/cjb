<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        .mt40{
            margin-top: 40px;
        }
        .hide{
            display:none;
        }
    </style>
<div class="container">
 
<div class="row">
    <div class="col-lg-12 mt40">
        <div class="text-center">
            <h2>{{ __('cart.Pay for') }} {{ $order_number }}</h2>
            <br>
        </div>
    </div>
</div>
    
@if ($errors->any())
    <div class="alert alert-danger">

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">  
    <div class="col-md-3">
    
    </div>
<div class="col-md-6"> 

        <div class='form-row'>
            <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>{{ __('cart.Please correct the errors and try again') }}.</div>
            </div>
        </div>
<form accept-charset="UTF-8" action="{{url('payment')}}" class="require-validation"
    data-cc-on-file="false"
    data-stripe-publishable-key="pk_test_51GuxWGBgoBYViK1l0D5G9qKobAhRsVTLQVHFsBSCQIceNiA9anb5ld1JxtQbQ7cAqCUzk5FEdNbHU3VhgXeQWk5x00YDT1ayVq"
    id="payment-stripe" method="post" name="payment-stripe">
    {{ csrf_field() }}
    <div class='row'>
        <div class='col-xs-12 form-group'>
            <label class='control-label'>{{ __('cart.Name on Card') }}</label> 
            <input class='form-control' size='4' type='text'>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-12 form-group'>
            <label class='control-label'>{{ __('cart.Card Number') }}</label> 
            <input class="card-number form-control" autocomplete='off' size='20' type='text' name="card_no">
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-4 form-group'>
            <label class='control-label'>{{ __('cart.CVC') }}</label> 
            <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='3' type='text' name="ccv">
        </div>
        <div class='col-xs-4 form-group'>
            <label class='control-label'>{{ __('cart.Month') }}</label> 
            <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name="expiry_month">
        </div>
        <div class='col-xs-4 form-group'>
            <label class='control-label'>{{ __('cart.Year') }}</label>
            <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="expiry_year">
        </div>
    </div>
    <!-- <div class='row'>
        <div class='col-md-12'>
            <div class='form-control total btn btn-info'>
                Total: <span class='amount'>$20</span>
            </div>
        </div>
    </div> -->
    <div class='row'>
        <div class='col-md-12 form-group'>
        <?php 
            $key = "encryption key";
            $text="123456";
            // $encrypted = bin2hex(openssl_encrypt($text,'AES-128-CBC', $key));
            // $decrypted=openssl_decrypt(hex2bin($encrypted),'AES-128-CBC',$key);
            // var_dump($encrypted,$decrypted);
        ?>
        
            <button class='form-control btn btn-primary submit-button'
                type='submit' style="margin-top: 10px;">{{ __('cart.Pay') }} »</button>
        </div>
    </div>
    
</form>
</div>
</div>
<script src="/js/jquery-2.2.3.min.js "></script>
<script src="https://js.stripe.com/v2/"></script>
<script type="text/javascript ">
$(document).ready(function() {
   
    $( "#payment-stripe" ).on('submit', function(e) {
        if (!$( "#payment-stripe" ).data('cc-on-file')) {
        e.preventDefault();
        Stripe.setPublishableKey( $( "#payment-stripe" ).data('stripe-publishable-key'));
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        }
    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
             $( "#payment-stripe" ).find('input[type=text]').empty();
             $( "#payment-stripe" ).append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
             $( "#payment-stripe" ).get(0).submit();
        }
    }
});
</script>
