<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderCustomerAddressDetails extends Model
{
    use SoftDeletes;
    
    protected $table = 'order_customer_address_management';

    protected $fillable = ['customer_id','delivery_name','no','street_1','street_2','region','country','zipcode','contact_no','landmark','is_primary','status',]; 
                           
}
