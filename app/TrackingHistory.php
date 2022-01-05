<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrackingHistory extends Model
{
    use SoftDeletes;  
    protected $table = 'tracking_history';
    protected $fillable = ['shipping_info_id','shipping_method','shipping_company','tracking_num','shipping_date','comments','order_status_id','order_id','item_id'];

    public function orderTrackProducts()
    {
        return $this->belongsTo('App\MerchandiseProduct','item_id','id');
    }
    public function orderItemlist()
    {
        return $this->belongsTo('App\OrderItem','item_id','id');
    }
    public function shippingList()
    {
        return $this->belongsTo('App\ShippingInfo','shipping_info_id','id');
    }
  
}
