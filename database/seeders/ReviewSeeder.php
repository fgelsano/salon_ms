<?php

namespace Database\Seeders;

use App\Models\Review;

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {

            for ($i = 1; $i <= 1000; $i++) {
                Review::create([
                    'name' => $faker->name,
                    'comment' => $faker->paragraph,
                    'star_rating' => $faker->numberBetween(1, 5),
                ]);
            }
        }
    }
}
