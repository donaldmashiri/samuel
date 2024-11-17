<?php

namespace App\Http\Controllers;

use App\Models\Mineral;
use Illuminate\Http\Request;

class MineralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $minerals = Mineral::all();
        return view('minerals.index', compact('minerals'));
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
    public function show(Mineral $mineral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mineral $mineral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mineral $mineral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mineral $mineral)
    {
        //
    }
}
