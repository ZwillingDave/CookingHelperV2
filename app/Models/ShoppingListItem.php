<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingListItem extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}