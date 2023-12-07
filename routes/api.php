<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserProfilesController;
use App\Http\Controllers\Api\UserAccountsController;
use App\Http\Controllers\Api\AuthorsController;


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


Route::post('/store', [UserProfilesController::class, 'store'])->name('store');
//Route::post('/account/store', [UserAccountsController::class, 'store'])->name('store');;
//Route::post('/author', [AuthorsController::class, 'store'])->name('store');


Route::controller(UserAccountsController::class)->group(function () {
        Route::get('/account',                          'index');
        //Route::get('/account/{id}',                     'show');
        // Route::put('/profile/firstname/{id}',           'firstname')->name('profile.firstname');
        // Route::put('/profile/lastname/{id}',            'lastname')->name('profile.lastname');
        // Route::put('/profile/middle_initial/{id}',      'middle_initial')->name('profile.middle_initial');
        // Route::put('/profile/ext/{id}',                 'ext')->name('profile.ext');
        // Route::put('/profile/course/{id}',              'course')->name('profile.course');
        // Route::put('/profile/year_level/{id}',          'year_level')->name('profile.year_level');
        // Route::delete('/profile/{id}',         'destroy');
});


Route::controller(UserProfilesController::class)->group(function () {
    Route::get('/profile',                          'index');
    Route::get('/profile/{id}',                     'show');
    Route::put('/profile/firstname/{id}',           'firstname')->name('profile.firstname');
    Route::put('/profile/lastname/{id}',            'lastname')->name('profile.lastname');
    Route::put('/profile/middle_initial/{id}',      'middle_initial')->name('profile.middle_initial');
    Route::put('/profile/ext/{id}',                 'ext')->name('profile.ext');
    Route::put('/profile/course/{id}',              'course')->name('profile.course');
    Route::put('/profile/year_level/{id}',          'year_level')->name('profile.year_level');
    Route::delete('/profile/{id}',                  'destroy');
});

Route::controller(AuthorsController::class)->group(function () {
        Route::get('/author',                          'index');
        Route::get('/author/{id}',                     'show');
        Route::put('/author/{id}',                     'update');
        Route::post('/author',                         'store');
        Route::delete('/author/{id}',                  'destroy');
});

Route::controller(EditorialStaffsController::class)->group(function () {
        Route::get('/editor',                          'index');
        Route::get('/editor/{id}',                     'show');
        Route::put('/editor/{id}',                     'update');
        Route::post('/editor',                         'store');
        Route::delete('/editor/{id}',                  'destroy');
});


Route::controller(ArticlesController::class)->group(function () {
    Route::get('/article',                          'index');
    Route::post('/article',                         'store')->name('store');
    Route::get('/article/{id}',                     'show');
    Route::put('/article/{id}',                     'update');
    Route::delete('/article/{id}',                  'destroy');
    Route::put('/article/title/{id}',               'title')->name('article.title');
    Route::put('/article/content/{id}',             'content')->name('article.content');
    Route::put('/article/image/{id}',               'image')->name('article.image');
    Route::put('/article/document/{id}',            'document')->name('article.document');
});


Route::controller(CoverRequestsController::class)->group(function () {
    Route::get('/cover',                             'index');
    Route::post('/cover',                            'store')->name('store');
    Route::get('/cover/{id}',                        'show');
    Route::put('/cover/{id}',                        'update');
    Route::delete('/cover/{id}',                     'destroy');

});