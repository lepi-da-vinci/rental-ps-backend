<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'customer_name',
        'phone',
        'ps_type',
        'date',
        'time',
        'duration_hours',
        'assigned_unit',
        'is_walk_in',
    ];

    protected $casts = [
        'is_walk_in' => 'boolean',
        'duration_hours' => 'integer',
        'date' => 'date:Y-m-d',
    ];
}
