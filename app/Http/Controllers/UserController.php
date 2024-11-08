<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index')->with('users', User::all());
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'national_id' => ['required', 'string', 'max:14', 'unique:users'],
            'dob' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $role = 'driver';
        $password = $request->input('password');

        User::create([
            "role" => $role,
            "name" => request('name'),
            "email" => request('email'),
            "national_id" => request('national_id'),
            "dob" => request('dob'),
            'password' => Hash::make($password)
            ]);

        return redirect()->back()->with('success', 'Account succesfully created.');
//        return redirect()->back()->with('success', 'Driver Successfully added.');

//        session()->flash('success', 'Driver Successfully added.');
//
//        return view('users.index')->with('users', User::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicles = Vehicle::where('user_id', $id)->get();
        $user = User::find($id);
        return view('users.show', compact('vehicles', 'user'));


//        $user = \DB::table('users')->where('id', $id)->get();
//        $vehicles = \DB::table('vehicles')->where('id', $id)->get();
//
//        return view('users.show')
//            ->with('user', $user)
//            ->with('vehicles', $vehicles);
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
