<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = [

        'zip', 'city_fullname', 'city_shortname'
    ];
}
