<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\VacationSpot;
use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
         $validatedData = $request->validate([
            'vacation_spot_id' => 'required|exists:vacation_spots,id',
        ]);

        // Check if the user already has this vacation spot in their wish list
        if ($user->wishList()->where('vacation_spot_id', $validatedData['vacation_spot_id'])->exists()) {
            return response()->json(['message' => 'This vacation spot is already in the wish list.'], 409);
        }

        // Check if the user's wish list already has 3 vacation spots
        if ($user->wishList()->count() >= 3) {
            return response()->json(['message' => 'You cannot add more than 3 vacation spots to your wish list.'], 409);
        }

        // Add the vacation spot to the user's wish list
        $wishList = $user->wishList()->create($validatedData);

        // Return the updated wish list with a 201 status code
        return response()->json($wishList, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $wishList = $user->wishList()->with('vacationSpot')->get();
        return response()->json($wishList);
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
