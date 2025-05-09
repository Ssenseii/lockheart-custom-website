<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'requirements',
        'responsibilities',
        'location',
        'job_type',
        'salary_min',
        'salary_max',
        'is_remote',
        'is_published',
        'application_deadline'
    ];

    protected $casts = [
        'is_remote' => 'boolean',
        'is_published' => 'boolean',
        'application_deadline' => 'date',
    ];
}
