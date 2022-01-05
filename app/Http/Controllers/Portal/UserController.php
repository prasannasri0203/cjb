<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Database\Eloquent\Model;
use yajra\Datatables\Datatables;
use Response;
use Image;
use Hash;
use Validator;
use File;
use Mail;
use Auth;
use Carbon\Carbon;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:user-list', ['except' => ['forgotpsw_sendemail','reset','reset_update']]);
         $this->middleware('permission:user-create', ['only' => ['create','store']]);
         $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
         
        if ($request->ajax()) {
            $data = User::where('type',3)->orderBy('id','DESC')->get();
            // $roles = $data->getRoleNames();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="user_edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setUserId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
                        //    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal" onclick="setUserId('{{$user->id}}')">Delete</a>  

                           //$btn = $btn.' ';
                           
    
                            return $btn;
                    })
                    ->addColumn('name', function($row){

                            $dateOfBirth  = $row->dob;
                            $years = Carbon::parse($dateOfBirth)->age;
                            if($years < 18){
                               $user_age = '<i class="fa fa-flag"></i>';
                            }
                            else{
                                $user_age = "";
                            }
                            $name = $row->name.$user_age;
                            return $name;
                    })
                    ->addColumn('image', function($row){

                        if($row->profile_image) {
                            $path = asset('profile/'.$row->profile_image);
                        } else {
                            $path = asset('profile/default.jpg');
                        }

   
                        $img = '<img src="'.$path.'" height="32px" width="32px" class="cms-image"/>';
                           
    
                            return $img;
                    })
                    ->rawColumns(['action', 'image','name'])
                    ->make(true);
        // }
    }

            	return view('portal.users.list');

      
    }

   
   
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        // dd($roles);
        $user = [];
        // dd($user);
    	return view('portal.users.create',compact('roles','user'));
    }

 

    public function store(Request $request)
    {
      
        
    	$this->validate($request, [
     		'first_name' => 'required|regex:/^[a-zA-Z]+$/u|unique:users',
     		'email' => 'required|email|unique:users,email',
             'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
             'password_confirmation' => 'required|same:password',
     		'roles' => 'required',
             'contact_number' => 'nullable|integer',
             'gender' => 'required',
             'dob' => 'required|date',
             'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
         ], 
         [
             'password.required' =>'Password field is required',
        
             // 'password.regex' => 'Password must contain at least maximum of 8 characters, one symbol/special character and both uppercase and lowercase letters',
             'password.*' => 'Must contain at least 8 characters with minimum on 1 uppercase, 1 lowercase, 1 special character, 1 digit.',
             'password_confirmation.required' =>'Confirm password field is required',
             'password_confirmation.*' => 'password is not matched', 
             'profile_image.image' => 'profile image must be an image',
             'profile_image.mimes' => 'please add only the jpeg,jpg,png.!',
             'profile_image.max' => 'Maximum file size to upload is 2MB.!',
         ]);

         $input = $request->all();
         $image =$request->file('profile_image');
 // dd($image);
         if($request->hasfile('profile_image'))
         {
             $file_name = rand().'.'.$image->getClientOriginalExtension(); 
            $img = Image::make($image->getRealPath());
             $org_img = Image::make($image->getRealPath());
             $destinationPath = public_path('profile');
             $thumbPath = public_path('profile/thumbimages'); 
             if(!File::isDirectory($destinationPath)){
             File::makeDirectory($destinationPath, 0777, true, true);
             } 
             if(!File::isDirectory($thumbPath)){
             File::makeDirectory($thumbPath, 0777, true, true);
             } 
             //create small thumbnail
             $img->resize(150, 150, function ($constraint) {
             $constraint->aspectRatio();
             })->save($thumbPath.'/'.$file_name);
             $org_img->save($destinationPath.'/'. $file_name );

             if(File::exists($destinationPath)) {
                 File::delete($destinationPath);
             }
 
             $input['profile_image'] = $file_name;
         }
         $input['name'] = $request->first_name.' '.$request->last_name;
         $input['type'] = 3;
         // $input['dob'] = \Carbon\Carbon::parse($request->dob)->format('j F, Y');
         $input['password'] = Hash::make($input['password']);

         $user = User::create($input);
       
        Mail::send('mails.demo',  ['demoEmail' => $request->email,'demoPassword' => $request->password], function ($m) use ($request) {
                $m->from('xyz@gmail.com', 'Cool Jelly Bean');
                $m->to($request->email)->subject('Login Mail');
            });
        

         $user->assignRole($request->input('roles'));
 // dd($user);
    
         return redirect()->route('admin.users.index')
         ->with('success','User created successfully');
    }


    
    public function show($id)
    {
    	$user = User::find($id);
    	return redirect()->route('admin.users.index');
    }

 
    public function edit($id)
    {
    	$id = $id;
    	$user = User::find($id);
    	$roles = Role::pluck('name','name')->all();
    	$userRole = $user->roles->pluck('name','name')->all();
    	return view('portal.users.create',compact('user','roles','userRole'));
    }

 
    public function update(Request $request)
    {   
        $id = base64_decode($request->id);
        

    	$validator = Validator::make($request->all(), [
            
    		'first_name' => 'required|regex:/^[a-zA-Z]+$/u',
    		'email' => 'required|email|unique:users,email,'.$id,
    		'password' => 'same:confirm-password',
    		'roles' => 'required',
            'contact_number' => 'nullable|integer',
            'gender' => 'required',
            'dob' => 'required|date',
            'profile_image' => 'mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            // 'profile_image.image' => 'profile image must be an image',
            'profile_image.mimes' => 'please add only the jpeg,jpg,png.!',
            'profile_image.max' => 'Maximum file size to upload is 2MB.!',
             // <---- pass a message for your custom validator
          ]);
        
    	if ($validator->fails())
    	{  
    		return redirect()->back()->withErrors($validator->errors());
        }else{
            $input = $request->all();
            $image =$request->file('profile_image');

    		if(!empty($input['password'])){ 
    			$input['password'] = Hash::make($input['password']);
    		}else{
    			$input = array_except($input,array('password'));    
            }
            if($request->is_edit_image == 1){
                if($request->hasfile('profile_image') && $request->profile_image != "")
                {                   
                    $file_name = rand().'.'.$image->getClientOriginalExtension(); 
                    $img = Image::make($image->getRealPath());
                    $org_img = Image::make($image->getRealPath());
                    $destinationPath = public_path('profile');
                    $thumbPath = public_path('profile/thumbimages'); 
                    if(!File::isDirectory($destinationPath)){
                    File::makeDirectory($destinationPath, 0777, true, true);
                    } 
                    if(!File::isDirectory($thumbPath)){
                    File::makeDirectory($thumbPath, 0777, true, true);
                    } 
        
                    //create small thumbnail
                    $img->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                    })->save($thumbPath.'/'.$file_name);
                    $org_img->save($destinationPath.'/'. $file_name );
        
                    if($file_name){     
                        $input['profile_image'] = $file_name;
                    }
                }
                else{
                        $input['profile_image'] = "";
                }
            }
           
            // dd($input);
            $input['name'] = $request->first_name.' '.$request->last_name;
            $input['type'] = 3;
            // $input['dob'] = \Carbon\Carbon::parse($request->dob)->format('j F, Y');
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id',$id)->delete();


            $user->assignRole($request->input('roles'));
            return redirect()->route('admin.users.index')
            ->with('success','User updated successfully');
        }
    } 

    public function destroy(Request $request)
    {
        
        $id = $request->userId;
    	User::find($id)->delete();
    	return redirect()->route('admin.users.index')
    	->with('success','User deleted successfully');

    }

    public function profileEdit($id = null){
        $id = base64_decode($id);
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = ($user->roles) ? $user->roles->pluck('name','name')->all() : [];
        return view('portal.own_profile',compact('user','roles','userRole'));
    }
     public function profileUpdate(Request $request)
    {
        $id = base64_decode($request->id);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'contact_number' => 'nullable|integer',
            'gender' => 'required',
            'dob' => 'required|date',
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors());
        }
        else{

            $input = $request->all();
            $image =$request->file('profile_image');
            if(!empty($input['password'])){ 
                $input['password'] = Hash::make($input['password']);
            }else{
                $input = array_except($input,array('password'));    
            }
            if($request->hasfile('profile_image'))
            {
                $file_name = rand().'.'.$image->getClientOriginalExtension(); 
                $img = Image::make($image->getRealPath());
                $org_img = Image::make($image->getRealPath());
                $destinationPath = public_path('profile');
                $thumbPath = public_path('profile/thumbimages'); 
                if(!File::isDirectory($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true, true);
                } 
                if(!File::isDirectory($thumbPath)){
                File::makeDirectory($thumbPath, 0777, true, true);
                } 
                
                $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
                })->save($thumbPath.'/'.$file_name);
                $org_img->save($destinationPath.'/'. $file_name );
    
                $input['profile_image'] = $file_name;
            }
            else{
                $input['profile_image'] = $request->profile;
            }
            $input['name'] = $request->first_name.' '.$request->last_name;
            unset($input['_token']);
            unset($input['confirm-password']);
            unset($input['profile']);
            unset($input['id']);
            $user = User::where('id',$id)->update($input);
            //$user->save($input);
            if($user){
                $content = array('demoEmail'=>$input['email'],'demoPassword'=>$request->password);
                Mail::send('mails/demo', $content, function($message) use ($content) {
                    $message->to($content['demoEmail'])->subject('passwor changed');
                    $message->from('xyz@gmail.com');
                    $message->setBody('test');
                });
            }
            return redirect('/admin')
            ->with('success','User updated successfully');
        }
    }

    public function imageDelete(Request $request){
        $id = $request->profile;
        $name = User::find($id);
       
        $path = public_path()."/profile/".$name;
        Storage::delete($path);
        if ($request->hasFile('file')) {
            Storage::delete($employee->file); // If $file is path to old image
        
            $employee->file = $request->file('file')->store('profile');
        }
         
    }

 

  public function forgotpsw(){
    return view('front/password-reset');
  }

  public function forgotpsw_sendemail(Request $request){
    //   dd($request);
    $messages = [
  
  'email.email' => 'Please give correct email format.'
];
  
  $this->validate($request, [
  'email' => 'required|email|max:255|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/|exists:users'      

  ],$messages);
  $email=$request->email;
 $data = array('email'=>$request->email);   
Mail::send('mails.forgotpsw', $data, function($message) use ($email){
   $message->to($email)->subject('Reset Password Notification');
   $message->from('xyz@gmail.com','Cool Jelly Bean');
});

return redirect()->back()->with('success','We have e-mailed your password reset link!');   
}

