<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Category;
use App\Models\Meal;
use Illuminate\Support\Facades\Storage;

class UpdateMealController extends Controller
{
    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
     */
    public function showUpdateForm(int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $meal = Meal::find($id);

        $categories = Category::all();

        return view('admin.UpdateMeal', [
            'meal' => $meal,
            'categories' => $categories
        ]);
    }

    /**
     * @param UpdateMealRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMealRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $meal = Meal::find($id);
        if ($request->file('meal_image')) {
            $meal_image = Storage::putFileAs('', $request->file('meal_image'), $request->file('meal_image')->getClientOriginalName(), 'public');
            $meal_image_from_storage = $meal->meal_image;
            $deleteAttempt = Storage::delete(asset($meal_image_from_storage));
            if (!$deleteAttempt) {
                die("L'image n'a pas pu être supprimée");
            }

            $meal->update([
                'meal_name' => $request->meal_name,
                'meal_description' => $request->meal_description,
                'meal_image' => "/storage/" . $meal_image,
                'price' => $request->price,
                'category_id' => $meal->category->id
            ]);
        }else{
            $meal->update([
                'meal_name' => $request->meal_name,
                'meal_description' => $request->meal_description,
                'meal_image' => $meal->meal_image,
                'price' => $request->price,
                'category_id' => $meal->category->id
            ]);
        }

        $request->session()->flash('success', 'Le plat ' . $meal->name . ' a ete modifié avec succès');
        return redirect()->route('menu');
    }
}
