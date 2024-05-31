<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    $title = "Dashboard";
    return view('dashboard', [
        'title' => $title,
    ]);
});


Route::resource('categories', CategoriesController::class);