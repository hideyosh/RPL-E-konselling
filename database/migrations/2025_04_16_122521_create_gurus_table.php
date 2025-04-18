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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama', 20);
            $table->string('nip', 20);
            $table->string('telpon', 13);
            $table->enum('jenis_kelamin', ['laki-laki','perempuan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
