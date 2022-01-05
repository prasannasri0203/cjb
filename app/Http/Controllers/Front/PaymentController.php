<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
use App\MerchandiseProduct;
use App\Product_variant;
use App\Revenuesharing;
use App\DeliveryAndPacking;
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
use Crypt;
use File;
// use Stripe\Error\Card;
// use Cartalyst\Stripe\Stripe;
class PaymentController extends Controller
{
  
    public function stripe()
    {
        $cart_details = session()->get('cart_details');
        // dd($cart_details);   
        $order_number = $cart_details['order_number'];
        return view('front/stripe_page', compact('order_number'));
    }
     
    public function guest_stripe(Request $request)
    {
        $this->validate($request, ['first_name' => 'required', 
            'last_name' => 'required', 
            'email' => 'required', 
            'no' => 'required',
            'street_1'=>'required',
            'region'=>'required',
            'zipcode'=>'required',
            'country'=>'required',
            'contact_no'=>'required' ],

            $customMessages = [
            'first_name.required' => 'The First Name field is required.',
            'last_name.required' => 'The Last Name field is required.',
            'email.required' => 'The Email field is required.',
            'no.required' => 'The Door Number Name field is required.',
            'street_1.required' => 'The Address 1 field is required.',
            'region.required' => 'The Region field is required.',
            'zipcode.required' => 'The Postcode field is required.',
            'country.required' => 'The Country field is required.',
            'contact_no.required' => 'The Phone field is required.',
            ]
        );
 
        $user = new user();
        // $user->name =$request->first_name." ".$request->last_name;
        $user->first_name =$request->first_name;
        $user->last_name =$request->last_name; 
        $user->email =$request->email;
        $user->address_1 =$request->street_1;
        $user->address_2 =$request->street_2;
        $user->city =$request->region;
        $user->post_code =$request->zipcode;
        $user->country =$request->country;
        $user->contact_number =$request->contact_no;
        $user->password = '12345678';
        $user->type = '2';
        $user->save();
        if($user){

            $customerAddress = new OrderCustomerAddressDetails;
            $customerAddress->customer_id = $user->id;
            $customerAddress->delivery_name =  $request->first_name." ".$request->last_name;
            $customerAddress->no          =  $request->no;
            $customerAddress->street_1    =  $request->street_1;
            $customerAddress->street_2    =  $request->street_2;
            $customerAddress->region      =  $request->region;
            $customerAddress->country     =  $request->country;
            $customerAddress->zipcode     =  $request->zipcode;
            $customerAddress->is_primary  =  0;
            $customerAddress->contact_no  =  $request->contact_no;
            $customerAddress->save();

            $data = new address_book;
            $data->address1  = $request->street_1;
            $data->address2  = $request->street_2;
            $data->type      = $user->id;
            $data->user_id   = $user->id;
            $data->city_name = $request->region;
            $data->pscode    = $request->zipcode;
            $data->country   = $request->country;
            $data->phone     = $request->contact_no;
            $data->primary   = 0;
            $data->save();
            Auth::login($user);
        }
        
        return $this->stripe();
    }

