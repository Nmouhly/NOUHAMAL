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

// Routes accessibles sans authentification
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/members', [MemberController::class, 'index']);
Route::get('/members/{id}', [MemberController::class, 'show']);
Route::get('members/user/{userId}', [MemberController::class, 'getByUserId']);
Route::get('/seminars', [SeminarController::class, 'index']);
Route::get('/seminars/{id}', [SeminarController::class, 'show']);
Route::get('/equipe', [TeamController::class, 'index']);
Route::get('/equipe/{id}', [TeamController::class, 'show']);
Route::get('/axes', [AxeController::class, 'index']);
Route::get('/presentations', [PresentationController::class, 'index']);
Route::get('/home-descriptions', [HomeDescriptionController::class, 'index']);
Route::get('/habilitations/{id}', [HabilitationController::class, 'show']);
Route::get('/habilitations/user-or-contributor/{id_user}', [HabilitationController::class, 'getHabilitationByUserOrContributor']);
Route::get('/rapports/user-or-contributor/{id_user}', [ReportController::class, 'getReportByUserOrContributor']);
Route::get('/revues/user-or-contributor/{id_user}', [RevueController::class, 'getRevuesByUserOrContributor']);
Route::get('/brevets/user-or-contributor/{id_user}', [BrevetController::class, 'getBrevetByUserOrContributor']);
Route::get('/theses/user-or-contributor/{id_user}', [TheseController::class, 'getTheseByUserOrContributor']);
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
Route::get('brevets', [BrevetController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('job-offers', [JobOfferController::class, 'index']);
Route::get('/statistics', [StatisticsController::class, 'index']);
Route::get('job-offers/{id}', [JobOfferController::class, 'show']);
Route::get('/revues', [RevueController::class, 'index']);
Route::get('/theses', [TheseController::class, 'index']);
Route::get('/habilitations', [HabilitationController::class, 'index']);

// Routes accessibles avec authentification
Route::middleware('auth:sanctum')->group(function () {
    // User routes
    Route::post('/user/logout', [UserController::class, 'logout']);
    Route::put('/user/{id}', [UserController::class, 'updateUser'])->name('user.update');
    Route::post('/user/register', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']); // Get specific user
    Route::put('/users/{id}', [UserController::class, 'update']); // Update specific user
    Route::delete('/users/{id}', [UserController::class, 'destroy']); // Delete specific user
    Route::get('/user', function (Request $request) {
        return [
            'user' => $request->user(),
            'currentToken' => $request->bearerToken()
        ];
    });

    //users 
    Route::get('/ouvrages/user-or-contributor/{id_user}', [OuvrageController::class, 'getOuvragesByUserOrContributor']);

    //revue
    Route::get('/revues/user-or-contributor/{id_user}', [RevueController::class, 'getRevuesByUserOrContributor']);
    Route::get('/revueUser/{id}', [RevueController::class, 'showUser']);
    Route::put('/revueUser/{id}', [RevueController::class, 'updateRevues']);
    Route::post('/revueUser', [RevueController::class, 'store']);
    Route::delete('/revuesUser/{id}', [RevueController::class, 'destroy']);
    Route::post('/checkDOIExists', [RevueController::class, 'checkDOIExists']);

    //ouvrages 
    Route::get('/ouvrages/user-or-contributor/{id_user}', [OuvrageController::class, 'getOuvragesByUserOrContributor']);
    Route::get('/ouvrageUser/{id}', [OuvrageController::class, 'showUser']);
    Route::put('/ouvrageUser/{id}', [OuvrageController::class, 'updateOuvrage']);
    Route::post('/ouvragesUser', [OuvrageController::class, 'store']);
    Route::delete('/ouvragesUser/{id}', [OuvrageController::class, 'destroy']);
    Route::post('/checkDOIExists', [OuvrageController::class, 'checkDOIExists']);






    // News routes
    Route::post('/news', [NewsController::class, 'store']);
    Route::put('/news/{id}', [NewsController::class, 'update']);
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);

    // Member routes
    Route::post('/members', [MemberController::class, 'store']);
    Route::put('/members/{id}', [MemberController::class, 'update']);
    Route::delete('/members/{id}', [MemberController::class, 'destroy']);

    // Presentation routes
    Route::post('/presentations', [PresentationController::class, 'store']);
    Route::put('/presentations/{id}', [PresentationController::class, 'update']);
    Route::delete('/presentations/{id}', [PresentationController::class, 'destroy']);
    Route::get('/presentations/{id}', [PresentationController::class, 'show']);

    // Seminar routes
    Route::post('/seminars', [SeminarController::class, 'store']);
    Route::put('/seminars/{id}', [SeminarController::class, 'update']);
    Route::delete('/seminars/{id}', [SeminarController::class, 'destroy']);

    // Ouvrage routes
    Route::post('/ouvrages', [OuvrageController::class, 'store']);
    Route::put('/ouvrages/{id}', [OuvrageController::class, 'update']);
    Route::delete('/ouvrages/{id}', [OuvrageController::class, 'destroy']);
    Route::get('/ouvrages/{id}', [OuvrageController::class, 'show']);

    // Revue routes
    Route::post('/revues', [RevueController::class, 'store']);
    Route::put('/revues/{id}', [RevueController::class, 'update']);
    Route::delete('/revues/{id}', [RevueController::class, 'destroy']);
    Route::get('/revues/{id}', [RevueController::class, 'show']);

    // Habilitation routes
    Route::post('/habilitations', [HabilitationController::class, 'store']);
    Route::put('/habilitations/{id}', [HabilitationController::class, 'update']);
    Route::delete('/habilitations/{id}', [HabilitationController::class, 'destroy']);
    Route::get('/habilitations/{id}', [HabilitationController::class, 'show']);

    // Brevet routes
    Route::post('/brevets', [BrevetController::class, 'store']);
    Route::put('/brevets/{id}', [BrevetController::class, 'update']);
    Route::delete('/brevets/{id}', [BrevetController::class, 'destroy']);
    Route::get('/brevets/{id}', [BrevetController::class, 'show']);

    // These routes
    Route::post('/theses', [TheseController::class, 'store']);
    Route::put('/theses/{id}', [TheseController::class, 'update']);
    Route::delete('/theses/{id}', [TheseController::class, 'destroy']);
    Route::get('/theses/{id}', [TheseController::class, 'show']);


    // Job Offer routes
    Route::post('/job-offers', [JobOfferController::class, 'store']);
    Route::put('/job-offers/{id}', [JobOfferController::class, 'update']);
    Route::delete('/job-offers/{id}', [JobOfferController::class, 'destroy']);

    // Project routes
    Route::post('/projects', [ProjectController::class, 'store']);
    Route::put('/projects/{id}', [ProjectController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

    // Patent routes
    Route::post('/patents', [PatentController::class, 'store']);
    Route::put('/patents/{id}', [PatentController::class, 'update']);
    Route::delete('/patents/{id}', [PatentController::class, 'destroy']);
    Route::get('/patents/{id}', [PatentController::class, 'show']);
    //description
    Route::post('home-descriptions', [HomeDescriptionController::class, 'store']);
    Route::put('home-descriptions/{id}', [HomeDescriptionController::class, 'update']);
    Route::delete('home-descriptions/{id}', [HomeDescriptionController::class, 'destroy']);
    Route::get('/home-descriptions/{id}', [HomeDescriptionController::class, 'show']);

    // Team routes
    Route::post('/equipe', [TeamController::class, 'store']);
    Route::put('/equipe/{id}', [TeamController::class, 'update']);
    Route::delete('/equipe/{id}', [TeamController::class, 'destroy']);
    //conference
    Route::post('/conferences', [ConferenceController::class, 'store']);
    Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy']);
    Route::get('/conferences/{id}', [ConferenceController::class, 'show']);
    Route::put('/conferences/{id}', [ConferenceController::class, 'update']);
    //repots
    Route::delete('/reports/{id}', [ReportController::class, 'destroy']);
    Route::get('/reports/{id}', [ReportController::class, 'show']);
    Route::post('/reports', [ReportController::class, 'store']);
    Route::put('/reports/{id}', [ReportController::class, 'update']);

    //Axe
    Route::post('/axes', [AxeController::class, 'store']);
    Route::get('/axes/{id}', [AxeController::class, 'show']);
    Route::put('/axes/{id}', [AxeController::class, 'update']);
    Route::delete('/axes/{id}', [AxeController::class, 'destroy']);
    // Admin dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);

    // Authentication status
    Route::get('/checkingAuthenticated', function (Request $request) {
        return response()->json(['authenticated' => Auth::check()]);
    });
});

// Routes accessibles sans authentification
Route::post('/user/login', [UserController::class, 'auth']);

