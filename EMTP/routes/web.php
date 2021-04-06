<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/program', function () {
    return view('program');
})->name('program');

Route::middleware(['auth:sanctum', 'verified'])->get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::middleware(['auth:sanctum', 'verified'])->get('/support', function () {
    return view('support');
})->name('support');


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