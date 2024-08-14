<?php

namespace App\Http\Controllers;
use App\Axe;
use Illuminate\Http\Request;

class AxeController extends Controller
{
    // Affiche la liste des axes

    // Affiche le formulaire de création d'un nouvel axe

    // Stocke un nouvel axe dans la base de données
    public function store(Request $request)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Créer un nouvel axe avec les données validées
        $axe = Axe::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        // Retourner une réponse appropriée
        return response()->json(['message' => 'Axe créé avec succès', 'axe' => $axe], 201);
    }
    // Affiche un axe spécifique
    public function show($id)
    {
        $axe = Axe::find($id);

        if (!$axe) {
            return response()->json(['message' => 'Axe not found'], 404);
        }

        return response()->json($axe);
    }

    // Affiche le formulaire d'éditsssssion pour un axe spécifique
    public function index()
    {
        // Fetch all axes from the database
        $axes = Axe::all();

        // Return the axes as a JSON response
        return response()->json($axes);
    }

    // Met à jour un axe spécifique dans la base de données
    public function update(Request $request, $id)
    {
        // Validation mise à jour pour inclure les attributs nécessaires
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string', // 'content' est maintenant optionnel
            // Ajoutez ici d'autres validations si nécessaire
        ]);

        // Trouver l'axe par ID ou renvoyer une erreur 404 s'il n'existe pas
        $axe = Axe::findOrFail($id);

        // Mettre à jour l'axe avec les données fournies
        $axe->update($request->only([
            'title',
            'content',
            // Inclure d'autres champs à mettre à jour si nécessaire
        ]));

        // Retourner la réponse JSON avec les informations de l'axe mis à jour
        return response()->json($axe);
    }


    // Supprime un axe spécifique de la base de données
    public function destroy($id)
    {
        $axe = Axe::findOrFail($id);
        $axe->delete();
        return response()->json(['message' => 'Axe supprimé avec succès']);
    }
}
