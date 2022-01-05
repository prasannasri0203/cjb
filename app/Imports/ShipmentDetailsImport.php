<?php
   
namespace App\Imports;
   
use App\TrackingHistory;
use App\ShippingInfo;
use App\OrderDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
    
class ShipmentDetailsImport implements WithHeadingRow,ToCollection
{   


    public function collection(Collection $rows) {
        $unInsertedTrackingNumber   = [];
        $insertedTrackingNumber     = [];
        $unInsertedShipping         = [];
        $insertedShipping           = [];
        $message                    = ''; 

        if($rows->count() > 0){
            foreach ($rows as $key => $value) {
                // var_dump(!array_key_exists('', $value));
                if(!isset($value['']))                
                    if( $value['shipping_method'] != null &&  $value['shipping_method'] != ''){
                        if( $value['shipping_company'] != null &&  $value['shipping_company'] != ''){
                            if( $value['tracking_num'] != null &&  $value['tracking_num'] != ''){
                                if( $value['order_id'] != null &&  $value['order_id'] != ''){

                                    $order_id= OrderDetails::where('order_id',$value['order_id'])->first();
                                    //dd($order_id->id);
                                    if($order_id)
                                    {
                                        $value['order_id'] = $order_id->id;
                                    }
                                    $shippingInfo = new ShippingInfo;
                                        $shippingInfo->order_id     = $value['order_id'];                                
                                        $shippingInfo->status       = $value['order_status_id'];
                                    $shippingInfo->save();
                                    $insertedId = $shippingInfo->id;

                                    if($insertedId){    
                                        $tracking = new TrackingHistory;
                                            $tracking->shipping_info_id	    = $insertedId;
                                            $tracking->order_id     = $value['order_id'];
                                            $tracking->shipping_method      = $value['shipping_method'];
                                            $tracking->shipping_company     = $value['shipping_company'];
                                            $tracking->tracking_num         = $value['tracking_num'];
                                            $tracking->shipping_date        = new Carbon($value['shipping_date']);
                                            $tracking->comments             = $value['comments'];
                                            $tracking->order_status_id      = $value['order_status_id'] ? $value['order_status_id'] : 1;
                                        $tracking->save();


                                        if($tracking->id && $insertedId){
                                            $insertedTrackingNumber[] = $value['tracking_num'];
                                        } else{
                                            if($insertedId > 0 && $tracking->id == null){
                                                $unInsertedShipping = $value['tracking_num'];
                                            }
                                        }
                                    } else{
                                        $unInsertedTrackingNumber[] =  'Row ' . ((int) $key + (int)1) . ' - ' .$value['tracking_num']. ' : Tracking Not Stored';
                                    }
                                } else{
                                    $unInsertedTrackingNumber[] = 'Row ' . ((int) $key + (int)1) . ' - Order Id is Empty';
                                }
                            } else{
                                $unInsertedTrackingNumber[] = 'Row ' . ((int) $key + (int)1) . ' - Tracking Number Empty';
                            }
                        }else{
                            $unInsertedTrackingNumber[] = 'Row ' . ((int) $key + (int)1) . ' - Shipping Company Empty';
                        }
                    } else{
                        $unInsertedTrackingNumber[] = 'Row ' . ((int) $key + (int)1) . ' - Shipping Method Empty';
                    }
                }
            
        }
        else
        {
            $message = "No Records Found in Uploaded File";
        }
        if($message ==''){
            if(count($unInsertedTrackingNumber)){
                $msg = array('status'=>'success','message'=>'Data Imported, If error Check error Report','inserted_records'=>$insertedTrackingNumber,'un_inserted_records'=>$unInsertedTrackingNumber,'un_inserted_shipping'=>$unInsertedShipping);
            }
            else{
                $msg = array('status'=>'success','message'=>'Data Imported Sucessfully','inserted_records'=>$insertedTrackingNumber,'un_inserted_records'=>$unInsertedTrackingNumber,'un_inserted_shipping'=>$unInsertedShipping);
            }
            $this->data = $msg;
        } else{
            $msg = array('status'=>'error','message'=>$message,'inserted_records'=>$insertedTrackingNumber,'un_inserted_records'=>$unInsertedTrackingNumber,'un_inserted_shipping'=>$unInsertedShipping);
            $this->data = $msg;
        }
         
            
    }

}