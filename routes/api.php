<?php

use App\Http\Controllers\Api\ArticlesController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthorLogsController;
use App\Http\Controllers\Api\AuthorsController;
use App\Http\Controllers\Api\CoverRequestsController;
use App\Http\Controllers\Api\EditorialStaffsController;
use App\Http\Controllers\Api\PublicationManagementsController;
use App\Http\Controllers\Api\PublicationsController;
use App\Http\Controllers\Api\UserProfilesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Public API */

Route::post('/register', [UserProfilesController::class,    'store'])->name('profile.store');
Route::post('/login',    [AuthController::class,            'login'])->name('profile.login');


/* Private API */

Route::middleware('auth:sanctum')->group(function () {

    /* COMMON ROUTES */
    /* User Specific Info */
    Route::controller(UserProfilesController::class)->group(function () {
        Route::get('/profile',                           'showUser');
        Route::put('/profile/password',                  'password')->name('profile.password');     //change password
        Route::put('/profile/update-info',               'updateInfo') -> name ('profile.updateInfo');      //update user info
    });

    Route::post('/logout', [AuthController::class, 'logout']);

     /* Editor only routes */
    Route::middleware('editor')->group(function () {

        /* User Management */
        Route::controller(UserProfilesController::class)->group(function () {
            Route::get('/user',                              'index');         //Shows ALL Users
            Route::get('/user/{id}',                         'show');          //shows based on the id
            Route::delete('/user/{id}',                      'destroy');       //delete user
        });

        /* Author Management */
        Route::controller(AuthorsController::class)->group(function () {
            Route::get('/author',                          'index');
            Route::get('/author/{id}',                     'show');
            Route::delete('/author/{id}',                  'destroy');
        });

        /* Editor Management */
        Route::controller(EditorialStaffsController::class)->group(function () {
            Route::get('/editor',                          'index');
            Route::get('/editor/{id}',                     'show');
            Route::delete('/editor/{id}',                  'destroy');
        });

        
        Route::controller(PublicationsController::class)->group(function () {
            Route::get('/publication',                          'index');
            Route::post('/publication',                        'store');
            Route::get('/publication/{id}',                     'show');
            Route::put('/publication/{id}',                     'update');
            Route::delete('/publication/{id}',                  'destroy');
        });

        
        Route::controller(PublicationManagementsController::class)->group(function () {
            Route::get('/management',                          'index');
            Route::post('/management',                         'store');
            Route::get('/management/{id}',                     'show');
            Route::put('/management/{id}',                     'update');
            Route::delete('/management/{id}',                  'destroy');
        });

    });


     /* Author only routes */
    Route::middleware('author')->group(function () {

        /* Article Management */
        Route::controller(ArticlesController::class)->group(function () {
            Route::get('/article',                               'index');
            Route::get('/article/{id}',                          'show');
            Route::put('/article/title/{id}',                    'title')->name('article.title');
            Route::put('/article/content/{id}',                  'content')->name('article.content');
            Route::put('/article/file/{id}',                     'file')->name('article.file');
            Route::post('/article',                              'store')->name('article.store');
        });
        
        /* cover request Management */
        Route::controller(CoverRequestsController::class)->group(function () {
            Route::get('/cover',                               'index');
            Route::get('/cover/{id}',                          'show');
            Route::delete('/cover/{id}',                       'destroy');
        });


        /* Logs for Author */
        Route::controller(AuthorLogsController::class)->group(function () {
            Route::get('/authorLogs',                               'index');
            Route::get('/authorLogs/{id}',                          'show');
        });
    });

});





