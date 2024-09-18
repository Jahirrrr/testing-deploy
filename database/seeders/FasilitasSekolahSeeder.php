<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSekolahSeeder extends Seeder
{
    public function run()
    {
        DB::table('fasilitas_sekolah')->insert([
            [
                'fasilitas_pendukung' => 'Ruang kelas, Laboratorium, Perpustakaan',
                'dukungan_untuk_siswa' => 'Ruang belajar yang nyaman, fasilitas IT',
                'kegiatan_lainnya' => 'Olahraga, Seni',
                'dokumentasi' => 'Foto-foto kegiatan sekolah',
                'kualifikasi_yang_dimiliki' => 'Guru berpengalaman',
                'dokumentasi_fasilitas' => 'Foto-fasilitas',
            ],
        ]);
    }
}
