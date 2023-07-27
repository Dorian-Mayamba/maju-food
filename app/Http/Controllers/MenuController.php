<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function showMenu():\Illuminate\Contracts\View\View{
        return view('Menu');
    }
}
