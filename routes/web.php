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
Route::get('admin/home', 'HomeController@index')->name('admin.home');
Route::get('user/home', 'HomeController@index')->name('user.home');

Route::resource('admin/doctors', 'admin\DoctorController', array("as" => "admin"))->middleware('auth');
Route::resource('admin/patients', 'admin\PatientController', array("as" => "admin"))->middleware('auth');
Route::resource('admin/visits', 'admin\VisitController', array("as" => "admin"))->middleware('auth');
//Route::resource('user/doctors', 'user\DoctorController', array("as" => "user"));

//Route::resource('/doctors', 'user\DoctorController', array("as" =>"user"));
Route::get('/doctors', 'user\DoctorController@index')->name('user.doctors.index')->middleware('auth');;
Route::get('/doctors/{doctor}', 'user\DoctorController@show')->name('user.doctors.show')->middleware('auth');;

//Route::resource('/patients', 'user\PatientController', array("as" =>"user"));
Route::get('/patients', 'user\PatientController@index')->name('user.patients.index')->middleware('auth');;
Route::get('/patients/{patient}', 'user\PatientController@show')->name('user.patients.show')->middleware('auth');;

//Route::resource('/visits', 'user\VisitController', array("as" =>"user"));
Route::get('/visits', 'user\VisitController@index')->name('user.visits.index')->middleware('auth');
Route::get('/visits/create', 'user\VisitController@create')->name('user.visits.create')->middleware('auth');



