<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('admin')->group(function (){
    Route::get('/', AdminController::class)->name('admin.index');


    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('products', ProductController::class)->except('create', 'store', 'show');

    Route::fallback(function () {
        return 'NOT FOUND';
    });
});

