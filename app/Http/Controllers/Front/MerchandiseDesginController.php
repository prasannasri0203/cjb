<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use DB;
use PDF;
use Auth;
use Storage;
use Image;
use File;
use App\Emoji;
use App\Product;
use App\Categories;
use App\PresetCollection;
use App\ArtistCategory;
use App\Product_variant;
use App\MerchandiseProduct;
use App\ArtistMerchandiseProduct;
use Illuminate\Support\Str;
use App\Revenuesharing;
use App\ProductImage;
use App\Print_types;

class MerchandiseDesginController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
	public function createMerchendise(Request $request)
    {
        
        $products = ArtistMerchandiseProduct::with('AMProduct.product_category', 'AMProduct.ProductImages')
                                ->where('artist_merchandise_products.user_id', Auth::user()->id)
                                // ->where('products.status','1')
                                ->get();
         

        $presets = PresetCollection::withCount('collection')->get();

        $categories = Categories::where('status','0')
                        ->withCount('product_category')
                        ->havingRaw("product_category_count > 0")
                        ->orderBy('category_name')
                        ->get();

        $tab = 'merchendise';
 

        return view('front/design-tool/marchandise-tab', compact('products', 'categories', 'presets', 'tab'));
    }

    public function categoryProduct(Request $request)
    {
        if($request->type == 'preset_filter') {
            $presets = DB::table('product_collections')->where('preset_collection_id', $request->product_category)->pluck('product_id')->toArray();
            $products = Product::with('ProductCategory', 'ProductImages')->whereIn('products.id', $presets)->where('products.status','1')->get();
        } else {
            $productList = $request->product_category;
            $products = Product::with('ProductCategory', 'ProductImages')->whereIn('category_id', $productList)->where('products.status','1')->get();
        }
            

        // return $products; 
        return response()->json([
            'status' => true,
            'products' => $products
        ], 200);
    }
	
     
    public function customiseMerchendise(Request $request, $id)
    {
        if($request->type) {
            $product_variant = Product_variant::where('product_id', $id)->first();
           
            if($product_variant) {
                 // dd($request->all(),$id,$product_variant);
                return redirect('design-creation/'.$product_variant->id.'?check=approved');
            }
            return redirect('design-creation')->with('failure', 'No product variant/image available to design..!!');
        }
        $product_variant = Product_variant::with('VariantProduct', 'ProductImages')->where('id', $id)->first();
           // dd($product_variant);
        // $product_img = ProductImage::where('product_id',$product_variant['product_id'])->get();
        $product_img = ProductImage::where('product_variant_id',$product_variant['id'])->get();
      // dd(@$product_variant->product_id);
        $product = Product::with('product_variant', 'ProductImages')->where('products.id', @$product_variant->product_id)->first();

        if( !@$product_variant->ProductImages) {
        	return redirect('design-creation')->with('failure', 'No product variant/image available to design..!!');
        }
        $imagePath = public_path('portal/img/product').'/'.@$product_variant->ProductImages[0]['image'];

        if( !file_exists( $imagePath ) ) {
        	return redirect('design-creation')->with('failure', 'Product image not available currently..!!');
        }
        $emojis= Emoji::where('status',1)->latest()->get();
		$tab = 'customise';
        $artist_commission = Revenuesharing::where('id', 2)->first();
        $artist_commission_val = $artist_commission->setting_value;
        $productdetails = Product::where('id',@$product_variant->product_id)->first();
        // dd($productdetails->print_type);
        // $productdetails->print_type = (int)$productdetails->print_type;
        $print_type = Print_types::where('status',1)->get();
        //dd($product_variant->VariantProduct->height);
        // $test = json_decode($product->product_variant[0]->attributes, true);
        // dd($test);
        $layerCount = $product_img->count();
		// dd($productdetails);
		// return view('front/design-tool/customise-tab', compact('product', 'emojis', 'tab'));
        return view('front/design-tool/content/desgin-customise', compact('product','product_img', 'product_variant', 'imagePath', 'emojis', 'tab','artist_commission_val','productdetails','print_type','layerCount'));
    }

   
    public function autocomplete(Request $request)
    {
        $userId = Auth::user()->id;
        $data = ArtistCategory::select("category_name")
                ->where("category_name","LIKE","%{$request->input('query')}%")
                ->where('user_id',$userId)
                ->get();
       
   if(count($data))
   { 
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {

       $output .= '
       <li><a href="javascript:void(0)">'.$row->category_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;   
   }
    else
    {
    	$output = '';
    }
    
    }

    public function designUploadSave($image) {

    	$filename = md5(microtime());

    	$data = substr($image, strpos($image, ',') + 1);

    	$data = base64_decode($data); 
    	Storage::disk('uploads')->put($filename . '.png', $data);

    	$pdf = \App::make('dompdf.wrapper');
    	// $pdf = $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
    	$img = "merchandise-img/".$filename.".png";
    	$html = '
    	<html>
    	    <head>
    	        <style>
    	            .center {
    	                text-align: center;
    	            }
    	            .center img {
    	                display: block;
    	            }
    	        </style>
    	    </head>
    	    <body>
    	        <div class="center">
    	            <img src="'.$image.'" />
    	        </div>
    	    </body>
    	</html>
    	';
    	$pdf->loadHTML($html);
        Storage::disk('uploads')->put($filename . '.pdf', $pdf->output());

    	return $filename;

    }
	
    

    public function cropImage($file, $x, $y, $x2, $y2, $w, $h, $img_w, $img_h)
    {
        // dd('text');
        $filename = rand() . '.' . $file->getClientOriginalExtension();
        $img = Image::make($file->getRealPath());
        $org_img = Image::make($file->getRealPath());
        $destinationPath = public_path('merchandise-img');
        $thumbPath = public_path('portal/img/product/thumbimages'); 
        if(!File::isDirectory($destinationPath)){
        File::makeDirectory($destinationPath, 0777, true, true);
        } 
        if(!File::isDirectory($thumbPath)){
        File::makeDirectory($thumbPath, 0777, true, true);
        }

        // Crop
        // $img->crop($w, $h, $x, $y);
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
         
            
        return $filename;
    }

 
    public function designUpload(Request $request)
    {
        
        $array_val = [];
        $array_array[0] = $request->split_image_val1; 
        $array_array[1] = $request->split_image_val2;
        $array_array[2] = $request->split_image_val3;
        $array_array[3] = $request->split_image_val4;  
         
        for($i=0; $i<4; $i++)
        {
            if($array_array[$i])
            {
                 $ch = str_replace("px","",$array_array[$i]);
                   
                $array = explode(',', $ch);
                $check[] = $array_array[$i];

                $img_r = imagecreatefromjpeg($request->promotional_image);
                $dst_r = ImageCreateTrueColor( $array[2], $array[3] );

                $get_filename = $this->cropImage($request->promotional_image, $array[0], $array[1], $array[2], $array[3] , $array[4], $array[5] ,$array[6] ,$array[7]);

                $array_val[] =  $get_filename; 
            }

        }

        if( $request->merchandise_product_id ) {

            $mp = MerchandiseProduct::where('artist_id', Auth::user()->id)->find($request->merchandise_product_id);
             
            // $arrMp = DB::select("SELECT * FROM merchandise_products WHERE merchandise_master_id =$mp->merchandise_master_id");
            $arrMp = DB::table('merchandise_products')->where('merchandise_master_id', $mp->merchandise_master_id)->get();
      
            foreach ($arrMp as $key => $value) {
            
                if($array_val)
                {
              
                    foreach ($array_val as $p) {
                            $merch_images = array('id' => Str::random(32),
                            'merch_product_id' => $value->id,
                            'product_id' => $value->product_id,
                            'product_variant_id' => $value->product_variant_id,
                            'type' => 'image', // Image, Layer
                            'image' => $p,
                            'sort' => 1,
                            'file' => '',
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            );
                     
                            DB::table('merchandise_product_images')->insert($merch_images);               
                    }

                    MerchandiseProduct::where('artist_id', Auth::user()->id)
                    ->update([
                        'image' => ''
                    ]);                
                }
            }

            if($arrMp) {
                 
                    $base64_image = $request->layer;
                    if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                      
                        $file_upload = $this->designUploadSave($base64_image);

                        foreach ($arrMp as $key => $mpVal) {

                            if($request->type == 'image') {

                                $merch_images = array('id' => Str::random(32),
                                    'merch_product_id' => $mpVal->id,
                                    'product_id' => $mpVal->product_id,
                                    'product_variant_id' => $mpVal->product_variant_id,
                                    'type' => 'image', // Image, Layer
                                    'image' => $file_upload.'.png',
                                    'sort' => 0,                 
                                    'file' => $file_upload.'.pdf',
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s')
                                );
                                DB::table('merchandise_product_images')->insert($merch_images);
                            } else {
                                // elseif($request->type == 'layer')
                                $merch_images = array('id' => Str::random(32),
                                    'merch_product_id' => $mpVal->id,
                                    'product_id' => $mpVal->product_id,
                                    'product_variant_id' => $mpVal->product_variant_id,
                                    'type' => 'layer', // Image, Layer
                                    'image' => $file_upload.'.png',
                                    'file' => $file_upload.'.pdf',
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s')
                                );
                                DB::table('merchandise_product_files')->insert($merch_images);
                            }
                        }
                        // dd('id', $merch_images);
                        return response()->json([
                            'status' => true,
                            'merch_id' => $mpVal->id
                        ], 200);
                    } else {
                        return response()->json([
                            'status' => false,
                            'merch_id' => $mpVal->id
                        ], 200);
                    }

            } else {
                return response()->json([
                    'status' => false,
                    'merch_id' => null
                ], 200);
            }
         
        } else {
            $ac = ArtistCategory::where('user_id', Auth::user()->id)->where('category_name', $request->creation_name)->first();

            if( !$ac ) {

                $ac = new ArtistCategory();
               
                $ac->user_id = Auth::user()->id;
                $ac->category_name = $request->creation_name;
                $ac->describe_category = $request->creation_description;
                $ac->category_keyword = $request->category_keyword;
                $ac->category_search_keyword = $request->search_keyword;
                $ac->sort_order = 1;
                $ac->save();
            }
           
            //merchandise master
           $merchandiseMasterId = DB::table('merchandise_master')->insertGetId(
                   ['product_id' => $request->product_id,
                   'artist_id' => Auth::user()->id,
                   'creation_name' => $request->creation_name,
                   'created_at'=>now()]);
               
            if($merchandiseMasterId){
             
                $clr_picker_value=explode(',', $request->colorpicker_radio);
                //print_r($clr_picker_value); exit;
                foreach ($clr_picker_value as $key => $value) {
               
                    $merch_prd = new MerchandiseProduct();
                    $merch_prd->product_id = $request->product_id;
                    //$merch_prd->product_variant_id = $request->variant_id;
                    $merch_prd->product_variant_id = $value;
                    $merch_prd->artist_id = Auth::user()->id;
                    $merch_prd->merchandise_master_id = $merchandiseMasterId;
                    $merch_prd->artist_category_id = $ac->id;
                    $merch_prd->name_creation = $request->name_creation;
                    $merch_prd->merchandise_product_name = $request->merchandise_product_name;
                    $merch_prd->product_price = $request->mer_price;
                    $merch_prd->actual_price = null;
                    $merch_prd->artist_price = $request->artist_price;
                    $merch_prd->status = 1;
                    $merch_prd->created_by = Auth::user()->id;
                    $merch_prd->updated_by = Auth::user()->id;
                    $merch_prd->save();
                    if($merch_prd->id) {
                        $base64_image = $request->layer;
                        if (preg_match('/^data:image\/(\w+);base64,/', $base64_image)) {
                            $file_upload = $this->designUploadSave($base64_image);
                            if($request->type == 'image') {
                                $merch_images = array('id' => Str::random(32),
                                    'merch_product_id' => $merch_prd->id,
                                    'product_id' => $merch_prd->product_id,
                                    'product_variant_id' => $merch_prd->product_variant_id,
                                    'type' => 'image', // Image, Layer
                                    'image' => $file_upload.'.png',
                                    'file' => $file_upload.'.pdf',
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s')
                                );
                               
                                DB::table('merchandise_product_images')->insert($merch_images);
                            } else {
                                // elseif($request->type == 'layer')
                                $merch_images = array('id' => Str::random(32),
                                    'merch_product_id' => $merch_prd->id,
                                    'product_id' => $merch_prd->product_id,
                                    'product_variant_id' => $merch_prd->product_variant_id,
                                    'type' => 'layer', // Image, Layer
                                    'image' => $file_upload.'.png',
                                    'file' => $file_upload.'.pdf',
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s')
                                );
                                DB::table('merchandise_product_files')->insert($merch_images);
                                
                            }
                            
                        } else {
                            return response()->json([
                                'status' => false,
                                'merch_id' => $request->merch_prd
                            ], 200);
                        }
                    }
                 }
         }
         return response()->json([
                        'status' => true,
                        'merch_id' => $merch_prd->id
                    ], 200);
        }
    }
    
    public function artistMerchendiseAdd($id)
    {
    	$last_data = [];
        $amp = DB::table('artist_merchandise_products')->where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if($amp != null ) {
        $last_data = DB::table('artist_merchandise_products')->orderBy('id', 'desc')->first();
        
    	
    	$x =  DB::table('product_variants')
        				->where('product_id', $amp->product_id)
        				->first();
    	//dd($x);
            // return redirect('/design-creation')->with('failure','Already exist..!!');
            //return redirect('/design-creation')->with('success','Added successfully..!!');
        	return redirect('design-creation/'.$x->id.'?check=approved');
        }
        
        $data = array('user_id' => Auth::user()->id,
            'product_id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );
        DB::table('artist_merchandise_products')->insert($data);
        $last_data = DB::table('artist_merchandise_products')->orderBy('id', 'desc')->first();
        
    	
    	$x =  DB::table('product_variants')
        				->where('product_id', $last_data->product_id)
        				->first();
    	return redirect('design-creation/'.$x->id.'?check=approved');

        
        //return redirect('/design-creation')->with('success','Added successfully.!');
    }
    
  
    public function artistMerchendiseDelete($id)
    {
        $amp = DB::table('artist_merchandise_products')->where('user_id', Auth::user()->id)->where('product_id', $id)->first();

        if($amp) {

            DB::table('artist_merchandise_products')->where('user_id', Auth::user()->id)->where('product_id', $amp->product_id)->delete();

            return redirect('/design-creation')->with('success','Merchendise deleted successfully.');

        }
        
        return redirect('/design-creation')->with('failure','Invalid request.');
    }

    public function get_promotional_image(Request $request)
    {
        $images =  DB::table('product_promo_images')->where('product_id', $request->product_id)->get();
        //$images = $images->sortByDesc('sort');
        if($images)
        {
                    return response()->json([
                        'status' => true,
                        'images' => $images
                    ], 200);         
        }
        

    }
}
