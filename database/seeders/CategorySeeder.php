<?php

namespace Database\Seeders;

use App\Models\Backend\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            Category::create([
                'name' => $faker->sentence,
                'slug' => Str::slug("fhdfshj fjdshfj", "-"),
                'status' => '1'
            ]);
        }
    }
}
