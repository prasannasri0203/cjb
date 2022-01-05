<?php

namespace App\Exports;
use App\OrderDetails;
use App\CartDetails;
use App\User;
use App\OrderCustomerAddressDetails;
use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\FromCollection;

class ordersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
     // varible form and to 
     public function __construct($from = null ,$to = null)
     {
         $this->from = $from;
         $this->to   = $to;
     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $from_date = $this->from;
        $to_date = $this->to?$this->to:Carbon::now();
        $sExport=[];
        $order = OrderDetails::with('orderItemDetails','orderItemDetails.orderProducts','orderItemDetails.orderProducts.merchProductImage','orderItemDetails.orderProducts.artistDetails','orderItemDetails.orderProducts.variantDetails','customerBillingAddress','customerDetails','artistDetails','cardDetails')
            ->when(!empty($from_date), function($query) use($from_date,$to_date){
                $query->whereRaw("(created_at >= ? AND created_at <= ?)", 
                    [$from_date." 00:00:00", $to_date." 23:59:59"]
                );
            })->get();
    
        $sExport[] = [
                        'order_id',
                        'order_ref_number',
                        'customer_name',
                        'billing_address',
                        'shipping_address',
                        'product_name',
                        'shipping_item_count',
                        'sub_total',
                        'delivery_amount',
                        'packing_name',
                        'packing_amount',
                        'additional_charge', 
                        'grand_total',
                        'artist_name',
                        'artist_percent',
                        'artist_revenue',
                        'affiliate_percent',
                        'affiliate_revenue',
                        'admin_percent',
                        'admin_revenue',
                        'bank_name',
                        'sort_code',
                        'account_number',
                        'account_holder_name',
                        'release_status',
                        'status'];
                        // echo '<pre>';
        foreach ($order as $key => $res) { 
        	if($res->status == 1){
        		$status = 'Pending';
        	}elseif($res->status == 2){
        		$status = 'Completed';
        	}elseif($res->status == 3){
        		$status = 'Camcelled';
        	}elseif($res->status == 4){
        		$status = 'Return';
            }
           $name = (count($res->orderItemDetails) > 0 ) ? $res->orderItemDetails[0]['orderProducts']['merchandise_product_name'] : '-';
        	$sExport[] = [
        					$res->order_id,
        					$res->order_ref_number,
        					($res->customerDetails) ? $res->customerDetails['name'] : '-',
                            ($res->customerBillingAddress) ? $res->customerBillingAddress['no'].' '.$res->customerBillingAddress['street_1'].' '.$res->customerBillingAddress['region'].' '.$res->customerBillingAddress['country'].' '.$res->customerBillingAddress['zipcode'].' '.$res->customerBillingAddress['contact_no'] : '-',
        					($res->customerBillingAddress) ? $res->customerBillingAddress['no'].' '.$res->customerBillingAddress['street_1'].' '.$res->customerBillingAddress['region'].' '.$res->customerBillingAddress['country'].' '.$res->customerBillingAddress['zipcode'].' '.$res->customerBillingAddress['contact_no'] : '-',
                            $name,
                            $res->shipping_item_count,
        					$res->sub_total,
                            $res->delivery_amount,
                            $res->packing_name,
        					$res->packing_amount,
        					($res->cardDetails) ? $res->cardDetails['print_price'] : '-',
        					$res->grand_total,
        				    ($res->artistDetails) ? $res->artistDetails['name'] : '-',
        					$res->artist_percent.'%',
        					$res->artist_revenue,
        					$res->affiliate_percent.'%',
        					$res->affiliate_revenue,
        					$res->admin_percent.'%',
        					$res->admin_revenue,
                            ($res->customerDetails) ? $res->customerDetails['bank_name'] : '-',
                            ($res->customerDetails) ? $res->customerDetails['sort_code'] : '-',
                            ($res->customerDetails) ? $res->customerDetails['account_number'] : '-',
                            ($res->customerDetails) ? $res->customerDetails['account_holder_name'] : '-',
                            $res->release_status,
        					$status,

        				];
        }
        // dd($sExport);
        return $collection = collect($sExport);
    }
}
