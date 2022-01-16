<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Carbon\Carbon;
use Faker\Factory as Faker;
class AboutUsTableSeeder extends Seeder
{
	public function run()
{
	//about id 1
	DB::table('about_us')->insert([
	'about_us_id'=>1,
	'header'=>'fooddoose',
	'sub_header'=>'fooddoose',
	'description'=>'fooddoose',
	'updated_at'=>Carbon::now(),
]);
}
}