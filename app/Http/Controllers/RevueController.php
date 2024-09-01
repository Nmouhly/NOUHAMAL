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
    public function getRevuesByUserOrContributor($id_user)
    {
        // Récupérer les ouvrages où id_user est l'utilisateur ou où il est dans une chaîne de IDs (contributeurs)
        $ouvrages = Revue::where('id_user', $id_user)
            ->orWhere('id_user', 'like', '%' . $id_user . '%')
            ->get();

        return response()->json($ouvrages);
    }
    public function showUser($id)
    {
        $ouvrage = Revue::find($id);
        if ($ouvrage) {
            return response()->json($ouvrage);
        }
        return response()->json(['message' => 'Ouvrage non trouvé'], 404);
    }
    public function store(Request $request)
    {
        // Valide les données
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'DOI' => 'required|string|max:255',
            'id_user' => 'string|max:255', // Valider que id_user est présent dans la table members
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
    public function updateRevues(Request $request, $id)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'DOI' => 'required|string|max:255',
            'id_user' => 'string|max:255', 
        ]);
    
        // Trouver l'ouvrage par son ID
        $ouvrage = Revue::find($id);
    
        if ($ouvrage) {
            // Mettre à jour l'ouvrage avec les données validées
            $ouvrage->update($validatedData);
            return response()->json($ouvrage);
        }
    
        // Retourner une réponse d'erreur si l'ouvrage n'est pas trouvé
        return response()->json(['message' => 'Ouvrage non trouvé'], 404);
    }
    public function update(Request $request, $id)
    {
        // Valide les données
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'DOI' => 'required|string|max:255',
            'id_user' => 'string|max:255', 
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
