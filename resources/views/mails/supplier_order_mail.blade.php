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
        <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="logo"></div>

        <p style="display: inline; line-height: 1.4; font-family: sans-serif; margin-bottom: 20px;">Hello {{ isset($orderValue['supplier']['name']) ? $orderValue['supplier']['name'] :''}}, </p>

        <p style="display: inline; line-height: 1.6; font-family: sans-serif; margin-bottom: 20px;font-size: 15px;">Your are receiving an email loem ipsum this is a paragraph of text style -
             body text for an intro. We have received your order no <b>{{ isset($content['order_ref']) ? $content['order_ref'] :'' }}.</b></p>

             <div class="li-1">
        </div>

        <div class="li-sp" style="border-bottom: 1px solid #8bc0cc;width: 100%;float: left;">
            <h2 style="font-family: sans-serif;color: #3088e2;margin-bottom: 20px;">Your Ordered items</h2>
            <h4 style="font-family: sans-serif;font-weight:bold;margin-bottom: 20px;">{{isset($orderValue['name']) ? $orderValue['name'] : ''}}</h4>
            <table style="width: 100%;max-width: 260px">    
                <tbody>
                    <tr style="line-height:2.5">
                        <td style="width:72%; font-size: 15px; ">Style</td>
                        <td style="font-size: 15px; ">Grey/XL/Cotton</td>
                    </tr>
                    <tr style="line-height:2.5">
                        <td style="width:72%; font-size: 15px; font-weight: bold;">Item Price</td>
                        <td style="font-size: 15px; ">{{ isset($orderValue['price']) ? $orderValue['price'] :''}} </td>
                    </tr>
                    <tr style="line-height:2.5">
                        <td style="width:72%;padding-bottom: 10px;font-size: 15px;font-weight: bold;">Quantity</td>
                        <td style="font-size: 15px;">{{ isset($orderValue['product_quantity']) ? $orderValue['product_quantity'] : ''}}</td>
                    </tr>
                </tbody>
            </table>  
        </div>
    </div>

     <div class="li-1"style="width: 100%;float: left;margin-bottom:15px;">
        <h2 style="font-family: sans-serif; color: #3088e2; margin-bottom:20px;">Billing address</h2>
           <p style="display: block;line-height: 15px; font-family: sans-serif;font-size: 15px;">Address No : {{ isset($content['address'][0]['no']) ? $content['address'][0]['no'] : '' }}{{ isset($content['address'][0]['street_1']) ? $content['address'][0]['street_1'] : ''}} , {{isset($content['address'][0]['street_2']) ? $content['address'][0]['street_2'] : '' }}</p>
            <p style="display: block;line-height: 15px; font-family: sans-serif; font-size: 15px;">Region : {{ isset($content['address'][0]['region']) ? $content['address'][0]['region'] : '' }}</p>
            <p style="display: block; line-height: 15px;font-family: sans-serif; font-size: 15px;"> Country : {{ isset($content['address'][0]['country']) ? $content['address'][0]['country'] : '' }} - {{ isset($content['address'][0]['zipcode']) ? $content['address'][0]['zipcode'] : '' }}</p>
            <p style="display: block; font-family: sans-serif; font-size: 15px;">{{ isset($content['address'][0]['landmark']) ? $content['address'][0]['landmark'] :'' }}</p>
            <p style="display: block; line-height: 15px; font-family: sans-serif;font-size: 15px;">Phone Number : {{ isset($content['address'][0]['contact_no']) ? $content['address'][0]['contact_no'] : '' }} </p>
    </div>
       
        <div class="li-1"style="width: 100%;float: left;margin-bottom:0px;">
            <h2 style="font-family: sans-serif; color: #3088e2; margin-bottom:20px;">Shipping address</h2>
            <p style="display: inline; line-height: 15px; font-family: sans-serif; font-size: 15px;">Address No : {{ isset($content['address'][0]['no']) ? $content['address'][0]['no'] : '' }}{{ isset($content['address'][0]['street_1']) ? $content['address'][0]['street_1'] : '' }} , {{ isset($address[0]['street_2']) ? $address[0]['street_2'] : '' }}</p>
            <p style="display: inline;line-height: 15px; font-family: sans-serif; font-size: 15px;">Region : {{ isset($content['address'][0]['region']) ? $content['address'][0]['region'] : '' }} </p>
            <p style="display: inline;line-height: 15px; font-family: sans-serif;font-size: 15px;">Country : {{ isset($content['address'][0]['country']) ? $content['address'][0]['country'] : '' }} </p>
            <p style="display: inline;line-height: 15px; font-family: sans-serif;font-size: 15px;">Pin Code:{{ isset($address[0]['zipcode']) ? $address[0]['zipcode'] : '' }}</p>
            <p style="display: inline;line-height: 15px; font-family: sans-serif;font-size: 15px;">{{ isset($content['address'][0]['landmark']) ? $content['address'][0]['landmark'] : ''}} </p>
            <p style="display: inline;line-height: 15px; font-family: sans-serif;font-size: 15px;">Phone Number : <b> {{isset($content['address'][0]['contact_no']) ? $content['address'][0]['contact_no'] : '' }}</b></p>
        </div>

              <h5 style="font-family:sans-serif;font-size: 17px;font-weight:bold;margin-bottom:10px; padding-bottom:20px;line-height: 2;">The Cool Jelly Bean team</h5>

            </div>
                   
            <div class="x_footer">
                <table style="background:#000000; padding:10px; width:100%; text-align:center;" >
                            <tbody>
                            <tr style="line-height: 28px;">
                                <td  style="color:#ffffff;width:100%;max-width: 400px;margin:0 auto;"><p style="color:#ffffff;width:100%;line-height:28px;padding:0px; margin:0 auto;margin-bottom:0px !important; padding-bottom: 0px !important;"><b>© Cool Jelly Bean 2021</b></p></td>
                            </tr>
                            <tr>
                                <td style="color:#ffffff;width:100%;max-width:100%;line-height:25px;margin:0 auto !important;"><p style="color:#ffffff;width:100%;max-width: 500px;margin:0 auto;line-height:25px;padding:0px 0 12px 0 !important;margin-bottom: 12px;"><b>Lorem ipsum registered address <br>insert legel registration company number here </b></p></td>
                            </tr>
                          </tbody>
                 </table>
             </div>
        </div>
</html>