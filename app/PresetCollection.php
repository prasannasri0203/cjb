<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PresetCollection extends Model
{
    use SoftDeletes;

    public function collections(){
        return $this->belongsToMany(Product::class, 'product_collections')->with('product_category');
    }
    public function collection(){
        return $this->hasMany('App\ProductCollection', 'preset_collection_id', 'id');
    }
}
