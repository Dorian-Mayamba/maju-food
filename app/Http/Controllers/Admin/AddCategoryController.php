<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AddCategoryController extends Controller
{

    /**
     * @return View
     */
    public function showAddCategoryForm(): View
    {
        return view('admin.addCategory');
    }

    /**
     * @param AddCategoryRequest $request
     * @return RedirectResponse
     */
    public function addCategory(AddCategoryRequest $request): RedirectResponse{
        $addedCategory = Category::create([
            'name' => $request->category_name
        ]);

        $request->session()->flash('success', 'Le type de plat '. $addedCategory->name. ' a ete ajoute avec succes');
        return back();
    }






}
