<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalData;

class AlumniDirectoryController extends Controller
{
    public function index(Request $request)
    {
        // Get the sort option, default to latest first
        $sort = $request->input('sort', 'desc'); // 'desc' for Latest to Oldest, 'asc' for Oldest to Latest

        // Fetch paginated data with sorting
        $alumniData = PersonalData::with('professionalData')
            ->orderBy('created_at', $sort)
            ->paginate(15);

        return view('directory', compact('alumniData', 'sort'));
    }

    public function search(Request $request)
    {
        // Retrieve the search query and sort option
        $search = $request->input('search');
        $sort = $request->input('sort', 'desc'); // Default sorting

        // Fetch filtered alumni data based on the search query with sorting
        $alumniData = PersonalData::query()
            ->where('last_name', 'like', "%{$search}%")
            ->orWhere('first_name', 'like', "%{$search}%")
            ->orWhere('cellphone_number', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->orWhere('home_address', 'like', "%{$search}%")
            ->orWhereHas('professionalData', function ($query) use ($search) {
                $query->where('employer', 'like', "%{$search}%")
                      ->orWhere('employer_address', 'like', "%{$search}%")
                      ->orWhere('present_position', 'like', "%{$search}%");
            })
            ->orderBy('created_at', $sort)
            ->paginate(10);

        // Return the view with the filtered data
        return view('directory', ['alumniData' => $alumniData, 'sort' => $sort]);
    }
}
