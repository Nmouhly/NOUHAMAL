<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\User;
use App\Member; // Utilisez App\Models\User au lieu de App\User si vous utilisez Laravel 8+
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AuthUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function store(Request $request)
    // {
    //     // Validation des données de la requête
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8',
    //         'role' => 'required|integer|in:0,1', // Validation du rôle pour s'assurer qu'il est soit 0 soit 1
    //     ]);

    //     // Retourner une réponse en cas d'erreurs de validation
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     // Création de l'utilisateur
    //     $user = User::create([
    //         'name' => $request->input('name'),
    //         'email' => $request->input('email'),
    //         'password' => Hash::make($request->input('password')), // Hachage du mot de passe
    //         'role' => (int) $request->input('role'), // Conversion en entier
    //     ]);

    //     // Retourner une réponse de succès
    //     return response()->json([
    //         'message' => 'Utilisateur créé avec succès.',
    //         'user' => $user,
    //     ], 201);
    // }
    public function store(Request $request)
{
    // Validation des données de la requête
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|integer|in:0,1', // Validation du rôle pour s'assurer qu'il est soit 0 soit 1
        'bio' => 'nullable|string|max:500', // Validation du bio, non obligatoire
    ]);

    // Retourner une réponse en cas d'erreurs de validation
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 422);
    }

    // Création de l'utilisateur
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')), // Hachage du mot de passe
        'role' => (int) $request->input('role'), // Conversion en entier
        'bio' => $request->input('bio', ''), // Valeur par défaut vide si non fourni
    ]);

    // Retourner une réponse de succès
    return response()->json([
        'message' => 'Utilisateur créé avec succès.',
        'user' => $user,
    ], 201);
}


public function auth(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'error' => 'Ces identifiants ne correspondent à aucun de nos enregistrements.'
        ], 401);
    }

    

    if ($user->role === 1) {
        return response()->json([
            'user' => $user,
            'currentToken' => $user->createToken('new_user')->plainTextToken,
            'message' => 'Connexion réussie. Vous êtes un admin.',
        ]);
    } else {
        return response()->json([
            'user' => $user,
            'currentToken' => $user->createToken('new_user')->plainTextToken,
            'message' => 'Connexion réussie. Vous êtes un utilisateur.',
        ]);
    }
}


    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout has been created successfully.'
        ]);
    }

    public function checkingAuthenticated(Request $request)
    {
        // Vérifie si l'utilisateur est authentifié
        $isAuthenticated = Auth::check();

        return response()->json([
            'isAuthenticated' => $isAuthenticated
        ]);
    }

    // CRUD Functions
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json([
                'error' => 'User not found.'
            ], 404);
        }
    }
    public function updateUser(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $user = User::find($id);

    if (!$user) {
        return response()->json(['error' => 'Utilisateur non trouvé'], 404);
    }

    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
    ]);

    return response()->json(['message' => 'Utilisateur mis à jour avec succès', 'user' => $user], 200);
}


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|required|string|min:8',
            'role' => 'sometimes|required|integer|in:0,1'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'Utilisateur non trouvé'], 404);
        }

        $user->update([
            'name' => $request->input('name', $user->name),
            'email' => $request->input('email', $user->email),
            'password' => $request->has('password') ? Hash::make($request->password) : $user->password,
            'role' => $request->input('role', $user->role)
        ]);

        return response()->json($user);
    }
   
    public function destroy($id)
{
    $user = User::find($id);
    if ($user) {
        // Find the associated Member with the same email
        $member = Member::where('email', $user->email)->first();

        if ($member) {
            // Update the Member's status to 'ancien'
            $member->update(['statut' => 'ancien']);
        }

        // Delete the user
        $user->delete();

        return response()->json([
            'message' => 'User and associated member status updated successfully.'
        ]);
    } else {
        return response()->json([
            'error' => 'User not found.'
        ], 404);
    }
}

}
