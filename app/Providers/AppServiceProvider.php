<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{

public function register()
{
		$admin_dashboard_setting=DB::table('admin_dashboard_setting')->where('admin_dashboard_id','=',1)->first();
View::share('admin_dashboard_setting',$admin_dashboard_setting);
$shop_setting = DB::table('shop_settings')->where('ShopID','=',1)->first();
$select_social_link=DB::table('social_setting')->where('status','=',1)->get();
View::share('select_social_link',$select_social_link);
View::share('shop_setting',$shop_setting);
}

public function boot()
{
Paginator::useBootstrap();
}
}