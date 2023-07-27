<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AddMealMealController extends Controller
{
    public function showAddMealForm(){
        $categories = Category::all();
        return view('admin.AddMeal', [
            'categories' => $categories
        ]);
    }
}