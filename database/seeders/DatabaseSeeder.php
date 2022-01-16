<?php

namespace Database\Seeders;

use App\Models\Backend\Food;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            ShopSettingsTableSeeder::class,
            AdminDashboardTableSeeder::class,
            AboutUsTableSeeder::class,
            RestaurantSeeder::class,
            CategorySeeder::class,
            FoodSeeder::class,
            OrderSeeder::class,
            OrderFoodSeeder::class,
            IncomeSeeder::class,
            ExpenseSeeder::class,
            EmpolyeeSeeder::class,
            NoticeSeeder::class,
            ContactUsSeeder::class,
            SliderSeeder::class,
            TeamMemberSeeder::class,
            FooterPageSeeder::class,
            SalarySeeder::class,
			SocialLinkSeeder::class,
            AreaTableSeeder::class,
            DistrictTableSeeder::class,
        ]);


// \App\Models\User::factory(10)->create();
    }
}
