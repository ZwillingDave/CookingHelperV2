<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Ein Produkt kann in der Lagerliste vorkommen
    public function storage()
    {
        return $this->hasOne(Storage::class);
    }

    // Ein Produkt kann auf einer Einkaufsliste stehen
    public function shoppingLists()
    {
        return $this->hasMany(ShoppingList::class);
    }

    // Ein Produkt kann in mehreren Rezepten vorkommen
    public function incidences()
    {
        return $this->hasMany(Incidence::class);
    }
}
