<?php

namespace App\Http\Controllers;

use App\Models\CameraDetection;
use App\Models\Mineral;
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
        // $vehicles = Vehicle::where('user_id', Auth::user()->id)->get();
        return view('videodetects.index');

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
            // 'upload_video' => 'required|file|mimes:mp4,mov',
        ]);

        $user_id = Auth::user()->id;
        $plate_number = $request->input('plate_number');

        // Generate random data
        $detection_type = ['Type A', 'Type B', 'Type C'][array_rand(['Type A', 'Type B', 'Type C'])];
        $file = 'example.jpg';
        $status = ['Active', 'Inactive'][array_rand(['Active', 'Inactive'])];
        $signal_type = ['Green', 'Yellow', 'Red'][array_rand(['Green', 'Yellow', 'Red'])];
        // Fetch all minerals from the database
        $otherMinerals = Mineral::all()->pluck('name')->toArray();

// Predefined minerals array
        $minerals = ['Quartz', 'Feldspar', 'Mica', 'Amethyst', 'Calcite', 'Fluorite', 'Gypsum', 'Halite'];

// Merge the two arrays
        $allMinerals = array_merge($minerals, $otherMinerals);

// Select a random mineral from the merged array
        $randomKey = array_rand($allMinerals); // Get a random key
        $randomMineral = $allMinerals[$randomKey];

        // Create a new VideoDetection record
        $videodetect = VideoDetection::create([
            'user_id' => $user_id,
            'plate_number' => $plate_number,
            'detection_type' => $detection_type,
            'file' => $file,
            'status' => $status,
            'signal_type' => $signal_type,
            'mineral' => $randomMineral,
        ]);

        // Execute Python script
        // $cmd = 'start cmd /k "python main.py"';
        // exec($cmd);

        return redirect()->back()->with(['success' => 'Video detection uploaded.', 'videodetect' => $videodetect]);
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
