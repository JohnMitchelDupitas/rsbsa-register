<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    /**
     * Get all farmers.
     */
    public function index()
    {
        $farmers = Farmer::orderBy('created_at', 'desc')->get();

        return response()->json([
            'data' => $farmers,
            'count' => $farmers->count(),
        ]);
    }

    /**
     * Store a newly created farmer record.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'surname' => 'required|string|max:255',
            'extension_name' => 'nullable|string|max:50',
            'sex' => 'nullable|in:Male,Female,Other',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'civil_status' => 'nullable|string|max:255',
            'name_of_spouse' => 'nullable|string|max:255',
            'highest_formal_education' => 'nullable|string|max:255',
        ]);

        $farmer = Farmer::create($validated);

        return response()->json([
            'message' => 'Farmer record created successfully',
            'data' => $farmer,
        ], 201);
    }

    /**
     * Get a specific farmer record.
     */
    public function show(Farmer $farmer)
    {
        return response()->json([
            'data' => $farmer,
        ]);
    }

    /**
     * Update a farmer record.
     */
    public function update(Request $request, Farmer $farmer)
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'surname' => 'sometimes|required|string|max:255',
            'extension_name' => 'nullable|string|max:50',
            'sex' => 'nullable|in:Male,Female,Other',
            'date_of_birth' => 'nullable|date',
            'place_of_birth' => 'nullable|string|max:255',
            'religion' => 'nullable|string|max:255',
            'civil_status' => 'nullable|string|max:255',
            'name_of_spouse' => 'nullable|string|max:255',
            'highest_formal_education' => 'nullable|string|max:255',
        ]);

        $farmer->update($validated);

        return response()->json([
            'message' => 'Farmer record updated successfully',
            'data' => $farmer,
        ]);
    }

    /**
     * Delete a farmer record.
     */
    public function destroy(Farmer $farmer)
    {
        $farmer->delete();

        return response()->json([
            'message' => 'Farmer record deleted successfully',
        ]);
    }
}
