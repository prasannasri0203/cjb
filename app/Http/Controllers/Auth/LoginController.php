<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Flash;
use App\CartItemDetails;
use DB;
use Illuminate\Support\Str;
use App\AdminLog;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials( Request $request )
    {
        $credentials = $request->only($this->username(), 'password');

        $credentials['status'] = 1;

        return $credentials;

    }

    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            // return redirect('/login')->withErrors($validator);
            return redirect()->back()->withErrors($validator);
        }

        $credentials = $this->credentials($request);

        //dd($credentials);
        if (Auth::attempt($credentials)) {


            if(isset($_POST['remember']))
            {
                    // echo 'ok';exit
                setcookie('email', $request['email'], time()+31556926);
                setcookie('password', $request['password'], time()+31556926);
                // return redirect('/admin');
            }
            else
            {
                if(isset($_COOKIE['email']) && isset($_COOKIE['password']))
                {
                    setcookie ('email', "", time() - 31556926);
                    setcookie ('password', "", time() - 31556926);
                }
                // return redirect('/admin');
            }

            // User type
            $user_type = Auth::user()->type;
            // Check user role
            switch ($user_type) {
                case 1:
                //     $cartItemDetail = CartItemDetails::where('customer_id',Auth::user()->id)
                // ->where('status','<',2)->get();
            
                $cartItemDetail = DB::select("SELECT * FROM  cart_management as cm  
                                      INNER JOIN cart_item_management as cim ON cim.cart_id=cm.id 
                                      INNER JOIN merchandise_products as mp ON mp.id =cim.merchandise_product_id  
                                      INNER JOIN product_variants as pv ON pv.id = mp.product_variant_id
                                      INNER JOIN products as p ON p.id = mp.product_id
                                      WHERE cim.customer_id = '".Auth::user()->id."' AND  cim.status < '2'
                                      AND cim.deleted_at is null");

                session()->put('cartCount', count($cartItemDetail));
                        return redirect('/dashboard');
                    break;
                case 2:
                //     $cartItemDetail = CartItemDetails::where('customer_id',Auth::user()->id)
                // ->where('status','<',2)->get();
            
                $cartItemDetail = DB::select("SELECT * FROM  cart_management as cm  
                                      INNER JOIN cart_item_management as cim ON cim.cart_id=cm.id 
                                      INNER JOIN merchandise_products as mp ON mp.id =cim.merchandise_product_id  
                                      INNER JOIN product_variants as pv ON pv.id = mp.product_variant_id
                                      WHERE cim.customer_id = '".Auth::user()->id."' AND  cim.status < '2'  
                                      AND cim.deleted_at is null");
                
                session()->put('cartCount', count($cartItemDetail));
                        return redirect('/dashboard');
                    break;
                default:
                        $random = Str::random(20);
                        $logAdmin = new AdminLog;
                        $logAdmin->admin_access_key = $random;
                        $logAdmin->save();
                        return redirect('/admin');
                    break;
            }

        }
        else{
                   // $psw=Hash::make('admin123');
                   // echo $psw;exit;
            // return $this->sendFailedLoginResponse($request);
            return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function logout(Request $request)
    {
        if(Auth::user()->type == 0 || Auth::user()->type == 3)
        {
            if(Auth::user()->type == 0)
            {
                AdminLog::truncate();
            }
            $this->guard()->logout();
            $request->session()->invalidate();
             //$request->session()->flash('alert-success', 'User has logged out successfully');

            return $this->loggedOut($request) ?: redirect('admin/login')->with('success','Admin has logged out successfully');
        }
        $this->guard()->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/login')->with('success','User has logged out successfully');

    }


    public function adminLogin()
    {
        return view('portal.login');
    }
}
