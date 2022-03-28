<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::controller(PackageController::class)->group(function() {
    route::get('packages' , 'index');
    route::get('packages/{id}' , 'show');
    route::post('packages', 'store');
    route::put('packages/{id}' , 'update');
    route::delete('packages/{id}', 'delete');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
