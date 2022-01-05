<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Featured_video extends Model
{
    use SoftDeletes;

    protected $fillable = ['video_link','video_description','type'];
}
