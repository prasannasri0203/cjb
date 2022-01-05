<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchandiseMaster extends Model
{
    //
    protected $table = 'merchandise_master';
    protected $fillable = ['product_id','artist_id','creation_name','created_at'];
}
