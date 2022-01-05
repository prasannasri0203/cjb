<?php

namespace App\Http\Controllers\Front;

use DB;
use App\User;
use App\Review;
use App\Product;
use App\Categories;
use App\Product_variant;
use App\Print_types;
use App\MerchandiseProduct;
use App\MerchandiseProductImages;
use Illuminate\Http\Request;
use Input;
use App\Http\Controllers\Controller;
use Image;
use File;
use Auth;
use Session;
use App\ArtistCategory;

class ProductController extends Controller
{
    public function product_list()
    {
        // dd($id);
        $get_cat = Categories::where('parent_id',0)->whereNull('deleted_at')->get();
        $cat_id = Input::get('cat_id');
        if($cat_id){
            $category_id = Categories::whereNull('deleted_at')->where('id',$cat_id)->first();
        // dd($category_id);
            $product = MerchandiseProductImages::with(['merch_image','ProductDetails.ProductCategory']);
            if($cat_id){
                $product = $product->whereHas('ProductDetails.ProductCategory', function($q) use($category_id){
                    $q->where('category_name',$category_id->category_name);
                });
            }
            $product = $product->paginate(6);

            $product_fill = MerchandiseProductImages::with(['merch_image','ProductDetails.ProductCategory']);
                $product_fill = $product_fill->whereHas('ProductDetails.ProductCategory',function($q) use($category_id){
                $q->where('category_name',$category_id->category_name);
            });

            $product_fill = $product->first();
        }
            // dd($product_fill);
            $user = User::where('type',1)->get();
            $product_name = MerchandiseProduct::where('deleted_at',null)->get();
            $collection = collect($product_name);
            $unique_data = $collection->unique('merchandise_product_name')->values()->all();


            $product_data = DB::table('products')
                ->select('*')
                ->join('product_images', 'product_images.product_id', '=', 'products.id')
                ->where('products.category_id', $cat_id)
                ->paginate(10)
                ->appends(request()->input());
            //dd($product_data);


            return view('front/product_list',compact('product','unique_data','product_name','product_fill','user','get_cat','product_data'));

    }
   

