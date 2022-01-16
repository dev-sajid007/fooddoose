<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEnd\AuthSystem\RiderAuthController;
use App\Http\Controllers\Backend\Rider\DashboardController;
use App\Http\Controllers\Backend\Rider\RiderProfileController;
use App\Http\Controllers\Backend\Rider\OrderController;

Route::get('/rider', [RiderAuthController::class, 'rider_login_page']);
Route::post('/rider-login', [RiderAuthController::class, 'rider_login']);


Route::group(['prefix'=>'rider','middleware'=>['rider'],'namespace'=>'rider'],function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('rider.dashboard');
 
    Route::get('/pending-order-list', [OrderController::class, 'pending_order_list'])->name('rider.pending-order.list');
    Route::get('/all-order-list', [OrderController::class, 'all_order_list'])->name('rider.all-order.list');
    Route::get('/order-show', [OrderController::class, 'pending_order_show'])->name('rider.order.show');
    Route::post('/change-order-list/{id}', [OrderController::class, 'change_order_list'])->name('rider.change-order.list');
    Route::get('/profile', [RiderProfileController::class, 'show_profile'])->name('rider.show.profile');
    Route::post('/profile-update', [RiderProfileController::class, 'update_profile'])->name('update.profile');
    Route::post('/password-change', [RiderProfileController::class, 'change_password'])->name('change.password');


    Route::get('/logout', [RiderAuthController::class, 'rider_logout'])->name('rider.logout');
});