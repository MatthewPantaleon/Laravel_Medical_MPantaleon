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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/doctors', 'admin\DoctorController', array("as" => "admin"));
//Route::resource('user/doctors', 'user\DoctorController', array("as" => "user"));

Route::get('/doctors', 'user\DoctorController@index')->name('user.doctors.index');
Route::get('/doctors/{doctor}', 'user\DoctorController@show')->name('user.doctors.show');

