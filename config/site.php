<?php

return [
    'name' => env('SITE_NAME', 'My Awesome Site'),
    'company' => env('COMPANY_NAME', 'My Company LLC'),
    'twitter' => env('TWITTER_HANDLE', '@MyCompany'),
    'meta' => [
        'description' => env('META_DESCRIPTION', 'Default description for SEO'),
        'keywords' => env('META_KEYWORDS', 'default, keywords'),
        'og_title' => env('OG_TITLE', 'Default Open Graph Title'),
        'og_description' => env('OG_DESCRIPTION', 'Default Open Graph Description'),
    ],
];
