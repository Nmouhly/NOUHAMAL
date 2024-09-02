<?php

namespace App\Http\Controllers;
use App\Brevet;
use Illuminate\Http\Request;

class BrevetController extends Controller
{
    public function index()
    {
        $brevets = Brevet::all();
        return response()->json($brevets);
    }

    // Ajouter un nouveau brevet
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'doi' => 'required|string|max:255',
            'id_user' => 'string|max:255', // Valider que id_user est présent dans la table members
        ]);

        // Créer un nouvel ouvrage avec les données validées
        $brevets = Brevet::create([
            'title' => $request->title,
            'author' => $request->author,
            'doi' => $request->doi,
            'id_user' => $request->id_user, // Ajoutez cette ligne pour inclure id_user
        ]);

        // Retourner une réponse JSON avec un message de succès
        return response()->json(['message' => 'Brevet créé avec succès!', 'brevet' => $brevets], 201);
    }


    // Afficher un brevet spécifique
    public function show($id)
    {
        $brevet = Brevet::find($id);

        if ($brevet) {
            return response()->json($brevet);
        }

        return response()->json(['message' => 'Brevet non trouvé'], 404);
    }

    // Mettre à jour un brevet existant
    public function updateBrevet(Request $request, $id)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'doi' => 'required|string|max:255',
            'id_user' => 'string|max:255', 
        ]);
    
        // Trouver l'ouvrage par son ID
        $ouvrage = Brevet::find($id);
    
        if ($ouvrage) {
            // Mettre à jour l'ouvrage avec les données validées
            $ouvrage->update($validatedData);
            return response()->json($ouvrage);
        }
    
        // Retourner une réponse d'erreur si l'ouvrage n'est pas trouvé
        // return response()->json(['message' => 'Ouvrage non trouvé'], 404);
    }

    public function getByUser($id_user)
    {
        // Récupérer les ouvrages associés à l'id_user spécifié
        $brevets = Brevet::where('id_user', $id_user)->get();


        // Retourner les ouvrages trouvés
        return response()->json($brevets);
    }
    // Supprimer un brevet
    public function destroy($id)
    {
        $brevet = Brevet::find($id);
        if ($brevet) {
            $brevet->delete();
            return response()->json(['message' => 'Brevet supprimé']);
        }
        return response()->json(['message' => 'Brevet non trouvé'], 404);
    }

    public function getBrevetByUserOrContributor($id_user)
    {
        // Récupérer les ouvrages où id_user est l'utilisateur ou où il est dans une chaîne de IDs (contributeurs)
        $ouvrages = Brevet::where('id_user', $id_user)
            ->orWhere('id_user', 'like', '%' . $id_user . '%')
            ->get();

        return response()->json($ouvrages);
    }
}
