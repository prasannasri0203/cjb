<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use SoftDeletes;
    
    protected $table = 'order_management';

    protected $fillable = ['order_id','cart_id','order_ref_number','customer_id','billing_address_id','shipping_address_id',
                           'payment_type','shipping_item_count','sub_total','tax_total','discount_total','shipping_total', 
                           'grand_total','order_api_response','notes','artist_id','artist_percent','artist_revenue',
                           'affiliate_id','affiliate_percent','affiliate_revenue','admin_percent','admin_revenue','status'];
    public function orderItemDetails()
    {
        return $this->hasMany('App\OrderItem','order_id','id');
    }
    
    public function customerBillingAddress()
    {
        return $this->belongsTo('App\OrderCustomerAddressDetails','billing_address_id');
    }

    public function customerDetails()
    {
        return $this->belongsTo('App\User','customer_id','id');
    }
    public function artistDetails()
    {
        return $this->belongsTo('App\User','artist_id','id');
    }
     public function cardDetails()
    {
        return $this->belongsTo('App\CartDetails','cart_id','id');
    }
     
    // public function productDetails()
    // {
    //      return $this->join('App\Product as p','p.id','App\OrderItem.merchandise_product_id');
    // }


}
