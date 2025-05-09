<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // Logo path
            $table->string('logo_path')->nullable();

            // Email fields
            $table->string('email_main')->nullable();
            $table->string('email_support')->nullable();
            $table->string('email_info')->nullable();

            // Meta fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // Social media fields
            $table->string('social_facebook')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_linkedin')->nullable();
            $table->string('social_tiktok')->nullable();
            $table->string('social_youtube')->nullable();
            $table->string('social_extra_1')->nullable();
            $table->string('social_extra_2')->nullable();
            $table->string('social_extra_3')->nullable();
            $table->string('social_extra_4')->nullable();

            // Contact phone fields
            $table->string('contact_phone_1')->nullable();
            $table->string('contact_phone_2')->nullable();
            $table->string('contact_phone_3')->nullable();

            // WhatsApp fields
            $table->string('whatsapp_phone_1')->nullable();
            $table->string('whatsapp_phone_2')->nullable();
            $table->string('whatsapp_phone_3')->nullable();

            // Address fields
            $table->text('contact_address_1')->nullable();
            $table->text('contact_address_2')->nullable();
            $table->text('contact_address_3')->nullable();
            $table->text('contact_address_4')->nullable();

            // Mode flags
            $table->boolean('maintenance_mode')->default(false);
            $table->boolean('developer_mode')->default(false);

            // Feature flags
            $table->boolean('enable_emails')->default(true);
            $table->boolean('enable_social')->default(true);
            $table->boolean('enable_contact')->default(true);
            $table->boolean('enable_whatsapp')->default(true);
            $table->boolean('enable_locations')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
