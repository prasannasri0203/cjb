<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Product;

class Supplier extends Model
{
     use SoftDeletes;
     protected $table = "suppliers";

     protected $fillable = ['name', 'address', 'email','phone_number','status','primary_conduct','position','general_notes','payment_terms'];
     public function getSupplier()
     {
          return $this->hasOne('App\OrderItem','id','supplier_id');
     }

// pivot table in ProductSupplier an supplier and to product inter table in ProductSupplier
    public function productList()
    {
        return $this->belongsToMany(Product::Class,'product_supplier','supplier_id', 'product_id');
    }
}
