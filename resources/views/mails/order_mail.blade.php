
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
</head>
<body style="background: beige; width:100%;min-height: 100vh;">
    
    <div class="main-cont" style="width: 100%;margin: 0 auto; background: #fff;">
        
        <div class="cont-2" style="padding: 25px;">
        <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="logo"></div><br>

        <p style="display: block; line-height: 1.4; font-family: sans-serif; margin-bottom: 20px;">Hello {{ isset($name) ? $name : '' }}, </p>
        <p style="display: inline; line-height: 1.6; font-family: sans-serif; margin-bottom: 20px;font-size: 15px;">Your are receiving an email loem ipsum this is a paragraph of text style -
             body text for an intro. We have received your order no <b>{{ $order_ref }}.</b></p>
        
        <div class="li-1">
        </div>

        <div class="li-sp" style="border-bottom: 1px solid #8bc0cc;width: 100%;float: left;">
            <h2 style="font-family: sans-serif;color: #3088e2;margin-bottom: 20px;">Your Ordered items</h2>
            @foreach($order_items as $key => $value)
            <h4 style="font-family: sans-serif;font-weight:bold;margin-bottom: 20px;">{{$value['name']}}</h4>
            <table style="width: 100%;max-width: 260px">
                <tbody>
                    <tr style="line-height:2.5">
                        <td style="width:72%; font-size:15px;font-weight: bold;">Style</td>
                        <td style="font-size: 15px; font-weight: bold;">Grey/XL/Cotton</td>
                     </tr>
                    <tr style="line-height:2.5">
                        <td style="width:72% ;font-size:15px;font-weight: bold;">Item Price</td>
                        <td style="font-weight: bold; font-size: 15px;">{{$value['price']}} </td>
                    </tr>
                    @if($value['variant_ref_no'])
                    <tr style="line-height:2.5">
                        <td style="width:72% ;font-size:15px;font-weight: bold;">Variant Reference No</td>
                        <td style="font-weight: bold; font-size: 15px;">{{$value['variant_ref_no']}} </td>
                    </tr>
                    @endif
                    <tr style="line-height:2.5">
                        <td style="width:72%;padding-bottom: 10px;font-size:15px; font-weight: bold;">Quantity</td>
                        <td style="font-size: 15px; font-weight: bold;">{{$value['product_quantity']}}</td>
                    </tr>
                </tbody>
            </table>  
        @endforeach
        </div>

         <div class="li-1"style="width: 100%;float: left;line-height: 3.5;margin:20px 0px 15px 0px">
            <table style="width: 100%;">
             
                      <tr  style="line-height:1.5">
                        <td  colspan="2" style="font-family: sans-serif; font-size: 24px; font-weight: bold; color: #3088e2; padding-top:20px; margin-bottom:20px; margin-top: 5px; width:100%;">Product Amount Details</td>
                    </tr>
                    <tr  style="line-height:2.5">
                        <td style="font-size:15px; font-weight: bold;">Subtotal</td>
                        <td style="font-size:15px; font-weight: bold;">${{ $sub_total }}</td>
                    </tr>
                     <tr  style="line-height:2.5">
                        <td style="font-size:15px; font-weight: bold;">Additional Charges</td>
                        <td style="font-size:15px; font-weight: bold;">${{ $print_price }}</td>
                    </tr>
                    <tr  style="line-height:2.5">
                        <td style="font-size:15px; font-weight: bold;">Packing<span>({{ $packing_name }})</span></td>
                        <td style="font-size:15px; font-weight: bold;">${{ $packing_amount }}</td>
                    </tr>
                    <tr  style="line-height:2.5">
                        <td style="font-size:15px; font-weight: bold;">Delivery<span>({{ $delivery_name }})</span></td>
                        <td style="font-size:15px; font-weight: bold;">${{ $delivery_amount }}</td>
                    </tr>
                    <tr  style="line-height:2.5">
                        <td style="font-size:15px; font-weight: bold;">Tax</td>
                        <td style="font-size:15px; font-weight: bold;">${{ $tax_total }}</td>
                    </tr>
                    <tr  style="line-height:2.5">
                        <td style="font-size:15px; font-weight: bold;">Grand Total</td>
                        <td style="font-size:15px; font-weight: bold;">${{ $grand_total }}</td>
                    </tr>
            </table>
        </div>
        <div class="li-1"style="width: 100%;float: left;margin-bottom:15px;">
            <h2 style="font-family: sans-serif; color: #3088e2; margin-bottom:20px;">Billing address</h2>
               <p style="display: block;line-height: 15px; font-family: sans-serif; font-size: 14px;"><?php if(array_key_exists('no',$address[0])) { ?> {{ $address[0]['no'] }} <?php } ?></p>
                <p style="display: block;line-height: 15px; font-family: sans-serif; font-size: 14px;"><?php if(array_key_exists('street_1',$address[0])) { ?> {{ $address[0]['street_1'] }} , {{ $address[0]['street_2'] }} <?php } ?></p>
                <p style="display: block; line-height: 15px;font-family: sans-serif; font-size: 14px;"> <?php if(array_key_exists('region',$address[0])) { ?> {{ $address[0]['region'] }} <?php } ?></p>
                <p style="display: block; font-family: sans-serif; font-size: 14px; font-weight: bold;"><?php if(array_key_exists('country',$address[0])){ ?>{{ $address[0]['country'] }} - {{ $address[0]['zipcode'] }} <?php } ?></p>
                <p style="display: block; line-height: 15px; font-family: sans-serif; font-size: 14px;"><?php if(array_key_exists('landmark',$address[0])){ ?> {{ $address[0]['landmark'] }} <?php } ?></p>
                <p style="display: block;line-height: 15px; font-family: sans-serif; font-size: 14px;"><?php if(array_key_exists('contact_no',$address[0])){ ?>  Phone Number:<b style="font-weight: bold;"> {{ $address[0]['contact_no'] }} <b> <?php } ?> </p>
        </div>
        
        <div class="li-1"style="width: 100%;float: left;margin-bottom:0px;">
            <h2 style="font-family: sans-serif; color: #3088e2; margin-bottom:20px;">Shipping address</h2>
            <p style="display: block; line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('no',$address[0])) {?> {{ $address[0]['no'] }} <?php } ?> </p>
            <p style="display: block;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('street_1',$address[0])) {?> {{ $address[0]['street_1'] }} , {{ $address[0]['street_2'] }} <?php } ?></p>
            <p style="display: block;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('region',$address[0])) {?> {{ $address[0]['region'] }} <?php } ?></p>
            <p style="display: block;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('country',$address[0])) {?> {{ $address[0]['country'] }} - {{ $address[0]['zipcode'] }} <?php } ?></p>
            <p style="display: block;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('landmark',$address[0])) {?> {{ $address[0]['landmark'] }} <?php } ?></p>
            <p style="display: block; font-family: sans-serif;line-height: 3;"><?php if((array_key_exists('contact_no',$address[0]))) { ?> Phone Number: <b style="font-weight: bold;">{{ $address[0]['contact_no'] }}</b> <?php } ?></p>
        </div>

        <p style="display: block; line-height: 10px; font-family: sans-serif;margin-bottom:0px;">Thanks for buying from <b>{{isset($order_items[0]['artist']['name']) ? $order_items[0]['artist']['name'] :''}} </b> </p>

        <h5 style="font-family:sans-serif;font-size: 17px;font-weight:bold;margin-bottom:10px; padding-bottom:20px;line-height: 2;">The Cool Jelly Bean team</h5>

    </div>
           <div class="x_footer">
                <table style="background:#000000; padding:10px; width:100%; text-align:center;" >
                            <tbody>
                            <tr style="line-height: 28px;">
                                <td  style="color:#ffffff;width:100%;max-width: 400px;margin:0 auto;"><p  style="color:#ffffff;width:100%;line-height:28px;padding:0px; margin:0 auto;margin-bottom:0px !important; padding-bottom: 0px !important;"><b>© Cool Jelly Bean 2021</b></p></td>
                            </tr>
                            <tr>
                                <td style="color:#ffffff;width:100%;max-width:100%;line-height:25px;margin:0 auto !important;"><p style="color:#ffffff;width:100%;max-width: 500px;margin:0 auto;line-height:25px;padding:0px 0 12px 0 !important;margin-bottom: 12px;"><b>Lorem ipsum registered address <br>insert legel registration company number here </b></p></td>
                            </tr>
                          </tbody>
                 </table>
             </div>
        </div>
    </body>
</html>