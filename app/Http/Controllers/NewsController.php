<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\Exception\AccessDeniedException;
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
    {  $paths=$request->all();
        return view('news.test', compact('paths'));
        //  $news = News::findOrFail($id);
    //     $news->title=$request->title;
    //     $news->content=$request->content;
    //     $image = $request->file('file');
    //     $image_name = time() . '_' . $image->getClientOriginalName();
    //     $image->storeAs('news_images/', $image_name,'public');
    //     $paths=$image_name;
    //     $news->image=$paths;
    //     $news->save();
    //     return "http://localhost/l2is_backend/storage/app/public/news_images/" . $paths;
    
}

//     public function update(Request $request, $id)
// {

//     //  $news = $request->all();
// //    return view('news.test', compact('news'));
    
//     // Trouver l'actualité à mettre à jour
//     $news = News::findOrFail($id);
//     Log::info('Actualité trouvée:', ['news_id' => $id, 'news' => $news]);

//     // Validation des champs
//    /* $validator = Validator::make($request->all(), [
//         'title' => 'string|max:255',
//         'content' => 'string',
//         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//     ]);

//     if ($validator->fails()) {
//         Log::error('Validation échouée:', ['errors' => $validator->errors()]);
//         return response()->json(['error' => 'Validation échouée', 'errors' => $validator->errors()], 422);
//     }

//     Log::info('Validation des champs réussie');
//     // Mise à jour des autres champs
//     */
//     $news->title = $request->title;
//     $news->content = $request->content;
    
//     Log::info('Champs mis à jour:', ['title' => $news->title, 'content' => $news->content]);

//     // Traitement de l'image
//     if ($request->hasFile('image')) {
//         Log::info('Fichier image détecté');
//         $file = $request->file('image');

//         // Vérification du type MIME
//         $mimeType = $file->getMimeType();
//         $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

//         if (!in_array($mimeType, $allowedMimeTypes)) {
//             Log::error('Type MIME non autorisé:', ['mimeType' => $mimeType]);
//             return response()->json(['error' => 'Le fichier doit être une image'], 400);
//         }

//         try {
//             $path = $file->store('news_images', 'public');
//             Log::info('Image téléchargée avec succès:', ['path' => $path]);
//             $news->image = $path;
//         } catch (\Exception $e) {
//             Log::error('Erreur lors du téléchargement de l\'image:', ['exception' => $e->getMessage()]);
//             return response()->json(['error' => 'Erreur lors du téléchargement de l\'image'], 500);
//         }
//     } else {
//         Log::info('Pas de fichier image détecté');
//     }
    
   
    
//     // Sauvegarder les changements
//     try {
         
//         $news->save();
//         Log::info('Actualité sauvegardée avec succès:', ['news' => $news]);
//         return "http://localhost/l2is_backend/storage/app/public/news_images/" . $news->image;
//     } catch (\Exception $e) {
//         Log::error('Erreur lors de la sauvegarde de l\'actualité:', ['exception' => $e->getMessage()]);
//         return response()->json(['error' => 'Erreur lors de la sauvegarde'], 500);
//     }

//     return response()->json([
//         'message' => 'Actualité mise à jour avec succès',
//         'news' => $news,
//     ]);
// }

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
        return response()->json(null, 204);}
}