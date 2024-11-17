<?php

namespace App\Http\Controllers;

use App\Models\Mineral;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        return view('minerals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:minerals,slug',
        ]);

        // Retrieve the name from the request
        $name = $request->input('name');
        $slug = $request->input('slug');


        // Create a new mineral record
        $mineral = Mineral::firstOrcreate([
            'name' => $name,
            'slug' => $slug ?: Str::slug($name), // Generate a slug if none is provided
        ]);


        return redirect(route('minerals.index'))->with(['success' => 'Mineral Successfully added.']);

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
