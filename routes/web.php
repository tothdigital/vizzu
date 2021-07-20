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

Route::redirect('/', '/site', 301);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/app_pro', App\Http\Controllers\AppProIndexController::class);

Route::resource('/app_pro2', App\Http\Controllers\AppProLoginController::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
