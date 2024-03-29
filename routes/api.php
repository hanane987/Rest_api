<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\BusinessCardController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])
  ->middleware('auth:sanctum');




Route::middleware('auth:sanctum')->group(function () {
    // Endpoint pour récupérer toutes les cartes de visite de l'utilisateur
    Route::get('/business-cards', [BusinessCardController::class, 'index']);

    // Endpoint pour créer une nouvelle carte de visite
    Route::post('/business-cardss', [BusinessCardController::class, 'store']);

    // Endpoint pour mettre à jour une carte de visite existante
    Route::post('/business-carde/{businessCard}', [BusinessCardController::class, 'update']);

    // Endpoint pour supprimer une carte de visite spécifique
    Route::delete('/business-cardse/{businessCard}', [BusinessCardController::class, 'destroy']);
});
