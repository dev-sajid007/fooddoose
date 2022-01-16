<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\FooterPage;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Str;

class FooterPageSeeder extends Seeder
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
            FooterPage::create([
                'title' => $faker->sentence,
                'slug' => Str::slug($faker->title),
                'header' => $faker->sentence,
                'sub_header' =>$faker->sentence,
                'meta_tags' => $faker->sentence,
                'description' => $faker->paragraph,
                'position' => rand(1,5),
            ]);
        }
    }
}
