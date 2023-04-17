<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\SubjectController;
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


Route::get('/login', [LoginController::class, 'showloginErr'])->name('login');
Route::post('/login-custom', [LoginController::class, 'login'])->name('login.custom'); 

Route::middleware(['auth'])->group(function () {
    Route::get('/home',[HomeController::class, 'index'])->name('home');   
    Route::get('/users', [UserController::class, 'getListUsers'])->name('listUsers');
    Route::get('/user', [UserController::class, 'getUserById'])->name('profile');
    Route::get('/logout', [LogoutController::class, 'logout']);
    Route::get('/update-profile', [UserController::class,'edit'])->name('editProfile');
    Route::post('/update-profile', [UserController::class,'updateUser'])->name('submitProfile');
    Route::get('/change-password', [ChangePasswordController::class,'index'])->name('change.password');
    Route::put('/change-password', [ChangePasswordController::class,'changePassword']);

    Route::get('/subjects', [SubjectController::class, 'getListSubject'])->name('subjects');
    Route::get('/subject-detail/{id}', [SubjectController::class, 'subjectDetail'])->name('subject.detail');

    Route::get('/subject', [SubjectController::class, 'indexAddSubject'])->name('create.subject');
    Route::post('/subject', [SubjectController::class, 'createSubject']);

    Route::get('/update-subject/{id}', [SubjectController::class, 'indexUpdateSubject'])->name('update.subject');
    Route::put('/update-subject/{id}', [SubjectController::class, 'updateSubject']);
    Route::delete('/delete-subject/{id}',[SubjectController::class, 'deleteSubject'])->name('subject.delete');   
    Route::post('/add-student/{id}', [SubjectController::class, 'addStudent']);
    Route::delete('/remove-student/{user_id}/{subject_id}',[SubjectController::class, 'removeStudent']);
    Route::post('/join-subject/{id}', [SubjectController::class, 'joinSubject']);
    
    Route::get('/list-subject-student',[SubjectController::class , 'showListSubjectStudent'])->name('list.subject.student');

    Route::get('/score/{user_id}/{subject_id}',[ScoreController::class, 'index'])->name('score');
    Route::put('/score/{user_id}/{subject_id}', [ScoreController::class, 'storeScore']);
}); 
