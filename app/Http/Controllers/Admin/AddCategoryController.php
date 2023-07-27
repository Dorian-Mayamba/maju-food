<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddCategoryController extends Controller
{
    public function showAddCategoryForm(){
        return view('admin.addCategory');
    }
}
