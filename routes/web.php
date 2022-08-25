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


Route::get('/admin', [App\Http\Controllers\BackendController::class, 'admin'])->name('admin');
Route::get('/viewUser', [App\Http\Controllers\UserController::class, 'viewUser'])->name('viewUser');



Route::post('/storeUser', [App\Http\Controllers\UserController::class, 'store'])->name('storeUser');
Route::get('/deleteUser/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('deleteUser');
