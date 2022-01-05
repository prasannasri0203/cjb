<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchandiseProductImages extends Model
{
    protected $table = 'merchandise_product_images';
    protected $fillable = ['product_id','merch_product_id','product_variant_id','image']; 


    public function merch_image()
    {
        return $this->belongsTo('App\MerchandiseProduct','merch_product_id','id');
    }

    public function ProductDetails()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }
  
    // public function merchProductName()
    // {
    //     return $this->belongsTo('App\MerchandiseProduct','merch_product_id','id');
    // }
}
