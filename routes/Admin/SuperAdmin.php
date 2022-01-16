<?php
use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['super_admin']], function () {
Route::group(['namespace'=>'General_settings'], function(){
// footer page
	Route::get('/footer-pages', 'footer_pages@show_footer_pages');
Route::get('/get-all-subscribe-now-api', 'footer_pages@get_all_footer_pages')->name('all_footer_pages.list');
Route::delete('/delete_footer_page_api/{id}','footer_pages@delete_footer_page_api');
Route::get('/single-footer-page-table-information/{id}','footer_pages@single_footer_page_table_information');
Route::post('store-footer-page','footer_pages@store_footer_page')->name('footer_page.store');
Route::post('update-footer-pages','footer_pages@update_footer_page')->name('footer_pages.update');
// end footer page
// shop settings
Route::get('/shop-setting/','shop_settings@shop_setting')
->middleware('super_admin')
;
Route::post('/update-shop-setting/','shop_settings@update_shop_setting');
// end shop setting
// admin dashboard
Route::get('/admin-dashboard-setting/','shop_settings@admin_dashboard_setting');
Route::post('/update-admin-dashboard-setting/','shop_settings@update_admin_dashboard_setting');
// end
// web slider
Route::get('/manage-slider', 'slider_settings@Manage_slider');
Route::post('/store-slider', 'slider_settings@store_slider');
Route::get('/change-slider-status/{id}', 'slider_settings@slider_status_change');
Route::get('/slider-delete/{id}', 'slider_settings@slider_delete');
Route::get('/single-slider-select/{id}', 'slider_settings@select_single_slider');
Route::post('/update-slider', 'slider_settings@update_slider');
// end slider
// about us
Route::get('/about-us', 'about_us@show_about_us');
Route::post('/update-about-us', 'about_us@update_about_us');
// end about us
// team members
Route::get('/team-member', 'team_member@show_team_member');
Route::get('/get-all-team-member-api', 'team_member@get_all_team_members')->name('all_team_members.list');
Route::delete('/delete_team_member_api/{id}','team_member@delete_team_member_api');
Route::get('/single-team-member-table-information/{id}','team_member@single_team_member_table_information');
Route::post('store-team-member','team_member@store_team_member')->name('team_member.store');
Route::post('update-team-member','team_member@update_team_member')->name('team_member.update');
// end team members
// social link
Route::get('/manage-social-links', 'social_link_settings@manage_social_links');
Route::get('/single-social-link/{id}', 'social_link_settings@select_social_links');
Route::post('/update-special-link', 'social_link_settings@update_social_link');
// end social link

  // ------------ ROLE SECTION ENDS ----------------------
// });
// sagor
});

Route::group(['namespace'=>'user'], function(){

    // User Section sagor
  Route::get('/users', 'UserController@show_user')->name('show.user');
  Route::post('store-user','UserController@store_user')->name('user.store');
Route::post('update-user','UserController@update_user')->name('user.update');
 Route::get('/get-all-user-api', 'UserController@get_all_users')->name('all_users.list');
Route::delete('/delete_user_api/{id}','UserController@delete_user_api');
Route::get('/single-user-table-information/{id}','UserController@single_user_table_information');


  Route::get('/rider-users', 'UserController@rider_user')->name('rider.user');
 Route::get('/get-all-rider_user-api', 'UserController@get_rider_all_users')->name('all_rider_users.list');
   Route::get('/single-rider_user-table-information/{id}','UserController@single_rider_user_table_information');
   Route::get('change-password-rider-user-view/{id}','UserController@admin_change_password_rider_view')->name('admin.rider.change-password-view');
    Route::post('change-password-rider-user/{id}','UserController@admin_change_password_rider')->name('admin.rider.change-password');


  Route::get('/customer-users', 'UserController@customer_user')->name('customer.user');
  Route::get('/get-all-customer_user-api', 'UserController@get_customer_all_users')->name('all_customer_users.list');
   Route::get('/single-customer_user-table-information/{id}','UserController@single_customer_user_table_information');
   Route::post('update-customer_user','UserController@admin_update_customer')->name('admin.customer.update');


   Route::get('/merchant-users', 'UserController@merchant_user')->name('merchant.user');
   Route::get('/get-all-merchant_user-api', 'UserController@get_merchant_all_users')->name('all_merchant_users.list');
   Route::get('/single-merchant_user-table-information/{id}','UserController@single_merchant_user_table_information');
   Route::post('update-merchant_user','UserController@admin_update_merchant')->name('admin.merchant.update');
    Route::get('change-password-merchant-user_view/{id}','UserController@admin_change_password_merchant_view')->name('admin.merchant.change-password-view');
   Route::post('change-password-merchant-user/{id}','UserController@admin_change_password_merchant')->name('admin.merchant.change-password');



Route::get('/role/create', 'RoleController@create')->name('admin-role-create');
Route::post('/role/create', 'RoleController@store')->name('admin-role-store');


Route::get('/role/datatables', 'RoleController@datatables')->name('admin-role-datatables');
Route::get('/role', 'RoleController@index')->name('admin-role-index');


Route::get('/role/edit/{id}', 'RoleController@edit')->name('admin-role-edit');
Route::post('/role/edit/{id}', 'RoleController@update')->name('admin-role-update');
Route::get('/role/delete/{id}', 'RoleController@destroy')->name('admin-role-delete');
  // staff

Route::get('/staff', 'StaffController@show_staff');
Route::get('/staff/datatables', 'StaffController@get_all_staff')->name('all_staff.list');
Route::delete('/delete_staff_api/{id}', 'StaffController@delete_staff_api');
Route::get('/single-staff-information/{id}', 'StaffController@single_staff_info');
Route::post('update-staff', 'StaffController@update_staff');
Route::post('store-staff', 'StaffController@store_staff');
Route::get('/change_staff_password/{id}', 'StaffController@change_staff_password')->name('change_staff.password');
Route::post('/update-staff-password', 'StaffController@update_staff_password');



// merchant section start Sagor
Route::get('/merchant/create', 'MerchantController@create');
Route::get('/merchant/edit/{id}', 'MerchantController@edit')->name('merchant.edit');
Route::post('/merchant/update/{id}', 'MerchantController@update')->name('merchant.update');
Route::post('/store-merchant', 'MerchantController@store')->name('merchant.store');
Route::get('/merchant/all-merchant', 'MerchantController@all_merchant');
Route::get('/get-all-merchant-api', 'MerchantController@get_all_merchants')->name('all_merchants.list');
Route::get('/single-merchant-table-information/{id}','MerchantController@single_merchant_table_information');
Route::post('update-merchant','Merchantcontroller@update_merchant')->name('merchant.update');
Route::post('/update-status/', 'MerchantController@change_status')->name('change.status');


Route::get('/merchant/pending-merchant', 'MerchantController@pending_merchant');
Route::get('/merchant/rejected-merchant', 'MerchantController@rejected_merchant');

Route::get('/merchant/all-merchant/datatable', 'MerchantController@get_all_merchant')->name('get_all_merchant.datatable');
Route::get('/merchant/pending-merchant/datatable', 'MerchantController@get_all_pending_merchant')->name('get_all_pending_merchant.datatable');
Route::get('/merchant/rejected-merchant/datatable', 'MerchantController@get_all_rejected_merchant')->name('get_all_rejected_merchant.datatable');

// restrurant section start Sagor
Route::get('/restaurant/create', 'RestaurantController@create');

Route::get('/restaurant/edit/{id}', 'RestaurantController@edit')->name('restaurant.edit');
Route::post('/restaurant/update/', 'RestaurantController@update_restaurant')->name('restaurant.update');
Route::post('/store-restaurant', 'RestaurantController@store')->name('restaurant.store');
Route::get('/restaurant/all-restaurant', 'RestaurantController@all_restaurant');
Route::get('/restaurant/pending-restaurant', 'RestaurantController@pending_restaurant');
Route::get('/single-restaurant-information/{id}', 'RestaurantController@single_restaurant_info');
Route::get('/restaurant/pending-restaurant', 'RestaurantController@pending_restaurant');
Route::get('/restaurant/rejected-restaurant', 'RestaurantController@rejected_restaurant');

Route::get('/restaurant/all-restaurant/datatable', 'RestaurantController@get_all_restaurant')->name('get_all_restaurant.datatable');
Route::get('/restaurant/pending-restaurant/datatable', 'RestaurantController@get_all_pending_restaurant')->name('get_all_pending_restaurant.datatable');
Route::get('/restaurant/rejected-restaurant/datatable', 'RestaurantController@get_all_rejected_restaurant')->name('get_all_rejected_restaurant.datatable');


// schedule section start Sagor
Route::get('/schedule/create', 'scheduleController@create');
Route::get('/schedule/edit/{schedule_id}', 'scheduleController@edit')->name('schedule.edit');
Route::post('/schedule/update/', 'scheduleController@update_schedule')->name('schedule.update');
Route::post('/store-schedule', 'scheduleController@store')->name('schedule.store');
Route::get('/schedule/all-schedule', 'scheduleController@all_schedule');
Route::get('/single-schedule-information/{id}', 'scheduleController@single_schedule_info');
Route::get('/schedule/pending-schedule', 'scheduleController@pending_schedule');
Route::get('/schedule/rejected-schedule', 'scheduleController@rejected_schedule');

Route::get('/schedule/all-schedule/datatable', 'scheduleController@get_all_schedule')->name('get_all_schedule.datatable');
Route::get('/schedule/pending-schedule/datatable', 'scheduleController@get_all_pending_schedule')->name('get_all_pending_schedule.datatable');
Route::get('/schedule/rejected-schedule/datatable', 'scheduleController@get_all_rejected_schedule')->name('get_all_rejected_schedule.datatable');
// customer solayman
Route::get('/manage-customers', 'customer_managment@show_customers');
Route::get('/manage-customers/datatable', 'customer_managment@get_all_customers')->name('all_customer.list');
Route::delete('/delete_customer_api/{id}', 'customer_managment@delete_customer_api');
Route::get('/single-customer-information/{id}', 'customer_managment@single_customer_info');
Route::post('update-customer', 'customer_managment@update_customer');
Route::get('/change_customer_password/{id}', 'customer_managment@change_customer_password')->name('change_customer_password.editor');
Route::post('/update-customer-password', 'customer_managment@update_customer_password');

});



Route::group(['namespace'=>'Orders'], function(){
// Orders Sagor
Route::get('/details-order/{$OrderID}', 'OrderController@detailsOrder')->name('details.order');
Route::get('/order', 'OrderController@show_order')->name('show.order');
Route::get('/order-pending', 'OrderController@pending_order')->name('pending.order');
Route::get('/order-created', 'OrderController@created_order')->name('created.order');
Route::get('/order-confirm', 'OrderController@confirm_order')->name('confirm.order');
Route::get('/order-process', 'OrderController@process_order')->name('process.order');
Route::get('/order-deliver', 'OrderController@deliver_order')->name('deliver.order');
Route::get('/order-waiting', 'OrderController@waiting_order')->name('waiting.order');
Route::get('/order-return', 'OrderController@return_order')->name('return.order');
Route::get('/order-reject', 'OrderController@reject_order')->name('reject.order');

Route::get('/get-all-order-api', 'OrderController@get_all_orders')->name('all_orders.list');
Route::get('/get-pending-order-api', 'OrderController@get_pending_orders')->name('pending_orders.list');
Route::get('/get-created-order-api', 'OrderController@get_created_orders')->name('created_orders.list');
Route::get('/get-confirm-order-api', 'OrderController@get_confirm_orders')->name('confirm_orders.list');
Route::get('/get-process-order-api', 'OrderController@get_process_orders')->name('process_orders.list');
Route::get('/get-deliver-order-api', 'OrderController@get_deliver_orders')->name('deliver_orders.list');
Route::get('/get-waiting-order-api', 'OrderController@get_waiting_orders')->name('waiting_orders.list');
Route::get('/get-return-order-api', 'OrderController@get_return_orders')->name('return_orders.list');
Route::get('/get-reject-order-api', 'OrderController@get_reject_orders')->name('reject_orders.list');

Route::delete('/delete_order_api/{id}','OrderController@delete_order_api');
Route::get('/single-order-table-information/{id}','OrderController@single_order_table_information');
Route::post('update-order','OrderController@update_order')->name('order.update');
});












// Sagor====

Route::group(['namespace'=>'Accounts'], function(){
// Income Sagor
Route::get('/income', 'Income@show_income')->name('show.income');
Route::get('/get-all-income-api', 'Income@get_all_incomes')->name('all_incomes.list');
Route::delete('/delete_income_api/{id}','Income@delete_income_api');
Route::get('/single-income-table-information/{id}','Income@single_income_table_information');
Route::post('store-income','Income@store_income')->name('income.store');
Route::post('update-income','Income@update_income')->name('income.update');

// expense
// Sagor====
Route::get('/expense', 'Expense@show_expense')->name('show.expense');
Route::get('/get-all-expense-api', 'Expense@get_all_expenses')->name('all_expenses.list');
Route::delete('/delete_expense_api/{id}','Expense@delete_expense_api');
Route::get('/single-expense-table-information/{id}','Expense@single_expense_table_information');
Route::post('store-expense','Expense@store_expense')->name('expense.store');
Route::post('update-expense','Expense@update_expense')->name('expense.update');


// Salary
Route::get('/salary', 'Salarey@show_salary')->name('show.salary');
Route::get('/get-all-salary-api', 'Salarey@get_all_salaries')->name('all_salaries.list');
Route::delete('/delete_salary_api/{id}','Salarey@delete_salary_api');
Route::get('/single-salary-table-information/{id}','Salarey@single_salary_table_information');
Route::get('/salary-store-view', 'Salarey@store_salary_view')->name('store.salary.view');
Route::post('store-salary','Salarey@store_salary')->name('store.salary');
Route::get('/salary-edit/{id}', 'Salarey@edit_salary')->name('edit.salary');
Route::post('update-salary{id}','Salarey@update_salary')->name('update.salary');

});

Route::group(['namespace'=>'Rider'], function(){
// Rider
  // Sagor====
Route::get('/rider', 'Rider@show_rider')->name('show.rider');
Route::get('/get-all-rider-api', 'Rider@get_all_riders')->name('all_riders.list');
Route::delete('/delete_rider_api/{id}','Rider@delete_rider_api');
Route::get('/single-rider-table-information/{id}','Rider@single_rider_table_information');
Route::post('store-rider','Rider@store_rider')->name('rider.store');
Route::post('update-rider','Rider@update_rider')->name('rider.update');
Route::get('/get-rider','Rider@get_rider')->name('get.rider');
Route::post('/assign-rider', 'Rider@assign_rider')->name('assign.rider');



Route::get('/show-pending-reader', 'PendingRider@show_pending_reader')->name('show_pending');

});


// Route::group(['namespace'=>'Profile'], function(){
// // Profile
//   // Sagor====
// Route::get('/profile', 'Profile@show_profile')->name('show.profile')->middleware('super_admin');;
// Route::get('update-profile-view','Profile@update_profile_view')->name('profile.view.update');
// Route::post('update-profile','Profile@update_profile')->name('profile.update');
// Route::post('change-password','Profile@change-password')->name('change-password');


// });

// Sagor====
Route::group(['namespace'=>'Employee'], function(){
// Employee
Route::get('/employee', 'Employee@show_employee')->name('show.employee');
Route::get('/get-all-employee-api', 'Employee@get_all_employees')->name('all_employees.list');
Route::delete('/delete_employee_api/{id}','Employee@delete_employee_api');
Route::get('/single-employee-table-information/{id}','Employee@single_employee_table_information');
Route::post('store-employee','Employee@store_employee')->name('employee.store');
Route::post('update-employee','Employee@update_employee')->name('employee.update');

});



Route::group(['namespace'=>'Rider'], function(){
// Rider
  // Sagor====
Route::get('/rider', 'Rider@show_rider')->name('show.rider');
Route::get('/get-all-rider-api', 'Rider@get_all_riders')->name('all_riders.list');
Route::delete('/delete_rider_api/{id}','Rider@delete_rider_api');
Route::get('/single-rider-table-information/{id}','Rider@single_rider_table_information');
Route::post('store-rider','Rider@store_rider')->name('rider.store');
Route::post('update-rider','Rider@update_rider')->name('rider.update');

Route::get('/show-pending-reader', 'PendingRider@show_pending_reader')->name('show_pending');

Route::get('/get-all-pending-rider-api', 'PendingRider@get_pending_riders')->name('pending_riders.list');

Route::get('/show-banned-reader', 'BannedRider@show_banned_reader')->name('show_banned');

Route::get('/get-all-banned-rider-api', 'BannedRider@get_banned_riders')->name('banned_riders.list');
});



Route::group(['namespace'=>'Notice'], function(){
// Employee
Route::get('/notice', 'Notice@show_notice')->name('show.notice');
Route::get('/inactive-notice', 'Notice@show_inactive_notice')->name('show.inactive.notice');
Route::get('/today-notice', 'Notice@show_today_notice')->name('show.today.notice');
Route::get('/get-all-notice-api', 'Notice@get_all_notices')->name('all_notices.list');
Route::get('/get-all_inactive-notice-api', 'Notice@get_all_inactive_notices')->name('all_inactive_notices.list');
Route::get('/get-all_today-notice-api', 'Notice@get_all_today_notices')->name('all_today_notices.list');
Route::delete('/delete_notice_api/{id}','Notice@delete_notice_api');
Route::get('/single-notice-table-information/{id}','Notice@single_notice_table_information');
Route::post('store-notice','Notice@store_notice')->name('notice.store');
Route::post('update-notice','Notice@update_notice')->name('notice.update');
});




Route::group(['namespace'=>'AreaSection'], function(){
//district
  Route::get('/district', 'disctrict_controller@show_district');
    Route::get('/get-all-district', 'disctrict_controller@get_all_district')->name('all_district.list');
    Route::delete('/delete_district_api/{id}', 'disctrict_controller@delete_district_api');
    Route::get('/single-district-information/{id}', 'disctrict_controller@single_district_info');
    Route::post('store-district', 'disctrict_controller@store_district');
    Route::post('update-district', 'disctrict_controller@update_district');


//end


//district end

// area start
    Route::get('select_all_area_api/{id}', 'disctrict_controller@select_all_area_district');
    Route::get('/area', 'area_controller@show_area');
    Route::post('/store-area', 'area_controller@store_area');
    Route::post('/update-area', 'area_controller@update_area');
    Route::get('/get-all-area', 'area_controller@get_all_area')->name('all_area.list');
    Route::delete('/delete_area_api/{id}', 'area_controller@delete_area_api');
    Route::get('/single-area-information/{id}', 'area_controller@single_area_info');

// end area

});

});

// require __DIR__ . '/admin.php';
