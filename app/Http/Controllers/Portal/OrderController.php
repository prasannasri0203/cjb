<?php

namespace App\Http\Controllers\Portal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\ShipmentDetailsImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\OrderStatusLabel;
use App\ShippingInfo;
use App\TrackingHistory;
use App\OrderItem;
use App\OrderDetails;
use App\MerchandiseProductImages;
use App\User;
use App\Supplier;
use App\ProductSupplier;
use App\Product;
use Auth;
use App\FaultReturn;
use App\FaultImage;
use App\FaultReturnHistory;
use App\Review;
use App\OrderCustomerAddressDetails;
use Illuminate\Support\Facades\Input;
use yajra\Datatables\Datatables;
use App\Categories;
use Mail;
use DB;
use App\CartDetails;
use App\Exports\ordersExport;


class OrderController extends Controller
{
 public function orderList()
 {
  $resultData  = null;
  return view('portal/order/order_list',compact('resultData'));
}
public function importShimentDetails(Request $request) {
 if($request->file('file')){
  $path = $request->file('file')->getRealPath();
  $import = new ShipmentDetailsImport;
  $data = Excel::import($import, $request->file('file'));
  $resultData = $import->data;
  return redirect()->route('admin.order_list')->with('resultData',$resultData);
} else{
  return redirect()->route('admin.order_list')->with('error','No File Selected');
}
}

   // shipping detail page

public function shippingCreate(Request $request,$id){
 $order_item = OrderItem::where('order_id',$id)->first();
 $order_detail = OrderDetails::where('id',$order_item->order_id)->first();
 $status_list = OrderStatusLabel::get();
 $trackhistory=TrackingHistory::where('order_id',$id)->orderBy('id', 'ASC')->first();
 return view('portal/order/add_shipping_details',compact('status_list','order_item','order_detail','id','trackhistory'));
}


// shipping save

public function SaveShippingDetails(Request $request){

 $rules =[
   'order_id'          => 'required',
         // 'shipping_method'   => 'required',
   'shipping_company'  => 'required',
   'tracking_num'      => 'required',
   'shipping_date'     => 'required',
         // 'comments'          => 'required',
   'order_status_id'   => 'required'
 ];

 $customMessages = [
   'order_id.required'        => 'Order Id is required.',
         // 'shipping_method.required' => 'Shipping Method is required.',
   'shipping_company'         => 'Shipping Company is required',
   'tracking_num.required'    => 'Tracking Number is required.',
   'shipping_date.required'   => 'Shipping Date is required.',
         // 'comments.required'        => 'Comments is required.',
   'order_status_id.required' => 'Order Status is required.',

 ];

 $this->validate($request, $rules, $customMessages);

 $shippingInfo = new ShippingInfo;
 $shippingInfo->order_id     = $request->order_id;
 $shippingInfo->status       = $request->order_status_id;
          // $shippingInfo->created_at   = date('j F, Y');
          // $shippingInfo->updated_at   = date('j F, Y');
 $shippingInfo->save();
 $insertedId = $shippingInfo->id;

 if($insertedId){
  $tracking = new TrackingHistory;
  $tracking->shipping_info_id	  = $insertedId;
               // $tracking->shipping_method      = $request->shipping_method;
  $tracking->shipping_company     = $request->shipping_company;
  $tracking->tracking_num         = $request->tracking_num;
  $tracking->shipping_date        = new Carbon($request->shipping_date);
  $tracking->comments             = $request->comments;
  $tracking->order_status_id      = $request->order_status_id ? $request->order_status_id : 1;
  $tracking->order_id             = $request->order_prime_id;
               // $tracking->created_at           =   date('j F, Y');
               // $tracking->updated_at           =  date('j F, Y');
  $tracking->save();

        //   dd($request->order_status_id, $request->order_prime_id);
  if($request->order_status_id == 5){

    $order_detail['status'] = 2;
    $orders = OrderDetails::where('id',$request->order_prime_id);
    $orders->update($order_detail);
  }
}
return redirect('admin/order_view/'.$request->order_prime_id)->with('success', 'Shipping Details Added successfully');

}

