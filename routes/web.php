<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/table', function () {
    return view('table');
});

Route::resource('detections', \App\Http\Controllers\DetectionsController::class);
Route::resource('videodetects', \App\Http\Controllers\VideoDetectController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('markings', \App\Http\Controllers\MarkingsController::class);
Route::resource('vehicles', \App\Http\Controllers\VehicleController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/reports', [App\Http\Controllers\HomeController::class, 'reports'])->name('reports');
