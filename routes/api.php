<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/* use app\Http\Controllers\StoreController; */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('stores', StoreController::class);
Route::resource('bikes', BikeController::class);
Route::resource('accessories', AccessoryController::class);