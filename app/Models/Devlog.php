<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Devlog extends Model
{
    protected $fillable = ['title', 'description','image', 'tags', 'content', 'creation_date'];
    protected $casts = [
        'tags' => 'array',
        'creation_date' => 'datetime'
    ];
    /** @use HasFactory<\Database\Factories\DevlogFactory> */
    use HasFactory;

    /**
     * Format creation_date safely: accept m-d-Y input, store as Y-m-d, display as "Month day, Year".
     */
    
}
