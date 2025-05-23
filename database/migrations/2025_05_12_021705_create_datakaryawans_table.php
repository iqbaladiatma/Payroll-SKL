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
        Schema::create('datakaryawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('nama');
            $table->string('nik')->default('0000000000'); // Nomor Induk Karyawan
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jabatan'); // misal: Staff, Manager
            $table->date('tanggal_masuk');
            $table->integer('gaji_pokok')->nullable();
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datakaryawans');
    }
};
