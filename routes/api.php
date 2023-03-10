<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NodeController;
use App\Http\Controllers\RelationshipController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/node', [NodeController::class, 'store']);
Route::get('/node', [NodeController::class, 'retreiveAllNodes']);
Route::get('/node/{name}', [NodeController::class, 'retreiveNode']);
Route::get('/node/{name}/{relationshipType}/{direction}', [NodeController::class, 'getNodeRelationshipsByType'])
                ->middleware('validator');

Route::get('/relationship', [RelationshipController::class, 'retreiveAllRelationships']);
Route::get('/relationship/{type}', [RelationshipController::class, 'retreiveRelationshipByType']);
Route::post('/relationship', [RelationshipController::class, 'store']);