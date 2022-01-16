<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use App\Models\ContactUs;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
	public function run(){
     $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            DB::table('district')->insert([
                'district_name' => $faker->title,
                'district_details' => $faker->title,
                'distric_status' => rand(1,0),
             	'created_at'=>Carbon::now(),
				'updated_at'=>Carbon::now(),
            ]);
        }
}
}