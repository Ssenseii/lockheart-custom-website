<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();

            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->json('features')->nullable();
            $table->json('workflow_steps')->nullable();

            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->string('pricing_note')->nullable();

            $table->string('image_url')->nullable();
            $table->json('gallery')->nullable();
            $table->string('video_url')->nullable();

            $table->json('testimonials')->nullable();
            $table->json('case_studies')->nullable();
            $table->json('faqs')->nullable();

            $table->text('cta_text')->nullable();
            $table->string('cta_button_label')->nullable();
            $table->string('cta_button_url')->nullable();

            $table->json('trust_badges')->nullable();

            $table->json('tags')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();

            $table->json('meta')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
