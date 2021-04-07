<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\ClientProgramController;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Client Side

    // Dashboard Department
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('client-dashboard');
    Route::get('/home', [HomepageController::class, 'show'])->name('client-home');
    Route::get('/program', [HomepageController::class, 'show'])->name('client-program');
    Route::get('/about-us', [AboutUsController::class, 'show'])->name('aboutus');
    Route::get('/support', [SupportController::class, 'show'])->name('support');

    // Admin Routes
  
});

//Admin Routes

// Route::put('admin/programs/pending/{program}', [AdminProgramController::class, 'update']);

// Route::put('admin/programs/approved/{program}', [AdminProgramController::class, 'edit']);

Route::get('admin/program/view', [AdminProgramController::class, 'index']);

//to be approved
Route::get('admin/programs/{program}', [AdminProgramController::class, 'show']);


Route::put('/admin/programs/{program}', [AdminProgramController::class, 'update']);

//Client Routes

//view all available programs
Route::get('client/programs', [ProgramController::class, 'index']);

//show one program
Route::get('client/programs/{program}', [ProgramController::class, 'client_showprogram']);

//register
Route::get('client/programs/{program}/register', [ProgramController::class, 'register']);

//register
Route::post('client/programs/{program}', [ProgramController::class, 'client_store']);

//view registered programs
Route::get('Client/registeredprograms', [ClientProgramController::class, 'index']);

Route::get('Client/registeredprograms/{registeredprogram}/{program}', [ClientProgramController::class, 'show']);

//Staff Routes
Route::get('Staff/create_program', function () {
    return view('Staff.create_program');
});

Route::post('Staff/create_program', [ProgramController::class, 'store']);

Route::get('/test', function(){
    return view('admin.dashboard.index');
});