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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama', 20)->nullable();
            $table->string('nisn', 12)->nullable();
            $table->enum('kelas', ['10', '11', '12'])->nullable();
            $table->enum('jurusan', ['AKL', 'BDP', 'OTKP', 'DKV', 'RPL'])->nullable();
            $table->enum('jenis_kelamin', ['laki-laki','perempuan'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
