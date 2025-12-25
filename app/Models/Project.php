<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description','image', 'tags', 'duration', 'link'];
    protected $casts = ['tags' => 'array'];

    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
}
