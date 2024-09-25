<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    // Definiert, welche Felder massenweise ausgefüllt werden dürfen
    protected $fillable = ['abbr', 'name'];

    // Beziehung: Eine Mengeneinheit kann zu mehreren Produkten gehören
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Beziehung: Eine Mengeneinheit kann in vielen Lagerbeständen verwendet werden
    public function storages()
    {
        return $this->hasMany(Storage::class);
    }

    // Beziehung: Eine Mengeneinheit kann in vielen Einkaufslisten verwendet werden
    public function shoppingLists()
    {
        return $this->hasMany(ShoppingList::class);
    }

    // Beziehung: Eine Mengeneinheit kann in vielen Rezeptzutaten verwendet werden
    public function incidences()
    {
        return $this->hasMany(Ingredient::class);
    }
}