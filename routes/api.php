<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorsController;
use App\Http\Controllers\Api\exercisesCategoriesController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->middleware('auth:api');
});


Route::controller(DoctorsController::class)->group(function () {
    Route::get('doctors', 'index');
});
Route::controller(exercisesCategoriesController::class)->group(function () {
    Route::get('exercisesCategories', 'index');
});
