<?php

namespace Database\Seeders;

use App\Models\ProfilSekolah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProfilSekolahSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Generate dummy data for related tables if not already present
        $kapitaIds = \App\Models\JmlKapitaSekolah::pluck('id')->toArray();
        $fasilitasIds = \App\Models\FasilitasSekolah::pluck('id')->toArray();
        $jenjangIds = \App\Models\JenjangSekolah::pluck('id')->toArray();

        // Generate data for `profil_sekolah`
        $data = [];
        for ($i = 0; $i < 10; $i++) { // Adjust the count as needed
            $data[] = [
                'kapita_id' => $faker->randomElement($kapitaIds),
                'fasilitas_id' => $faker->randomElement($fasilitasIds),
                'nama_sekolah' => $faker->unique()->company, // Unique name for `nama_sekolah`
                'NPSN' => $faker->unique()->bothify('######??'), // Unique NPSN with 8 characters
                'alamat' => $faker->address,
                'kecamatan' => $faker->word,
                'jenjang_id' => $faker->randomElement($jenjangIds),
                'no_telepon' => $faker->unique()->phoneNumber, // Unique phone number
                'email' => $faker->unique()->safeEmail, // Unique email
                'link_website' => $faker->url,
                'nama_kontak_person' => $faker->name,
                'jabatan' => 'Kepala Sekolah',
                'slug' => $faker->unique()->slug,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('profil_sekolah')->insert($data);
    }
}
