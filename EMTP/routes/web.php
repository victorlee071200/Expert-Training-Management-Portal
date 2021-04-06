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

    Route::get('/dashboard', [DashboardController::class, 'show'])->name('client-dashboard');
    Route::get('/home', [HomepageController::class, 'show'])->name('client-home');
    Route::get('/program', [HomepageController::class, 'show'])->name('client-program');
    Route::get('/about-us', [AboutUsController::class, 'show'])->name('aboutus');
    Route::get('/support', [SupportController::class, 'show'])->name('support');

    
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard.index');
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
//     return view('homepage.index');
// })->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/program', function () {
//     return view('program.index');
// })->name('program');

// Route::middleware(['auth:sanctum', 'verified'])->get('/aboutus', function () {
//     return view('aboutus');
// })->name('aboutus');

// Route::middleware(['auth:sanctum', 'verified'])->get('/support', function () {
//     return view('support');
// })->name('support');


//Admin Routes

// Route::put('Admin/programs/pending/{program}', [AdminProgramController::class, 'update']);

// Route::put('Admin/programs/approved/{program}', [AdminProgramController::class, 'edit']);

Route::get('Admin/view_program', [AdminProgramController::class, 'index']);

Route::get('Admin/programs/{program}', [AdminProgramController::class, 'show']);

Route::put('/Admin/programs/{program}', [AdminProgramController::class, 'update']);

//Client Routes
Route::get('Client/allprogram', [ProgramController::class, 'programindex']);

Route::get('Client/programs/{program}', [ProgramController::class, 'client_showprogram']);

Route::get('Client/programs/{program}/register', [ProgramController::class, 'register']);

Route::post('Client/programs/{program}/register', [ProgramController::class, 'client_store']);

Route::get('Client/program_detail', [ClientProgramController::class, 'index']);

Route::get('Client/program_detail/{registeredprogram}/{program}', [ClientProgramController::class, 'show']);

//Staff Routes
Route::get('Staff/create_program', function () {
    return view('Staff.create_program');
});

Route::post('Staff/create_program', [ProgramController::class, 'store']);

Route::get('/test', function(){
    return view('admin.dashboard.index');
});