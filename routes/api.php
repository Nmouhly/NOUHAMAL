<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\OuvrageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\RevueController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TheseController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\HabilitationController;
use App\Http\Controllers\PatentController;
use App\Http\Controllers\HomeDescriptionController;
use App\Http\Controllers\BrevetController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\SeminarController;
use App\Http\Controllers\AxeController;
use App\Http\Controllers\PresentationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//  Route::post('/test/{id}', [NewsController::class, 'update']);
//Route::apiResource('seminars', SeminarController::class);
// Route::put('/news/{id}', [NewsController::class, 'update']);
// Route::post('job-offers', [JobOfferController::class, 'store']);
// Route::put('job-offers/{id}', [JobOfferController::class, 'update']);
// Route::delete('job-offers/{id}', [JobOfferController::class, 'destroy']);
Route::put('/brevets/{id}', [BrevetController::class, 'update']);
Route::put('/brevetsUser/{id}', [BrevetController::class, 'updateBrevet']);
Route::get('/brevets/{id}', [BrevetController::class,'show']);
Route::get('/habilitations/{id}', [HabilitationController::class,'show']);
Route::delete('/brevets/{id}', [BrevetController::class, 'destroy']);
 Route::get('/brevets/user-or-contributor/{id_user}', [BrevetController::class, 'getBrevetByUserOrContributor']);
 Route::post('/brevets', [BrevetController::class, 'store']);
