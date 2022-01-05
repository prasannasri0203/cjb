<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistMerchandiseProduct extends Model
{
    /**
     * Get product of the artist merchandise product.
     */
    public function AMProduct()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }
}
