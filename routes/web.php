<?php

use Illuminate\Support\Facades\Route;


//Home
Route::get('/','Home\HomeController@index' );
Route::get('/home','Home\HomeController@index2' );
Route::get('/about','Home\HomeController@about' );
Route::get('/contact','Home\HomeController@contact' );
Route::get('/member-login','Home\HomeController@memberLogin' );

Route::get('/blog','Blog\BlogController@index' );
Route::get('/store','Store\StoreController@index' );
Route::get('/coaching','Coaching\CoachController@index' );

//login and logout process
Route::get('login', 'LoginController@index');
Route::post('post-login', 'LoginController@postLogin');
Route::post('post-member-login', 'LoginController@postMemberLogin');

Route::get('admin-dashboard', 'LoginController@dashboard'); 
Route::get('logout', 'LoginController@logout');

//Admin -> Gym Status
Route::resource('admin/gym-status','GymStatusController');
Route::get('admin/get-all-gym-status','GymStatusController@getAllGymStatus');

//Admin -> Member Functions
Route::resource('admin/members', 'MemberController');
Route::get('admin/get-all-members', 'MemberController@getAllMembers');

//Admin -> Payment Functions
Route::resource('admin/payments', 'PaymentController');
Route::get('admin/get-all-payments', 'PaymentController@getAllMemberPayments');
Route::get('admin/get-all-payment-types', 'PaymentTypeController@index');
Route::get('admin/get-all-monthly-payments', 'PaymentController@getMonthlyPayments');
Route::get('admin/get-all-annual-payments', 'PaymentController@getAnnualPayments');

//Admin -> MemberAttendance Functions
Route::resource('admin/member-attendance', 'MemberAttendanceController');
Route::get('admin/view-member-attendance', 'MemberAttendanceController@viewAttendance');
Route::get('admin/get-all-attendance', 'MemberAttendanceController@getAllMemberAttendance');
Route::get('admin/get-today-attendance', 'MemberAttendanceController@getTodayAttendance');

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

//Admin -> Report Functions
Route::resource('admin/reports', 'ReportController');
Route::get('admin/reports-payment', 'ReportController@loadPaymentReports');
Route::get('admin/reports-attendance', 'ReportController@loadAttendanceReports');
Route::get('admin/reports-member', 'ReportController@loadMemberReports');

Route::post('admin/reports-payments-check', 'ReportController@checkPaymentReport');
Route::post('admin/reports-attendance-check', 'ReportController@checkAttendanceReport');
Route::post('admin/reports-member-check', 'ReportController@checkMemberReport');

//Admin -> Trainer Functions
Route::resource('admin/trainers', 'TrainerController');
Route::get('admin/get-all-trainers', 'TrainerController@getAllTrainers');

//Admin -> Trainer Shifts Functions
Route::resource('admin/trainer-shifts', 'TrainerShiftController');
Route::get('admin/get-all-trainer-shifts', 'TrainerShiftController@getAllShifts');
Route::get('admin/get-all-trainer-shifts-type', 'TrainerShiftTypeController@index');

//Admin -> Inventory Functions
Route::resource('admin/inventory', 'InventoryController');
Route::get('admin/get-all-inventory', 'InventoryController@getAllInventory');
Route::get('admin/get-all-inventory-category', 'InventoryItemCategoryController@index');
Route::get('admin/get-next-service', 'InventoryController@getNextService');

// Admin -> Trainer Payments
Route::resource('admin/trainer-payments','TrainerPaymentController');
Route::get('admin/get-all-trainer-payments','TrainerPaymentController@getAllTrainerPayments');

//Admin -> Fitness Blog
Route::resource('admin/fitness-blog', 'FitnessBlogController');
Route::get('admin/get-all-fitness-blog', 'FitnessBlogController@getAllBlogs');
Route::get('admin/get-all-fitness-blog-types', 'FitnessBlogTypeController@index');

//Admin -> Online Store
Route::resource('admin/online-store', 'OnlineStoreController');
Route::get('admin/get-all-online-store', 'OnlineStoreController@getAllOnlineStore');
Route::get('admin/get-all-online-store-category', 'OnlineStoreItemCategoryController@index');

//Admin -> Online Coach
Route::resource('admin/online-coach', 'OnlineCoachController');
Route::get('admin/get-all-online-clients', 'OnlineCoachController@getAllOnlineClients');
Route::get('admin/get-all-online-coach-packages', 'OnlineCoachPackageController@index');

//Admin -> Member Feedbacks & Reviews
Route::get('admin/member-feedbacks', 'Member\MemberFeedbackController@loadMemberFeedbacksAdmin'); 


//Member ->
Route::resource('member-dashboard', 'Member\MemberDashboardController'); 
Route::get('member/workout-schedules', 'Member\MemberDashboardController@loadWorkoutSchedules'); 
Route::get('member/payment-details', 'Member\MemberDashboardController@loadPaymentDetails'); 
Route::get('member/notifications', 'Member\MemberDashboardController@loadNotifications'); 
Route::get('member/feedbacks-reviews', 'Member\MemberDashboardController@loadFeedbacks'); 
Route::get('member/online-coach', 'Member\MemberDashboardController@loadOnlineCoach'); 
Route::resource('member/feedbacks', 'Member\MemberFeedbackController'); 
Route::get('member/get-all-feedbacks', 'Member\MemberFeedbackController@getAllmemberFeedbacks'); 



//Trainer ->
Route::resource('trainer-dashboard', 'Trainer\TrainerDashboardController'); 
