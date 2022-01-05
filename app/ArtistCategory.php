<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistCategory extends Model
{
    protected $table = 'artist_category';

    public function artistCategoryName() {
        return $this->belongsTo('App\MerchandiseProduct','id','artist_category_id');
    }

    public function artistCategory() {
        return $this->hasMany('App\MerchandiseProduct','artist_category_id','id');
    }
    public function MerchandiseMaster() {
        return $this->hasMany('App\MerchandiseMaster','creation_name','category_name');
    }
    public function userDetails() {  
    	return $this->belongsTo('App\User','user_id','id');
    }
}
