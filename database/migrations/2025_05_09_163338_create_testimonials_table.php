<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_title')->nullable();
            $table->string('client_company')->nullable();
            $table->text('content');
            $table->integer('rating')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('avatar')->nullable();
            $table->boolean('is_published')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
};
