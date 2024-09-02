<?php

namespace App\Http\Controllers;
use App\These;
use Illuminate\Http\Request;

class TheseController extends Controller
{
    public function index()
    {
        $theses = These::all();
        return response()->json($theses);
    }

    /**
     * Show the form for creating a new thesis.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created thesis in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
            $these = These::create([
                'title' => $validatedData['title'],
                'author' => $validatedData['author'],
                'doi' => $validatedData['doi'],
                'id_user' => $validatedData['id_user'],
                'lieu' => $validatedData['lieu'],
                'date' => $validatedData['date'],
            ]);

            return response()->json($these, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de l\'ajout de la thèse'], 500);
        }
    }
    /**
     * Display the specified thesis.
     *
     * @param \App\These $thesis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rapport = These::find($id);
        if ($rapport) {
            return response()->json($rapport);
        }
        return response()->json(['message' => 'Report non trouvé'], 404);
    }

    /**
     * Show the form for editing the specified thesis.
     *
     * @param \App\These $thesis
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified thesis in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\These $thesis
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, These $thesis)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'author' => 'required|string|max:255',
    //         'DOI' => 'nullable|string|max:255',
    //         'id_user' => 'required|exists:users,id',
    //         'lieu' => 'required|string|max:255',
    //         'date' => 'required|date',
    //     ]);

    //     $thesis->update($request->all());
    //     return response()->json($thesis);
    // }
    public function update(Request $request, $id)
    {
        $request->validate([
           'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'doi' => 'required|string|max:255',
            'id_user' => 'required|exists:users,id',
            'lieu' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $rapport = These::find($id);

        if ($rapport) {
            $rapport->update($request->all());
            return response()->json($rapport);
        }

        return response()->json(['message' => 'Report non trouvé'], 404);
    }


    /**
     * Remove the specified thesis from storage.
     *
     * @param \App\These $thesis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theses = These::find($id);
        if ($theses) {
            $theses->delete();
            return response()->json(['message' => 'these supprimé']);
        }
        return response()->json(['message' => 'these non trouvé'], 404);
    }

    public function getByUser($id_user)
    {
        // Récupérer les ouvrages associés à l'id_user spécifié
        $theses = These::where('id_user', $id_user)->get();


        // Retourner les ouvrages trouvés
        return response()->json($theses);
    }
    public function getTheseByUserOrContributor($id_user)
    {
        // Récupérer les ouvrages où id_user est l'utilisateur ou où il est dans une chaîne de IDs (contributeurs)
        $theses = These::where('id_user', $id_user)
            ->orWhere('id_user', 'like', '%' . $id_user . '%')
            ->get();

        return response()->json($theses);
    }
}
