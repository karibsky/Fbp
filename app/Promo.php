<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    public $timestamps = false;
	protected $table = 'promo';
    protected $fillable = [
        'id', 'title','text', 'url'
    ];
}
