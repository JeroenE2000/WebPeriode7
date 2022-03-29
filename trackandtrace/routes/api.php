<?php

use App\Http\Controllers\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;


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


//public routes
Route::controller(AuthApiController::class)->group(function() {
    route::post('/register' , 'register');
    route::post('/login' , 'login');
});



//protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::controller(PackageController::class)->group(function() {
        route::get('/packages' , 'index');
        route::get('/packages/{id}' , 'show');
    });
    Route::controller(AuthApiController::class)->group(function() {
        route::post('/logout' , 'logout');
    });

    Route::group(['middleware' => ['isSuperAdmin']], function() {
        Route::controller(PackageController::class)->group(function() {
            route::post('/packages', 'store');
            route::put('/packages/{id}' , 'update');
            route::delete('/packages/{id}', 'destroy');
        });
    });
    Route::group(['middleware' => ['isAdministratie']], function() {
        Route::controller(PackageController::class)->group(function() {
            route::post('/packages', 'store');
            route::put('/packages/{id}' , 'update');
            route::delete('/packages/{id}', 'destroy');
        });
    });
});

