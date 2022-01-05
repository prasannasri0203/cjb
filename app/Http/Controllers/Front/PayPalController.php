<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Srmklive\PayPal\Services\ExpressCheckout;
use Stripe\Stripe;
use Stripe\Charge;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use Auth;
use App\OrderDetails;
use App\CartDetails;
use App\User;
use App\CartItemDetails;
use App\OrderCustomerAddressDetails;
use App\OrderItem;
use App\Revenuesharing;
use App\DeliveryAndPacking;
use App\Product_variant;
use App\Product;
use App\Print_types;
use Carbon\Carbon;
use Mail;
use Notification;
use App\address_book;
use App\Notifications\MyEnquiryNotification;
use App\Notifications\MyOrderNotification;
use App\Notifications\MyFaultAndReturnsNotification;
use App\Supplier;
use App\MerchandiseProductImages;
use DB;
use File;

class PayPalController extends Controller
{
    
    public function payment()
    {
        $data = [];
        $cart_details = session()->get('cart_details');
        $total = (int)$cart_details['grand_total'];
        $order_ref = $cart_details['order_number'];
        
        $data['items'] = [['name' => 'Cool Jelly Bean', 'price' => $total, 'desc' => 'Description for ItSolutionStuff.com', 'qty' => 1]];

        $data['invoice_id'] = $order_ref;
        $data['invoice_description'] = "Order {$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $total;
        
        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);

        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);
    }

    public function paymentPage(Request $request)
    {
        return view('front/paypal_page');
    }

    
    public function cancel()
    {
        return redirect()->away('https://www.sandbox.paypal.com');
    }

    
    public function success(Request $request)
    {

        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']) , ['SUCCESS', 'SUCCESSWITHWARNING']))
        {
            $responseJSON = json_encode($response);

            $content = [];
            $itemData = [];

            // Email data
            $data = Session::get('cart_details');

            $orderDetails = OrderDetails::where('order_id', $data['order_number'])->with('orderItemDetails', 'orderItemDetails.get_images', 'customerBillingAddress', 'orderItemDetails.orderProducts', 'customerDetails')
                ->first();

            foreach ($orderDetails->orderItemDetails as $key => $value)
            {
                $item = [];
                $item['id'] = $value->merchandise_product_id;
                $product = DB::select("SELECT * FROM artist_category WHERE id = '" . $value
                    ->orderProducts->artist_category_id . "'");
                $item['name'] = isset($product[0]->name_creation) ? $product[0]->name_creation : '';
                $item['image'] = (isset($value
                    ->orderProducts
                    ->image) && ($value
                    ->orderProducts->image != '')) ? $value
                    ->orderProducts->image : '';
                $item['price'] = $value->product_price;
                $item['product_quantity'] = $value->product_quantity;
                $reqfile = '';
                if ($value->get_images != '') $reqfile = $value
                    ->get_images->file;
                $item['file'] = $reqfile;
                $itemData[] = $item;
            }

            // return $itemData;
            $address['no'] = $orderDetails
                ->customerBillingAddress->no;
            $address['street_1'] = $orderDetails
                ->customerBillingAddress->street_1;
            $address['street_2'] = $orderDetails
                ->customerBillingAddress->street_2;
            $address['region'] = $orderDetails
                ->customerBillingAddress->region;
            $address['country'] = $orderDetails
                ->customerBillingAddress->country;
            $address['zipcode'] = $orderDetails
                ->customerBillingAddress->zipcode;
            $address['contact_no'] = $orderDetails
                ->customerBillingAddress->contact_no;
            $address['landmark'] = $orderDetails
                ->customerBillingAddress->landmark;
            $addressData[] = $address;

            $content['order_id'] = $orderDetails->id;
            $content['order_ref'] = $orderDetails->order_id;
            $content['name'] = Auth::user()->name;
            $content['email'] = Auth::user()->email;
            $content['sub_total'] = $orderDetails->sub_total;
            $content['print_price'] = $orderDetails
                ->cardDetails->print_price;
            $content['tax_total'] = $orderDetails->tax_total;
            $content['grand_total'] = $orderDetails->grand_total;
            $content['payment_type'] = $orderDetails->payment_type;
            $content['packing_name'] = $orderDetails->packing_name;
            $content['packing_amount'] = $orderDetails->packing_amount;
            $content['delivery_name'] = $orderDetails->delivery_name;
            $content['delivery_amount'] = $orderDetails->delivery_amount;
            $content['artist_revenue'] = $orderDetails->artist_revenue;
            $content['order_items'] = $itemData;

            $content['supplier_mail'] = Supplier::where('id', $orderDetails->orderItemDetails[0]
                ->supplier_id)
                ->pluck('email')
                ->first();
            $content['artist_mail'] = User::where('id', $orderDetails->artist_id)
                ->pluck('email')
                ->first();
            $content['address'] = $addressData;
            $content['product'] = product::where('supplier_id', $orderDetails->orderItemDetails[0]
                ->supplier_id)
                ->first();

            $cc_mail = DB::table('users')->where('type', '0')
                ->pluck('email')
                ->toArray();

            //notification
            $user = User::where('type', '0')->get();
            if ($user)
            {
                $details = ['id' => $data['orderItemDetailsId'], 'url' => 'admin/order_view/' . $data['orderItemDetailsId'], ];
                Notification::send($user, new MyOrderNotification($details));
            }
            try
            {

                $images = DB::table('merchandise_product_images')->where('merch_product_id', $data['merchandiseProductId'])->get();

                $layers = DB::table('merchandise_product_files')->where('merch_product_id', $data['merchandiseProductId'])->get();
                if (isset($content['order_items'][0]['file']))
                {

                    // ini_set('max_execution_time', 300);
                    $destinationPath = public_path('/merchandise-img/');

                    $content['mail_type'] = 'customer';
                    if ($content != '' && $destinationPath != '' && $images != '' && $layers != '' && $cc_mail != '' && $content['email'] != '')
                    {

                        Mail::send('mails/order_mail', $content, function ($message) use ($content, $destinationPath, $images, $layers, $cc_mail)
                        {
                            $message->to($content['email'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
                            $message->from('xyz@gmail.com');
                            $message->cc($cc_mail);
                            $message->setBody('test');

                            foreach ($layers as $key => $value)
                            {

                                $destionationPath = $destinationPath . $value->file;

                                $isExists = File::exists($destionationPath);
                                if ($isExists)
                                {
                                    $message->attach($destinationPath . $value->file, ['as' => 'attachment.pdf', 'mime' => 'application/pdf', ]);
                                }
                            }

                            foreach ($images as $key => $value)
                            {

                                $destionationPath = $destinationPath . $value->file;
                                $isExists = File::exists($destionationPath);
                                if ($isExists)
                                {
                                    $message->attach($destinationPath . $value->file, ['as' => 'attachment.pdf', 'mime' => 'application/pdf', ]);
                                }
                            }
                        });
                    }

                    $content['mail_type'] = 'supplier';
                    if ($content != '' && $destinationPath != '' && $images != '' && $layers != '' && $cc_mail != '' && $content['supplier_mail'] != '')
                    {

                        Mail::send('mails/order_mail', $content, function ($message) use ($content, $destinationPath, $images, $layers, $cc_mail)
                        {
                            $message->to($content['supplier_mail'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
                            $message->from('xyz@gmail.com');
                            $message->cc($cc_mail);

                            $message->setBody('test');

                            foreach ($layers as $key => $value)
                            {

                                $isExists = File::exists($destinationPath . $value->file);

                                if ($isExists)
                                {
                                    $message->attach($destinationPath . $value->file, ['as' => 'attachment.pdf', 'mime' => 'application/pdf', ]);
                                }
                            }

                            foreach ($images as $key => $value)
                            {

                                $isExists = File::exists($destinationPath . $value->file);
                                if ($isExists)
                                {
                                    $message->attach($destinationPath . $value->file, ['as' => 'attachment.pdf', 'mime' => 'application/pdf', ]);
                                }
                            }
                        });
                    }

                    $content['mail_type'] = 'artist';
                    if ($content != '' && $destinationPath != '' && $images != '' && $layers != '' && $cc_mail != '' && $content['artist_mail'] != '')
                    {

                        Mail::send('mails/order_mail', $content, function ($message) use ($content, $destinationPath, $images, $layers, $cc_mail)
                        {
                            $message->to($content['artist_mail'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
                            $message->from('xyz@gmail.com');
                            $message->cc($cc_mail);
                            $message->setBody('test');
                            foreach ($layers as $key => $value)
                            {

                                $isExists = File::exists($destinationPath . $value->file);
                                if ($isExists)
                                {
                                    $message->attach($destinationPath . $value->file, ['as' => 'attachment.pdf', 'mime' => 'application/pdf', ]);
                                }
                            }
                            foreach ($images as $key => $value)
                            {
                                $isExists = File::exists($destinationPath . $value->file);
                                if ($isExists)
                                {
                                    $message->attach($destinationPath . $value->file, ['as' => 'attachment.pdf', 'mime' => 'application/pdf', ]);
                                }
                            }
                        });
                    }

                }
                else
                {

                    if ($content != '' && $cc_mail != '')
                    {

                        Mail::send('mails/order_mail', $content, function ($message) use ($content, $cc_mail)
                        {
                            $message->to($content['email'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
                            $message->from('xyz@gmail.com');
                            $message->cc($cc_mail);
                            $message->setBody('test');

                        });

                        Mail::send('mails/order_mail', $content, function ($message) use ($content, $cc_mail)
                        {
                            $message->to($content['supplier_mail'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
                            $message->from('xyz@gmail.com');
                            $message->cc($cc_mail);
                            $message->setBody('test');
                        });

                        $content['mail_type'] = 'artist';
                        Mail::send('mails/order_mail', $content, function ($message) use ($content, $cc_mail)
                        {
                            $message->to($content['artist_mail'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
                            $message->from('xyz@gmail.com');
                            $message->cc($cc_mail);
                            $message->setBody('test');
                        });
                    }
                }

            }
            catch(\Exception $e)
            {
                return $e;
            }
            $user_id = Auth::user()->id;
            $cartDetails = CartDetails::where('customer_id', $user_id)->where('id', $data['cart_id'])->with('cartItems', 'cartItems.cartProducts', 'cartItems.cartProducts.ProductDetails', 'cartItems.cartProducts.ProductDetails.supplierName')
                ->first();

            $contents['email'] = $cartDetails->email;
            try
            {
                if (isset($contents['email']) && $content != '' && $cc_mail != '')
                {
                    Mail::send('mails/order_mail', $content, function ($message) use ($content, $cc_mail)
                    {
                        $message->to($contents['email'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
                        $message->from('xyz@gmail.com');
                        $message->cc($cc_mail);
                        $message->setBody('test');
                        $message->attach($pic);

                    });
                }
            }
            catch(\Exception $e)
            {
                return $e;
            }

            $orderDetails = OrderDetails::where('order_id', $cart_details['order_number'])->first();
            $orderDetails->status = 2;
            $orderDetails->order_ref_number = $response['txn_id'];
            $orderDetails->order_api_response = $responseJSON;
            $orderDetails->update();

            session()
                ->put('cartCount', 0);
            return view('front/cart/checkout_pay_card');

            // dd('Your payment was successfully. You can create success page here.');
            
        }

        dd('Something is wrong.');
    }
}

