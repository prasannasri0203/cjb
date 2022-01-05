<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\User;
 use Auth;
use Validator;
use App\Product_variant;
use Image;
use File;
use App\ProductOptionValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;

class CategoriesController extends Controller
{
    public function autoComplete(Request $request) {
        $query = $request->get('term','');
        
        $category=Categories::where('category_name','LIKE','%'.$query.'%')->get();
        
        $data=array();
        foreach ($category as $categories) {
                $data[]=array('value'=>$categories->category_name,'id'=>$categories->id);
        }
        if(count($data))
            return response()->json($data);
        else
            return ['value'=>'No Result Found','id'=>''];
    }

    public function categories_datatable(Request $request)
    {

        if ($request->ajax()) {
            $data = Categories::where('categories.status','0')
                                ->leftjoin('categories as c','c.id','=','categories.parent_id') 
                                ->select('categories.*','c.category_name as parent_name')->orderBy('categories.id', 'DESC');
                                
           // $data = Categories::select('c.id,c.parent_id,c.category_name,ac.category_name as parent_name,ac.parent_id from categories c left join categories ac on c.parent_id=ac.id where c.status="0"');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('category_image', function($row){

                        if($row->category_image) {
                            $path = asset('category/'.$row->category_image);
                        } else {
                            $path = asset('images/thanks.png');
                        }

   
                        $img = '<img src="'.$path.'" height="32px" width="32px" class="cms-image"/>';
                           
    
                            return $img;
                    })
                    ->addColumn('action', function($row){
                        $btn = '';
                        $user_id= Auth::user()->id;
                        $user= User::where('id',$user_id)->first();
                            if($user->can('category-edit'))
                            {
                           $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'"  data-module-type="'.$row->category_name.'" data-image="'.$row->category_image.'" data-size="'.htmlspecialchars(json_encode($row->size_val), ENT_QUOTES, 'UTF-8').'" data-color="'.htmlspecialchars(json_encode($row->color_val), ENT_QUOTES, 'UTF-8').'" class="btn btn-primary btn-sm edit_category" data >Edit</a>';                           
                            }

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#mymodal" data-id="'.$row->id.'"  onclick="setUserId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
                                                   //    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="setUserId('{{$user->id}}')">Delete</a>  

                           //$btn = $btn.' ';
    
                            return $btn;
                    })
                    ->rawColumns(['action','category_image'])
                    ->make(true);
        }
      
        return view('portal/supplier_list',compact('Categories'));
    }    

    public function colors_datatable(Request $request)
    { 
        // =ProductOptionValue::where('product_option_id','2')->get();
        if ($request->ajax()) {
            $data = ProductOptionValue::where('product_option_id','2')->orderBy('id', 'DESC'); 
            return Datatables::of($data)
                    ->addIndexColumn() 
                    ->addColumn('action', function($row){
                        $btn = ''; 
                           $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'"  data-name="'.$row->name.'"   data-color_code="'.$row->color_code.'"  class="btn btn-primary btn-sm edit_color" data >Edit</a>';    
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#mymodal" data-id="'.$row->id.'"  onclick="setUserId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>'; 
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('portal/supplier_list',compact('Categories'));
    }    

    public function categories_create(Request $request) {


        //dd($request->all());
        $rules = array('category_name' => ['required','regex:/^[\pL\s\-]+$/u','min:2','max:50',Rule::unique('categories')->where(function ($query) use ($request) {
            return $query->where('status',1)->whereNull('deleted_at')->where('parent_id',$request->category_name_dropdown);
        })]);
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,    
                'errors' => $validator->getMessageBag()->toArray()
            );
            return response()->json($response);            
        }
        else{
            $categories=new Categories;
            $categories->category_name = trim($request->category_name);
            $image =$request->file('category_image');
            // dd($image);
                    if($request->hasfile('category_image'))
                    {
                        $file_name = rand().'.'.$image->getClientOriginalExtension(); 
                        $img = Image::make($image->getRealPath());
                        $org_img = Image::make($image->getRealPath());
                        $destinationPath = public_path('category');
                        $thumbPath = public_path('category/thumbimages'); 
                        if(!File::isDirectory($destinationPath)){
                        File::makeDirectory($destinationPath, 0777, true, true);
                        } 
                        if(!File::isDirectory($thumbPath)){
                        File::makeDirectory($thumbPath, 0777, true, true);
                        } 
            
                        //create small thumbnail
                        $img->resize(150, 150, function ($constraint) {
                        $constraint->aspectRatio();
                        })->save($thumbPath.'/'.$file_name);
                        $org_img->save($destinationPath.'/'. $file_name );
            
                        if(File::exists($destinationPath)) {
                            File::delete($destinationPath);
                        }
            
                        $categories->category_image = $file_name;
                    }
            $categories->parent_id = trim($request->category_name_dropdown);
            $categories->size_val = json_encode($request->size_val);
            $categories->color_val = json_encode($request->color_val);
            $categories->status = '0';
            // dd($categories);
            $categories->save();
            
            $response = array(
                'status' => true,
                'id' => $categories->id,
            ); 
            return response()->json($response);

        }       
    }
    public function colorCreate(Request $request) { 
        // dd($request->all());
        // color code array 

        $color_code_chk=strpos(trim($request->name),"#");
        $color_val=$this->colourNameToHex(trim($request->name),trim($request->color_code));
        // dd($color_val['colorname']); 
        // dd($color_val['colorcode']); 

        $rules = array('name' => ['required','min:2','max:50',Rule::unique('product_option_values')->where(function ($query) use ($request) {
            return $query->where('product_option_id',2)->where('name',$request->name);
            })],
            'color_code'=>'required|min:7|max:7',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
            return response()->json($response);            
        }
        else{ 
            $color=new ProductOptionValue;
            $color->product_option_id = '2';
            $color->name = trim($request->name);  
            $color->color_code = trim($request->color_code);  
            $color->save();            
            $response = array(
                'status' => true,
                'id' => $color->id,
            ); 
            return response()->json($response);

        }       
    }

    public function category_datatable_status($id)
    {
        $update_categories=Categories::where('id',$id)->update(['status' => '1']);
        if($update_categories)
        {
            //return response()->json(['success'=>'Product deleted successfully.']);
            $sub_categories_status=Categories::where('id',$id)->get();
            //dd($update_sub_categories);
            if($sub_categories_status)
            {
                $update_sub_categories=Categories::where('parent_id',$id)->update(['status' => '1']);
                if($update_sub_categories)
                {
                    return response()->json(['success'=>'Category and sub categories deleted successfully.']);
                }
                else{
                    return response()->json(['success'=>'Category deleted successfully.']);
                }
            }
        }
        else
        {
            return response()->json(['success'=>'No deleted.']);
        }
    }
    
    public function edit($id)
    {
        if($request()->ajax()){
            $data = Categories::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }
    public function categories_update(Request $request) {
        //$categories = $request->all();
        //dd($request->all());
        $categories['category_name'] = $request->categoery_name;
            $image =$request->file('category_image');
            // dd($image);
                    if($request->hasfile('category_image'))
                    {
                        $file_name = rand().'.'.$image->getClientOriginalExtension(); 
                        $img = Image::make($image->getRealPath());
                        $org_img = Image::make($image->getRealPath());
                        $destinationPath = public_path('category');
                        $thumbPath = public_path('category/thumbimages'); 
                        if(!File::isDirectory($destinationPath)){
                        File::makeDirectory($destinationPath, 0777, true, true);
                        } 
                        if(!File::isDirectory($thumbPath)){
                        File::makeDirectory($thumbPath, 0777, true, true);
                        } 
            
                        //create small thumbnail
                        $img->resize(150, 150, function ($constraint) {
                        $constraint->aspectRatio();
                        })->save($thumbPath.'/'.$file_name);
                        $org_img->save($destinationPath.'/'. $file_name );
            
                        if(File::exists($destinationPath)) {
                            File::delete($destinationPath);
                        }
            
                        $categories['category_image'] = $file_name;
                    }
            $categories['status'] = '0';

            $update_val = Categories::where('id',$request->category_id)->first();

            $categories['size_val'] = json_encode($request->size_val);
            $categories['color_val'] = json_encode($request->color_val);

            $user = Categories::where('id',$request->category_id)->update($categories);

 
            return redirect('/admin/categories')
            ->with('success','Category updated successfully');        
    }

    public function colors_update(Request $request) { 
        // dd($request->all()); 
            $rules = array('color_name' => 'required|min:2|max:50','color_code' => 'required|min:7|max:7',
                     
            ); 
            $validator = Validator::make(Input::all(), $rules);
            $color_chk=ProductOptionValue::Where('id','!=',$request->color_id)->where('product_option_id',2)->where('name',$request->color_name)->first(); 
            $exist_errors='';
            if($color_chk){
                $exist_errors="Already exists color name";
            } 
            if ($validator->fails() || $exist_errors !='')
            {
                $response = array(
                    'status' => false,
                    'exist_errors' => $exist_errors,
                    'errors' => $validator->getMessageBag()->toArray()
                ); 

                return response()->json($response);            
            } 
            else if(!$color_chk)
            {         
                    $color = [
                        'name' => $request->color_name,
                        'color_code' => $request->color_code
                    ]; 
                $color = ProductOptionValue::where('id',$request->color_id)->update($color); 
                $response = array(
                    'status' => true, 
                ); 
                return response()->json($response);

            }          
    }

    
   public function colourNameToHex($colour,$colour_code)
    { 
          $colours = array("aliceblue"=>"#f0f8ff","antiquewhite"=>"#faebd7","aqua"=>"#00ffff","aquamarine"=>"#7fffd4","azure"=>"#f0ffff",
          "beige"=>"#f5f5dc","bisque"=>"#ffe4c4","black"=>"#000000","blanchedalmond"=>"#ffebcd","blue"=>"#0000ff","blueviolet"=>"#8a2be2","brown"=>"#a52a2a","burlywood"=>"#deb887",
          "cadetblue"=>"#5f9ea0","chartreuse"=>"#7fff00","chocolate"=>"#d2691e","coral"=>"#ff7f50","cornflowerblue"=>"#6495ed","cornsilk"=>"#fff8dc","crimson"=>"#dc143c","cyan"=>"#00ffff",
          "darkblue"=>"#00008b","darkcyan"=>"#008b8b","darkgoldenrod"=>"#b8860b","darkgray"=>"#a9a9a9","darkgreen"=>"#006400","darkkhaki"=>"#bdb76b","darkmagenta"=>"#8b008b","darkolivegreen"=>"#556b2f",
          "darkorange"=>"#ff8c00","darkorchid"=>"#9932cc","darkred"=>"#8b0000","darksalmon"=>"#e9967a","darkseagreen"=>"#8fbc8f","darkslateblue"=>"#483d8b","darkslategray"=>"#2f4f4f","darkturquoise"=>"#00ced1",
          "darkviolet"=>"#9400d3","deeppink"=>"#ff1493","deepskyblue"=>"#00bfff","dimgray"=>"#696969","dodgerblue"=>"#1e90ff",
          "firebrick"=>"#b22222","floralwhite"=>"#fffaf0","forestgreen"=>"#228b22","fuchsia"=>"#ff00ff",
          "gainsboro"=>"#dcdcdc","ghostwhite"=>"#f8f8ff","gold"=>"#ffd700","goldenrod"=>"#daa520","gray"=>"#808080","green"=>"#008000","greenyellow"=>"#adff2f",
          "honeydew"=>"#f0fff0","hotpink"=>"#ff69b4",
          "indianred "=>"#cd5c5c","indigo"=>"#4b0082","ivory"=>"#fffff0","khaki"=>"#f0e68c",
          "lavender"=>"#e6e6fa","lavenderblush"=>"#fff0f5","lawngreen"=>"#7cfc00","lemonchiffon"=>"#fffacd","lightblue"=>"#add8e6","lightcoral"=>"#f08080","lightcyan"=>"#e0ffff","lightgoldenrodyellow"=>"#fafad2",
          "lightgrey"=>"#d3d3d3","lightgreen"=>"#90ee90","lightpink"=>"#ffb6c1","lightsalmon"=>"#ffa07a","lightseagreen"=>"#20b2aa","lightskyblue"=>"#87cefa","lightslategray"=>"#778899","lightsteelblue"=>"#b0c4de",
          "lightyellow"=>"#ffffe0","lime"=>"#00ff00","limegreen"=>"#32cd32","linen"=>"#faf0e6",
          "magenta"=>"#ff00ff","maroon"=>"#800000","mediumaquamarine"=>"#66cdaa","mediumblue"=>"#0000cd","mediumorchid"=>"#ba55d3","mediumpurple"=>"#9370d8","mediumseagreen"=>"#3cb371","mediumslateblue"=>"#7b68ee",
          "mediumspringgreen"=>"#00fa9a","mediumturquoise"=>"#48d1cc","mediumvioletred"=>"#c71585","midnightblue"=>"#191970","mintcream"=>"#f5fffa","mistyrose"=>"#ffe4e1","moccasin"=>"#ffe4b5",
          "navajowhite"=>"#ffdead","navy"=>"#000080",
          "oldlace"=>"#fdf5e6","olive"=>"#808000","olivedrab"=>"#6b8e23","orange"=>"#ffa500","orangered"=>"#ff4500","orchid"=>"#da70d6",
          "palegoldenrod"=>"#eee8aa","palegreen"=>"#98fb98","paleturquoise"=>"#afeeee","palevioletred"=>"#d87093","papayawhip"=>"#ffefd5","peachpuff"=>"#ffdab9","peru"=>"#cd853f","pink"=>"#ffc0cb","plum"=>"#dda0dd","powderblue"=>"#b0e0e6","purple"=>"#800080",
          "rebeccapurple"=>"#663399","red"=>"#ff0000","rosybrown"=>"#bc8f8f","royalblue"=>"#4169e1",
          "saddlebrown"=>"#8b4513","salmon"=>"#fa8072","sandybrown"=>"#f4a460","seagreen"=>"#2e8b57","seashell"=>"#fff5ee","sienna"=>"#a0522d","silver"=>"#c0c0c0","skyblue"=>"#87ceeb","slateblue"=>"#6a5acd","slategray"=>"#708090","snow"=>"#fffafa","springgreen"=>"#00ff7f","steelblue"=>"#4682b4",
          "tan"=>"#d2b48c","teal"=>"#008080","thistle"=>"#d8bfd8","tomato"=>"#ff6347","turquoise"=>"#40e0d0",
          "violet"=>"#ee82ee",
          "wheat"=>"#f5deb3","white"=>"#ffffff","whitesmoke"=>"#f5f5f5",
          "yellow"=>"#ffff00","yellowgreen"=>"#9acd32");

           $color_key=[];
           $color=[];

        $color_code_chk=strpos(trim($colour),"#");

            if($color_code_chk==0){ 
                $color=array_search($colour,$colours);  
                $colorval =$color;
                if($colour == $colour_code){ 
                    $color_code =$colour;
                }else{
                    $color_code =$colour_code;
                }
            } 

            if(array_key_exists($colour,$colours)){
                 $color_code=$colours[$colour];  
                 $color_code=$color_code;

               if($color_code == $colour_code){ 
                    $colorval =$colour;
                }else{
                    $colorval =$colour_code;
                }
            }else{
                $colorval =$colour;
                $color_code =$colour_code;
            }
            $color= array( 'colorname' => $colorval , 'colorcode' => $color_code );
 
        return $color;
    }


    public function search(Request $request)
    {
        $search = $request->get('term');
      
        $result = Categories::where('category_name', 'LIKE', '%'. $search. '%')->where('status', '=', '0')->get();

        return response()->json($result);
    }

    public function category_dropdown()
    {
        $category_list = Categories::all()->where('status','0')->where('parent_id','0');
        $response = array(
            'status' => true,
            'category_name' => $category_list,
        ); 
        return response()->json($response);
    }
    public function color_dropdown()
    {
        $color_list = ProductOptionValue::where('product_option_id','2')->get();
        $response = array(
            'status' => true,
            'category_name' => $color_list,
        ); 
        return response()->json($response);
    }
    public function destroy(Request $request)
    {
        $id = $request->userId;
        Categories::find($id)->delete();
        return redirect('/admin/categories')
        ->with('success','Supplier deleted successfully');
    }
    public function colorDelete(Request $request)
    {
        // dd($request->all());
        $id = $request->colorid;
        $msg=''; 
        $color=[];
        $category=[];
        $product_variant=[];
        $count_catagory='';
        $count_pro_variant='';
        $color=ProductOptionValue::find($id);
        $category=Categories::whereJsonContains('color_val',$color->name)->get();
        $product_variant=Product_variant::whereJsonContains('attributes',$color->name)->get();

        $count_catagory=count($category);
        $count_pro_variant=count($product_variant);

         if($count_catagory > 0 || $count_pro_variant > 0){
            $msg="You can't be delete this color Already use in the color";
         }else{
            ProductOptionValue::find($id)->delete();
            $msg="Color deleted successfully"; 
         }
  // dd($msg);
        return redirect('/admin/colors')->with('success',$msg);
    }


}
