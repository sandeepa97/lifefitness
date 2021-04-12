<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home
Route::get('/','Home\HomeController@index' );
Route::get('/home','Home\HomeController@index2' );
Route::get('/about','Home\HomeController@about' );
Route::get('/contact','Home\HomeController@contact' );
Route::get('/blog','Blog\BlogController@index' );
Route::get('/store','Store\StoreController@index' );
Route::get('/coaching','Coaching\CoachController@index' );

//login and logout process
Route::get('login', 'LoginController@index');
Route::post('post-login', 'LoginController@postLogin');
Route::get('admin-dashboard', 'LoginController@dashboard'); 
Route::get('logout', 'LoginController@logout');

//Admin -> Member Functions
Route::resource('admin/members', 'MemberController');
Route::get('admin/get-all-members', 'MemberController@getAllMembers');

//Admin -> Payment Functions
Route::resource('admin/payments', 'PaymentController');
Route::get('admin/get-all-payments', 'PaymentController@getAllMemberPayments');
Route::get('admin/get-all-payment-types', 'PaymentTypeController@index');


//Admin -> MemberAttendance Functions
Route::resource('admin/member-attendance', 'MemberAttendanceController');
Route::get('admin/view-member-attendance', 'MemberAttendanceController@viewAttendance');
Route::get('admin/get-all-attendance', 'MemberAttendanceController@getAllMemberAttendance');

//Admin -> Schedule Functions
Route::resource('admin/schedules', 'WorkoutScheduleController');
Route::get('admin/get-all-schedules', 'WorkoutScheduleController@getAllSchedules');
Route::get('admin/get-all-schedules-type', 'WorkoutScheduleTypeController@index');
Route::resource('admin/exercises', 'ExerciseController');
Route::get('admin/get-all-exercises', 'ExerciseController@getAllExercises');

//Admin -> Notice Functions
Route::resource('admin/notices', 'NoticeController');
Route::get('admin/post-notice', 'NoticeController@postNotice');
Route::get('admin/get-all-notices', 'NoticeController@getAllNotices');
Route::get('admin/get-all-notice-types', 'NoticeTypeController@index');
Route::get('admin/get-all-notice-recipients', 'NoticeRecipientController@index');

//Admin -> Member Status Functions
Route::resource('admin/member-status', 'MemberStatusController');
Route::get('admin/get-all-member-status', 'MemberStatusController@getAllMemberStatus');
Route::get('admin/get-all-member-status-types', 'MemberStatusTypeController@index');

//Admin -> Profit Functions
Route::resource('admin/profit', 'ProfitController');

//Admin -> Trainer Functions
Route::resource('admin/trainers', 'TrainerController');
Route::get('admin/get-all-trainers', 'TrainerController@getAllTrainers');

//Admin -> Trainer Shifts Functions
Route::resource('admin/trainer-shifts', 'TrainerShiftController');
Route::get('admin/get-all-trainer-shifts', 'TrainerShiftController@getAllShifts');
Route::get('admin/get-all-trainer-shifts-type', 'TrainerShiftTypeController@index');

//Admin -> Inventory Functions
Route::resource('admin/inventory', 'InventoryController');
Route::put('admin/inventory/update', 'InventoryController@update');
Route::get('admin/get-all-inventory', 'InventoryController@getAllInventory');
Route::get('admin/get-all-inventory-category', 'InventoryItemCategoryController@index');

//Admin -> Fitness Blog
Route::resource('admin/fitness-blog', 'FitnessBlogController');

//Admin -> Online Store
Route::resource('admin/online-store', 'OnlineStoreController');
Route::get('admin/get-all-online-store', 'OnlineStoreController@getAllOnlineStore');

//Admin -> Online Coach
Route::resource('admin/online-coach', 'OnlineCoachController');