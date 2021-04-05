<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminProgramController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/test', function () {
    return view('test');
})->name('dashboard');


Route::put('/Admin/programs/{program}', [AdminProgramController::class, 'update']);

// Route::put('Admin/programs/pending/{program}', [AdminProgramController::class, 'update']);

// Route::put('Admin/programs/approved/{program}', [AdminProgramController::class, 'edit']);

Route::post('Staff/create_program', [ProgramController::class, 'store']);

Route::post('/approve_program', [AdminProgramController::class, 'store']);

Route::get('Staff/create_program', function () {
    return view('Staff.create_program');
});

Route::get('Admin/view_program', [AdminProgramController::class, 'index']);

Route::get('Admin/programs/{program}', [AdminProgramController::class, 'show']);

