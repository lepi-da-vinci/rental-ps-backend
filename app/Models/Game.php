<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'title',
        'genre',
        'platform',
        'image_url',
        'description',
        'player_count',
        'rating',
        'publisher',
        'release_year',
        'popular_rank',
    ];

    protected $casts = [
        'release_year' => 'integer',
        'popular_rank' => 'integer',
    ];
}
