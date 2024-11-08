<?php

namespace App\Http\Controllers;

use App\Models\Marking;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'make' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'year' => ['required', 'string', 'max:255'],
            'engine_number' => ['required', 'string', 'max:255', 'unique:vehicles'],
            'plate_number' => ['required', 'string', 'regex:/^[A-Z]{3}\d{4}$/', 'max:255', 'unique:vehicles'],
        ]);

        Vehicle::create([
            "user_id" => request('user_id'),
            "make" => request('make'),
            "model" => request('model'),
            "year" => request('year'),
            "plate_number" => request('plate_number'),
            "engine_number" => request('engine_number'),
        ]);

        return redirect()->back()->with('success', 'Vehicles Successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
