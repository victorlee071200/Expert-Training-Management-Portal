<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\ClientProgramController;
use App\Http\Controllers\SupportTicketController;

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

Route::get('/403', function(){
    return view('403');
})->name('403');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Client Side

    // Dashboard Page
    Route::get('/client/dashboard', [DashboardController::class, 'ClientDashboard'])->name('client-dashboard');

    // Home Page
    Route::get('/home', [HomepageController::class, 'index'])->name('client-home');

    // Program Page
    //View all approved programs
    Route::get('/client/view/program', [ProgramController::class, 'index'])->name('client-program');

    //View Specific Program
    Route::get('/client/view/program/{program}', [ProgramController::class, 'ClientViewSpecificProgram']);

    //Register a program
    Route::get('/client/view/program/{program}/register', [ProgramController::class, 'ClientRegisterProgram']);

    //Get registration details from user and save to database
    Route::post('/client/view/program/{program}/register', [ProgramController::class, 'ClientStoreProgram']);

    //View all registered programs
    Route::get('/client/view/registered', [ProgramController::class, 'ClientViewRegisteredProgram']);

    //View specific registered program details
    Route::get('/client/registered/{registeredprogram}/{program}', [ProgramController::class, 'ClientViewSpecificRegisteredProgram']);

    //About Us Page
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

    //View Support & Help Page
    Route::get('/client/view/support', [SupportTicketController::class, 'ClientSupportPageView'])->name('client-view-support');

    //Client Create Support & Help Page
    Route::get('/client/create/support', [SupportTicketController::class, 'ClientCreateSupportPageView'])->name('client-create-support');

    //Client Create a Support Ticket
    Route::post('/client/create/support', [SupportTicketController::class, 'ClientCreateSupport'])->name('client-create-support');

});

//Staff routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Program Module
    //Staff Dashboard
    Route::get('/staff/view/dashboard', [DashboardController::class, 'StaffDashboard'])->name('staff-dashboard');

    //Create a program
    Route::get('/staff/create/program', [ProgramController::class, 'StaffCreateProgram'])->name('staff-create-program');

    //Register a program with button
    Route::post('/staff/create/program', [ProgramController::class, 'StaffRegisterProgram'])->name('staff-register-program');

    //View all pending programs
    Route::get('/staff/view/pendings', [ProgramController::class, 'StaffViewPendingProgram'])->name('staff-view-program');
});


// Admin Routes
Route::middleware(['auth:sanctum', 'verified', 'auth.admin'])->group(function () {
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

    // View All Support Ticket
    Route::get('/admin/support', [SupportTicketController::class, 'AdminViewAllTickets'])->name('admin-view-all-support');

    // View Specific Support Ticket
    Route::get('/admin/support/{id}', [SupportTicketController::class, 'AdminViewSpecificTicket'])->name('admin-view-specific-support');

    // Assign a ticket to a staff
    Route::post('/admin/support/{id}', [SupportTicketController::class, 'AdminAssignTo'])->name('admin-assign-to');
});

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

