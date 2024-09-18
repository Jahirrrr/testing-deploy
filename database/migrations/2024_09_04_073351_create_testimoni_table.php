<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimoniTable extends Migration
{
    public function up()
    {
        Schema::create('testimoni', function (Blueprint $table) {
            $table->id();
            $table->string('nama_testimoni', 50);
            $table->text('body')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testimoni');
    }
}
