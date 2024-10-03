<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Http\Request;
use App\Models\ShoppingListItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;
use App\Models\Product;
use App\Models\StorageItem;

class ShoppingListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shoppinglists = ShoppingList::where('user_id', Auth::user()->id)->with(['shoppingListItems'])->orderBy('created_at', 'desc')->get();
        
        return view('shoppinglists.index', [
            'shoppinglists' => $shoppinglists
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
    public function storeToStorage(Request $request)
    {
        $id = $request->id;
        $selectedProductIds = $request->input('selected', []);
        $products = $request->input('products', []);
        $validatedData = $request->validate([
                'products.*.amount' => 'required|integer|min:1',
                'products.*.unit' => 'required|integer|exists:units,id',
            ]);
        
        
        foreach ($selectedProductIds as $productId) {
            $product = Product::find($productId);
            if(isset($products[$productId])){
                $productData = $products[$productId];
                $storageItem = StorageItem::where('user_id', Auth::user()->id)
                    ->where('product_id', $productId)
                    ->first();
                $storageItemQty = $storageItem === null || $storageItem->quantity === null ? 0 : $storageItem->quantity;
                $amount = (float)$productData['amount'] + $storageItemQty;


                if ($product) {  
                StorageItem::updateOrCreate([
                    'product_id' => $productId,
                    'user_id' => Auth::user()->id,
                ], [
                    'product_name' => $product['name'],
                    'quantity' => $amount,
                    'unit_id' => $productData['unit'],
                    'updated_at' => now(),
                ]);
                ShoppingListItem::updateorCreate([
                    'product_id' => $productId,
                    'shopping_list_id' => $id,
                ],[
                    'is_purchased' => 1,
                ]);
                
            }
                
            }
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   $shoppingList = ShoppingList::where('user_id', Auth::user()->id)->find($id);
        $shoppinglistItems = ShoppingListItem::where('shopping_list_id', $id)->get();
        $notAllPurchased = ShoppingListItem::where('shopping_list_id', $shoppingList->id)->where('is_purchased', 0)->exists();
        $units = Unit::all();
        
        if (!$shoppingList) {
            return redirect(route('shoppinglists.index'));
        }
        return view('shoppinglists.show', [
            'shoppinglist' => $shoppingList,
            'shoppinglistItems' => $shoppinglistItems,
            'notAllPurchased' => $notAllPurchased,
            'units' => $units,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingList $shoppingList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShoppingList $shoppingList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingList $shoppingList)
    {
        //
    }

}