    public function detail_view($id)
    {
        // print_r($id);exit;
        $review_rating=0;
        $total_review=0;
        $merch_product = MerchandiseProductImages::where('merch_product_id',$id)->first();
        $get_product = MerchandiseProductImages::where('merch_product_id',$id)->get();
        $get_product = $get_product->sortByDesc('sort');

        $data_set =DB::select("SELECT * FROM merchandise_products as MP 
         INNER JOIN products as P  ON P.id = MP.product_id
         INNER JOIN categories C ON C.id =P.category_id 
         WHERE MP.id = '".$id."'");
         
        $cat_name ='';
        if($data_set != ''){
            $cat_name=$data_set[0]->category_name;
        }



        // if(count($get_product) == 0){
        //     return redirect('product_detail/140');
        // }
        $merchproduct = MerchandiseProduct::where('id',$id)->first();
        $productdetails = Product::where('id',$merchproduct->product_id)->first();
        if(isset($productdetails) && $productdetails !=null){
            $productdetails->print_type = (int)$productdetails->print_type;
        }
        
         

        // $productList =  Auth::user()->id;
        $productList = DB::table('merchandise_products AS a')
        ->join('product_variants as pv','a.product_id','=','pv.product_id')
        ->leftJoin('artist_category AS c', 'a.artist_category_id', '=', 'c.id')
        ->leftJoin('merchandise_product_images AS i', 'a.id', '=', 'i.merch_product_id')
        // ->select('a.artist_category_id','a.id','i.image','c.category_name','a.merchandise_product_name','a.product_price')
        // ->where('c.user_id',Auth::user()->id)
        ->where('a.status','1')
        ->where('a.deleted_at',null)
        ->where('a.artist_id', $merchproduct->artist_id)
         // ->where('a.id','!=', $id)
        ->where('a.merchandise_master_id','!=', $merchproduct->merchandise_master_id)
        ->groupBy('a.merchandise_master_id')
        ->orderBy('c.sort_order', 'ASC')     
        ->paginate(3);
   
        $user_name = User::where('id',$merchproduct->artist_id)->first();
        $product_review = Review::where('product_id',$merchproduct->id)->get();

       
        $product_varient = DB::table('product_variants')->join('merchandise_products','merchandise_products.product_variant_id','product_variants.id')->where('merchandise_products.merchandise_master_id',$merchproduct->merchandise_master_id)->get();

        foreach($product_varient as $value){

            $variants[] =$value->attributes;
        }
        // dd($variants);
          foreach($product_varient as $value){

            $variants_id[$value->id] =$value->attributes;
        }
        // $variants = explode(",",$name);
        $print_type = Print_types::where('status',1)->get();

        if(count($product_review)!=0){
            foreach ($product_review as $key => $value) {
                  $review_rating=$review_rating+$value->product_rating;
                  $total_review += $value->product_rating;
           }
           $review_point=$total_review/count($product_review);
           $review_average = round($total_review/count($product_review), 0);
       }
       else{
              $review_point=0;
              $review_average=0;
       }

        $theme = DB:: table("artist_themes")->where('user_id',$merchproduct->artist_id)->where('status',1)->first();
        if(!$theme)
        {
            $theme = DB:: table("artist_themes")->where('user_id',2)->where('status',1)->first();
        }
        
        $selected_id = $id;

        return view('front/productdetail',compact('cat_name','print_type','review_point','variants','merchproduct','productdetails','productList','merch_product','get_product','product_varient','user_name','theme','product_review','total_review','review_average','variants_id','selected_id'));
    }

    public function merch_cat()
    {
        $category = Categories::whereNull('deleted_at')->where('parent_id',0)->get();
        $cat_list = ArtistCategory::get();
        return view('front/merch_category',compact('category','cat_list'));
    }

    public function merch_subcat(Request $request,$id,$productId='')
    {
            if($productId !=''){
             $request->productid =$productId;
            }
            if($request->id != '' && $request->productid !=''){
               $category = Categories::whereNull('deleted_at')->where('id',$request->id)->where('parent_id',$request->productid)->get();    
            } else {
               $category = Categories::whereNull('deleted_at')->where('id',$id)->get();
            }
            $get_cat =  Categories::whereNull('deleted_at')->first();
            $product = MerchandiseProductImages::with(['merch_image','ProductDetails.ProductCategory']);
            $product_fill = '';
            if(isset($category) && $category != ''){
                foreach ($category as $categoryKey => $categoryValue) {
                    $catName = $categoryValue->category_name;
                     $product = $product->whereHas('ProductDetails.ProductCategory', function($q) use($catName){
                        $q->where('category_name',$catName);
                    });
                    $product = $product->paginate(6);
                    $product_fill = MerchandiseProductImages::with(['merch_image','ProductDetails.ProductCategory']);
                    $product_fill = $product_fill->whereHas('ProductDetails.ProductCategory',function($q) use($catName){
                        $q->where('category_name',$catName);
                    });
                    $product_fill = $product->first();
                }
            }
            // dd($product_fill);
            $user = User::where('type',1)->get();
            $product_name = MerchandiseProduct::where('deleted_at',null)->get();
            $collection = collect($product_name);
            $unique_data = $collection->unique('merchandise_product_name')->values()->all();

            $product_data = DB::table('products')
                    ->select('*')
                    ->join('product_images', 'product_images.product_id', '=', 'products.id')
                    ->where('products.category_id', $id)
                    ->groupBy('products.id')
                    ->paginate(12);

            $subcat = Categories::whereNull('deleted_at')->where('parent_id',$id)->get();

            if(isset($request->productid))
            {
                if($request->productid != "")
                {
                     $product_data = DB::table('products')
                    ->select('*')
                    ->join('product_images', 'product_images.product_id', '=', 'products.id')
                    ->where('products.category_id',$id)
                    ->where('products.sub_category_id',$request->productid)
                    ->groupBy('products.id')
                    ->paginate(12);
                }
            }
            $category_id = $id;
            $subCategoryId= $request->productid; 
            $data = true;
            return view('front/product_list',compact('product','unique_data','product_name','product_fill','user','get_cat', 'product_data','subcat','category_id','subCategoryId', 'category','data'));
        // }
    }

    public function merch_description_page(Request $request)
    {
        $product_data = DB::table('products')
                ->select('*')
                ->join('product_variants','product_variants.product_id','=','products.id')
                ->join('categories','products.category_id','=','categories.id')
                ->where('products.id','=',$request->productId)
                ->first();

        $product_images = DB::table('product_images')
                ->select('*')
               ->join('products', 'product_images.product_id', '=', 'products.id')
                ->where('product_images.product_id','=',$request->productId)
                ->get();

        $product_varient = DB::table('product_variants')
        ->select('*')
        ->where('product_variants.product_id','=',$request->productId)
        ->get();
        
        return view('front/merchandise_detail_page',compact('product_data','product_images','product_varient'));
    }

public function merch_subcat_ajax(Request $request)
    {
        $id = $request->selectedCategory;
    
        $category = Categories::whereNull('deleted_at')->where('id',$id)->first();
        if($category->parent_id != 0){
            $product_data = DB::table('products')
                ->select('*')
                ->join('product_images', 'product_images.product_id', '=', 'products.id')
                ->where('products.category_id',$category->parent_id)
                ->where('products.sub_category_id',$id)
                ->paginate(10);
                
         }else{

            $product_data = DB::table('products')
                ->select('*')
                ->join('product_images', 'product_images.product_id', '=', 'products.id')
                ->where('products.category_id',$id)
                ->paginate(10);   
        }

 
        
            return json_encode($product_data);
    }

    public function search()
    {
        $search_query = Input::get ( 'search' );
        $Products_check_box = Input::get ( 'drone' );
        $x = 0;
        if($Products_check_box == "Products"){
 
            $productsDetails = DB::select('SELECT * FROM categories WHERE parent_id =0');     
            $product = '';
            if($productsDetails !=''){
               
        foreach ($productsDetails as $key => $value) {
          $id = $value->id;
          if($id != ''){
          // $productId =$value->sub_category_id;

          $category = Categories::whereNull('deleted_at')->where('id',$id)->first();
        
          $get_cat =  Categories::whereNull('deleted_at')->get();
       
     
            $product = MerchandiseProductImages::with(['merch_image','ProductDetails.ProductCategory']);
            if($category){
                $product = $product->whereHas('ProductDetails.ProductCategory', function($q) use($category){
                $q->where('category_name',$category->category_name);
            });
            }
            $product = $product->paginate(6);

            
            $user = User::where('type',1)->get();
            $product_name = MerchandiseProduct::where('deleted_at',null)->get();
            $collection = collect($product_name);
            $unique_data = $collection->unique('merchandise_product_name')->values()->all();

            $product_data = DB::table('products')
                    ->select('*')
                    ->join('product_images', 'product_images.product_id', '=', 'products.id')
                    ->where('products.category_id', $id)
                    ->when(!empty($search_query ), function($query) use ($search_query  ) {
                    $query->where('products.product_name', 'LIKE','%'.$search_query.'%');
                    })
                    ->groupBy('products.id')
                    ->paginate(12);
            
            $subcat1 = Categories::whereNull('deleted_at')->where('parent_id',$id)->get();
            $subcat[] = $subcat1;
           
            $category_id = $id;
           
         }
        }
    }
        $subCategoryId = '';
            return view('front/product_list',compact('product','unique_data','product_name','user','get_cat', 'product_data','subcat','category_id','subCategoryId', 'category'));
  
        }else{      
        
           

                $merch_product = DB::table('merchandise_products')
                ->when(!empty($search_query ), function($query) use ($search_query  ) {
                    $query->where('merchandise_products.name_creation', 'LIKE','%'.$search_query.'%');
                })
                ->join('products', 'products.id', '=', 'merchandise_products.product_id')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->join('merchandise_product_images', 'merchandise_product_images.merch_product_id', '=', 'merchandise_products.id')
                ->join('artist_category','merchandise_products.artist_category_id','=','artist_category.id')
                // ->select('merchandise_product_images.*','products.*','merchandise_products.*')
                ->where('merchandise_products.deleted_at',null)
                ->groupBy('merchandise_products.product_variant_id','merchandise_products.merchandise_product_name')
                ->paginate(6);
                 
        }
       
        $get_cat = Categories::where('parent_id',0)->whereNull('deleted_at')->get();
        $user = User::where('type',1)->get();
        $product_name = MerchandiseProduct::where('deleted_at',null)->get();
        $merch_product->appends(['search' => $search_query,'drone'=>$Products_check_box]);
        
        return view('front/merch_prod_list',compact('merch_product','product_name','get_cat','user','x'));
    }

    public function list(Request $request)
    {
        // dd($request->all());
        $search_query = Input::get ( 'search' );
        $Products_check_box = Input::get ( 'drone' );
        $x = 0;

        $category_name = $request->category_name;
        $artist_id = $request->artist_id;
        $product_value_fetch = $request->product_value;

        $merch_product = DB::table('merchandise_products')
            ->join('products', 'products.id', '=', 'merchandise_products.product_id')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('merchandise_product_images', 'merchandise_product_images.merch_product_id', '=', 'merchandise_products.id')
             ->join('artist_category','artist_category.id', '=', 'merchandise_products.artist_category_id')
            // ->select('merchandise_product_images.*','products.*','merchandise_products.*')
            ->where('merchandise_products.deleted_at',null)
            ->when(!empty($search_query ), function($query) use ($search_query  ) {
                $query->where('merchandise_products.merchandise_product_name', 'LIKE','%'.$search_query.'%');
            })
            ->when($category_name, function ($q) use ($category_name){
                return $q->where('categories.category_name',$category_name);
            })
            ->when($artist_id, function ($q) use ($artist_id){
                return $q->where('merchandise_products.artist_id',$artist_id);
            })
            ->when($request->product_value == "1", function ($q) {
                return $q->orderBy('merchandise_products.product_price','ASC');
            })
            ->when($request->product_value == "2", function ($q) {
                return $q->orderBy('merchandise_products.product_price','DESC');
            })
            ->when($request->product_value == "0", function ($q) {
                return $q->orderBy('merchandise_products.created_at','ASC');
            })
            ->groupBy('merchandise_products.merchandise_master_id')
            ->paginate(6);
    
        $get_cat = Categories::where('parent_id',0)->whereNull('deleted_at')->get();
        $user = User::where('type',1)->get();
        $product_name = MerchandiseProduct::where('deleted_at',null)->get();
        $user_name = User::where('id',$artist_id)->first();

        // $cat_name = $category_name;
        $artist_name = $user_name ? $user_name->name:'';
        // $cat_name = $category_name;

        $product_value =[];
        $querystringArray = [ 
                             'category_name' => $category_name,
                             'artist_id' => $artist_id,
                             'product_value'=> $product_value_fetch,
                             'artist_name' =>$artist_name
                            ];
        // if($search_query){
            $merch_product->appends($querystringArray);
        // }
        // dd($querystringArray);
        return view('front/merch_prod_list',compact('merch_product','product_name','get_cat','user','x','artist_id'));
    }

    public function print_type_add(Request $request)
    {

          $print_type= array();
          $print_price= array();
           $detail = Product::where('id',$request->product_id)->first();
         if($request->status == 0)
         {
          if($detail->approved_additional_type){

          $print_type= unserialize($detail->approved_additional_type);
          $print_price= unserialize($detail->approved_additional_price);

           array_push($print_type,$request->type);
           array_push($print_price,$request->price);
         }
         else
         {
            $print_type[] = $request->type;
            $print_price[] = $request->price;
          }

        $product_detail = Product::find($request->product_id);
        $product_detail->approved_additional_type = serialize($print_type);
        $product_detail->approved_additional_price = serialize($print_price);
        $product_detail->save();
       return response()->json(['status' => 'success','message'=>'Value inserted']);
        }
     else
        {


          $print_type= unserialize($detail->approved_additional_type);
          $print_price= unserialize($detail->approved_additional_price);
foreach (array_keys($print_type, $request->type, true) as $key) {
    unset($print_type[$key]);
    unset($print_price[$key]);
}
        if(count($print_type) > 0)
        {
        $product_detail = Product::find($request->product_id);
        $product_detail->approved_additional_type = serialize($print_type);
        $product_detail->approved_additional_price = serialize($print_price);
        $product_detail->save();
        }
        else
        {
        $product_detail = Product::find($request->product_id);
        $product_detail->approved_additional_type = '';
        $product_detail->approved_additional_price = '';
        $product_detail->save();
        }

        return response()->json(['status' => 'success','message'=>'Value Updated']);
        }

    }


public function image_display(Request $request)
    {
        if ($request->has('product_name')) {
            $destinationPath = public_path('portal/img/product');
        }
        else
        {
            $destinationPath = public_path('portal/img/cropimages');
        }
        $file = $request->promotional_image;
        $array_array = $request->coords;
        $ch = str_replace("px","",$array_array);
        $array = explode(',', $ch);
        $img_r = imagecreatefromjpeg($request->promotional_image);
        $dst_r = ImageCreateTrueColor( $array[2], $array[3] );

        $get_filename = $this->cropImage($request->promotional_image, $array[0], $array[1], $array[2], $array[3], $array[4] , $array[5] ,$array[6] , $array[7] , $destinationPath);

        //return "<img src=". asset("portal/img/cropimages/".$get_filename).">";
        if ($request->has('product_name')) {
           return response()->json([
            'status' => 'success',
            'img_src' => asset("portal/img/product/".$get_filename),
            'get_filename'=>$get_filename,
            'count' => $request->count,
            'message'=>'Value inserted'
            ]);
        }
        else
        {
           return response()->json([
            'status' => 'success',
            'img_src' => asset("portal/img/cropimages/".$get_filename),
            'get_filename'=>$get_filename,
            'count' => $request->count,
            'message'=>'Value inserted'
            ]);
        }


    }
    public function cropImage($file, $x, $y, $x2, $y2, $w, $h, $img_w, $img_h, $destinationPath)
    {
    $filename = rand() . '.' . $file->getClientOriginalExtension();
    $img = Image::make($file->getRealPath());
    $org_img = Image::make($file->getRealPath());

    $thumbPath = public_path('portal/img/thumbimages');
    if(!File::isDirectory($destinationPath)){
    File::makeDirectory($destinationPath, 0777, true, true);
    }
    if(!File::isDirectory($thumbPath)){
    File::makeDirectory($thumbPath, 0777, true, true);
    }
    // Crop
    // $img->crop($w, $h, $x, $y);
    // //$img->paintTransparentImage(($img->getImagePixelColor(0, 0), 0, 1200));
    // $canvas = $img;
    $dst_x = 0; // X-coordinate of destination point
    $dst_y = 0; // Y-coordinate of destination point
    $src_x = $x; // Crop Start X position in original image
    $src_y = $y; // Crop Srart Y position in original image
    $dst_w = $x2; // Thumb width
    $dst_h = $y2; // Thumb height
    $src_w = $w; // Crop end X position in original image
    $src_h = $h; // Crop end Y position in original image

    // Creating an image with true colors having thumb dimensions (to merge with the original image)
    $dst_image = imagecreatetruecolor($dst_w, $dst_h);
    // Get original image
    $src_image = imagecreatefromjpeg($file);
    // Cropping
    imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
    // Saving
    imagejpeg($dst_image, $destinationPath.'/'. $filename ,100);
    //$img->save($destinationPath.'/'. $filename );


    return $filename;
    }
}
