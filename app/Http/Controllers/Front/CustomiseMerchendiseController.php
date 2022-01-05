<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ArtistCategory;
use App\MerchandiseProduct;
use App\MerchandiseProductImages;
use DB;
use Auth;
use App\Product;
use App\Product_variant;
use App\ArtistMerchandiseProduct;
use App\User;
use Session;
use App\Print_types;

class CustomiseMerchendiseController extends Controller
{
    public function merchendiseView(Request $request) 
    {  
        if (isset(Auth::user()->id)) {
          $user_id = Auth::user()->id;
        }else{
          $user_id = '';
        }
        
        if($user_id !=''){
           $category_lists = DB::table('merchandise_products AS a')
          ->leftJoin('artist_category AS c', 'a.artist_category_id', '=', 'c.id')
          ->leftJoin('merchandise_product_images AS i', 'a.id', '=', 'i.merch_product_id')
          ->select('a.artist_category_id','a.id','i.image','c.category_name','a.merchandise_product_name','a.product_price')
          ->Where('c.user_id',$user_id)
          ->where('a.status','1')
          ->where('a.deleted_at',null)
          ->orderBy('c.sort_order', 'ASC')     
          ->get();

        }else{

          $category_lists = DB::table('merchandise_products AS a')
          ->leftJoin('artist_category AS c', 'a.artist_category_id', '=', 'c.id')
          ->leftJoin('merchandise_product_images AS i', 'a.id', '=', 'i.merch_product_id')
          ->select('a.artist_category_id','a.id','i.image','c.category_name','a.merchandise_product_name','a.product_price')
          ->where('a.status','1')
          ->where('a.deleted_at',null)
          ->orderBy('c.sort_order', 'ASC')     
          ->get();
        }
        
        if($user_id != ''){
          $cat_list = MerchandiseProduct::join('product_variants AS pv','merchandise_products.product_variant_id','=','pv.id')->leftJoin('artist_category AS b', 'merchandise_products.artist_category_id','=','b.id')
          // ->leftJoin('merchandise_product_images AS i', 'merchandise_products.id', '=', 'i.merch_product_id')
          ->Where('b.user_id', $user_id)
          ->where('merchandise_products.status', '1')
          ->where('merchandise_products.deleted_at', null)
          // ->with('merchProductImage')
          ->orderBy('b.sort_order', 'ASC') 
          ->select(
          	'merchandise_products.artist_category_id',
          	'b.category_name','merchandise_products.name_creation',
            'pv.quantites'
          	// 'i.image'
          ) 
          ->groupBy('merchandise_products.artist_category_id')
          ->get();
        }else{
          $cat_list = MerchandiseProduct::join('product_variants AS pv','merchandise_products.product_variant_id','=','pv.id')->leftJoin('artist_category AS b', 'merchandise_products.artist_category_id','=','b.id')
          // ->leftJoin('merchandise_product_images AS i', 'merchandise_products.id', '=', 'i.merch_product_id')
          ->where('merchandise_products.status', '1')
          ->where('merchandise_products.deleted_at', null)
          // ->with('merchProductImage')
          ->orderBy('b.sort_order', 'ASC') 
          ->select(
            'merchandise_products.artist_category_id',
            'b.category_name','merchandise_products.name_creation',
            'pv.quantites'
            // 'i.image'
          ) 
          ->groupBy('merchandise_products.artist_category_id')
          ->get();

        }
// dd($cat_list);
        // $cat_list = ArtistCategory::where('artist_category.user_id', $user_id)
        // ->with('MerchandiseMaster')
        // ->get()
        // ->toArray();

        $merchandise_product_name = '';
        if(!empty($cat_list)){
            foreach ($cat_list as $key => $value) {
                $product_list = MerchandiseProduct::where('artist_category_id', $value['artist_category_id'])
                ->select(
                    'merchandise_products.*',
                    'merchandise_products.id as product_id'
                )
                ->groupBy('merchandise_products.merchandise_master_id')
                // ->groupBy('merchandise_products.merchandise_master_id', 'merchandise_products.id')
                ->get()->toArray();
               
                $merchandise_product_name = $product_list[0]['merchandise_product_name'];
            
                foreach ($product_list as $k => $val) {
                    $mer_image = MerchandiseProductImages::where('merch_product_id', $val['product_id'])->first();
                    if ($mer_image) {
                        $product_list[$k]['image'] = $mer_image->image;
                    }
                }
                $cat_list[$key]['product_list'] = $product_list;
            }
        }
        $productdetails = Product::where('id',@$product_variant->product_id)->first();
    
        $category_id = 0;
        $category_list =[];

       $category_header= ArtistCategory::
       // where('user_id',$user_id)->
       select('id','category_name')->get();
       $array_val = [];

       
        foreach ($category_lists as $key => $value) {
           if (!in_array($value->id, $array_val))
           {
                 $array_val[] = $value->id;
               
                if($category_id == $value->artist_category_id){

                    $category_id = $value->artist_category_id;
                    $data[$key]['id'] = $value->artist_category_id;
                    $data[$key]['product_id'] = $value->id;
                    $data[$key]['image'] = $value->image; 
                    $data[$key]['merchandise_product_name'] = $value->merchandise_product_name; 
                    $data[$key]['product_price'] = $value->product_price; 
                    $category_list[$value->category_name] =$data;           
                }else if($category_id != $value->artist_category_id){

                    if($category_id == 0){
                        $category_id = $value->artist_category_id;
                        $data[$key]['id'] = $value->artist_category_id;
                        $data[$key]['product_id'] = $value->id;
                        $data[$key]['image'] = $value->image;
                        $data[$key]['merchandise_product_name'] = $value->merchandise_product_name; 
                        $data[$key]['product_price'] = $value->product_price;            
                        $category_list[$value->category_name] =$data;

                    } else {
                        $data =[];
                        $category_id = $value->artist_category_id;

                        $data[$key]['id'] = $value->artist_category_id;
                        $data[$key]['product_id'] = $value->id;
                        $data[$key]['image'] = $value->image;
                        $data[$key]['merchandise_product_name'] = $value->merchandise_product_name; 
                        $data[$key]['product_price'] = $value->product_price;            
                        $category_list[$value->category_name] =$data;
                        
                    }
                }
           }
        }

        if($user_id != ''){
          $user = User::whereIn('status', array(1))->whereNull('deleted_at')->find($user_id);
        }else{
          $user = User::whereIn('status', array(1))->whereNull('deleted_at');
        }

        // $category_list = MerchandiseProduct::with('artistCategoryName')->where('user_id',1)->get();
        return view('front/manage_merchandise_product',compact('category_list','category_header','cat_list','user','merchandise_product_name'));
    }

