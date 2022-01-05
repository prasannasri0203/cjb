<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CartItemDetails extends Model
{
    use SoftDeletes;
    
    protected $table = 'cart_item_management';

    protected $fillable = ['cart_id', 'customer_id','merchandise_product_id', 'quantity','placed_date','status'];

    public function cartProducts()
    {
        return $this->belongsTo('App\MerchandiseProduct','merchandise_product_id');
    }

     public function merchandiseProduct()
    {
        return $this->hasOne('App\MerchandiseProduct','id','merchandise_product_id');
    }
}
