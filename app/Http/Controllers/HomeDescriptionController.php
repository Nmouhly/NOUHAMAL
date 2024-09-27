<?php

namespace App\Http\Controllers;
use App\HomeDescription;
use Illuminate\Http\Request;

class HomeDescriptionController extends Controller
{
    public function index()
    {
        // Récupérer toutes les descriptions
        $descriptions= HomeDescription::latest()->first();
        return response()->json($descriptions);
    }

    public function show($id)
    {
        $description = HomeDescription::findOrFail($id);
        return response()->json($description);
    }
    public function store(Request $request)
    {
        // Valide les données de la requête
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        // Crée une nouvelle description
        return HomeDescription::create($data);
    }

    public function update(Request $request, $id)
    {
        // Valide les données de la requête
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        // Trouve la description par ID et la met à jour
        $description = HomeDescription::findOrFail($id);
        $description->update($data);

        return response()->json($description);
    }

    public function destroy($id)
    {
        // Trouve la description par ID et la supprime
        $description = HomeDescription::findOrFail($id);
        $description->delete();

        return response()->json(null, 204);
    }
}
