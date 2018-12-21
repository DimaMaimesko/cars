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



}
