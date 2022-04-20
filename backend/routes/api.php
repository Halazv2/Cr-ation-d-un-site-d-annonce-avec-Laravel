<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\DemandesController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//public routs
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/Profile/{id}', [AuthController::class, 'show']);
Route::get('/Profile', [AuthController::class, 'index']);
Route::delete('Account/{id}', [AuthController::class, 'destroy']);

//protected routes
// Route::group(['middleware' => ['auth:sanctum']], function () {
//logout 
Route::post('/logout', [AuthController::class, 'logout']);
//SEARCH
Route::get('/Offres/search/{sujet}', [OffreController::class, 'search']);
//update
Route::put('/Offres/{id}', [OffreController::class, 'update']);
//delete
Route::delete('Offres/{id}', [OffreController::class, 'destroy']);
//add
Route::post('/Offres', [OffreController::class, 'store']);
//get one 
Route::get('/Offres/{id}', [OffreController::class, 'show']);
//get all 
Route::get('/Offres', [OffreController::class, 'index']);
// });



// resource has all route u may need 
// Route::resource('Offres',OffreController::class);
