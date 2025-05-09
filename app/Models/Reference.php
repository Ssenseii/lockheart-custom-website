<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $fillable = [
        'company_logo',
        'company_name',

        'title',
        'description',

        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
