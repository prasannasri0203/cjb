<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
class Refferal extends Model
{
    // use SoftDeletes;
    protected $table = "refferal";
	protected $fillable = [
        'user_id', 
        'reg_id', 
        'user_email',
        'description',    
        'status',
    ];
}
