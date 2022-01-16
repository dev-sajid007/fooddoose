<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Carbon\Carbon;
use Faker\Factory as Faker;
class ShopSettingsTableSeeder extends Seeder
{
	public function run()
{
	//shop setting id 1
	DB::table('shop_settings')->insert([
	'ShopID'=>1,
	'ShopName'=>'fooddoose',
	'Heading'=>'fooddoose heading',
	'Email'=>'admin@gmail.com',
	'Email_2'=>'admin@gmail.com',
	'Phone'=>'01766******',
	'Phone_2'=>'01766******',
	'app_link'=>'play.google.com/fooddoose',
	'Address'=>'dhaka bangladesh',
	'Website'=>'fooddoose.com',
	'company_details'=>'it is a food delivery system',
	'created_at'=>Carbon::now(),
	'updated_at'=>Carbon::now(),
]);
}
}