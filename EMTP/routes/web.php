<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CheckoutComponent;
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
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\AdminDepartmentController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\AnnouncementController;

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
    Route::get('/client/view/program/{program}', [ProgramController::class, 'ClientViewSpecificProgram']);
    Route::get('/client/view/program/{program}/register', [ProgramController::class, 'ClientRegisterProgram']);
    Route::post('/client/view/program/{program}/register', [ProgramController::class, 'ClientStoreProgram']);
    Route::get('/client/view/registered', [ProgramController::class, 'ClientViewRegisteredProgram']);
    Route::get('/client/view/registered/{registeredprogram}/{program}/edit', [ProgramController::class, 'ClientEditSpecificRegisteredProgramDetail'])->name('client-program-edit');
    Route::post('/client/view/registered/{registeredprogram}/{program}/edit', [ProgramController::class, 'ClientSaveRegisteredProgram']);
    Route::get('/registered/{registeredprogram}/confirm', [ProgramController::class, 'ClientConfirmProgram'])->name('client-program-confirm');

    // client program
    Route::get('/client/view/program', [ClientProgramController::class, 'index'])->name('client-program-dashboard');
    Route::get('/client/view/program/{id}', [ClientProgramController::class, 'show'])->name('client-view-specific-program');
    Route::get('/client/view/registered/{registeredprogram}/{program}/detail', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramDetail'])->name('client-program-detail');
    Route::get('/client/registered/{registeredprogram}/{program}/announcement', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramAnnouncement'])->name('client-program-announcement');
    Route::get('/client/registered/{registeredprogram}/{program}/announcement/{announcement}', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramAnnouncementView'])->name('client-program-announcement-view');
    Route::get('/client/registered/{registeredprogram}/{program}/material', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramMaterial'])->name('client-program-material');
    Route::get('/client/registered/{registeredprogram}/{program}/material/{trainingMaterial}', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramMaterialView'])->name('client-program-material-view');
    Route::get('/client/registered/{registeredprogram}/{program}/feedback', [ClientProgramController::class, 'ClientViewSpecificRegisteredProgramFeedback'])->name('client-program-feedback');

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

    // // Program Module
    // Route::get('/staff/view/program', [StaffProgramController::class, 'index'])->name('staff-program-dashboard');
    // Route::get('/staff/create/program', [ProgramController::class, 'StaffCreateProgram'])->name('staff-create-program');
    // //Create a program
    // Route::get('/staff/create/program', [ProgramController::class, 'StaffCreateProgram'])->name('staff-create-program');
    // //Register a program with button
    // Route::post('/staff/create/program', [ProgramController::class, 'StaffRegisterProgram'])->name('staff-register-program');
    // //View all pending and in charge programs
    // Route::get('/staff/view/pendings', [ProgramController::class, 'StaffViewPendingProgram'])->name('staff-view-programs');
    // //View a specific pending program
    // Route::get('/staff/view/pendings/{program}/{clientprogram}', [ProgramController::class, 'StaffViewSpecificPendingProgram'])->name('staff-view-specific');

    //Approve a specific pending program
    Route::get('/{clientprogram}/{id}/approve', [ProgramController::class, 'StaffApproveSpecificPendingProgram'])->name('staff-approve-specific');

    //View a specific in charge program
    Route::get('/staffpending/view/{user}/{clientprogram}', [ProgramController::class, 'StaffViewSpecificProgram'])->name('staff-view-specific-incharge');

    //Mark a program as completed
    Route::get('/approved/{clientprogram}/completed', [ProgramController::class, 'StaffMarkProgramComplete'])->name('staff-mark-program-complete');

     // staff program
     Route::get('/staff/view/program', [StaffProgramController::class, 'index'])->name('staff-program-dashboard');
     Route::get('/staff/view/program/{id}', [StaffProgramController::class, 'show'])->name('staff-view-specific-program');
     Route::get('/staff/assigned/{assignedprogram}/{program}/detail', [StaffProgramController::class, 'StaffViewSpecificAssignedProgramDetail'])->name('staff-program-detail');
     Route::get('/staff/assigned/{assignedprogram}/{program}/announcement', [StaffProgramController::class, 'StaffViewSpecificAssignedProgramAnnouncement'])->name('staff-program-announcement');
     Route::get('/staff/assigned/{assignedprogram}/{program}/announcement/create', [AnnouncementController::class, 'create'])->name('staff-program-announcement-create');
     Route::post('/staff/assigned/{assignedprogram}/{program}/announcement', [AnnouncementController::class, 'store'])->name('staff-program-announcement');
     Route::put('/staff/assigned/{assignedprogram}/{program}/announcement/{announcement}', [AnnouncementController::class, 'update'])->name('staff-program-announcement-update');
     Route::delete('/staff/assigned/{assignedprogram}/{program}/announcement/{announcement}', [AnnouncementController::class, 'destroy'])->name('staff-program-announcement-delete');
     Route::get('/staff/assigned/{assignedprogram}/{program}/announcement/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('staff-program-announcement-edit');
     Route::get('/staff/assigned/{assignedprogram}/{program}/announcement/{announcement}', [StaffProgramController::class, 'StaffViewSpecificAssignedProgramAnnouncementView'])->name('staff-program-announcement-view');
     Route::get('/staff/assigned/{assignedprogram}/{program}/material', [StaffProgramController::class, 'StaffViewSpecificAssignedProgramMaterial'])->name('staff-program-material');
     Route::get('/staff/assigned/{assignedprogram}/{program}/material/create', [StaffProgramController::class, 'StaffCreateMaterial'])->name('staff-program-material-create');
     Route::get('/staff/assigned/{assignedprogram}/{program}/material/{trainingMaterial}', [StaffProgramController::class, 'StaffViewSpecificAssignedProgramMaterialView'])->name('staff-program-material-view');
     Route::get('/staff/assigned/{assignedprogram}/{program}/feedback', [StaffProgramController::class, 'StaffViewSpecificAssignedProgramFeedback'])->name('staff-program-feedback');
});

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
// Route::get('/admin/view/user', [AdminUserManagementController::class, 'index'])->name('admin-management-dashboard');
// Route::get('/admin/create/staff', [AdminUserManagementController::class, 'create'])->name('admin-create-staff-page');
// Route::post('/admin/create/staff', [AdminUserManagementController::class, 'store'])->name('admin-create-a-staff');
// Route::get('/admin/view/user/{id}', [AdminUserManagementController::class, 'show'])->name('admin-view-specific-user');


// Department Module
// Route::get('/admin/view/department', [AdminDepartmentController::class, 'index'])->name('admin-department-dashboard');
// Route::get('/admin/create/department', [AdminDepartmentController::class, 'create'])->name('admin-create-department-page');
// Route::post('/admin/create/department', [AdminDepartmentController::class, 'store'])->name('admin-create-a-department');
// Route::get('/admin/view/department/{id}', [AdminDepartmentController::class, 'show'])->name('admin-view-specific-department');
// Route::get('/admin/edit/department/{id}', [AdminDepartmentController::class, 'edit'])->name('admin-edit-specific-department');
// Route::put('/admin/update/department/{id}', [AdminDepartmentController::class, 'update'])->name('admin-update-specific-department');
// Route::delete('/admin/delete/department/{id}', [AdminDepartmentController::class, 'delete'])->name('admin-delete-specific-department');

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



// Admin Routes

Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {

    // Admin Dashboard Module
    Route::resource('/dashboard', AdminDashboardController::class);

    // Admin User Management
    Route::resource('/users', AdminUserManagementController::class);

    // Admin Department module
    Route::resource('/department', AdminDepartmentController::class);
});


Route::prefix('staff')->name('staff.')->middleware(['auth:sanctum', 'verified','authstaff'])->group(function () {

    // Admin Dashboard Module
    Route::resource('/dashboard', StaffDashboardController::class);

    // Admin User Management
    Route::resource('/program', StaffProgramController::class);

    //View all pending and in charge programs
    Route::get('/view/pendings', [StaffProgramController::class, 'StaffViewPendingProgram'])->name('staff-view-programs');

    //View a specific pending program
    Route::get('/view/pendings/{program}/{clientprogram}', [ProgramController::class, 'StaffViewSpecificPendingProgram'])->name('staff-view-specific');

    // Admin Department module
    Route::resource('/department', AdminDepartmentController::class);
});



//Staff routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/shop', CheckoutComponent::class);


});








