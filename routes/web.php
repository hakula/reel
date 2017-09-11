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

Route::resource('jobs', 'JobController');
Route::resource('jobs.applicants', 'JobApplicantController');
Route::resource('users.jobs', 'UserJobController');
Route::resource('users.applicants', 'UserApplicantController');

Route::get('shares/{guid}', 'ShareController@show');

