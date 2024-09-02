<?php

namespace App\Http\Controllers;
use App\Habilitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HabilitationController extends Controller
{
     // Afficher la liste des habilitations
     public function index()
     {
         $habilitations = Habilitation::all();
         return response()->json($habilitations);
     }
 
     // Afficher un habilitation spécifique
     public function show($id)
     {
         $habilitation = Habilitation::findOrFail($id);
         return response()->json($habilitation);
     }
 
     // Créer une nouvelle habilitation
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'title' => 'required|string|max:255',
             'author' => 'required|string',
             'doi' => 'nullable|string|max:255',
             'id_user' => 'required|string',
             'lieu' => 'nullable|string|max:255',
             'date' => 'nullable|date',
         ]);
 
         try {
             $habilitation = Habilitation::create([
                 'title' => $validatedData['title'],
                 'author' => $validatedData['author'],
                 'doi' => $validatedData['doi'],
                 'id_user' => $validatedData['id_user'],
                 'lieu' => $validatedData['lieu'],
                 'date' => $validatedData['date'],
             ]);
 
             return response()->json($habilitation, 201);
         } catch (\Exception $e) {
             return response()->json(['error' => 'Erreur lors de l\'ajout habilitation'], 500);
         }
     }
     public function getByUser($id_user)
     {
         // Récupérer les ouvrages associés à l'id_user spécifié
         $habilitation = Habilitation::where('id_user', $id_user)->get();
 
 
         // Retourner les ouvrages trouvés
         return response()->json($habilitation);
     }
     public function getHabilitationByUserOrContributor($id_user)
     {
         // Récupérer les ouvrages où id_user est l'utilisateur ou où il est dans une chaîne de IDs (contributeurs)
         $habilitations = Habilitation::where('id_user', $id_user)
             ->orWhere('id_user', 'like', '%' . $id_user . '%')
             ->get();
 
         return response()->json($habilitations);
     }
     // Mettre à jour une habilitation existante
     public function update(Request $request, $id)
     {
         $validator = Validator::make($request->all(), [
             'title' => 'required|string|max:255',
             'author' => 'required|string|max:255',
             'DOI' => 'nullable|string|max:255',
             'id_user' => 'nullable|exists:members,user_id',
             'lieu' => 'required|string|max:255',
             'date' => 'required|date',
         ]);
 
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }
 
         $habilitation = Habilitation::findOrFail($id);
         $habilitation->update($request->all());
         return response()->json($habilitation);
     }
 
     // Supprimer une habilitation
     public function destroy($id)
     {
         $habilitation = Habilitation::findOrFail($id);
         $habilitation->delete();
         return response()->json(null, 204);
     }
}
