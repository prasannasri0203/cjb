<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Supplier;
use Validator;
use Illuminate\Database\Eloquent\Model;
use Redirect;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Mail;

class SupplierController extends Controller
{
     
    function __construct()
    {
         $this->middleware('permission:supplier-list');
         $this->middleware('permission:supplier-create', ['only' => ['supplier_create']]);
         $this->middleware('permission:supplier-edit', ['only' => ['supplier_edit','supplier_update']]);
         $this->middleware('permission:supplier-delete', ['only' => ['destroy']]);
    }

    public function supplier_create(Request $request)
    {
        //dd($request->input());
        $rules = array(
            'name'    => 'required|regex:/^[a-zA-Z\s]*$/|min:2|max:50',
            'email'    => 'required|email|unique:suppliers,deleted_at,NULL',
            'phone_number'    => 'required|numeric|unique:suppliers,deleted_at,NULL',
            'address'    => 'required|min:20|max:60',
            'pincode'    => 'required|min:6|max:6',
        );


        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('admin/supplier')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::all()); // send back the input (not the password) so that we can repopulate the form
        }
        else{

            // $lat_long=$this->getLatLong($request->pincode);
            // echo "Latitude: ".$lat_long['lat']."<br>";
            // echo "Longitude: ".$lat_long['lng']."<br>";
            // die; 
            $supplier = new Supplier; 
              $supplier->name      = $request->name;
              $supplier->email     = $request->email;
              $supplier->phone_number  = $request->phone_number;
              $supplier->address   = $request->address;
              $supplier->pincode   = $request->pincode;
              $supplier->latitude  = 1; 
              $supplier->longitude = 2; 
              $supplier->primary_conduct    = $request->primary_conduct;
              $supplier->position  = $request->position; 
              $supplier->general_notes     = $request->general_notes;
              $supplier->payment_terms     = $request->payment_terms; 
              $supplier->save();
                     
            return Redirect::to('admin/supplier_list');  
        }
      
    }

    public function supplier_edit($id)
    {
        $supplier_edit = Supplier::where('id', $id)->first();
        return view('portal.supplier_edit', compact('supplier_edit'));
    }  
    
    public function supplier_update(Request $request)
    {
        $rules = array(
            'name'    => 'required|regex:/^[a-zA-Z\s]*$/|min:2|max:50|unique:suppliers,name,'.$request->hidden_id,
            'email'    => 'required|email|unique:suppliers,email,'.$request->hidden_id,
            'phone_number'    => 'required|numeric|unique:suppliers,phone_number,'.$request->hidden_id,
            'address'    => 'required|min:20|max:60',
            'pincode'    => 'required|min:6|max:6',
        );
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) {
            return Redirect::to('admin/supplier_edit/'.$request->hidden_id)
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::all()); // send back the input (not the password) so that we can repopulate the form
        }
        else{
            //    $lat_long=$this->getLatLong($request->pincode);
            // echo "Latitude: ".$lat_long['lat']."<br>";
            // echo "Longitude: ".$lat_long['lng']."<br>";
            // die; 

              $supplier['name']     = $request->name;
              $supplier['email']     = $request->email;
              $supplier['phone_number']  = $request->phone_number;
              $supplier['address']   = $request->address;
              $supplier['pincode']   = $request->pincode;
              $supplier['latitude']  = 1; 
              $supplier['longitude'] = 2; 
              $supplier['primary_conduct']    = $request->primary_conduct;
              $supplier['position']  = $request->position; 
              $supplier['general_notes']     = $request->general_notes;
              $supplier['payment_terms']     = $request->payment_terms; 
              $update_supplier = Supplier::find($request->hidden_id);
              $update_supplier->update($supplier);
 
            if($update_supplier)
            {
                return Redirect::to('admin/supplier_list')->with('alert-success', 'Supplier info updated successfully');     
            }
       }       
    }
    // pincode based lat long get no 
        // public function getLatLong($pincode)
        // {  
        //        $url ="https://maps.googleapis.com/maps/api/geocode/json?address={$pincode}&key=AIzaSyBe3aj5jCfrONYlk51bzkXp0Tv0p-o-PnU";
         
        // $site = file_get_contents($url);
        // $goods = strstr($site, 'GPoint('); // cut off the first part up until 
        // $end = strpos($goods, ')'); // the ending parenthesis of the coordinate
        // $cords = substr($goods, 7, $end - 7); // returns string with only the 
        // $array = explode(', ',$cords); // convert string into array
        // echo "<pre>";
        // print_r($array);
        //     return $array;
        // } 

    public function supplier_datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = Supplier::all()->where('status',0);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="supplier_edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setUserId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
                           //$btn = $btn.' ';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('portal/supplier_list',compact('Supplier'));
    }

    public function supplier_datatable_delete($id)
    {
        $update_supplier=Supplier::where('id',$id)->update(['status' => '1']);
        if($update_supplier)
        {
            return response()->json(['success'=>'Product deleted successfully.']);
        }
        else
        {
            return response()->json(['success'=>'No deleted.']);
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->userId;
        Supplier::find($id)->delete();
        return redirect()->route('admin.supplier.list')
        ->with('success','Supplier deleted successfully');
    }
}
