<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    // Methode, um ein Rezept und seine Zutaten anzuzeigen
    public function show($id)
    {
       // Hole das Rezept mit der ID und seine Zutaten (Incidences)
       $recipe = Recipe::with('incidences.product.unit')->findOrFail($id);

       // Übergib das Rezept und die Zutaten an die View
       return view('recipes.show', compact('recipe')); 
    }
}
