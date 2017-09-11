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

//  Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Login, Register, & Password
Auth::routes();

// Dahsboard 
Route::get('/home', 'HomeController@index')->name('home');

// Resource Routes
Route::resource('jobs', 'JobController');
Route::resource('jobs.applicants', 'JobApplicantController');
Route::resource('users', 'UserController');
Route::resource('users.jobs', 'UserJobController');
Route::resource('users.applicants', 'UserApplicantController');

// Public Share Route
Route::get('shares/{guid}', 'ShareController@show');

