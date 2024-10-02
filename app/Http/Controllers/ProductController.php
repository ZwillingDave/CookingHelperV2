<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\ShoppingList;
use App\Models\ShoppingListItem;
use App\Models\Storage;
use App\Models\storageItem;
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
        $action = $request->input('action');

        if ($action === 'shopping') {
            $this->storeToShoppingList($request);
            return redirect()->route('shoppinglists.index')->with('success', 'Products added to shopping list');
        }

        if ($action === 'storage') {
            $this->storeToStorage($request);
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

    public function storeToShoppingList(Request $request){
        $products = $request->input('products', []);
        $validatedData = $request->validate([
            'products.*.amount' => 'required|integer|min:1',
            'products.*.unit' => 'required|integer|exists:units,id',
        ]);
        
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
                    $listItem = ShoppingListItem::where('shopping_list_id', $currentShoppingList->id)
                    ->where('product_id', $productId)
                    ->first();
                    $listItemQty = $listItem === null || $listItem->quantity === null ? 0 : $listItem->quantity;
                    $amount = (int)$productData['amount'] + $listItemQty;
                    
                    ShoppingListItem::updateOrCreate([
                        'shopping_list_id' => $currentShoppingList->id,
                        'product_id' => $productId,
                    ],[
                        'product_name' => $product['name'],
                        'quantity' => $amount,
                        'unit_id' => $productData['unit'],
                        'is_purchased' => false,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeToStorage(Request $request)
    {
        $products = $request->input('products', []);
        $validatedData = $request->validate([
            'products.*.amount' => 'required|integer|min:1',
            'products.*.unit' => 'required|integer|exists:units,id',
        ]);
        foreach ($products as $productId => $productData) {
                $product = Product::find($productId);
                $storageItem = StorageItem::where('user_id', Auth::user()->id)
                    ->where('product_id', $productId)
                    ->first();
                $storageItemQty = $storageItem === null || $storageItem->quantity === null ? 0 : $storageItem->quantity;
                $amount = (int)$productData['amount'] + $storageItemQty;
                if ($product) {  
                    StorageItem::updateOrCreate([
                        'product_id' => $productId,
                        'user_id' => Auth::user()->id,
                    ], [
                        'product_name' => $product['name'],
                        'quantity' => $amount,
                        'unit_id' => $productData['unit'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            
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