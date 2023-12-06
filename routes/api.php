<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserProfilesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/store', [UserProfilesController::class, 'store'])->name('store');;

Route::controller(UserProfilesController::class)->group(function () {
        Route::get('/profile',                          'index');
        Route::get('/profile/{id}',                     'show');
        Route::put('/profile/firstname/{id}',           'firstname')->name('profile.firstname');
        Route::put('/profile/lastname/{id}',            'lastname')->name('profile.lastname');
        Route::put('/profile/middle_initial/{id}',      'middle_initial')->name('profile.middle_initial');
        Route::put('/profile/ext/{id}',                 'ext')->name('profile.ext');
        Route::put('/profile/course/{id}',              'course')->name('profile.course');
        Route::put('/profile/year_level/{id}',          'year_level')->name('profile.year_level');
        Route::delete('/profile/{id}',         'destroy');
});