    public function artistMerchendiseSortUpdate(Request $request){
       
        $init = 1;
        $flag = [];
        foreach ($request->category_order as $key => $value) {
            $artistCategory = ArtistCategory::where('category_name',$value)->update(['sort_order'=> $init]);
            $init++;
           
        }

        return response()->json(array('status' => true));
    }

    public function editAddonProductDetails(Request $request){
        // dd($request->all());
        
        $myProductId=$request->myProductId;
        $print_type_value=$request->print_type_value;  
        $print_price_value=$request->print_price_value;
        $approved_additional_type=$request->approved_additional_type;
        $print_type = Print_types::where('status',1)->get();

        $returnHTML = view('front.addon_features')
        ->with('myProductId', $myProductId)
        ->with('print_type_value',$print_type_value)
        ->with('print_price_value',$print_price_value)
        ->with('approved_additional_type',$approved_additional_type)
        ->with('print_type',$print_type)->render();
// dd($approved_additional_type,$print_price_value,$print_type_value);
         return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function deleteImage($id,Request $request){
        MerchandiseProduct::where('id',$id)->delete();
        MerchandiseProductImages::where('merch_product_id',$id)->delete();
        return redirect('/manage_merchandise_product')->with('success','product deleted successfully.');
    }

    public function EditProductDetails($id){
        $value=[];
        $variants=[];
        $selected =[];
        $merch_table=MerchandiseProduct::where('id',$id)->where('deleted_at',null)->first();
      
        $merch_table_name_creation = DB::select("SELECT * FROM artist_category AC 
          INNER JOIN merchandise_products MP ON AC.id = MP.artist_category_id
          WHERE MP.id='".$id."'");
         
        $product_varient=Product_variant::where('product_id',$merch_table->product_id)->where('deleted_at',null)->get();
        $productdetails = Product::where('id',$merch_table->product_id)->first();
        
        $selected_product_varient = Product_variant::where('id',$merch_table->product_variant_id)->first();
        
            if(isset($selected_product_varient->attributes) && $selected_product_varient->attributes != null){
                $after_explode = explode(",",str_replace(array('"',']','['), '', $selected_product_varient->attributes));
                $selected['size'] =$after_explode[0];
                $selected['color'] =$after_explode[1];
            }
         
            foreach($product_varient as $key => $value){  
              
                // $variants = explode(",",$value->attributes);
                $after_restring = str_replace(array('"','[',']'), '', $value->attributes);
                $variants[$value->id] = str_replace(',', '-', $after_restring);
                
            }
        $value['name_creation']=$merch_table_name_creation[0]->name_creation;
        $value['merchandise_product_name']=$merch_table->merchandise_product_name;
        $value['product_price']=$merch_table->product_price;
        $value['artist_price']=$merch_table->artist_price;
        $value['artist_category_id']=$merch_table->artist_category_id;
        $value['variant']=$variants;
        $value['selected']=$selected;
        $value['print_type_value'] = $productdetails->print_type;
        $value['approved_additional_type_value'] = $productdetails->approved_additional_type;
        $value['print_price_value'] = $productdetails->print_price;
        $value['myProductId'] = $id;
        
        $data = array(
            'status' => 'success',
            'data'=>$value,
            'message'=>'Data updated successfully!'
        ); 
        return response()->json($data);
    }

    public function UpdateProductDetails(Request $request){     
// dd($request->all());
       
        if($request->print_type_value ==null){
           $request->print_type_value = "N;";
        }
        if($request->print_price_value == null){
          $request->print_price_value = "N;";
        }

          $update_product=DB::statement("UPDATE merchandise_products SET name_creation='".$request->name_creation."',product_price= '".$request->product_price."',artist_price= '".$request->raise_price."',artist_category_id = '".$request->artist_category_id."' WHERE id = '".$request->id."'");
        // }
        
        $data = DB::select("SELECT * FROM products as P INNER JOIN merchandise_products as MP ON P.id = MP.product_id WHERE MP.id='".$request->id."'"); 

        $product = DB::statement("UPDATE products SET  print_type= '".$request->print_type_value."',print_price = '".$request->print_price_value."',approved_additional_type = '".$request->approved_additional_type."' WHERE id = '".$data[0]->product_id."'");
     

        $data = array(
            'status' => 'success',
            // 'data'=>$value,
            'message'=>'Data updated successfully!'
        ); 
        return response()->json($data);
        // return redirect('/manage_merchandise_product')->with('success','product updated successfully.');
    }
}
