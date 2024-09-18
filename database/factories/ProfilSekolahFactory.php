<?php

namespace Database\Factories;

use App\Models\FasilitasSekolah;
use App\Models\JenjangSekolah;
use App\Models\JmlKapitaSekolah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProfilSekolah>
 */
class ProfilSekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kapita_id' => JmlKapitaSekolah::inRandomOrder()->value('id'), // Random Kapita ID
            'fasilitas_id' => FasilitasSekolah::inRandomOrder()->value('id'), // Random Fasilitas ID
            'nama_sekolah' => $this->faker->unique()->company, // Unique name for `nama_sekolah`
            'NPSN' => $this->faker->unique()->bothify('######??'), // Unique NPSN with 8 characters
            'alamat' => $this->faker->address,
            'kecamatan' => $this->faker->word,
            'jenjang_id' => JenjangSekolah::inRandomOrder()->value('id'), // Random Jenjang ID
            'no_telepon' => $this->faker->unique()->phoneNumber, // Unique phone number
            'email' => $this->faker->unique()->safeEmail, // Unique email
            'link_website' => $this->faker->url,
            'nama_kontak_person' => $this->faker->name,
            'jabatan' => 'Kepala Sekolah',
            'slug' => $this->faker->unique()->slug,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
