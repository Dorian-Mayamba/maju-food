<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMealRequest;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
     * @param Collection $categories
     * @return RedirectResponse
     */
    public function addMeal(AddMealRequest $request, Collection $categories): RedirectResponse
    {
        $categoriesArray = iterator_to_array($categories);
        $category = array_filter($categoriesArray, function($catCollection) use ($request){
            return $catCollection['name'] == $request->meal_category;
        });
        $meal_image = Storage::putFileAs('meal_images', $request->file('meal_image'), $request->file('meal_image')->getClientOriginalName());
        $addedCategory =  Meal::create([
            'meal_name' => $request->meal_name,
            'meal_description' => $request->meal_description,
            'meal_image' => asset('meal_images') . $meal_image,
            'category_id' => $category[0]->id
        ]);

        $request->session()->flash('success', 'Le type de plat '. $addedCategory->category->name. ' a ete ajouté avec succcès');
        return redirect()->route('menu');
    }


}
