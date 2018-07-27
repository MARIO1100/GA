<?php

namespace GolpeAvisa;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Attributes
    protected $fillable = [
        'id', 'name', 'cellphone', 'user_id'
    ];

    public $timestamps = false;
}
