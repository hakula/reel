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

Route::get('test', function () {
	
	$user = Auth::user();		
	$jobs = App\Models\Job::all();	
			
	return view('table', [
		'user' => $user,
		'jobs' => $jobs
	]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users.jobs', 'UserJobController');
