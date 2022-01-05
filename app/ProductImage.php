<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * Get product variant of the image.
     */
    public function ImageVariant()
    {
        return $this->belongsTo('App\Product_variant','id','product_variant_id');
    }

    /**
     * Get product of the image.
     */
    public function ImageProduct()
    {
        return $this->belongsTo('App\Product','id','product_id');
    }
}
