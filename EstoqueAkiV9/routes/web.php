<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReportProductController;
use App\Http\Controllers\ReportMovementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExcelController;

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

/*Falta Model/Migration/Controller de Report*/

Route::get('/', function () {
    return view('auth.index');});

Route::get('/reports', function () {
    return view('reports.index');});

Route::resource('products', ProductController::class);

Route::resource('inputs', InputController::class);

Route::resource('outputs', OutputController::class);

Route::resource('suppliers', SupplierController::class);

Route::resource('reportProduct', ReportProductController::class);

Route::resource('reportMovement', ReportMovementController::class);

Route::resource('users', UserController::class);

Route::get('/Product/{type}/excel', [ExcelController::class, 'excelToExport'])->name('excel');
Route::get('/Product/{type}/pdf', [ExcelController::class, 'excelToExport'])->name('pdf');