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
        Schema::create('proses', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel pendaftar
            $table->foreignId('pendaftar_id')
                ->constrained('pendaftar')
                ->onDelete('cascade');

            // Relasi ke tabel beasiswa
            $table->foreignId('beasiswa_id')
                ->constrained('beasiswa')
                ->onDelete('cascade');

            // Status proses (pending, diterima, ditolak)
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses');
    }
};
