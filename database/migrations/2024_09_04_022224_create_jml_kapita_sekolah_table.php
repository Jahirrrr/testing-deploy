<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJmlKapitaSekolahTable extends Migration
{
    public function up()
    {
        Schema::create('jml_kapita_sekolah', function (Blueprint $table) {
            $table->id();
            $table->integer('jml_guru')->default(0);
            $table->integer('jml_guru_pendidikan_khusus')->default(0);
            $table->integer('jml_peserta_didik')->default(0);
            $table->integer('jml_peserta_didik_disabilitas')->default(0);
            $table->integer('jml_netra')->default(0);
            $table->integer('jml_rungu')->default(0);
            $table->integer('jml_wicara')->default(0);
            $table->integer('jml_daska')->default(0);
            $table->integer('jml_lumpuh_layu')->default(0);
            $table->integer('jml_paraplegi')->default(0);
            $table->integer('jml_celebral_palsy')->default(0);
            $table->integer('jml_kesulitan_belajar')->default(0);
            $table->integer('jml_autis')->default(0);
            $table->integer('jml_hiperaktif')->default(0);
            $table->integer('jml_rungu_wicara')->default(0);
            $table->integer('jml_netra_rungu')->default(0);
            $table->integer('jml_lainnya')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jml_kapita_sekolah');
    }
}
