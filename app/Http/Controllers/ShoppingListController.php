<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Http\Request;
use App\Models\ShoppingListItem;
use Illuminate\Support\Facades\Auth;


class ShoppingListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shoppinglists = ShoppingList::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        
        return view('shoppinglists.show', [
            'shoppinglist' => ShoppingList::with('user')->find($id),
            'id' => $id,
            'shoppinglistItems' => ShoppingListItem::with('shoppingList')->get(),
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