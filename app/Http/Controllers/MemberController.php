<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return response()->json($members);
    }

    public function store(Request $request)
    {
        // Validation mise à jour pour inclure 'statut'
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'team_id' => 'required|integer|exists:teams,id',
            'statut' => 'nullable|string|max:255', // Validation pour le nouvel attribut
        ]);

        try {
            // Inclure 'statut' lors de la création du membre
            $member = Member::create([
                'name' => $request->input('name'),
                'position' => $request->input('position'),
                'contact_info' => $request->input('contact_info'),
                'team_id' => $request->input('team_id'),
                'statut' => $request->input('statut'), // Ajout de 'statut'
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
        // Validation mise à jour pour inclure 'statut'
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
            'bio' => 'nullable|string', // 'bio' est maintenant optionnel
            'statut' => 'nullable|string|max:255', // Validation pour le nouvel attribut
        ]);

        $member = Member::findOrFail($id);
        $member->update($request->only([
            'name',
            'position',
            'contact_info',
            'bio',
            'statut' // Inclure 'statut' lors de la mise à jour
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
