<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;
    
    protected $table = 'order_item';

    protected $fillable = ['order_id','merchandise_product_id','supplier_id','product_price','product_quantity','artist_id','artist_percent','artist_revenue','affiliate_id','affiliate_percent','affiliate_revenue','admin_percent','admin_revenue','status'];

    public function orderDetails()
    {
        return $this->belongsTo('App\OrderDetails','order_id','id');
    }
    public function supplierName()
    {
        return $this->belongsTo('App\Supplier','supplier_id','id');
    }
    public function orderProducts()
    {
        return $this->belongsTo('App\MerchandiseProduct','merchandise_product_id','id');
    }

    public function get_images()
    {
        return $this->hasOne('App\MerchandiseProductImages','merch_product_id','merchandise_product_id');
    }
    public function CustomerDetails()
    {
          return $this->belongsTo('App\User','customer_id','id');
    }
    
}
