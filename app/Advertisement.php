<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisement';
     protected $fillable = ['price', 'name','desciption','img'];
     public $timestamps = false;
}
