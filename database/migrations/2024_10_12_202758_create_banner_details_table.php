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
        Schema::create('banner_details', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('size');
            $table->string('duration')->nullable();
            $table->string('resolution');
            $table->foreignId('banner_id')->constrained('banners')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_details');
    }
};
