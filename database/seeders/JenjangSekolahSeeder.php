<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangSekolahSeeder extends Seeder
{
    public function run()
    {
        DB::table('jenjang_sekolah')->insert([
            ['nama_jenjang' => 'SD'],
            ['nama_jenjang' => 'SMP'],
            ['nama_jenjang' => 'SMA'],
            ['nama_jenjang' => 'SMK'],
        ]);
    }
}
