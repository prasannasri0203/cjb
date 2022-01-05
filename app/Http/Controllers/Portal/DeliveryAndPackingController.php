<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Portal\DeliveryAndPackingController;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;

use Validator;
use App\DeliveryAndPacking;
use DB;


class DeliveryAndPackingController extends Controller
{
    public function index(Request $request)
    {
         
        if ($request->ajax()) {
            $data = DeliveryAndPacking::select(array('id','type', 'delivery_name', 'delivery_value','delivery_desc'))->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="delivery_packing_edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setSetingId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('portal.delivery_packing_list');
    }

    public function create()
    { 
    	$data = DeliveryAndPacking::all();
    	// dd($data);
    	return view('portal.delivery_packing_share',compact('data'));
    }

    public function store(Request $request)
    { 
        $deliveryKey = preg_replace('/\s+/', '_', $request->delivery_key);

        
    	$this->validate($request, [
            'delivery_name' => 'required',
            'type' => 'required',
            // 'delivery_key' => 'required',
            'delivery_value' => 'required',
            'delivery_desc' => 'required',
        ]);
        $datas = DeliveryAndPacking::where('deleted_at',null)->get();
        if(count($datas) > 0 ){
            foreach($datas as $value){
                $temp[] = $value['delivery_name'];
            }
            if(in_array($request->delivery_name,$temp)){
                return redirect()->route('admin.delivery_packing_list')
                ->with('failure','packing name already exists');
            }else{
                $delivery =  DeliveryAndPacking::create([
                    'delivery_name'=>$request->delivery_name,
                    'type'=>2,
                    'delivery_key'=> 'none',
                    'delivery_value'=>$request->delivery_value,
                    'delivery_desc'=>$request->delivery_desc,
                    'delivery_status'=>1,
                ]);
                return redirect()->route('admin.delivery_packing_list')
                ->with('success','Packing created successfully');
            }
        }else{
            $delivery =  DeliveryAndPacking::create([
                'delivery_name'=>$request->delivery_name,
                'type'=>2,
                'delivery_key'=> 'none',
                'delivery_value'=>$request->delivery_value,
                'delivery_desc'=>$request->delivery_desc,
                'delivery_status'=>1,
            ]);
            return redirect()->route('admin.delivery_packing_list')
            ->with('success','Packing created successfully');
        }
        
        
    }
        

    public function edit($id)
    {
        $data = DeliveryAndPacking::where('id', $id)->find($id);
        // dd($data);
        return view('portal.delivery_packing_create', compact('data'));
    }

    public function update(Request $request)
    {
        $deliveryKey = preg_replace('/\s+/', '_', $request->delivery_key);

    	$this->validate($request, [
    		'delivery_name' => 'required',
            'delivery_value' => 'required',
            'delivery_desc' => 'required',
        ]);
        $id = $request->delivery_id;
        // dd($id);
        $data = DeliveryAndPacking::find($id);
        // $delivery =  DeliveryAndPacking::Update([
         $data->delivery_name = $request->delivery_name;
         $data->type = 2;
         $data->delivery_value = $request->delivery_value;
         $data->delivery_desc = $request->delivery_desc;
        
    	$data->save();
    
        return redirect()->route('admin.delivery_packing_list')
        ->with('success','Packing updated successfully');
    }

    public function update_status(Request $request)
    { 
        $id = $request->userId;
       $data = DeliveryAndPacking::find($id)->delete();
      
    //  dd($data);
    return redirect()->route('admin.delivery_packing_list')
    ->with('success','Packing deleted successfully');
    }
}
