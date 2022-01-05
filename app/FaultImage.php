<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaultImage extends Model
{
    // use SoftDeletes;
    protected $table = 'faults_image';
    protected $fillable = ['fault_id','fault_image'];
    // protected $casts = [        
    //     'fault_image'  => 'array'
    // ];
}
