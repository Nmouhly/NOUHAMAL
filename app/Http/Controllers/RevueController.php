<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revue;
class RevueController extends Controller
{
    public function index()
    {
        // Récupère toutes les revues
        return response()->json(Revue::all());
    }

    public function store(Request $request)
    {
        // Valide les données
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pdf_link' => 'nullable|url',
        ]);

        // Crée une nouvelle revue
        $revue = Revue::create($validatedData);

        return response()->json($revue, 201);
    }

    public function show($id)
    {
        // Trouve la revue par ID
        $revue = Revue::find($id);

        if ($revue) {
            return response()->json($revue);
        }

        return response()->json(['message' => 'Revue non trouvée'], 404);
    }

    public function update(Request $request, $id)
    {
        // Valide les données
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pdf_link' => 'nullable|url',
        ]);

        // Trouve la revue par ID
        $revue = Revue::find($id);

        if ($revue) {
            // Met à jour la revue
            $revue->update($validatedData);

            return response()->json($revue);
        }

        return response()->json(['message' => 'Revue non trouvée'], 404);
    }

    public function destroy($id)
    {
        // Trouve la revue par ID
        $revue = Revue::find($id);

        if ($revue) {
            // Supprime la revue
            $revue->delete();

            return response()->json(['message' => 'Revue supprimée']);
        }

        return response()->json(['message' => 'Revue non trouvée'], 404);
    }
}
