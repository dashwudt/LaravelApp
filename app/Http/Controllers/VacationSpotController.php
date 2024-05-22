<?php

namespace App\Http\Controllers;
use App\Models\VacationSpot;
use Illuminate\Http\Request;

class VacationSpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacationSpots = VacationSpot::all();
        return response()->json($vacationSpots);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:vacation_spots|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180'
        ]);

        // Create a new vacation spot using the validated data
        $vacationSpot = VacationSpot::create($validatedData);

        // Return the newly created vacation spot with a 201 status code
        return response()->json($vacationSpot, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
