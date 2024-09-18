<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisInformasi;

class JenisInformasiSeeder extends Seeder
{
    public function run()
    {
        $jenisInformasi = [
            ['nama_jenis' => 'Berita'],
            ['nama_jenis' => 'Pengumuman'],
            ['nama_jenis' => 'Event'],
        ];

        foreach ($jenisInformasi as $jenis) {
            JenisInformasi::create($jenis);
        }
    }
}
