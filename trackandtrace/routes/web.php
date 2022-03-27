<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\PDFController;

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
    return view('welcome');
});

Auth::routes();

Route::resource('/home', HomeController::class)->only(['index']);
Route::put('/labels/search', [LabelController::class, 'search'])->name('labels.search');

Route::middleware(['isSuperAdmin'])->group(function() {
    Route::resource('/labels' , LabelController::class);
    Route::get('/generate-barcode', [PDFController::class, 'index'])->name('generate.barcode');
});

Route::middleware(['isAdministratie'])->group(function() {
    Route::resource('/labels' , LabelController::class)->only(['index' , 'create' , 'edit' , 'store' , 'update' , 'search']);
    Route::post('/generate-barcode', [PDFController::class, 'index'])->name('generate.barcode');
    Route::get('/generate-singlebarcode/{id}' , [PDFController::class, 'singlePDF'])->name('singlePDF.barcode');
});

Route::middleware(['isInPakker'])->group(function() {
    Route::resource('/labels' , LabelController::class)->only(['index' , 'search']);
});


