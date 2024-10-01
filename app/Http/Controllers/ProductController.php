<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use App\Models\Storage;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::with('unit')->latest()->get(),
        ]);
    }


    public function reviewSelection(Request $request)
    {
        $selectedProductIds = $request->input('products', []);
        $action = $request->input('action');
        $products = Product::whereIn('id', $selectedProductIds)->get();
        $units = Unit::all();
        return view('products.edit', compact('products', 'action', 'units'));
    }

    // todo addorupdate implementation
    public function addOrUpdateProducts(Request $request)
    {
        $products = $request->input('products', []);

        $action = $request->input('action');

        $validatedData = $request->validate([
            'products.*.amount' => 'required|integer|min:1',
            'products.*.unit' => 'required|integer|exists:units,id',
        ]);

        if ($action === 'shopping') {

            $currentShoppingList = ShoppingList::where('user_id', Auth::user()->id)->latest()->first();

            $createNewShoppinglist = false;
            if ($currentShoppingList) {
                $isAnyItemPurchased = ShoppingListItem::where('shopping_list_id', $currentShoppingList->id)
                    ->where('is_purchased', true)
                    ->exists();

                $isDifferentDate = $currentShoppingList->created_at->format('d.m.Y') !== now()->format('d.m.Y');

                if ($isAnyItemPurchased || $isDifferentDate) {
                    $createNewShoppinglist = true;
                }
            } else {
                $createNewShoppinglist = true;
            }

            if ($createNewShoppinglist) {
                $currentShoppingList = ShoppingList::create([
                    'user_id' => Auth::user()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            foreach ($products as $productId => $productData) {
                $product = Product::find($productId);

                
                if ($product) {
                    ShoppingListItem::updateOrCreate([
                        'shopping_list_id' => $currentShoppingList->id,
                        'product_id' => $productId,
                    
                        'product_name' => $product['name'],
                        'quantity' => $productData['amount'],
                        'unit_id' => $productData['unit'],
                        'is_purchased' => false,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            return redirect()->route('shoppinglists.index')->with('success', 'Products added to shopping list');
        }





        if ($action === 'storage') {
            foreach ($products as $productId => $productData) {
                $product = Product::find($productId);

                if ($product) {
                    Storage::updateOrCreate([
                        'product_id' => $productId,
                    ], [
                        'quantity' => $productData['amount'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            return redirect()->route('storage.index')->with('success', 'Products added to storage');
        }

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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }


}