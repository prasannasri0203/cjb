<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class enquiry extends Model
{
    use Notifiable;

    protected $table = "enquiry";
    protected $fillable = ['name','email','subject','description'];
}
