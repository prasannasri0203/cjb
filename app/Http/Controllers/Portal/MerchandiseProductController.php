<?php

namespace App\Http\Controllers\Portal;

use DB;
use App\MerchandiseProduct;
use Illuminate\Http\Request;
use yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

// use App\Categories;
// use App\Supplier;
// use App\Product;
// use App\Product_variant;

class MerchandiseProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::table('merchandise_products as mp')->select('mp.id', 'p.product_name')->join('products as p','p.id' ,'=', 'mp.product_id')->where('mp.status','1')->where('p.status','0')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="./product/'.$row->id.'/view" class="btn btn-info btn-sm">View</a>';
                           //$btn = $btn.' ';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('portal/merchandise_product_list');        
    }

    public function view($id)
    {

        $data = DB::table('merchandise_products as mp')->select('mp.id', 'p.product_name', 'p.product_description', 'p.product_colour', 'p.product_size', 'p.price', 'mp.image')->join('products as p','p.id' ,'=', 'mp.product_id')->where('mp.status','1')->where('p.status','0')->where('mp.id', $id)->first();

        return view('portal.merchandise_product_view' , compact('data'));    


    }
}
