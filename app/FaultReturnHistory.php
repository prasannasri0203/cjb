<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FaultReturnHistory extends Model
{
    use SoftDeletes;
    protected $table = 'faults_returns_history';
    protected $fillable = ['fault_id','status','remarks'];
}
