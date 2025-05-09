<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Core required fields
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price', 10, 2);
            $table->integer('stock_quantity')->default(0);

            // Nullable product identifiers
            $table->string('sku')->nullable()->unique();
            $table->string('brand')->nullable();
            $table->string('category')->nullable();

            // Nullable descriptions
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();

            // Nullable specifications
            $table->json('specifications')->nullable();
            $table->json('features')->nullable();

            // Nullable pricing
            $table->decimal('sale_price', 10, 2)->nullable();

            // Nullable physical attributes
            $table->decimal('weight', 8, 2)->nullable()->comment('in grams');
            $table->json('dimensions')->nullable()->comment('{length, width, height} in cm');
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->json('size_options')->nullable();

            // Nullable media
            $table->json('images')->nullable();

            // Nullable reviews
            $table->json('reviews')->nullable();
            $table->decimal('rating', 3, 1)->nullable();

            // Nullable product details
            $table->string('warranty')->nullable();
            $table->text('shipping_details')->nullable();

            // Status flags with defaults
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_bestseller')->default(false);
            $table->boolean('is_new')->default(true);
            $table->boolean('is_published')->default(true);

            // Nullable SEO fields
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();
            $table->json('meta')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
