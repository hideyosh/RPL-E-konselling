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
        Schema::create('hasil_konsellings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsellings_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('ringkasan');
            $table->text('catatan_guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_konsellings');
    }
};
