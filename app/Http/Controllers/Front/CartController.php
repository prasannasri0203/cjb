<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MerchandiseProduct;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\CartDetails;
use App\CartItemDetails;
use Illuminate\Support\Facades\Hash;
use App\Mail\DemoEmail;
use App\OrderDetails;
use App\OrderCustomerAddressDetails;
use App\OrderItem;
use App\Revenuesharing;
use App\DeliveryAndPacking;
use App\Product_variant;
use App\ProductSupplier;
use App\Product;
use App\Print_types;
use Carbon\Carbon;
use Auth;
use Mail;
use App\User;
use Session;
use Notification;
use Validator;
use Input;
use App\address_book;
use App\Notifications\MyEnquiryNotification;
use App\Notifications\MyOrderNotification;
use App\Notifications\MyFaultAndReturnsNotification;
use App\Supplier;
use App\MerchandiseProductImages;
use URL;
use DB;
use File;

class CartController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // public function checkoutPage(){

    //     return view('front/cart/checkout_loggedin');
    // }
    // public function checkoutPageView(){
    //     return view('front/cart/checkout_pay_card');
    // }
    
    public function cardPageView(){
        
        $delivery = DeliveryAndPacking::where('type',1)->get();
        $packing = DeliveryAndPacking::where('type',2)->get();
        $delivery_id ='';
        $packing_id ='';
        $cartList= [];
        $additional_charge= 0;
        $cart_id = 0;
        $print_cost = 0;
        
        if(isset(Auth::user()->type)){
            $user_id= Auth::user()->id;
        }else{
            $user_id =0;
        }

        if (Auth::check() || $user_id == 0) {

            if(isset(Auth::user()->type) && (Auth::user()->type == 2 || Auth::user()->type == 1) || $user_id !='' || $user_id == 0){
                
                $cartData = CartDetails::where('customer_id',$user_id)->where('status',1)->where('ip_address',\Request::ip())->orderByDesc('id')->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();
            
                if($cartData ==null){

                    session()->put('cartCount',0);
                }  

                if($cartData != null){
                    
                    $packing_id = $cartData->packing_id;
                    $delivery_id = $cartData->delivery_id;
                    foreach ($cartData->cartItems as $key => $value) {
                        $id = $value->merchandise_product_id;
                        $product_details = MerchandiseProduct::where('id', $id)->with('artistDetails','merchProductImage','variantDetails')->first();

                        if($product_details){

                            $products = Product::where('id',$product_details->product_id)->where('deleted_at',null)->first();

                            $offset = count( $value->cartProducts->merchProductImage)-1;

                            if($offset >= 0)
                                if(isset($value->cartProducts->merchProductImage[$key]->image)){
                                    
                                    $cartList[$id]['image'] = $value->cartProducts->merchProductImage[$key]->image;
                                }else{
                                    $cartList[$id]['image'] = $value->cartProducts->merchProductImage[$offset]->image;
                                }

                            $cartList[$id]['id'] = $id;
                    
                            $artist_category = DB::select('SELECT * FROM artist_category as AC WHERE id ="'.$value->cartProducts->artist_category_id.'"');
                            
                            $cartList[$id]['name'] =$value->cartProducts->name_creation; 
                            // $value->cartProducts->merchandise_product_name;
                            $cartList[$id]['artist'] = $product_details->artistDetails->name;
                            $cartList[$id]['price'] = $value->cartProducts->product_price;  
                            $data=json_decode($product_details->variantDetails->attributes);
                            $cartList[$id]['size'] =$data[0];
                            $cartList[$id]['color'] =$data[1];
                            $cartList[$id]['quantity'] = $value->quantity;
                            $cartList[$id]['variant'] =$product_details->variantDetails->variant_name;
                            $cartList[$id]['shipping_price'] = ($products != null) ? $products->shipping_cost : 0;
                        }
                    }
                 
                    // $cartItemDetail = CartItemDetails::where('customer_id',$user_id)
                    // ->where('status','<=',2)->where('cart_id',$cartData->id)->get();


                    $cartItemDetail = DB::select("SELECT * FROM  cart_management as cm  
                                          INNER JOIN cart_item_management as cim ON cim.cart_id=cm.id 
                                          INNER JOIN merchandise_products as mp ON mp.id =cim.merchandise_product_id  
                                          INNER JOIN product_variants as pv ON pv.id = mp.product_variant_id
                                          INNER JOIN products as p ON p.id = mp.product_id
                                          WHERE cim.customer_id = $user_id AND  cim.status <= '2' 
                                          AND cim.cart_id = $cartData->id
                                          AND cim.deleted_at is null");

                    session()->put('cartCount', count($cartItemDetail));
                    
                    $cart_id = $cartData->id;
                    $print_cost = $cartData->print_price;
                }

                if(!empty($print_cost))
                {
                    $print_cost = 0;
                }
            }
        } else{

            $cartData = session()->get('cart');
    
            if($cartData != null){
                foreach ($cartData as $key => $value) {

                  
                $product_details = MerchandiseProduct::where('id', $key)->where('id', $key)->with('variantDetails')->first();
                $id=$product_details->id;
                $products = Product::where('id',$product_details->product_id)->where('deleted_at',null)->first();
                    $cartList[$key]['image'] = $value['photo'];
                    $cartList[$key]['id'] = $key;
            
                   // if(isset($value->cartProducts->artist_category_id) && $value->cartProducts->artist_category_id != ''){
                   //      $artist_category_id = $value->cartProducts->artist_category_id;
                   // }else{
                   //      $artist_category_id = ;
                   // }
                // $artist_category = DB::select("SELECT * FROM artist_category as AC WHERE id ='".$product_details->artist_category_id."'");
                // // dd($artist_category);
                   
                    // dd($value);
                    $cartList[$id]['name'] =$value['name_creation']; 
                    $cartList[$key]['name'] = $value['name_creation'];
                    $cartList[$key]['artist'] = $value['artist'];
                    $cartList[$key]['price'] = $value['price'];
                    $cartList[$key]['quantity'] = $value['quantity'];
                    $cartList[$key]['variant'] = $product_details->variantDetails->variant_name;
                     $data=json_decode($product_details->variantDetails->attributes);
                        $cartList[$key]['size'] =$data[0];
                        $cartList[$key]['color'] =$data[1];
                    $cartList[$key]['shipping_price'] = $products->shipping_cost;
                }
                $cart_id = 0;
                $print_cost = 0;
            }
            $packing_id = session()->get('packing_id');
            $delivery_id  = session()->get('delivery_id');
            session()->put('cartCount', count((array) session('cart')));
        }

        $product_print_type = !empty($product_details) ? Product::where('id',$product_details->product_id)->where('deleted_at',null)->get() : [];
    
        if(count($product_print_type) > 0 && $product_print_type[0]['approved_additional_type'])
        {
            $print_price='';
            $print_type = unserialize($product_print_type[0]['approved_additional_type']);
            if(isset($print_type) && $print_type != null ){
               $table_value = Print_types::whereIn('id', $print_type)->get('print_type_name');
            }else{
               $table_value ='';
               
            }
            if($product_print_type[0]['approved_additional_price'] !=null){
              $print_price = unserialize($product_print_type[0]['approved_additional_price']);
              $additional_charge = array_sum($print_price);
            }
        }
        else
        {
            $print_type='';
            $print_price='';
            $table_value = '';
        }

        return view('front/cart/cart_page_view',compact('delivery','packing','cartList','delivery_id','packing_id','print_type','print_price','table_value','cart_id','print_cost','additional_charge'));
    }
    
    public function printTypeUpdate(Request $request)
    {

        $cart_id = $request->input('id');
        $print_value = $request->input('value');

        $cartDetails = CartDetails::find($cart_id);
        $cartDetails->print_price =  $request->input('value');
        $cartDetails->save();
        $cartDetails = CartDetails::find($cart_id);

        return response()->json(['status' => 'success','message'=>'Print type updated Successfully']);
    }

    public function guestCheckoutPage(){

                $sessionData=Session('cart');
                if($sessionData !=''){
                    
                    foreach ($sessionData as $key => $value) {
                        
                        $product_details = MerchandiseProduct::where('name_creation',$value['name_creation'])->with('artistDetails','merchProductImage')->first();
                        // dd($product_details);
                        $product_quantity='';
                        if($product_details!='')  $product_quantity= Product_variant::where('id',$product_details['product_variant_id'])->where('status',1)->first();
                        $flag=0;
                       
                        if(!$product_quantity)
                        {
                            $flag=0;
                        } else {
                            $flag  = $this->addCart('',$product_details['id'],1,'with','guest');
                        }
                    }
                }
                
                $sub_total = 0;
                $shipping_price =0;
                $packing = DeliveryAndPacking::where('type',2)->get();
                $packing_id ='';
                $cart_id='';
                $user_id= 0;
                $cartData = CartDetails::where('customer_id',0)->where('status',1)->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();
                
                if($cartData !=null){
                    // $cartData->packing_id = 3;
                    
                    $packing_id = $cartData->packing_id;
                    $shipping_price = $cartData->shipping_price;
                   
                    $cart_id = $cartData->id;
                    foreach ($cartData->cartItems as $key => $value) {
                    
                        $id = $value->merchandise_product_id;
                        $product_details = MerchandiseProduct::where('id', $id)->with('artistDetails','merchProductImage')->first();

                        if($product_details){

                            $products = Product::where('id',$product_details->product_id)->where('deleted_at',null)
                            ->first();
                            if(count($value->cartProducts->merchProductImage)>0) $productimage  =   $value->cartProducts->merchProductImage[0]->image;
                            else $productimage  =   '';
                            $cartList[$id]['image'] = $productimage;
                            $cartList[$id]['id'] = $id;
                            $cartList[$id]['name'] = $value->cartProducts->merchandise_product_name;
                            $cartList[$id]['artist'] = $product_details->artistDetails->name;
                            $cartList[$id]['price'] = $value->cartProducts->product_price;
                            $cartList[$id]['quantity'] = $value->quantity;
                            $cartList[$id]['shipping_price'] = ($products != null) ? $products->shipping_cost : 0;
                            $sub_total = $sub_total+($value->quantity * $value->cartProducts->product_price);
                        }
                    }
                
                    $cartItemDetail = DB::select("SELECT * FROM  cart_management as cm  
                                      INNER JOIN cart_item_management as cim ON cim.cart_id=cm.id 
                                      INNER JOIN merchandise_products as mp ON mp.id =cim.merchandise_product_id  
                                      INNER JOIN product_variants as pv ON pv.id = mp.product_variant_id
                                      INNER JOIN products as p ON p.id = mp.product_id
                                      WHERE cim.customer_id = $user_id AND  cim.status < '2'  
                                      AND cim.deleted_at is null");
                }
                if(isset($cartItemDetail) && $cartItemDetail != ''){

                    session()->put('cartCount', count($cartItemDetail));
                    $cartData = session()->get('cartCount');
                }
                return view('front/cart/checkout_guest',compact('cartData','shipping_price','packing','sub_total','packing_id','cart_id'));
    }
    public function customerCheckoutPage(){

        $user_id= Auth::user()->id;

        // $delivery = DeliveryAndPacking::where('type',1)->get();
        $packing = DeliveryAndPacking::where('type',2)->get();
        // $delivery_id ='';
        $packing_id ='';
        
        $customerDetails = User::where('id',$user_id)->first();
        $customerAddress = OrderCustomerAddressDetails::where('customer_id',$user_id)->get();

        $sub_total = 0;
        if (Auth::check()) {
            if((Auth::user()->type == 2)||(Auth::user()->type == 1)){
                $user_id= Auth::user()->id;
                $cartData = CartDetails::where('customer_id',$user_id)->where('status',1)->orderByDesc('id')->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();

                $packing_id = $cartData->packing_id;
                $shipping_price = $cartData->shipping_price;

                $cart_id = $cartData->id;
                foreach ($cartData->cartItems as $key => $value) {
                
                    $id = $value->merchandise_product_id;
                    $product_details = MerchandiseProduct::where('id', $id)->with('artistDetails','merchProductImage')->first();

                    if($product_details){

                        $products = Product::where('id',$product_details->product_id)->where('deleted_at',null)
                        ->first();
                        if(count($value->cartProducts->merchProductImage)>0) $productimage  =   $value->cartProducts->merchProductImage[0]->image;
                        else $productimage  =   '';
                        $cartList[$id]['image'] = $productimage;
                        $cartList[$id]['id'] = $id;
                        $cartList[$id]['name'] = $value->cartProducts->merchandise_product_name;
                        $cartList[$id]['artist'] = $product_details->artistDetails->name;
                        $cartList[$id]['price'] = $value->cartProducts->product_price;
                        $cartList[$id]['quantity'] = $value->quantity;
                        $cartList[$id]['shipping_price'] = ($products != null) ? $products->shipping_cost : 0;
                        $sub_total = $sub_total+($value->quantity * $value->cartProducts->product_price);
                    }
                }

               
                $cartItemDetail = DB::select("SELECT * FROM  cart_management as cm  
                                      INNER JOIN cart_item_management as cim ON cim.cart_id=cm.id 
                                      INNER JOIN merchandise_products as mp ON mp.id =cim.merchandise_product_id  
                                      INNER JOIN product_variants as pv ON pv.id = mp.product_variant_id
                                      INNER JOIN products as p ON p.id = mp.product_id
                                      WHERE cim.customer_id = $user_id AND  cim.status < '2' 
                                      AND cim.cart_id = $cartData->id
                                      AND cim.deleted_at is null");

                session()->put('cartCount', count($cartItemDetail));
                $cartData = session()->get('cartCount');


            }
        } else{
            $cartData = session()->get('cart');
            $shipping_price= 0;
            $print_price = 0;
            $additional_charge = 0;

            foreach ($cartData as $key => $value) {
                $product_details = MerchandiseProduct::where('id', $key)->first();
                $products = Product::where('id',$product_details->product_id)->where('deleted_at',null)->first();
                $cartList[$key]['image'] = $value['photo'];
                $cartList[$key]['id'] = $key;
                $cartList[$key]['name'] = $value['name'];
                $cartList[$key]['artist'] = $value['artist'];
                $cartList[$key]['price'] = $value['price'];
                $cartList[$key]['quantity'] = $value['quantity'];
                // $cartList[$key]['shipping_price'] = $value['shipping_price'];
                $sub_total = $sub_total + ($value['quantity'] * $value['price']);
                $shipping_price = $products->shipping_cost + $shipping_price;
            }

            $packing_id = session()->get('packing_id');
            // $delivery_id  = session()->get('delivery_id');
            session()->put('cartCount', count((array) session('cart')));
        }

        if($cartData == 0){
            return redirect()->back();
        }

        if($products->print_price)
        {
            $extra_cost = unserialize($products->approved_additional_price);
        
            if($extra_cost)
            {
                $print_price = array_sum($extra_cost);
            }
            else
            {
                $print_price =0;
            }

        }elseif($products->print_price==''){

            $print_price = 0;
        }

        return view('front/cart/checkout_loggedin',compact('shipping_price','customerDetails','customerAddress','packing','packing_id','sub_total','cart_id','print_price'));
    }

    public function addAddressLoggedCustomer(Request $request){
        $rules = array(
            'delivery_name'=>'required',
            'no' => 'required',
            'street_1'  => 'required',
            // 'street_2'  => 'required',
            'region' => 'required',
            'country'   => 'required',
            'zipcode'    => 'required|regex:/\b\d{6}\b/',
            'contact_no'     => 'required|digits:10'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $data = array(
                'status' => 'error',
                'message'=>$validator->getMessageBag()->toArray()
            );
            return response()->json($data);
        }

        $customerAddress = new OrderCustomerAddressDetails;
            $customerAddress->customer_id = Auth::user()->id;
            $customerAddress->delivery_name =  $request->delivery_name;
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
        // $data->fname     = $request->no;
        $data->address1  = $request->street_1;
        $data->address2  = $request->street_2;
        $data->type      = Auth::user()->type;
        $data->user_id   = Auth::user()->id;
        $data->city_name = $request->region;
        $data->pscode    = $request->zipcode;
        $data->country   = $request->country;
        $data->phone     = $request->contact_no;
        $data->primary   = 0;
        $data->save();

            $data = array(
                'status' => 'success',
                'message'=>'Address added successfully!'
            );
        return response()->json($data);

    }

    public function addGuestCustomerDetails(Request $request){
        $customerAddress = new OrderCustomerAddressDetails;
            $customerAddress->customer_id = Auth::user()->id;
            $customerAddress->first_name  =  $request->first_name;
            $customerAddress->last_name   =  $request->last_name;
            $customerAddress->email       =  $request->email ;
            $customerAddress->no          =  $request->no;
            $customerAddress->street_1    =  $request->street_1;
            $customerAddress->street_2    =  $request->street_2;
            $customerAddress->region      =  $request->region;
            $customerAddress->country     =  $request->country;
            $customerAddress->zipcode     =  $request->zipcode;
            $customerAddress->contact_no  =  $request->contact_no;

        $customerAddress->save();
        return response()->json(['status' => 'success','message'=>'Address added successfully!']);

    }

    public function customerCheckout(Request $request){

        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $credentials = $this->credentials($request);
        if (Auth::attempt($credentials)) {


            if(isset($_POST['remember']))
            {
                setcookie('email', $request['email'], time()+31556926);
                setcookie('password', $request['password'], time()+31556926);
            }
            else
            {
                if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
                {
                    setcookie ('email', "", time() - 31556926);
                    setcookie ('password', "", time() - 31556926);
                }
            }

            $user_type = Auth::user()->type;

        } else{
            return response()->json(['status' => 'error','item_count' => count((array) session('cart')) ]);
        }

        if (Auth::check()) {
            
            // $get_guest_cart = CartDetails::where('customer_id',0)->get();
            //     if($get_guest_cart){
            //         foreach ($get_guest_cart as $key => $value) {
            //         if($value->id){
            //             //cart
            //             $cart_guest_data = CartDetails::where('customer_id',0)->where('id',$value->id)->first();
            //             $cart_guest_data->customer_id = Auth::user()->id;
            //             $cart_guest_data->update();    
            //             //cartItem
            //             $CartItemDetails = CartItemDetails::where('customer_id',0)->where('cart_id',$value->id)->first();
            //             $CartItemDetails->customer_id = Auth::user()->id;
            //             $CartItemDetails->update();
            //         }
            //     }
            // }

            $get_guest_cart = CartDetails::where('customer_id',0)->first();
            
            if($get_guest_cart !=''){
                            
                $cart_guest_data = CartDetails::where('customer_id',0)->where('id',$get_guest_cart->id)->first();
                $cart_guest_data->customer_id = Auth::user()->id;
                $cart_guest_data->update();

                $cartItemdetails=CartItemDetails::where('customer_id',0)->where('cart_id',$get_guest_cart->id)->whereNull('deleted_at')->get();    
                
                if($cartItemdetails !=''){

                    foreach ($cartItemdetails as $itemKey => $itemValue) {
                       
                        DB::table('cart_item_management')
                        ->where('id', $itemValue['id']) 
                        ->update(array('customer_id' => Auth::user()->id)); 
                    }
                }
            }

            if(Auth::user()->type == 2){
                $shipping_price =0;
                $user_id= Auth::user()->id;

                $todayTime = Carbon::now();

                $cartCheck = CartDetails::where('customer_id',$user_id)->where('status',1)->first();
            
                if($cartCheck == null){
                    
                    $packing_id =  session()->get('packing_id') ? session()->get('packing_id') :"";
                    // $shipping_price = session()->get('shipping_price')? session()->get('shipping_price'):"";

                    $cartDetail = new CartDetails;
                        $cartDetail->customer_id = $user_id;
                        $cartDetail->created_time = $todayTime->format("Y-m-d");
                        $cartDetail->notes = $request->notes?$request->notes:"";
                        $cartDetail->packing_id = $packing_id?$packing_id:"";
                        // $cartDetails->shipping_price = $shipping_price?$shipping_price:"";
                        $cartDetail->status = 1;

                    $cartDetail->save();
                    $newCartId = $cartDetail->id;

                } else{
                    $newCartId = $cartCheck->id;
                }
                $cart = session()->get('cart');
                if(isset($cart)) {

                    foreach ($cart as $key => $value) {
                        $cartItemCheck = CartItemDetails::where('merchandise_product_id',$key)
                        ->where('customer_id',$user_id)->where('cart_id',$newCartId)->where('status',1)->first();
                        $product_details = MerchandiseProduct::find($key);

                            if($cartItemCheck == null){
                                $cartItemDetail = new CartItemDetails;
                                    $cartItemDetail->cart_id = $newCartId;
                                    $cartItemDetail->customer_id = $user_id;
                                    $cartItemDetail->merchandise_product_id = $key;
                                    $cartItemDetail->quantity = $value['quantity'];
                                    $cartItemDetail->placed_date = $todayTime->format("Y-m-d");
                                    $cartItemDetail->status = 1;
                                    $cartItemDetail->save();
                            } else{
                                $cartItemCheck->quantity   = $cartItemCheck->quantity + $value['quantity'];
                                $cartItemCheck->update();
                            }


                        unset($cart[$key]);
                    }
                    $cartItemCheck = CartItemDetails::where('customer_id',$user_id)->where('cart_id',$newCartId)->where('status',1)->get();
                    foreach ($cartItemCheck as $key => $value) {
                        $product_details = MerchandiseProduct::find($value->merchandise_product_id);
                        $shipping_price = $value->shipping_price + $shipping_price;
                    }

                    $cartCheck->shipping_price   = $shipping_price;
                    $cartCheck->update();
                    // $newCartId = $cartCheck->id;
                    session()->put('cart', $cart);
                }
 
                $cartItemDetail = DB::select("SELECT * FROM  cart_management as cm  
                                      INNER JOIN cart_item_management as cim ON cim.cart_id=cm.id 
                                      INNER JOIN merchandise_products as mp ON mp.id =cim.merchandise_product_id  
                                      INNER JOIN product_variants as pv ON pv.id = mp.product_variant_id
                                      INNER JOIN products as p ON p.id = mp.product_id
                                      WHERE cim.customer_id = $user_id AND  cim.status = '1' 
                                      AND cim.cart_id = $newCartId 
                                      AND cim.deleted_at is null");

                session()->put('cartCount', count($cartItemDetail));
            }
        }
        return response()->json(['status' => 'success','item_count' => count((array) session('cart')) ]);

    }

    public function updateCartQty(Request $request){
       
        $delivery = DeliveryAndPacking::where('type',1)->get();
        $packing = DeliveryAndPacking::where('type',2)->get();
        $delivery_id ='';
        $packing_id ='';
        $sub_total =0;
        $product_details = MerchandiseProduct::find($request->product_id);
        
        if(isset(Auth::user()->id)){
            $user_id= Auth::user()->id;
            $guest = '';
        }else{
            $user_id =0;
            $guest ='guest';
        }

        if (Auth::check() || $user_id==0) {
            if(isset(Auth::user()->type) && (Auth::user()->type == 2 || Auth::user()->type == 1) || $user_id==0 ){

                $product_varient = Product_variant::where('id',$product_details->product_variant_id )->first();
          
                if($product_varient->quantites>=$request->quantity || $product_varient->quantites == null){
                    $flag  = $this->addCart($request->note,$request->product_id,$request->quantity,'without',$guest);

                    
                    $cartData = CartDetails::where('customer_id',$user_id)->where('status',1)->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();
                    
                    if($cartData != null){

                        $packing_id = $cartData->packing_id;
                        $delivery_id = $cartData->shipping_price;
                        foreach ($cartData->cartItems as $key => $value) {
                            $id = $value->merchandise_product_id;
                            if($request->product_id == $id){
                                $item_wise = $value->cartProducts->product_price * $value->quantity;
                            }
                            $sub_total =$sub_total+($value->cartProducts->product_price * $value->quantity);
                        }
                    
                        $cartItemDetail = CartItemDetails::where('customer_id',$user_id)
                        ->where('status','<=',2)->where('cart_id',$cartData->id)->get();
 
              
                        session()->put('cartCount', count($cartItemDetail));
                         return response()->json(['status' => 'success','message'=>'Product quantity update successfully...' ]);
                    }
                } else {
                     return response()->json(['status' => 'error','message'=>'Product quantity not avaliable!' ]);
                }

            }

        }else{
  
            $cart = session()->get('cart');
            if($cart != null) {

                if(isset($cart[$request->product_id]))
                {
                    $packing_id = session()->get('packing_id');
                    // $delivery_id  = session()->get('delivery_id');
                    $product_varient = Product_variant::where('id',$product_details->product_variant_id )->first();
                    if($product_varient->quantites>=$request->quantity){
                        foreach ($cart as $key => $value) {
                            if ($key == $request->product_id) {
                                $cart[$request->product_id]['quantity'] = $request->quantity;
                            }
                        }
                    }
                    else{
                        return response()->json(['status' => 'error','message'=>'Product quantity not avaliable!' ]);
                    }

                    session()->flash('message', 'Cart updated successfully');
                    session()->flash('message-type', 'success');
                    session()->put('cart', $cart);

                    foreach ($cart as $key => $value) {
                        

                        if ($key == $request->product_id) {
                            $item_wise = $value['price'] * $value['quantity'];
                        }
                        $sub_total =$sub_total+($value['price'] * $value['quantity']);
                    }

                }

                session()->put('cartCount', count((array) session('cart')));
            }
        }
        
         $data['product_id'] = $request->product_id;
         $data['sub_total'] = $sub_total;
         if(isset($item_wise)){
            $data['item_wise'] = $item_wise;
         }

        return response()->json(['status' => 'success','message'=>'Product Update to cart successfully!','data'=>$data ]);
    }

    public function cartItemRemove(Request $request){

        $sub_total = 0;
        $item_count=null;
        $data=null;
        if($request->product_id) {

            if(isset(Auth::user()->id)){
                $user_id= Auth::user()->id;
            }else{
                $user_id=0;
            }
            if (Auth::check() || $user_id ==0) {                
 
                if(isset(Auth::user()->type) && (Auth::user()->type == 2 || Auth::user()->type == 1) || $user_id ==0){                    
                    $cartCheck = CartDetails::where('customer_id',$user_id)->where('status','<',3)->first();

                    $find_quantity=CartItemDetails::where('cart_id',$cartCheck->id)->where('customer_id',$user_id)->where('merchandise_product_id',$request->product_id)->first();

                        if($find_quantity){

                            $update_quantity=$find_quantity->quantity;
                            $product_details = MerchandiseProduct::where('id', $request->product_id)->first();
                            $product_quantity= Product_variant::where('id',$product_details->product_variant_id)->where('status',1)->first();
                            $actual_quantity=$product_quantity->quantites;
                            $product_quantity->quantites   = $actual_quantity+$update_quantity;
                            $product_quantity->update();
                        
                            $remove_data = CartItemDetails::where('cart_id',$cartCheck->id)->where('customer_id',$user_id)->where('merchandise_product_id',$request->product_id)->delete();
        
                            if($remove_data){

                                $user_id= Auth::user()->id;
                                $cartData = CartDetails::where('customer_id',$user_id)->where('status',1)->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();
                                  
                                if($cartData != null){
                                    $packing_id = $cartData->packing_id;
                                    $delivery_id = $cartData->shipping_price;
                                    
                                    if($cartData->cartItems){

                                      foreach ($cartData->cartItems as $key => $value) {

                                         $sub_total =$sub_total+($value->cartProducts->product_price * $value->quantity);
                                      }     
                                    }
                            }

                              
                                $cartItemDetail = DB::select("SELECT * FROM  cart_management as cm  
                                      INNER JOIN cart_item_management as cim ON cim.cart_id=cm.id 
                                      INNER JOIN merchandise_products as mp ON mp.id =cim.merchandise_product_id  
                                      INNER JOIN product_variants as pv ON pv.id = mp.product_variant_id
                                      INNER JOIN products as p ON p.id = mp.product_id
                                      WHERE cim.customer_id = $user_id AND  cim.status = '1' 
                                      AND cim.cart_id = $cartData->id 
                                      AND cim.deleted_at is null");

                                session()->put('cartCount', count($cartItemDetail));
                                $item_count =  count($cartItemDetail);

                            }
                        }
                    }

            } else {

                $cart = session()->get('cart');
                if(isset($cart[$request->product_id])) {
                 foreach ($cart as $key => $value) {
                    $product_details = MerchandiseProduct::where('id', $request->product_id)->first();
                    $product_quantity= Product_variant::where('id',$product_details->product_variant_id)->where('status',1)->first();
                    $actual_quantity=$product_quantity->quantites;
                    $product_quantity->quantites   = $actual_quantity+$value['quantity'];
                    $product_quantity->update();
                }
                    unset($cart[$request->product_id]);
                    session()->put('cart', $cart);

                }

                $cart = session()->get('cart');

                $packing_id = session()->get('packing_id');
                $delivery_id  = session()->get('delivery_id');
                foreach ($cart as $key => $value) {

                    $sub_total =$sub_total+($value['price'] * $value['quantity']);
                }

            $item_count = count((array) session('cart'));
                session()->put('cartCount', count((array) session('cart')));
                session()->flash('success', 'Product removed successfully');
            }

            $data['sub_total'] = $sub_total;

            if(($item_count !=null || $item_count ==0) && ($data !=null || $data !=0 )){

                return response()->json(['status' => 'success','message'=>'Product removed successfully','item_count' => $item_count,'data'=>$data ]);

            }else{

                return response()->json(['status' => 'failed','message'=>'Something Went to Wrong','item_count' => $item_count,'data'=>$data ]);

            }
        }
    }

    public function addToCart(Request $request){

        $product_details = MerchandiseProduct::where('id', $request->product_id)->with('artistDetails','merchProductImage')->first();
        $product_quantity='';
        if($product_details!='')  $product_quantity= Product_variant::where('id',$product_details->product_variant_id)->where('status',1)->first();

        $flag=0;
        if(isset(Auth::user()->type)){

            $guest = '';
        }else{

           $guest = 'guest';
        }
        if (Auth::check() || $guest =="guest") {
        
            if(isset(Auth::user()->type) && (Auth::user()->type == 2||Auth::user()->type == 1) || $guest =="guest"){

                if(!$product_quantity)
                {
                    $flag=0;
                } else {
                    $flag  = $this->addCart($request->note,$request->product_id,1,'with',$guest);
                }
            }else{
                return response()->json(['status' => 'auth','message'=>'Artist cant add','item_count' => 0 ]);
            }

        } else{
            $cart = session()->get('cart');

            if(!$cart) {
                $quantity=$product_quantity->quantites;
                 
                if($quantity >=1){
                     $cart[$request->product_id] = [
                        "name_creation" => $product_details->name_creation,
                        "name"      => $product_details->merchandise_product_name,
                        "quantity"  => 1,
                        "price"     => $product_details->product_price,
                        "photo"     => $product_details->merchProductImage[0]->image,
                        "artist"    => $product_details->artistDetails->name,
                        // "delivery"  => 0
                        // "shipping_price"    =>$product_details->shipping_price
                     ];

                session()->put('cart', $cart);
                // $product_quantity->quantites   = $quantity-1;
                // $product_quantity->update();
                $flag=1;
                }
                $cart = session()->get('cart');


            } else {

                if(isset($cart[$request->product_id]))
                {
                    $quantity=$product_quantity->quantites;
                    if($quantity >=1){
                         foreach ($cart as $key => $value) {
                            if ($key == $request->product_id) {
                                $cart[$request->product_id]['quantity']++;
                            }
                        }
                        session()->put('cart', $cart);
                        // $product_quantity->quantites   = $quantity-1;
                        // $product_quantity->update();
                    $flag=1;
                    }

                } else{
                        $quantity=$product_quantity->quantites;
                        if($quantity >=1){
                            $cart[$request->product_id] = [
                                "name_creation" =>$product_details->name_creation,
                                "name"      => $product_details->merchandise_product_name,
                                "quantity"  => 1,
                                "price"     => $product_details->product_price,
                                "photo"     => $product_details->merchProductImage[0]->image,
                                "artist"    => $product_details->artistDetails->name,
                                // "shipping_price"    => $product_details->shipping_price

                            ];
                            session()->put('cart', $cart);
                            // $product_quantity->quantites   = $quantity-1;
                            // $product_quantity->update();
                            $flag=1;
                        }
                }

            }
            
            session()->put('cartCount', count((array) session('cart')));
        }

        $cartData = session()->get('cartCount');

        if(($flag != 0)&&(($product_quantity->quantites > 0) || (is_null($product_quantity)) || (is_null($product_quantity->quantites)))){
            return response()->json(['status' => 'success','message'=>'Product added to cart successfully!','item_count' => $cartData ]);
        }
        else{
            return response()->json(['status' => 'error','message'=>'Out of Stock!','item_count' => 0 ]);
        }
    }

    public function deliveryUpdate(Request $request){
        if (Auth::check()) {
            if(Auth::user()->type == 2){
                $user_id= Auth::user()->id;
                $cartCheck = CartDetails::where('customer_id',$user_id)->where('status',1)->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();

                if($cartCheck == null){

                    $cartDetail = new CartDetails;
                        $cartDetail->customer_id = $user_id;
                        $cartDetail->created_time = $todayTime->format("Y-m-d");
                        $cartDetail->notes = "";
                        $cartDetail->delivery_id = $request->id;
                        $cartDetail->status = 1;
                    $cartDetail->save();
                } else{
                    $cartCheck->delivery_id   = $request->id;
                    $cartCheck->update();
                }

            }
        } else{
            session()->put('delivery_id', $request->id);
        }
        return response()->json(['status' => 'success','message'=>'Delivery Update Successfully']);
    }
    public function packingUpdate(Request $request){
        

        if(isset(Auth::user()->id)){
            $user_id= Auth::user()->id;
        }else{
            $user_id=0;
        }

        if (Auth::check() || $user_id==0) {
            if(isset(Auth::user()->type) && (Auth::user()->type == 2||Auth::user()->type == 1) ||$user_id==0){
                $cartCheck = CartDetails::where('customer_id',$user_id)->where('status',1)->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();

                if($cartCheck == null){

                    $cartDetail = new CartDetails;
                        $cartDetail->customer_id = $user_id;
                        $cartDetail->created_time = $todayTime->format("Y-m-d");
                        $cartDetail->notes = "";
                        $cartDetail->packing_id = $request->id;
                        $cartDetail->status = 1;
                    $cartDetail->save();
                } else{
                    $cartCheck->packing_id   = $request->id;
                    $cartCheck->update();
                }
            }
        } else{
            session()->put('packing_id', $request->id);
        }
        return response()->json(['status' => 'success','message'=>'Packing Update Successfully']);
    }

    public function customerOrder(Request $request){
// dd('moni');
// dd($request->all()); die;
        if($request->guest == "guest"){        
           $this->validate($request, ['first_name' => 'required', 
                'last_name' => 'required', 
                'email' => 'required|email', 
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


            $user = User::where('email', '=', $request->email)->first();
            
            if($user == ''){

                $user = new user();
                $user->name =$request->email;
                $user->first_name =$request->first_name;
                $user->last_name =$request->last_name; 
                $user->email =$request->email;
                $user->address_1 =$request->street_1;
                $user->address_2 =$request->street_2;
                $user->city =$request->region;
                $user->post_code =$request->zipcode;
                $user->country =$request->country;
                $user->contact_number =$request->contact_no;
                $user->password = Hash::make('Customer@123');
                $user->type = '2';
                $user->status = '1';
                $user->save();
                
                Mail::to($request)->send(new DemoEmail($request));
            }
            
            if($user){

                //auto login
                Auth::login($user);

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
                

                if($request->cart_id){
                    
                    $cart_guest_data = CartDetails::where('customer_id',0)->where('id',$request->cart_id)->first();
                    if($cart_guest_data != null){
                    $cart_guest_data->customer_id = Auth::user()->id;
                    $cart_guest_data->packing_id = $request->packing_id;
                    $cart_guest_data->update();

                    $cartItemdetails=CartItemDetails::where('customer_id',0)->where('cart_id',$request->cart_id)->whereNull('deleted_at')->get();    
                    if($cartItemdetails !=''){

                        foreach ($cartItemdetails as $itemKey => $itemValue) {

                            DB::table('cart_item_management')
                            ->where('id', $itemValue['id']) 
                            ->update(array('customer_id' => Auth::user()->id)); 
                        }
                        }
                    }
                }
            }
        }
    
        if((Auth::user()->type == 2)||(Auth::user()->type == 1)){
            if (Auth::check()) {
                
                $user_id= Auth::user()->id;
                $order_ref      = $this->orderRefNumber();
                $todayTime = Carbon::now();
                $cartCheck = CartDetails::where('id',$request->cart_id)->first();
                $cartCheck->completed_time   =  $todayTime->format("Y-m-d");
                $cartCheck->status   = 1;
                $cartCheck->update();
                  
                $cartItemCheck = CartItemDetails::where('cart_id',$request->cart_id)->get();
                foreach ($cartItemCheck as $key => $value) {
                    $value->status  = 1;
                    $value->update();
                    $product_details = MerchandiseProduct::where('id', $value->merchandise_product_id)->first();
                    // dd($product_details);
                    if($product_details !=null){

                        // $artist_id_item = $product_details->artist_id;
                        $artist_ids[] = $product_details->artist_id;
                    }   
                }
                $artist_id = implode(',',$artist_ids);

                // $delivery = DeliveryAndPacking::where('type',1)->where('id',$cartCheck->delivery_id)->first();
                $packing = DeliveryAndPacking::where('type',2)->where('id',$cartCheck->packing_id)->first();
                $revenueColl = Revenuesharing::get();
                
                    foreach ($revenueColl as $key => $revenue) {
                        if($revenue->setting_key == 'artist-default-commission'){
                            $artist_revenue = $revenue->setting_value/100;
                            $artist_percent = $revenue->setting_value;
                        }
                        if($revenue->setting_key == 'affiliate-default-commission'){
                            $affiliate_revenue = $revenue->setting_value/100;
                            $affiliate_percent = $revenue->setting_value;
                        }
                        if($revenue->setting_key == 'admin-default-commission'){
                            $admin_revenue = $revenue->setting_value/100;
                            $admin_percent = $revenue->setting_value;
                        }
                    }

                $orderDetails= new OrderDetails;
                $orderDetails->cart_id = $request->cart_id;
                $orderDetails->order_id = $order_ref;
                $orderDetails->customer_id = $user_id;
                $orderDetails->order_ref_number = 1;
                if($request->guest == "guest"){
                    $orderDetails->billing_address_id = $customerAddress->id;
                    $orderDetails->shipping_address_id = $customerAddress->id;   
                }else{
                   $orderDetails->billing_address_id = $request->billing_address;
                   $orderDetails->shipping_address_id = $request->billing_address;
                }
                $orderDetails->payment_type = 1;
                $orderDetails->shipping_item_count = session()->get('cartCount');
                $orderDetails->packing_name = $packing->delivery_name;
                $orderDetails->packing_amount = $packing->delivery_value;
                // $orderDetails->delivery_name = $delivery->delivery_name;
                $orderDetails->delivery_amount = $cartCheck->shipping_price;
                $orderDetails->sub_total = $request->sub_total;
                $orderDetails->tax_total = 0;
                $orderDetails->discount_total = 0;
                $orderDetails->shipping_total = 0;
                $orderDetails->grand_total = $request->grand_total;
                $orderDetails->artist_revenue = $artist_revenue*$request->sub_total;
                $orderDetails->affiliate_revenue = $affiliate_revenue*$request->sub_total;
                $orderDetails->admin_revenue = $admin_revenue*$request->sub_total;
                $orderDetails->artist_percent = $artist_percent;
                $orderDetails->affiliate_percent = $affiliate_percent;
                $orderDetails->admin_percent = $admin_percent;
                $orderDetails->artist_id = $artist_id;
                $orderDetails->affiliate_id = 0;
                $orderDetails->notes = $request->notes? $request->notes:"";
                $orderDetails->status = 1;
                $orderDetails->save();

                $newOrderId = $orderDetails->id;
                // $newOrderId = 11;

                if($newOrderId){
                    

                   $cartData = CartDetails::where('customer_id',$user_id)->where('id',$request->cart_id)->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();
                   if($cartData != null){
                      
                      $suplier_list='';
                      $supid='';
                      $min_sup_order='';
                      $cnt_sup_order=[];
                      $sup_id_order=[];
                      foreach ($cartData->cartItems as $key => $value) {
                        $id = $value->merchandise_product_id;
                        $product_details= MerchandiseProduct::where('id',$id)->with('ProductDetails.supplierName')->first();

                            // product multiple supplier assign mininum order
                          $suplier_list=$product_details->ProductDetails->productSuppliersList;
                     
                            foreach ($suplier_list as $skey => $sup) {
                                $order_sup=OrderItem::where('supplier_id',$sup->id)->get();
                                $order_count=count($order_sup); 
                                $cnt_sup_order[$sup->id] = $order_count;     
                            }
                            $min_sup_order=min($cnt_sup_order);
                            $supid=array_search($min_sup_order, $cnt_sup_order);
                            // print_r($suplier_list);
                            // print_r($product_details->product_id);
                            // print_r($min_sup_order);
                            // print_r($supid);
                            // print_r($cnt_sup_order);
                            // dd($product_details->ProductDetails->productSuppliersList[0]->id);
                             // die;

                        
                            $orderItemDetails= new OrderItem;
                            $orderItemDetails->order_id = $newOrderId;
                            $orderItemDetails->merchandise_product_id = $id;
                            $orderItemDetails->supplier_id = $supid;
                            // $orderItemDetails->supplier_id = (isset($product_details->ProductDetails->supplierName) && ($product_details->ProductDetails->supplierName != null))? $product_details->ProductDetails->supplierName->id :'';
                            $orderItemDetails->product_price = (isset($value->cartProducts->product_price) && ($value->cartProducts->product_price != null))? $value->cartProducts->product_price:'';
                            $orderItemDetails->product_quantity = $value->quantity;
                            $orderItemDetails->artist_id = $artist_ids[$key];
                            $orderItemDetails->affiliate_id = 0;
                            $orderItemDetails->artist_revenue = $artist_revenue*$orderItemDetails->product_price;
                            $orderItemDetails->affiliate_revenue = $affiliate_revenue*$orderItemDetails->product_price;
                            $orderItemDetails->admin_revenue = $admin_revenue*$orderItemDetails->product_price;
                            
                            $orderItemDetails->artist_percent = $artist_percent;
                            $orderItemDetails->affiliate_percent = $affiliate_percent;
                            $orderItemDetails->admin_percent = $admin_percent;
                            $orderItemDetails->status = 1;
                            $orderItemDetails->customer_id = $user_id;
                            $orderItemDetails->save();
                    }
                      }
                   }
               
                // $order_ref = '#ORDER20200000011';
                $cart_details['grand_total'] = $request->grand_total;
                $cart_details['order_number'] = $order_ref;
                $cart_details['qty'] = session()->get('cartCount');
                if(isset($orderItemDetails->id)){
                  $cart_details['orderItemDetailsId'] = $orderItemDetails->id;
                }
                if(isset($id) && $id != ''){
                   $cart_details['merchandiseProductId'] = $id;
                }
                $cart_details['cart_id'] = $request->cart_id;
                session()->put('cart_details', $cart_details);
                session()->put('cartCount',0);
                $content = [];
                $itemData =[];

                // Email data
                $orderDetails = OrderDetails::where('order_id',$order_ref)->with('orderItemDetails','orderItemDetails.get_images','customerBillingAddress','orderItemDetails.orderProducts','customerDetails')->first();
                foreach ($orderDetails->orderItemDetails as $key => $value) {
                    $item =[];
                    $item['id'] = $value->merchandise_product_id;
                    $product  = DB::select("SELECT * FROM artist_category WHERE id = '".$value->orderProducts->artist_category_id."'");
                    // $item['name'] =(isset($value->orderProducts->merchandise_product_name) && ($value->orderProducts->merchandise_product_name !=null))? 
                    // $value->orderProducts->merchandise_product_name:'';
                    //orderProducts->variantDetails->variant_name
                    
                    $item['name'] = isset($product[0]->name_creation) ? $product[0]->name_creation  :'';

                    $item['image'] = (isset($value->orderProducts->image) && ($value->orderProducts->image !=''))?$value->orderProducts->image : '';
                    $item['price'] = $value->product_price;
                    $item['variant_ref_no'] = $value->orderProducts->variantDetails->product_variant_ref_no;
                    $item['product_quantity'] = $value->product_quantity;
                    $reqfile    =   '';
                    if($value->get_images!='') $reqfile =   $value->get_images->file;
                    $item['file'] = $reqfile;
                    $itemData[] = $item;
                }

                // return $itemData;
                $address['no'] = $orderDetails->customerBillingAddress->no;
                $address['street_1'] = $orderDetails->customerBillingAddress->street_1;
                $address['street_2'] = $orderDetails->customerBillingAddress->street_2;
                $address['region'] = $orderDetails->customerBillingAddress->region;
                $address['country'] = $orderDetails->customerBillingAddress->country;
                $address['zipcode'] = $orderDetails->customerBillingAddress->zipcode;
                $address['contact_no'] = $orderDetails->customerBillingAddress->contact_no;
                $address['landmark'] = $orderDetails->customerBillingAddress->landmark;
                $addressData[] = $address;
                $content['order_id'] = $orderDetails->id;
                $content['order_ref'] = $orderDetails->order_id;
                $content['name'] = Auth::user()->name;
                $content['email'] = Auth::user()->email;
                $content['sub_total'] =  $orderDetails->sub_total;
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
             if(isset($orderDetails->orderItemDetails[0]) && $orderDetails->orderItemDetails[0] ){
                $orderData = @$orderDetails->orderItemDetails[0]->supplier_id;
                // $content['supplier_mail'] = Supplier::where('id',$orderDetails->orderItemDetails[0]->supplier_id)->pluck('email')->first();
                $content['artist_mail'] = User::where('id',$orderDetails->artist_id)->pluck('email')->first();
                $content['address'] = $addressData;
                $content['product'] = product::where('supplier_id',$orderDetails->orderItemDetails[0]->supplier_id)->first();
             }
                $cc_mail = DB::table('users')
                ->where('type', '0')
                ->pluck('email')
                ->toArray();

                //notification
 
                $user = User::where('type', '0')->get();
                if($user && isset($orderItemDetails->id)){
                    $details =[
                        'id'  => $orderItemDetails->id,
                        'url' => 'admin/order_view/'.$orderItemDetails->id,
                    ];
                Notification::send($user, new MyOrderNotification($details));
                } 
              
                try{
                    if(isset($id)){
                    $images = DB::table('merchandise_product_images')
                    ->where('merch_product_id', $id)
                    ->get();

                    $layers = DB::table('merchandise_product_files')
                    ->where('merch_product_id', $id)
                    ->get();
                    }
                    if(isset($content['order_items'][0]['file'])){

                        // ini_set('max_execution_time', 300);
                        $destinationPath = public_path('/merchandise-img/');
                        
                        if($request->payment_type == 'stripe'){
                           return redirect()->route('stripe_page');
                        } else {
                           return redirect()->route('paypal_page');
                        }
                        $content['mail_type'] = 'customer';
                        if($content != '' && $destinationPath!= '' && $images!= '' && $layers!= '' && $cc_mail != '' && $content['email'] !=''){
                    
                            Mail::send('mails/order_mail', $content, function($message) use ($content, $destinationPath, $images, $layers, $cc_mail) {
                            $message->to($content['email'])->subject('Cool Jelly Bean : New Order '.$content['order_ref']);
                            $message->from('xyz@gmail.com');
                            $message->cc($cc_mail);
                            $message->setBody('test');

                            foreach ($layers as $key => $value) {
                                
                                $destionationPath=$destinationPath.$value->file;

                                $isExists = File::exists($destionationPath);
                                if($isExists){
                                    $message->attach($destinationPath.$value->file, [
                                        'as' => 'attachment.pdf',
                                        'mime' => 'application/pdf',
                                    ]);
                                }   
                            } 

                            foreach ($images as $key => $value) {
                                
                                $destionationPath=$destinationPath.$value->file;
                                $isExists = File::exists($destionationPath);
                                if($isExists){
                                    $message->attach($destinationPath.$value->file, [
                                        'as' => 'attachment.pdf',
                                        'mime' => 'application/pdf',
                                    ]);
                                }
                            }
                            });  
                        }
                    
                        $content['mail_type'] = 'supplier';       
                        if($content !='' && $destinationPath !='' && $images !='' && $layers !='' && $cc_mail !='' && $content['supplier_mail'] !=''){

                            Mail::send('mails/order_mail', $content, function($message) use ($content, $destinationPath, $images, $layers, $cc_mail) {
                                $message->to($content['supplier_mail'])->subject('Cool Jelly Bean : New Order '.$content['order_ref']);
                                $message->from('xyz@gmail.com');
                                $message->cc($cc_mail);
                                
                                $message->setBody('test');
                                
                                foreach ($layers as $key => $value) {
                                 
                                    $isExists = File::exists($destinationPath.$value->file);

                                    if($isExists){
                                        $message->attach($destinationPath.$value->file, [
                                            'as' => 'attachment.pdf',
                                            'mime' => 'application/pdf',
                                        ]);
                                    }
                                }
                                
                                foreach ($images as $key => $value) {
                                    
                                    $isExists = File::exists($destinationPath.$value->file);
                                    if ($isExists) {
                                            $message->attach($destinationPath.$value->file, [
                                            'as' => 'attachment.pdf',
                                            'mime' => 'application/pdf',
                                        ]);
                                    }
                                }
                            });
                        }
    
                        $content['mail_type'] = 'artist';
                        if($content !='' && $destinationPath !='' && $images !='' && $layers !='' && $cc_mail !='' && $content['artist_mail'] !=''){

                            Mail::send('mails/order_mail', $content, function($message) use ($content, $destinationPath, $images, $layers, $cc_mail) {
                                $message->to($content['artist_mail'])->subject('Cool Jelly Bean : New Order '.$content['order_ref']);
                                $message->from('xyz@gmail.com');
                                $message->cc($cc_mail);
                                $message->setBody('test');
                                foreach ($layers as $key => $value) {
                                    
                                    $isExists = File::exists($destinationPath.$value->file);
                                    if ($isExists) {
                                        $message->attach($destinationPath.$value->file, [
                                        'as' => 'attachment.pdf',
                                        'mime' => 'application/pdf',
                                        ]);
                                    }
                                }
                                foreach ($images as $key => $value) {
                                    $isExists = File::exists($destinationPath.$value->file);
                                    if ($isExists) {
                                        $message->attach($destinationPath.$value->file, [
                                        'as' => 'attachment.pdf',
                                        'mime' => 'application/pdf',
                                        ]);
                                    }
                                }
                            });
                        }

                    }else{

                        if($content !='' && $cc_mail !=''){

                                Mail::send('mails/order_mail', $content, function($message) use ($content, $cc_mail) {
                                $message->to($content['email'])->subject('Cool Jelly Bean : New Order '.$content['order_ref']);
                                $message->from('xyz@gmail.com');
                                $message->cc($cc_mail);
                                $message->setBody('test');

                            });

                            Mail::send('mails/order_mail', $content, function($message) use ($content, $cc_mail) {
                                $message->to($content['supplier_mail'])->subject('Cool Jelly Bean : New Order '.$content['order_ref']);
                                $message->from('xyz@gmail.com');
                                $message->cc($cc_mail);
                                $message->setBody('test');
                            });

                            $content['mail_type'] = 'artist';
                            Mail::send('mails/order_mail', $content, function($message) use ($content, $cc_mail) {
                                $message->to($content['artist_mail'])->subject('Cool Jelly Bean : New Order '.$content['order_ref']);
                                $message->from('xyz@gmail.com');
                                $message->cc($cc_mail);
                                $message->setBody('test');
                            });
                        }
                    }

                    

                } catch(\Exception $e){
                    return $e;
                }

                $cartDetails = CartDetails::where('customer_id',$user_id)->where('id',$request->cart_id)->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.ProductDetails','cartItems.cartProducts.ProductDetails.supplierName')->first();
               

                $contents['email'] = $cartDetails->email;
                try{
                    if(isset($contents['email']) && $content != '' && $cc_mail !=''){
                        Mail::send('mails/order_mail', $content, function($message) use ($content, $cc_mail) {
                        $message->to($contents['email'])->subject('Cool Jelly Bean : New Order '.$content['order_ref']);
                        $message->from('xyz@gmail.com');
                        $message->cc($cc_mail);
                        $message->setBody('test');
                        $message->attach($pic);

                      });
                    }
                    

                    // if($request->payment_type == 'stripe'){
                    //     return redirect()->route('stripe_page');
                    // } else {
                    //     return redirect()->route('paypal_page');
                    // }

                } catch(\Exception $e){
                    return $e;
                }
            }
        } else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return $this->loggedOut($request);
        }
    }

    public function termsConditionView(Request $request){
        return view('front/terms');
    }
    public function policyView(Request $request){
        return view('front/policy');
    }

    public function orderRefNumber()
    {
        $returnId = OrderDetails::orderBy('id', 'DESC')->first();
        if($returnId == null)
        {
            $returnNo = '#ORDER'.date("Y").sprintf("%07d", (1));
        }
        else
        {
            $returnNo = '#ORDER'.date("Y").sprintf("%07d", ($returnId->id)+1);
        }
        return $returnNo;
    }

    public function addCart($notes,$product_id,$quantity,$with_value,$guest)
    { 
        if($guest == "guest"){
            
            $user_id= 0;   
            $cartCheck = CartDetails::where('customer_id',$user_id)->where('status',1)->where('ip_address',\Request::ip())->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();
        }else{
            
            $user_id= Auth::user()->id;
            $cartCheck = CartDetails::where('customer_id',$user_id)->where('status',1)->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();
        }

        $todayTime = Carbon::now();
        $flag =0;
        $shipping_price =0;
        // $cartCheck = CartDetails::where('customer_id',$user_id)->first();
        // $cartCheck = CartDetails::where('customer_id',$user_id)->where('status',1)->where('ip_address',\Request::ip())->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();
        $product_details = MerchandiseProduct::where('id',$product_id)->where('status',1)->first();
        $product_quantity= Product_variant::where('id',$product_details->product_variant_id)->where('status',1)->first();
         // dd($cartCheck);
        if($cartCheck == null){
            
            $cartDetail = new CartDetails;
            $cartDetail->customer_id = $user_id;
            $cartDetail->created_time = $todayTime->format("Y-m-d");
            $cartDetail->notes = $notes?$notes:"";
            $cartDetail->status = 1;
            $cartDetail->ip_address = \Request::ip();

            $cartDetail->save();
            $newCartId = $cartDetail->id;
        } else{
            $newCartId = $cartCheck->id;
        }
       
        $cartItemCheck = CartItemDetails::where('merchandise_product_id',$product_id)
        ->where('customer_id',$user_id)->where('cart_id',$newCartId)->first();
        // dd($cartItemCheck);

        if($cartItemCheck == null){
            $quantites=$product_quantity->quantites;
        
            if($quantites >=1 || $quantites == null){
           
                $cartItemDetail = new CartItemDetails;
                    $cartItemDetail->cart_id = $newCartId;
                    $cartItemDetail->customer_id = $user_id;
                    $cartItemDetail->merchandise_product_id = $product_id;
                    $cartItemDetail->quantity = 1;
                    $cartItemDetail->placed_date = $todayTime->format("Y-m-d");
                    $cartItemDetail->status = 1;
                    $cartItemDetail->save();
               
            if($quantites != null){
                 $product_quantity->quantites   = $quantites-1;
            }else{
                 $product_quantity->quantites   = $quantites; 
            }
                   // $product_quantity->update();
                   $flag =1;
            }
        }else{
            $quantites=$product_quantity->quantites;
            if($quantites >=1 || $quantites == null){
                // dd($with_value);
                if($with_value == 'without'){

                    // $cartItemCheck->quantity  = $cartItemCheck->quantity + $quantity;
                    $cartItemCheck->quantity = $quantity;
                } else{
                    // $cartItemCheck->quantity  = $quantity;
                    $cartItemCheck->quantity  = $cartItemCheck->quantity + $quantity;
                }

                // dd($cartItemCheck);
                $cartItemCheck->update();
                $product_quantity->quantites = $quantites-$quantity;
                   // $product_quantity->update();
                   $flag =1;
            }
        }
        
        session()->put('quantityOfProduct',$product_quantity->quantites);

        $cartItemDetail = CartItemDetails::where('cart_id',$newCartId)->where('customer_id',$user_id)
        ->where('status','<',2)->get();

        // $cartItemDetail = DB::select("SELECT * FROM  cart_management as cm  
        //                               INNER JOIN cart_item_management as cim ON cim.cart_id=cm.id 
        //                               INNER JOIN merchandise_products as mp ON mp.id =cim.merchandise_product_id  
        //                               INNER JOIN product_variants as pv ON pv.id = mp.product_variant_id
        //                               INNER JOIN products as p ON p.id = mp.product_id
        //                               WHERE cim.customer_id = $user_id AND  cim.status < '2' 
        //                               AND cim.cart_id = $newCartId 
        //                               AND cim.deleted_at is null");

        // dd($user_id);
        // $cartItemCheck = CartItemDetails::where('customer_id',$user_id)->where('cart_id',$newCartId)->where('status',1)->get();
        foreach ($cartItemDetail as $key => $value) {

            $product_details = MerchandiseProduct::find($value->merchandise_product_id);
            if($product_details){
                
                $products = Product::where('id',$product_details->product_id)->where('deleted_at',null)->first();
                if($products){  
                    $shipping_current = ($products != null) ? $products->shipping_cost : 0;
                    $shipping_price = $shipping_current + $shipping_price;
                }
                else
                {
                    $flag = 0;
                }
            }
            
        }
        $cartCheck = CartDetails::where('customer_id',$user_id)->where('status',1)->first();
        $cartCheck->shipping_price   = $shipping_price;
        $cartCheck->update();

        session()->put('cartCount', count($cartItemDetail));
        
        return $flag;
    }
    public function additionalchargeUpdate(Request $request)
    {
        //dd($request->all());

        CartDetails::where('id', $request->id)
       ->update([
           'print_price' => $request->charge
        ]);

             $data = array(
                'status' => 'true',
            );
            return response()->json($data);
    }

}

?>