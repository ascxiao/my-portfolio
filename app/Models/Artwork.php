<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = ['source', 'title', 'creation_date', 'tags'];
    protected $casts = [
        'tags' => 'array',
        'creation_date' => 'datetime',
    ];

    /** @use HasFactory<\Database\Factories\ArtworkFactory> */
    use HasFactory;
}
