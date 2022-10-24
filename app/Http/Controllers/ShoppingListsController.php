<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;

class ShoppingListsController extends Controller
{
    /**
     * Shows a list of lists
     *
     * @return void
     */
    public function index(){


        $lists = ShoppingList::get();

        return view('list.index', compact('lists'));
    }

    public function show($id){
        $list = ShoppingList::where('id', $id)->with('ListItems')->first();

        return view('list.show', compact('list'));
    }

    public function delete($id){
        ShoppingList::where('id', $id)->delete();
        return redirect()->route('index');
    }
}