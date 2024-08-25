<?php

namespace App\Http\Controllers;
use App\Ouvrage;
use Illuminate\Http\Request;

class OuvrageController extends Controller
{
    public function index()
    {
        $ouvrages = Ouvrage::all();
        return response()->json($ouvrages);
    }

    public function show($id)
    {
        $ouvrage = Ouvrage::find($id);
        if ($ouvrage) {
            return response()->json($ouvrage);
        }
        return response()->json(['message' => 'Ouvrage non trouvé'], 404);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pdf_link' => 'nullable|url',
            // 'id_user' => 'required|integer|exists:users,id', // Validation de l'id_user
        ]);

        // Créer un nouvel ouvrage avec id_user
        $ouvrage = Ouvrage::create([
            'title' => $request->title,
            'author' => $request->author,
            'pdf_link' => $request->pdf_link,
            // 'id_user' => $request->id_user, // Ajouter id_user ici
        ]);

        return response()->json(['message' => 'Ouvrage créé avec succès!', 'ouvrage' => $ouvrage], 201);
    }


    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pdf_link' => 'nullable|url',
        ]);

        // Trouver l'ouvrage par son ID
        $ouvrage = Ouvrage::find($id);

        if ($ouvrage) {
            // Mettre à jour l'ouvrage avec les données validées
            $ouvrage->update($validatedData);
            return response()->json($ouvrage);
        }

        // Retourner une réponse d'erreur si l'ouvrage n'est pas trouvé
        return response()->json(['message' => 'Ouvrage non trouvé'], 404);
    }

    public function destroy($id)
    {
        $ouvrage = Ouvrage::find($id);
        if ($ouvrage) {
            $ouvrage->delete();
            return response()->json(['message' => 'Ouvrage supprimé']);
        }
        return response()->json(['message' => 'Ouvrage non trouvé'], 404);
    }
}
