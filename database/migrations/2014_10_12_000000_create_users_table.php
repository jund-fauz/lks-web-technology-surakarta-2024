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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id_user')->autoIncrement();
            $table->string('username', 50);
            $table->string('password', 32);
            $table->string('nama_lengkap', 50);
            $table->string('email', 50);
            $table->string('no_hp', 20);
            $table->enum('level', ['Ormas', 'Admin']);
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
