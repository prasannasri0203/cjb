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
use Illuminate\Support\Facades\Input;
use Auth;
use App\MerchandiseProduct;
use Session;
use App\AdminLog;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        //         $data = User::where('type','!=',2)->orderBy('id','DESC')->get();
        // dd($data);
        if ($request->ajax()) {
            $data = User::where('type',1)->orderBy('id','DESC')->get();
                    return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                        $btn = '<a href="artist_edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                        if($row->status == 1)
                        {
                        $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row->id.'" id="button_id_'.$row->id.'" onclick="activate_artist('.$row->id.')" data-original-title="Delete" class="btn btn-success btn-sm">Deactivate</a>';
                        }
                        else
                        {
                        $btn = $btn.' <a href="javascript:void(0)" style="background-color : black" data-id="'.$row->id.'"  id="button_id_'.$row->id.'"onclick="activate_artist('.$row->id.')" style="background-color: #555555;" data-original-title="Delete" class="btn btn-primary btn-sm">Activate</a>';
                        }
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setArtistId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
                        if($row->dob)
                        {
                           $diff = abs(strtotime($row->dob) - strtotime(date("Y-m-d"))); 
                           if(floor($diff / (365*60*60*24)) < 18)
                           {
                            $btn = $btn.'<a <i class="fa fa-flag" aria-hidden="true"></i> </a>'; 
                           }
                        }
                        // <button class="btn-delete" data-remote="/users/' . $user->id . '">Delete</button>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('portal.artist_list');
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        // dd($roles);
        $user = [];
        // dd($user);
    	return view('portal.artist_create',compact('roles','user'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'first_name' => 'required|regex:/^[a-zA-Z]+$/u|unique:users',
    		'email' => 'required|email|unique:users,email',
    	    'contact_number' => 'nullable|integer',
            'gender' => 'required',
            'dob' => 'required|date',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'

        ]);

// dd($request);
        $input = $request->all();
        // dd($input);
        if($request->hasfile('profile_image'))
        {
            $name=$request->profile_image->getClientOriginalName();
            $request->profile_image->move(public_path().'/profile/', $name);
            $input['profile_image'] = '/profile/'.$name;
        }
        $input['name'] = $request->first_name.' '.$request->last_name;
        $input['password'] =Crypt::encrypt(str_random(8));
        // $input['dob'] = \Carbon\Carbon::parse($request->dob)->format('j F, Y');
        $input['type'] = $request->type;
        $user = User::create($input);
      
        Mail::to($request)->send(new DemoEmail($request));
      

        return redirect('admin/artist_list')
        ->with('success','User created successfully');
    }
    
    public function edit($id)
    {
    	$id = $id;
    	$user = User::find($id);
    
    	return view('portal.artist_create',compact('user'));
    }

    public function update(Request $request)
    {
        $id = base64_decode($request->id);
    	$validator = Validator::make($request->all(), [
    		'first_name' => 'required|regex:/^[a-zA-Z]+$/u',
    		'email' => 'required|email|unique:users,email,'.$id,
            'contact_number' => 'nullable|integer',
            'gender' => 'required',
            'dob' => 'required|date',
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
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
            // $input['dob'] = \Carbon\Carbon::parse($request->dob)->format('j F, Y');
            $user = User::find($id);
            $user->update($input);
            // dd($user);
            return redirect()->route('admin.artist_list')
            ->with('success','User updated successfully');
        }
    }


    public function destroy(Request $request)
    { 
        // dd($request->all());
        $id = $request->userId;
        $check = MerchandiseProduct::where('artist_id',$id)->first();
        if($check){
            return redirect()->route('admin.artist_list')
    	->with('message','Artist is create some products.....so cannot to be deleted');
        }else{
            User::find($id)->delete();
    
        return redirect()->route('admin.artist_list')
    	->with('success','User deleted successfully');
        }
    	
    }
    public function enable_artist(Request $request)
    {
   $order_item['status'] = 1;

    $order = User::where('type',1)->find($request->id);

    $return_status = User::where('type',1)->where('id',$request->id)->get('status');
    
    if($return_status[0]['status'] == 1)
    {
        $x =0;
    }
    else
    {
        $x =1;
    }
    //dd($order);
    $update = User::where('type',1)->where('id',$request->id)->update(['status'=>$x]);


    if($update)
    {
        return response()->json([
            'return_status' => $x,
            'status' => true,
            'id' => $request->id
        ], 200);   
    }
    else
    {
        return response()->json([
         'return_status' => $x,
            'status' => false,
            'id' => ''
        ], 200);     
    }

    }

    public function artist_dashboard(Request $request)
    {
        $accessKey = AdminLog::latest()->first();
        if(!$accessKey)
        {
            return redirect('/admin');
        }
        Session::put('admin_user', $accessKey['admin_access_key']);
        $id = Input::get('id');
        $user = User::find($id);
        Auth::login($user);        
        $user_type = Auth::user()->type; 
            
            // Check user role
            switch ($user_type) {
                case 1:
                        return redirect('/dashboard');
                    break;
                case 2:
                        return redirect('/dashboard');
                    break; 
                default:
                        return redirect('/admin');
                    break;
            }   
    }

}
