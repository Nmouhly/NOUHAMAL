<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\News;
class NewsController extends Controller
{
    public function index()
    {
        return News::all();
    }

    // Get single news item
    public function show($id)
    {
        return News::findOrFail($id);
    }

    // Create a new news item
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }

        $news->save();

        return response()->json($news, 201);
    }

 
//     public function update(Request $request, $id)
// {
//     // Validation des champs
//     $request->validate([
//         'title' => 'required|string|max:255',
//         'content' => 'required|string',
//         //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     ]);

//     $news = News::findOrFail($id);
//     $news->title = $request->input('title');
//     $news->content = $request->input('content');

//     // if ($request->hasFile('image')) {
//     //     // Supprimer l'image existante
//     //     if ($news->image) {
//     //         Storage::disk('public')->delete($news->image);
//     //     }

//     //     // Enregistrer la nouvelle image
//     //     $imagePath = $request->file('image')->store('news_images', 'public');
//     //     $news->image = $imagePath;
//     // }

//     $news->save();

//     return response()->json($news, 200);
// }


public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|string', // Validation de l'image en base64
    ]);

    $news = News::find($id);

    if ($news) {
        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->image) {
            // Supprimer l'ancienne image si elle existe
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }

            // Décoder et enregistrer la nouvelle image
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->image));
            $imageName = uniqid() . '.png'; // Nommez l'image avec un nom unique
            $imagePath = 'news_images/' . $imageName;
            Storage::disk('public')->put($imagePath, $imageData);

            $news->image = $imagePath;
        }

        $news->save();

        return response()->json($news);
    }

    return response()->json(['message' => 'News non trouvée'], 404);
}

    // Delete a news item
    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return response()->json(null, 204);
    }
}
