<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\AdminSupportController;
use App\Http\Controllers\StaffProgramController;
use App\Http\Controllers\ClientProgramController;
use App\Http\Controllers\ClientSupportController;
use App\Http\Controllers\AdminDepartmentController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\TrainingMaterialController;

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


    // Program Module
    Route::get('/client/view/program', [ClientProgramController::class, 'index'])->name('client-program-dashboard');
    Route::get('/client/view/program/{id}', [ClientProgramController::class, 'show'])->name('client-view-specific-program');



    // Program Page - View Specific Program
    Route::get('/client/view/program/{program}', [ProgramController::class, 'ClientViewSpecificProgram']);

    // Program Page - Register a program
    Route::get('/client/view/program/{program}/register', [ProgramController::class, 'ClientRegisterProgram']);

    // Program Page - Get registration details from user and save to database
    Route::post('/client/view/program/{program}/register', [ProgramController::class, 'ClientStoreProgram']);

    // Program Page - View all registered programs
    Route::get('/client/view/registered', [ProgramController::class, 'ClientViewRegisteredProgram']);

    // Program Page - View specific registered program details
    Route::get('/client/view/registered/{registeredprogram}/{program}/detail', [ProgramController::class, 'ClientViewSpecificRegisteredProgramDetail'])->name('client-program-detail');

    // Program Page - Edit specific registered program details (Before staff approves it)
    Route::get('/client/view/registered/{registeredprogram}/{program}/edit', [ProgramController::class, 'ClientEditSpecificRegisteredProgramDetail'])->name('client-program-edit');

    // POST - Program Page - Edit specific registered program details (Before staff approves it)
    Route::post('/client/view/registered/{registeredprogram}/{program}/edit', [ProgramController::class, 'ClientSaveRegisteredProgram']);

    // Program Page - Client confirms the program
    Route::get('/registered/{registeredprogram}/confirm', [ProgramController::class, 'ClientConfirmProgram'])->name('client-program-confirm');

    // Program Page - View specific registered program announcement
    Route::get('/client/registered/{registeredprogram}/{program}/announcement', [ProgramController::class, 'ClientViewSpecificRegisteredProgramAnnouncement'])->name('client-program-announcement');

    // Program Page - View specific registered program material
    Route::get('/client/registered/{registeredprogram}/{program}/material', [ProgramController::class, 'ClientViewSpecificRegisteredProgramMaterial'])->name('client-program-material');

    // Program Page - View specific registered program feedback
    Route::get('/client/registered/{registeredprogram}/{program}/feedback', [ProgramController::class, 'ClientViewSpecificRegisteredProgramFeedback'])->name('client-program-feedback');

    // About Us Page
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');

    // Support Module
    Route::get('/client/view/support', [ClientSupportController::class, 'index'])->name('client-support-dashboard');
    Route::get('/client/create/support', [ClientSupportController::class, 'create'])->name('client-create-support-page');
    Route::post('/client/create/support', [ClientSupportController::class, 'store'])->name('client-create-a-support');
    Route::get('/client/view/support/{id}', [ClientSupportController::class, 'show'])->name('client-view-specific-support');
    Route::get('/client/edit/support/{id}', [ClientSupportController::class, 'edit'])->name('client-edit-specific-support');
    Route::put('/client/update/support/{id}', [ClientSupportController::class, 'update'])->name('client-update-specific-support');
    Route::delete('/client/delete/support/{id}', [ClientSupportController::class, 'delete'])->name('client-delete-specific-support');



    // Route::get('/admin/view/department', [AdminDepartmentController::class, 'index'])->name('admin-department-dashboard');
    // Route::get('/admin/create/department', [AdminDepartmentController::class, 'create'])->name('admin-create-department-page');
    // Route::post('/admin/create/department', [AdminDepartmentController::class, 'store'])->name('admin-create-a-department');
    // Route::get('/admin/view/department/{id}', [AdminDepartmentController::class, 'show'])->name('admin-view-specific-department');
    // Route::get('/admin/edit/department/{id}', [AdminDepartmentController::class, 'edit'])->name('admin-edit-specific-department');
    // Route::put('/admin/update/department/{id}', [AdminDepartmentController::class, 'update'])->name('admin-update-specific-department');
    // Route::delete('/admin/delete/department/{id}', [AdminDepartmentController::class, 'delete'])->name('admin-delete-specific-department');


});

