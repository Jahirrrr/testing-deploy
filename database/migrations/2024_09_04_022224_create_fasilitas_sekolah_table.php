<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasSekolahTable extends Migration
{
    public function up()
    {
        Schema::create('fasilitas_sekolah', function (Blueprint $table) {
            $table->id();
            $table->text('fasilitas_pendukung');
            $table->text('dukungan_untuk_siswa');
            $table->text('kegiatan_lainnya')->nullable();
            $table->text('dokumentasi')->nullable();
            $table->text('kualifikasi_yang_dimiliki');
            $table->text('dokumentasi_fasilitas')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fasilitas_sekolah');
    }
}
