<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReportProductController;
use App\Http\Controllers\ReportMovementController;
use App\Http\Controllers\UserController;

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
    return view('auth.index');
})->name('login');

Route::resource('users', UserController::class);

Route::middleware(['check.authenticated'])->group(function () {
 // Suas rotas protegidas aqui
 Route::resource('products', ProductController::class);
 Route::resource('inputs', InputController::class);
 Route::resource('outputs', OutputController::class);
 Route::resource('suppliers', SupplierController::class);
 Route::resource('reportProduct', ReportProductController::class);
 Route::get('/reportProduct/excel', [ReportProductController::class, 'excelExport'])->name('excel');
Route::resource('reportMovement', ReportMovementController::class);
});