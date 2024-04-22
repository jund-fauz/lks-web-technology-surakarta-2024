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
        Schema::create('ormas', function (Blueprint $table) {
            $table->integer('id_ormas')->autoIncrement();
            $table->integer('id_user');
            $table->tinyText('nama_ormas');
            $table->enum('status_legalitas', ['Berbadan Hukum','Tidak Berbadan Hukum']);
            $table->tinyText('alamat_kesekretariatan');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan');
            $table->string('nama_ketua', 50);
            $table->string('no_hp_ketua', 20);
            $table->string('surat_permohonan', 50);
            $table->enum('status', ['Daftar', 'Proses', 'Aktif']);

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatan');
            $table->foreign('id_kelurahan')->references('id_kelurahan')->on('kelurahan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ormas');
    }
};
