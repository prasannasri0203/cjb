<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;
    
    protected $table = 'categories';

    protected $fillable = ['parent_id', 'category_name', 'status','created_by','updated_by'];

    /**
     * Get all of the products for the category.
     */
    public function product_category()
    {
        return $this->hasMany('App\Product','category_id','id');
    }

}
