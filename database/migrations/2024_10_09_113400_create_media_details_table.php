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
        Schema::create('media_details', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('size');
            $table->string('duration')->nullable();
            $table->string('resolution');
            $table->string('download_count')->default(0);
            $table->foreignId('media_id')->constrained('media')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_details');
    }
};
