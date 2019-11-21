<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'lastname','patronymic', 'email', 'phone', 'IDversion', 'regnumber', 'organisation', 'password', 'isAdmin'
    ];

   
    protected $hidden = [
        'remember_token'
    ];

    public $timestamps = false;
}
