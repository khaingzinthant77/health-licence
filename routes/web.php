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

Route::get('/', function () {
   return redirect()->route('dashboard');

})->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', function() {
//     return view('home'); 
// })->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	// Route::get('dashboard','HomeController@index')->name('dashboard');
	Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

	Route::resource('roles', 'App\Http\Controllers\RoleController');
    Route::resource('users', 'App\Http\Controllers\UserController');

	Route::resource('clinic','App\Http\Controllers\ClinicController');
	Route::resource('doctor','App\Http\Controllers\DoctorController');
	Route::resource('history','App\Http\Controllers\ClinicHistoryController');

	Route::resource('township','App\Http\Controllers\TownshipController');
	Route::resource('licence','App\Http\Controllers\LicenceTypeController');
	Route::resource('sublicence','App\Http\Controllers\SubLicenceTypeController');
	Route::get('/print/{id}','App\Http\Controllers\ClinicController@print')->name('clinic.print');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/qr/{id}','App\Http\Controllers\ClinicController@qrData')->name('qr.data');
