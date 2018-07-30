<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 */
class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pigeon_id', 'distance', 'deadline', 'cost', 'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pigeon()
    {
        return $this->belongsTo('App\Models\Pigeon');
    }
}
