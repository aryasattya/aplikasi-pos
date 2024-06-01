<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    $title = "Dashboard";
    return view('dashboard', [
        'title' => $title,
    ]);
});


Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductsController::class);
Route::resource('customers', CustomersController::class);
Route::resource('transactions', TransactionsController::class);
Route::resource('users', UsersController::class);