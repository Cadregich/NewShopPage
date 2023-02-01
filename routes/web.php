<?php

namespace App\Http\Controllers;

use App\Models\Goods;
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

Route::get('/',  ShopController::class);
Route::get('/data',  DataController::class)->name('data');
Route::get('/create',  CreateController::class)->name('create');
Route::post('/create',  [Goods::class, 'store'])->name('store');
