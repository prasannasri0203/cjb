<?php

namespace App\Http\Controllers\Front;

use DB;
use Auth;
use App\User;
use App\Categories;
use App\OrderItem;
use App\OrderDetails;
use App\ArtistCategory;
use App\MerchandiseProduct;
use Illuminate\Http\Request;
use App\MerchandiseProductImages;
use App\Http\Controllers\Controller;

class ArtistShopController extends Controller
{
    public function view()
    {
        $id = Auth::user()->id;
        $user = User::where('status',1)->whereIn('status', array(1))->whereNull('deleted_at')->find($id);
        $theme = DB:: table("artist_themes")->where('user_id',$id)->where('status',1)->first();
        $category = ArtistCategory::where('user_id',$id)->where('sort_order',1)->first();
        if($category){
        $product = MerchandiseProduct::with('artistName')
                                                    ->where('artist_category_id',$category->id)
                                                    ->where('artist_id', $id)
                                                    ->get();
        }
        $category_id = ArtistCategory::where('user_id',$id)->where('sort_order',2)->first();
        if($category_id){
        $product_id = MerchandiseProduct::with('artistName')
                                                    ->where('artist_category_id',$category_id->id)
                                                    ->where('artist_id', $id)
                                                    ->get();
                                                   }
        $product_name = MerchandiseProduct::where('artist_id',$id)->get();
        $collection = collect($product_name);

        $unique_data = $collection->unique('merchandise_product_name')->values()->all();
        // $product_name->values()->all();
        // dd($unique_data);
        return view('front/artist_shop',compact('theme','user','product','category','category_id','product_id','product_name','unique_data'));

    }

