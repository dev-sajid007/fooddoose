<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\TeamMember;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
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
            TeamMember::create([
                'name' => $faker->name,
                'email' =>$faker->email,
                'phone' => $faker->phonenumber,
                'position' => $faker->name,
                'details' => $faker->sentence,
                'facebook' => $faker->url,
                'linkdin' => $faker->url,
                'twitter' => $faker->url,

            ]);
        }
    }
}
