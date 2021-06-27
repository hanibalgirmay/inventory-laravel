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
    return view('welcome');
});

Auth::routes();

Route::resource('items', App\Http\Controllers\ItemController::class);
Route::resource('customers', App\Http\Controllers\UsersController::class);
Route::resource('vendors', App\Http\Controllers\VendorController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/vendor', [App\Http\Controllers\VendorController::class, 'index'])->name('vendor');
