<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\Backend\Order;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index) {
            Food::create([
                'name' => $faker->sentence,
                'restaurant_id' =>1,
                'category_id' => 1,
                'food_code' => 'rest-'.rand(5,9999),
                'quantity' => 1,
                'price' => $faker->latitude,
            ]);
        }
    }
}
