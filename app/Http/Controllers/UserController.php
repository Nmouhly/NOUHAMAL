<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\User; // Utilisez App\Models\User au lieu de App\User si vous utilisez Laravel 8+
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\AuthUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        try {
            $validatedData = $request->validated();
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
            return response()->json([
                'message' => 'Account has been created successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create account. Please try again later.'
            ], 500);
        }
    }

    public function auth(AuthUserRequest $request)
    {
        if ($request->validated()) {
            $user = User::whereEmail($request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'error' => 'These credentials do not match any of our records.'
                ], 401); // Code de statut approprié pour une réponse non autorisée
            } else {
                // Vérifiez le rôle de l'utilisateur
                if ($user->role == 1) { // Supposons que '1' représente un administrateur
                    return response()->json([
                        'user' => $user,
                        'currentToken' => $user->createToken('new_user')->plainTextToken
                    ]);
                } else {
                    return response()->json([
                        'error' => 'Access denied. Not an admin.'
                    ], 403); // Code de statut pour l'accès interdit
                }
            }
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

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $validatedData = $request->validate([
                'name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|max:255|unique:users,email,' . $id,
                'password' => 'sometimes|string|min:8|confirmed',
                'role' => 'sometimes|integer'
            ]);

            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }

            $user->update($validatedData);
            return response()->json([
                'message' => 'User updated successfully.'
            ]);
        } else {
            return response()->json([
                'error' => 'User not found.'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'message' => 'User deleted successfully.'
            ]);
        } else {
            return response()->json([
                'error' => 'User not found.'
            ], 404);
        }
    }
}
