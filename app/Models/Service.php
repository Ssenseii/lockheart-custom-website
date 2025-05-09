<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'category',
        'short_description',
        'description',
        'features',
        'workflow_steps',
        'price',
        'discount_price',
        'pricing_note',
        'image_url',
        'gallery',
        'video_url',
        'testimonials',
        'case_studies',
        'faqs',
        'cta_text',
        'cta_button_label',
        'cta_button_url',
        'trust_badges',
        'tags',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'meta'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'features' => 'array',
        'workflow_steps' => 'array',
        'gallery' => 'array',
        'testimonials' => 'array',
        'case_studies' => 'array',
        'faqs' => 'array',
        'trust_badges' => 'array',
        'tags' => 'array',
        'seo_keywords' => 'array',
        'meta' => 'array',
    ];
}
