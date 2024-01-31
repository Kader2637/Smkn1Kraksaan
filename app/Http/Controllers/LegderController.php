<?php

namespace App\Http\Controllers;

use App\Models\Legder;
use App\Http\Requests\StoreLegderRequest;
use App\Http\Requests\UpdateLegderRequest;

class LegderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ledger');
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
    public function store(StoreLegderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Legder $legder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Legder $legder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLegderRequest $request, Legder $legder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Legder $legder)
    {
        //
    }
}
