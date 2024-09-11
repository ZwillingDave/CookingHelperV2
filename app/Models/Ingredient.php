<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    // Definiert, welche Felder massenweise ausgefüllt werden dürfen
    protected $fillable = ['recipe_id', 'product_id', 'quantity', 'unit_id'];

    // Beziehung: Eine Ingredient gehört zu einem Rezept
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    // Beziehung: Eine Ingredient gehört zu einem Produkt
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Beziehung: Eine Ingredient hat eine Mengeneinheit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}