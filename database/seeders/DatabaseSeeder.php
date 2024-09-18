<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JenjangSekolahSeeder::class,
            JmlKapitaSekolahSeeder::class,
            FasilitasSekolahSeeder::class,
            ProfilSekolahSeeder::class,
            DokumentasiSekolahSeeder::class,
            JenisInformasiSeeder::class,
            InformasiSeeder::class,
            TestimoniSeeder::class,
            FeedbackSeeder::class,
            JenisDokumenSeeder::class,
            DokumenSeeder::class,
        ]);
    }
}
