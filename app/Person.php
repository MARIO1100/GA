<?php

namespace GolpeAvisa;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    // attributes
    protected $fillable = [
        'name', 'lastname', 'dateOfBirth',
    ];

    public $timestamps = false;
}
