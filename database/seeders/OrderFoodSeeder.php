<?php

namespace Database\Seeders;

use App\Models\Backend\Order;
use App\Models\Backend\OrderFood;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OrderFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $orders = Order::get();
        foreach (  $orders as  $order) {
            OrderFood::create([
                'order_id' =>  $order->id,
                'food_id' => 1,
                'price' => $faker->latitude,
            ]);
        }
    }
}
