<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    use HasFactory;

     // Definiert, welche Felder massenweise ausgefüllt werden dürfen
     protected $fillable = ['description', 'instruction'];

     // Beziehung: Ein Rezept kann viele Incidences (Zutaten) haben
     public function incidences()
     {
         return $this->hasMany(Ingredient::class);
     }
}