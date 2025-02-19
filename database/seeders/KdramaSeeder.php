<?php

namespace Database\Seeders;

use App\Models\Kdrama;
use Illuminate\Database\Seeder;

class KdramaSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        // Membuat data lokal dengan format bahasa_NEGARA
        $faker = \Faker\Factory::create('en_US');

        // Membuat 10 data random
        for($i=0; $i<10; $i++) {
            Kdrama::create([
                'title' => $faker->sentence,
                'production' => $faker->company(),
                // Mengambil angka random antara 12 sampai 30
                'episodes' => $faker->numberBetween(12, 30),
                'start' => $faker->date,
                'end' => $faker->date
            ]);
        }
    }
}