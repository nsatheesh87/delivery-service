<?php

namespace App;

class Pigeon extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'speed', 'range', 'cost', 'downtime', 'is_active'
    ];

}
