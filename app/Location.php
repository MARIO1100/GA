<?php

namespace GolpeAvisa;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // attributes
    protected $fillable = [
        'latitud', 'longitud'
    ];

    public $timestamps = false;
}
