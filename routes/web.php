<?php

use App\Http\Controllers\Admin\AddCategoryController;
use App\Http\Controllers\Admin\AddMealController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MealController;
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

Route::get('/menu', [MealController::class,'showMenu'])->name('menu');




// ---------------------------------------Admin Routes ----------------------------------
Route::middleware([Admin::class])->group(function(){
    //----------------------------------Category Routes ---------------------------------
    Route::get('/category-create', [AddCategoryController::class, 'showAddCategoryForm'])->name('create-category');
    Route::post('/category-create', [AddCategoryController::class, 'addCategory']);
    //----------------------------------Meals Routes-------------------------------------
    Route::get('/meal-create', [AddMealController::class, 'showAddMealForm'])->name('create-meal');
    Route::post('/meal/create', [AddMealController::class,'addMeal']);
});
