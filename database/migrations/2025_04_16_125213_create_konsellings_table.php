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
        Schema::create('konsellings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('janji_temu');
            $table->string('topik_masalah');
            $table->enum('status', ['menunggu', 'dikonfirmasi', 'dijadwalkan ulang'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsellings');
    }
};
