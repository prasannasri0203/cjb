<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\PresetCollection;
use App\Product;
use yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\Model;


class CollectionController extends Controller
{
	public function index(Request $request){ 
         if ($request->ajax()) {
            $data = PresetCollection::withCount('collection')
						// ->where('id','!=',1)
						->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="collection_edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'" onclick="setId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
                        //    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="setId('{{$collection->id}}')">Delete</a>  

                           //$btn = $btn.' ';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
     	         return view('portal.collection.list');

	}


    public function collection_datatable_status_update($id)
    {
        //dd($id);
        $update_product= PresetCollection::where('id',$id)->update(['status' => '0']);
        if($update_product)
        {
            return response()->json(['success'=>'Product deleted successfully.']);
        }
        else
        {
            return response()->json(['success'=>'No deleted.']);
        }
    }
 
    public function create()
    {
    	$products = Product::where('status', 1)->get();
    	$data = [];
    	return view('portal.collection.create',compact('products','data'));
    }
 
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'collection_name' => 'required|regex:/^[a-zA-Z\s]*$/',
    		'products' => 'required',
        ]);
    	$collection = new PresetCollection;
        $collection->collection_name = $request->collection_name;
    	$collection->save();
    	$collection->collections()->attach($request->products);
        return redirect()->route('admin.collection.index')
        ->with('success','Collection created successfully');
    }
 
    public function edit($id)
    {
        $id = $id;
        // dd($id);
    	$products = Product::where('status', 1)->get();
        $data = PresetCollection::with('collections')->find($id);
    //    dd($data); 
    	return view('portal.collection.create',compact('products','data'));
    }
   
    public function update(Request $request)
    {
    	$this->validate($request, [
    		'collection_name' => 'required|regex:/^[a-zA-Z\s]*$/',
    		'products' => 'required',
        ]);
        $id = base64_decode($request->id);
    	$collection = PresetCollection::find($id);
        $collection->collection_name = $request->collection_name;
    	$collection->save();
    	$collection->collections()->sync($request->products);
        return redirect()->route('admin.collection.index')
        ->with('success','Collection created successfully');
    }

  
    public function destroy(Request $request)
    {
        $id = $request->collectionId;
        // $collection = PresetCollection::where('id',$id)->delete();

    	$collection = PresetCollection::find($id);
        $collection->collections()->detach();
        $collection->delete();
        return redirect()->route('admin.collection.index')
    	->with('success','Collection deleted successfully');

    	// return redirect()->route('admin.collection.index')
    	// ->with('success','Collection deleted successfully');
    }
}
