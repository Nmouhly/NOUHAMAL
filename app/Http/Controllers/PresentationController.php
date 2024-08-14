<?php

namespace App\Http\Controllers;
use App\Presentation;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        $presentations = Presentation::all();
        return response()->json($presentations);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        return Presentation::create($request->all());
    }

    public function show($id)
    {
        return Presentation::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $presentation = Presentation::findOrFail($id);
        $presentation->update($request->all());

        return $presentation;
    }

    public function destroy($id)
    {
        $presentation = Presentation::findOrFail($id);
        $presentation->delete();

        return response()->json(['message' => 'Presentation deleted']);
    }
}
