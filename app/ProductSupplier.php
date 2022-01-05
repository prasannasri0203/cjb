<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSupplier extends Model
{
      protected $table = 'product_supplier';
	protected $fillable = ['id','product_id','supplier_id']; 
	
}
