<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = ['title', 'provider','description','image','acquired_date', 'link'];
    protected $casts = [
        'acquired_date' => 'datetime'
    ];
    /** @use HasFactory<\Database\Factories\CertificationFactory> */
    use HasFactory;
}
