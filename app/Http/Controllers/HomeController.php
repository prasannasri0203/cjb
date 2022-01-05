<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\enquiry;
use DB;
use Notification;
use App\MerchandiseProduct;
use App\Product_variant;
use App\Product;
use App\CartDetails;
use App\CartItemDetails;
use Illuminate\Support\Facades\Hash;
use App\Notifications\MyEnquiryNotification;
use App\Notifications\MyOrderNotification;
use App\Notifications\MyFaultAndReturnsNotification;
use App\Refferal;
use Mail;
use Auth;
use Carbon\Carbon;
use App\OrderDetails;
use App\OrderItem;
use App\Categories;
use App\AdminLog;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index1()
    {
        return view('index');
    }
    public function index()
    {
        return view('home');
    }

    /**
     * Show the user's dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $user_id = Auth::user()->id;
        
        $get_guest_cart = CartDetails::where('customer_id',0)->first();
        
        if($get_guest_cart !=''){
            
            $cart_guest_data = CartDetails::where('customer_id',0)->where('id',$get_guest_cart->id)->first();
            $cart_guest_data->customer_id = $user_id;
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

        $cartData = CartDetails::where('customer_id',$user_id)->where('status',1)->orderByDesc('id')->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();


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
                        $cartList[$id]['image'] = $value->cartProducts->merchProductImage[$offset]->image;
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
                            // dd($cartList);
                }
            }
            
                    // $cartItemDetail = CartItemDetails::where('customer_id',$user_id)
                    // ->where('status','<=',2)->where('cart_id',$cartData->id)->get();


            $cartItemDetail = DB::select("SELECT * FROM  cart_management as cm  
              INNER JOIN cart_item_management as cim ON cim.cart_id=cm.id 
              INNER JOIN merchandise_products as mp ON mp.id =cim.merchandise_product_id  
              INNER JOIN product_variants as pv ON pv.id = mp.product_variant_id
              INNER JOIN products as p ON p.id = mp.product_id
              WHERE cim.customer_id = $user_id AND  cim.status = '1' 
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
        

        $user_fields = User::where('id', $user_id)
        ->select('name', 'first_name', 'last_name', 'email', 'dob','address_1', 'address_2', 'city', 'post_code')
        ->first()->toArray();
        
        $not_fill_count = 0;
        foreach($user_fields as $key => $fields){
            if($fields == '' or $fields == null){
                $not_fill_count = $not_fill_count + 1;
            }
        }
        $total_fields = count($user_fields);
        //   echo "<pre>";print_r($not_fill_count);exit;
        $firstblockpercentage   =   100 - ($not_fill_count / ($total_fields / 100));
        $profile_percentage1        =   $firstblockpercentage/1.42;
        // print_r($profile_percentage1);exit;
        $paymentblock           =   User::where('id', Auth::user()->id)
        ->select('bank_name','sort_code','account_number','account_holder_name')
        ->first()->toArray();
        $not_fill2_count        =   0;
        
        foreach($paymentblock as $key => $fields){
            if($fields == '' or $fields == null){
                $not_fill2_count = $not_fill2_count + 1;
            }
        }
        $total_fields = count($paymentblock);
        
        $firstblockpercentage   =   100 - ($not_fill2_count / ($total_fields / 100));
        $profile_percentage2    =   $firstblockpercentage/2.6;
    // 
        $profile_percentage     =   $profile_percentage1+$profile_percentage2;
// print_r($profile_percentage);exit;
        // $best_artist = OrderDetails::select(DB::raw('order_management.id,b.order_id,b.merchandise_product_id as groupby,d.image,c.artist_id,c.product_id,c.merchandise_product_name,c.product_price','b.product_quantity'))
        // ->join('order_item as b','b.order_id', '=','order_management.id')
        // ->join('merchandise_products as c','b.merchandise_product_id', '=','c.id')
        // ->join('merchandise_product_images as d','c.id', '=','d.merch_product_id')
        // // ->where('c.artist_id', Auth::user()->id)
        // //->limit(1)
        // ->get();
        $best_artist = OrderDetails::select(DB::raw('order_management.id,b.order_id,b.merchandise_product_id as groupby,d.image,c.artist_id,c.product_id,c.name_creation,c.product_price,b.product_quantity'))
        ->join('order_item as b','b.order_id', '=','order_management.id')
        ->join('merchandise_products as c','b.merchandise_product_id', '=','c.id')
        ->join('merchandise_product_images as d','c.id', '=','d.merch_product_id')
        // ->where('c.artist_id', Auth::user()->id)
        // ->orderBy('b.id', 'DESC')
        // ->limit("3")
        ->get();
        
        $bestsellerflag =   DB::select("SELECT merchandise_product_id,product_quantity FROM order_item WHERE customer_id='".Auth::user()->id."' GROUP BY merchandise_product_id");
        
        if(count($bestsellerflag)>3) $sellerflag    =   1;
        else $sellerflag    =   0;
        
        $best_artist_dup = [];
        $best_artist_new = [];
        foreach($best_artist as $key => $value)
        {
            if (!in_array($value->product_id, $best_artist_dup))
            {
                $best_artist_dup[] = $value->product_id;
                $best_artist_new[] = $value;
            }
        }
        if($best_artist_new)
        {
            $best_artist = $best_artist_new;
        }
        $categories = Categories::where('parent_id',0)->get();
        
        $salestats = [];
        
        
        $salestatsWeek = DB::select("SELECT count(OI.id) as orderCountWeek,sum(OI.artist_revenue) as artistRevenue,sum(OI.product_quantity) as quantityWeek,sum(OI.product_price) as totalWeek FROM order_management OM INNER JOIN order_item OI ON OI.order_id = OM.id  WHERE OM.artist_id IN (".Auth::user()->id.") AND OM.created_at > now() -  interval 7 day AND OM.status ='2' AND OM.release_status != 'NULL'");
        
        
        $salestatsMonth = DB::select("SELECT count(OI.id) as orderCountMonth,sum(OI.artist_revenue) as artistRevenue,sum(OI.product_quantity) as quantityMonth,sum(OI.product_price) as totalMonth FROM order_management OM INNER JOIN order_item OI ON OI.order_id = OM.id  WHERE OM.artist_id IN (".Auth::user()->id.") AND OM.created_at > NOW() - interval 1 month AND OM.status ='2' AND OM.release_status != 'NULL'");
        

        $salestatsYear = DB::select("SELECT count(OI.id) as orderCountYear,sum(OI.artist_revenue) as artistRevenue,sum(OI.product_quantity) as quantityYear,sum(OI.product_price) as totalYear FROM order_management OM INNER JOIN order_item OI ON OI.order_id = OM.id  WHERE OM.artist_id IN (".Auth::user()->id.") AND OM.created_at > now() -  interval 1 year AND OM.status ='2' AND OM.release_status != 'NULL'");
        
        
        $salestats['sw']['artistRevenue'] = ($salestatsWeek[0]->artistRevenue == '' || $salestatsWeek[0]->artistRevenue == 0) ? 0 : $salestatsWeek[0]->artistRevenue ;
        $salestats['sw']['quantity'] =  ($salestatsWeek[0]->quantityWeek == '' ||$salestatsWeek[0]->quantityWeek == 0 ) ? 0 : $salestatsWeek[0]->quantityWeek;
        $salestats['sw']['total'] =  ($salestatsWeek[0]->totalWeek == '' || $salestatsWeek[0]->totalWeek == 0) ? 0 : $salestatsWeek[0]->totalWeek;
        
        $salestats['sw']['salesOrdercountWeek'] = ($salestatsWeek[0]->orderCountWeek == '' || $salestatsWeek[0]->orderCountWeek == 0) ? 0 : $salestatsWeek[0]->orderCountWeek;
        
        // print_r($salestats);exit;
        $salestats['sm']['total'] = ($salestatsMonth[0]->totalMonth == '' || $salestatsMonth[0]->totalMonth == 0) ? 0 : $salestatsMonth[0]->totalMonth;
        $salestats['sm']['quantity'] = ($salestatsMonth[0]->quantityMonth == '' || $salestatsMonth[0]->quantityMonth == 0) ? 0 : $salestatsMonth[0]->quantityMonth;
        $salestats['sm']['artistRevenue'] = ($salestatsMonth[0]->artistRevenue == '' || $salestatsMonth[0]->artistRevenue == 0) ? 0 : $salestatsMonth[0]->artistRevenue;
        $salestats['sm']['salesOrdercountMonth'] = ($salestatsMonth[0]->orderCountMonth == '' || $salestatsMonth[0]->orderCountMonth == 0) ? 0 : $salestatsMonth[0]->orderCountMonth;
        
        $salestats['sy']['quantity'] = ($salestatsYear[0]->quantityYear == '' || $salestatsYear[0]->quantityYear == 0) ? 0 : $salestatsYear[0]->quantityYear;
        $salestats['sy']['total'] = ($salestatsYear[0]->totalYear == '' || $salestatsYear[0]->totalYear == 0) ? 0 : $salestatsYear[0]->totalYear;
        $salestats['sy']['artistRevenue'] = ($salestatsYear[0]->artistRevenue == '' || $salestatsYear[0]->artistRevenue == 0) ? 0 : $salestatsYear[0]->artistRevenue;
        $salestats['sy']['salesOrdercountYear'] = ($salestatsYear[0]->orderCountYear == '' || $salestatsYear[0]->orderCountYear == 0) ? 0 : $salestatsYear[0]->orderCountYear;
          // dd($salestats);
        if(Auth::user()->type == 1) {
            $login = 'login';
            return view('front/dashboard-artist')->with([
                'profile_percentage' => number_format($profile_percentage, 1),
                'login' => $login,
                'best_artist' =>$best_artist,
                'categories' => $categories,
                'salestats' => $salestats,
                'sellerflag'=>$sellerflag
            ]);
        }
        
        $user_fields = User::where('id', Auth::user()->id)
        ->select('name', 'first_name', 'last_name', 'email', 'dob','address_1', 'address_2', 'city', 'post_code','type')
        ->first()->toArray();
        
        $not_fill_count = 0;
        foreach($user_fields as $key => $fields){
            if($fields == '' or $fields == null){
                $not_fill_count = $not_fill_count + 1;
            }
        }
        $total_fields = count($user_fields);
        //   echo "<pre>";print_r($not_fill_count);exit;
        $firstblockpercentage   =   100 - ($not_fill_count / ($total_fields / 100));
        $profile_percentage1        =   $firstblockpercentage/1.4;
        // print_r($profile_percentage1);exit;
        $paymentblock           =   User::where('id', Auth::user()->id)
        ->select('bank_name','sort_code','account_number','account_holder_name')
        ->first()->toArray();
        $not_fill2_count        =   0;
        
        foreach($paymentblock as $key => $fields){
            if($fields == '' or $fields == null){
                $not_fill2_count = $not_fill2_count + 1;
            }
        }
        $total_fields = count($paymentblock);
        
        $firstblockpercentage   =   100 - ($not_fill2_count / ($total_fields / 100));
        $profile_percentage2    =   $firstblockpercentage/2.6;
    // 
        $profile_percentage     =   $profile_percentage1+$profile_percentage2;
        $login = 'login';
        
        if((Auth::user()->type == 2)||(Auth::user()->type == 1)){
            $user_id= Auth::user()->id;
            $order_list = OrderDetails::where('customer_id',$user_id)->orderBy('id','DESC')->take(5)->get();
            $wish_list = DB::table("wishlist")->whereNull('deleted_at')
            ->where('user_id',$user_id)
            ->where('like',1)
            ->orderBy('id', 'asc')
            ->paginate(3);
        }
        return view('front/dashboard-customer')->with([
            'profile_percentage' => number_format($profile_percentage, 1),
            'login'=>$login,'order_list'=>$order_list,'wish_list'=>$wish_list,'user_fields'=>$user_fields
        ]);
    }
    
    public function theme()
    {
        $data = DB::table('artist_themes')->where('user_id', Auth::user()->id)->first();
        if(!$data) {
            $data = collect();
            $data->banner_image = \URL::to('profile').'/artist-default-bg.png';
            $data->content_layer_colour = '#00afef';
            $data->cart_colour = '#ed1277';
            $data->font_family = 'Rubik-Light';
            $data->font_size = '15';
            $data->font_colour = '#ffffff';
        } else {
            $data->banner_image = \URL::to('profile').'/'.$data->banner_image;
        }

        return view('front/customise-theme', compact('data'));
    }

    
    public function editProfile()
    {
     $user_detail = User::where('id', \Auth::user()->id)->first();
     return view('front/edit-profile',compact('user_detail'));
 }

 
 public function mediaGallery()
 {
    $data = DB::table("artist_gallery")->where('user_id', \Auth::user()->id)->where('status', 1)->whereNull('deleted_at')->orderBy('id', 'asc')->limit(100)->get();
// dd($data);
    return view('front/media-gallery', compact('data'));
}

public function editProfileUpdate(Request $request)
{

        // dd($request->all());
    $this->validate($request, [
        'name' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
            // 'contact_number' => 'required',
        'email' => 'required|unique:users,email,'.\Auth::user()->id,
            // 'telephone' => 'numeric|max:15',
        'address_1' => 'required',
            // 'address_2' => 'required',
        'city' => 'required',
        'postcode' => 'required|max:15',
        'date_of_birth' => 'required', 
    ]);
    $date=date_create($request->input('date_of_birth'));
    $dob = date_format($date,"Y-m-d");

    $data = User::whereIn('status', array(1))->find(\Auth::user()->id);

    if($data != null) {
        $data->name  = $request->input('name');
        $data->first_name  = $request->input('first_name');
        $data->last_name  = $request->input('last_name');
        $data->email  = $request->input('email');
        $data->contact_number  = $request->input('telephone');
        $data->address_1  = $request->input('address_1');
        $data->address_2  = $request->input('address_2');
        $data->city  = $request->input('city');
        $data->post_code  = $request->input('postcode');
        $data->dob  = $dob;
        $data->facebook_link  = $request->input('facebook');
        $data->twitter_link  = $request->input('twitter');
        $data->instagram_link  = $request->input('instagram');
        $data->pinterest_link  = $request->input('pinterest');
        $data->account_mail  = $request->input('account_mail');
        $data->marketing_mail  = $request->input('marketing_mail');
        $data->updated_at = date('Y-m-d H:i:s');
        if($request->artist_image)
        {
            $imageName = time().'.'.request()->artist_image->getClientOriginalExtension();
            $data->profile_image  = $imageName;
            request()->artist_image->move(public_path('profile'), $imageName);
        }
        if($request->customer_image)
        {
            $imageName = time().'.'.request()->customer_image->getClientOriginalExtension();
            $data->profile_image  = $imageName;
            request()->customer_image->move(public_path('profile'), $imageName);
        }
        $data->update();

        return redirect('edit-profile')->with('success', 'Updated successfully..!!');

    }

    return redirect('edit-profile')->with('failure', 'Invalid request..!!');
}



public function paymentInfo(Request $request)
{
    $this->validate($request, [
        'bank_name' => 'required',
        'sort_code' => 'required',
        'account_number' => 'required',
        'account_holder_name' => 'required',
    ]);

    $data = User::whereIn('status', array(1))->find(\Auth::user()->id);

    if($data != null && $data->fa_status == 1) {
        
        $flag = 1;
        $arr_data = $request->all();
        $request->session()->put('email', $data['email']);
        $request->session()->put('paymentInfo', $arr_data);
        
        return view('front/edit-profile-otp',compact('data','flag'));
        
    }else{

        $data->bank_name  = $request->input('bank_name');
        $data->sort_code  = $request->input('sort_code');
        $data->account_number  = $request->input('account_number');
        $data->account_holder_name  = $request->input('account_holder_name');
        $data->update();
        
        return redirect('edit-profile')->with('success', 'Updated successfully..!!');
    }
    
    return redirect('edit-profile')->with('failure', 'Invalid request..!!');
}

public function changepassword(Request $request)
{
  $this->validate($request, [
    'password'        => 'required',
    'c_password'      =>  'required',
]);
  
  $data = User::whereIn('status', array(1))->find(\Auth::user()->id);
  
  if($data != null) {
    if(!Hash::check($request->get('c_password'), $data->password)){
        $password = $request->password;
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $msg ='Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
            return redirect('edit-profile')->with('failure', $msg);
        }else{

            if($data->fa_status == 0){

                $data->password  = Hash::make($request->input('password'));
                $data->updated_at = date('Y-m-d H:i:s');
                $data->update();
                $msg ='Updated successfully..!!';
                
                $content = array('demoEmail'=>$data['email'],'demoPassword'=>$request->password);
                
                            // Mail::send('mails/demo', $content, function($message) use ($content) {
                            //     $message->to($content['demoEmail'])->subject('passwor changed');
                            //     $message->from('xyz@gmail.com');
                            //     $message->setBody('test');
                            // });
                
                return redirect('edit-profile')->with('success', $msg);

            }else{

                $arr_data = $request->all();
                $request->session()->put('email', $data['email']);
                $request->session()->put('2fa_data', $arr_data);

                return view('front/edit-profile-otp', ['flag'=>2]);
            }
        }
    }else{
        $msg = "current password is incorrect";
        return redirect('edit-profile')->with('failure', $msg);
    }
}
}

public function completeFap(Request $request){
    
    $flag =$request->flag;
    return view('front/edit-profile-otp',compact('flag'));
}

public function faPage(){

    $updateData = User::whereIn('status', array(1))->find(\Auth::user()->id);
    $fa_status=$updateData->fa_status;
    return view('front/fa-page',compact('fa_status'));

}

public function otpPage(Request $request){
    
    $otpPage = 1; 
    return view('front/edit-profile-otp',compact('otpPage'));
}

public function updateOtp(Request $request){
 
    $updateData = User::whereIn('status', array(1))->find(\Auth::user()->id);  
    $updateData->fa_status = 1;      
    $updateData->updated_at = date('Y-m-d H:i:s');
    $updateData->update();
    $fa_status=$updateData->fa_status;
    return view('front/fa-page',compact('fa_status'));
    
}

public function faStatus(Request $request){
    
    $updateData = User::whereIn('status', array(1))->find(\Auth::user()->id);

    if($request->fa_status == 0 || $updateData->fa_status == 0){

        $google2fa = app('pragmarx.google2fa');
            // Add the secret key
        $arr_data['google2fa_secret'] = $google2fa->generateSecretKey();

        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $updateData->email,
            $arr_data['google2fa_secret']
        );
        
        $updateData->google2fa_secret = $arr_data['google2fa_secret'];
        $updateData->updated_at = date('Y-m-d H:i:s');
        $updateData->update();
        
        return view('front/otp_verification', ['QR_Image' => $QR_Image,'fa_status' =>$updateData->fa_status]);            

    }else if($request->fa_status == 1 || $updateData->fa_status ==1){

        $updateData->fa_status = 0;
        $updateData->updated_at = date('Y-m-d H:i:s');
        $updateData->update();
        $updateData = User::whereIn('status', array(1))->find(\Auth::user()->id);
        return view('front/fa-page',['QR_Image' =>'','fa_status' =>$updateData->fa_status]);
    }
}

public function completeOtp(Request $request){

    if($request->flag == 0){

        $data = User::whereIn('status', array(1))->find(\Auth::user()->id);

        return redirect('edit-profile');            

    }else if($request->flag == 2){

        $data = User::whereIn('status', array(1))->find(\Auth::user()->id);
        $data->password  = Hash::make(session::get('2fa_data')['password']);
        $data->updated_at = date('Y-m-d H:i:s');
        $data->update();
        
        $content = array('demoEmail'=>session::get('email'),'demoPassword'=>session::get('2fa_data')['password']);

            // Mail::send('mails/demo', $content, function($message) use ($content) {
            //     $message->to($content['demoEmail'])->subject('passwor changed');
            //     $message->from('xyz@gmail.com');
            //     $message->setBody('test');
            // });
        
        return redirect('edit-profile')->with('success', 'Updated successfully..!!');

    }else if($request->flag == 1){

        $data = User::whereIn('status', array(1))->find(\Auth::user()->id);
        $data->bank_name  = session::get('paymentInfo')['bank_name'];
        $data->sort_code  = session::get('paymentInfo')['sort_code'];
        $data->account_number = session::get('paymentInfo')['account_number'];
        $data->account_holder_name  = session::get('paymentInfo')['account_holder_name'];
        $data->update();

        return redirect('edit-profile')->with('success', 'Updated successfully..!!');
    }
}

public function complete2fa(){

    return view('front/edit-profile');
}

public function themeUpdate(Request $requesst)
{
    $this->validate($request, [
        'banner_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'details_layer_colour' => 'required',
        'cart_colour' => 'required',
        'font_family' => 'required',
        'font_size' => 'required|integer|between:14,26',
        'font_colour' => 'required',
    ]);

    $data = DB::table('artist_themes')->where('user_id', Auth::user()->id)->first();

    if($request->hasfile('banner_image')) {
        $name= '0000'.Auth::user()->id.'-'.$request->banner_image->getClientOriginalName();
        $request->banner_image->move(public_path().'/profile/', $name);
        $filename = $name;
    }

    if($data) {
        if($request->hasfile('banner_image')) {
            $filename = $filename;
        } else {
            $filename = $data->banner_image;
        }

        $storeTheme = array('banner_image' => $filename,
            'content_layer_colour' => $request->details_layer_colour,
            'cart_colour' => $request->cart_colour,
            'font_family' => $request->font_family,
            'font_size' => $request->font_size,
            'font_colour' => $request->font_colour,
            'updated_at' => date('Y-m-d H:i:s')
        );
        DB::table('artist_themes')->where('user_id', Auth::user()->id)->update($storeTheme);

    } else {
        if($request->hasfile('banner_image')) {
            $filename = $filename;
        } else {
            $filename = 'artist-default-bg.png';
        }
        $storeTheme = array('user_id' => Auth::user()->id,
            'banner_image' => $filename,
            'content_layer_colour' => $request->details_layer_colour,
            'cart_colour' => $request->cart_colour,
            'font_family' => $request->font_family,
            'font_size' => $request->font_size,
            'font_colour' => $request->font_colour,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        DB::table('artist_themes')->insert($storeTheme);

    }

    return redirect('theme')->with('success', 'Updated successfully..!!');
}

public function mediaGalleryDestory($id)
{
    $data = DB::table("artist_gallery")->where('user_id', \Auth::user()->id)->where('status', 1)->find($id);

    if($data) {
        $dataUpdated = array('status' => -1,
            'deleted_at' => date('Y-m-d H:i:s')
        );
        \DB::table('artist_gallery')->where('id', $id)->update($dataUpdated);

        return redirect('media-gallery')->with('success', 'Deleted successfully..!!');

    }

    return redirect('media-gallery')->with('failure', 'Invalid request..!!');
}

public function createMerchendise(Request $request)
{
    if ($request->ajax()) {

        $data = Product::where('products.status','0')->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('date', function($row){

            $date = date('d-m-Y', strtotime($row->updated_at));
            return $date;

        })
        ->addColumn('image', function($row){

            if(@$row->product_image['front_side']) {
                $path = asset('/portal/img/product/'.@$row->product_image['front_side']);
            } else {
                $path = asset('images/thanks.png');
            }


            $img = '<img src="'.$path.'" height="32px" width="32px" class="cms-image"/>';


            return $img;
        })
        ->rawColumns(['action', 'image'])
        ->make(true);
    }

    $products = Product::with('product_category')->get();
    $tab = 'customise';


    return view('front/design-tool/marchandise-tab', compact('products', 'tab'));
}



public function customiseMerchendise(Request $request)
{
    $prod = Product::where('id', $id)->first();
    $tab = 'customise';

    return view('front/design-tool/customise-tab', compact('prod', 'tab'));
}

public function mediaGalleryAdd(Request $request)
{
    $this->validate($request, [
        'title' => 'required',
            // 'description' => 'required',
        'link' => 'required',
    ]);

    $data = array('user_id' => \Auth::user()->id,
        'title' => $request->title,
            // 'description' => $request->description,
        'link' => $request->link,
        'status' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    );
    \DB::table('artist_gallery')->insert($data);

    return redirect('media-gallery')->with('success', 'Added successfully..!!');
}

public function editProfileAboutMe(Request $request)
{
    $this->validate($request, [
        'about_me' => 'required',
        'about_stats' => 'required',
        'about_desc' => 'required',
    ]);

    $data = User::whereIn('status', array(1))->find(\Auth::user()->id);

    if($data != null) {
        $data->about_me  = $request->input('about_me');
        $data->about_stats  = $request->input('about_stats');
        $data->about_desc  = $request->input('about_desc');
        $data->updated_at =   \Carbon\Carbon::now();
        $data->update();

        return redirect('edit-profile')->with('success', 'Updated successfully..!!');
    }

    return redirect('edit-profile')->with('failure', 'Invalid request..!!');
}

public function ajaxUpload(Request $request)
{
        // dd($request->all());
    try {
            // $location = public_path() . '/merchandise-img/';

            // if (!file_exists($location)) {
            //     mkdir($location, 0777, true);
            // }
        $name = time();

        $base64_image = $request->layer;

        if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
            $data = substr($base64_image, strpos($base64_image, ',') + 1);

            $data = base64_decode($data);
                // Storage::disk($location)->put($name, $data);
                // $data->move($location, $name);
            \Storage::disk('uploads')->put($name . '.png', $data);


            $pdf = \App::make('dompdf.wrapper');
                 // $pdf = $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            $img = "merchandise-img/".$name.".png";
            $html = '
            <html>
            <head>
            <style>
            .center {
               text-align: center;
           }
           .center img {
               display: block;
           }
           </style>
           </head>
           <body>
           <div class="center">
           <img src="'.$base64_image.'" />
           </div>
           </body>
           </html>
           ';
           $pdf->loadHTML($html);
           \Storage::disk('uploads')->put($name . '.pdf', $pdf->output());



       }
       return "" . $name;
            // return "TEsted";
   } catch (Exception $e) {
    return $e;
}

}

public function sendNotification(Request $request)
{
        // $user = DB::table('enquiry')->first();
    $user = User::first();
    $details = [

        'id'  => 1,
        'url' => 'admin/enquiry_edit/1',
    ];

    Notification::send($user, new MyEnquiryNotification($details));

}

public function sendOrderNotification(Request $request)
{
        // $user = DB::table('enquiry')->first();
    $user = User::first();
    $details = [

        'id' => 1
    ];

    Notification::send($user, new MyOrderNotification($details));

}


public function readEnquiryNotification($user_id)
{
    $id = Auth::id();

    $user = User::find($id);

    $unread_enquiry_notifications = $user->unreadNotifications()->where('id',$user_id)->where('type','App\Notifications\MyEnquiryNotification')->first();
    $unread_enquiry_notifications->read_at = \carbon\carbon::now();
    $unread_enquiry_notifications->save();
    $data = $unread_enquiry_notifications->data['url'];
// dd($data);
    return redirect($data);

}


public function viewAll()
{
    $user = Auth::user();

    $unread_enquiry_notifications  = $user->unreadNotifications()->where('type','App\Notifications\MyEnquiryNotification')
    ->update(['read_at' => \Carbon\Carbon::now()]);

    return redirect('admin/enquiry_list');

}

public function orderViewAll()
{
    $user = Auth::user();

    $unread_order_notifications  = $user->unreadNotifications()->where('type','App\Notifications\MyOrderNotification')
    ->update(['read_at' => \Carbon\Carbon::now()]);

    return redirect('admin/order_index');
}

public function faultViewAll()
{
    $user = Auth::user();

    $unread_fault_notifications  = $user->unreadNotifications()->where('type','App\Notifications\MyFaultAndReturnsNotification')
    ->update(['read_at' => \Carbon\Carbon::now()]);

    return redirect('admin/fault_list');

}
public function readFaultNotification($user_id)
{
    $id = Auth::id();

    $user = User::find($id);

    $unread_fault_notifications = $user->unreadNotifications()->where('id',$user_id)->where('type','App\Notifications\MyFaultAndReturnsNotification')->first();
    $unread_fault_notifications->read_at = \carbon\carbon::now();
    $unread_fault_notifications->save();
    $data = $unread_fault_notifications->data['url'];
        // dd($data);
    return redirect($data);
}

public function readOrderNotification($user_id)
{
    $id = Auth::id();

    $user = User::find($id);

    $unread_order_notifications = $user->unreadNotifications()->where('id',$user_id)->where('type','App\Notifications\MyOrderNotification')->first();
    $unread_order_notifications->read_at = \carbon\carbon::now();
    $unread_order_notifications->save();
    $data = $unread_order_notifications->data['url'];
    $u1= explode('/',$data);
    $u2 = OrderItem::find($u1[2]);
    $url = 'admin/order_view/'.$u2['order_id'];
    
    return redirect($url);
}

public function refferalcupon(Request $request)
{
    $this->validate($request, [
        'user_email' => 'required|email',
        'description' => 'required',
    ]);
    $refferal = new Refferal;
    $refferal->user_id= Auth::user()->id;
    $user_id= Auth::user()->id;
    $refferal->user_email               =   $request->user_email;
    $refferal->description              =   $request->description;
    $refferal->status               =0;
    $refferal->save();
    $link = 'http://127.0.0.1:8000/signup?user_id='.$user_id;
    $params['user_email'] = $refferal['user_email'];
    Mail::send('mails.refferal',  ['params' => $link,'name' => $request->user_email.' '.$request->description], function ($m) use ($params) {
        $m->from('711chitti@gmail.com', 'cooljellybean');
        $m->to($params['user_email']);
    });
    return redirect()->back()->with('success','We have e-mailed your regester link!');
}

public function referral()
{
    return view('front/referral');
}

public function returnAdmin(Request $request)
{
    $accessKey = AdminLog::where('admin_access_key',session::get('admin_user'))->first();
    Session::forget('admin_user');
    if(!$accessKey)
    {
        Auth::logout();
        return redirect('/');
    }        
    $user = User::find(1);
    Auth::login($user);        
    $user_type = Auth::user()->type; 
    
            // Check user role
    switch ($user_type) {
        case 1:
        return redirect('/dashboard');
        break;
        case 2:
        return redirect('/dashboard');
        break; 
        default:
        return redirect('/admin');
        break;
    }   
}
public function addCart($notes,$product_id,$quantity,$with_value)
{ 
    $user_id= Auth::user()->id;
    $todayTime = Carbon::now();
    $flag =0;
    $shipping_price =0;
        // $cartCheck = CartDetails::where('customer_id',$user_id)->first();
    $cartCheck = CartDetails::where('customer_id',$user_id)->where('status',1)->with('cartItems','cartItems.cartProducts','cartItems.cartProducts.merchProductImage')->first();
    $product_details = MerchandiseProduct::where('id',$product_id)->where('status',1)->first();
    $product_quantity= Product_variant::where('id',$product_details->product_variant_id)->where('status',1)->first();
    
    if($cartCheck == null){
        
        $cartDetail = new CartDetails;
        $cartDetail->customer_id = $user_id;
        $cartDetail->created_time = $todayTime->format("Y-m-d");
        $cartDetail->notes = $notes?$notes:"";
        $cartDetail->status = 1;

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

}
