<?php

namespace App\Http\Controllers;

use App\Models\storageItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StorageItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $storageItems = StorageItem::where('user_id', Auth::user()->id)->get();
        
        return view('storage.index', [
            'storageItems' => $storageItems,
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
    public function show(storageItem $storage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(storageItem $storage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, storageItem $storage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(storageItem $storage)
    {
        //
    }
}