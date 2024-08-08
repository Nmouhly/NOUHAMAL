<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Group routes that require authentication with Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // User logout
    Route::post('/user/logout', [UserController::class, 'logout']);
    
    // News CRUD except for read operations
    Route::post('/news', [NewsController::class, 'store']);
    Route::put('/news/{id}', [NewsController::class, 'update']);
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);
    
    // Admin dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    
    // Member CRUD except for read operations
    Route::post('/members', [MemberController::class, 'store']);
    Route::put('/members/{id}', [MemberController::class, 'update']);
    Route::delete('/members/{id}', [MemberController::class, 'destroy']);
    
    // Team CRUD except for read operations
    Route::post('/equipe', [TeamController::class, 'store']);
    Route::put('/equipe/{id}', [TeamController::class, 'update']);
    Route::delete('/equipe/{id}', [TeamController::class, 'destroy']);

    // Project CRUD except for read operations
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
    
    // User CRUD
    Route::get('/users', [UserController::class, 'index']); // Get all users
    Route::get('/users/{id}', [UserController::class, 'show']); // Get specific user
    Route::put('/users/{id}', [UserController::class, 'update']); // Update specific user
    Route::delete('/users/{id}', [UserController::class, 'destroy']); // Delete specific user

    // Get user details and token information
    Route::get('user', function (Request $request) {
        return [
            'user' => $request->user(),
            'currentToken' => $request->bearerToken()
        ];
    });

    // Checking authentication status
    Route::get('/checkingAuthenticated', function (Request $request) {
        return response()->json(['authenticated' => Auth::check()]);
    });
});

// Routes accessible without prior authentication
Route::post('/user/login', [UserController::class, 'auth']);
Route::post('/user/register', [UserController::class, 'store']);

// Read operations for visitors
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/members', [MemberController::class, 'index']);
Route::get('/members/{id}', [MemberController::class, 'show']);
Route::get('/equipe', [TeamController::class, 'index']);
Route::get('/equipe/{id}', [TeamController::class, 'show']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/ongoing', [ProjectController::class, 'ongoingProjects']);
Route::get('/projects/completed', [ProjectController::class, 'completedProjects']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
