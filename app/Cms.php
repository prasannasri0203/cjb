<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cms extends Model
{
    use SoftDeletes;
    protected $table = 'cms';

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
