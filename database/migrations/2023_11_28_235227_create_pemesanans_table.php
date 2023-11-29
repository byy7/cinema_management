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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jadwal_tayang')->constrained('jadwal_tayangs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_user')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_kursi')->constrained('kursis')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('status');
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
