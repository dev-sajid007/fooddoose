<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\Notice;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
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
            Notice::create([
                'heading' => $faker->sentence,
                'sub_heading' =>$faker->sentence,
                'title' => $faker->sentence,
                'details' => $faker->paragraph,
                'status' => rand(0,1),
                'notice_date' => date('Y-m-d'),
            ]);
        }
    }
}
