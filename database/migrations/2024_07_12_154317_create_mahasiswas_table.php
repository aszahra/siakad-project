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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->nim();
            $table->nik();
            $table->tempat_lahir();
            $table->tanggal_lahir();
            $table->jk();
            $table->dusun();
            $table->rtrw();
            $table->kelurahan();
            $table->kecamatan();
            $table->kota();
            $table->kode_pos();
            $table->no_hp();
            $table->pendidikan_terakhir();
            $table->asal_sekolah();
            $table->jurusan_sekolah();
            $table->tahun_lulus();
            $table->kode_kelas();
            $table->tahun_angkatan();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
