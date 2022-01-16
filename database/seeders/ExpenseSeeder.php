<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\Expense;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
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
            Expense::create([
                'purpose' => $faker->name,
                'vendor' =>$faker->name,
                'description' => $faker->sentence,
                'amount' => rand(100,1500),
                'expense_date' => $faker->date,
                'created_at' => date('Y-m-d h:i:s A'),
                'updated_at' => date('Y-m-d h:i:s A'),
            ]);
        }
    }
}
