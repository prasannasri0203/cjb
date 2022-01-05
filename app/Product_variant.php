<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_variant extends Model
{
    use SoftDeletes;

	protected $table = "product_variants";

	public $timestamps = false;

    protected $fillable = ['product_id', 'variant_name', 'option_id','value_id','sku','product_image','price','quantites','width','height','status','created_by','updated_by','created_at','updated_at'];

    protected $casts = [
        'product_image'  => 'array'
    ];

    /**
     * Get Category of the product.
     */
    public function VariantProduct()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }

    /**
     * Get all of the categories for the product.
     */
    public function ProductImages()
    {
        return $this->hasMany('App\ProductImage','product_variant_id','id');
    }

    
}
