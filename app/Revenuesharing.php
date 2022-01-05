<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revenuesharing extends Model
{

    use SoftDeletes;
    protected $table = "revenue_sharing";

    protected $fillable = [
        'setting_name', 'setting_key', 'setting_value', 'setting_status', 'setting_desc'
    ];
    public $timestamps = false;

}
