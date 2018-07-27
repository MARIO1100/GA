<?php

namespace GolpeAvisa;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    // attributes
    protected $fillable = [
        'speed', 'date', 'time', 'day', 'location_id', 'user_id'
    ];

    public $timestamps = false;
}
