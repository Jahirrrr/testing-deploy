<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kapita_id');
            $table->unsignedBigInteger('fasilitas_id');
            $table->string('nama_sekolah', 100)->unique();
            $table->string('NPSN', 8)->unique();
            $table->text('alamat');
            $table->string('kecamatan', 50);
            $table->unsignedBigInteger('jenjang_id');
            $table->string('no_telepon', 20)->unique();
            $table->string('email', 50)->nullable()->unique();
            $table->string('link_website', 255)->nullable();
            $table->string('nama_kontak_person', 50);
            $table->string('jabatan', 25);
            $table->string('slug')->unique();
            $table->timestamps();

            // Foreign keys
            $table->foreign('kapita_id')->references('id')->on('jml_kapita_sekolah')->onDelete('cascade');
            $table->foreign('fasilitas_id')->references('id')->on('fasilitas_sekolah')->onDelete('cascade');
            $table->foreign('jenjang_id')->references('id')->on('jenjang_sekolah')->onDelete('cascade');

            // Indexes
            $table->index('kapita_id');
            $table->index('fasilitas_id');
            $table->index('jenjang_id');
            $table->index('nama_sekolah');
            $table->index('NPSN');
            $table->index('kecamatan');
            $table->index('slug');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil_sekolah');
    }
}
