<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $fillable = ['title', 'description','date','image', 'tags', 'duration', 'content', 'metrics', 'role', 'team'];
    protected $casts = [
        'tags' => 'array',
        'metrics' => 'array',
        'date' => 'datetime',
        'content' => 'array'
    ];
    /** @use HasFactory<\Database\Factories\CaseStudyFactory> */
    use HasFactory;
}