   // shipping item detail page

public function shippingItemCreate(Request $request,$id,$item_id){
    // dd($request->all());
 $order_item = OrderItem::where('order_id',$id)->first();
 $order_detail = OrderDetails::where('id',$order_item->order_id)->first();
 $status_list = OrderStatusLabel::get();
 $trackhistory=TrackingHistory::where('order_id',$id)->where('item_id',$item_id)->orderBy('id', 'ASC')->first();
 return view('portal/order/add_shipping_item_details',compact('status_list','order_item','order_detail','item_id','id','trackhistory'));
}




// shipping item save

public function SaveShippingItemDetails(Request $request){

  // dd($request->all());
 $rules =[
   'order_id'          => 'required',
   'item_id'          => 'required',
         // 'shipping_method'   => 'required',
   'shipping_company'  => 'required',
   'tracking_num'      => 'required',
   'shipping_date'     => 'required',
         // 'comments'          => 'required',
   'order_status_id'   => 'required'
 ];

 $customMessages = [
   'order_id.required'        => 'Order Id is required.',
   'item_id.required'        => 'Order Id is required.',
         // 'shipping_method.required' => 'Shipping Method is required.',
   'shipping_company'         => 'Shipping Company is required',
   'tracking_num.required'    => 'Tracking Number is required.',
   'shipping_date.required'   => 'Shipping Date is required.',
         // 'comments.required'        => 'Comments is required.',
   'order_status_id.required' => 'Order Status is required.',

 ];

 $this->validate($request, $rules, $customMessages);

 $shippingInfo = new ShippingInfo;
 $shippingInfo->order_id     = $request->order_id;
 $shippingInfo->item_id     = $request->item_id;
 $shippingInfo->status       = $request->order_status_id;
          // $shippingInfo->created_at   = date('j F, Y');
          // $shippingInfo->updated_at   = date('j F, Y');
 $shippingInfo->save();
 $insertedId = $shippingInfo->id;

 if($insertedId){
  $tracking = new TrackingHistory;
  $tracking->shipping_info_id    = $insertedId;
               // $tracking->shipping_method      = $request->shipping_method;
  $tracking->shipping_company     = $request->shipping_company;
  $tracking->tracking_num         = $request->tracking_num;
  $tracking->shipping_date        = new Carbon($request->shipping_date);
  $tracking->comments             = $request->comments;
  $tracking->order_status_id      = $request->order_status_id ? $request->order_status_id : 1;
  $tracking->order_id             = $request->order_prime_id;
  $tracking->item_id             = $request->item_id;
               // $tracking->created_at           =   date('j F, Y');
               // $tracking->updated_at           =  date('j F, Y');
  $tracking->save();

        //   dd($request->order_status_id, $request->order_prime_id);
  if($request->order_status_id == 5){

    $order_detail['status'] = 2;
    $orders = OrderDetails::where('id',$request->order_prime_id);
    $orders->update($order_detail);
  }
}
return redirect('admin/order_view/'.$request->order_prime_id)->with('success', 'Shipping Details Added successfully');

}

public function order_index(Request $request)
{

 $cust = Input::get('cus_id');
 $sup = Input::get('sup_id');
 $art = Input::get('art_id');
 $y ;
 $x=0;
 if($cust)
 {
  $request->customer = $cust;
}

$data = OrderItem::whereHas('orderDetails')->with(['orderDetails','get_images','supplierName','OrderDetails.customerDetails','get_images.ProductDetails','orderProducts.artistDetails','CustomerDetails']);
if ($request->ajax()) {
 if($request->customer){

  $data = $data->whereHas('CustomerDetails', function($query) use ($request){
   $query->where('id',$request->customer);
 });

  $x=0;


}
if($request->supplier){
  $x==0;
  $data = $data->whereHas('supplierName', function($query) use ($request){
   $query->where('id',$request->supplier);
 });
}
if($request->order_ids){
  $data = $data->whereHas('orderDetails', function($query) use($request){
   $query->where('order_id',1);
 });
  $x=0;


}
if($request->product){
  $x==0;
  $data = $data->whereHas('get_images.ProductDetails', function($query) use ($request){
   $query->where('product_name',$request->product);
 });
}
if($request->artist){
  $x==0;
  $data = $data->whereHas('orderProducts.artistDetails', function($query) use($request){
   $query->where('id',$request->artist);
 });
}
if($x==0)
{
  $data = $data->get();
}


return Datatables::of($data)
->addIndexColumn()
->addColumn('action', function($row){
 $btn = '<a href="order_view/'.$row->id.'" class="btn btn-primary btn-sm">View</a>';
               // $btn = $btn.'<a href="order_edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
 $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setUserId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
 $return_status = OrderDetails::where('id',$row->id)->get('return_status');
 if(count($return_status) > 0 &&!$return_status[0]['return_status'] == 1)
 {
                //$status = DB::table('tracking_history ')->where('order_id',$row->id)->where('order_status_id',5);
   $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row->id.'" id="button_id_'.$row->id.'"  onclick="enableReturn('.$row->order_id.')" class="btn btn-primary btn-sm">Enable return</a>';
   return $btn;

 }
 else
 {
   $btn = $btn.' <a href="javascript:void(0)" style="background-color : black" data-id="'.$row->id.'" id="button_id_'.$row->id.'"  onclick="enableReturn('.$row->order_id.')" class="btn btn-primary btn-sm">Disable return</a>';
   return $btn;
 }
})
->addColumn('shipping_item_count', function($row){
  $x = OrderItem::where('order_id', $row->order_id)->sum('product_quantity');
  return $x > 0 ? $x : 0;
})
->addColumn('order_id', function($row){
  $x = OrderDetails::where('id', $row->order_id)->get('order_id');
  return count($x) > 0 ? $x[0]['order_id'] : 0;
})
->addColumn('grand_total', function($row){
  $x = OrderDetails::where('id', $row->order_id)->get('grand_total');
  return count($x) > 0 ? $x[0]['grand_total'] : 0;
})
->addColumn('status', function($row){
            //   dd($row);
 if($row->orderDetails->status == 1){
  return 'Pending';
}
else if($row->orderDetails->status == 2){
  return 'Completed';
}
else if($row->orderDetails->status == 3){
  return 'Cancelled';
}
})
->rawColumns(['action','status','order_id','shipping_item_count','grand_total'])
->make(true);
}
$customers = User::get();
          // dd($custmers);
$supplier_name = Supplier::where('deleted_at', null)->get();
$order_id = OrderDetails::where('deleted_at', null)->get();
$product_name = Product::where('deleted_at',null)->get();
$user = User::where('type',1)->where('deleted_at',null)->get();
$status_list = OrderStatusLabel::get();

return view('portal/order/order_list',compact('customers','supplier_name','order_id','product_name','cust','sup','user','art','status_list'));

}
public function order_index_data(Request $request){
  $x=0;
  $data = OrderDetails::where('order_management.deleted_at',null);
  if ($request->ajax()) {
    if($request->customer){

     $data = $data->whereHas('CustomerDetails', function($query) use ($request){
      $query->where('id',$request->customer);
    });

     $x=0;


   }
   if($request->supplier){
     $x==0;
     $data = $data->whereHas('orderItemDetails.supplierName', function($query) use ($request){
      $query->where('id',$request->supplier);
    });
   }
   if($request->order_ids){
     $data = $data->whereHas('orderItemDetails', function($query) use($request){
      $query->where('order_id',$request->order_ids);
    });
     $x=0;

   }

   if($request->product){
     $x==0;
     $data = $data->whereHas('orderItemDetails.orderProducts.ProductDetails', function($query) use ($request){
      $query->where('product_name',$request->product);
    });
   }

   if($request->order_status){
     $x==0;

     $data = $data->join('shipping_info', 'order_management.order_id', 'shipping_info.order_id')
     ->where('shipping_info.status', $request->order_status)
     ->where('shipping_info.id', function($query) {
      $query->select('id')
      ->from('shipping_info')
      ->whereColumn('order_id', 'order_management.order_id')
      ->orderByDesc('id')
      ->limit(1);
    });

   }

   if($request->artist){
     $x==0;
     $data = $data->whereHas('artistDetails', function($query) use($request){
      $query->where('id',$request->artist);
    });
   }
   if($x==0)
   {
     $data = $data->get();
   }



   return Datatables::of($data)

   ->addColumn('action', function($row){
    $btn = '<a href="order_view/'.$row->id.'" class="btn btn-primary btn-sm">View</a>';
    $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setUserId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
    $return_status = OrderDetails::where('id',$row->id)->get('return_status');
    if(count($return_status) > 0 &&!$return_status[0]['return_status'] == 1)
    {
      $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row->id.'" id="button_id_'.$row->id.'"  onclick="enableReturn('.$row->id.')" class="btn btn-primary btn-sm">Enable return</a>';
      return $btn;
    }
    else
    {
      $btn = $btn.' <a href="javascript:void(0)" style="background-color : black" data-id="'.$row->id.'" id="button_id_'.$row->id.'"  onclick="enableReturn('.$row->id.')" class="btn btn-primary btn-sm">Disable return</a>';
      return $btn;
    }
  })

   ->addColumn('status', function($row){
    if($row->status == 1){
     return 'Pending';
   }
   else if($row->status == 2){
     return 'Completed';
   }
   else if($row->status == 3){
     return 'Cancelled';
   }
 })
   ->make(true);
 }

}

//product Supplier List

public function productSupplierList(Request $request)
{  
  $pro_sup_list=ProductSupplier::where('product_id',$request->product_id)->pluck('supplier_id');

  $sup_list=Supplier::whereIn('id',$pro_sup_list)->get(); 
  return response()->json([ 
   'status' => true,
   'supplier_list' => $sup_list
 ], 200);

}

// supplier update and mail send
public function productSupplierUpdate(Request $request)
{   

  $cencal_order = OrderItem::find($request->pro_orderid);

//order item fetch cancel supplier mail  send 
   $cencal_orderDetails = OrderDetails::where('id', $cencal_order->order_id)->with('orderItemDetails', 'orderItemDetails.get_images', 'customerBillingAddress', 'orderItemDetails.orderProducts', 'customerDetails')
                    ->first();
  
    $cencal_item = [];
    $cencal_item['id'] = $cencal_order->merchandise_product_id;
    $cencal_item['name']= $cencal_order->orderProducts->name_creation;
    $cencal_item['image'] = (isset($order
      ->orderProducts
      ->image) && ($cencal_order
        ->orderProducts->image != '')) ? $order
    ->orderProducts->image : '';
    $cencal_item['price'] = $cencal_order->product_price;
    $cencal_item['variant_ref_no'] = $cencal_order->orderProducts->variantDetails->product_variant_ref_no;
    $cencal_item['artist_percent'] = $cencal_order->artist_percent;
    $cencal_item['artist_revenue'] = $cencal_order->artist_revenue;
    $cencal_item['affiliate_percent'] = $cencal_order->affiliate_percent;
    $cencal_item['affiliate_revenue'] = $cencal_order->affiliate_revenue;
    $cencal_item['admin_percent'] = $cencal_order->product_price;
    $cencal_item['admin_revenue'] = $cencal_order->product_price;
    $cencal_item['product_quantity'] = $cencal_order->product_quantity;
    $reqfile = '';
    if ($cencal_order->get_images != '') $reqfile = $cencal_order
      ->get_images->file;
    $cencal_item['file'] = $reqfile;
    $cencal_item['supplier'] = Supplier::where('id', $cencal_order->supplier_id)
    ->first();
    $cencal_item['artist'] = User::where('id', $cencal_order->artist_id)->first();
    $cencal_itemData[] = $cencal_item;
    $cencal_user_detls = User::where('id', $cencal_orderDetails->customer_id)->first();
    $cencal_username=$cencal_user_detls->name;
    $cencal_usermail=$cencal_user_detls->email;

  
                // return item Data;
  $cencal_address['no'] = $cencal_orderDetails->customerBillingAddress->no;
  $cencal_address['street_1'] = $cencal_orderDetails->customerBillingAddress->street_1;
  $cencal_address['street_2'] = $cencal_orderDetails->customerBillingAddress->street_2;
  $cencal_address['region'] = $cencal_orderDetails->customerBillingAddress->region;
  $cencal_address['country'] = $cencal_orderDetails->customerBillingAddress->country;
  $cencal_address['zipcode'] = $cencal_orderDetails->customerBillingAddress->zipcode;
  $cencal_address['contact_no'] = $cencal_orderDetails->customerBillingAddress->contact_no;
  $cencal_address['landmark'] = $cencal_orderDetails->customerBillingAddress->landmark;
  $cencal_addressData[] = $cencal_address;

  $cencal_content['order_id'] = $cencal_orderDetails->id;
  $cencal_content['order_ref'] = $cencal_orderDetails->order_id;
  $cencal_content['name'] = $cencal_username;
  $cencal_content['email'] = $cencal_usermail;
  $cencal_content['sub_total'] = $cencal_orderDetails->sub_total;
  $cencal_content['print_price'] = $cencal_orderDetails->cardDetails->print_price;
  $cencal_content['tax_total'] = $cencal_orderDetails->tax_total;
  $cencal_content['grand_total'] = $cencal_orderDetails->grand_total;
  $cencal_content['payment_type'] = $cencal_orderDetails->payment_type;
  $cencal_content['packing_name'] = $cencal_orderDetails->packing_name;
  $cencal_content['packing_amount'] = $cencal_orderDetails->packing_amount;
  $cencal_content['delivery_name'] = $cencal_orderDetails->delivery_name;
  $cencal_content['delivery_amount'] = $cencal_orderDetails->delivery_amount;
  $cencal_content['artist_revenue'] = $cencal_orderDetails->artist_revenue;
  $cencal_content['order_items'] = $cencal_itemData;

  $cencal_content['supplier_mail'] = Supplier::where('id', $cencal_orderDetails->orderItemDetails[0]
    ->supplier_id)
  ->pluck('email')
  ->first();

  $cencal_content['artist_mail'] = User::where('id', $cencal_orderDetails->artist_id)
  ->pluck('email')
  ->first();
  $cencal_content['address'] = $cencal_addressData;
  $cencal_content['product'] = product::where('supplier_id', $cencal_orderDetails->orderItemDetails[0]
    ->supplier_id)
  ->first();

  $cc_mail = DB::table('users')->where('type', '0')
              ->pluck('email')
              ->toArray();

 $destinationPath = public_path('/merchandise-img/');
 $cencal_content['mail_type'] = 'supplier';
 

// mail send $orderValue['supplier']['email']
  foreach ($cencal_content['order_items'] as $orderKey => $orderValue) {

    $artistData['orderValue'] = $orderValue; 
    $artistData['cencal_content']   = $cencal_content;
// dd($orderValue);
    Mail::send('mails/supplier_order_cancel_mail', $artistData, function ($message) use ($cencal_content, $destinationPath, $cc_mail,$orderValue)
    {
      $message->to($orderValue['supplier']['email'])->subject('Cool Jelly Bean : Canceled Order ' . $cencal_content['order_ref']);
      $message->from('xyz@gmail.com');
      $message->cc($cc_mail);
      $message->setBody('test cancel order supplier'); 
    });
  }

// end cancel mail send  order send

// supplier update

  $order_item['supplier_id'] = $request->supplierid; 
  $order = OrderItem::find($request->pro_orderid);
  $order->update($order_item);
  $content = [];
  $itemData =[];

//order item fetch change supplier mail send
   $orderDetails = OrderDetails::where('id', $order->order_id)->with('orderItemDetails', 'orderItemDetails.get_images', 'customerBillingAddress', 'orderItemDetails.orderProducts', 'customerDetails')
                    ->first();
  
    $item = [];
    $item['id'] = $order->merchandise_product_id;
    $item['name']= $order->orderProducts->name_creation;
    $item['image'] = (isset($order
      ->orderProducts
      ->image) && ($order
        ->orderProducts->image != '')) ? $order
    ->orderProducts->image : '';
    $item['price'] = $order->product_price;
    $item['variant_ref_no'] = $order->orderProducts->variantDetails->product_variant_ref_no;
    $item['artist_percent'] = $order->artist_percent;
    $item['artist_revenue'] = $order->artist_revenue;
    $item['affiliate_percent'] = $order->affiliate_percent;
    $item['affiliate_revenue'] = $order->affiliate_revenue;
    $item['admin_percent'] = $order->product_price;
    $item['admin_revenue'] = $order->product_price;
    $item['product_quantity'] = $order->product_quantity;
    $reqfile = '';
    if ($order->get_images != '') $reqfile = $order
      ->get_images->file;
    $item['file'] = $reqfile;
    $item['supplier'] = Supplier::where('id', $order->supplier_id)
    ->first();
    $item['artist'] = User::where('id', $order->artist_id)->first();
    $itemData[] = $item;
    $user_detls = User::where('id', $orderDetails->customer_id)->first();
    $username=$user_detls->name;
    $usermail=$user_detls->email;

  
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
  $content['name'] = $username;
  $content['email'] = $usermail;
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

                     $destinationPath = public_path('/merchandise-img/');
 $content['mail_type'] = 'supplier';
 

// mail send $orderValue['supplier']['email']
  foreach ($content['order_items'] as $orderKey => $orderValue) {

    $artistData['orderValue'] = $orderValue; 
    $artistData['content']   = $content;

    Mail::send('mails/supplier_order_change_mail', $artistData, function ($message) use ($content, $destinationPath, $cc_mail,$orderValue)
    {
      $message->to($orderValue['supplier']['email'])->subject('Cool Jelly Bean : New Order ' . $content['order_ref']);
      $message->from('xyz@gmail.com');
      $message->cc($cc_mail);
      $message->setBody('test'); 
    });
  }






  return redirect()->route('admin.order_list')
  ->with('success','Order Supplier changed Successfully');
}


// order view 
public function view_order($id)
{
      // dd($id);
 $order_details = null;
 if (Auth::check()) {

   $order_details = OrderDetails::where('id',$id)->with('orderItemDetails','orderItemDetails.orderProducts','orderItemDetails.orderProducts.merchProductImage','orderItemDetails.orderProducts.artistDetails','orderItemDetails.supplierName','orderItemDetails.orderProducts.variantDetails','customerBillingAddress','customerDetails')->first();

   $return_array = FaultReturn::where('order_id',$id)->pluck('product_id')->toArray();
   $order_product=OrderItem::where('id',$id)->first();
   $customer = User::where('id',$order_details->customer_id)->first();
   $review_data=Review::where('id',$id)
   ->orWhere('customer_id', $order_details->customer_id)
   ->first();
   $shippingInfo = TrackingHistory::with('orderItemlist')->where('order_id',$order_details->id)->get();
         // dd($shippingInfo);
   $shippingDate=TrackingHistory::where('order_id',$order_details->id)->where('order_status_id',2)->orderBy('id','ASC')->first();

   $additional_charge = CartDetails::where('id',$order_details->cart_id)->first();

   $faults_returns = DB::table('faults_returns')
   ->select('*')
   ->join('faults_returns_history', 'faults_returns_history.fault_id', '=', 'faults_returns.id')
   ->join('products', 'products.id', '=', 'faults_returns.product_id')
   ->where('faults_returns.order_id', $id)
   ->get(); 
          // dd($shippingInfo); 
 }
 return view('portal/order/order_view',compact('additional_charge','return_array','order_details','order_product','review_data','shippingInfo','customer','shippingDate','faults_returns'));
}

public function destroy(Request $request)
{
 $id = $request->userId;
 if($id){
   OrderItem::find($id)->delete(); 
   return redirect()->route('admin.order_list')
   ->with('success','Order deleted successfully');
 }else
 return redirect()->route('admin.order_list')
 ->with('success','Order user not found');
 
}

public function edit($id)
{
 $order_item = OrderItem::where('id',$id)->first();
 $order_detail = OrderDetails::where('id',$order_item->order_id)->first();
     // $supplier = Supplier::where('id',$order_item->supplier_id)->first();
 $order_id_data = $order_detail->order_id;
 $customer_detail = OrderCustomerAddressDetails::where('customer_id',$order_detail->customer_id)->first();
 return view('portal/order/order_edit',compact('order_item','order_detail','customer_detail','order_id_data'));
}

public function update(Request $request)
{
 $rules =[
  'order_id'          => 'required',
  'sup_id'   => 'required',
  'product_price'  => 'required',
  'tax_total'      => 'required',
  'discount_total'     => 'required',
  'shipping_total'          => 'required',
  'grand_total'   => 'required',
  'status' => 'required'
];

$customMessages = [
  'order_id.required'        => 'Order Id is required.',
  'sup_id.required' => 'supplier id is required.',
  'product_price.required'         => 'Product Price is required',
  'tax_total.required'    => 'Tax Total is required.',
  'discount_total.required'   => 'Discount Total is required.',
  'shipping_total.required'        => 'Shipping Total required.',
  'grand_total.required' => 'Grand Total is required.',
  'status' => 'status is required'

];

$this->validate($request, $rules, $customMessages);

$id = $request->id;
      //dd($request);
$order_item['order_id'] = $request->order_id;
$order_item['supplier_id'] = $request->sup_id;
$order_item['product_price'] = $request->product_price;
$order_item['status'] = $request->status;
$order = OrderItem::find($id);
$order->update($order_item);
$order_detail['tax_total'] = $request->tax_total;
$order_detail['discount_total'] = $request->discount_total;
$order_detail['shipping_total'] = $request->shipping_total;
$order_detail['grand_total'] = $request->grand_total;
$orders = OrderDetails::where('order_id',$id);
$orders->update($order_detail);
return redirect()->route('admin.order_list')
->with('success','Order updated successfully');
}

public function enable_return(Request $request)
{
 $order_item['status'] = 1;

 $order = OrderDetails::find($request->id);
 $return_status = OrderDetails::where('id',$request->id)->get('return_status');

 if($return_status[0]['return_status'] == 0)
 {
   $x =1;
 }
 else
 {
  $x =0;
}
    //dd($order);
$update = OrderDetails::where('id',$request->id)->update(['return_status'=>$x]);


if($update)
{
  return response()->json([
   'return_status' => $x,
   'status' => true,
   'id' => $request->id
 ], 200);
}
else
{
  return response()->json([
   'return_status' => $x,
   'status' => false,
   'id' => ''
 ], 200);
}





}

public function export(Request $request)
{
  $from = $request->input('from');
  $to   = $request->input('to');
  return Excel::download(new ordersExport($from, $to), 'accounts'.$from.' to '.$to.'.csv');
}

public function product_delivered(Request $request)
{
  $order = OrderDetails::where('id',$request->orderId)->first();
  $order->release_status = now();
  if($order->save()){
    return redirect()->back()->with('success','Successfully product delivered');
  }else{
    return redirect()->back()->with('error','Failed');
  }

}

}