Route::post('/theses', [TheseController::class,'store']);
Route::delete('/theses/{id}', [TheseController::class, 'destroy']);
Route::get('/theses', [TheseController::class, 'index']);
Route::get('/brevets', [BrevetController::class, 'index']);
Route::get('/theses/{id}', [TheseController::class,'show']);
Route::put('/theses/{id}', [TheseController::class, 'update']);
Route::get('/theses/user-or-contributor/{id_user}', [TheseController::class, 'getTheseByUserOrContributor']);
Route::get('job-offers', [JobOfferController::class, 'index']);
Route::post('/reports', [ReportController::class, 'store']);
Route::put('/reports/{id}', [ReportController::class, 'update']);
Route::get('/home-descriptions', [HomeDescriptionController::class,'index']);
Route::get('job-offers/{id}', [JobOfferController::class, 'show']);
Route::put('/member/{id}', [MemberController::class, 'updateMember'])->name('member.update');
Route::put('/user/{id}', [UserController::class, 'updateUser'])->name('user.update');
Route::put('/ouvrages/{id}', [OuvrageController::class, 'update']);
Route::put('/ouvragesUser/{id}', [OuvrageController::class, 'updateOuvrage']);
Route::get('ouvrages/user/{id_user}', [OuvrageController::class, 'getByUser']);
Route::post('/ouvrages', [OuvrageController::class, 'store']);
Route::post('/revues', [RevueController::class, 'store']);
Route::put('/members/{id}', [MemberController::class, 'update']);
Route::put('/news/{id}', [NewsController::class, 'update']);
Route::get('/ouvragesUsers/{id}', [OuvrageController::class, 'showUser']);
Route::get('/revuesUsers/{id}', [RevueController::class, 'showUser']);
Route::delete('/ouvrages/{id}', [OuvrageController::class, 'destroy']);
Route::delete('/habilitations/{id}', [HabilitationController::class, 'destroy']);
Route::delete('/revues/{id}', [RevueController::class, 'destroy']);
Route::put('/revues/{id}', [RevueController::class, 'update']);
Route::put('/habilitations/{id}', [HabilitationController::class, 'update']);
Route::post('/habilitations', [HabilitationController::class, 'store']);
Route::get('/rapports/user-or-contributor/{id_user}', [ReportController::class, 'getReportByUserOrContributor']);
Route::get('/theses', [TheseController::class, 'index']);
Route::get('/habilitations', [HabilitationController::class,'index']);
Route::get('/habilitations/user-or-contributor/{id_user}', [HabilitationController::class, 'getHabilitationByUserOrContributor']);
// Group routes that require authentication with Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // User logout
    Route::post('/user/logout', [UserController::class, 'logout']);
    // News CRUD except for read operations
    Route::post('/news', [NewsController::class, 'store']);
   
    Route::get('/news/{id}', [NewsController::class, 'show']);
    
    Route::put('/conferences/{id}', [ConferenceController::class, 'update']);

     Route::delete('/news/{id}', [NewsController::class, 'destroy']);


    
     Route::post('home-descriptions', [HomeDescriptionController::class, 'store']);
     Route::put('home-descriptions/{id}', [HomeDescriptionController::class, 'update']);
     Route::delete('home-descriptions/{id}', [HomeDescriptionController::class, 'destroy']);
     Route::get('/home-descriptions/{id}', [HomeDescriptionController::class,'show']);
    // Admin dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    
    // Member CRUD except for read operations
    Route::post('/members', [MemberController::class, 'store']);
    
    Route::delete('/members/{id}', [MemberController::class, 'destroy']);
    Route::get('/presentations', [PresentationController::class, 'index']);
    Route::post('/presentations', [PresentationController::class, 'store']);
    Route::get('/presentations/{id}', [PresentationController::class, 'show']);
    Route::put('/presentations/{id}', [PresentationController::class, 'update']);
    Route::delete('/presentations/{id}', [PresentationController::class, 'destroy']);


    Route::post('/seminars', [SeminarController::class, 'store']);
    Route::put('/seminars/{id}', [SeminarController::class, 'update']);
    Route::delete('/seminars/{id}', [SeminarController::class, 'destroy']);
     Route::get('/ouvrages', [OuvrageController::class, 'index']);
    Route::get('/ouvrages/{id}', [OuvrageController::class, 'show']);
  
    

 
    
    
  
    
    Route::get('/conferences', [ConferenceController::class, 'index']);
    Route::get('/conferences/{id}', [ConferenceController::class, 'show']);
    Route::post('/conferences', [ConferenceController::class, 'store']);
    
    Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy']);
    Route::get('/patents', [PatentController::class, 'index']);
    Route::get('/patents/{id}', [PatentController::class, 'show']);
    Route::post('/patents', [PatentController::class, 'store']);
    Route::put('/patents/{id}', [PatentController::class, 'update']);
    Route::delete('/patents/{id}', [PatentController::class, 'destroy']);
    
    Route::post('/axes', [AxeController::class, 'store']);
    Route::get('/axes/{id}', [AxeController::class, 'show']);
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
   // Route::post('/revues', [RevueController::class, 'store']);
    Route::get('/revues/{id}', [RevueController::class, 'show']);
    
    //Route::delete('/revues/{id}', [RevueController::class, 'destroy']);
    Route::post('job-offers', [JobOfferController::class, 'store']);
    Route::put('job-offers/{id}', [JobOfferController::class, 'update']);
    Route::delete('job-offers/{id}', [JobOfferController::class, 'destroy']);
    
    // User CRUD
     // Get all users
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
Route::get('/statistics', [StatisticsController::class,'index']);
 Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/members', [MemberController::class, 'index']);
Route::get('/members/{id}', [MemberController::class, 'show']);
Route::get('members/user/{userId}', [MemberController::class, 'getByUserId']);
Route::put('/user/{id}', [UserController::class, 'updateUser'])->name('user.update');
   
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
Route::get('reports', [ReportController::class, 'index']);
Route::get('/reports/{id}', [ReportController::class, 'show']);
Route::get('conferences', [ConferenceController::class, 'index']);
Route::get('patents', [PatentController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/ouvrages/user-or-contributor/{id_user}', [OuvrageController::class, 'getOuvragesByUserOrContributor']);
Route::get('/revues/user-or-contributor/{id_user}', [RevueController::class, 'getRevuesByUserOrContributor']);
Route::delete('/reports/{id}', [ReportController::class, 'destroy']);
Route::get('/revues', [RevueController::class, 'index']);
