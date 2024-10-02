<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Ein Produkt kann in der Lagerliste vorkommen
    public function storageItems()
    {
        return $this->hasMany(StorageItem::class);
    }

    // Ein Produkt kann auf einer Einkaufsliste stehen
    public function shoppingListItems()
    {
        return $this->hasMany(ShoppingListItem::class);
    }

    // Ein Produkt kann in mehreren Rezepten vorkommen
    public function incidences()
    {
        return $this->hasMany(Ingredient::class);
    }
}