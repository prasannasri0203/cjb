<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtistCategory;
use DB;
use App\User;
use App\OrderItem;
use App\Categories;
use App\OrderDetails;

class SearchController extends Controller
{
	public function create(Request $request)
    {
  		$artist_list = User::where('type',1)->where('is_own_shop',1)->whereIn('status', array(1))->whereNull('deleted_at')->paginate(6);
          $data = OrderItem::select(DB::raw('merchandise_products.artist_id, COUNT(*) as count'))
                              ->join('merchandise_products','merchandise_products.id', '=','order_item.merchandise_product_id')
                              ->groupBy('merchandise_products.artist_id')->orderBy('count','asc')->get();
          
          $cat_list = ArtistCategory::get();
          $status_val = $request->status_val;
          $choosen['status_val']  = $status_val;

          return view('front/artist_list',compact('artist_list','data','cat_list','choosen'));
    }
    public function artist_search_list(Request $request){
      if($request->clear == 1){
        $status_val = '';
        $list = ArtistCategory::with('userDetails')->get();
      }else{
        $status_val = $request->status_val;
     	  $list = ArtistCategory::with('userDetails')->where('id',(int)$status_val)->get();
      }
    
        if(count($list) > 0 ){
          foreach ($list as $key => $value) {
          $artist_id[] = $value['userDetails']['id'];
        }
        $artist_list = User::whereIn('id',$artist_id)->paginate(5);
        }else{
          $artist_list = User::where('type',1)->whereIn('status', array(1))->whereNull('deleted_at')->paginate(5);
        }
      $cat_list = ArtistCategory::get();   
     	$choosen['status_val']  = $status_val;
     	$data = OrderItem::select(DB::raw('merchandise_products.artist_id, COUNT(*) as count'))
                            ->join('merchandise_products','merchandise_products.id', '=','order_item.merchandise_product_id')
                            ->groupBy('merchandise_products.artist_id')->orderBy('count','asc')->limit(3)->get();
        
        return view('front/artist_list',compact('artist_list','data','choosen','cat_list'));
    }
    public function merch_search_list(Request $request){
      
      // dd($request->all());
      if($request->clear == 1){
        $status_val = '';
        $list = ArtistCategory::with('userDetails')->get();
      }else{
        $status_val = $request->status_val;
     	  $list = ArtistCategory::with('userDetails')->where('id',(int)$status_val)->get();
      }
        $cat_list = ArtistCategory::get();   
        $choosen['status_val']  = $status_val;
        $subcat = Categories::whereNull('deleted_at')->get();
        return view('front/merch_sub_category',compact('subcat','choosen','cat_list'));
    }
}
