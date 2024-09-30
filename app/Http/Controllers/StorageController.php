<?php

namespace App\Http\Controllers;

use App\Models\storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // hole die Daten aus der Datenbank und speichere sie in der Variable $storages
        $storages = storage::all();
        // gebe die View storage.index zurück und übergebe die Variable $storages
        return view('storage.index', compact('storages'));
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
    public function show(storage $storage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(storage $storage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, storage $storage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(storage $storage)
    {
        //
    }
}
