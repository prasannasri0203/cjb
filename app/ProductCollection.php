<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductCollection extends Model
{
    use SoftDeletes;

    protected $table = "product_collections";

    public function product(){
        return $this->hasOne('App\Product', 'id', 'product_id');
    }
}
