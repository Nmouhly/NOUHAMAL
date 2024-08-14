<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OuvrageController;
use App\Http\Controllers\RevueController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\AxeController;
use App\Http\Controllers\PresentationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//  Route::post('/test/{id}', [NewsController::class, 'update']);
//Route::apiResource('seminars', SeminarController::class);
Route::put('/news/{id}', [NewsController::class, 'update']);
// Group routes that require authentication with Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // User logout
    Route::post('/user/logout', [UserController::class, 'logout']);
    // News CRUD except for read operations
    Route::post('/news', [NewsController::class, 'store']);
    
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);
    
    // Admin dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    
    // Member CRUD except for read operations
    Route::post('/members', [MemberController::class, 'store']);
    Route::put('/members/{id}', [MemberController::class, 'update']);
    Route::delete('/members/{id}', [MemberController::class, 'destroy']);
    Route::get('/presentations', [PresentationController::class, 'index']);
    Route::post('/presentations', [PresentationController::class, 'store']);
    Route::get('/presentations/{id}', [PresentationController::class, 'show']);
    Route::put('/presentations/{id}', [PresentationController::class, 'update']);

    Route::post('/seminars', [SeminarController::class, 'store']);
    Route::put('/seminars/{id}', [SeminarController::class, 'update']);
    Route::delete('/seminars/{id}', [SeminarController::class, 'destroy']);
     Route::get('/ouvrages', [OuvrageController::class, 'index']);
    Route::get('/ouvrages/{id}', [OuvrageController::class, 'show']);
    Route::post('/ouvrages', [OuvrageController::class, 'store']);
    Route::put('/ouvrages/{id}', [OuvrageController::class, 'update']);
    Route::delete('/ouvrages/{id}', [OuvrageController::class, 'destroy']);
    
    Route::post('/axes', [AxeController::class, 'store']);
    Route::put('/axes/{id}', [AxeController::class, 'update']);
    Route::delete('/axes/{id}', [AxeController::class, 'destroy']);
    // Team CRUD except for read operations
    Route::post('/equipe', [TeamController::class, 'store']);
    Route::put('/equipe/{id}', [TeamController::class, 'update']);
    Route::delete('/equipe/{id}', [TeamController::class, 'destroy']);

    // Project CRUD except for read operations
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);
    Route::get('/revues', [RevueController::class, 'index']);
    Route::post('/revues', [RevueController::class, 'store']);
    Route::get('/revues/{id}', [RevueController::class, 'show']);
    Route::put('/revues/{id}', [RevueController::class, 'update']);
    Route::delete('/revues/{id}', [RevueController::class, 'destroy']);
    
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
Route::get('/seminars', [SeminarController::class, 'index']);
Route::get('/seminars/{id}', [SeminarController::class, 'show']);
Route::get('/equipe', [TeamController::class, 'index']);
Route::get('/equipe/{id}', [TeamController::class, 'show']);
Route::get('/axes', [AxeController::class, 'index']);
Route::get('/presentations', [PresentationController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/seminar/ongoing', [SeminarController::class, 'ongoingSeminars']);
Route::get('/seminar/completed', [SeminarController::class, 'completedSeminars']);
Route::get('/projects/ongoing', [ProjectController::class, 'ongoingProjects']);
Route::get('/projects/completed', [ProjectController::class, 'completedProjects']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('ouvrages', [OuvrageController::class, 'index']);
Route::get('/revues', [RevueController::class, 'index']);
