<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = [
        'title',
        'slug',

        'industry_sector',
        'excerpt',

        'featured_image',

        'content',

        'is_published',

        'seo_title',
        'seo_description',

        'tags',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
