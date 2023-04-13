<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/users')->group(function () {
    Route::get('/', [UserController::class, 'getListUsers']);
    Route::get('/{id}', [UserController::class, 'getUserById']);
    Route::put('/{id}', [UserController::class, 'updateUserById']);
    Route::post('/', [UserController::class, 'createUser']);
});

// Route::prefix('/subjects')->group(function () {
//     Route::get('/', [SubjectController::class, 'getListSubject']);
//     Route::get('/{id}', [SubjectController::class, 'getSubjectByID']);
//     Route::put('/{id}', [SubjectController::class, 'updateSubjectByID']);
//     Route::post('/', [SubjectController::class, 'createSubject']);

// });


Route::get('/login', [LoginController::class, 'showloginErr'])->name('login');
Route::post('/login-custom', [LoginController::class, 'login'])->name('login.custom'); 

Route::middleware(['auth'])->group(function () {
    Route::get('/home',[HomeController::class, 'index'])->name('home');   
    Route::get('/users', [UserController::class, 'getListUsers'])->name('listUsers');
    Route::get('/user', [UserController::class, 'getUserById'])->name('profile');
    Route::get('/logout', [LogoutController::class, 'logout']);
    Route::get('/update-profile', [UserController::class,'edit'])->name('editProfile');
    Route::post('/update-profile', [UserController::class,'updateUser'])->name('submitProfile');
    Route::get('/change-password', [ChangePasswordController::class,'index']);
    Route::put('/change-password', [ChangePasswordController::class,'changePassword']);

});

