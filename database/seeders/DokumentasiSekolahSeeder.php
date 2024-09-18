<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\ProfilSekolah; // Model ProfilSekolah

class DokumentasiSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('dokumentasi_sekolah')->insert(values: [
                'sekolah_id' => $faker->randomElement(ProfilSekolah::pluck('id')->toArray()),
                'path_dokumentasi' => $faker->imageUrl(), // contoh URL untuk path dokumentasi
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
