<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryAndPacking extends Model
{

    use SoftDeletes;
    protected $table = "delivery_and_packing";

    protected $fillable = [
       'type','delivery_name', 'delivery_key', 'delivery_value', 'delivery_status', 'delivery_desc'
    ];
    public $timestamps = false;

}
