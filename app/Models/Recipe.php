<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

     // Definiert, welche Felder massenweise ausgefüllt werden dürfen
     protected $fillable = ['name', 'image','description', 'instruction'];

     // Beziehung: Ein Rezept kann viele Incidences (Zutaten) haben
     public function ingredients()
     {
         return $this->hasMany(Ingredient::class);
     }
}