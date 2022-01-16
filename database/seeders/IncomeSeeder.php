<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\Income;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            Income::create([
                'way' => $faker->name,
                'vendor' =>$faker->name,
                'description' => $faker->sentence,
                'amount' => rand(100,1500),
                'income_date' => $faker->date,
                
            ]);
        }
    }
}
