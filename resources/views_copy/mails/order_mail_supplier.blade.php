<head>
    <title>Merchandise</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/jquery-2.2.3.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/owl.min.css">
    <link rel="stylesheet" href="css/owl.default.css">
    <script src="js/custom.js"></script>
    <style type="text/css">
        .tooltip_content {
            left: 56.3%;
            top: 59%;
        }
        .row {
            border: 1px solid #ccc;
        }
        .order_item_wr h3{
            text-align: center;
            background: #2d2d2d;
            margin: 0;
            padding: 10px 0;
            color: #fff;
        }
        .image_wr {
            width: 30%;
            float: left;
            padding:15px;
        }
        .item_details_wr {
            width: 50%;
            float: left;
        }
        .image_wr img.img-responsive {
            width: 150px;
            height: auto;
        }
        .billing_wr, .shipping_wr {
            float: left;
            padding: 9px;
            width: 45%;
        }
        .order_total_wr {
            /* text-align: center; */
            margin: 0 auto;
            width: 50%;
        }
        .address_wr {
            background: #1289b4;
            color: #000 !important;
        }
        span.product_name {
            font-size: 25px;
            font-weight: 600;
        }
        .message_content p{
            padding-left:10px;
        }
    </style>
</head>
<body>
    <div class="container" style="width:70%;margin:0 auto;">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 no-padding logo_wr">
                <a href="#" style="text-align: center;display: block;">
                    <img src=/images/logo.png class="img-responsive" />
                </a>
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 no-padding message_wr">
                <div class="message_content" >
                    <h3 style="text-align:center">Your Order is Confirmed.</h3>
                    <p> Hi <span>{{ $name }},</span></p>
                    <p> We've received your order number <span> {{ $order_ref }}. </span></p>
                    <p> You will receive your order shortly</p>
                </div>
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 no-padding message_wr">
                <div class="order_item_wr">
                    <h3>Ordered Items</h3>
                    @foreach($order_items as $key => $value)
                    
                    <div class="row">

                        <div class="image_wr">
                            <a href="{{ URL('product_detail/'.$value['id']) }}">
                                @php
                                $cat_image = App\MerchandiseProductImages::where('merch_product_id',$value['id'])->first();
                                @endphp
                                <img src="{{ $cat_image['image']  ? asset('merchandise-img/').'/'.$cat_image['image'] : asset('/images/mug.png') }}" class="img-responsive uploadimg" />
                            </a>
                            <!-- <img src="http://127.0.0.1:8000/images/tshirt2.png" class="img-responsive" /> -->
                        </div>

                        <div class="item_details_wr">
                            <p><span class="product_name">{{$value['name']}}</span></p>
                            <table>
                                <tr class="item_description">
                                    <td>Grey</td>
                                    <td>XL</td>
                                    <td>Cotton</td>
                                </tr>
                                <tr>
                                    <td>Item Price:</td>
                                    <td>${{$value['price']}}</td>
                                </tr>
                                <tr>
                                    <td>Quantity:</td>
                                    <td>{{$value['product_quantity']}}</td>
                                </tr>
                            </table>
                        </div>

                    </div><!-- Inner Roew -->
                    @endforeach

                </div>
            </div>            
        </div>

        <div class="row" style="clear: both;">
            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 no-padding address_wr">
                <div class="order_total_wr">
                    <table style="width: 100%;color: #fff;padding: 20px 0;">
                        <tr>
                            <td>Subtotal</td>
                            <td>${{ $sub_total }}</td>
                        </tr>
                        <tr>
                            <td>Packing<span>({{ $packing_name }})</span></td>
                            <td>${{ $packing_amount }}</td>
                        </tr>
                        <tr>
                            <td>Delivery<span>({{ $delivery_name }})</span></td>
                            <td>${{ $delivery_amount }}</td>
                        </tr>
                        <tr>
                            <td>Tax<span>({{ "GST 5%" }})</span></td>
                            <td>${{ $tax_total }}</td>
                        </tr>
                        <tr>
                            <td>Grand Total</td>
                            <td>${{ $grand_total }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 no-padding address_wr">
                <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6 no-padding billing_wr">
                    <h3>Billing Address</h3>
                    <p>{{ $address[0]['no'] }}</p>
                    <p>{{ $address[0]['street_1'] }} , {{ $address[0]['street_2'] }}</p>
                    <p>{{ $address[0]['region'] }}</p>
                    <p>{{ $address[0]['country'] }} - {{ $address[0]['zipcode'] }}</p>
                    <p>{{ $address[0]['landmark'] }}</p>
                    <p>Contact: {{ $address[0]['contact_no'] }}</p>

                </div>
                <div class="col-sm-6 col-xs-6 col-lg-6 col-md-6 no-padding shipping_wr">
                    <h3>Shipping Address</h3>
                    <p>{{ $address[0]['no'] }}</p>
                    <p>{{ $address[0]['street_1'] }} , {{ $address[0]['street_2'] }}</p>
                    <p>{{ $address[0]['region'] }}</p>
                    <p>{{ $address[0]['country'] }} - {{ $address[0]['zipcode'] }}</p>
                    <p>{{ $address[0]['landmark'] }}</p>
                    <p>Contact: {{ $address[0]['contact_no'] }}</p>
                </div>
            </div>
        </div>

        <!-- <footer>
        <div class="container "> -->
            <div class="row " style="clear: both;background: #000;color: #fff;text-align: center;">
                <div class="col-sm-3 ">
                    <img src=images/footer_logo.png class="img-responsive inverlogo ">
                </div>
                <div class="col-sm-6 footcenter ">
                    <a href="# ">
                        <i class="fa fa-facebook-square " aria-hidden="true"></i>
                    </a>
                    <a href="# ">
                        <i class="fa fa-twitter-square " aria-hidden="true"></i>
                    </a>
                    <a href="# ">
                        <i class="fa fa-instagram " aria-hidden="true"></i>
                    </a>
                    <a href="# ">
                        <i class="fa fa-pinterest-square " aria-hidden="true"></i>
                    </a>
                    <p>© Cool Jelly Bean 2019</p>
                    <div class="desktop_foot_link ">
                        <a href="# " class="link ">Shipping &amp; Returns </a> <a class="link ">|</a>
                        <a href="# " class="link "> Terms &amp; Conditions </a><a class="link ">|</a>
                        <a href="# " class="link "> Privacy &amp; Cookies</a>
                    </div>
                    <div class="mobl_foot_link ">
                        <p> <a href="# " class="link ">Shipping &amp; Returns </a> <a class="link ">|</a>
                            <a href="# " class="link "> Terms &amp; Conditions </a></p>
                        <p><a href="# " class="link "> Privacy &amp; Cookies</a></p>
                    </div>

                </div>
                <div class="col-sm-3 ">
                    <div class="foot_pay ">
                        <h3>Secure Payments</h3>
                        <img src=images/pay.png  class="img-responsive ">
                    </div>
                </div>
            </div>
        <!-- </div>
    </footer> -->
    </div>

    
</body>