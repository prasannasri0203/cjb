<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Featured_video;
use DB;
use Validator;
use Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;



class FeaturedVideosController extends Controller
{ 
    function __construct()
    {
         $this->middleware('permission:videos-list');
         $this->middleware('permission:videos-create', ['only' => ['create','store']]);
         $this->middleware('permission:videos-delete', ['only' => ['destroy']]);
    }

 
    public function index(Request $request)
    {
        $videos = FeaturedVideo::orderBy('id','DESC')->paginate(5);
        // dd($videos);
        return view('portal.videos.list',compact('videos'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        $video = [];
        return view('portal.videos.create');
    }

 
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'video' => 'mimes:m4v,avi,flv,mp4,mov'
            
        ]);
 
    }
  
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        return view('roles.show',compact('role','rolePermissions'));
    }
 
  
}