    public function productList(Request $request,$uname)
    {
        $userData = User::where("name",$uname)->first();
        $user_id = $userData['id'];
        // dd($request->all());
        // dd($request->all());
        if(isset($request->merchandise_product_name) && $request->merchandise_product_name!=null){

            $cat_list = MerchandiseProduct::join('product_variants as pv','pv.product_id','=','merchandise_products.product_id')->leftJoin('artist_category AS b', 'merchandise_products.artist_category_id','=','b.id')
             ->join('products as ps','ps.id','=','merchandise_products.product_id')
             ->join('categories as cat','cat.id','=','ps.category_id')
            ->where('b.user_id', $user_id)
            ->where('merchandise_products.status', '1')
            ->where('pv.quantites','>','0')

            ->where('merchandise_products.deleted_at', null)
            // ->with('merchProductImage')
            ->orderBy('b.sort_order', 'ASC') 
            ->select(
                'merchandise_products.artist_category_id',
                'b.category_name','merchandise_products.name_creation','pv.quantites'

            ) 
            ->where('cat.category_name',$request->merchandise_product_name)
            ->groupBy('merchandise_products.artist_category_id')
            ->get()->toArray();

        }else{
            $cat_list = MerchandiseProduct::join('product_variants as pv','pv.product_id','=','merchandise_products.product_id')->leftJoin('artist_category AS b', 'merchandise_products.artist_category_id','=','b.id')
            ->where('b.user_id', $user_id)
            ->where('merchandise_products.status', '1')
            ->where('pv.quantites','>','0')

            ->where('merchandise_products.deleted_at', null)
            // ->with('merchProductImage')
            ->orderBy('b.sort_order', 'ASC') 
            ->select(
                'merchandise_products.artist_category_id',
                'b.category_name','merchandise_products.name_creation','pv.quantites'

            ) 
            ->groupBy('merchandise_products.artist_category_id')
            ->get()->toArray();
        }
        
        foreach ($cat_list as $key => $value) {
            $product_list = MerchandiseProduct::where('artist_category_id', $value['artist_category_id'])
            ->select(
                'merchandise_products.*',
                'merchandise_products.id as product_id'
            )
            // ->groupBy('merchandise_products.merchandise_master_id')
            ->groupBy('merchandise_products.merchandise_master_id')
            ->get()->toArray();

            foreach ($product_list as $k => $val){
                
                $mer_image = MerchandiseProductImages::where('merch_product_id', $val['product_id'])->first();
                if($mer_image){
                    $product_list[$k]['image'] = $mer_image->image;
                }
            }
            $cat_list[$key]['product_list'] = $product_list;
        }

        $userinfo = User::where("name",$uname)->first();
        $id = $userinfo['id'];
        $user = User::whereIn('status', array(1))->whereNull('deleted_at')->find($id);
        $product = $product_id = '';
        if($user) {
            $theme = DB:: table("artist_themes")->where('user_id',$id)->where('status',1)->first();
            if(!$theme)
            {
                $theme = DB:: table("artist_themes")->where('user_id',2)->where('status',1)->first();
            }
            $category = ArtistCategory::where('user_id',$id)->where('sort_order',1)->first();
            // dd($category);

        if($category){

        $product = MerchandiseProductImages::whereHas('merch_image', function($q) use($id,$category){
            $q->where('artist_category_id',$category->id)
              ->where('artist_id', $id);
        })->limit(3)->get();
        }
        $category_id = ArtistCategory::where('user_id',$id)->where('sort_order',2)->first();

        if($category_id){
        $product_id = MerchandiseProductImages::whereHas('merch_image', function($q) use($id,$category_id){
            $q->where('artist_category_id',$category_id->id)
              ->where('artist_id', $id);
        })->limit(3)->get();
        }
        $product_name = MerchandiseProduct::where('artist_id',$id)->get();
        $collection = collect($product_name);

        $unique_data = $collection->unique('merchandise_product_name')->values()->all();
        $new_cat = MerchandiseProductImages::with(['merch_image','ProductDetails.ProductCategory']);

        if($request->merchandise_product_name){
            $new_cat = $new_cat->whereHas('ProductDetails.ProductCategory', function($q) use($request){
                $q->where('category_name',$request->merchandise_product_name);
            });
        }
        if($id){
            $new_cat = $new_cat->whereHas('merch_image',function($q) use($id){
                $q->where('artist_id',$id);
            });
        }

        $new_cat = $new_cat->limit(3)->get();
        $match = [];
        $new_cats = [];
        foreach($new_cat as $key => $value)
        {
            if(count($match) < 4)
            {
                if(!in_array($value->merch_product_id, $match))
                {
                 $match[] = $value->merch_product_id;
                 $new_cats[] = $value;
                }
            }
        }
        if($new_cats)
        {
            $new_cat = $new_cats;
        }

        // dd($new_cat);
        $get_cat = Categories::whereNull('deleted_at')->where('parent_id',0)->get();
        $cat_name = MerchandiseProduct::where('artist_id',$id);
        // if($request->merchandise_product_name){
        //     $cat_name = $cat_name->where('merchandise_product_name',$request->merchandise_product_name);
        // }
        $cat_name = $cat_name->first();
        $product_data = OrderItem::select(DB::raw('merchandise_products.product_id, COUNT(*) as count'))
                            ->join('merchandise_products','merchandise_products.id', '=','order_item.merchandise_product_id')
                            ->groupBy('merchandise_products.product_id')->orderBy('count','asc')->limit(3)->get();
                            // dd($product_data);
        if(isset($request->merchandise_product_name) && $request->merchandise_product_name != ''){

                $best_artist = OrderDetails::select(DB::raw('order_management.id,b.order_id,b.merchandise_product_id as groupby,d.image,c.artist_id,c.product_id,c.merchandise_product_name,c.product_price,c.name_creation,pv.quantites as quantity'))
                                    ->join('order_item as b','b.order_id', '=','order_management.id')
                                    ->join('merchandise_products as c','b.merchandise_product_id', '=','c.id')
                                    ->join('product_variants as pv','pv.id','=','c.product_variant_id')
                                    ->join('merchandise_product_images as d','c.id', '=','d.merch_product_id')
                                    ->join('artist_category as ac','ac.id','=','c.artist_category_id')
                                    ->join('products as ps','ps.id','=','c.product_id')
                                    ->join('categories as cat','cat.id','=','ps.category_id')
                                    ->where('cat.category_name','=',$request->merchandise_product_name)
                                    ->where('c.artist_id', $id)
                                    ->get();

         }else{
                $best_artist = OrderDetails::select(DB::raw('order_management.id,b.order_id,b.merchandise_product_id as groupby,d.image,c.artist_id,c.product_id,c.merchandise_product_name,c.product_price,c.name_creation,pv.quantites as quantity'))
                                    ->join('order_item as b','b.order_id', '=','order_management.id')
                                    ->join('merchandise_products as c','b.merchandise_product_id', '=','c.id')
                                    ->join('product_variants as pv','pv.id','=','c.product_variant_id')
                                    ->join('merchandise_product_images as d','c.id', '=','d.merch_product_id')
                                    ->join('artist_category as ac','ac.id','=','c.artist_category_id')
                                    ->where('c.artist_id', $id)
                                    ->get();
        }
// dd($best_artist);
        $best_artist_dup = [];
        $best_artist_new = [];
        foreach($best_artist as $key => $value)
        {
                if(!in_array($value->product_id, $best_artist_dup))
                {
                 $best_artist_dup[] = $value->product_id;
                 $best_artist_new[] = $value;
                }
        }
        if($best_artist_new)
        {
            $best_artist = $best_artist_new;
        }
        // dd($best_artist);
        // $theme_style = $this->getThemeColorInfo($theme->theme_id);
        $themeId = ($theme->theme_id) ? $theme->theme_id : 1; // 1 is default theme
        $theme_style = DB::table('cjb_themes')->where('id', $themeId)->first();
        $theme_style = (array) $theme_style;
         // dd($theme_style);
           
        return view('front/artist_shop',compact('theme','user','product','category','category_id','product_id','product_name','unique_data','cat_name','product_data','get_cat','new_cat','best_artist', 'theme_style','cat_list'));
        }
        return redirect('login')->with('failure', 'Invalid request..!!');
    }


