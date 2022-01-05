<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderDetails;
use App\Review;
use App\OrderItem;
use App\Product_variant;
use App\FaultReturn;
use App\FaultImage;
use App\FaultReturnHistory;
use App\User;
use Auth;
use DB;
use Image;
use File;
use Carbon\Carbon;
use Validator;
use App\ShippingInfo;
use Illuminate\Support\Facades\Input;
use App\TrackingHistory;
use App\CartDetails;
use App\ArtistCategory;
use Notification;
use App\Notifications\MyEnquiryNotification;
use App\Notifications\MyOrderNotification;
use App\Notifications\MyFaultAndReturnsNotification;
use Session;

class OrderController extends Controller
{
    public function orderListPage(Request $request) { 

        $status_val = $request->status_val;
        $sort_by = $request->sort_by;
        $from_date = $request->from_date;
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
        if((Auth::user()->type == 2)||(Auth::user()->type == 1)){
            $user_id= Auth::user()->id;
            $order_list = OrderDetails::where('customer_id',$user_id)
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

  
        $choosen['status_val']  = $status_val;
        $choosen['sort_by']     = $sort_by;
        $choosen['from_date']  = $from_date;
        $choosen['to_date']  = $back_to;

        return view('front/order_list',compact('order_list','choosen'));
    }

    public function artistSaleProduct(Request $request){
        $status_val = $request->status_val;
        $sort_by = $request->sort_by;
        $from_date = $request->from_date;
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
        
        if((Auth::user()->type == 2)||(Auth::user()->type == 1)){
            $user_id= Auth::user()->id;
            $order_list = OrderDetails::where('artist_id',$user_id)

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

        $choosen['status_val']  = $status_val;
        $choosen['sort_by']     = $sort_by;
        $choosen['from_date']  = $from_date;
        $choosen['to_date']  = $back_to;

        return view('front/artist_sale_product',compact('order_list','choosen'));
    }

    public function orderDetailPage($id) {
        $order_details = null;
        if (Auth::check()) {
            $order_details = OrderDetails::where('id',$id)->with('orderItemDetails','orderItemDetails.orderProducts','orderItemDetails.orderProducts.artistName','orderItemDetails.orderProducts.merchProductImage','orderItemDetails.orderProducts.artistDetails','orderItemDetails.orderProducts.variantDetails','customerBillingAddress','customerDetails')->get();  
            
            $return_array = FaultReturn::where('order_id',$id)->pluck('product_id')->toArray();
            $order_product=OrderItem::where('order_id',$id)->first();
            $review_data=Review::where('id',$id)->first();
            $product_variant=Product_variant::where('id',$order_details[0]->product_variant_id)->first();

            $shippingInfo = ShippingInfo::with('trackingList.orderItemlist.orderProducts')->where('order_id',$order_details[0]->order_id)->get(); 

            $status=ShippingInfo::where('order_id',$order_details[0]->order_id)->where('deleted_at',null)->first(); 
        	$additional_charge = CartDetails::where('id',$order_details[0]->cart_id)->first();
            if($status)
            {
            $shippingDate=TrackingHistory::where('shipping_info_id',$status->id)->where('deleted_at',null)->select('shipping_date','order_status_id')->first();                    
            }
            else
            {
                //$shippingDate[]='';
                $shippingDate['order_status_id']=null;
                $shippingDate['shipping_date']= null;
            }
    
        }
    
         
        foreach ($order_details as $key => $value) {

            $order_details = $value;
        } 
        // return $shippingInfo;
        return view('front/order_detailpage',compact('shippingInfo','shippingDate','product_variant','order_details','return_array','order_product','review_data','additional_charge'));
        
    }

    public function saleProductDetailPage($id) {
        $order_details = null;
        if (Auth::check()) {
            $order_details = OrderDetails::where('id',$id)->with('orderItemDetails','orderItemDetails.orderProducts','orderItemDetails.orderProducts.artistName','orderItemDetails.orderProducts.merchProductImage','orderItemDetails.orderProducts.artistDetails','orderItemDetails.orderProducts.variantDetails','customerBillingAddress','customerDetails')->get();  

            $return_array = FaultReturn::where('order_id',$id)->pluck('product_id')->toArray();
            $order_product=OrderItem::where('order_id',$id)->first();
            $review_data=Review::where('id',$id)->first();

            $shippingInfo = ShippingInfo::where('order_id',$order_details[0]->order_id)->get(); 

            $status=ShippingInfo::where('order_id',$order_details[0]->order_id)->where('deleted_at',null)->first(); 
            $additional_charge = CartDetails::where('id',$order_details[0]->cart_id)->first();
            if($status)
            {

            $shippingDate=TrackingHistory::where('shipping_info_id',$status->id)->where('deleted_at',null)->select('shipping_date','order_status_id')->first();                    
            }
            else
            {
                //$shippingDate[]='';
                $shippingDate['order_status_id']=null;
                $shippingDate['shipping_date']= null;
            }
    
        }

        foreach ($order_details as $key => $value) {

            $order_details = $value;
        }

        return view('front/sale_product_detailpage',compact('shippingInfo','shippingDate','order_details','return_array','order_product','review_data','additional_charge'));
        
    }


    public function orderCancel($id) {
        if (Auth::check()) {
            $orderDetails = OrderDetails::where('id',$id)->first();
            $orderDetails->status   = 3;
            $orderDetails->update();
        }
        return redirect()->route('order_details',$id)->with('success', 'Product Cancelled successfully');
    }

    public function AddFaultChecker(Request $request){
        $rules = array(
            'order_id'          => 'required',
            'fault_image'       => 'required|mimes:jpeg,jpg,png,gif|required|max:10000',           
            'remarks'           => 'required',           
        );

        $new_id = 0;
        $order_list = OrderDetails::where('id',$request->order_id)->first();
        $check_fault = FaultReturn::where('order_id',$request->order_id)->where('product_id',$request->fault_product)->first();
        if($check_fault == null){
            $fault_details=new FaultReturn;
                $fault_details->order_id        =   $request->order_id;
                $fault_details->customer_id     =   $order_list->customer_id;
                $fault_details->product_id      =   $request->fault_product;
                $fault_details->remarks         =   $request->remarks;
            $fault_details->save();
            $new_id = $fault_details->id;
        }
        

        if($new_id != 0){
            $user = User::where('type', '0')->get();
            if($user){
                $details =[
                    'id'  => $fault_details->id,
                    'url' => 'admin/fault_view/'.$fault_details->id,
                ];
                Notification::send($user, new MyFaultAndReturnsNotification($details));
            }


            $fault_img= '';
            if ($request->hasFile('fault_image')) {
                foreach ($request->file('fault_image') as $key => $file) {

                    if(!is_dir(public_path('/portal/img/fault/'))){
                        mkdir(public_path('/portal/img/fault/'));
                    }

                    $fault_img= 'IMG_'.rand().'.'.$file->getClientOriginalExtension();
                    $Image = Image ::make($file->getRealPath());
                    $originalPath = public_path().'/portal/img/fault/';

                    if(!File::isDirectory($originalPath)){
                        File::makeDirectory($originalPath, 0777, true, true);
                    } 
                    $Image->save($originalPath.$fault_img);
                    $image_names[] = $fault_img;
            
                }
                $images = implode(",",$image_names);
                $fault_image_details=new FaultImage;
                $fault_image_details->fault_id    =   $fault_details->id;
                $fault_image_details->fault_image =   $images;
                $fault_image_details->save();
            }

            $fault_history=new FaultReturnHistory;
            $fault_history->fault_id    =   $fault_details->id;
            $fault_history->status      =   "completed";
            $fault_history->remarks     =   $request->remarks;
            $fault_history->save();
        }
        
        $return_array = FaultReturn::where('order_id',$request->order_id)->pluck('product_id')->toArray();
        $item_array = OrderItem::where('order_id',$request->order_id)->pluck('merchandise_product_id')->toArray();
        
        sort($return_array); 
        sort($item_array); 
        if ($return_array == $item_array) {
            if (Auth::check()) {
                $orderDetails = OrderDetails::where('id',$request->order_id)->first();
                $orderDetails->status   = 4;
                $orderDetails->update();
            }
        }

        $orderDetails = OrderDetails::where('id',$request->order_id)->first();
        return redirect()->route('order_details',$request->order_id)->with('success', 'Falut Return Added successfully');
   
    }
    public function ViewReturnItems($order_id,$product_id){   
        
        $name_creation = DB::select('SELECT * FROM order_management OM 
            INNER JOIN order_item OI ON OM.id = OI.order_id
            INNER JOIN merchandise_products MP ON MP.id = OI.order_id
            INNER JOIN artist_category AC ON MP.artist_category_id = AC.id
            WHERE OM.id = "'.$order_id.'" ');
        
        if(isset($name_creation[0]->name_creation) && $name_creation[0]->name_creation !=''){
            $name_creation = $name_creation[0]->name_creation;
        }else{
            $name_creation = '';
        }

        $fault_edit = FaultReturn::where('order_id', $order_id)->where('product_id', $product_id)->with(['fault_image','fault_history','customerName','staffName','orderDetails','orderDetails.orderItemDetails','orderDetails.orderItemDetails.supplierName'])->first();
        return view('front/view_return_items',compact('name_creation','fault_edit'));
    }
        public function review_save(Request $request)
    {
    $rules = array('product_rating' => ['required']);
    $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
            return response()->json($response);            
        }
        else
        {
            if($request->review_id==0)
            {
                $review=new Review;
                $review->product_rating = trim($request->product_rating);
                $review->customer_id = trim($request->customer_id);
                $review->order_id = trim($request->order_id);
                $review->product_id = trim($request->product_id);
                $review->product_review = trim($request->review_des);
                $review->save();
                    

            }
            else
            {
                $review=Review::find($request->review_id);
                $review->product_rating = trim($request->product_rating);
                $review->customer_id = trim($request->customer_id);
                $review->order_id = trim($request->order_id);
                $review->product_id = trim($request->product_id);
                $review->product_review = trim($request->review_des); 
                $review->save();               
            }

                    $response = array(
                        'status' => true,
                        'id' => $review->id,
                    ); 
                    return response()->json($response);  
        }
      
    }

}
