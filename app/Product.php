<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Supplier;

class Product extends Model 
{
    use SoftDeletes;

    protected $table = "products";

    protected $fillable = ['category_id', 'sub_category_id', 'product_name','product_description','product_image','tax','status','supplier_id','reference_number','created_by','updated_by'];

    protected $casts = [ 'product_image'  => 'array' ];

    public function product_variant()
    {
        return $this->hasMany('App\Product_variant');
    }
    public function supplierName()
    {
        return $this->belongsTo('App\Supplier','supplier_id','id');
    }

    /**
     * Get all of the categories for the product.
     */
    public function product_category()
    {
        return $this->hasMany('App\Categories','id','category_id');
    }

    /**
     * Get Category of the product.
     */
    public function ProductCategory()
    {
        return $this->belongsTo('App\Categories','category_id','id');
    }

    /**
     * Get all of the categories for the product.
     */
    public function ProductImages()
    {
        return $this->hasMany('App\ProductImage','product_id','id');
    } 

    // public function ProductSuppliers()
    // {
    //     return $this->hasMany('App\ProductSupplier','product_id','id');
    // }
    // pivot table in ProductSupplier
    public function productSuppliersList()
    {
        return $this->belongsToMany(Supplier::Class, 'App\ProductSupplier', 'product_id','supplier_id');
    }

     /**
     * Get all of the categories for the product.
     */
    public function merch_produt()
    {
        return $this->hasMany('App\MerchandiseProduct','product_id','id');
    }

   
}
