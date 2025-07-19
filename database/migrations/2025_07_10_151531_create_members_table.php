<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('telepon', 20);
            $table->string('email', 100)->nullable();
            $table->string('pekerjaan', 100);
            $table->string('program', 100);
            $table->enum('metode_pembayaran', ['Transfer Bank', 'E-Wallet', 'Tunai']);
            $table->string('bukti_pembayaran_path'); // Path penyimpanan file bukti
            $table->enum('status', ['pendaftar', 'anggota aktif', 'keluar'])->default('pendaftar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members'); // Diperbaiki dari 'memberships'
    }
};