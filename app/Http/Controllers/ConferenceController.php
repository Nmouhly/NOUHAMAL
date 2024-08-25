<?php

namespace App\Http\Controllers;
use App\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class ConferenceController extends Controller
{

    // Récupérer et retourner toutes les conférences
    public function index()
    {
        $conferences = Conference::all();
        return response()->json($conferences);
    }

    // Récupérer une conférence par son ID
    public function show($id)
    {
        $conference = Conference::find($id);
        if ($conference) {
            return response()->json($conference);
        }
        return response()->json(['message' => 'Conférence non trouvée'], 404);
    }

    // Créer une nouvelle conférence
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string',
            'paper_title' => 'required|string|max:255',
            'conference_name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'reference' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $conference = new Conference();
        $conference->title = $request->title;
        $conference->authors = $request->authors;
        $conference->paper_title = $request->paper_title;
        $conference->conference_name = $request->conference_name;
        $conference->date = $request->date;
        $conference->location = $request->location;
        $conference->reference = $request->reference;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('conference_images', 'public');
            $conference->image = $imagePath;
        }
    
        $conference->save();
    
        return response()->json($conference, 201);
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'authors' => 'required|string',
            'paper_title' => 'required|string',
            'conference_name' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'reference' => 'nullable|string',
            'image' => 'nullable|string', // Validation de l'image en base64
        ]);
    
        $conference = Conference::find($id);
    
        if ($conference) {
            $conference->title = $request->title;
            $conference->authors = $request->authors;
            $conference->paper_title = $request->paper_title;
            $conference->conference_name = $request->conference_name;
            $conference->date = $request->date;
            $conference->location = $request->location;
            $conference->reference = $request->reference;
    
            if ($request->image) {
                // Supprimer l'ancienne image si elle existe
                if ($conference->image) {
                    Storage::disk('public')->delete($conference->image);
                }
    
                // Décoder l'image en base64 et la sauvegarder
                $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));
                $imageName = uniqid() . '.png'; // Nommez l'image avec un nom unique
                $imagePath = 'conference_images/' . $imageName;
                Storage::disk('public')->put($imagePath, $imageData);
    
                // Mettre à jour le chemin de l'image
                $conference->image = $imagePath;
            }
    
            $conference->save();
    
            return response()->json($conference);
        }
    
        return response()->json(['message' => 'Conférence non trouvée'], 404);
    }
    

    
    // Supprimer une conférence
    public function destroy($id)
    {
        $conference = Conference::find($id);
        if ($conference) {
            $conference->delete();
            return response()->json(['message' => 'Conférence supprimée avec succès!']);
        }
        return response()->json(['message' => 'Conférence non trouvée'], 404);
    }
}
