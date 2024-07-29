<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index()
    {
        try {
            $news = News::all();
            return response()->json($news);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération des actualités'], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/news_images', $fileName);
            $news->image = $fileName;
        }

        $news->save();

        return response()->json([
            'message' => 'Actualité ajoutée avec succès',
            'news' => $news
        ]);
    }

    public function update(Request $request, $id)
    {
        Log::info('Entrée dans la méthode update avec id: ' . $id);

        try {
            $news = News::findOrFail($id);
            Log::info('Actualité trouvée: ', ['news' => $news]);
            $news->title = $request->input('title');
            $news->content = $request->input('content');

            if ($request->hasFile('image')) {
                $news->image = $request->file('image')->store('images', 'public');
            }

            $news->save();
            Log::info('Actualité mise à jour: ', ['news' => $news]);
            return response()->json($news, 200);
        } catch (\Exception $e) {
            Log::error('Erreur lors de la mise à jour de l\'actualité: ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de la mise à jour de l\'actualité'], 500);
        }
    }

    public function show($id)
    {
        try {
            $news = News::findOrFail($id);
            return response()->json($news);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Actualité non trouvée'
            ], 404);
        }
    }


    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image && Storage::exists('public/news_images/' . $news->image)) {
            Storage::delete('public/news_images/' . $news->image);
        }

        $news->delete();
        return response()->json(null, 204);
    }
}
