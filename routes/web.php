<?php

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

Route::get('/', function () {
    return "petfeed";
});


//ROUTE CONTROL
Route::post('/register', 'RegistrationController@register')->name('user.register');
Route::post('/login', 'RegistrationController@login')->name('user.login');
Route::post('/treat', 'FeedingController@treat')->name('user.treat');


//TEST ROUTES
Route::get('/test', 'RegistrationController@test')->name('user.test');
Route::get('/test/register', 'RegistrationController@register')->name('user.register.test');
Route::get('/test/login', 'RegistrationController@login')->name('user.login.test');
Route::get('/test/treat', 'FeedingController@treat')->name('user.treat.test');
Route::get('/test/schedule/get/schedule', 'SchedulesController@getSchedule')->name('user.test.get.schedule');
Route::get('/test/schedule/set', 'SchedulesController@setSchedule')->name('user.test.set.schedule');
Route::get('/test/schedule/create', 'SchedulesController@create')->name('user.test.create.schedule');
Route::get('/test/schedule/get/status', 'SchedulesController@getStatus')->name('user.test.get.status');
