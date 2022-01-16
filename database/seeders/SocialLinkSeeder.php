<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class SocialLinkSeeder extends Seeder
{
	public function run()
{
	
$socials = [
[
'name' => 'facebook',
'icon' => 'fab fa-facebook-f',
'status' => rand(0,1),
'link' => 'https://facebook.com',
],
[
'name' => 'twitter',
'icon' => 'fab fa-twitter',
'status' => rand(0,1),
'link' => 'http://twitter.com',
],
[
'name' => 'instagram',
'icon' => 'fab fa-instagram-square',
'status' => rand(0,1),
'link' => 'https://instagram.com',
],
[
'name' => 'linkedin',
'icon' => 'fab fa-linkedin',
'status' => rand(0,1),
'link' => 'https://linkedin.com',
]
];
DB::table('social_setting')->insert($socials);
}
}