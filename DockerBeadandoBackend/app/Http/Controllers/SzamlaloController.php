<?php

namespace App\Http\Controllers;

use App\Models\Szamlalo;
use App\Http\Requests\StoreSzamlaloRequest;
use App\Http\Requests\UpdateSzamlaloRequest;

class SzamlaloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Szamlalo::all();
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
    public function store(StoreSzamlaloRequest $request)
    {
        $response = Szamlalo::create($request->all());
        return response()->json(['eredmeny' => $response->eredmeny], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Szamlalo $szamlalo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Szamlalo $szamlalo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSzamlaloRequest $request, Szamlalo $szamlalo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Szamlalo $szamlalo)
    {
        //
    }
}
