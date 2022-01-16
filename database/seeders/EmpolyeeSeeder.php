<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\Employee;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EmpolyeeSeeder extends Seeder
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
            Employee::create([
                'name' => $faker->name,
                'email' =>$faker->email,
                'mobile' => $faker->phonenumber,
                'designation' => $faker->name,
                'salary' => rand(10000,100000),
                'experience' => $faker->sentence,
                'join_date' => $faker->date,
                'dob' => $faker->date,
                'address' => $faker->address,
                'status' => rand(1,3),
            ]);
        }
    }
}
