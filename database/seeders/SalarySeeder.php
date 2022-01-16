<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\Salary;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SalarySeeder extends Seeder
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
            Salary::create([
                'employee_id' => rand(1,20),
                'salary_type' =>$faker->randomElement($array = array('Full Salary','Advanched')),
                'pay_system' => $faker->randomElement($array = array('Salary','Bonus','Achivment')),
                'pay_method' => $faker->randomElement($array = array('Cash','Bank Account','Bkash')),
                'year' => $faker->year($max = 'now'),
                'month' => $faker->monthName($max = 'now'),
                'pay_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'amount' => rand(5000,100000),
                'status' => rand(0,1),
            ]);
        }
    }
}
