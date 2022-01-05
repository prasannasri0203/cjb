<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use App\ProductOptionValue;
use App\Categories;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Featured_video;
use Redirect;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\OrderDetails;
use App\User;
use App\FaultReturnHistory;
use DB;
use Auth;


class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->type == 0){
        $order_count = OrderDetails::where('status', 2)->get();
        $customer_count = User::where('type', 2)->where('status', 1)->get();
        $artist_count = User::where('type', 1)->where('status', 1)->get(); 
        $cjb_staff_count =  User::where('type',3)->get(); 
        $supplier_count =  Supplier::get();
        $categories_count =  Categories::where('parent_id',0)->get();
        $sub_categories_count =  Categories::where('parent_id', '!=' , 0)->get();
        $faults_returns = FaultReturnHistory::where('status', 'completed')->get();
        $succes_rate=0;
        if((count($faults_returns) > 0) && (count($order_count) > 0))
        {
            $succes_rate = 100-((count($faults_returns)/count($order_count))*100);
       	    $succes_rate = round($succes_rate, 2);
        } else {
        	$succes_rate = 100;
        }
        
        //dd($succes_rate);
        return view('portal.home', compact('order_count','customer_count','artist_count','cjb_staff_count','succes_rate','faults_returns','sub_categories_count','categories_count','supplier_count'));
    }else{
        return redirect('/');
    }
    }
    public function supplier()
    {
        return view('portal.supplier');
    }

    public function supplier_list()
    {
        $supplier_list = Supplier::all()->where('phone_number',1234567890);
        return view('portal.supplier_list', compact('supplier_list'));
    }

    public function categories_create()
    {
        $category_list = Categories::all()->where('status','0');
        // $options_varaints = DB::table('product_option_values')->get();
        $options_varaints = ProductOptionValue::all(); 
        return view('portal.categories' , compact('category_list','options_varaints'));
    }

    public function colorView()
    { 
        $options_varaints =ProductOptionValue::where('product_option_id','2')->get();  
        return view('portal.colors' , compact('options_varaints'));
    }

    public function featured_video(Request $request)
    {
        // $slice = Str::after('https://www.youtube.com/watch?v=ImtZ5yENzgE1', '=');
        // dd($slice);
        if ($request->ajax()) {
            $data = Featured_video::all()->where('status',0);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('date', function($row){

                        $date = date('d-m-Y', strtotime($row->updated_at));
                        
                           return $date;

                    })
                    ->addColumn('image', function($row){

                        $link = $row->video_link;
                        $video_id_link_test = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
                       
                        if (sizeof($video_id_link_test) ==1 )
                            $video_id_link_test = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..

                        if (sizeof($video_id_link_test) == 2){
                            $video_data = explode("&", $video_id_link_test[1]); // Deleting any other params
                            $video_id = $video_data[0];

                        }

                        
                        if(sizeof($video_id_link_test) == 2){

                            $img = '<img src="https://img.youtube.com/vi/'.$video_id.'/hqdefault.jpg" width="90" height="90" alt="" class="cms-image">';
                        } else{
                            $image = asset('images/logo.png');
                            $img = '<img src="'.$image.'" width="90" height="90" alt="" class="cms-image">';
                        }


                            return $img;
                    })
                    ->addColumn('action', function($row){
                            $url = Str::after($row->video_link, '=');
                            $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" data-video-description="'.$row->video_description.'" data-video-type="'.$row->type.'" data-video-link="'.$row->video_link.'" class="btn btn-primary btn-sm edit_video_link" >Edit</a>';
                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setVideoId('.$row->id.')" data-original-title="Delete" class="btn btn-danger btn-sm">Delete</a>';
                            $btn = $btn.'<button class="btn btn-primary btn-sm video" data-video="https://www.youtube.com/embed/'.$url.'" data-toggle="modal" data-target="#videoModal" style="margin-top: 10px;">Play Video </button>';


                           //$btn = $btn.' ';

                            return $btn;
                    })
                    ->rawColumns(['action', 'image'])
                    ->make(true);
        }

        return view('portal/featured_video');
        //return view('portal.featured_video');
    }
    public function featured_video_add(Request $request)
    {
        $rules = array(
            'type'  => 'required',
            'video_link'    => "['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i']|unique:featured_videos",
            'video_description'    => 'required|unique:featured_videos',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
            return response()->json($response);
        }
        else
        {
            $featured_video=new Featured_video($request->input());
            $featured_video->save();
            if($featured_video->id)
            {
                $response = array(
                    'status' => true,
                    'message' => 'Video Added Successfully',
                    'featured_video_id' => $featured_video->id,
                );
                return response()->json($response);
            }
        }
    }


    public function featured_video_datatable_status_update($id)
    {
        $featuredVideo=Featured_video::where('id',$id)->update(['status' => '1']);
        if($featuredVideo)
        {
            return response()->json(['success'=>'Product deleted successfully.']);
        }
        else
        {
            return response()->json(['success'=>'No deleted.']);
        }

    }

    public function featured_video_edit(Request $request)
    {

        $rules = array(
            'type' =>'required',
            'video_link'    => "['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i']|unique:featured_videos,video_link,".$request->video_edit_id,
            'video_description'    => 'required|unique:featured_videos,video_description,'.$request->video_edit_id,
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            $response = array(
                'status' => false,
                'errors' => $validator->getMessageBag()->toArray()
            );
            return response()->json($response);
            // return redirect()->route('admin.featured_video')->with('success','Video added successfully');

        }
        else
        {
            $featuredVideo  = Featured_video::findOrFail($request->video_edit_id);
            $input = $request->input();
            $featuredVideo->fill($input)->save();
            if($featuredVideo->id)
            {
                $response = array(
                    'status' => true,
                    'message' => 'Video Updated Successfully',
                );
                return response()->json($response);
                // return redirect()->route('admin.featured_video')->with('success','Video added successfully');
            }
            else
            {
                $response = array(
                    'status' => false,
                );
                return response()->json($response);
                // return redirect()->route('admin.featured_video')->with('su ccess','Video added successfully');

            }
        }

    }

    public function destroy(Request $request)
    {
        $id = $request->userId;
    	Featured_video::find($id)->delete();
    	return redirect()->route('admin.featured_video')
    	->with('success','Video deleted successfully');

    }


}
