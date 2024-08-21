<?php

namespace App\Http\Controllers;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $rapports = Report::all();
        return response()->json($rapports);
    }

    public function show($id)
    {
        $rapport = Report::find($id);
        if ($rapport) {
            return response()->json($rapport);
        }
        return response()->json(['message' => 'Report non trouvé'], 404);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'pdf_link' => 'nullable|url',
        ]);

        $rapport = Report::create($request->all());

        return response()->json(['message' => 'Report créé avec succès!', 'rapport' => $rapport], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'pdf_link' => 'nullable|url',
        ]);

        $rapport = Report::find($id);

        if ($rapport) {
            $rapport->update($request->all());
            return response()->json($rapport);
        }

        return response()->json(['message' => 'Report non trouvé'], 404);
    }

    public function destroy($id)
    {
        $rapport = Report::find($id);
        if ($rapport) {
            $rapport->delete();
            return response()->json(['message' => 'Report supprimé']);
        }
        return response()->json(['message' => 'Report non trouvé'], 404);
    }
}
