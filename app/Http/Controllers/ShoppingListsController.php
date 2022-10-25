<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShoppingListResource;
use App\Models\ShoppingList;
use App\Models\ListItem;

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

        $list = new ShoppingListResource(ShoppingList::where('id', $id)->with('ListItems')->first());

        return view('list.show', compact('list'));

    }

    public function deleteList($id){
        ShoppingList::where('id', $id)->delete();
        return redirect()->route('index');
    }

    public function deleteListItem($listId, $id){
        ListItem::where('id', $id)->delete();

        $list = ShoppingList::where('id', $listId)->with('ListItems')->first();

        if (!$list){
            return null;
        }

        return new ShoppingListResource($list);
    }

    public function checkListItem($listId, $itemId, $check){
        $list = ListItem::where('id', $itemId)->first();

        $list->completed = $check;

        $list->save();

        $list = ShoppingList::where('id', $listId)->with('ListItems')->first();

        if (!$list){
            return null;
        }

        return new ShoppingListResource($list);
    }
}