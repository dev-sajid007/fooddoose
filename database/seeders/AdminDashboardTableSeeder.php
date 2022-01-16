<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Carbon\Carbon;
use Faker\Factory as Faker;
class AdminDashboardTableSeeder extends Seeder
{
	public function run()
{
	//shop setting id 1
	DB::table('admin_dashboard_setting')->insert([
	'admin_dashboard_id'=>1,
	'title'=>'fooddoose',
	'dashboard_name'=>'fooddoose',
	'short_char_title'=>'FD',
	'footer_greeting'=>'fooddoose',
	'updated_at'=>Carbon::now(),
]);
}
}