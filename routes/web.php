<?php

use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageUsers;
use App\Http\Controllers\PartiesController;
use App\Http\Controllers\VotersController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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

Route::get('/', function () {
    
    return view('welcome');
});

Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/Dashboard',function(){
    
   return view('admin.Dashboard');
});
Route::GET('/users',[ManageUsers::class,'index'])->name('users.index');
Route::GET('/user/create', [ManageUsers::class, 'create'])->name('users.create');
Route::POST('/user', [ManageUsers::class, 'store'])->name('users.store');
Route::GET('/user/{id}/edit', [ManageUsers::class, 'edit'])->name('users.edit');
Route::PUT('/user/{id}', [ManageUsers::class, 'update'])->name('users.update');
// Route::Delete('/user/{id}', [ManageUsers::class, 'delete'])->name('users.delete');
Route::GET('/user/{id}/delete', [ManageUsers::class, 'delete'])->name('users.delete');
Route::GET('/user/{id}',[ManageUsers::class,'show'])->name('users.show');
Route::GET('/search/user',[ManageUsers::class, 'searchUser'])->name('users.search');

// Parties rutes
Route::GET('/parties',[PartiesController::class,'index'])->name('parties.index');
Route::GET('/party/create',[PartiesController::class,'create'])->name('parties.create');
Route::POST('/party/store',[PartiesController::class,'store'])->name('parties.store');

//Candidates Routes
Route::GET('/candidates',[CandidatesController::class,'index'])->name('candidates.index');
Route::GET('/candidate/create',[CandidatesController::class,'create'])->name('candidates.create');
Route::POST('/candidate',[CandidatesController::class,'store'])->name('candidates.store');
Route::GET('/candidate/{id}/show',[CandidatesController::class,'show'])->name('candidates.show');
Route::GET('/candidate/{id}',[CandidatesController::class,'edit'])->name('candidates.edit');
