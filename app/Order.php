<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'date_start',  'city_start_id','city_finish_id', 'date_finish', 'sum', 'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function cityStart(){
        return $this->belongsTo('App\City', 'city_start_id', 'id');
    }

    public function cityFinish(){
        return $this->belongsTo('App\City', 'city_finish_id', 'id');
    }

}
