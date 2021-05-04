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
    Route::get('/client/dashboard', [DashboardController::class, 'ClientDashboard'])->name('client-dashboard');
    Route::get('/home', [HomepageController::class, 'index'])->name('client-home');
    Route::get('/client/view/program', [ClientProgramController::class, 'index'])->name('client-program-dashboard');
    Route::get('/client/view/program/{id}', [ClientProgramController::class, 'show'])->name('client-view-specific-program');
    Route::get('/client/view/program/{program}', [ProgramController::class, 'ClientViewSpecificProgram']);
    Route::get('/client/view/program/{program}/register', [ProgramController::class, 'ClientRegisterProgram']);
    Route::post('/client/view/program/{program}/register', [ProgramController::class, 'ClientStoreProgram']);
    Route::get('/client/view/registered', [ProgramController::class, 'ClientViewRegisteredProgram']);
    Route::get('/client/view/registered/{registeredprogram}/{program}/edit', [ProgramController::class, 'ClientEditSpecificRegisteredProgramDetail'])->name('client-program-edit');
    Route::post('/client/view/registered/{registeredprogram}/{program}/edit', [ProgramController::class, 'ClientSaveRegisteredProgram']);
    Route::get('/registered/{registeredprogram}/confirm', [ProgramController::class, 'ClientConfirmProgram'])->name('client-program-confirm');
    Route::get('/client/view/registered/{registeredprogram}/{program}/detail', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramDetail'])->name('client-program-detail');
    Route::get('/client/registered/{registeredprogram}/{program}/announcement', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramAnnouncement'])->name('client-program-announcement');
    Route::get('/client/registered/{registeredprogram}/{program}/material', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramMaterial'])->name('client-program-material');
    Route::get('/client/registered/{registeredprogram}/{program}/material/{trainingMaterial}', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramMaterialView'])->name('client-program-material-view');
    Route::get('/client/registered/{registeredprogram}/{program}/feedback', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramFeedback'])->name('client-program-feedback');
    Route::get('/about-us', [AboutUsController::class, 'index'])->name('about-us');
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
    Route::get('/staff/dashboard', [DashboardController::class, 'StaffDashboard'])->name('staff-dashboard');
    Route::get('/staff/view/program', [StaffProgramController::class, 'index'])->name('staff-program-dashboard');
    Route::get('/staff/create/program', [ProgramController::class, 'StaffCreateProgram'])->name('staff-create-program');
    Route::get('/staff/create/program', [ProgramController::class, 'StaffCreateProgram'])->name('staff-create-program');
    Route::post('/staff/create/program', [ProgramController::class, 'StaffRegisterProgram'])->name('staff-register-program');
    Route::get('/staff/view/pendings', [ProgramController::class, 'StaffViewPendingProgram'])->name('staff-view-programs');
    Route::get('/staff/view/pendings/{program}/{clientprogram}', [ProgramController::class, 'StaffViewSpecificPendingProgram'])->name('staff-view-specific');
    Route::get('/{clientprogram}/{id}/approve', [ProgramController::class, 'StaffApproveSpecificPendingProgram'])->name('staff-approve-specific');
    Route::get('/staffpending/view/{user}/{clientprogram}', [ProgramController::class, 'StaffViewSpecificProgram'])->name('staff-view-specific-incharge');
    Route::get('/approved/{clientprogram}/completed', [ProgramController::class, 'StaffMarkProgramComplete'])->name('staff-mark-program-complete');
    Route::get('/staff/view/{assignedprogram}/{program}/detail', [StaffProgramController::class, 'StaffViewSpecificProgramDetail'])->name('staff-program-detail');
    Route::get('/staff/view/{assignedprogram}/{program}/announcement', [StaffProgramController::class, 'StaffViewSpecificProgramAnnouncement'])->name('staff-program-announcement');
    Route::get('/staff/view/{assignedprogram}/{program}/material', [StaffProgramController::class, 'StaffViewSpecificProgramMaterial'])->name('staff-program-material');
    Route::get('/staff/view/{assignedprogram}/{program}/material/{trainingMaterial}', [StaffProgramController::class, 'StaffViewSpecificProgramMaterialView'])->name('staff-program-material-view');
    Route::get('/staff/material/create', [StaffProgramController::class, 'StaffCreateMaterial'])->name('staff-program-material-create');
    Route::get('/staff/view/{assignedprogram}/{program}/feedback', [StaffProgramController::class, 'StaffViewSpecificProgramFeedback'])->name('staff-program-feedback');
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
