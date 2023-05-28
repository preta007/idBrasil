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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/account', [App\Http\Controllers\AccountController::class, 'index'])->name('account');
Route::get('/account/add', [App\Http\Controllers\AccountController::class, 'add'])->name('add.account');
Route::post('/account/create', [App\Http\Controllers\AccountController::class, 'create'])->name('create.account');
Route::delete('/account/delete/{id}',[App\Http\Controllers\AccountController::class,'destroy'])->name('destroy.account');
Route::get('/movement/{id}', [App\Http\Controllers\MovementController::class, 'index'])->name('movement');
Route::delete('/movement/delete/{id}',[App\Http\Controllers\MovementController::class,'destroy'])->name('destroy.movement');