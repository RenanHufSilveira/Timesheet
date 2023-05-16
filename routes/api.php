<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActivityTypeController;

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


/**
 * ActivityType Routes
 */
Route::get('/activitytypes/list', [ActivityTypeController::class, 'index']);
Route::get('/activitytypes/{id}', [ActivityTypeController::class, 'show']);
Route::post('/activitytypes', [ActivityTypeController::class, 'store']);
Route::put('/activitytypes/{id}', [ActivityTypeController::class, 'update']);
Route::delete('/activitytypes/{id}', [ActivityTypeController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
