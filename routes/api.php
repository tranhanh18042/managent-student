<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'getListUsers']);
    Route::get('/{id}', [UserController::class, 'getUserById']);
    Route::put('/{id}', [UserController::class, 'updateUserById']);
    Route::post('/', [UserController::class, 'createUser']);
});

Route::prefix('/subjects')->group(function () {
    Route::get('/', [SubjectController::class, 'getListSubject']);
    Route::get('/{id}', [SubjectController::class, 'getSubjectByID']);
    Route::put('/{id}', [SubjectController::class, 'updateSubjectByID']);
    Route::post('/', [SubjectController::class, 'createSubject']);

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
