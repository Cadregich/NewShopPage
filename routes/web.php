<?php

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

Route::get('/', function () {
    return view('shop');
});
Route::get('/data',  \App\Http\Controllers\DataController::class)->name('data');
Route::get('/create',  \App\Http\Controllers\CreateController::class)->name('create');
Route::post('/create',  \App\Http\Controllers\StoreController::class)->name('store');
