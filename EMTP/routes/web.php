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
    Route::get('/home', [HomepageController::class, 'index'])->name('client-home');
    Route::get('/program', [ProgramController::class, 'searchbar'])->name('client-program');
    Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
    Route::get('/support', [SupportController::class, 'index'])->name('support');

    // Admin Routes
  
});

//Admin Routes

// Route::put('admin/programs/pending/{program}', [AdminProgramController::class, 'update']);

// Route::put('admin/programs/approved/{program}', [AdminProgramController::class, 'edit']);

Route::get('admin/program/view', [AdminProgramController::class, 'index']);

//to be approved
Route::get('Admin/programs/{program}', [AdminProgramController::class, 'show']);


Route::put('Admin/programs/{program}', [AdminProgramController::class, 'update']);

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