<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use URL;
use Auth;
use App\User;
use App\Refferal;
use App\OrderDetails;
use App\CartDetails;
use App\Product;
use App\OrderItem;
use Carbon\Carbon;
use Mail;

class AffiliateController extends Controller
{
    public function affiliate_start(){
        $affiliates = Refferal::where('user_id',Auth::user()->id)->get();
        $paid = [];
        $release_paid = [];
        if(count($affiliates) > 0){
            $token = rand().'e'.Auth::user()->id;
            $url = URL::to('signup?t='.$token);
            
            foreach ($affiliates as $key => $v) {
                $list[] =$v['reg_id']; 
            }
            $order_lists = OrderDetails::with('artistDetails','orderItemDetails','cardDetails','orderItemDetails.orderProducts','customerDetails')->whereIn('customer_id',$list)->get();
            $paid_lists = OrderDetails::with('artistDetails','orderItemDetails','cardDetails','orderItemDetails.orderProducts','customerDetails')->whereIn('customer_id',$list)->where('release_status','!=',NULL)->get();
                      // ->paginate(10);
            if(count($order_lists) >0 ){
                foreach ($order_lists as $key => $value) {
                    $amount[] = round($value->artist_percent * ($value->grand_total/100), 2);
                }
                $paid = array_sum($amount);
            }else{
                $paid = [];
            }
            
            if(count($paid_lists) > 0){
                foreach ($paid_lists as $key => $v) {
                    $amount2[] = round($v->artist_percent * ($v->grand_total/100), 2); 
                }
                $release_paid = array_sum($amount2);
                $paid = $paid - array_sum($amount2);
            }else{
                $release_paid =[];
            }

            if(count($order_lists) > 0){
                $data_found = 1;
            } else{
                $data_found = 0;
            }
            return view('front/affiliates/affiliate_list',compact('url','affiliates','order_lists','paid','release_paid','data_found'));
        }else{
            return view('front/affiliates/affiliate_start');
        }
    }
    public function affiliate_list(){

        $token = rand().'e'.Auth::user()->id;
        $url = URL::to('signup?t='.$token);
        $order_lists = [];
        $paid = [];
        $release_paid = []; 
        $data_found =0;
        // dd(Auth::user()->id);
        $affiliate = Refferal::where('user_id',Auth::user()->id)->get();
        // dd($affiliate);
        if(count($affiliate) > 0){
            foreach ($affiliate as $key => $v) {
               $list[] =$v['reg_id'];
                        
            }
            $order_lists = OrderDetails::with('artistDetails','orderItemDetails','cardDetails','orderItemDetails.orderProducts')->whereIn('customer_id',$list)->get();
            // $order_lists =OrderItem::whereIn('artist_id',$list)->get();
                  
            $paid_lists = OrderDetails::with('artistDetails','orderItemDetails','cardDetails','orderItemDetails.orderProducts','customerDetails')->whereIn('customer_id',$list)->where('release_status','!=',NULL)->get();            
            // dd($paid_lists );
            
            if(!empty($order_lists)){
                $amount = array();
                foreach ($order_lists as $key => $value) {
                  // $amount[] = round($value->artist_percent * ($value->grand_total/100), 2);
                  $amount[] =$value->artist_revenue;
                }
                
                $paid = array_sum($amount);
            }

            if(count($paid_lists) > 0){
                foreach ($paid_lists as $key => $v) {
                    //$amount2[] = round($v->artist_percent * ($v->grand_total/100), 2);
                    $amount2[] = $v ->artist_revenue;
                }
                $release_paid = array_sum($amount2);
                $paid = $paid - array_sum($amount2);
            }else{
                $release_paid =[];
            }
            if(count($order_lists) > 0){
                $data_found = 1;
            } 
            return view('front/affiliates/affiliate_list',compact('url','order_lists','paid','release_paid','data_found'));
        }else{
            return view('front/affiliates/affiliate_list',compact('url','order_lists','paid','release_paid','data_found'));
        }
    }
    public function affiliate_search_list(Request $request){
        
        $status_val = $request->status_val;
        $sort_by = $request->sort_by;
        $from_date = $request->from_date;
        $amount =[];
        $data_found =0;
        $to_date = $request->to_date?$request->to_date:Carbon::now();
        if($request->clear == 1){
            $status_val = "";
            $sort_by = "";
            $from_date = "";
            $to_date = "";
            $back_to = "";
        } else{
            $back_to = $request->to_date;
        }
        $affiliates = Refferal::where('user_id',Auth::user()->id)->get();
        if(count($affiliates) > 0){
            foreach ($affiliates as $key => $v) {
            $order_lists = OrderDetails::with('artistDetails','orderItemDetails','cardDetails','orderItemDetails.orderProducts')->where('customer_id',$v['reg_id'])
            ->when(!empty($status_val), function($query) use($status_val){
                $query->where('status',$status_val);
            })
            ->when(!empty($sort_by), function($query) use($sort_by){
                $query->orderBy('id',$sort_by);
            })
            ->when(!empty($from_date), function($query) use($from_date,$to_date){
                $query->whereRaw("(created_at >= ? AND created_at <= ?)", 
                    [$from_date." 00:00:00", $to_date." 23:59:59"]
                );
            })
            
            ->paginate(10);      
        }
        $affiliate = Refferal::where('user_id',Auth::user()->id)->get();
        foreach ($affiliate as $key => $v) {
            $list[] =$v['reg_id']; 
        }
        $order_list = OrderDetails::with('artistDetails','orderItemDetails','cardDetails','orderItemDetails.orderProducts','customerDetails')->whereIn('customer_id',$list)->get();
        $paid_lists = OrderDetails::with('artistDetails','orderItemDetails','cardDetails','orderItemDetails.orderProducts','customerDetails')->whereIn('customer_id',$list)->where('release_status','!=',NULL)->get(); 
       
        foreach ($order_list as $key => $value) {
            $amount[] = round($value->artist_percent * ($value->grand_total/100), 2);
        }
        $paid = array_sum($amount);
        if(count($paid_lists) > 0){
                foreach ($paid_lists as $key => $v) {
                    $amount2[] = round($v->artist_percent * ($v->grand_total/100), 2); 
                }
                $release_paid = array_sum($amount2);
                $paid = $paid - array_sum($amount2);
            }else{
                $release_paid =[];
            }
        }else{
            $paid =[];
            $order_lists =[];
            $release_paid = [];
        }
        
        $token = rand().'e'.Auth::user()->id;
        $url = URL::to('signup?t='.$token);
        $choosen['status_val']  = $status_val;
        $choosen['sort_by']     = $sort_by;
        $choosen['from_date']  = $from_date;
        $choosen['to_date']  = $back_to;
        if(count($order_lists) > 0){
            $data_found = 1;
        } 
        return view('front/affiliates/affiliate_list',compact('data_found','order_lists','url','choosen','paid','release_paid'));
    }
    public function affiliate_sharemail(Request $request){
        $this->validate($request, [
            'affiliate_mail' => 'required|email',
        ]);

        if($request->affiliate_mail != '' && isset($request->affiliate_mail)){
            $user_id= Auth::user()->id;
            $user_name = Auth::user()->name;
            $description = "use this link";  

            // $link = 'http://127.0.0.1:8000/signup?user_id='.$user_id;
            $token = rand().'e'.Auth::user()->id;
            $link = URL::to('signup?t='.$token);
            $params['user_email'] = $request->affiliate_mail;   
            Mail::send('mails.affiliate_ref_mail',  ['params' => $link,'name' => $user_name.' '.$description], function ($m) use ($params) {
                $m->from('711chitti@gmail.com', 'cooljellybean');
                $m->to($params['user_email'])->subject('Cooljellybean Refferal link shared');
            });
            
                return redirect()->back()->with('success','We have e-mailed your register link!');
             
        }else{
            return redirect()->back()->with('failed','We couldnot able to send mail....');
        }
        
    }
    
}
