<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMealRequest;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AddMealController extends Controller
{

    /**
     * @return View
     */
    public function showAddMealForm(): View
    {
        $categories = Category::all();
        return view('admin.AddMeal', [
            'categories' => $categories
        ]);
    }

    /**
     * @param AddMealRequest $request
     * @return RedirectResponse
     */
    public function addMeal(AddMealRequest $request): RedirectResponse
    {
        $category = Category::where('name', '=', $request->meal_category)->first();
        $meal_image = Storage::putFileAs('', $request->file('meal_image'), $request->file('meal_image')->getClientOriginalName(), 'public');
        $addedCategory =  Meal::create([
            'meal_name' => $request->meal_name,
            'meal_description' => $request->meal_description,
            'meal_image' => "/storage/".$meal_image,
            'price' => $request->price,
            'category_id' => $category->id
        ]);
        $request->session()->flash('success', 'Le type de plat '. $addedCategory->category->name. ' a ete ajouté avec succcès');
        return redirect()->route('menu');
    }


}
