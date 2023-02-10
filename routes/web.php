<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Shop\CreateController;
use App\Http\Controllers\Shop\GoodsBuyController;
use App\Http\Controllers\Shop\HistoryController;
use App\Http\Controllers\Shop\ShopController;
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

Route::get('/',  MainPageController::class)->name('mainpage');

Route::group(['prefix' => 'shop'], function () {
    Route::get('/',  ShopController::class)->name('shop');
    Route::get('/history',  HistoryController::class)->name('history');
    Route::post('/data',  GoodsBuyController::class)->name('data');
    Route::get('/create',  CreateController::class)->name('create');
    Route::post('/create',  [Goods::class, 'store'])->name('store');
});

