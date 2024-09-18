<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedbacks = [];
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $feedbacks[] = [
                'nama' => $faker->name,
                'email' => $faker->email,
                'comment' => $faker->sentence,
            ];
        }

        Feedback::insert($feedbacks);
    }
}
