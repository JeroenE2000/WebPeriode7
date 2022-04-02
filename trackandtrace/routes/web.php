<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('/home', HomeController::class)->only(['index']);
Route::put('/labels/search', [LabelController::class, 'search'])->name('labels.search');

Route::middleware(['isReceiver'])->group(function() {
   Route::resource('/package' , PackageController::class);
});

Route::middleware(['isSuperAdmin'])->group(function() {
    Route::resource('/labels' , LabelController::class);
    Route::resource('/users', UserController::class)->only(['index' , 'edit' , 'update']);
    route::resource('/package' , PackageController::class);
    Route::post('/generate-barcode', [PDFController::class, 'index'])->name('generate.barcode');
    Route::resource('/shops' , ShopController::class);
});

Route::middleware(['isAdministratie'])->group(function() {
    Route::resource('/labels' , LabelController::class)->only(['index' , 'create' , 'edit' , 'store' , 'update' , 'search']);
    route::resource('/package' , PackageController::class);
    Route::post('/generate-barcode', [PDFController::class, 'index'])->name('generate.barcode');
    Route::resource('/shops' , ShopController::class)->only(['index' , 'create' , 'edit' , 'store' , 'update']);
});

Route::middleware(['isInPakker'])->group(function() {
    Route::resource('/labels' , LabelController::class)->only(['index' , 'search']);
    Route::resource('/shops' , ShopController::class)->only(['index']);
});


