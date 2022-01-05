<?php

namespace App\Http\Controllers\Front;

use DB;
use Auth;
use App\User;
use App\Product;
use App\Categories;
use App\PresetCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
  
    public function theme()
    {
        $data = DB::table('artist_themes')->where('user_id', Auth::user()->id)->first();
        if(!$data) {
            $data = collect();
            $data->banner_image = \URL::to('images').'/artistbg.png';
            $data->content_layer_colour = '#00afef';
            $data->cart_colour = '#ed1277';
            $data->font_family = 'Rubik-Light';
            $data->font_size = '15';
            $data->font_colour = '#ffffff';
        } else {
            $data->banner_image = \URL::to('images').'/'.$data->banner_image;
        }
        $themes = DB::table('cjb_themes')->where('status', 1)->get();

        return view('front/customise-theme', compact('data', 'themes'));
    }
	
    public function themeUpdate(Request $request)
    {
        $this->validate($request, [
            'banner_image' => 'mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=1140',
            // 'details_layer_colour' => 'required',
            //'cart_colour' => 'required',
            // 'font_family' => 'required',
            // 'font_size' => 'required|integer|between:14,26',
            //'font_colour' => 'required',
        ]);

        $data = DB::table('artist_themes')->where('user_id', Auth::user()->id)->first();

        if($request->hasfile('banner_image')) {
            $name= '0000'.Auth::user()->id.'-'.$request->banner_image->getClientOriginalName();
            $request->banner_image->move(public_path().'/images/', $name);
            $filename = $name;
        }

        if($data) {
            if($request->hasfile('banner_image')) {
                $filename = $filename;
            } else {
                $filename = $data->banner_image;
            }

            $storeTheme = array('banner_image' => $filename,
                // 'content_layer_colour' => $request->details_layer_colour,
                // 'cart_colour' => $request->cart_colour,
                // 'font_family' => $request->font_family,
                // 'font_size' => $request->font_size,
                //'font_colour' => $request->font_colour,
                'theme_id' => $request->theme_name,
                'updated_at' => date('Y-m-d H:i:s'),
                'status'=>1,
            );
            DB::table('artist_themes')->where('user_id', Auth::user()->id)->update($storeTheme);

        } else {
            if($request->hasfile('banner_image')) {
                $filename = $filename;
            } else {
                $filename = 'artistbg.png';
            }
            $storeTheme = array('user_id' => Auth::user()->id,
                'banner_image' => $filename,
                // 'content_layer_colour' => $request->details_layer_colour,
                // 'cart_colour' => $request->cart_colour,
                // 'font_family' => $request->font_family,
                // 'font_size' => $request->font_size,
                // 'font_colour' => $request->font_colour,
                'theme_id' => $request->theme_name,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            DB::table('artist_themes')->insert($storeTheme);

        }
            
        return redirect('theme')->with('success', 'Updated successfully..!!');
    }

    /**
     * Show the creation station for you merchendise.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	public function createMerchendise(Request $request)
    {
        $products = Product::with('product_category')->leftjoin('artist_merchandise_products as mp','mp.product_id','=','products.id')->where('mp.user_id', Auth::user()->id)->get();

   
        $presets = PresetCollection::withCount('collection')->where('id','!=',1)->get();

        $categories = Categories::where('status','0')
                        ->withCount('product_category')
                        ->havingRaw("product_category_count > 0")
                        ->orderBy('category_name')
                        ->get();

        $tab = 'merchendise';

      
        return view('front/design-tool/marchandise-tab', compact('products', 'categories', 'presets', 'tab'));
    }
	
  
    public function customiseMerchendise(Request $request)
    {
        $product = Product::where('id', $id)->first();
		$tab = 'customise';
		
		return view('front/design-tool/customise-tab', compact('product', 'tab'));
    }

    public function categoryProduct(Request $request)
    {
        if($request->type == 'preset_filter') {
            $presets = DB::table('product_collections')->where('preset_collection_id', $request->product_category)->pluck('product_id')->toArray();
            $products = Product::with('product_category')->whereIn('id', $presets)->get();
        } else {
            $productList = $request->product_category;
            $products = Product::with('product_category')->whereIn('category_id', $productList)->get();
        }
            // dd($productList);

        // return $products; 
        return response()->json([
            'status' => true,
            'products' => $products
        ], 200);
    }
    
     
    public function artistMerchendiseAdd($id)
    {
        $amp = DB::table('artist_merchandise_products')->where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if($amp != null ) {
            // return redirect('/design-creation')->with('failure','Already exist..!!');
            return redirect('/design-creation')->with('success','Added successfully..!!');
        }
        
        $data = array('user_id' => Auth::user()->id,
            'product_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        DB::table('artist_merchandise_products')->insert($data);
        
        return redirect('/design-creation')->with('success','Added successfully.!');
    }
    
    
    public function artistMerchendiseDelete($id)
    {
        $amp = DB::table('artist_merchandise_products')->where('user_id', Auth::user()->id)->where('product_id', $id)->pluck('product_id')->toArray();

        if(count($amp)) {

            DB::table('artist_merchandise_products')->where('user_id', Auth::user()->id)->whereIn('product_id', $amp)->delete();

            return redirect('/design-creation')->with('success','Merchendise deleted successfully.');

        }
        
        return redirect('/design-creation')->with('failure','Invalid request.');
    }
}
