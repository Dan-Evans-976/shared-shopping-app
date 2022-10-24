<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingList extends Model
{
    use SoftDeletes;

    public function ListItems()
    {
        return $this->hasMany(ListItem::class);
    }

    public function ItemsCompleted(){
        return $this->ListItems()->where('completed', true)->count();
    }

    public function ItemCount(){
        return $this->ListItems()->count();
    }

    public function PercentCompleted(){
        $itemCount = $this->ItemCount();

        if ($itemCount == 0){
            return 0;
        }

        return round($this->ItemsCompleted() / $itemCount * 100, 2);
    }
}