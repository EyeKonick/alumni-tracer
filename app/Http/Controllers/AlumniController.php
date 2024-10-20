<?php

namespace App\Http\Controllers;

use App\Models\PersonalData;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function edit($id)
    {
        $alumni = PersonalData::findOrFail($id);
        return view('edit', compact('alumni'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cellphone_number' => 'required|regex:/^[0-9]{10,15}$/',
            'home_address' => 'required|string|max:255',
            'employer' => 'nullable|string|max:255',
            'employer_address' => 'nullable|string|max:255',
            'present_position' => 'nullable|string|max:255',
        ]);

        // Fetch the alumni data by ID and update it
        $alumni = PersonalData::findOrFail($id);
        $alumni->update($request->all());

        // Redirect back with success message
        return redirect()->route('alumni.directory', $alumni->id)->with('success', 'Alumni updated successfully');
    }

    public function destroy($id)
    {
        // Fetch the alumni data by ID
        $alumni = PersonalData::findOrFail($id);

        // Delete related alumni survey data
        $alumni->alumniSurvey()->delete();

        // Delete related professional data, if applicable
        $alumni->professionalData()->delete();

        // Delete the alumni record
        $alumni->delete();

        return redirect()->route('alumni.directory')->with('success', 'Alumni deleted successfully');
    }
}
