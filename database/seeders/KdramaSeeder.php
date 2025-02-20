<?php

namespace Database\Seeders;

use App\Models\Kdrama;
use Illuminate\Database\Seeder;

class KdramaSeeder extends Seeder {
    // Run the database seeds.
    public function run(): void {
        // Make local datas with the format language_COUNTRY
        $faker = \Faker\Factory::create('en_US');

        // Make 10 random datas
        for($i=0; $i<10; $i++) {
            Kdrama::create([
                'title' => $faker->sentence,
                'production' => $faker->company(),
                // Take a random number from 12 to 30
                'episodes' => $faker->numberBetween(12, 30),
                'start' => $faker->date,
                'end' => $faker->date
            ]);
        }
    }
}