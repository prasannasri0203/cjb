<?php

namespace App\Http\Controllers\Front;

use DB;
use App\User;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\ArtistCategory;

class ArtistListController extends Controller
{
    public function create(Request $request)
    {
		$artist_list = User::where('type',1)->whereIn('status', array(1))->whereNull('deleted_at')->paginate(5);
        $data = OrderItem::select(DB::raw('merchandise_products.artist_id, COUNT(*) as count'))
                            ->join('merchandise_products','merchandise_products.id', '=','order_item.merchandise_product_id')
                            ->groupBy('merchandise_products.artist_id')->orderBy('count','asc')->limit(3)->get();

        $cat_list = ArtistCategory::get();
        $status_val = $request->status_val;
        $choosen['status_val']  = $status_val;
        return view('front/artist_list',compact('artist_list','data','cat_list','choosen'));
    }
    public function artist_search_list(Request $request){
    	
    	$status_val = $request->status_val;
     	
       	$artist_list = ArtistCategory::with('userDetails')->where('id',(int)$status_val)
           				->paginate(5);
        $cat_list = ArtistCategory::get();   
     	$choosen['status_val']  = $status_val;
     	$data = OrderItem::select(DB::raw('merchandise_products.artist_id, COUNT(*) as count'))
                            ->join('merchandise_products','merchandise_products.id', '=','order_item.merchandise_product_id')
                            ->groupBy('merchandise_products.artist_id')->orderBy('count','asc')->limit(3)->get();
        
        return view('front/artist_list',compact('artist_list','data','choosen','cat_list'));
    }

}
