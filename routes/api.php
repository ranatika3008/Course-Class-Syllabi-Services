<?php

use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SyllabusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resources([
    'courses'=>CourseController::class,
    'syllabi'=>SyllabusController::class,
    'classes'=>CourseClassController::class,
]);