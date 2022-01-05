<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class FeaturedVideo extends Model
{

    protected $fillable = ['video_link','video_description','type'];
}
