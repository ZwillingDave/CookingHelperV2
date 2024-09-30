<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ShoppingList extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function shoppingListItems(){
        return $this->hasMany(ShoppingListItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
}