<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CartDetails extends Model
{
    use SoftDeletes;
    
    protected $table = 'cart_management';

    protected $fillable = ['customer_id','packing_id','shipping_price', 'created_time', 'placed_time','completed_time','cancelled_time','notes','status'];

    public function cartItems()
    {
        return $this->hasMany('App\CartItemDetails','cart_id','id');
    }
}