//Staff routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Program Module
    //Staff Dashboard
    Route::get('/staff/dashboard', [DashboardController::class, 'StaffDashboard'])->name('staff-dashboard');

    // Program Module
    Route::get('/staff/view/program', [StaffProgramController::class, 'index'])->name('staff-program-dashboard');
    Route::get('/staff/create/program', [ProgramController::class, 'StaffCreateProgram'])->name('staff-create-program');


    //Create a program
    Route::get('/staff/create/program', [ProgramController::class, 'StaffCreateProgram'])->name('staff-create-program');

    //Register a program with button
    Route::post('/staff/create/program', [ProgramController::class, 'StaffRegisterProgram'])->name('staff-register-program');

    //View all pending and in charge programs
    Route::get('/staff/view/pendings', [ProgramController::class, 'StaffViewPendingProgram'])->name('staff-view-programs');

    //View a specific pending program
    Route::get('/staff/view/pendings/{program}/{clientprogram}', [ProgramController::class, 'StaffViewSpecificPendingProgram'])->name('staff-view-specific');

    //Approve a specific pending program
    Route::get('/{clientprogram}/{id}/approve', [ProgramController::class, 'StaffApproveSpecificPendingProgram'])->name('staff-approve-specific');

    //View a specific in charge program
    Route::get('/staff/incharge/view/{user}/{clientprogram}', [ProgramController::class, 'StaffViewSpecificProgram'])->name('staff-view-specific-incharge');

    //Mark a program as completed
    Route::get('/approved/{clientprogram}/completed', [ProgramController::class, 'StaffMarkProgramComplete'])->name('staff-mark-program-complee');
});

// Admin Routes
// Route::middleware(['auth:sanctum', 'verified','auth.admin'])->group(function () {

//Program Module
//Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'AdminDashboard'])->name('admin-dashboard');

// Program Module
Route::get('/admin/view/program', [AdminProgramController::class, 'index'])->name('admin-program-dashboard');
Route::get('/admin/view/program/{id}', [AdminProgramController::class, 'show_pending'])->name('admin-view-approved-program');
Route::put('/admin/view/program/{id}', [AdminProgramController::class, 'show_approved'])->name('admin-view-pending-program');

// Support Module
Route::get('/admin/view/support', [AdminSupportController::class, 'index'])->name('admin-support-dashboard');
Route::get('/admin/view/support/{id}', [AdminSupportController::class, 'show'])->name('admin-view-specific-support');
Route::put('/admin/update/support/{id}', [AdminSupportController::class, 'update'])->name('admin-update-specific-support');
Route::get('/admin/edit/support/{id}', [AdminSupportController::class, 'edit'])->name('admin-edit-specific-support');


// User Management Module
Route::get('/admin/view/user', [AdminUserManagementController::class, 'index'])->name('admin-management-dashboard');
Route::get('/admin/create/staff', [AdminUserManagementController::class, 'create'])->name('admin-create-staff-page');
Route::post('/admin/create/staff', [AdminUserManagementController::class, 'store'])->name('admin-create-a-staff');
Route::get('/admin/view/user/{id}', [AdminUserManagementController::class, 'show'])->name('admin-view-specific-user');

// Department Module
Route::get('/admin/view/department', [AdminDepartmentController::class, 'index'])->name('admin-department-dashboard');
Route::get('/admin/create/department', [AdminDepartmentController::class, 'create'])->name('admin-create-department-page');
Route::post('/admin/create/department', [AdminDepartmentController::class, 'store'])->name('admin-create-a-department');
Route::get('/admin/view/department/{id}', [AdminDepartmentController::class, 'show'])->name('admin-view-specific-department');
Route::get('/admin/edit/department/{id}', [AdminDepartmentController::class, 'edit'])->name('admin-edit-specific-department');
Route::put('/admin/update/department/{id}', [AdminDepartmentController::class, 'update'])->name('admin-update-specific-department');
Route::delete('/admin/delete/department/{id}', [AdminDepartmentController::class, 'delete'])->name('admin-delete-specific-department');

//View Specific Program
Route::get('/admin/view/program/{program}', [ProgramController::class, 'AdminViewSpecificProgram'])->name('admin-view-specific-program');

//Approve Specific Program
Route::put('/admin/view/program/{id}', [ProgramController::class, 'AdminApprovedProgram'])->name('admin-approve-a-program');

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

// Staff and Admin CRUD for Material
Route::get('/staff/program/material', [TrainingMaterialController::class, 'index'])->name('staff-program-material');
Route::get('/staff/program/material', [TrainingMaterialController::class, 'view_material'])->name('staff-program-view-material');
