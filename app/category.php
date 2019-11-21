<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps = false;
    protected $table = 'category';
    protected $fillable = [
        'id', 'text', 'url'
    ];
}
