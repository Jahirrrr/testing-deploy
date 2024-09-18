<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenTable extends Migration
{
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_panduan', 50);
            $table->text('deskripsi')->nullable();
            $table->foreignId('jenis_dokumen_id')->constrained('jenis_dokumen');
            $table->string('image')->nullable();
            $table->string('dokumen_link')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
}