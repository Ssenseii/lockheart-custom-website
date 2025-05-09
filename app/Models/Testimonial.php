<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /** @use HasFactory<\Database\Factories\TestimonialFactory> */
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_title',
        'client_company',
        'content',
        'rating',
        'is_featured',
        'avatar',
        'is_published',
    ];

    
    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'rating' => 'integer',
    ];
}
