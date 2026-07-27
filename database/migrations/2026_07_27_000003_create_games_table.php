<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('title');
            $table->string('genre');
            $table->string('platform');
            $table->string('image_url')->nullable();
            $table->text('description')->nullable();
            $table->string('player_count')->nullable();
            $table->string('rating')->nullable();
            $table->string('publisher')->nullable();
            $table->integer('release_year')->nullable();
            $table->integer('popular_rank')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
