<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skpi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('program_studi');
            $table->string('nim');
            $table->string('lama_studi');
            $table->string('tahun_masuk');
            $table->date('tanggal_lulus');
            $table->string('judul');
            $table->string('ijazah');
            $table->string('toefl');
            $table->text('pencapaian');
            $table->text('sertifikasi');
            $table->text('beasiswa');
            $table->text('organisasi');
            $table->string('status_warna');
            $table->string('status_keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skpis');
    }
};
