<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimoni;

class TestimoniSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Testimoni::create([
                'nama_testimoni' => $faker->name,
                'body' => $faker->sentence,
            ]);
        }

    }
}
