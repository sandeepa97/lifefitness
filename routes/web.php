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
Route::resource('admin/schedules', 'ScheduleController');
Route::resource('admin/exercises', 'ExerciseController');
Route::get('admin/get-all-exercises', 'ExerciseController@getAllExercises');

//Admin -> Notice Functions
Route::resource('admin/notices', 'NoticeController');

//Admin -> Profit Functions
Route::resource('admin/profit', 'ProfitController');

//Admin -> Trainer Functions
Route::resource('admin/trainers', 'TrainerController');

//Admin -> Trainer Shifts Functions
Route::resource('admin/trainer-shifts', 'TrainerShiftsController');

//Admin -> Inventory Functions
Route::resource('admin/inventory', 'InventoryController');