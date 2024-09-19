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
        $brevet = Revue::find($id);
        if ($brevet) {
            // Séparez les auteurs avec et sans ID
            $authorNames = explode(', ', $brevet->author);
            $authorIds = explode(',', $brevet->id_user);

            $authorsWithIds = [];
            $authorsWithoutIds = [];

            foreach ($authorNames as $index => $name) {
                if (isset($authorIds[$index]) && !empty($authorIds[$index])) {
                    $authorsWithIds[] = $name;
                } else {
                    $authorsWithoutIds[] = $name;
                }
            }

            return response()->json([
                'title' => $brevet->title,
                'doi' => $brevet->DOI, // Changer en minuscules pour correspondre au frontend
                'authors_with_ids' => $authorsWithIds,
                'author_ids' => $authorIds,
                'authors_without_ids' => $authorsWithoutIds
            ]);
        } else {
            return response()->json(['message' => 'Revue not found'], 404);
        }
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
        $request->validate([
            'title' => 'required|string|max:255',
            'DOI' => 'required|string|max:255',
            'current_user_id' => 'required|integer',
            'author_names' => 'array',
            'id_user' => 'string', // IDs des auteurs
            'optional_authors' => 'array',
        ]);

        try {
            $brevet = Revue::findOrFail($id);

            $title = $request->input('title');
            $DOI = $request->input('DOI');
            $authorNames = $request->input('author_names', []);
            $authorIds = explode(',', $request->input('id_user', '')); // IDs des auteurs
            $optionalAuthors = $request->input('optional_authors', []);

            // Préparer les auteurs et IDs
            $finalAuthorNames = [];
            $finalAuthorIds = [];

            foreach ($authorNames as $index => $name) {
                // Vérifier si l'ID existe pour cet auteur
                if (isset($authorIds[$index]) && !empty($authorIds[$index])) {
                    $finalAuthorNames[] = $name;
                    $finalAuthorIds[] = $authorIds[$index];
                } else {
                    // Ajouter les noms sans ID
                    $finalAuthorNames[] = $name;
                }
            }

            // Mettre à jour les valeurs
            $brevet->title = $title;
            $brevet->author = implode(', ', $finalAuthorNames);
            $brevet->DOI = $DOI;
            $brevet->id_user = implode(',', $finalAuthorIds); // Assurez-vous que les IDs sont corrects

            $brevet->save();

            return response()->json(['message' => 'Revue updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating revue', 'error' => $e->getMessage()], 500);
        }
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

    // Exemple dans Laravel (Contrôleur RevueController)
    // Exemple dans Laravel (Contrôleur RevueController)
    public function checkDOIExists(Request $request)
    {
        $doi = $request->input('doi');
        $exists = Revue::where('DOI', $doi)->exists(); // Revue est le modèle pour votre table des revues

        return response()->json(['exists' => $exists]);
    }


}
