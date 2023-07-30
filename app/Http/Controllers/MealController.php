<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * @return View
     */
    public function showMenu(): View{
        $meals = Meal::all();
        return view('Menu', [
            'meals'=> $meals
        ]);
    }
}
