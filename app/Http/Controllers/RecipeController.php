<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class RecipeController extends Controller
{
    // Methode, um ein Rezept und seine Zutaten anzuzeigen
    public function index()
    {
        return view('recipes.index', [
            'recipes' => Recipe::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        $ingredients = Ingredient::where('recipe_id', $recipe->id)->with('product')->with('unit')->get();
        $instruction = $recipe->instruction;
        $steps = explode(";", $instruction);
        
        return view('recipes.show', [
            'recipe' => $recipe,
            'ingredients' => $ingredients,
            'instructionsteps' => $steps,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}