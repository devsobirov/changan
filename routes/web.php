<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChanganController;

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

Route::get('/', [ChanganController::class, 'index']);
Route::post('/apply-form', [ChanganController::class, 'applyForm'])->name('apply-form');
//Route::get('/', [MainController::class, 'index'])->name('home');
//Route::get('/get-models/{catalog:title?}', [MainController::class, 'getModels'])->name('get-models');
//Route::get('/get-cars/{carModel:id?}', [MainController::class, 'getCars'])->name('get-cars');
//Route::get('/filter-cars', [MainController::class, 'filterCars'])->name('filter-cars');
Route::view('/template', 'template');
