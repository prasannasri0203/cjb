<?php

namespace App\Http\Controllers\Auth;

use Auth;
use DB;
use App\User;
use Mail;
use App\Mail\DemoEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use URL;
use App\Refferal;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function create_signup(){
        $u_id = Input::get('uid');
        $user = User::find($u_id);
        return view('front/signup',compact('user'));
    }

    public function signup(Request $request)
    {
        $temp = $request->all();
        if($request->user_type == 1)
        {
             $validator = \Validator::make($request->all(), [
                'profile_name' => 'required|unique:users,name',
                'first_name' => 'required',
                'last_name' => 'required',
                'user_type' => 'required|in:1,2',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', 'string', 'min:8'],

            ]);           
        }
        if($request->user_type == 2)
        {
             $validator = \Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'user_type' => 'required|in:1,2',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', 'string', 'min:8'],

            ]);

              $request->profile_name = $request->first_name;      
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
                    $input['name'] = $request->profile_name;
                    $input['first_name'] = $request->first_name;
                    $input['last_name'] = $request->last_name;
                    $input['password'] = Hash::make($password);
                    $input['type'] = $request->user_type;
                    $input['status'] = 1;
                    $user = User::create($input);
                }
            }
            }else{
            $msg =array('usercap_code'=>'Invalid Captcha! Please try again.');
                    return redirect('/signup')->withInput()->withErrors($msg);
        }
        
      
        if($request->user_type == 1){
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
            if($request->refer_id){
                DB::table('refferal')->insert([
                'status' => 1,
                'user_email'=>$request->email,
                'user_id'=>$request->refer_id,
                'reg_id'=>$user->id,
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
                        return redirect('/dashboard');
                    break;
                case 2:
                        return redirect('/dashboard');
                    break; 
                default:
                        return redirect('/admin');
                    break;
            }
      
            
        // return redirect('login')
        // ->with('success','Registered successfully');
    }
}
