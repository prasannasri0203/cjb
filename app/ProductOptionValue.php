<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOptionValue extends Model
{
    protected $table = 'product_option_values';
	protected $fillable = ['id','product_option_id','name','color_code'];  
}
