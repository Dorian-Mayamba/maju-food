<?php

use App\Http\Controllers\Admin\AddCategoryController;
use App\Http\Controllers\Admin\AddMealMealController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MenuController;
use App\Http\Middleware\Admin;
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

Route::get('/', [IndexController::class,'index'])->name('home');

Auth::routes();

Route::get('/menu', [MenuController::class,'showMenu'])->name('menu');

Route::middleware([Admin::class])->group(function(){
    Route::get('/category-create', [AddCategoryController::class, 'showAddCategoryForm'])->name('create-category');
    Route::get('/meal-create', [AddMealMealController::class, 'showAddMealForm'])->name('create-meal');
});
