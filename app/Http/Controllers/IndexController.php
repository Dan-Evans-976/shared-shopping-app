<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;

class IndexController extends Controller
{
    /**
     * Shows the homepage
     *
     * @return void
     */
    public function index(){


        $lists = ShoppingList::with('ListItems')->get();

        // dd($lists);

        return view('index', compact('lists'));
    }
}