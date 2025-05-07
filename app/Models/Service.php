<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'features',
        'price',
        'discount_price',
        'image_url',
        'tags',
        'seo_keywords',
        'meta'
    ];

    protected $casts = [
        'features' => 'array',
        'tags' => 'array',
        'seo_keywords' => 'array',
        'meta' => 'array',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
    ];
}
