<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    public $timestamps = false;
    protected $table = 'subcategory';
    protected $fillable = [
        'id', 'text', 'idcategory'
    ];
}
