<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\ContactUs;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
	 public function run()
    {
     	$faker=Faker::create();

        foreach (range(1, 200) as $index) {
            DB::table('area')->insert([
                'district_id' => rand(1,25),
                'area_name' => $faker->title,
                'area_description' => $faker->title,
             	'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now(),
            ]);
        }
}
}