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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('guru_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('isi_pengaduan');
            $table->enum('status', ['belum dibaca', 'dibaca'])->default('belum dibaca');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