    public function seeAll(Request $request,$uname,$name)
    {
       if(!is_numeric($uname)){
           $userinfo = User::where("name",$uname)->first();
           $id = $userinfo['id'];
        }else{
           $id = $uname;
        }

        $user = User::whereIn('status', array(1))->whereNull('deleted_at')->find($id);

        $theme = DB::table("artist_themes")->where('user_id',$id)->where('status',1)->first();
        if(!$theme)
        {
            $theme = DB::table("artist_themes")->where('user_id',2)->where('status',1)->first();
        }

        $cat_image = array();
        $artist_category = ArtistCategory::where('category_name',$name)->where('user_id',$id)->get();

        foreach ($artist_category as $key => $value) {

            if(isset($value->id) && $value->id !=''){
                $cat_image = MerchandiseProduct::with('merchProductImage')->where('artist_id',$id)
                ->where('artist_category_id',$value->id)
                ->groupby('artist_category_id','merchandise_master_id')
                ->get();

            }else{

                $cat_image = MerchandiseProduct::with('merchProductImage')->where('artist_id',$id)
                 ->where('artist_category_id',$value->id)
                ->groupby('artist_category_id','merchandise_master_id')
                ->get();
            }
             
        } 
        return view('front/artist_product_list',compact('artist_category','cat_image','theme','user'));
    }

    public function cat_see_all(Request $request,$uname,$name)
    {
        $userinfo = User::where("name",$uname)->first();
        $id = $userinfo['id'];
        $user = User::whereIn('status', array(1))->whereNull('deleted_at')->find($id);
        $product = $product_id = '';
        $category = ArtistCategory::where('user_id',$id)->where('category_name',$name)->where('sort_order',1)->first();
        if($category){
        $product = MerchandiseProductImages::whereHas('merch_image', function($q) use($id,$category){
            $q->where('artist_category_id',$category->id)
              ->where('artist_id', $id);
        })->get();
        }
        // dd($category);
        $category_id = ArtistCategory::where('user_id',$id)->where('category_name',$name)->where('sort_order',2)->first();
        if($category_id){
        $product_id = MerchandiseProductImages::whereHas('merch_image', function($q) use($id,$category_id){
            $q->where('artist_category_id',$category_id->id)
              ->where('artist_id', $id);
        })->get();
        }

        return view('front/category_list',compact('category','product','category_id','product_id'));
    }

    public function filter($uname)
    {
        $userinfo = User::where("name",$uname)->first();
        $id = $userinfo['id'];
        $user = User::whereIn('status', array(1))->whereNull('deleted_at')->find($id);
        if($user){
        $product_name = MerchandiseProduct::where('artist_id',$id)->get();
        }
    }

    public function getThemeColorInfo($theme)
    {
        $out = [];
        if($theme == 'orange')
        {
            $out['light_color'] = '#ef9933';
            $out['dark_color'] = '#fd6726';
        } 
        else if($theme == 'blue')
        {
            $out['light_color'] = '#ef9933';
            $out['dark_color'] = '#fd6726';
        } else {
            $out['light_color'] = '#00afef'; // '#00AFEF';
            $out['dark_color'] = '#ed1277'; //'#00D1D3';
        }

        return $out;
    }
}
