
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

        <p style="display: inline; line-height: 1.4; font-family: sans-serif; margin-bottom: 20px;">Hello {{ isset($name) ? $name : '' }}, </p><br><br>

        <p style="display: inline; line-height: 1.6; font-family: sans-serif; margin-bottom: 20px;">Your are receiving an email loem ipsum this is a paragraph of text style -
             body text for an intro. We have received your order no <b>{{ $order_ref }}.</b></p><br><br>
        
<!--         <a href="#" class="link" style="font-family: sans-serif; color: #f110ab;">Link style here</a> -->

        <div class="li-1">
            
            <!-- <h2 style="font-family: sans-serif; color: #3088e2; margin-bottom:20px;">Here are your login details:</h2>
             <table margin-bottom: 20px;>
                        <tbody>
                        <tr style="line-height:2.5">
                            <td style="width:48%">User Email</td>
                            <td>{{$email}}</td>
                        </tr>
                         
                      </tbody>
             </table> -->
<!-- <table><tbody>
    <tr>
        <td style="width: 160px; height: 40px; border-color: #f110ab; outline: none; border-radius: 20px;margin:10px 0px 10px 0px; background: #f110ab; color: #fff; font-size: 16px;">
        <a style="color:#fff; padding-left: 40px; width: 160px; height: 40px; border-color: #f110ab; outline: none; border-radius: 20px;margin:20px 0px 20px 0px; background: #f110ab; color: #fff; font-size: 16px;" href="{{url('/')}}">Login here</a>
        </td>
    </tr>
</tbody>

