<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Crypt;
use Spatie\Permission\Models\Role;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Mail\DemoEmail;
use Response;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{

    

    public function index(Request $request)
    {
        //         $data = User::where('type','!=',2)->orderBy('id','DESC')->get();
        if ($request->ajax()) {
            $data = User::where('type',2)->orderBy('id','DESC')->get();
                    return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="customer_edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
   
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setCustomerId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('portal.customers_list');
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $user = [];
    	return view('portal.customer_create',compact('roles','user'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'first_name' => 'required|regex:/^[a-zA-Z.\s ]*$/u|unique:users',            
            'last_name' => 'nullable|regex:/^[a-zA-Z.\s ]*$/u',
    		'email' => 'required|email|unique:users,email',
    	    'contact_number' => 'nullable|integer',
            'gender' => 'required',
            'city'=>'regex:/^[a-zA-Z]+$/u',
            'state'=>'regex:/^[a-zA-Z]+$/u',
            'country'=>'regex:/^[a-zA-Z]+$/u',
            'dob' => 'required|date',
            // 'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

        $input = $request->all();
        if($request->hasfile('profile_image'))
        {
            $name=$request->profile_image->getClientOriginalName();
            $request->profile_image->move(public_path().'/profile/', $name);
            $input['profile_image'] = '/profile/'.$name;
        }
        $input['name'] = $request->first_name.' '.$request->last_name;
        // $hashed_random_password = Hash::make(str_random(8));
        $input['password'] =Crypt::encrypt(str_random(8));

        // $input['dob'] = \Carbon\Carbon::parse($request->dob)->format('j F, Y');
        $input['type'] = $request->type;
        $user = User::create($input);
       
        Mail::to($request)->send(new DemoEmail($request));
         
        return redirect('admin/customer_list')
        ->with('success','User created successfully');
    }


    public function edit($id)
    {
    	$id = $id;
    	$user = User::find($id);
    
    	return view('portal.customer_create',compact('user'));
    }

    public function update(Request $request)
    {
        $id = base64_decode($request->id);
    	$validator = Validator::make($request->all(), [
    		'first_name' => 'required|regex:/^[a-zA-Z.\s ]*$/u',
            'last_name' => 'nullable|regex:/^[a-zA-Z.\s ]*$/u',
    		'email' => 'required|email|unique:users,email,'.$id,
            'contact_number' => 'nullable|integer',
            'gender' => 'required',
            'dob' => 'required|date',
            'city'=>'regex:/^[a-zA-Z]+$/u',
            'state'=>'regex:/^[a-zA-Z]+$/u',
            'country'=>'regex:/^[a-zA-Z]+$/u',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    	if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator->errors());
    	}
    	else{
            $input = $request->all();
            if($request->hasfile('profile_image'))
            {
                $name=$request->profile_image->getClientOriginalName();
                $request->profile_image->move(public_path().'/profile/', $name);
                $input['profile_image'] = $name;
            }
            else{
                $input['profile_image'] = $request->profile;
            }
            $input['name'] = $request->first_name.' '.$request->last_name;
            $input['dob'] = \Carbon\Carbon::parse($request->dob)->format('j F, Y');
            $user = User::find($id);
            $user->address_2 = $input['address_2'];
            $user->update($input);
            $user->save();
            return redirect()->route('admin.customer_list')
            ->with('success','User updated successfully');
        }
    }


    public function destroy(Request $request)
    { 
        $id = $request->userId;
    	User::find($id)->delete();
    	return redirect()->route('admin.customer_list')
    	->with('success','User deleted successfully');
      
    }
}

