<?php

namespace App\Http\Controllers;

use App\Models\CameraDetection;
use App\Models\Vehicle;
use App\Models\VideoDetection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoDetectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::where('user_id', Auth::user()->id)->get();
        return view('videodetects.index', compact('vehicles'));

//        return view('videodetects.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        $cmd = 'start cmd /k "python main.py"';
//        exec($cmd);
//        return "opened ";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'upload_video' => 'required|file|mimes:mp4,mov', // Adjust the validation rules as needed
        ]);
        $file = $request->input('file');

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
        $videodetect = VideoDetection::create([
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

        $cmd = 'start cmd /k "python main.py"';
        exec($cmd);
        return redirect()->back()->with(['success' => 'Video upload detection Uploaded.', 'videodetect' => $videodetect]);

//        return redirect()->back()->with('success', 'Video upload detection Uploaded.');
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
