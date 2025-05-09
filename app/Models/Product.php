<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'brand',
        'category',
        'short_description',
        'description',
        'specifications',
        'features',
        'price',
        'sale_price',
        'stock_quantity',
        'weight',
        'dimensions',
        'material',
        'color',
        'size_options',
        'images',
        'reviews',
        'rating',
        'warranty',
        'shipping_details',
        'is_featured',
        'is_bestseller',
        'is_new',
        'is_published',
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
        'specifications' => 'array',
        'features' => 'array',
        'size_options' => 'array',
        'images' => 'array',
        'reviews' => 'array',
        'dimensions' => 'array',
        'seo_keywords' => 'array',
        'meta' => 'array',
        'is_featured' => 'boolean',
        'is_bestseller' => 'boolean',
        'is_new' => 'boolean',
        'is_published' => 'boolean',
    ];
}
