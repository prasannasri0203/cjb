<?php
namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Categories;
use App\Supplier;
use App\Product;
use App\Product_variant;
use App\ProductSupplier;

class ProductsImport implements WithHeadingRow, ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $unInsertedProductNumber = [];
        $insertedProductNumber = []; 
        $unInsertedproduct = [];

        $unInsertedTrackingNumber = [];
        $insertedTrackingNumber = [];
        $unInsertedShipping = [];
        $insertedShipping = [];
        $message = '';

        if ($rows->count() > 0)
        {
            foreach ($rows as $key => $value)
            {  
                if ($value['supplier_mail'] != null && $value['supplier_mail'] != '')
                {
                    if ($value['category'] != null && $value['category'] != '')
                    {
                        if ($value['product_name'] != null && $value['product_name'] != '')
                        {                         	
                            if ($value['reference_number'] != null && $value['reference_number'] != '')
                            {                            	
                                if ($value['variant_name'] != null && $value['variant_name'] != '')
                                {
                                    if ($value['variant_qty'] != null && $value['variant_qty'] != '')
                                    {
                                        if ($value['variant_price'] != null && $value['variant_price'] != '')
                                        {
                                            if ($value['attri_color'] != null && $value['attri_color'] != '')
                                            {
                                                if ($value['attri_size'] != null && $value['attri_size'] != '')
                                                {                                                 	
                                                	$chk_supplier = Supplier::where('email','=',trim($value['supplier_mail']))->first();  
                                                		if ($chk_supplier)
                                                        {
                                                            $sup_id = $chk_supplier->id; 
                                                            $valvar_ref_no=[];
                                                            $valsize=[];
                                                            $valcolor=[];
                                                            
                                                            $valvar_ref_no = explode(",", $value['product_variant_ref_no']);
                                                            $val_var_ref_no = json_encode($valvar_ref_no); 

                                                            $valsize = explode(",", $value['attri_size']);
                                                            $val_size = json_encode($valsize);

                                                            $valcolor = explode(",", $value['attri_color']);
                                                            $val_color = json_encode($valcolor);
                                                            $chk_category = Categories::where('category_name', '=', trim($value['category']))->first();
                                                            if ($chk_category)
                                                            {
                                                                $cat_id = $chk_category->id;
                                                            }
                                                            else
                                                            {
                                                                $category = new Categories;
                                                                $category->category_name = trim($value['category']);
                                                                $category->size_val = $val_size;
                                                                $category->color_val = $val_color;
                                                                $category->save();
                                                                $cat_id = $category->id;
                                                            }

                                                            if ($value['sub_category'] != '')
                                                            {
                                                                $chk_sub_category = Categories::where('category_name', '=', trim($value['sub_category']))->where('parent_id', '=', $cat_id)
                                                                    ->first();
                                                                if ($chk_sub_category)
                                                                {
                                                                    $sub_cat_id = $chk_sub_category->id;
                                                                }
                                                                else
                                                                {
                                                                    $sub_category = new Categories;
                                                                    $sub_category->parent_id = $cat_id;
                                                                    $sub_category->category_name = trim($value['sub_category']);
                                                                    $sub_category->size_val = $val_size;
                                                                    $sub_category->color_val = $val_color;
                                                                    $sub_category->save();
                                                                    $sub_cat_id = $sub_category->id;
                                                                }
                                                            }
                                                            else
                                                            {
                                                                $sub_cat_id = '';
                                                            }
                                                            $dimension = $value['dimension_add'];
                                                            if ($dimension == 'Rectangle')
                                                            {
                                                                $x = 400;
                                                                $y = 200;
                                                            }
                                                            if ($dimension == 'Horizontal')
                                                            {
                                                                $x = 600;
                                                                $y = 400;
                                                            }
                                                            if ($dimension == 'Vertical')
                                                            {
                                                                $x = 300;
                                                                $y = 500;
                                                            }
                                                            if ($dimension == 'Square')
                                                            {
                                                                $x = 500;
                                                                $y = 500;
                                                            }
                                                            $product = new Product;
                                                            $product->category_id = $cat_id;
                                                            $product->sub_category_id = $sub_cat_id;
                                                            $product->supplier_id = $sup_id;
                                                            $product->product_name = trim($value['product_name']);
                                                            $product->product_description = trim($value['product_description']);
                                                            $product->reference_number = $value['reference_number'];
                                                            $product->tax = 5;
                                                            $product->status = 1;
                                                            $product->updated_by = 1;
                                                            $product->created_by = 1;
                                                            $product->width = $y;
                                                            $product->height = $x;
                                                            $product->print_type = 'N;';
                                                            $product->print_price = 'N;';
                                                            $product->save();

                                                            $pro_sup=new ProductSupplier;
                                                            $pro_sup->supplier_id = $sup_id;
                                                            $pro_sup->product_id = $product->id; 
                                                            $pro_sup->save();

                                                            $attri = [];
                                                            if ($product->id)
                                                            {
                                                                foreach ($valcolor as $key => $color)
                                                                {
                                                                    foreach ($valsize as $key => $size)
                                                                    {
                                                                        $attri = array(
                                                                            $size,
                                                                            $color
                                                                        );
                                                                        $val_ref_no=0;
                                                                        if(isset($valvar_ref_no[$key])){
                                                                        	   $val_ref_no=$valvar_ref_no[$key];
		                                                                        if($val_ref_no){
		                                                                        	$val_ref_no=$val_ref_no;
		                                                                        }else{
		                                                                        	$val_ref_no=0;
		                                                                        }  
                                                                        }
                                                                     
                                                                        if ($product->id) // $product->id
                                                                        
                                                                        {
                                                                            $pvariant = new Product_variant();
                                                                            $pvariant->product_id = $product->id;
                                                                            $pvariant->product_variant_ref_no = $val_ref_no;
                                                                            $pvariant->variant_name = trim($value['variant_name']);
                                                                            $pvariant->option_id = null;
                                                                            $pvariant->value_id = null;
                                                                            $pvariant->sku = null;
                                                                            $pvariant->attributes = json_encode($attri);
                                                                            $pvariant->product_image = null;
                                                                            $pvariant->price = trim($value['variant_price']);
                                                                            if ($value['variant_qty'] == 'u')
                                                                            {
                                                                                $pvariant->quantites = null;
                                                                            }
                                                                            else
                                                                            {
                                                                                $pvariant->quantites = $value['variant_qty'];
                                                                            }
                                                                            $pvariant->print_type = 'N;';
                                                                            $pvariant->print_price = 'N;';
                                                                            $pvariant->status = 1;
                                                                            $pvariant->created_by = 1;
                                                                            $pvariant->updated_by = 1;
                                                                            $pvariant->save();
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                             	if ($product->id && $pvariant->id)
		                                                        {
		                                                            $insertedProductNumber[] = $value['sno'];
		                                                        }
		                                                        else
		                                                        { 
		                                                            $unInsertedproduct[] = $value['sno'];
		                                                             
		                                                        }
                                                        }else{

                                                        	 $unInsertedproduct[] =  'Row ' . ((int) $key + (int)1) . ' - ' .$value['sno']. ' : Supplier Mail Not Stored';
                                                        }

                                                }
                                                else
                                                {
                                                    $unInsertedProductNumber[] = 'Row ' . ((int)$key + (int)1) . ' - attritude size Method Empty';
                                                }
                                            }
                                            else
                                            {
                                                $unInsertedProductNumber[] = 'Row ' . ((int)$key + (int)1) . ' - attritude color Method Empty';
                                            }
                                        }
                                        else
                                        {
                                            $unInsertedProductNumber[] = 'Row ' . ((int)$key + (int)1) . ' - Price Method Empty';
                                        } 
                                }
                                else
                                {
                                    $unInsertedProductNumber[] = 'Row ' . ((int)$key + (int)1) . ' - Quantity Method Empty';
                                }
                            }
                            else
                            {
                                $unInsertedProductNumber[] = 'Row ' . ((int)$key + (int)1) . ' - Variant Name Method Empty';
                            }
                        }
                        else
                        {
                            $unInsertedProductNumber[] = 'Row ' . ((int)$key + (int)1) . ' - Reference Number Method Empty';
                        }
                    }
                    else
                    {
                        $unInsertedProductNumber[] = 'Row ' . ((int)$key + (int)1) . ' - Product Name Method Empty';
                    }
                }
                else
                {
                    $unInsertedProductNumber[] = 'Row ' . ((int)$key + (int)1) . ' - Category Method Empty';
                }
            }
            else
            {
                $unInsertedProductNumber[] = 'Row ' . ((int)$key + (int)1) . ' - Supplier mail, subject, message) Method Empty';
            }
        }
    }
    else
    {
        $message = "No Records Found in Uploaded File";
    }

    if ($message == '')
    {
        if (count($unInsertedProductNumber))
        {
            $msg = array(
                'status' => 'success',
                'message' => 'Data Imported, If error Check error Report',
                'inserted_records' => $insertedProductNumber, 
                'un_inserted_records' => $unInsertedProductNumber,
                'un_inserted_supplier' => $unInsertedproduct
            );
        }
        else
        {
            $msg = array(
                'status' => 'success',
                'message' => 'Data Imported Sucessfully',
                'inserted_records' => $insertedProductNumber,
                'un_inserted_records' => $unInsertedProductNumber,
                'un_inserted_supplier' => $unInsertedproduct
            );
        }
        $this->data = $msg;
    }
    else
    {
        $msg = array(
            'status' => 'error',
            'message' => $message,
            'inserted_records' => $insertedProductNumber,
            'un_inserted_records' => $unInsertedProductNumber,
            'un_inserted_supplier' => $unInsertedproduct
        );
        $this->data = $msg;
    }

} 

}

