<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'getProducts'])->name('index');
Route::get('/orders', [IndexController::class, 'getOrders'])->name('orders');
Route::get('/token', [AuthController::class, 'auth'])->name('auth');
Route::get('/save', [ItemController::class, 'saveItem'])->name('save')->middleware('accessToken');
