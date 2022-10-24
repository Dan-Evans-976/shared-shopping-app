<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListItem extends Model
{
    use SoftDeletes;

    public function ShoppingList()
    {
        return $this->hasOne(ShoppingList::class);
    }

    public function scopePopular($query)
    {
        return $query->where('completed', true);
    }
}