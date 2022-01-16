<?php
use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
// return view('frontend.extends.homepage');
// });
Route::get('admin-login',function (){
    return '403 forbidden';
})->name('login');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
// Auth::routes();
// Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->middleware('super_admin')
->name('home');
// super admin auth
Route::get('/login', [App\Http\Controllers\FrontEnd\AuthSystem\AdminAuthController::class, 'admin_login_page']);
Route::post('/login-status', [App\Http\Controllers\FrontEnd\AuthSystem\AdminAuthController::class, 'admin_login']);
Route::get('/admin/dashboard', [App\Http\Controllers\FrontEnd\AuthSystem\AdminAuthController::class, 'admin_dashboard'])
->middleware('super_admin');
Route::get('/admin/logout', [App\Http\Controllers\FrontEnd\AuthSystem\AdminAuthController::class, 'admin_logout'])
->middleware('super_admin');
// marchant auth
Route::get('admin/profile', [App\Http\Controllers\Backend\Admin\Profile\AdminProfileController::class, 'show_profile'])->name('admin.show.profile')->middleware('super_admin');
Route::post('admin/profile-update', [App\Http\Controllers\Backend\Admin\Profile\AdminProfileController::class, 'update_profile'])->name('admin.update.profile');
Route::post('admin/password-change', [App\Http\Controllers\Backend\Admin\Profile\AdminProfileController::class, 'change_password'])->name('admin.change.password');

require __DIR__ . '/merchant.php';
require __DIR__ . '/rider.php';
