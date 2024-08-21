<?php
namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $teamId = $request->query('team_id');

        // Filter by team_id if provided
        if ($teamId) {
            $members = Member::where('team_id', $teamId)->get();
        } else {
            $members = Member::all();
        }

        return response()->json($members);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'team_id' => 'nullable|integer|exists:teams,id', // Updated to make team_id nullable
            'statut' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        try {
            $member = Member::create([
                'name' => $request->input('name'),
                'position' => $request->input('position'),
                'contact_info' => $request->input('contact_info'),
                'team_id' => $request->input('team_id'),
                'statut' => $request->input('statut'),
                'bio' => $request->input('bio'),
            ]);

            return response()->json($member, 201);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'ajout du membre: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de l\'ajout du membre'], 500);
        }
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);
        return response()->json($member);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'team_id' => 'nullable|integer|exists:teams,id', // Validation for team_id during update
            'statut' => 'nullable|string|max:255',
        ]);

        $member = Member::findOrFail($id);
        $member->update($request->only([
            'name',
            'position',
            'contact_info',
            'bio',
            'team_id', // Include team_id during update
            'statut'
        ]));

        return response()->json($member);
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return response()->json(null, 204);
    }
}
