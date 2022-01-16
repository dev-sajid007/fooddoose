<?php

use Illuminate\Support\Facades\Route;
Route::middleware(['cors'])->group(function () {
// prefix frontend_api

//food api from solayman
Route::get('rastaurant/item/{slug}', 'HomeApiController@rastaurant_item');

// frontend setting
Route::get('shop-setting', 'GeneralSettingApiController@shop_setting');
Route::get('slider', 'GeneralSettingApiController@Slider');
Route::get('social-links', 'GeneralSettingApiController@social_links');
Route::get('about-us', 'GeneralSettingApiController@about_us');
Route::get('footer-pages', 'GeneralSettingApiController@footer_pages');
Route::get('footer-page/{slug}', 'GeneralSettingApiController@footer_page');
Route::get('team-members', 'GeneralSettingApiController@team_members');


Route::get('restaurants', 'RestaurantController@index');
Route::post('restaurant-search', 'RestaurantController@restaurant_search');
Route::get('restaurant/{slug}', 'RestaurantController@show');
Route::get('category/{slug}', 'CategoryController@show');

// request section
Route::post('contact-us', 'RequestController@store_contact_us');
Route::post('subscribe-us', 'RequestController@store_subscriber');
Route::post('merchant-registration', 'RequestController@merchant_registration');
Route::post('rider-registration', 'RequestController@rider_registration');
// rastaurant food
Route::get('foods', 'FoodController@index');
Route::get('food/{slug}', 'FoodController@show');
Route::get('get-foods', 'FoodController@food_paginate');
Route::post('food-search', 'FoodController@food_search');
Route::get('restaurants', 'RestaurantController@index');
Route::get('restaurant/{slug}', 'RestaurantController@show');
// food end
// order section
Route::post('VerifyOTP', 'OrderController@VerifyOTP');
Route::post('Confirm-Order', 'OrderController@Confirm_Order');
// end
// customer authentication



});


Route::group(['namespace' => 'AuthSystem'], function () {
    Route::group([
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('login', 'FrontEndUserAuth@login');
        Route::post('logout', 'FrontEndUserAuth@logout');
        Route::post('refresh', 'FrontEndUserAuth@refresh');
        Route::post('me', 'FrontEndUserAuth@me');
        Route::post('register_customer', 'FrontEndUserAuth@RegisterCustomer');
    });
    Route::post('register_customer', 'FrontEndUserAuth@customer_registration');
    Route::post('customer_profile_update', 'FrontEndUserAuth@customer_profile_update');
    Route::post('change_customer_password', 'FrontEndUserAuth@change_customer_password');
    Route::post('change_reset_password_without_login', 'FrontEndUserAuth@change_reset_password_without_login');
    Route::post('confirm_reset_password_without_login', 'FrontEndUserAuth@confirm_reset_password_without_login');
    Route::post('merchant-password-request', 'PasswordResetController@merchant_password_request');
    Route::post('merchant-confirm-password-request', 'PasswordResetController@merchant_confirm_password_request');
});

Route::group(['namespace' => 'CustomerManagment'], function () {
    Route::group(['prefix' => 'customer'], function ($router) {
        Route::group(['prefix' => 'order'], function ($router) {
//            limited order
            Route::get('limited-pending-order-list', 'CustomerDashboardController@limited_pending_order_list')
                ->middleware('auth:api');
            Route::get('limited-confirm-order-list', 'CustomerDashboardController@limited_confirm_order_list')
                ->middleware('auth:api');
            Route::post('limited-order', 'CustomerDashboardController@limited_order_filter')
                ->middleware('auth:api');
//            paginate order
            Route::get('pending-order-list', 'CustomerDashboardController@pending_order_list')
                ->middleware('auth:api');
            Route::post('all-order-filter', 'CustomerDashboardController@order_filter')
                ->middleware('auth:api');
            Route::get('type/{type}', 'CustomerDashboardController@order_type')
                ->middleware('auth:api');
        });
    });
});



