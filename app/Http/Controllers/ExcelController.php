<?php

namespace App\Http\Controllers;

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
use DB;
use App\CartDetails;
use App\Exports\ordersExport;

class ExcelController extends Controller
{
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
