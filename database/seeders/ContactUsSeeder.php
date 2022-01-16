<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\ContactUs;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ContactUsSeeder extends Seeder
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
            ContactUs::create([
                'name' => $faker->name,
                'email' =>$faker->email,
                'phone' => $faker->phonenumber,
                'subject' => $faker->name,
                'message' => $faker->paragraph,
                
            ]);
        }
    }
}
