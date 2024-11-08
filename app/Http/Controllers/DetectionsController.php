<?php

namespace App\Http\Controllers;

use App\Models\CameraDetection;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DetectionsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::where('user_id', Auth::user()->id)->get();
        return view('detections.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        $cmd = 'start cmd /k "python camera.py"';
//        exec($cmd);
//        return "opened ";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $plate_number = $request->input('plate_number');

        // Generate random data
        $veh_id = rand(1, 10);
        $detection_type = ['Type A', 'Type B', 'Type C'][array_rand(['Type A', 'Type B', 'Type C'])];
        $file = 'example.jpg';
        $status = ['Active', 'Inactive'][array_rand(['Active', 'Inactive'])];
        $signal_type = ['Green', 'Yellow', 'Red'][array_rand(['Green', 'Yellow', 'Red'])];
        $lane_position = ['Left Lane', 'Right Lane'][array_rand(['Left Lane', 'Right Lane'])];
        $wheel_crossed = ['Yes', 'No'][array_rand(['Yes', 'No'])];
        $marking_color = ['Yellow', 'White', 'Red', 'Blue'][array_rand(['Yellow', 'White', 'Red', 'Blue'])];
        $cross_alert = ['Yes', 'No'][array_rand(['Yes', 'No'])];
        $driver_tendencies = ['Frequent Lane Crossings', 'Occasional Lane Crossings', 'Rare Lane Crossings'][array_rand(['Frequent Lane Crossings', 'Occasional Lane Crossings', 'Rare Lane Crossings'])];

        // Create a new CameraDetection record
        CameraDetection::create([
            'user_id' => $user_id,
            'plate_number' => $plate_number,
            'detection_type' => $detection_type,
            'file' => $file,
            'status' => $status,
            'signal_type' => $signal_type,
            'lane_position' => $lane_position,
            'wheel_crossed' => $wheel_crossed,
            'marking_color' => $marking_color,
            'cross_alert' => $cross_alert,
            'driver_tendencies' => $driver_tendencies,
            ]);

        $cmd = 'start cmd /k "python camera.py"';
        exec($cmd);
        return redirect()->back()->with('success', 'Detection was successfully');
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
