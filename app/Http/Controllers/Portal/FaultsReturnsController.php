<?php

namespace App\Http\Controllers\portal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FaultReturn;
use App\FaultImage;
use App\FaultReturnHistory;
use yajra\Datatables\Datatables;
use Redirect;
use Image;
use File;
use App\User;
use Notification;
use App\Notifications\MyFaultAndReturnsNotification;

class FaultsReturnsController extends Controller
{
    public function FaultList(Request $request){
        // dd('hii');
        if ($request->ajax()) {
            $data = FaultReturn::with(['fault_image','fault_history','customerName','staffName','orderDetails','orderDetails.orderItemDetails','orderDetails.orderItemDetails.supplierName'])->get();
          
            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('date', function($row){   
                           $date = date('d-m-Y', strtotime($row->updated_at));
                           return $date;                            
                    })
                    ->addColumn('order_ref', function($row){   
                        if(@$row->orderDetails != null) {
                            return $row->orderDetails->order_id;
                        }else{
                            return 0;                            
                        }                                                       
                    })
                    ->addColumn('supplier', function($row){   
                        if(@$row->orderDetails != null){
                             foreach ($row->orderDetails->orderItemDetails as $key => $value) {
                                //  dd($value);
                                 if($value->merchandise_product_id == $row->product_id){
                                     
                                     return $value->supplierName->name;
                                 }
                           
                            }
                            
                        }                             
                    })
                    ->addColumn('customer_id', function($row){   
                        if(@$row->customerName->type==2) {
                            return $row->customerName->first_name.' '.@$row->customerName->last_name;
                        }else{
                            return 0;                            
                        }                           
                    })
                    ->addColumn('assign_staff_id', function($row){  
                        if(@$row->staffName->type==3) {
                            return $row->staffName->first_name.' '.@$row->staffName->last_name;
                        }else{
                            return 0;                            
                        }                           
                    })
                    ->addColumn('status', function($row){  
                      
                        if(@$row->fault_history->status) {
                            return $row->fault_history->status;
                        }else{

                            return 0;                            
                        }
                 })

                    ->addColumn('fault_image', function($row){
                        $img ='';   
                        $images = explode(',',$row->fault_image->fault_image);  
                        foreach ($images as $key => $value) {
                            
                            if($value) {
                                $path = asset('/portal/img/fault/'.$value);
                                $img .= '<img src="'.$path.'" height="32px" width="32px" class="cms-image"/>';
                            }                             
                        }  
    
                            return $img;
                    })
                    ->addColumn('action', function($row){
                        
                           $btn = '<a href="fault_view/'.$row->id.'" class="btn btn-primary btn-sm">View</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal" data-id="'.$row->id.'"  onclick="setFaultId('.$row->id.')" data-original-title="Delete"  style="width:120px !important;" class="btn btn-success assign-btn btn-sm">Assign Staff</a>';
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal1" data-id="'.$row->id.'"  onclick="setReturnId('.$row->id.')" data-original-title="Delete"  style="width:120px !important;" class="btn btn-success assign-btn btn-sm">Status Update</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action', 'fault_image','status','date','order_ref','supplier'])
                    ->make(true);
        }
      
        return view('portal/fault_return/fault_return_list');        
    
    }

    public function editFault($id){
        $fault_edit = FaultReturn::where('id', $id)->with(['fault_image','fault_history','customerName','staffName','orderDetails','orderDetails.orderItemDetails','orderDetails.orderItemDetails.supplierName'])->first();
      
        return view('portal/fault_return/edit_fault_return', compact('fault_edit'));
    }

    public function faultStaffList(){
        $staffList = User::where('type',3)->get();
        return response()->json(array('status' => true,'staffList' =>$staffList));
    }

    public function faultCreate(Request $request){
        return view('portal/fault_return/add_assign_person');
    }

    public function faultUpdate(Request $request){
        
        $rules = array(
            'order_id'      => 'required',
            'customer_id'   => 'required',           
            'assign_staff_id' => 'required',
            'fault_image'   => 'mimes:jpeg,jpg,png,gif,webp|required|max:10000',           
            'remarks'       => 'required',           
        );

            $update_product=FaultReturn::where('id',$request->hidden_id)->update([
                'order_id'        =>   $request->order_id,
                'customer_id'     =>   $request->customer_id,
                'assign_staff_id' =>   $request->assign_staff_id,
                'remarks'         =>   $request->remarks,
            ]);

            $fault_img= '';

        if ($request->hasFile('fault_image')) {
            $data = FaultImage::where('fault_id',$request->hidden_id)->delete();
            foreach ($request->file('fault_image') as $key => $file) {

                if(!is_dir(public_path('/portal/img/fault/'))){
                    mkdir(public_path('/portal/img/fault/'));
                }

                $fault_img= 'IMG_'.rand().'.'.$file->getClientOriginalExtension();
                $Image = Image ::make($file->getRealPath());
                $originalPath = public_path().'/portal/img/fault/';

                if(!File::isDirectory($originalPath)){
                    File::makeDirectory($originalPath, 0777, true, true);
                } 
                $Image->save($originalPath.$fault_img);
                $image_names[] = $fault_img;
           
            }
            $images = implode(",",$image_names);
            $fault_image_details=new FaultImage;
            $fault_image_details->fault_id    =   $request->hidden_id;
            $fault_image_details->fault_image =   $images;
            $fault_image_details->save();
        }

        $update_product=FaultReturnHistory::where('fault_id',$request->hidden_id)->update([
            // 'fault_id'  =>   $request->hidden_id,
            'status'    =>   $request->status,
            'remarks'   =>   $request->remarks,
        ]);
       
        
            return redirect()->route('admin.fault_list')->with('success', 'Falut Return Updated successfully');
    }

    public function FaultStatusUpdate(Request $request){
       // print_r($request->all());exit;
        $rules = [
            'status' => 'required',
        ];
    
        $customMessages = [
            'required' => 'The Status can not be blank.'
        ];
    
        $this->validate($request, $rules, $customMessages);

    if($request->remarks != ''){
            $assign_staff=FaultReturnHistory::where('fault_id',$request->status_return_id)->update([
                'status' =>   $request->status,
                // 'remarks' => $request->remarks ? $request->remarks :"",
            ]);

            $comments = \DB::table('comments')->where('commentable_id',$request->status_return_id)->first();

            if($comments !=''){
                $comments =\DB::table('comments')
                  ->where('commentable_id', $request->status_return_id)
                  ->update([
                    'comment' => $request->remarks ? $request->remarks :"",
                    'commenter_id' =>   1,
                    'commenter_type' =>   'App\User',
                    'commentable_type' =>   'App\FaultReturn',
                    'commentable_id' =>   $request->status_return_id,
                    'approved' =>   1,
                    'created_at' =>   date('Y-m-d H:i:s'),
                    'updated_at' =>   date('Y-m-d H:i:s'),
                ]); 
            
            }else{

                $comments=\DB::table('comments')->insert([
                    'comment' => $request->remarks ? $request->remarks :"",
                    'commenter_id' =>   1,
                    'commenter_type' =>   'App\User',
                    'commentable_type' =>   'App\FaultReturn',
                    'commentable_id' =>   $request->status_return_id,
                    'approved' =>   1,
                    'created_at' =>   date('Y-m-d H:i:s'),
                    'updated_at' =>   date('Y-m-d H:i:s'),

                ]);
            }
            
        } else{

            $assign_staff=FaultReturnHistory::where('fault_id',$request->status_return_id)->update([
                'status' =>   $request->status,
            ]);
        }
            // $user_id = User::where('type', '0')->orWhere('type', '3')->get();
            $fault_return = FaultReturnHistory::where('id',$request->status_return_id)->first();
            if(isset($fault_detail->fault_id) && $fault_detail->fault_id !=''){
               $fault_detail = FaultReturn::where('id',$fault_return->fault_id)->first();
            }
            if(isset($fault_detail->assign_staff_id) && $fault_detail->assign_staff_id !=''){
               $user = User::where('type', '0')->orWhere('id', $fault_detail->assign_staff_id)->get();
                if($user){
                    $details =[
                        'id'  => $request->status_return_id,
                        'url' => 'admin/fault_view/'.$request->status_return_id,
                    ];
                Notification::send($user, new MyFaultAndReturnsNotification($details));
                }
            }
        return redirect()->route('admin.fault_list')->with('success', 'Falut Return Status Updated successfully');
    }

    public function FaultReturnAssign(Request $request){

        $rules = [
            'assign_staff_id' => 'required',
        ];
    
        $customMessages = [
            'required' => 'The Staff Name field can not be blank.'
        ];
    
        $this->validate($request, $rules, $customMessages);

        $assign_staff=FaultReturn::where('id',$request->return_id)->update([
            
            'assign_staff_id' =>   $request->assign_staff_id,
            ]);
        return redirect()->route('admin.fault_list')->with('success', 'Falut Return Updated successfully');
    }


    public function deleteFaults(Request $request)
    {
        $data = FaultReturn::find($request->return_id)->delete();
        if($data)
        {   
            return redirect()->route('admin.fault_list')->with('success', 'Falut Return deleted successfully');
        }
        else
        {
            return redirect()->route('admin.fault_list')->with('success', 'Error in Falut Return deleted Action');
        }
    }
    
}
