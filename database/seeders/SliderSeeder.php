<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\Slider;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            Slider::create([
                'slider_link' =>$faker->url,
                'slider_details' => $faker->sentence,
                'slider_status' => rand(0,1),
                'slider_image' => 'https://source.unsplash.com/random',
                
            ]);
        }
    }
}
