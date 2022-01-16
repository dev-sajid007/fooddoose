<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
	public function run()
{
	//admin password 12345678
	$faker=Faker::create();
	// for super admin panel
	DB::table('users')->insert([
	'name'=>'fooddoose',
	'email'=>'admin@gmail.com',
	'phone'=>'01766******',
	'address'=>'dhaka bangladesh',
	'password'=>'$2y$10$OQM1VZtREvUEgga6iJjlN.mJYD7z2e7hjnEHHh6gfSlz7bJCVCHzC',
	'role_id'=>17,
	'user_type'=>'admin',
	'status'=>1,
	'created_at'=>Carbon::now(),
	'updated_at'=>Carbon::now(),
]);
// for rider password 12345678
		DB::table('users')->insert([
	'name'=>'fooddoose',
	'email'=>'rider@gmail.com',
	'phone'=>'01766******',
	'address'=>'dhaka bangladesh',
	'password'=>'$2y$10$OQM1VZtREvUEgga6iJjlN.mJYD7z2e7hjnEHHh6gfSlz7bJCVCHzC',
	'role_id'=>17,
	'user_type'=>'rider',
	'status'=>1,
	'created_at'=>Carbon::now(),
	'updated_at'=>Carbon::now(),
]);
	// for merchant panel password 12345678
	$latest_id=DB::table('users')->insertGetId([
	'name'=>'fooddoose',
	'email'=>'merchant@gmail.com',
	'phone'=>'01766******',
	'address'=>'dhaka bangladesh',
	'password'=>'$2y$10$OQM1VZtREvUEgga6iJjlN.mJYD7z2e7hjnEHHh6gfSlz7bJCVCHzC',
	'role_id'=>17,
	'user_type'=>'merchant',
	'status'=>1,
	'created_at'=>Carbon::now(),
	'updated_at'=>Carbon::now(),
]);
$merchant_additional_info = array(
'user_id' => $latest_id,
'business_name' =>'fooddoose merchant',
'bkash_number' =>'01780000000',
'rocket_number' =>'01780000000',
'nagad_number' =>'01780000000',
'bank_name' =>'bangladesh bank',
'account_name' =>'fooddoose',
'account_number' =>'1646545465',
'payment_method' =>'bkash',
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
);
$latest_merchant_id=DB::table('merchant')
->insertGetId($merchant_additional_info);
// insert data to restaurant
$restaurant_additional_info = array(
'merchant_id' => $latest_merchant_id,
'user_id' => $latest_id,
'restaurant_name' => 'fooddoose merchant restaurant',
'restaurant_code' =>1234,
'address' =>'dhaka bangladesh',
'tin' =>1234,
'since' =>'2015',
'status' =>1,
'tin' =>1234,
'status' =>1,
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
);
$latest_restaurant_id=DB::table('restaurant')
->insertGetId($restaurant_additional_info);
// insert data to schedule
$schedule_info = array(
'restaurant_id' => $latest_restaurant_id,
'user_id' => $latest_id,
'sunday' => 1,
'monday' =>1,
'tuesday' =>1,
'wednesday' =>1,
'thursday' =>1,
'friday' =>null,
'saturday' =>1,
'shop_open' => date('H:i:s'),
'shop_close' => date('H:i:s'),
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
);
DB::table('schedule')
->insert($schedule_info);
// user password 12345678
foreach(range(1,20) as $index){
	DB::table('users')->insert([
	'name'=>$faker->name,
	'email'=>$faker->unique()->safeEmail,
	'phone'=>$faker->phoneNumber,
	'address'=>$faker->address,
	'remember_token' => Str::random(15),
	'password'=>'$2y$10$OQM1VZtREvUEgga6iJjlN.mJYD7z2e7hjnEHHh6gfSlz7bJCVCHzC',
	'user_type'=>'customer',
	'status'=>rand(1,3),
	'created_at'=>Carbon::now(),
	'updated_at'=>Carbon::now(),
]);
}
}
}