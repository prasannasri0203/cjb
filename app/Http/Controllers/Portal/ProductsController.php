<?php
namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\Supplier;
use App\Product;
use App\Product_variant;
use App\Review;
use App\Print_types;
use Validator;
use Image;
use File;
use DB;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Redirect;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use App\Banner;
use App\ProductSupplier;
use Illuminate\Validation\Rule; 
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;  
class ProductsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:product-list');
        $this->middleware('permission:product-create', ['only' => ['product_add', 'product_save']]);
        $this->middleware('permission:product-edit', ['only' => ['product_edit', 'product_update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function product_list(Request $request)
    {

        $sup = Input::get('sup_id');
        // dd($request->query('sup_id')); 
        $data = Product::with('ProductImages')->where('products.status', '1')->orderBy('id','DESC') // ->where('products.supplier_id','=',$sup)
            ->get();

        foreach ($data as $key => $list)
        {
            // dd(count($list->productSuppliersList));

            if(count($list->productSuppliersList)>0)
            {
                // multiple supplier name fetch

                $supp = $list->productSuppliersList->first();
                $data[$key]['supplier_name'] = $supp["name"];
            }else
            {
              $data[$key]['supplier_name'] = '-';  
            }
        }

        if ($request->ajax())
        {
            // $data = Product::distinct('id')->where('products.status','0')
            // ->join('product_variants','product_variants.product_id','=','products.id')
            // ->select('products.*')->orderBy('products.id', 'DESC')
            // ->get();
            return Datatables::of($data)->addIndexColumn()->addColumn('date', function ($row)
            {
                $date = date('d-m-Y', strtotime($row->updated_at));
                return $date;
            })->addColumn('image', function ($row)
            {
                if (@$row->ProductImages[0]['image'])
                {
                    $path = asset('/portal/img/product/' . $row->ProductImages[0]['image']);
                }
                else
                {
                    $path = asset('images/thanks.png');
                }

                $img = '<img src="' . $path . '" height="32px" width="32px" class="cms-image"/>';

                return $img;
            })->addColumn('action', function ($row)
            {
                $btn = '<a href="product_edit/' . $row->id . '" class="btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="' . $row->id . '"  onclick="setProductId(' . $row->id . ')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
                //$btn = $btn.' ';
                return $btn;
            })->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('portal/product_list');
    }

    public function product_add()
    {
        $category_list = Categories::all()->where('status', '0')
            ->where('parent_id', '0');
        $supplier_list = Supplier::all()->where('status', '0');
        $product_options = DB::table('product_options')->get();
        $options_varaints = DB::table('product_option_values')->get();
        // return view('portal.product_add_img_multipe' , compact('category_list','supplier_list', 'product_options', 'options_varaints'));
       return view('portal.product_add', compact('category_list', 'supplier_list', 'product_options', 'options_varaints'));
    }
// product import and  
  
    public function productImport(Request $request) 
    {  
          dd($request->all()); die;
           if($request->file('product_import_file')){
                $path = $request->file('product_import_file')->getRealPath();
                $import = new ProductsImport;
                $data = Excel::import($import, $request->file('product_import_file'));
                $resultData = $import->data;   
                return redirect()->route('admin.product_list')->with('resultData',$resultData);
           } else{
                return redirect()->route('admin.product_list')->with('error','No File Selected');
           }
    }

    public function productProcess(Request $request)
    {
        $product_options = DB::table('product_options')->get();
        $mp_details = $request->all();
        return view('portal.product_add_process', compact('product_options', 'mp_details'));
    }

    public function productOptions(Request $request)
    {
        $options = $request->option_value;
        $options_varaints = DB::table('product_option_values')->whereIn('product_option_id', $options)->orderBy('product_option_id')
            ->orderBy('name')
            ->get();

        // return $options_varaints;
        return response()
            ->json(['status' => true, 'products' => $options_varaints], 200);
    }

    public function productProcessOptions(Request $request)
    {

        return view('portal.product_add_process_option', compact('product_options', 'mp_details'));
    }

    public function get_sub_category($id)
    {
        $parent_category_name = Categories::all()->where('parent_id', $id);
        $category_val = Categories::where('id', $id)->get();
        $size_val = $category_val[0]['size_val'];
        $color_val = $category_val[0]['color_val'];
        if ($parent_category_name)
        {
            $response = array(
                'status' => true,
                'category_name' => $parent_category_name,
                'size_val' => $size_val,
                'color_val' => $color_val,
            );
        }
        else
        {
            $response = array(
                'status' => false,
                'category_name' => '',
                'size_val' => $size_val,
                'color_val' => $color_val,
            );
        }

        return response()->json($response);
    }

    public function saveImage($file)
    {
        $filename = rand() . '.' . $file->getClientOriginalExtension();
        $img = Image::make($file->getRealPath());
        $org_img = Image::make($file->getRealPath());
        $destinationPath = public_path('portal/img/product');
        $thumbPath = public_path('portal/img/product/thumbimages');
        if (!File::isDirectory($destinationPath))
        {
            File::makeDirectory($destinationPath, 0777, true, true);
        }
        if (!File::isDirectory($thumbPath))
        {
            File::makeDirectory($thumbPath, 0777, true, true);
        }

        //create small thumbnail
        $img->resize(150, 150, function ($constraint)
        {
            $constraint->aspectRatio();
        })
            ->save($thumbPath . '/' . $filename);
        $org_img->save($destinationPath . '/' . $filename);

        return $filename;
    }

    public function cropImage($file, $w, $h, $x, $y)
    {
        $filename = rand() . '.' . $file->getClientOriginalExtension();
        $img = Image::make($file->getRealPath());
        $org_img = Image::make($file->getRealPath());
        $destinationPath = public_path('portal/img/product');
        $thumbPath = public_path('portal/img/product/thumbimages');
        if (!File::isDirectory($destinationPath))
        {
            File::makeDirectory($destinationPath, 0777, true, true);
        }
        if (!File::isDirectory($thumbPath))
        {
            File::makeDirectory($thumbPath, 0777, true, true);
        }

        // Crop
        $img->crop($w, $h, $x, $y);

        //create small thumbnail
        $img->resize(150, 150, function ($constraint)
        {
            $constraint->aspectRatio();
        })
            ->save($thumbPath . '/' . $filename);
        $img->save($destinationPath . '/' . $filename);

        return $filename;
    }

    public function product_save(Request $request) // add product save
    {  
        // dd($request->all());
        // echo '<pre>';print_r($request->pv_upload);
        $rules = array(
            'product_name' => 'required|string|min:2|max:50',
            'category_id' => 'required',
            // 'sub_category_id' => 'required_if:category_id,',
            'supplier_id' => 'required',
            'reference_number' => 'required|min:10',
            'product_description' => 'required|min:20',
            'product_width' => 'required',
            'product_height' => 'required',
            // 'product_option_value'    => 'required',
            'pv_name.*' => 'required',
            'pv_price.*' => 'required|numeric|min:1',
            'pv_quantity.*' => 'required',
            'product_variant_ref_no' => 'required',
            'pv_upload' => 'required|array',
            'pv_upload.*.*' => 'min:1|max:4',
            // 'pv_upload.*.m'    => 'required_if:pv_upload.*.s, null,min:1|max:4',
            // 'pv_upload.*.s'    => 'required_if:pv_upload.*.m, null,min:1|max:4',
            'pv_upload.*.*.*' => 'required|max:10000',
            // 'print_type_price_name'    => 'required',
            
        );

        $messages = array(
            'pv_name.*.required' => 'The product variant name field is required.',
            'pv_price.*.required' => 'The product variant price field is required.',
            'pv_quantity.*.required' => 'The product variant quantity field is required.',
            'pv_upload.*.required' => 'The product variant image field is required.',
            'pv_upload.*.min' => 'The product variant file min 1 is required.',
            'pv_upload.required' => 'The product variant image file is required.',
            'pv_upload.*.max' => 'The product variant file max 4 is allowed.',
            'pv_upload.image' => 'The product variant file must be image only',
        );
   
        $validator = Validator::make(Input::all() , $rules, $messages);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()
                    ->toArray()
            );
            return response()
                ->json($response);

        }
        else
        {
            $color_vals = $request->product_color_option_value; 
            // dd($attri);  die;
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            // $product->supplier_id = $request->supplier_id[0];
            $product->reference_number = $request->reference_number;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_image = null; // json_encode($prd_main, JSON_UNESCAPED_SLASHES);
            $product->width = $request->product_width;
            $product->height = $request->product_height;
            $product->tax = 5;
            $product->status = 1;
            $product->shipping_cost = $request->shipping_cost;
            $product->print_type = serialize($request->print_type_print_name);
            $product->print_price = serialize($request->print_type_price_name);
            $product->created_by = Auth::user()->id;
            $product->updated_by = Auth::user()->id;
            $product->save();

            $po_db = DB::table('product_options')->get();

            //product mutiple supplier stored
            // foreach ($request->supplier_id as $key => $sup_id)           
            // {  
            //     $product_supplier= new ProductSupplier();
            //     $product_supplier->product_id = $product->id;
            //     $product_supplier->supplier_id = $sup_id;
            //     $product_supplier->save();
            // }

            //product supplier value update pivot method - save
            $product->productSuppliersList()->attach($request->supplier_id); 
            $attri = [];

            if ($product->id)
            {
                // static add variant save
                foreach ($request->product_option_size_value as $key => $size)
                {
                    $attri = array(
                        $size,
                        $color_vals
                    );
                    // product_option_size_value  product_color_option_value 
                    foreach ($request->file('pv_upload') as $key => $filevalue)
                    {
                        foreach ($filevalue as $fut => $files)
                        {
                            foreach ($files as $k => $file)
                            {
                                $get_filename = $this->saveImage($file);
                                if ($get_filename)
                                { 
                                    $promotion_images[$key][] = $get_filename;
                                }
                            }
                        }
                    } 
                    if ($product->id)                      
                    {
                        $x = 0;
                        $i = 2;
                        $pvariant = new Product_variant();
                        $pvariant->product_id = $product->id;
                        $pvariant->variant_name = $request->pv_name[1];
                        $pvariant->product_variant_ref_no = $request->product_variant_ref_no;
                        $pvariant->option_id = null;
                        $pvariant->value_id = null;
                        $pvariant->sku = null;
                        $pvariant->attributes = json_encode($attri);
                        $pvariant->product_image = null;
                        $pvariant->price = $request->pv_price[1];
                        if ($request->pv_quantity[1] == 'u')
                        {
                            $pvariant->quantites = null;
                        }
                        else
                        {
                            $pvariant->quantites = $request->pv_quantity[1];
                        }
                        $pvariant->print_type = serialize($request->print_type_print_name);
                        $pvariant->print_price = serialize($request->print_type_price_name);

                        $pvariant->status = 1;
                        $pvariant->created_by = Auth::user()->id;
                        $pvariant->updated_by = Auth::user()->id;
                        $pvariant->save();
                        if ($pvariant->id)
                        { 
                            foreach ($promotion_images[1] as $k => $v)
                            {
                                $product_variant_images = array(
                                    'id' => Str::random(32) ,
                                    'product_id' => $product->id,
                                    'product_variant_id' => $pvariant->id,
                                    // 'image' => $pvi_list,
                                    'image' => $v,
                                    'status' => 1,
                                    'sort' => 1,
                                    'created_at' => date('Y-m-d H:i:s') ,
                                    'updated_at' => date('Y-m-d H:i:s')
                                );
                                DB::table('product_images')->insert($product_variant_images); 
                              
                            } 
                            $promotion_images[1] =[];
                        }
                        // $promo_images = [];
                        // if ($request->promo_image)
                        // {
                        //     foreach ($request->promo_image as $promo_img)
                        //     {
                        //         if ($promo_img != 0)
                        //         {
                        //             $promo_images[] = array(
                        //                 'product_id' => $product->id,
                        //                 //'product_variant_id' => $pvariant->id,
                        //                 'image' => $promo_img,
                        //                 'status' => 1,
                        //                 'sort' => 0,
                        //                 'created_at' => date('Y-m-d H:i:s') ,
                        //                 'updated_at' => date('Y-m-d H:i:s') ,
                        //             );
                        //         }
                        //         if (count($promo_images) != 0)
                        //         {
                        //             DB::table('product_promo_images')->insert($promo_images);
                        //         }
                        //     }
                        // }
                    }
                } 
//additional multiple adding add variant save
                $color2 = $request->product_color_option_value_2;
                $created_count = 0;
                $total_variable = count((array)$color2); 
                if($total_variable>0){
                    foreach ($color2 as $ckey => $value)
                    {
                       $ckey = $ckey + 2;
                       $chkKey= $this->addvariantcheck($ckey,$request);
                       $chkRefKey= $this->addvariantRefNocheck($ckey,$request);
                       $ckey=$chkKey;
                       $ref_no='product_variant_ref_no_2_'.$chkRefKey;
                       $vari_ref_no=$request->$ref_no;
                       $vari_ref_no = isset($vari_ref_no) ? $vari_ref_no : '0'; 

                        if ($created_count < $total_variable)
                        {  
                            $rqtsizes = "product_option_size_value_2_" . $ckey;
                            $rqt_size = $request->$rqtsizes;
                            if(count((array)$rqt_size)>0){
                            foreach ($rqt_size as $key2 => $size2)
                            {
                                $attri2 = array(
                                    $size2,
                                    $value
                                );

                                $rqtimg = "pv_upload_" . $ckey;
                                $rqt_img = $request->file('pv_upload_');
                                // dd($rqtimg);
                                foreach ($rqt_img as $key => $filevalue)
                                {
                                    if ($key == $ckey)
                                    {
                                        foreach ($filevalue as $k => $file)
                                        {
                                            $get_filename = $this->saveImage($file);
                                            if ($get_filename)
                                            {
                                                $promotion_images2[] = $get_filename;
                                            }
                                        }
                                    }

                                }  
                                if ($product->id) // $product->id
                                
                                {
                                    $x = 0;

                                    $i = 2;
                                    $pvariant = new Product_variant();
                                    $pvariant->product_id = $product->id;
                                    $pvariant->variant_name = $request->pv_name[1];
                                    $pvariant->product_variant_ref_no = $vari_ref_no[0];
                                    $pvariant->option_id = null;
                                    $pvariant->value_id = null;
                                    $pvariant->sku = null;
                                    $pvariant->attributes = json_encode($attri2);
                                    $pvariant->product_image = null;
                                    $pvariant->price = $request->pv_price[1];
                                    if ($request->pv_quantity[1] == 'u')
                                    {
                                        $pvariant->quantites = null;
                                    }
                                    else
                                    {
                                        $pvariant->quantites = $request->pv_quantity[1];
                                    }

                                    $pvariant->print_type = serialize($request->print_type_print_name);
                                    $pvariant->print_price = serialize($request->print_type_price_name);

                                    $pvariant->status = 1;
                                    $pvariant->created_by = Auth::user()->id;
                                    $pvariant->updated_by = Auth::user()->id;

                                    $pvariant->save();
                                    if ($pvariant->id)
                                    {
                                        foreach ($promotion_images2 as $k => $v2)
                                        {

                                            $product_variant_images = array(
                                                'id' => Str::random(32) ,
                                                'product_id' => $product->id,
                                                'product_variant_id' => $pvariant->id,
                                                // 'image' => $pvi_list,
                                                'image' => $v2,
                                                'status' => 1,
                                                'sort' => 1,
                                                'created_at' => date('Y-m-d H:i:s') ,
                                                'updated_at' => date('Y-m-d H:i:s')
                                            );
                                            DB::table('product_images')->insert($product_variant_images);
                                        }
                                         $promotion_images2 =[];
     
                                    }
                                    // $promo_images = [];
                                    // if ($request->promo_image)
                                    // {
                                    //     foreach ($request->promo_image as $promo_img)
                                    //     {

                                    //         if ($promo_img != 0)
                                    //         {
                                    //             $promo_images[] = array(
                                    //                 'product_id' => $product->id,
                                    //                 //'product_variant_id' => $pvariant->id,
                                    //                 'image' => $promo_img,
                                    //                 'status' => 1,
                                    //                 'sort' => 0,
                                    //                 'created_at' => date('Y-m-d H:i:s') ,
                                    //                 'updated_at' => date('Y-m-d H:i:s') ,
                                    //             );
                                    //         }
                                    //         if (count($promo_images) != 0)
                                    //         {
                                    //             DB::table('product_promo_images')->insert($promo_images);
                                    //         }
                                    //     }
                                    // }

                                }

                            } 
                        }

    						$created_count++;
                        }

                        $ckey++;

                    }
                }

               return response()->json(array('status' => true), 200);
                
            }
            else
            {
                return response()->json(array(
                    'status' => false
                ) , 200);
            }

        }

    }
    public function addvariantcheck($key,$request)
    {
        $rqtsizes = "product_option_size_value_2_" . $key;
        $rqt_size=$request->$rqtsizes; 
        if(isset($rqt_size)&& $rqt_size){
            return $key;
        }
        else{
            $newkey = $key+1;
            return $this->addvariantcheck($newkey,$request);
        }
    }
 public function addvariantRefNocheck($key,$request)
    {
        $rqtref = "product_variant_ref_no_2_" . $key;
        $rqt_ref=$request->$rqtref; 
        if(isset($rqt_ref) && $rqt_ref){
            return $key;
        }
        else{
            $newkey = $key+1;
            return $this->addvariantRefNocheck($newkey,$request);
        }
    }

    public function product_variant_save($product_id, $returnedRequest)
    {

        $field_limit = $returnedRequest->input('append_field_count');
        $check = [];
        for ($i = 2;$i <= $field_limit;$i++)
        {
            if ($returnedRequest->has('product_image_variant' . $i))
            {
                $promotion_images = [];
                foreach ($returnedRequest->file('product_image_variant' . $i) as $key => $file)
                {
                    //dd($key);
                    $new_name = rand() . '.' . $file->getClientOriginalExtension();
                    $img = Image::make($file->getRealPath());
                    $org_img = Image::make($file->getRealPath());
                    $destinationPath = public_path('portal/img/product');
                    $thumbPath = public_path('portal/img/product/thumbimages');
                    if (!File::isDirectory($destinationPath))
                    {
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    if (!File::isDirectory($thumbPath))
                    {
                        File::makeDirectory($thumbPath, 0777, true, true);
                    }

                    //create small thumbnail
                    $img->resize(150, 150, function ($constraint)
                    {
                        $constraint->aspectRatio();
                    })
                        ->save($thumbPath . '/' . $new_name);
                    $org_img->save($destinationPath . '/' . $new_name);

                    // $new_name = rand() . '.' . $file->getClientOriginalExtension();
                    // $file->move(public_path('portal/img/product'), $new_name);
                    if ($new_name) $promotion_images[$key] = $new_name;
                    //array_push($promotion_images, $new_name);
                    
                }
            }

            $product_variant = new Product_variant;
            $product_variant->product_id = $product_id;
            $product_variant->product_size = $returnedRequest->input('product_variant_size' . $i);
            $product_variant->product_image = $promotion_images;
            $product_variant->product_colour = $returnedRequest->input('favcolor' . $i);
            $product_variant->variant_price = $returnedRequest->input('variant_price' . $i);
            $product_variant->save();

        }
        //dd($product_variant->id);
        return response()
            ->json(array(
            'status' => true
        ) , 200);
    }

    public function product_datatable_status_update($id)
    {
        //dd($id);
        $update_product = Product::where('id', $id)->update(['status' => '1']);
        if ($update_product)
        {
            return response()->json(['success' => 'Product deleted successfully.']);
        }
        else
        {
            return response()
                ->json(['success' => 'No deleted.']);
        }
    }

    public function product_edit($id)
    {

        $product_data = Product::with('product_variant', 'product_category')->where('id', $id)->first();

        $data_pov = Product_variant::where('product_id', $id)->pluck('value_id')
            ->toArray();
 
        $category_list = Categories::all()->where('status', '0')
            ->where('parent_id', '0');
        $supplier_list = Supplier::all()->where('status', '0');

       
        $product_options = DB::table('product_options')->get();
        $options_varaints = DB::table('product_option_values')->get();

        return view('portal.product_edit-main', compact('category_list', 'supplier_list', 'product_data', 'product_options', 'options_varaints', 'data_pov'));

    }

    public function product_variant_edit_old($id)
    {

        // dd($id);
        $product_data = Product_variant::where('id', $id)->get();

        $product = Product::where('id', $product_data[0]['product_id'])->get();
        $categories = Categories::where('id', $product[0]['category_id'])->get();
        $color_val = json_decode($categories[0]['color_val']);
        $size_val = json_decode($categories[0]['size_val']);
        // dd($product_data);
        

        $pvi_data = DB::table('product_images')->where('product_variant_id', $product_data[0]['id'])->get();

        // dd($pvi_data);
        $product_options = DB::table('product_options')->get();
        $options_varaints = DB::table('product_option_values')->get();
        // dd($pvi_data);
        return view('portal.product_edit-variant', compact('product_data', 'pvi_data', 'product_options', 'options_varaints', 'color_val', 'size_val'));

    }

    public function product_variant_edit($id)
    {
        $product_data = Product_variant::where('id', $id)->get();

        $products = Product::where('id', $product_data[0]['product_id'])->get();

        $categories = Categories::where('id', $products[0]['category_id'])->get();
        $color_val = json_decode($categories[0]['color_val']);
        $size_val = json_decode($categories[0]['size_val']);

        $pvi_data = DB::table('product_images')->where('product_variant_id', $product_data[0]['id'])->get();

        $product_options = DB::table('product_options')->get();
        $options_varaints = DB::table('product_option_values')->get();

        return view('portal.product_edit-variant', compact('product_data', 'pvi_data', 'product_options', 'options_varaints', 'color_val', 'size_val'));

    }
    public function product_variant_add($id)
    {

        $product_data = [''];

        $product = Product::where('id', $id)->get();
        $categories = Categories::where('id', $product[0]['category_id'])->get();
        $color_val = json_decode($categories[0]['color_val']);
        $size_val = json_decode($categories[0]['size_val']);

        $pvi_data = [''];

        $product_options = DB::table('product_options')->get();
        $options_varaints = DB::table('product_option_values')->get();
        //dd($size_val);
        return view('portal.product_add_variant', compact('product', 'product_data', 'pvi_data', 'product_options', 'options_varaints', 'color_val', 'size_val', 'id'));
    }

    public function product_update_main(Request $request)
    {
        // dd($request->all());
        // dd($request->supplier_id);
        $rules = array(
            'product_name' => 'required|string|min:2|max:50',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'product_description' => 'required', // |string|min:20',
            'reference_number' => 'required',
            'product_width' => 'required',
            'product_height' => 'required',
        );
        $validator = Validator::make(Input::all() , $rules);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()
                    ->toArray()
            );
            return response()
                ->json($response);
        }
        else
        {
            $product = Product::where('status', 1)->find($request->input('product_id'));
            if (!$product)
            {
                return response()->json(array(
                    'status' => false
                ) , 200);
            }
          // dd($request->product_option_value[0]);
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            $product->reference_number = $request->reference_number;
            $product->width = $request->product_width;
            $product->height = $request->product_height;
          // $product->tax = 5;
          // $product->status = 1;
          // $product->supplier_id = $request->supplier_id[0];
            $product->shipping_cost = $request->shipping_cost;
            $product->updated_by = Auth::user()->id;
            $product->productSuppliersList()->sync($request->supplier_id); //product supplier value update pivot method - updated
            $product->update();
 
            return response()
                ->json(array(
                'status' => true
            ) , 200);
        }
    }

    public function product_update(Request $request)
    {
        // return $request->supplier_id;
        //    dd($request->all());

        //dd($request->product_id);
        $rules = array(
            'product_name' => 'required|string|min:2|max:50',
            'category_id' => 'required',
            // 'sub_category_id'    => 'required_if:category_id,',
            'supplier_id' => 'required',
            'product_description' => 'required|min:20|max:60',
            'product_width' => 'required',
            'product_height' => 'required',
            'product_option_value' => 'required',
            'pv_name.*' => 'required',
            'pv_price.*' => 'required',
            'pv_quantity.*' => 'required',
            'pv_upload' => 'required|array',
            'pv_upload.*.*' => 'min:1|max:4',
            'pv_upload.*.*.*' => 'required|max:10000',
        );
        $messages = array(
            'pv_name.*.required' => 'The product variant name field is required.',
            'pv_price.*.required' => 'The product variant price field is required.',
            'pv_quantity.*.required' => 'The product variant quantity field is required.',
            'pv_upload.*.required' => 'The product variant image field is required.',
            'pv_upload.*.min' => 'The product variant file min 1 is required.',
            'pv_upload.required' => 'The product variant image file is required.',
            'pv_upload.*.max' => 'The product variant file max 4 is allowed.',
            'pv_upload.image' => 'The product variant file must be image only',
        );
        $validator = Validator::make(Input::all() , $rules, $messages);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()
                    ->toArray()
            );
            return response()
                ->json($response);
        }
        else
        {
            $product = Product::where('status', 1)->find($request->input('product_id'));
            if (!$product)
            {
                return response()->json(array(
                    'status' => false
                ) , 200);
            }
            // dd($request->product_option_value[0]);
            if ($request->has('pv_upload'))
            {
                $promotion_images = [];
                foreach ($request->file('pv_upload') as $key => $filevalue)
                {
                    foreach ($filevalue as $fut => $files)
                    {
                        if ($fut == 's')
                        {
                            // dd($files[0], $promotion_images);
                            if (@$files[0])
                            {
                                $w = round($request->input('w_' . $key . '_1'));
                                $h = round($request->input('h_' . $key . '_1'));
                                $x = round($request->input('x_' . $key . '_1'));
                                $y = round($request->input('y_' . $key . '_1'));
                                if ($w > 0 && $h > 0)
                                {
                                    $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }

                                }
                                else
                                {
                                    $get_filename = $this->saveImage($files[0]);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }
                                }

                                $w = round($request->input('w_' . $key . '_2'));
                                $h = round($request->input('h_' . $key . '_2'));
                                $x = round($request->input('x_' . $key . '_2'));
                                $y = round($request->input('y_' . $key . '_2'));
                                if ($w > 0 && $h > 0)
                                {
                                    $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }

                                }

                                $w = round($request->input('w_' . $key . '_3'));
                                $h = round($request->input('h_' . $key . '_3'));
                                $x = round($request->input('x_' . $key . '_3'));
                                $y = round($request->input('y_' . $key . '_3'));
                                if ($w > 0 && $h > 0)
                                {
                                    $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }

                                }

                                $w = round($request->input('w_' . $key . '_4'));
                                $h = round($request->input('h_' . $key . '_4'));
                                $x = round($request->input('x_' . $key . '_4'));
                                $y = round($request->input('y_' . $key . '_4'));
                                if ($w > 0 && $h > 0)
                                {
                                    $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }

                                }
                            }
                        }
                        else
                        {
                            foreach ($files as $k => $file)
                            {
                                $get_filename = $this->saveImage($file);
                                if ($get_filename)
                                {
                                    $promotion_images[$key][] = $get_filename;
                                }

                            }
                        }
                    }
                }
            }
            // dd($promotion_images);
            if (@$promotion_images[strtolower(@$request->product_option_value[0]) ][0])
            {

                $prd_main = array(
                    'front_view' => $promotion_images[strtolower($request->product_option_value[0]) ][0],
                    'back_view' => @$promotion_images[strtolower($request->product_option_value[0]) ][1],
                    'thrid_view' => @$promotion_images[strtolower($request->product_option_value[0]) ][2],
                    'fourth_view' => @$promotion_images[strtolower($request->product_option_value[0]) ][3],
                );
            }

            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            if (@$promotion_images[strtolower(@$request->product_option_value[0]) ][0])
            {
                $product->product_image = $prd_main; // json_encode($prd_main, JSON_UNESCAPED_SLASHES);
                
            }
            $product->width = $request->product_width;
            $product->height = $request->product_height;
            // $product->tax = 5;
            // $product->status = 1;
            $product->supplier_id = $request->supplier_id[0];
            $product->shipping_cost = $request->shipping_cost;
            $product->updated_by = Auth::user()->id;
            $product->update();

         
            if ($product->id)
            {
                $product_variants = array();
                foreach ($request->pv_name as $pokey => $povalue)
                {
                    $pov_db = DB::table('product_option_values')->where('name', $pokey)->first();
                    $productVar = Product_variant::where('product_id', $product->id)
                        ->where('option_id', $pov_db->product_option_id)
                        ->where('value_id', $pov_db->id)
                        ->first();
                    if ($productVar == null)
                    {
                        if ($pov_db)
                        {
                            $pv_images = array(
                                'front_view' => @$promotion_images[$pokey][0],
                                'back_view' => @$promotion_images[$pokey][1],
                                'thrid_view' => @$promotion_images[$pokey][2],
                                'fourth_view' => @$promotion_images[$pokey][3],
                            );

                            $product_variants[] = array(
                                'product_id' => $product->id,
                                'variant_name' => $povalue,
                                'option_id' => $pov_db->product_option_id,
                                'value_id' => $pov_db->id,
                                'sku' => null,
                                'product_image' => json_encode($pv_images) ,
                                'price' => $request->pv_price[$pokey],
                                'quantites' => $request->pv_quantity[$pokey],
                                'status' => 1,
                                'created_at' => Auth::user()->id,
                                'updated_by' => Auth::user()->id,
                                'created_at' => date('Y-m-d H:i:s') ,
                                'updated_at' => date('Y-m-d H:i:s')
                            );
                        }
                    }
                    else
                    {
                        if (@$promotion_images[$pokey][0])
                        {
                            $pv_images = array(
                                'front_view' => $promotion_images[$pokey][0],
                                'back_view' => @$promotion_images[$pokey][1],
                                'thrid_view' => @$promotion_images[$pokey][2],
                                'fourth_view' => @$promotion_images[$pokey][3],
                            );
                        }
                        $productVar->variant_name = $povalue;
                        if (@$promotion_images[$pokey][0])
                        {
                            $productVar->product_image = $pv_images;
                        }
                        $productVar->price = $request->pv_price[$pokey];
                        $productVar->quantites = $request->pv_quantity[$pokey];
                        $productVar->updated_by = Auth::user()->id;
                        $productVar->update();

                    }
                }
                // dd($product_variants);
                //return response()->json(array('status' => true, 'last_insert_id' => $product->id), 200);
                //return Redirect::to('admin/product_list');
                if ($product_variants)
                {
                    Product_variant::where('product_id', $product->id)
                        ->whereNotIn('value_id', $request->product_option_value)
                        ->delete();
                    DB::table('product_variants')
                        ->insert($product_variants);
                    return response()->json(array(
                        'status' => true
                    ) , 200);
                }
                else
                {
                    return response()
                        ->json(array(
                        'status' => false
                    ) , 200);
                }
            }
            else
            {
                return response()
                    ->json(array(
                    'status' => false
                ) , 200);
            }
        }
    }
    public function product_update_old(Request $request)
    {
        dd($request->all());
        //dd($request->product_id);
        $rules = array(
            'product_name' => 'required|string|min:2|max:50',
            'category_id' => 'required',
            // 'sub_category_id'    => 'required_if:category_id,',
            'supplier_id' => 'required',
            'product_description' => 'required|min:20|max:60',
            'product_width' => 'required',
            'product_height' => 'required',
            'product_option_value' => 'required',
            'pv_name.*' => 'required',
            'pv_price.*' => 'required',
            'pv_quantity.*' => 'required',
            'pv_upload' => 'required|array',
            'pv_upload.*.*' => 'min:1|max:4',
            'pv_upload.*.*.*' => 'image|required|max:10000',
        );
        $messages = array(
            'pv_name.*.required' => 'The product variant name field is required.',
            'pv_price.*.required' => 'The product variant price field is required.',
            'pv_quantity.*.required' => 'The product variant quantity field is required.',
            'pv_upload.*.required' => 'The product variant image field is required.',
            'pv_upload.*.min' => 'The product variant file min 1 is required.',
            'pv_upload.required' => 'The product variant image file is required.',
            'pv_upload.*.max' => 'The product variant file max 4 is allowed.',
            'pv_upload.image' => 'The product variant file must be image only',
        );
        $validator = Validator::make(Input::all() , $rules, $messages);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()
                    ->toArray()
            );
            return response()
                ->json($response);
        }
        else
        {
            $product = Product::where('status', 1)->find($request->input('product_id'));
            if (!$product)
            {
                return response()->json(array(
                    'status' => false
                ) , 200);
            }
            // dd($request->product_option_value[0]);
            if ($request->has('pv_upload'))
            {
                $promotion_images = [];
                foreach ($request->file('pv_upload') as $key => $filevalue)
                {
                    foreach ($filevalue as $fut => $files)
                    {
                        if ($fut == 's')
                        {
                            // dd($files[0], $promotion_images);
                            if (@$files[0])
                            {
                                $w = round($request->input('w_' . $key . '_1'));
                                $h = round($request->input('h_' . $key . '_1'));
                                $x = round($request->input('x_' . $key . '_1'));
                                $y = round($request->input('y_' . $key . '_1'));
                                if ($w > 0 && $h > 0)
                                {
                                    $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }

                                }
                                else
                                {
                                    $get_filename = $this->saveImage($files[0]);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }
                                }

                                $w = round($request->input('w_' . $key . '_2'));
                                $h = round($request->input('h_' . $key . '_2'));
                                $x = round($request->input('x_' . $key . '_2'));
                                $y = round($request->input('y_' . $key . '_2'));
                                if ($w > 0 && $h > 0)
                                {
                                    $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }

                                }

                                $w = round($request->input('w_' . $key . '_3'));
                                $h = round($request->input('h_' . $key . '_3'));
                                $x = round($request->input('x_' . $key . '_3'));
                                $y = round($request->input('y_' . $key . '_3'));
                                if ($w > 0 && $h > 0)
                                {
                                    $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }

                                }

                                $w = round($request->input('w_' . $key . '_4'));
                                $h = round($request->input('h_' . $key . '_4'));
                                $x = round($request->input('x_' . $key . '_4'));
                                $y = round($request->input('y_' . $key . '_4'));
                                if ($w > 0 && $h > 0)
                                {
                                    $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                    if ($get_filename)
                                    {
                                        $promotion_images[$key][] = $get_filename;
                                    }

                                }
                            }
                        }
                        else
                        {
                            foreach ($files as $k => $file)
                            {
                                $get_filename = $this->saveImage($file);
                                if ($get_filename)
                                {
                                    $promotion_images[$key][] = $get_filename;
                                }

                            }
                        }
                    }
                }
            }
            // dd($promotion_images);
            if (@$promotion_images[strtolower(@$request->product_option_value[0]) ][0])
            {

                $prd_main = array(
                    'front_view' => $promotion_images[strtolower($request->product_option_value[0]) ][0],
                    'back_view' => @$promotion_images[strtolower($request->product_option_value[0]) ][1],
                    'thrid_view' => @$promotion_images[strtolower($request->product_option_value[0]) ][2],
                    'fourth_view' => @$promotion_images[strtolower($request->product_option_value[0]) ][3],
                );
            }

            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;
            if (@$promotion_images[strtolower(@$request->product_option_value[0]) ][0])
            {
                $product->product_image = $prd_main; // json_encode($prd_main, JSON_UNESCAPED_SLASHES);
                
            }
            $product->width = $request->product_width;
            $product->height = $request->product_height;
            // $product->tax = 5;
            // $product->status = 1;
            $product->supplier_id = $request->supplier_id;
            $product->shipping_cost = $request->shipping_cost;
            $product->updated_by = Auth::user()->id;
            $product->update();
            if ($product->id)
            {
                $product_variants = array();
                foreach ($request->pv_name as $pokey => $povalue)
                {
                    $pov_db = DB::table('product_option_values')->where('name', $pokey)->first();
                    $productVar = Product_variant::where('product_id', $product->id)
                        ->where('option_id', $pov_db->product_option_id)
                        ->where('value_id', $pov_db->id)
                        ->first();
                    if ($productVar == null)
                    {
                        if ($pov_db)
                        {
                            $pv_images = array(
                                'front_view' => @$promotion_images[$pokey][0],
                                'back_view' => @$promotion_images[$pokey][1],
                                'thrid_view' => @$promotion_images[$pokey][2],
                                'fourth_view' => @$promotion_images[$pokey][3],
                            );
                            $product_variants[] = array(
                                'product_id' => $product->id,
                                'variant_name' => $povalue,
                                'option_id' => $pov_db->product_option_id,
                                'value_id' => $pov_db->id,
                                'sku' => null,
                                'product_image' => json_encode($pv_images) ,
                                'price' => $request->pv_price[$pokey],
                                'quantites' => $request->pv_quantity[$pokey],
                                'status' => 1,
                                'created_at' => Auth::user()->id,
                                'updated_by' => Auth::user()->id,
                                'created_at' => date('Y-m-d H:i:s') ,
                                'updated_at' => date('Y-m-d H:i:s')
                            );
                        }
                    }
                    else
                    {
                        if (@$promotion_images[$pokey][0])
                        {
                            $pv_images = array(
                                'front_view' => $promotion_images[$pokey][0],
                                'back_view' => @$promotion_images[$pokey][1],
                                'thrid_view' => @$promotion_images[$pokey][2],
                                'fourth_view' => @$promotion_images[$pokey][3],
                            );
                        }
                        $productVar->variant_name = $povalue;
                        if (@$promotion_images[$pokey][0])
                        {
                            $productVar->product_image = $pv_images;
                        }
                        $productVar->price = $request->pv_price[$pokey];
                        $productVar->quantites = $request->pv_quantity[$pokey];
                        $productVar->updated_by = Auth::user()->id;
                        $productVar->update();

                    }
                }
                // dd($product_variants);
                //return response()->json(array('status' => true, 'last_insert_id' => $product->id), 200);
                //return Redirect::to('admin/product_list');
                if ($product_variants)
                {
                    Product_variant::where('product_id', $product->id)
                        ->whereNotIn('value_id', $request->product_option_value)
                        ->delete();
                    DB::table('product_variants')
                        ->insert($product_variants);
                    return response()->json(array(
                        'status' => true
                    ) , 200);
                }
                else
                {
                    return response()
                        ->json(array(
                        'status' => false
                    ) , 200);
                }
            }
            else
            {
                return response()
                    ->json(array(
                    'status' => false
                ) , 200);
            }
        }
    }

    public function pvUpdate(Request $request)
    {

        $this->validate($request, ['product_variant_id' => 'required|exists:product_variants,id', 'pv_name' => 'required',  'product_variant_ref_no' => 'required', 'pv_price' => 'required', 'pv_quantity' => 'required',
        // 'pv_upload'    => 'required|array',
        'pv_upload.*.*' => 'min:1|max:4', 'pv_upload.*.*.*' => 'required|max:10000',

        ]);

        // dd($request->all());
        $delete_image = DB::table('product_images')->where('product_variant_id', $request->product_variant_id)
            ->delete();

        $pvd = Product_variant::where('id', $request->product_variant_id)
            ->first();

        $promotion_images = [];

        if ($request->has('pv_upload'))
        {
            foreach ($request->file('pv_upload') as $key => $filevalue)
            {
                foreach ($filevalue as $fut => $files)
                {
                    if ($fut == 's')
                    {
                        // dd($files[0], $promotion_images);
                        if (@$files[0])
                        {
                            $w = round($request->input('w_' . $key . '_1'));
                            $h = round($request->input('h_' . $key . '_1'));
                            $x = round($request->input('x_' . $key . '_1'));
                            $y = round($request->input('y_' . $key . '_1'));
                            if ($w > 0 && $h > 0)
                            {
                                $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                if ($get_filename)
                                {
                                    $promotion_images[$key][] = $get_filename;
                                }

                            }
                            else
                            {
                                $get_filename = $this->saveImage($files[0]);
                                if ($get_filename)
                                {
                                    $promotion_images[$key][] = $get_filename;
                                }
                            }

                            $w = round($request->input('w_' . $key . '_2'));
                            $h = round($request->input('h_' . $key . '_2'));
                            $x = round($request->input('x_' . $key . '_2'));
                            $y = round($request->input('y_' . $key . '_2'));
                            if ($w > 0 && $h > 0)
                            {
                                $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                if ($get_filename)
                                {
                                    $promotion_images[$key][] = $get_filename;
                                }

                            }

                            $w = round($request->input('w_' . $key . '_3'));
                            $h = round($request->input('h_' . $key . '_3'));
                            $x = round($request->input('x_' . $key . '_3'));
                            $y = round($request->input('y_' . $key . '_3'));
                            if ($w > 0 && $h > 0)
                            {
                                $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                if ($get_filename)
                                {
                                    $promotion_images[$key][] = $get_filename;
                                }

                            }

                            $w = round($request->input('w_' . $key . '_4'));
                            $h = round($request->input('h_' . $key . '_4'));
                            $x = round($request->input('x_' . $key . '_4'));
                            $y = round($request->input('y_' . $key . '_4'));
                            if ($w > 0 && $h > 0)
                            {
                                $get_filename = $this->cropImage($files[0], $w, $h, $x, $y);
                                if ($get_filename)
                                {
                                    $promotion_images[$key][] = $get_filename;
                                }

                            }
                        }
                    }
                    else
                    {
                        foreach ($files as $k => $file)
                        {
                            $get_filename = $this->saveImage($file);
                            if ($get_filename)
                            {
                                $promotion_images[$key][] = $get_filename;
                            }

                        }
                    }
                }
            }
        }
        // dd($promotion_images);
        $po_db = DB::table('product_options')->get();
        $req_pov = array();
        foreach ($po_db as $po_list)
        {
            $req_pov[] = @$request->input('product_option_value_' . $po_list->id);

        }
        // Updating the product variant
        $pvd->variant_name = $request->pv_name;
        $pvd->product_variant_ref_no = $request->product_variant_ref_no;
        $pvd->attributes = json_encode($req_pov);
        $pvd->price = $request->pv_price;
        if ($request->pv_quantity == 'u')
        {
            $pvd->quantites = null;
        }
        else
        {
            $pvd->quantites = $request->pv_quantity;
        }
        $pvd->updated_by = Auth::user()->id;
        $pvd->update(); 

        if (!empty($promotion_images[1]))
        {

            // DB::table('product_images')->where('product_id', $pvd->product_id)->delete();
            $pv_images = array(
                $promotion_images[1][0],
                @$promotion_images[1][1],
                @$promotion_images[1][2],
                @$promotion_images[1][3],
            );

            // dd($pv_images);
            foreach ($pv_images as $pvi_list)
            {
                if ($pvi_list)
                {
                    $product_variant_images[] = array(
                        'id' => Str::random(32) ,
                        'product_id' => $pvd->product_id,
                        'product_variant_id' => $pvd->id,
                        'image' => $pvi_list,
                        'status' => 1,
                        'sort' => 1,
                        'created_at' => date('Y-m-d H:i:s') ,
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                }

            }
            DB::table('product_images')->insert($product_variant_images);
        }

        return redirect()->route('admin.product_list')
            ->with('success', 'Product variant updated successfully');

    }

    public function product_variant_update($product_id, $returnedRequestUpdate)
    {
        $update_array_limit = count($returnedRequestUpdate->product_variant_id);
        for ($i = 0;$i < $update_array_limit;$i++)
        {
            if ($returnedRequestUpdate->has('product_variant_image' . $i))
            {
                //dd($returnedRequestUpdate->input('product_variant_size1'));
                $promotion_images = [];
                foreach ($returnedRequestUpdate->file('product_variant_image' . $i) as $key => $file)
                {
                    //dd($key);
                    $new_name = rand() . '.' . $file->getClientOriginalExtension();
                    $img = Image::make($file->getRealPath());
                    $org_img = Image::make($file->getRealPath());
                    $destinationPath = public_path('portal/img/product');
                    $thumbPath = public_path('portal/img/product/thumbimages');
                    if (!File::isDirectory($destinationPath))
                    {
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    if (!File::isDirectory($thumbPath))
                    {
                        File::makeDirectory($thumbPath, 0777, true, true);
                    }

                    //create small thumbnail
                    $img->resize(150, 150, function ($constraint)
                    {
                        $constraint->aspectRatio();
                    })
                        ->save($thumbPath . '/' . $new_name);
                    $org_img->save($destinationPath . '/' . $new_name);
 
                    if ($new_name) $promotion_images[$key] = $new_name;                     
                }
            }

            $Product_variant_table = Product_variant::find($returnedRequestUpdate->input('product_variant_id_update' . $i));
            if ($Product_variant_table)
            {
                $Product_variant_table->product_colour = $returnedRequestUpdate->input('product_variant_colour' . $i);
                $Product_variant_table->product_size = $returnedRequestUpdate->input('product_variant_size' . $i);
                $Product_variant_table->variant_price = $returnedRequestUpdate->input('product_variant_price' . $i);
                if ($returnedRequestUpdate->has('product_variant_image' . $i))
                {
                    $Product_variant_table->product_image = $promotion_images;
                }
                $Product_variant_table->save();
            }

        }
        //dd($returnedRequestUpdate->append_field_count);
        return response()
            ->json(array(
            'status' => true
        ) , 200);

    }
    public function product_variant_update_add_new($product_id, $returnedRequestUpdateNew)
    {
        //dd($product_id);
        //dd($returnedRequestUpdateNew->append_field_count);
        $field_limit = $returnedRequestUpdateNew->input('append_field_count');
        $check = [];
        for ($i = 2;$i <= $field_limit;$i++)
        {
            $promotion_images = [];
            if ($returnedRequestUpdateNew->has('product_image_variant' . $i))
            {

                foreach ($returnedRequestUpdateNew->file('product_image_variant' . $i) as $key => $file)
                {
                    //dd($key);
                    $new_name = rand() . '.' . $file->getClientOriginalExtension();
                    $img = Image::make($file->getRealPath());
                    $org_img = Image::make($file->getRealPath());
                    $destinationPath = public_path('portal/img/product');
                    $thumbPath = public_path('portal/img/product/thumbimages');
                    if (!File::isDirectory($destinationPath))
                    {
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    if (!File::isDirectory($thumbPath))
                    {
                        File::makeDirectory($thumbPath, 0777, true, true);
                    }

                    //create small thumbnail
                    $img->resize(150, 150, function ($constraint)
                    {
                        $constraint->aspectRatio();
                    })
                        ->save($thumbPath . '/' . $new_name);
                    $org_img->save($destinationPath . '/' . $new_name);
 
                    if ($new_name) $promotion_images[$key] = $new_name;
                    //array_push($promotion_images, $new_name);
                    
                }
            }

            $product_variant = new Product_variant;
            $product_variant->product_id = $product_id;
            $product_variant->product_size = $returnedRequestUpdateNew->input('product_variant_size' . $i);
            $product_variant->product_image = $promotion_images;
            $product_variant->product_colour = $returnedRequestUpdateNew->input('favcolor' . $i);
            $product_variant->variant_price = $returnedRequestUpdateNew->input('variant_price' . $i);
            $product_variant->save();

        }

        return response()
            ->json(array(
            'status' => true
        ) , 200);
    }

    public function product_name_check($product_name)
    {
        $product_values_array = ['product_name' => $product_name, ];
        $rules = array(
            'product_name' => 'required|min:2|max:50|unique:products',
        );
        $validator = Validator::make($product_values_array, $rules);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()
                    ->toArray()
            );
            return response()
                ->json($response);
        }
        else
        {
            $response = array(
                'status' => true,
            );
            return response()->json($response);
        }

    } 
    public function attributeCheck()
    { 
        $size =request('size');
        $product_id =request('product_id');
        $color =request('color'); 
        $rqtattri=array($size,$color); 
        $product_variant=Product_variant::where('product_id',$product_id)->get();
        $i=0;
        foreach ($product_variant as $key => $variant) { 
            $decode_attri=json_decode($variant->attributes);
            if($decode_attri[0] == $size && $decode_attri[1] == $color ){
                $i++; 
            } 
        }   
         $status=false; 
        if($i!=0){ 
            $status=true;
        } 
        
        $response = array(
            'status' => $status, 
        );
        return response()->json($response);       
    }


    public function product_name_check_update($product_name, $product_id)
    {
        $product_values_array = ['product_name' => $product_name, ];
        $rules = array(
            'product_name' => 'required|min:2|max:50|unique:products,product_name,' . $product_id,
        );
        $validator = Validator::make($product_values_array, $rules);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()
                    ->toArray()
            );
            return response()
                ->json($response);
        }
        else
        {
            $response = array(
                'status' => true,
            );
            return response()->json($response);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->userId;
        Product::find($id)->delete();
        return redirect()
            ->route('admin.product_list')
            ->with('success', 'Product deleted successfully');
    }

    public function pvdestroy(Request $request)
    {
        $id = $request->userId;
        DB::table('product_images')
            ->where('product_variant_id', $id)->delete();
        Product_variant::find($id)->delete();
        return redirect()
            ->route('admin.product_list')
            ->with('success', 'Deleted successfully');
    }

    public function review_list(Request $request)
    {

        if ($request->ajax())
        {

            if ($request->status_filter == 3)
            {
                $data = DB::table('reviews')->join('merchandise_products', 'reviews.product_id', '=', 'merchandise_products.id')
                    ->select('reviews.id', 'reviews.product_review', 'reviews.product_rating', 'reviews.review_status', 'merchandise_products.merchandise_product_name', 'reviews.updated_at', 'merchandise_products.id as productId')
                //->where('reviews.review_status', $request->status_filter)
                
                    ->get();
            }
            else
            {
                $data = DB::table('reviews')->join('merchandise_products', 'reviews.product_id', '=', 'merchandise_products.id')
                    ->select('reviews.id', 'reviews.product_review', 'reviews.product_rating', 'reviews.review_status', 'merchandise_products.merchandise_product_name', 'reviews.updated_at', 'merchandise_products.id as productId')
                    ->where('reviews.review_status', $request->status_filter)
                    ->get();
            }

            return Datatables::of($data)->addIndexColumn()->addColumn('date', function ($row)
            {

                $date = "<a href='/product_detail/" . $row->productId . "'>" . $row->merchandise_product_name . "</a>";

                return $date;

            })->addColumn('action', function ($row)
            {

                // $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm edit_button">Edit</a>';
                $btn = ' <a href="javascript:void(0)" onclick="ShowModal(this)" data-original-title="Delete" class="btn btn-primary btn-sm view_button" data-review="' . $row->product_review . '" data-name="' . $row->merchandise_product_name . '" data-rating = "' . $row->product_rating . '" data-status = "' . $row->review_status . '" data-reviewId = "' . $row->id . '">View</a>';
                //$btn = $btn.' ';
                return $btn;
            })->rawColumns(['action', 'date'])
                ->make(true);
        }

        return view('portal/review_portal_list');
    }

    public function review_update_data(Request $request)
    {
        //dd($request->review_filter);
        Review::where('id', $request->review_id)
            ->update(['review_status' => $request->review_filter]);
        $response = array(
            'status' => true,
        );
        return response()->json($response);
    }

    public function print_type_list(Request $request)
    {

        if ($request->ajax())
        {
             
            $data = Print_types::all()->where('status', '1')
                ->sortBy('id');
            return Datatables::of($data)->addIndexColumn()->addColumn('date', function ($row)
            {

                $date = date('d-m-Y', strtotime($row->updated_at));

                return $date;

            })->addColumn('action', function ($row)
            {

                $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm edit_button" id="dd" data-id="' . $row->id . '" data-value="' . $row->print_type_name . '" onClick="ShowModal(this)">Edit</a>';
                $btn = $btn . ' <a href="javascript:void(0)" onclick="removeId(' . $row->id . ')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
                //$btn = $btn.' ';
                return $btn;
            })->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('portal/print_type_list');
    }
    public function print_type_list_post(Request $request)
    {
        if ($request->table_id == 0)
        {
            $rules = array(
                'print_type_name' => 'required|unique:print_types,print_type_name,' . $request->table_id
            );
        }
        else
        {
            $rules = array(
                'print_type_name' => 'required|unique:print_types'
            );
        }

        $rules = array(
            'print_type_name' => 'required|unique:print_types,print_type_name,' . $request->table_id
        ); 
        $validator = Validator::make(Input::all() , $rules);
 
        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()
                    ->toArray()

            ) , 200);  
        }
        if ($request->table_id == 0)
        {
            $user = new Print_types;
            $user->print_type_name = $request->print_type_name;
            $user->status = 1;
            if ($user->save())
            {
                $response = array(
                    'status' => true,
                    'insert_id' => $user->id
                );
                return response()
                    ->json($response);
            }

        }
        else
        {
            Print_types::where('id', $request->table_id)
                ->update(['print_type_name' => $request->print_type_name]);

            $response = array(
                'status' => true,
                'insert_id' => $request->table_id
            );
            return response()
                ->json($response);

        }

    }
    public function print_type_delete(Request $request)
    {
        $id = $request->date;
        Print_types::where('id', $id)->update(['status' => 0]);
        $response = array(
            'status' => true,
        );
        return response()->json($response);
    }
    public function print_type_get()
    {
        $data = Print_types::all()->where('status', '1')
            ->sortBy('id');
        $response = array(
            'status' => true,
            'data' => $data
        );
        return response()->json($response);

    }
    public function banner_list()
    {
        return view('portal/banner_image_list');
    }
    public function banner_image_get(Request $request)
    {
        if ($request->ajax())
        {
             
            $data = Banner::all()->where('status', '!=', '0')
                ->sortBy('id');
            return Datatables::of($data)->addIndexColumn()->addColumn('image', function ($row)
            {

                if (@$row->image_file_name)
                {
                    $path = asset('/banner_image/' . $row->image_file_name);
                }
                else
                {
                    $path = asset('images/thanks.png');
                }

                $img = '<img src="' . $path . '" height="32px" width="32px" class="cms-image"/>';

                return $img;
            })->addColumn('action', function ($row)
            {

                // $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm edit_button" id="dd" data-id="'.$row->id.'" data-value="'.$row->print_type_name.'" onClick="ShowModal(this)">Edit</a>';
                $btn = ' <a href="javascript:void(0)"  data-original-title="Delete"
         data-id="' . $row->id . '" class="btn btn-danger btn-sm delete_func">Delete</a>';
                //$btn = $btn.' ';
                return $btn;
            })->rawColumns(['action', 'image'])
                ->make(true);
        }
    }
    public function image_save(Request $request)
    {
        $rules = array(
            'image_name' => ['required'],
            'type_name' => ['required'],
            'banner_image' => ['required']
        );
        $validator = Validator::make(Input::all() , $rules);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()
                    ->toArray()
            );
            return response()
                ->json($response);
        }
        else
        {
            $banner = new Banner;
            $banner->name = trim($request->image_name);
            $image = $request->file('banner_image');
            if ($request->hasfile('banner_image'))
            {
                $file_name = rand() . '.' . $image->getClientOriginalExtension();
                $img = Image::make($image->getRealPath());
                $org_img = Image::make($image->getRealPath());
                $destinationPath = public_path('banner_image');
                if (!File::isDirectory($destinationPath))
                {
                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $org_img->save($destinationPath . '/' . $file_name);

                if (File::exists($destinationPath))
                {
                    File::delete($destinationPath);
                }

                $banner->image_file_name = $file_name;
                $banner->status = $request->type_name;
            }
            $banner->save();
            $response = array(
                'status' => true,
                'id' => $banner->id,
                'message' => 'Banner image successfuly uploaded'
            );
            return response()
                ->json($response);
        }
    }
    public function image_status_update(Request $request)
    {

        $banner = Banner::find($request->id);
        if ($banner)
        {
            $banner->status = 0;
            $banner->save();
        }
        $response = array(
            'status' => true,
            'id' => $banner->id,
            'message' => 'Banner image successfuly uploaded'
        );
        return response()
            ->json($response);
    }
    public function product_new_variant_save(Request $request)
    {

        $rules = array(
            // 'sub_category_id'    => 'required_if:category_id,',
            'pv_name.*' => 'required',
            'pv_price.*' => 'required',
            'pv_quantity.*' => 'required',
            'pv_upload' => 'required|array',
            'pv_upload.*.*' => 'min:1|max:4',
            // 'pv_upload.*.m'    => 'required_if:pv_upload.*.s, null,min:1|max:4',
            // 'pv_upload.*.s'    => 'required_if:pv_upload.*.m, null,min:1|max:4',
            'pv_upload.*.*.*' => 'required|max:10000',
        );
        $messages = array(
            'pv_name.*.required' => 'The product variant name field is required.',
            'pv_price.*.required' => 'The product variant price field is required.',
            'pv_quantity.*.required' => 'The product variant quantity field is required.',
            'pv_upload.*.required' => 'The product variant image field is required.',
            'pv_upload.*.min' => 'The product variant file min 1 is required.',
            'pv_upload.required' => 'The product variant image file is required.',
            'pv_upload.*.max' => 'The product variant file max 4 is allowed.',
            'pv_upload.image' => 'The product variant file must be image only',
        );
        $validator = Validator::make(Input::all() , $rules, $messages);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()
                    ->toArray()
            );
            return response()
                ->json($response);
        }

        else
        {
            foreach ($request->pv_name as $pokey => $povalue)
            {
                $i = 2;
                $attr_key = $pokey - 1;
                $prd_attri = array(
                    $request->product_option_value_1_1[0],
                    $request->product_option_value_2_1[0]
                );
                //dd($prd_attri);
                $pv_images = array(
                    @$promotion_images[$pokey][0],
                    @$promotion_images[$pokey][1],
                    @$promotion_images[$pokey][2],
                    @$promotion_images[$pokey][3],
                );
                
                $pvariant = new Product_variant();

                $pvariant->product_id = $request->product_id;
                $pvariant->variant_name = $povalue;
                $pvariant->option_id = null;
                $pvariant->value_id = null;
                $pvariant->sku = null;
                $pvariant->attributes = json_encode($prd_attri);
                $pvariant->product_image = null;
                $pvariant->price = $request->pv_price[$pokey];
                $pvariant->quantites = $request->pv_quantity[$pokey];
                $pvariant->print_type = serialize($request->print_type_print_name);
                $pvariant->print_price = serialize($request->print_type_price_name);
                $pvariant->status = 1;
                $pvariant->created_by = Auth::user()->id;
                $pvariant->updated_by = Auth::user()->id;
                $pvariant->save();

                $promotion_images = [];
                //dd($request->file('pv_upload'));
                foreach ($request->file('pv_upload') as $key => $file)
                {
                    //dd($key);
                    $filename = rand() . '.' . $file->getClientOriginalExtension();
                    $new_name[] = $filename;
                    $img = Image::make($file->getRealPath());
                    $org_img = Image::make($file->getRealPath());
                    $destinationPath = public_path('portal/img/product');

                    if (!File::isDirectory($destinationPath))
                    {
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $org_img->save($destinationPath . '/' . $filename);
                }

                if ($pvariant->id)
                {
                    $x = 0;
                    foreach ($request->file('pv_upload') as $pvi_list)
                    {
                        if ($pvi_list)
                        {
                            $product_variant_images[] = array(
                                'id' => Str::random(32) ,
                                'product_id' => $request->product_id,
                                'product_variant_id' => $pvariant->id,
                                'image' => $new_name[$x],
                                'status' => 1,
                                'created_at' => date('Y-m-d H:i:s') ,
                                'updated_at' => date('Y-m-d H:i:s')
                            );
                        }
                        $x++;
                    }
                }
            }

            // DB::table('product_variants')->insert($product_variant);
            DB::table('product_images')->insert($product_variant_images);
            //dd($product_variant_images);
            //return response()->json(array('status' => true, 'last_insert_id' => $product->id), 200);
            //return Redirect::to('admin/product_list');
            return response()->json(array(
                'status' => true
            ) , 200);
        }

    }

}

