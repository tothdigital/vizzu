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


Route::get('/app_pro', [App\Http\Controllers\AppProIndexController::class, 'index']);

Route::get('/app_pro/login', [App\Http\Controllers\AppProLoginController::class, 'index']);