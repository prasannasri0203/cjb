<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class FaultReturn extends Model
{
    use SoftDeletes;
    use Commentable;
    protected $table = 'faults_returns';
    protected $fillable = ['order_id','product_id','customer_id','staff_id','remarks','assign_staff_id'];


    // public function fault_history(){
    //     return $this->hasMany('App\FaultReturnHistory');
    // }

    public function fault_history()
    {
        return $this->belongsTo('App\FaultReturnHistory','id','fault_id');
    }

    /**
     * The product that belong to the category.
     */
    public function fault_image()
    {
        return $this->belongsTo('App\FaultImage','id','fault_id');
    }

    public function customerName()
    {
        return $this->belongsTo('App\User','customer_id','id');
    }

    public function staffName()
    {
        return $this->belongsTo('App\User','assign_staff_id','id');
    }

    public function orderDetails()
    {
        return $this->belongsTo('App\OrderDetails','order_id','id');
    }
}
