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
        Schema::create('jadwal_tayangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_film')->constrained('films')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_studio')->constrained('studios')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_teater')->constrained('teaters')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('tanggal_tayang');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');      
            $table->float('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_tayangs');
    }
};
