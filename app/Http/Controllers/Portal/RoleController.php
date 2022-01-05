<?php

namespace App\Http\Controllers\Portal;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Response;
use Illuminate\Database\Eloquent\Model;

use yajra\Datatables\Datatables;
use Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list');
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = Role::where('id','!=',1)->orderBy('id','DESC');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="edit/'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm update_role_status">Delete</a>';
                           return $btn;
                            
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    // dd($data);
        }
        return view('portal.roles.list');
    }

    public function getData(Request $request)
    {
         
        if ($request->ajax()) {
            $data = Role::where('id','!=',1)->orderBy('id','DESC')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                         
                           $btn = '<a href="role_edit/'.base64_encode($row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal"  data-target="#myModal"  data-id="'.$row->id.'" onclick="setRoleId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
                           //    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="setRoleId('{{$role->id}}')">Delete</a>

                           return $btn;
                            
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
                // dd($data);
                    return view('portal.roles.list');
    }

    public function role_datatable_status_update($id)
    {
        //dd($id);
        $update_product= Role::where('id',$id)->update(['status' => '1']);
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
        $allpermission = Permission::get();
        $permission = array();
        foreach ($allpermission as $key => $value) {
            $key = explode('-', $value->name);
            if(array_key_exists($key[0], $permission)){
                $permission[$key[0]][] = $value;
            }
            else{
                $permission[$key[0]] = [];
                $permission[$key[0]][] = $value;
            }
        }
        $role = [];
        return view('portal.roles.create',compact('permission', 'role'));
    }

 
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z\s]*$/|unique:roles,name',
            'permission' => 'required'
        ],
        [
            'name.required' => 'name field is required',
            'name.regex' => 'The name must contain alphabet characters only.',
            'name.unique' => 'name has been already taken',
        
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));


        return redirect()->route('admin.role.getData')
                        ->with('success','Role created successfully');
    }
    
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        // return view('roles.show',compact('role','rolePermissions'));
    }


     
    public function edit($id)
    {
    	$id = base64_decode($id);
        $role = Role::find($id);
        $allpermission = Permission::get();
        $permission = array();
        foreach ($allpermission as $key => $value) {
            $key = explode('-', $value->name);
            if(array_key_exists($key[0], $permission)){
                $permission[$key[0]][] = $value;
            }
            else{
                $permission[$key[0]] = [];
                $permission[$key[0]][] = $value;
            }
        }
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();


        return view('portal.roles.create',compact('role','permission','rolePermissions'));
    }

 
    public function update(Request $request)
    {
    	$id = base64_decode($request->id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s]*$/',
            'permission' => 'required'
        ],
        [
            'name.required' => 'name field is required',
            'name.regex' => 'The name must contain alphabet characters only.',
            'name.unique' => 'name has been already taken',
        
        ]);
        if ($validator->fails())
    	{
    		return redirect()->back()->withErrors($validator->errors());
    	}
    	else{

	        $role = Role::find($id);
            $role->name = $request->input('name');
	        $role->save();


	        $role->syncPermissions($request->input('permission'));


	        return redirect()->route('admin.role.getData')
	                        ->with('success','Role updated successfully');
        }
    }
    
    public function destroy(Request $request)
    {
        $id = $request->roleId;
        // dd($id);
        $user = DB::table("roles")->where('id',$id)->delete();
        // dd($user);
        return redirect()->route('admin.roles.index')
        ->with('success','Role deleted successfully');
    }
}
