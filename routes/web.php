<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ClinicsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\ExerciseCategoryController;
use App\Http\Controllers\Admin\SpecialitiesController;
use App\Http\Controllers\Admin\ClinicReservationsController;

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

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {
    Route::view('/', 'admin.index')->name('home');

    Route::controller(AdminsController::class)->prefix('admins')->group(function () {
        Route::get('/', 'index')->name('admins.index');
        Route::get('/create', 'create')->name('admins.create');
        Route::post('/', 'store')->name('admins.store');
        Route::get('/{id}', 'edit')->name('admins.edit');
        Route::post('/{id}', 'update')->name('admins.update');
        Route::delete('/{id}', 'delete')->name('admins.delete');
    });

    Route::controller(SpecialitiesController::class)->prefix('specialities')->group(function () {
        Route::get('/', 'index')->name('specialities.index');
        Route::get('/create', 'create')->name('specialities.create');
        Route::post('/', 'store')->name('specialities.store');
        Route::get('/{id}', 'edit')->name('specialities.edit');
        Route::post('/{id}', 'update')->name('specialities.update');
        Route::delete('/{id}', 'delete')->name('specialities.delete');
    });
    Route::controller(DoctorsController::class)->prefix('doctors')->group(function () {
        Route::get('/', 'index')->name('doctors.index');
        Route::get('/create', 'create')->name('doctors.create');
        Route::post('/', 'store')->name('doctors.store');
        Route::get('/{id}', 'edit')->name('doctors.edit');
        Route::post('/{id}', 'update')->name('doctors.update');
        Route::delete('/{id}', 'delete')->name('doctors.delete');
    });

    Route::controller(UsersController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/create', 'create')->name('users.create');
        Route::post('/', 'store')->name('users.store');
        Route::get('/{id}', 'edit')->name('users.edit');
        Route::post('/{id}', 'update')->name('users.update');
        Route::delete('/{id}', 'delete')->name('users.delete');
    });

    Route::controller(ClinicsController::class)->prefix('clinics')->group(function () {
        Route::get('/', 'index')->name('clinics.index');
        Route::get('/create/{id}', 'create')->name('clinics.create');
        Route::post('/{doctor_id}', 'store')->name('clinics.store');
        Route::get('/{id}', 'edit')->name('clinics.edit');
        Route::put('/{id}', 'update')->name('clinics.update');
        Route::delete('/{id}', 'delete')->name('clinics.delete');
    });

    Route::controller(ClinicReservationsController::class)->prefix('reservations')->group(function () {
        Route::get('/', 'index')->name('reservations.index');
        Route::post('/', 'changeStatus')->name('reservations.changeStatus');
        Route::delete('/{id}', 'delete')->name('reservations.delete');
    });
    //me
    Route::controller(ReviewController::class)->prefix('review')->group(function () {
        Route::get('/', 'index')->name('review.index');
        Route::get('/create', 'create')->name('review.create');
        Route::post('/', 'store')->name('review.store');
        Route::get('/{id}', 'edit')->name('review.edit');
        Route::put('/{id}', 'update')->name('review.update');
        Route::delete('/{id}', 'delete')->name('review.delete');

    });
    Route::controller(ExerciseCategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'index')->name('categories.index');
        Route::get('/create', 'create')->name('categories.create');
        Route::post('/', 'store')->name('categories.store');
        Route::get('/{id}', 'edit')->name('categories.edit');
        Route::post('/{id}', 'update')->name('categories.update');
        Route::delete('/{id}', 'delete')->name('categories.delete');
    });
    Route::controller(ExerciseController::class)->prefix('exercise')->group(function () {
        Route::get('/', 'index')->name('exercise.index');
        Route::get('/create', 'create')->name('exercise.create');
        Route::post('/', 'store')->name('exercise.store');
        Route::get('/{id}', 'edit')->name('exercise.edit');
        Route::post('/{id}', 'update')->name('exercise.update');
        Route::delete('/{id}', 'delete')->name('exercise.delete');
    });
});
