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
    public function showUser($id)
    {
        $ouvrage = Ouvrage::find($id);
        if ($ouvrage) {
            return response()->json($ouvrage);
        }
        return response()->json(['message' => 'Ouvrage non trouvé'], 404);
    }
    public function show($id)
    {
        $ouvrage = Ouvrage::find($id);
        if ($ouvrage) {
            return response()->json($ouvrage);
        }
        return response()->json(['message' => 'Ouvrage non trouvé'], 404);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'author' => 'required|string|max:255',
    //         'pdf_link' => 'nullable|url',
            
    //     ]);

        
    //     $ouvrage = Ouvrage::create([
    //         'title' => $request->title,
    //         'author' => $request->author,
    //         'pdf_link' => $request->pdf_link,
           
    //     ]);

    //     return response()->json(['message' => 'Ouvrage créé avec succès!', 'ouvrage' => $ouvrage], 201);
    // }
    public function store(Request $request)
{
    // Valider les données du formulaire
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'DOI' => 'required|string|max:255',
        'id_user' => 'string|max:255', // Valider que id_user est présent dans la table members
    ]);

    // Créer un nouvel ouvrage avec les données validées
    $ouvrage = Ouvrage::create([
        'title' => $request->title,
        'author' => $request->author,
        'DOI' => $request->DOI,
        'id_user' => $request->id_user, // Ajoutez cette ligne pour inclure id_user
    ]);

    // Retourner une réponse JSON avec un message de succès
    return response()->json(['message' => 'Ouvrage créé avec succès!', 'ouvrage' => $ouvrage], 201);
}



    // public function update(Request $request, $id)
    // {
    //     // Valider les données de la requête
    //     $validatedData = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'author' => 'required|string|max:255',
    //         'pdf_link' => 'nullable|url',
    //     ]);

    //     // Trouver l'ouvrage par son ID
    //     $ouvrage = Ouvrage::find($id);

    //     if ($ouvrage) {
    //         // Mettre à jour l'ouvrage avec les données validées
    //         $ouvrage->update($validatedData);
    //         return response()->json($ouvrage);
    //     }

    //     // Retourner une réponse d'erreur si l'ouvrage n'est pas trouvé
    //     return response()->json(['message' => 'Ouvrage non trouvé'], 404);
    // }
    public function getOuvragesByUserOrContributor($id_user)
    {
        // Récupérer les ouvrages où id_user est l'utilisateur ou où il est dans une chaîne de IDs (contributeurs)
        $ouvrages = Ouvrage::where('id_user', $id_user)
            ->orWhere('id_user', 'like', '%' . $id_user . '%')
            ->get();

        return response()->json($ouvrages);
    }
    public function updateOuvrage(Request $request, $id)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'DOI' => 'required|string|max:255',
            'id_user' => 'string|max:255', 
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
    public function update(Request $request, $id)
    {
        // Valider les données de la requête
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'DOI' => 'required|string|max:255',
            'id_user' => 'string|max:255', 
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
    public function getByUser($id_user)
{
    // Récupérer les ouvrages associés à l'id_user spécifié
    $ouvrages = Ouvrage::where('id_user', $id_user)->get();


    // Retourner les ouvrages trouvés
    return response()->json($ouvrages);
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
