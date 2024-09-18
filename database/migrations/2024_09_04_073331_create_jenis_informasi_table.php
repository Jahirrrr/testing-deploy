<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisInformasiTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_informasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis', 25)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_informasi');
    }
}
