<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',

        'is_published',

        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
