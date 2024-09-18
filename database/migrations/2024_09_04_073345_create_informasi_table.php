<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiTable extends Migration
{
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('jenis_id')->constrained('jenis_informasi')->onDelete('cascade');
            $table->string('gambar', 255);
            $table->string('judul', 50);
            $table->text('body');
            $table->date('tanggal_pengadaan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('informasi');
    }
}