public function reset(){
    return view('front/reset');

  }

  public function reset_update(Request $request){
    $messages = [
   
   'email.email' => 'Please give correct email format.',
   'password.same' => 'Password & Confirm Password must be same'
];
   
   $this->validate($request, [
   'email' => 'required|email|max:255|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/|exists:users',
   'password' =>'required|required_with:password_confirmation|same:password_confirmation',
   'password_confirmation' =>'required',             

   ],$messages);

   $password = $request->password;
   $email=$request->email;
   $user =User::where('email',$request->email)->update(['password'=>Hash::make($request->password)]);
   $credentials = $request->only('email', 'password');
   if (Auth::attempt($credentials)) {
       // Session::set('userid',Auth::user()->user_type);
       // dd(Auth::user());exit;
       
       if(Auth::user()->type == 0 || Auth::user()->type == 3)
       {

           // return redirect()->route('admin.dashboard');
         $request->session()->invalidate();
           return redirect('admin/login')->with('success','password changed has been reset successfully');
       }
       else if(Auth::user()->type == 1 || Auth::user()->type == 2)
       {
               return redirect('/login')->with('success','password changed has been reset successfully');
       }

       else{
           
           $request->session()->invalidate();
           if(Auth::user()->type == 0 || Auth::user()->type == 3)
               return redirect('/admin/login')->with('success','password changed has been reset successfully');
           else
               return redirect('/login')->with('success','password changed has been reset successfully');
           
           }
       
   }
}


}
