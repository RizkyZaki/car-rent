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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('keyword');
            $table->string('logo');
            $table->text('description');
            $table->string('overrage_text');
            $table->string('overrage_image');
            $table->string('phone');
            $table->string('contact_phone');
            $table->string('email');
            $table->json('benefit');
            $table->string('text_copyrigth');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
