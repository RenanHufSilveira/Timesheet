<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\ActivityTypeController;

Route::get('/', function () {
    return view('welcome');
});

/**
 * ActivityType Routes
 */
Route::get('/activitytype/list', [ActivityTypeController::class, 'index']);
Route::get('/activitytype/{id?}', [ActivityTypeController::class, 'show']);