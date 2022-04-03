<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PickUpController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', [PackageController::class, 'search'])->name('parcels.search');

Auth::routes();

Route::resource('/home', HomeController::class)->only(['index']);
Route::put('/labels/search', [LabelController::class, 'search'])->name('labels.search');
Route::put('/parcels/status/parcels', [PackageController::class, 'status'])->name('parcels.status');

Route::middleware(['isSuperAdmin'])->group(function() {
    Route::resource('/labels' , LabelController::class);
    Route::resource('/users', UserController::class)->only(['index' , 'edit' , 'update']);

    Route::get('/labels/import/labels', [LabelController::class, 'fileImportExport'])->name('label.csvimport');
    Route::post('/labels/labels-import' , [LabelController::class,'fileImport'])->name('label.import');

    Route::get('/package/import/package', [PackageController::class, 'fileImportExport'])->name('package.csvimport');
    Route::post('/package/package-import' , [PackageController::class,'fileImport'])->name('package.import');

    route::resource('/package' , PackageController::class);
    Route::post('/generate-barcode', [PDFController::class, 'index'])->name('generate.barcode');
    Route::resource('/shops' , ShopController::class);
    Route::resource('/reviews' , ReviewController::class)->except(['create' , 'store']);

    Route::controller(PickUpController::class)->group(function(){
        Route::get('pickup/{package}/create' , 'create')->name('pickup.create');
        Route::post('pickup/{package}' , 'pickUpStoreAndUpdate')->name('pickup.store');
    });

});

Route::middleware(['isAdministratie'])->group(function() {
    Route::resource('/labels' , LabelController::class)->only(['index' , 'create' , 'edit' , 'store' , 'update' , 'search']);

    Route::get('/labels/import/labels', [LabelController::class, 'fileImportExport'])->name('label.csvimport');
    Route::post('/labels/labels-import' , [LabelController::class,'fileImport'])->name('label.import');

    Route::get('/package/import/package', [PackageController::class, 'fileImportExport'])->name('package.csvimport');
    Route::post('/package/package-import' , [PackageController::class,'fileImport'])->name('package.import');

    route::resource('/package' , PackageController::class);
    Route::post('/generate-barcode', [PDFController::class, 'index'])->name('generate.barcode');
    Route::resource('/shops' , ShopController::class)->only(['index' , 'create' , 'edit' , 'store' , 'update']);
    Route::resource('/reviews' , ReviewController::class)->except(['create' , 'store']);

    Route::controller(PickUpController::class)->group(function(){
        Route::get('pickup/{package}/create' , 'create')->name('pickup.create');
        Route::post('pickup/{package}' , 'pickUpStoreAndUpdate')->name('pickup.store');
    });

});

Route::middleware(['isInPakker'])->group(function() {
    Route::resource('/labels' , LabelController::class)->only(['index' , 'search']);
});

Route::middleware(['isReceiver'])->group(function() {
    Route::resource('/package' , PackageController::class)->only(['index']);
    Route::resource('/reviews' , ReviewController::class)->except(['create' , 'store']);
    Route::controller(ReviewController::class)->group(function(){
        Route::get('reviews/{package}/review' , 'create')->name('review.create');
        Route::post('reviews/postreview' , 'store')->name('review.store');
    });
 });


