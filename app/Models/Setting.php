<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo_path',
        'catalogue_pdf',

        'email_main',
        'email_support',
        'email_info',
        
        'meta_title',
        'meta_description',
        'meta_keywords',
        
        'social_facebook',
        'social_twitter',
        'social_instagram',
        'social_linkedin',
        'social_tiktok',
        'social_youtube',
        'social_extra_1',
        'social_extra_2',
        'social_extra_3',
        'social_extra_4',
        
        'contact_phone_1',
        'contact_phone_2',
        'contact_phone_3',
        
        'whatsapp_phone_1',
        'whatsapp_phone_2',
        'whatsapp_phone_3',
        
        'contact_address_1',
        'contact_address_2',
        'contact_address_3',
        'contact_address_4',

        'maintenance_mode',
        'developer_mode',

        'enable_emails',
        'enable_social',
        'enable_contact',
        'enable_contact',
        'enable_locations',
    ];

    protected $casts = [
        'maintenance_mode' => 'boolean',
        'developer_mode' => 'boolean',
        
        'enable_emails' => 'boolean',
        'enable_social' => 'boolean',
        'enable_contact' => 'boolean',
        'enable_whatsapp' => 'boolean',

        'enable_locations' => 'boolean',

        'meta_keywords' => 'array'
    ];
}
