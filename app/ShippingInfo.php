<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingInfo extends Model
{
    use SoftDeletes;  
    protected $table = 'shipping_info';
    protected $fillable = ['order_id','status']; 

    public function trackingList()
    {
        return $this->hasOne('App\TrackingHistory','shipping_info_id','id');
    }

}
