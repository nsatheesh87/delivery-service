<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Scope\PigeonScope;

/**
 * Class Pigeon
 * @package App\Models
 */
class Pigeon extends Model
{

    use PigeonScope;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'speed', 'range', 'cost', 'downtime', 'availability', 'rest_count'
    ];
}
