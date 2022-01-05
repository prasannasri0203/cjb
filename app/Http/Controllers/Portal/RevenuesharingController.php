<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Portal\RevenuesharingController;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use Validator;
use App\Revenuesharing;
use DB;


class RevenuesharingController extends Controller
{
    public function index(Request $request)
    {
        // $data = Revenuesharing::select(array('id', 'setting_name', 'setting_desc'))->get();
// dd($data);
        if ($request->ajax()) {
            $data = Revenuesharing::select(array('id', 'setting_name', 'setting_desc'))->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="revenue_edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
   
                        // $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setSetingId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('portal.revenue_list');
    }

    public function create()
    {
        return redirect('admin/revenue_list')->with('failure','Invalid request.');
        
    	$data = Revenuesharing::all();
    	// dd($data);
    	return view('portal.revenueshare_create',compact('data'));
    }

    public function store(Request $request)
    {
        return redirect('admin/revenue_list')->with('failure','Invalid request.');

        $settingKey = preg_replace('/\s+/', '_', $request->setting_key);

        
    	$this->validate($request, [
    		'setting_name' => 'required',
            'setting_key' => 'required',
            'setting_value' => 'required',
            'setting_desc' => 'required',
        ]);
        $setting =  Revenuesharing::create([
            'setting_name'=>$request->setting_name,
            'setting_key'=> strtolower($settingKey),
            'setting_value'=>$request->setting_value,
            'setting_desc'=>$request->setting_desc,
        ]);
        return redirect()->route('admin.revenue_list')
        ->with('success','settings created successfully');
    }
       
    // $setting->select('setting_name','setting_key','setting_value','setting_desc');
        // $setting->save();
       

    public function edit($id)
    {
        $data = Revenuesharing::where('id', $id)->find($id);
        // dd($data);
        return view('portal.revenue_create', compact('data'));
    }

    public function update(Request $request)
    {
        $settingKey = preg_replace('/\s+/', '_', $request->setting_key);

    	$this->validate($request, [
    		'setting_name' => 'required',
            // 'setting_key' => 'required',
            'setting_value' => 'required',
            'setting_desc' => 'required',
        ]);
        $id = $request->setting_id;
        // dd($id);
        $data = Revenuesharing::find($id);
        // $setting =  Revenuesharing::Update([
         $data->setting_name = $request->setting_name;
         // $data->setting_key = strtolower($settingKey);
         $data->setting_value = $request->setting_value;
         $data->setting_desc = $request->setting_desc; 
    	$data->save();
    
        return redirect()->route('admin.revenue_list')
        ->with('success','settings created successfully');
    }

    public function update_status(Request $request)
    {
        return redirect('admin/revenue_list')->with('failure','Invalid request.');

        $id = $request->userId;
       $data = Revenuesharing::find($id)->delete();
      
    //  dd($data);
    return redirect()->route('admin.revenue_list')
    ->with('success','User deleted successfully');
    }
}
