<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JmlKapitaSekolahSeeder extends Seeder
{
    public function run()
    {
        DB::table('jml_kapita_sekolah')->insert([
            'jml_guru' => 10,
            'jml_guru_pendidikan_khusus' => 2,
            'jml_peserta_didik' => 300,
            'jml_peserta_didik_disabilitas' => 5,
            'jml_netra' => 1,
            'jml_rungu' => 2,
            'jml_wicara' => 0,
            'jml_daska' => 0,
            'jml_lumpuh_layu' => 0,
            'jml_paraplegi' => 0,
            'jml_celebral_palsy' => 0,
            'jml_kesulitan_belajar' => 3,
            'jml_autis' => 1,
            'jml_hiperaktif' => 4,
            'jml_rungu_wicara' => 0,
            'jml_netra_rungu' => 0,
            'jml_lainnya' => 0,
        ]);
    }
}