    public function sampleOrder(Request $request)
    {
        return view('mails/order_mail');
    }

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function payStripe(Request $request)
    {
        $this->validate($request, ['card_no' => 'required', 'expiry_month' => 'required', 'expiry_year' => 'required', 'ccv' => 'required', ]);
        $stripe = Stripe::setApiKey('sk_test_51GuxWGBgoBYViK1lQMEPEZJOd474kMgiJyWYlcSNkWBkgcMiuWC4X9hYO3gZDp163rLRXp0qjCP5favGD0nzKTUd00TZUXcLNX');
      
        $stripe = new \Stripe\StripeClient('sk_test_51GuxWGBgoBYViK1lQMEPEZJOd474kMgiJyWYlcSNkWBkgcMiuWC4X9hYO3gZDp163rLRXp0qjCP5favGD0nzKTUd00TZUXcLNX');

        try
        {
            $token = $stripe
                ->tokens
                ->create(['card' => ['number' => $request->get('card_no') , 'exp_month' => $request->get('expiry_month') , 'exp_year' => $request->get('expiry_year') , 'cvc' => $request->get('ccv') , ], ]);

            if (!isset($token['id']))
            {
                return Redirect::to('strips')->with('Token is not generate correct');
            }
            $cart_details = session()->get('cart_details');

            $charge = Charge::create(array(
                'amount' => $cart_details['grand_total'] * 100,
                "source" => $token,
                'currency' => 'INR',
                'description' => $cart_details['order_number'],

            ));

            if ($charge)
            {
                $responseJSON = json_encode($charge);
                $content = [];
                $itemData =[];

                // Email data
                $data = Session::get('cart_details');

                $orderDetails = OrderDetails::where('order_id', $data['order_number'])->with('orderItemDetails', 'orderItemDetails.get_images', 'customerBillingAddress', 'orderItemDetails.orderProducts', 'customerDetails')
                    ->first();
                    
                $cartCheck = CartDetails::where('id',$orderDetails->cart_id)->first();
                $cartCheck->status   = 3;
                $cartCheck->update();

                $cartItemCheck = CartItemDetails::where('cart_id',$orderDetails->cart_id)->get();
                foreach ($cartItemCheck as $key => $value) {
                    $value->status  = 2;
                    $value->update();
                }

                foreach ($orderDetails->orderItemDetails as $key => $value)
                {
                    $item = [];
                    $item['id'] = $value->merchandise_product_id;
                    $item['name']= $value->orderProducts->name_creation;
                    $item['image'] = (isset($value
                        ->orderProducts
                        ->image) && ($value
                        ->orderProducts->image != '')) ? $value
                        ->orderProducts->image : '';
                    $item['price'] = $value->product_price;
                    $item['variant_ref_no'] = $value->orderProducts->variantDetails->product_variant_ref_no;
                    $item['artist_percent'] = $value->artist_percent;
                    $item['artist_revenue'] = $value->artist_revenue;
                    $item['affiliate_percent'] = $value->affiliate_percent;
                    $item['affiliate_revenue'] = $value->affiliate_revenue;
                    $item['admin_percent'] = $value->product_price;
                    $item['admin_revenue'] = $value->product_price;
                    $item['product_quantity'] = $value->product_quantity;
                    $reqfile = '';
                    if ($value->get_images != '') $reqfile = $value
                        ->get_images->file;
                    $item['file'] = $reqfile;
                    $item['supplier'] = Supplier::where('id', $value->supplier_id)
                    ->first();
                    $item['artist'] = User::where('id', $value->artist_id)->first();
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
                $content['print_price'] = $orderDetails->cardDetails->print_price;
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
                    
                    $data = Session::get('cart_details');

                    $images = DB::select("SELECT * FROM cart_item_management CIM 
                                    INNER JOIN merchandise_product_images MPF 
                                    ON MPF.merch_product_id = CIM.merchandise_product_id 
                                    WHERE CIM.cart_id ='".$data['cart_id']."'");
                    
                 
                    $layers= DB::select("SELECT * FROM cart_item_management CIM 
                                    INNER JOIN merchandise_product_files MPF 
                                    ON MPF.merch_product_id = CIM.merchandise_product_id 
                                    WHERE CIM.cart_id ='".$data['cart_id']."'");
                    // dd($layers);
                
                    if (isset($content['order_items'][0]['file']))
                    { 
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
                            foreach ($content['order_items'] as $orderKey => $orderValue) {

                                $artistData['orderValue'] = $orderValue; 
                                $artistData['content']   = $content;

                                Mail::send('mails/supplier_order_mail', $artistData, function ($message) use ($content, $destinationPath, $images, $layers, $cc_mail,$orderValue)
                                {
                                    $message->to($orderValue['supplier']['email'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
                                    $message->from('xyz@gmail.com');
                                    $message->cc($cc_mail);

                                    $message->setBody('test');

                                    $data = Session::get('cart_details');

                                    $artist_images = DB::select("SELECT * FROM cart_item_management CIM 
                                    INNER JOIN merchandise_product_images MPF 
                                    ON MPF.merch_product_id = CIM.merchandise_product_id 
                                    WHERE CIM.merchandise_product_id ='".$orderValue['id']."' 
                                    AND CIM.cart_id ='".$data['cart_id']."'");
                    
                                    $artist_layers= DB::select("SELECT * FROM cart_item_management CIM 
                                    INNER JOIN merchandise_product_files MPF 
                                    ON MPF.merch_product_id = CIM.merchandise_product_id 
                                    WHERE CIM.merchandise_product_id ='".$orderValue['id']."'
                                    AND CIM.cart_id ='".$data['cart_id']."'");
                                    
                                    foreach ($artist_layers as $key => $value)
                                    {

                                        $isExists = File::exists($destinationPath . $value->file);

                                        if ($isExists)
                                        {
                                            $message->attach($destinationPath . $value->file, ['as' => 'attachment.pdf', 'mime' => 'application/pdf', ]);
                                        }
                                    }

                                    foreach ($artist_images as $key => $value)
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
                        
                        $content['mail_type'] = 'artist';
                        if ($content != '' && $destinationPath != '' && $images != '' && $layers != '' && $cc_mail != '' && $content['artist_mail'] != '')
                        {
                            foreach ($content['order_items'] as $orderKey => $orderValue) {

                                $artistData['orderValue'] = $orderValue; 
                                $artistData['content']   = $content;

                                Mail::send('mails/artist_order_mail',$artistData, function ($message) use ($content, $destinationPath, $images, $layers, $cc_mail,$orderValue)
                                {
                                    $message->to($orderValue['artist']['email'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
                                    $message->from('xyz@gmail.com');
                                    $message->cc($cc_mail);
                                    $message->setBody('test');

                                    $data = Session::get('cart_details');

                                    $artist_images = DB::select("SELECT * FROM cart_item_management CIM 
                                    INNER JOIN merchandise_product_images MPF 
                                    ON MPF.merch_product_id = CIM.merchandise_product_id 
                                    WHERE CIM.merchandise_product_id ='".$orderValue['id']."' 
                                    AND CIM.cart_id ='".$data['cart_id']."'");
                    
                                    $artist_layers= DB::select("SELECT * FROM cart_item_management CIM 
                                    INNER JOIN merchandise_product_files MPF 
                                    ON MPF.merch_product_id = CIM.merchandise_product_id 
                                    WHERE CIM.merchandise_product_id ='".$orderValue['id']."'
                                    AND CIM.cart_id ='".$data['cart_id']."'");
                                    
                                    // dd($artist_layers);
                                    
                                    foreach ($artist_layers as $key => $value)
                                    {
                                        $isExists = File::exists($destinationPath . $value->file);
                                        if ($isExists)
                                        {
                                            $message->attach($destinationPath . $value->file, ['as' => 'attachment.pdf', 'mime' => 'application/pdf', ]);
                                        }
                                    }
                                    foreach ($artist_images as $key => $value)
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
                $cartDetails = CartDetails::where('customer_id', $user_id)->where('id', $data['cart_id'])
                    ->with('cartItems', 'cartItems.cartProducts', 'cartItems.cartProducts.ProductDetails', 'cartItems.cartProducts.ProductDetails.supplierName')
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
                $orderDetails->order_ref_number = $charge->id;
                $orderDetails->order_api_response = $responseJSON;
                $orderDetails->update();
                
                $product_variant = MerchandiseProduct::where('id',$data['merchandiseProductId'])->first();
                $quantityOfProduct = Session::get('quantityOfProduct');

                if($product_variant->product_variant_id !=''){
                    if($quantityOfProduct != null){

                        Product_variant::where('id', $product_variant->product_variant_id)->update(['quantites' => $quantityOfProduct]);     
                    }
                }

                session()->put('cartCount', 0);

                return view('front/cart/checkout_pay_card');
            }
        }
        catch(\Exception $ex)
        {
            return $ex->getMessage();
        }

    }
}

