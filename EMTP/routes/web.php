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

// Client Side
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Dashboard Page
    Route::get('/client/dashboard', [DashboardController::class, 'ClientDashboard'])->name('client-dashboard');

    // Home Page
    Route::get('/home', [HomepageController::class, 'index'])->name('client-home');

    // Program Page - View all approved programs
    Route::get('/client/view/program', [ProgramController::class, 'index'])->name('client-program');

    // Program Page - View Specific Program
    Route::get('/client/view/program/{program}', [ProgramController::class, 'ClientViewSpecificProgram']);

    // Program Page - Register a program
    Route::get('/client/view/program/{program}/register', [ProgramController::class, 'ClientRegisterProgram']);

    // Program Page - Get registration details from user and save to database
    Route::post('/client/view/program/{program}/register', [ProgramController::class, 'ClientStoreProgram']);

    // Program Page - View all registered programs
    Route::get('/client/view/registered', [ProgramController::class, 'ClientViewRegisteredProgram']);

    // Program Page - View specific registered program details    
    Route::get('/client/registered/{registeredprogram}/{program}/detail', [ProgramController::class, 'ClientViewSpecificRegisteredProgramDetail'])->name('client-program-detail');

    // Program Page - View specific registered program announcement    
    Route::get('/client/registered/{registeredprogram}/{program}/announcement', [ProgramController::class, 'ClientViewSpecificRegisteredProgramAnnouncement'])->name('client-program-announcement');

    // Program Page - View specific registered program material  
    Route::get('/client/registered/{registeredprogram}/{program}/material', [ProgramController::class, 'ClientViewSpecificRegisteredProgramMaterial'])->name('client-program-material');

    // Program Page - View specific registered program feedback    
    Route::get('/client/registered/{registeredprogram}/{program}/feedback', [ProgramController::class, 'ClientViewSpecificRegisteredProgramFeedback'])->name('client-program-feedback');

    // About Us Page
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

    // Support & Help Page
    Route::get('/support', [SupportController::class, 'index'])->name('support');
});

//Staff routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Program Module
    //Staff Dashboard
    Route::get('/staff/dashboard', [DashboardController::class, 'StaffDashboard'])->name('staff-dashboard');

    //Create a program
    Route::get('/staff/create/program', [ProgramController::class, 'StaffCreateProgram'])->name('staff-create-program');

    //Register a program with button
    Route::post('/staff/create/program', [ProgramController::class, 'StaffRegisterProgram'])->name('staff-register-program');

    //View all pending and in charge programs
    Route::get('/staff/view/pendings', [ProgramController::class, 'StaffViewPendingProgram'])->name('staff-view-programs');

    //View a specific pending program
    Route::get('/staff/view/pendings/{program}/{clientprogram}', [ProgramController::class, 'StaffViewSpecificPendingProgram'])->name('staff-view-specific');
});

// Admin Routes
// Route::middleware(['auth:sanctum', 'verified','auth.admin'])->group(function () {

//Program Module
//Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'AdminDashboard'])->name('admin-dashboard');
// View
Route::get('/admin/view/program', [ProgramController::class, 'AdminShowAllPrograms'])->name('admin-view-all-programs');

//View Specific Program
Route::get('/admin/view/program/{program}', [ProgramController::class, 'AdminViewSpecificProgram'])->name('admin-view-specific-program');

//Approve Specific Program
Route::put('/admin/view/program/{program}', [ProgramController::class, 'AdminApprovedProgram'])->name('admin-approve-a-program');

// View Specific Approved Program
Route::get('/admin/view/approved/program/{program}', [ProgramController::class, 'AdminViewApprovedProgram'])->name('admin-view-specific-approved-program');


// });


// Route::put('/admin/programs/pending/{program}', [AdminProgramController::class, 'update']);

// Route::put('/admin/programs/approved/{program}', [AdminProgramController::class, 'edit']);

// route to Training Requisite Process
Route::get('/selection', function () {
    return view('client.requisite_process.selection');
});

Route::get('/payment_method', function () {
    return view('client.requisite_process.payment_method');
});

Route::get('/payment_credit_card', function () {
    return view('client.requisite_process.payment_credit_card');
});

Route::get('/payment_result', function () {
    return view('client.requisite_process.payment_result');
});
