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
        Schema::create('sewa_alats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyewa');
            $table->text('alamat');
            $table->string('no_hp')->unique();
            $table->string('instansi')->nullable();
            $table->foreignId('alat_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('lama_sewa_hari')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa_alats');
    }
};
