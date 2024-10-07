<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\storageItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Unit;

class StorageItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $storageItems = StorageItem::where('user_id', Auth::user()->id)->with('product')->get();
        
        return view('storage.index', [
            'storageItems' => $storageItems,
        ]);
    }
    public function editSelection(Request $request)
    {
        $selectedProductIds = $request->input('products', []);
        $storageItems = StorageItem::where('user_id', Auth::user()->id)->whereIn('id', $selectedProductIds)->get();
        $units = Unit::all();
        return view('storage.edit', compact('units', 'storageItems'));
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
    public function show(storageItem $storageItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(storageItem $storageItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $products = $request->input('products', []);
        $validatedData = $request->validate([
                'products.*.amount' => 'required|integer|min:1',
                'products.*.unit' => 'required|integer|exists:units,id',
            ]);
        
        
        foreach ($products as $productId => $productData) {
            
            $product = Product::find($productData['product_id']);
            $storageItem = StorageItem::where('user_id', Auth::user()->id)
                ->where('product_id', $product->id)
                ->first();
            
            $amount = (float)$productData['amount'];
            if ($product) {  
                StorageItem::updateOrCreate(
                    [
                    'product_id' => $productData['product_id'],
                    'user_id' => Auth::user()->id,
                    ], [
                    'product_name' => $product['name'],
                    'quantity' => $amount,
                    'unit_id' => $productData['unit'],
                    'updated_at' => now(),
                    ]);
                return redirect(route('storage.index'));
            }               
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(storageItem $storageItem)
    {
        //
    }
}