</table> -->
<div class="login"><img src="../images/login.png" alt="login"></div>

            <!-- <button style="width: 160px; height: 40px; border-color: #f110ab; outline: none; border-radius: 20px;margin:20px 0px 20px 0px; background: #f110ab; color: #fff; font-size: 16px;" ><a style="color:#fff" href="{{url('/')}}">Login here</a></button> -->
        </div>

        <div class="li-sp" style="border-bottom: 1px solid #8bc0cc;width: 100%;float: left;">
            <h2 style="font-family: sans-serif;color: #3088e2;margin-bottom: 20px;">Your Ordered items</h2>
            @foreach($order_items as $key => $value)
            <h4 style="font-family: sans-serif;font-weight:bold;margin-bottom: 20px;">{{$value['name']}}</h4>
           <table style="width: 100%;max-width: 260px">
                        <tbody><tr style="line-height:2.5">
                            <td style="width:72%">Style</td>
                            <td>Grey/XL/Cotton</td>
                        </tr>
                         <tr style="line-height:2.5">
                            <td style="width:72%">Item Price</td>
                            <td>{{$value['price']}} </td>
                        </tr>
                        <tr style="line-height:2.5">
                            <td style="width:72%;padding-bottom: 10px;">Quantity</td>
                            <td>{{$value['product_quantity']}}</td>
                        </tr>
                       
                          </tbody>
        </table>  @endforeach
        </div>

         <div class="li-1"style="width: 100%;float: left;line-height: 2.5;margin:0px 0px 15px 0px">
            <table style="width: 100%;max-width: 275px">
              <h2 style="font-family: sans-serif; color: #3088e2; margin-bottom:20px; margin-top: 5px; width:100%; max-width:370px">Product Amount Details</h2>
                    <tr  style="line-height:2.5">
                        <td>Subtotal</td>
                        <td>${{ $sub_total }}</td>
                    </tr>
                     <tr  style="line-height:2.5">
                        <td>Additional Charges</td>
                        <td>${{ $print_price }}</td>
                    </tr>
                    <tr  style="line-height:2.5">
                        <td>Packing<span>({{ $packing_name }})</span></td>
                        <td>${{ $packing_amount }}</td>
                    </tr>
                    <tr  style="line-height:2.5">
                        <td>Delivery<span>({{ $delivery_name }})</span></td>
                        <td>${{ $delivery_amount }}</td>
                    </tr>
                    <tr  style="line-height:2.5">
                        <td>Tax</td>
                        <!-- <span>({{ "GST 5%" }})</span></td> -->
                        <td>${{ $tax_total }}</td>
                    </tr>
                    <tr  style="line-height:2.5">
                        <td>Grand Total</td>
                        <td>${{ $grand_total }}</td>
                    </tr>
            </table>
        </div>
        <div class="li-1"style="width: 100%;float: left;margin-bottom:15px;">
            <h2 style="font-family: sans-serif; color: #3088e2; margin-bottom:20px;">Billing address</h2>
               <p style="display: block;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('no',$address[0])) { ?> {{ $address[0]['no'] }} <?php } ?></p>
                <p style="display: block;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('street_1',$address[0])) { ?> {{ $address[0]['street_1'] }} , {{ $address[0]['street_2'] }} <?php } ?></p>
                <p style="display: block; line-height: 15px;font-family: sans-serif;"> <?php if(array_key_exists('region',$address[0])) { ?> {{ $address[0]['region'] }} <?php } ?></p>
                <p style="display: block; font-family: sans-serif;"><?php if(array_key_exists('country',$address[0])){ ?>{{ $address[0]['country'] }} - {{ $address[0]['zipcode'] }} <?php } ?></p>
                <p style="display: block; line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('landmark',$address[0])){ ?> {{ $address[0]['landmark'] }} <?php } ?></p>
                <p style="display: block;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('contact_no',$address[0])){ ?>  Phone Number:<b> {{ $address[0]['contact_no'] }} <b> <?php } ?> </p>
        </div>
        
        <div class="li-1"style="width: 100%;float: left;margin-bottom:0px;">
            <h2 style="font-family: sans-serif; color: #3088e2; margin-bottom:20px;">Shipping address</h2>
            <p style="display: inline; line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('no',$address[0])) {?> {{ $address[0]['no'] }} <?php } ?> </p>
            <p style="display: inline;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('street_1',$address[0])) {?> {{ $address[0]['street_1'] }} , {{ $address[0]['street_2'] }} <?php } ?></p>
            <p style="display: inline;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('region',$address[0])) {?> {{ $address[0]['region'] }} <?php } ?></p>
            <p style="display: inline;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('country',$address[0])) {?> {{ $address[0]['country'] }} - {{ $address[0]['zipcode'] }} <?php } ?></p>
            <p style="display: inline;line-height: 15px; font-family: sans-serif;"><?php if(array_key_exists('landmark',$address[0])) {?> {{ $address[0]['landmark'] }} <?php } ?></p>
            <p style="display: inline; font-family: sans-serif;"><?php if((array_key_exists('contact_no',$address[0]))) { ?> Phone Number: <b>{{ $address[0]['contact_no'] }} <b> <?php } ?></p>
        </div>

        <p style="display: inline; line-height: 3.4; font-family: sans-serif;margin-bottom:10px;">Thanks for buying from <b>{{isset($order_items[0]['artist']['name']) ? $order_items[0]['artist']['name'] :''}} <b> </p>

        <h5 style="font-family:sans-serif;font-size: 17px;font-weight:bold;margin-bottom:10px">The Cool Jelly Bean team</h5>

    </div>
            <!-- <div class="footer" style="background: #000000c7; padding: 25px;">
                <p id="fp" style="color: #ffffffeb;width:100%; max-width:200px; margin:0 auto;margin-bottom:15px">© Cool Jelly Bean 2021</p>
                <p id="fp" style="color: #ffffffeb;width:100%;max-width: 420px; margin:0 auto;">Lorem ipsum registered address <br> insert legel registration company number here  </p> -->
<!--                  <p id="fp" style="color: #ffffffeb;width:100%;max-width: 300px; margin:0 auto;">Lorem ipsum registered address  <br> &#60 insert legel registration company number here &#62 </p> --> 
            <!-- </div> -->

            <div class="x_footer">
            <table style="background:#000000; padding:10px; width:1400px; text-align:center;" >
                        <tbody>
                        <tr>
                            <td  style="color:#ffffff;width:100%;max-width: 400px;line-height:15px;margin:0 auto;"><p id="x_fp" style="color:#ffffff;width:100%;max-width: 400px;line-height:15px;padding:0px; margin:0 auto;margin-bottom:0px;"><b><b><b>© Cool Jelly Bean 2021</b></b></b></p></td>
                       
                        </tr>
                        <tr>
                            <td style="color:#ffffff;width:100%;max-width:1400px;line-height:15px;margin:0 auto;"><p id="x_fp" style="color:#ffffff;width:100%;max-width: 500px;margin:0 auto;line-height:15px;padding:0px;"><b><b><b>Lorem ipsum registered address <br>insert legel registration company number here </b></b></b></p></td>
                       
                        </tr>
                        
                      </tbody>
             </table>
             </div>
        </div>
    </body>
</html>