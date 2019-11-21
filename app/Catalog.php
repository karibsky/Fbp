<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    public $timestamps = false;
    protected $table = 'catalog';
    protected $fillable = [
        'id','article', 'name', 'description', 'category', 'price', 'picture'
    ];
}
