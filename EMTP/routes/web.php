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

Route::middleware(['auth:sanctum', 'verified','auth'])->group(function () {

    // Client Side

    // Dashboard Page
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('client-dashboard');

    // Home Page
    Route::get('/home', [HomepageController::class, 'index'])->name('client-home');

    // Program Page
    //View all approved programs
    Route::get('/client/view/program', [ProgramController::class, 'ClientViewAllProgram'])->name('client-program');
    //View Specific Program
    Route::get('/client/view/program/{program}', [ProgramController::class, 'ClientViewSpecificProgram']);

    //Register a program
    Route::get('/client/view/program/{program}/register', [ProgramController::class, 'ClientRegisterProgram']);

    //What is this
    // Route::post('/client/view/program/{program}', [ProgramController::class, 'ClientStoreProgram']);

    //View all registered programs
    Route::get('/client/view/program/registered', [ClientProgramController::class, 'index']);

    //View specific registered program details    
    Route::get('/client/view/program/registered/{registeredprogram}/{program}', [ClientProgramController::class, 'show']);

    //About Us Page    
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

    //Support & Help Page
    Route::get('/support', [SupportController::class, 'index'])->name('support');  
    

    

    

});

//Staff routes
Route::middleware(['auth:sanctum', 'verified','auth.staff','auth'])->group(function () {

    //Program Module
    //Create a program
    Route::get('/staff/create/program', [ProgramController::class, 'StaffCreateProgram'])->name('staff-create-program');

    //Register a program with button
    Route::post('/staff/create/program', [ProgramController::class, 'StaffRegisterProgram'])->name('staff-register-program');
});

// Admin Routes
Route::middleware(['auth:sanctum', 'verified','auth.admin', 'auth'])->group(function () {

    //Program Module
    // View 
    Route::get('/admin/view/program', [AdminProgramController::class, 'ShowAllPrograms'])->name('admin-view-all-programs');

    //View Specific Program
    Route::get('/admin/view/program/{program}', [AdminProgramController::class, 'show'])->name('admin-view-specific-program');

    //Approve Specific Program
    Route::put('/admin/view/program/{program}', [AdminProgramController::class, 'UpdateApprovedProgram']);

});



// Route::put('/admin/programs/pending/{program}', [AdminProgramController::class, 'update']);

// Route::put('/admin/programs/approved/{program}', [AdminProgramController::class, 'edit']);

