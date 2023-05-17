<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TimeSheetController;

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

/**
 * Activity Routes
 */
Route::get('/activities/list', [ActivityController::class, 'index']);
Route::get('/activities/{id}', [ActivityController::class, 'show']);
Route::post('/activities', [ActivityController::class, 'store']);
Route::put('/activities/{id}', [ActivityController::class, 'update']);
Route::delete('/activities/{id}', [ActivityController::class, 'destroy']);

/**
 * TimeSheet Routes
 */
Route::get('/timesheets/list', [TimeSheetController::class, 'index']);
Route::get('/timesheets/{id}', [TimeSheetController::class, 'show']);
Route::post('/timesheets', [TimeSheetController::class, 'store']);
Route::put('/timesheets/{id}', [TimeSheetController::class, 'update']);
Route::delete('/timesheets/{id}', [TimeSheetController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
