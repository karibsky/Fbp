<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'fullName', 'icon', 'picture', 'description', 'section1', 'section2', 'section3', 'section4', 'sectionsDesc1', 'sectionsDesc2', 'sectionsDesc3', 'sectionsDesc4'
    ];
}
