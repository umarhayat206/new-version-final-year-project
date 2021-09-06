<?php

use App\Http\Controllers\CandidatesController;
use App\Http\Controllers\CastVoteController;
use App\Http\Controllers\ContactUsContoller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageUsers;
use App\Http\Controllers\PartiesController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\VotersController;
use App\Http\Controllers\NationalAreaController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ProvinceAreaController;
use App\Http\Controllers\UpdatePasswordController;
use App\Models\Party;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    
     return view('home');
   

});

Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::GET('/contactus',function(){
//       return view('contact_us');
// })->name('contactus');

Route::GET('/contactus',[ContactUsContoller::class,'index'])->name('contactus');
Route::POST('/contactus/submit',[ContactUsContoller::class,'submit'])->name('contactus.submit');
Route::GET('/aboutus',function(){
    return view('AboutUs');
})->name('aboutus');



 // $voters = DB::table('role_user')->where('role_id', '4')->count();
    // $candidate=DB::table('role_user')->where('role_id','3')->count();
    // $parties =Party::count();
    // return $parties;
    // return "the total voter is ".$voters." total Candidate is ".$candidate;


Route::group(['middleware'=>['auth','role:super-admin|admin']],function () {
    Route::get('/Dashboard',[DashboardController::class,'index'])->name('dashboard');

   
//system users
Route::GET('/users',[ManageUsers::class,'index'])->name('users.index');
Route::GET('/user', [ManageUsers::class, 'create'])->name('users.create');
Route::POST('/user', [ManageUsers::class, 'store'])->name('users.store');
Route::GET('/user/{id}/edit', [ManageUsers::class, 'edit'])->name('users.edit');
Route::PUT('/user/{id}', [ManageUsers::class, 'update'])->name('users.update');
// Route::Delete('/user/{id}', [ManageUsers::class, 'delete'])->name('users.delete');
Route::DELETE('/user/{id}', [ManageUsers::class, 'delete'])->name('users.delete');
Route::GET('/user/{id}',[ManageUsers::class,'show'])->name('users.show');
// Route::GET('/search/user',[ManageUsers::class, 'searchUser'])->name('users.search');

// Parties rutes
Route::GET('/parties',[PartiesController::class,'index'])->name('parties.index');
Route::GET('/party',[PartiesController::class,'create'])->name('parties.create');
Route::POST('/party',[PartiesController::class,'store'])->name('parties.store');
Route::GET('/party/{id}',[PartiesController::class,'edit'])->name('parties.edit');
Route::PUT('/party/{id}',[PartiesController::class,'update'])->name('parties.update');
Route::DELETE('/party/{id}',[PartiesController::class,'delete'])->name('party.delete');
//Candidates Routes
Route::GET('/candidates',[CandidatesController::class,'index'])->name('candidates.index');
Route::GET('/candidate',[CandidatesController::class,'create'])->name('candidates.create');
Route::POST('/candidate',[CandidatesController::class,'store'])->name('candidates.store');
Route::GET('/candidate/view/{id}',[CandidatesController::class,'show'])->name('candidates.show');
Route::GET('/candidate/{id}',[CandidatesController::class,'edit'])->name('candidates.edit');
Route::DELETE('/candidate/{id}',[CandidatesController::class,'delete'])->name('candidates.delete');

//Voter Routes
Route::GET('/voters',[VoterController::class,'index'])->name('voters.index');
Route::GET('/voter',[VoterController::class,'create'])->name('voters.create');
Route::POST('/voter',[VoterController::class,'store'])->name('voters.store');
Route::GET('/voter/{id}/show',[VoterController::class,'show'])->name('voters.show');
Route::GET('/voter/{id}',[VoterController::class,'edit'])->name('voters.edit');
Route::PUT('/voter/{id}',[VoterController::class,'update'])->name('voters.update');
Route::DELETE('/voter/{id}',[VoterController::class,'delete'])->name('voters.delete');


//Positions Routes
Route::GET('/poistions',[PositionController::class,'index'])->name('positions.index');
Route::GET('/position',[PositionController::class,'create'])->name('positions.create');
Route::POST('/position',[PositionController::class,'store'])->name('positions.store');
Route::GET('/position/{id}',[PositionController::class,'edit'])->name('positions.edit');
Route::PUT('/position/{id}',[PositionController::class,'update'])->name('positions.update');
Route::DELETE('/position/{id}',[PositionController::class,'delete'])->name('positions.delete');

//National Areas 
Route::GET('/nationalareas',[NationalAreaController::class,'index'])->name('nationalareas.index');
Route::GET('/nationalarea',[NationalAreaController::class,'create'])->name('nationalareas.create');
Route::POST('/nationalarea',[NationalAreaController::class,'store'])->name('nationalareas.store');
Route::GET('/nationalarea/{id}',[NationalAreaController::class,'edit'])->name('nationalareas.edit');
Route::PUT('/nationalarea/{id}',[NationalAreaController::class,'update'])->name('nationalareas.update');
Route::DELETE('/nationalarea/{id}',[NationalAreaController::class,'delete'])->name('nationalareas.delete');

//Province Areas
Route::GET('/provinceareas',[ProvinceAreaController::class,'index'])->name('provinceareas.index');
Route::GET('/provincearea',[ProvinceAreaController::class,'create'])->name('provinceareas.create');
Route::POST('/provincearea',[ProvinceAreaController::class,'store'])->name('provinceareas.store');
Route::GET('/provincearea/{id}',[ProvinceAreaController::class,'edit'])->name('provinceareas.edit');
Route::PUT('/provincearea/{id}',[ProvinceAreaController::class,'update'])->name('provinceareas.update');
Route::DELETE('/provincearea/{id}',[ProvinceAreaController::class,'delete'])->name('provinceareas.delete');

//Notifications Routes

Route::GET('/notifications',[NotificationsController ::class,'index'])->name('notifications.index');
Route::GET('/notification',[NotificationsController ::class,'create'])->name('notifications.create');
Route::POST('/notification',[NotificationsController ::class,'store'])->name('notifications.store');
Route::GET('/notification/{id}',[NotificationsController ::class,'edit'])->name('notifications.edit');
Route::PUT('/notification/{id}',[NotificationsController ::class,'update'])->name('notifications.update');
Route::DELETE('/notification/{id}',[NotificationsController ::class,'delete'])->name('notifications.delete');
Route::GET('/notification/{id}/show',[NotificationsController ::class,'show'])->name('notifications.show');

    
});


//Cast Vote Routes
Route::group(['middleware'=>'role:voter'],function () {
    Route::GET('/castvote',[CastVoteController::class,'index'])->name('castvote');
Route::POST('/castvote',[CastVoteController::class,'store'])->name('castvote.store');
    
});

Route::POST('update/password',[UpdatePasswordController::class,'update'])->name('update.password');


Route::group(['middleware'=>['auth','role:voter|candidate']],function () {
    Route::GET('/profile',function(){

        return view('Profile');
    })->name('profile');
});





