<?php

namespace Database\Seeders;

use App\Models\Backend\Category;
use App\Models\Backend\Restaurant;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Restaurant::create([
                'name' => $faker->sentence,
                'restaurant_code' => 'rest-'.rand(5,99999),
                'user_id' => 2,
                'contact_no' => 7236472,
            ]);
        }
    }
}
