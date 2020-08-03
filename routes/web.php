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

//Admin
Route::resource('admin/members', 'MemberController');
Route::get('admin/get-all-members', 'MemberController@getAllMembers');