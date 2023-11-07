<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\SupplierController;

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





    
Route::get('/reports/movements', function () {
    return view('reports.movements.index');});

Route::resource('products', ProductController::class);

Route::resource('inputs', InputController::class);

Route::resource('outputs', OutputController::class);

Route::resource('suppliers', SupplierController::class);
