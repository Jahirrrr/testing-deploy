<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenjangSekolahTable extends Migration
{
    public function up()
    {
        Schema::create('jenjang_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenjang', 10)->unique();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenjang_sekolah');
    }
}
