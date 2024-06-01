<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;




Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    
 Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductsController::class);
Route::resource('customers', CustomersController::class);
Route::resource('transactions', TransactionsController::class);
Route::resource('users', UsersController::class);

});