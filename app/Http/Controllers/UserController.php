<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\User;
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
                ], 401); // Ajouter un code de statut approprié pour une réponse non autorisée
            } else {
                return response()->json([
                    'user' => $user,
                    'currentToken' => $user->createToken('new_user')->plainTextToken
                ]);
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

}
