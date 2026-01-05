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
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_beasiswa');       // nama beasiswa
            $table->text('deskripsi')->nullable(); // deskripsi beasiswa
            $table->date('tanggal_mulai');         // tanggal mulai
            $table->date('tanggal_selesai');       // tanggal selesai
            $table->integer('jumlah_penerima')->default(0); // jumlah penerima
            $table->string('status')->default('aktif');     // status beasiswa

            // Relasi ke penyedia beasiswa
            $table->unsignedBigInteger('penyediabeasiswa_id');
            $table->foreign('penyediabeasiswa_id')
                ->references('id')
                ->on('penyediabeasiswa')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
