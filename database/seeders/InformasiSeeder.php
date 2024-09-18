<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InformasiSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Menyisipkan 10 data contoh ke dalam tabel 'informasi'
        foreach (range(1, 60) as $index) {
            DB::table('informasi')->insert([
                'slug' => $faker->slug,
                'jenis_id' => $faker->numberBetween(1, 3), // Pastikan angka ini sesuai dengan ID yang valid di tabel 'jenis_informasi'
                'gambar' => $faker->imageUrl(640, 480, 'business', true, 'Faker'),
                'judul' => $faker->sentence(3, true),
                'body' => $faker->paragraphs(3, true),
                'tanggal_pengadaan' => $faker->dateTimeBetween('2024-09-01', '2024-12-30')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
