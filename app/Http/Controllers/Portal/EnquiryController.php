<?php

namespace App\Http\Controllers\Portal;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\enquiry;
use Mail;
use App\User;
use yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\Model; 
use Auth;


class EnquiryController extends Controller
{
    public function index(Request $request)
    { 

    if ($request->ajax()) {

        $data = DB::table('enquiry')
        ->select(array('id', 'name', 'email', 'description','status','reply_status'))->where('status', $request->status_filter)->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('reply_status', function($row){

                    if($row->reply_status == 0)
                    {
                        $reply_status = "Not Done";
                    }
                    if($row->reply_status == 1)
                    {
                        $reply_status = "Replied";
                    }
                       //$btn = $btn.' ';

                        return $reply_status;
                })
                ->addColumn('status', function($row){

                    if($row->status == 0)
                    {
                        $status = "Open";
                    }
                    if($row->status == 1)
                    {
                        $status = "Archieved";
                    }
                    if($row->status == 2)
                    {
                        $status = "Deleted";
                    }
                       //$btn = $btn.' ';

                        return $status;
                })
                ->addColumn('action', function($row){

                       $btn = '<a style="width:55px;margin-top:0px;" href="enquiry_edit/'.$row->id.'" class="btn btn-primary btn-sm">View</a>';
                       //$btn = $btn.' ';

                    if($row->status == 0)
                    {
                       $btn = $btn.'<button style="margin: 10px 5px;" class="btn btn-danger btn-sm" onclick="activate_enquiry('.$row->id.',2)">Delete</button>';

                       $btn = $btn.'<button style="margin: 10px 5px;margin-left:0px;" class="btn btn-success btn-sm" onclick="activate_enquiry('.$row->id.',1)">Archieve</button>';
                    }
                    if($row->status == 1)
                    {
                       $btn = $btn.'<button style="margin: 10px 5px;" class="btn btn-primary btn-sm" onclick="activate_enquiry('.$row->id.',0)">Open</button>';

                       $btn = $btn.'<button style="margin: 10px 5px;margin-left:0px;" class="btn btn-danger btn-sm" onclick="activate_enquiry('.$row->id.',2)">Delete</button>';
                    }
                    if($row->status == 2)
                    {
                       $btn = $btn.'<button style="margin: 10px 5px;"  class="btn btn-primary btn-sm" onclick="activate_enquiry('.$row->id.',0)">Open</button>';

                       $btn = $btn.'<button style="margin: 10px 5px;margin-left:0px;" class="btn btn-success btn-sm" onclick="activate_enquiry('.$row->id.',1)">Archieve</button>';
                    }
                       //$btn = $btn.' ';

                        return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
    }
        return view('portal.enquiry');
    }

    public function view($id, Request $request)
    {
        if($request->get('notify_id')){
            $user = Auth::user();

            $unread_order_notifications  = $user->notifications()->where('id',$request->get('notify_id'))->update(['read_at' => \Carbon\Carbon::now()]);
        }
        // $id=$request->id;
        $data = enquiry::find($id);
        $user = [];

        if($data->read_status == 0) {
            enquiry::where('id', $id)->update(['read_status' => '1']);
        }

        return view('portal.enquiry_view',compact('data','user'));

    }
    public function edit()
    {
        $id = $id;
    	$user = User::find($id);
    
    }

    public function maill(Request $request)
    {
        $data = enquiry::find($request->enquiry_id);

        if($data) {
            if($request->description != '' && $request->description != null) {
            enquiry::where('id', $request->enquiry_id)->update(['reply_status' => '1', 'replay_message' => $request->description]);
            $content = [];
            $content['email'] = $request->email;
              $content['description'] = $request->description;
            //   dd($request->all());
               
                // dd($data);
            
                Mail::send([], [], function($message) use ($content) {
                   $message->to($content['email'])->subject
                      ('Reply Mail');
                   $message->from('xyz@gmail.com');
                   $message->setBody($content['description']);
                });
            }
              
            return redirect('admin/enquiry_list')->with('success','Mail has been send successfully.');

        }
        return redirect('admin/enquiry_list')->with('failure', 'Invalid request..!!');
    }
    public function enquiry_status_change(Request $request)
    {
        
        $data = enquiry::find($request->id);
        $data->status = $request->status;
        $data->save(); 

        if($data)
        {
            return response()->json([
                'status' => true,
                'id' => $data->id
            ], 200);             
        }       

    }
}
