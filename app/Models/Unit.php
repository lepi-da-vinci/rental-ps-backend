<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'ps_type',
        'label',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];
}
