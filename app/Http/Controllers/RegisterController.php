<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use Mail;
use App\Mail\DemoEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use URL;
use App\Refferal;
use App\OrderDetails;

class RegisterController extends Controller
{
    public function signup(Request $request)
    {
 
        $temp = $request->all();
        if($request->is_own_shop == 1)
        {
             $validator = \Validator::make($request->all(), [
                'profile_name' => 'required|unique:users,name',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required |email|unique:users,email',
                'password' => ['required', 'string', 'min:8'],

            ]);   
            $request->merge(["user_type"=>"2"]);       
        }
        if($request->is_own_shop == 0)
        {
             $validator = \Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', 'string', 'min:8'],

            ]);
            
              $request->merge(["user_type"=>"1"]);
        }        
        if ($validator->fails()) {
            return redirect('/signup')->withInput()->withErrors($validator);
        }
        if($temp['usercap_code'] == $temp['capcode']){
        if(isset($request->password)){
            $password = $request->password;
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number    = preg_match('@[0-9]@', $password);
            $specialChars = preg_match('@[^\w]@', $password);
                if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                    $msg =array('password'=>'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
                    return redirect('/signup')->withInput()->withErrors($msg);
                }else{
                    $input = $request->all();
                    if($request->profile_name !=null){
                        $input['name'] = $request->profile_name;
                    }else{
                         $uniqueName = explode('@',$request->email);
                        $input['name'] = $uniqueName[0];
                    }
                    // $input['name'] = $request->first_name.$request->last_name;
                    $input['first_name'] = $request->first_name;
                    $input['last_name'] = $request->last_name;
                    $input['password'] = Hash::make($password);
                    $input['status'] = 1;
                    $input['is_own_shop'] = $request->is_own_shop;
                    $input['type'] = 2;
                    if($request->is_own_shop==1){
                    $input['type'] = 1;
                    }
                    $user = User::create($input);
                }
            }
            }else{
            $msg =array('usercap_code'=>'Invalid Captcha! Please try again.');
                    return redirect('/signup')->withInput()->withErrors($msg);
        }
        
        if($request->user_type == 1 || $request->user_type == 2){
            $data = array('user_id' => $user->id,
            'banner_image' => 'artistbg.png',
            'content_layer_colour' => '#00afef',
            'cart_colour' => '#ed1277',
            'font_family' => 'Rubik-Light',
            'font_size' => '15',
            'font_colour' => '#130f0f',
            'status' => '0'
            );
            // dd($data);
            DB::table('artist_themes')->insert($data);
            if(isset($request->refer_id) && $request->refer_id != ''){

                DB::table('refferal')->insert([
                'status' => 1,
                'user_email'=>$request->email,
                'user_id'=>$request->refer_id,
                'reg_id'=>$user->id
                ]);
            }else{
                DB::table('refferal')->where('user_email', $request->email)->update([
                'status' => 1
                ]);
            }
        }
    
         if($request->user_type == 2){

            $data = array('user_id' => $user->id,
            'banner_image' => 'artistbg.png',
            'content_layer_colour' => '#00afef',
            'cart_colour' => '#ed1277',
            'font_family' => 'Rubik-Light',
            'font_size' => '15',
            'font_colour' => '#130f0f',
            'status' => '1'
            );
            // dd($data);
            DB::table('artist_themes')->insert($data);
         }    
    
        Mail::to($request)->send(new DemoEmail($request));

        Auth::login($user);
        $user_type = Auth::user()->type; 
            
            // Check user role
            switch ($user_type) {
                case 1:
                        $user_fields = User::where('id', Auth::user()->id)
                            ->select('name', 'first_name', 'last_name', 'email', 'dob', 'contact_number', 'address_1', 'address_2', 'city', 'post_code', 'facebook_link','type','twitter_link', 'instagram_link', 'pinterest_link')
                            ->first()->toArray();
                        $not_fill_count = 0;
                        foreach($user_fields as $key => $fields){
                            if($fields == '' or $fields == null){
                                $not_fill_count = $not_fill_count + 1;
                            }
                        }
                        $total_fields = count($user_fields);
                        $profile_percentage = 100 - ($not_fill_count / ($total_fields / 100));
                        $login = 'register';
                        // return redirect('/dashboard');
                        return view('front/dashboard-artist')->with([
                            'profile_percentage' => number_format($profile_percentage, 1),
                            'login' => $login
                        ]);
                    break;
                case 2:
                        $user_fields = User::where('id', Auth::user()->id)
                            ->select('name', 'first_name', 'last_name', 'email', 'dob', 'contact_number', 'address_1', 'address_2', 'city', 'post_code','type')
                            ->first()->toArray();
                        $not_fill_count = 0;
                        foreach($user_fields as $key => $fields){
                            if($fields == '' or $fields == null){
                                $not_fill_count = $not_fill_count + 1;
                            }
                        }
                        $total_fields = count($user_fields);
                        $profile_percentage = 100 - ($not_fill_count / ($total_fields / 100));
                        $login = 'register';
                        $order_list = OrderDetails::where('customer_id',Auth::user()->id)->orderBy('id','DESC')->take(5)->get();
                        $wish_list = DB::table("wishlist")->whereNull('deleted_at')
                                                 ->where('user_id',Auth::user()->id)
                                                 ->where('like',1)
                                                 ->orderBy('id', 'asc')
                                                 ->paginate(3);
                        return view('front/dashboard-customer')->with([
                            'profile_percentage' => number_format($profile_percentage, 1),
                            'login' => $login,'order_list'=>$order_list,'wish_list'=>$wish_list,'user_fields'=>$user_fields
                        ]);
                        // return redirect('/dashboard');
                    break; 
                default:
                        return redirect('/admin');
                    break;
            }
      
            
        // return redirect('login')
        // ->with('success','Registered successfully');
    }
}
