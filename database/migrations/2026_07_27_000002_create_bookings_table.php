<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->string('id')->primary(); // e.g. 'BK-171289312'
            $table->string('customer_name');
            $table->string('phone')->nullable();
            $table->string('ps_type');      // 'ps4', 'ps5', 'ps5Vip', 'nintendoVip'
            $table->date('date');
            $table->string('time');         // e.g. '14:00'
            $table->integer('duration_hours')->default(1);
            $table->string('assigned_unit'); // e.g. 'PS4 Unit 1'
            $table->boolean('is_walk_in')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
