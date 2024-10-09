<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use Illuminate\Support\Facades\Auth;
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
        $ingredients = $request->input('ingredients');
        $currentShoppingList = ShoppingList::where('user_id', Auth::user()->id)->latest()->first();
        $createNewShoppingList = false;
        $portions = $request->input('portions');

        if ($currentShoppingList) {
            $isAnyItemPurchased = ShoppingListItem::where('shopping_list_id', $currentShoppingList->id)
            ->where('is_purchased', true)
            ->exists();
            $isDifferentDate = $currentShoppingList->created_at->format('d.m.Y') !== now()->format('d.m.Y');

            if ($isAnyItemPurchased || $isDifferentDate) {
                $createNewShoppingList = true;
            }
        } else{
            $createNewShoppingList = true;
        }

        if ($createNewShoppingList) {
            $currentShoppingList = ShoppingList::create([
                'user_id' => Auth::user()->id,
                'created_at' => now(), 
                'updated_at' => now(),
            ]);
        }


        foreach ($ingredients as $ingredient) {
            $product = Product::find($ingredient['product_id']);
            if ($product) {

                $listItem = ShoppingListItem::where('shopping_list_id', $currentShoppingList->id)
                ->where('product_id', $ingredient['product_id'])
                ->first();
                $listItemQuantity = $listItem && $listItem->quantity ? $listItem->quantity : 0;
                $amount = $ingredient['quantity'] * $portions + $listItemQuantity;
                ShoppingListItem::updateOrCreate([
                    'shopping_list_id' => $currentShoppingList->id,
                    'product_id' => $ingredient['product_id'],
                ], [
                    'product_name' => $product['name'],
                    'quantity' => $amount,
                    'unit_id' => $ingredient['unit_id'],
                    'updated_at' => now(),
                ]);

            }
        }
    return redirect(route('recipes.index'));
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