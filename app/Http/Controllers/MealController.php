<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
define("ACCOMPAGNEMENT_CONSTANT", "Accompagnements");
define("PLAT_CONSTANT", "Plat");
define("BOISSON_CONSTANT", "Boissons");

class MealController extends Controller
{
    /**
     * @return View
     */
    public function showMenu(): View{
        $meal_from_cat = $this->getCatFromConstant(PLAT_CONSTANT);       
        $drink_from_cat = $this->getCatFromConstant(BOISSON_CONSTANT); 
        $sides_from_cat = $this->getCatFromConstant(ACCOMPAGNEMENT_CONSTANT);
        return view('Menu.Menu', [
            'meals' => $meal_from_cat->meal,
            'drinks' => $drink_from_cat->meal,
            'sides' => $sides_from_cat->meal
        ]);
    }


    private function getCatFromConstant(string $constant){
        return Category::where('name', '=', $constant)->first();
    }
}
