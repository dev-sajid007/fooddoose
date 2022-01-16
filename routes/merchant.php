<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Merchant\DashboardController;
use App\Http\Controllers\Backend\Merchant\RestaurantController;
use App\Http\Controllers\Backend\Merchant\CategoryController;
use App\Http\Controllers\Backend\Merchant\FoodController;
use App\Http\Controllers\Backend\Merchant\OrderController;
use App\Http\Controllers\Backend\Merchant\ExtraItemController;
use App\Http\Controllers\FrontEnd\AuthSystem\MerchantAuthController;
use App\Http\Controllers\Backend\Merchant\RiderController;
use App\Http\Controllers\Backend\Merchant\MerchantProfileController;

Route::get('/merchant', [MerchantAuthController::class, 'merchant_login_page']);
Route::post('/merchant-login', [MerchantAuthController::class, 'merchant_login']);

// Route::get('/merchant/dashboard', [App\Http\Controllers\FrontEnd\AuthSystem\MerchantAuthController::class, 'merchant_dashboard'])
// ->middleware('merchant');

Route::group(['prefix' => 'merchant', 'as' => 'merchant.', 'middleware' => ['merchant']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('/');

    Route::get('/profile', [MerchantProfileController::class, 'show_profile'])->name('show.profile');
    Route::post('/profile-update', [MerchantProfileController::class, 'update_profile'])->name('update.profile');
    Route::post('/update-info/', [MerchantProfileController::class, 'update_info'])->name('update.info');
    Route::post('/password-change', [MerchantProfileController::class, 'change_password'])->name('change.password');


    Route::get('/profile/{id}', [DashboardController::class, 'show'])->name('show');
    Route::resource('restaurant', RestaurantController::class);
    Route::get('/restaurant-status/{id}', [RestaurantController::class, 'change_status'])->name('restaurant.status');
    Route::resource('category', CategoryController::class);
    Route::resource('food', FoodController::class);
    Route::get('/food-status/{id}', [FoodController::class, 'food_status'])->name('food.status');
    Route::post('/extra-item/store', [ExtraItemController::class, 'extra_item_store'])->name('extra-item.store');

    Route::resource('order', OrderController::class);
    Route::get('/pending-order', [OrderController::class, 'pending_order_index'])->name('pending-order.index');
    Route::get('/waiting-order', [OrderController::class, 'waiting_order_index'])->name('waiting-order.index');
    Route::post('/reject-order', [OrderController::class, 'reject_order'])->name('reject-order');
    Route::get('/order-invoice/{id}', [OrderController::class, 'order_invoice'])->name('order-invoice');
    Route::get('/order-status/{id}', [OrderController::class, 'order_status'])->name('order-status');
    Route::get('/get-category/{id}', [CategoryController::class, 'get_category'])->name('get-category');

    Route::resource('rider', RiderController::class);
    Route::get('/rider-status/{id}', [RiderController::class, 'rider_status'])->name('rider-status');
    Route::get('/get-rider', [RiderController::class, 'get_rider'])->name('get-rider');
    Route::post('/assign-rider', [RiderController::class, 'assign_rider'])->name('assign-rider');

    Route::get('/logout', [MerchantAuthController::class, 'merchant_logout'])->name('logout');
});
