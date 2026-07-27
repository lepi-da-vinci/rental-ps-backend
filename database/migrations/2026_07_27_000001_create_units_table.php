<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_id')->unique(); // e.g. 'PS4-01', 'PS5-VIP-01'
            $table->string('ps_type');           // 'ps4', 'ps5', 'ps5Vip', 'nintendoVip'
            $table->string('label');             // e.g. 'Unit 1', 'Ruang 1'
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
