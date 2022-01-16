<?php

namespace Database\Seeders;

use App\Models\Backend\Order;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
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
            Order::create([
                'user_id' => $faker->imei,
                'order_no' => $faker->randomNumber(),
                'user_id' => $faker->imei,
                'order_no' => $faker->randomNumber(),
                'user_id' => 10,
                'order_no' => $faker->randomNumber(),
                'contact_no' => $faker->randomNumber(),
                'delivery_address' => $faker->sentence,
                'subtotal' => $faker->latitude,
                'total' => $faker->latitude,
            ]);
        }

    }
}
