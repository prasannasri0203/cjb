<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchandiseProduct extends Model
{
    use SoftDeletes;
    protected $table = 'merchandise_products';

    public function artistName()
    {
        return $this->belongsTo('App\ArtistCategory','artist_category_id','id');
    }

    public function variantColor()
    {
        return $this->hasOne('App\Product_variant','id','product_variant_id');
    }

    public function ProductDetails()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    public function artistDetails()
    {
        return $this->belongsTo('App\User','artist_id','id');
    }

    public function variantDetails()
    {
        return $this->belongsTo('App\Product_variant','product_variant_id','id');
    }

    public function merchProductImage()
    {
        return $this->hasMany('App\MerchandiseProductImages','merch_product_id','id');
    }
    
    public function getImages()
    {
        return $this->belongsTo('App\MerchandiseProductImages','id','merch_product_id');
    }
}
