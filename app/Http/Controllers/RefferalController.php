<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\enquiry;
use App\Refferal;
use DB;
use Notification;
use Auth;

class RefferalController extends Controller
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
    public function refferalcupon(Request $request)
    {
        $refferal = new Refferal; 
        $refferal->user_email				=	$request->user_email;
        $refferal->description					=	$request->description; 
        $refferal->save();	 
    
        $params['user_email'] = $refferal['user_email'];	
        Mail::send('mails.refferal',  ['name' => $request->user_email.' '.$request->description], function ($m) use ($params) {
                $m->from('711chitti@gmail.com', 'cooljellybean');
                $m->to($params['user_email'])->subject('Your Account Created Successfully...');
            });
   		return $refferal; 

    }
}
