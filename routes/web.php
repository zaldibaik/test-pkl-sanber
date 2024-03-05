<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Employees\LoginController as EmployeesLoginController;

// Routes for guest users
// Routes for guest users
Route::middleware('guest')->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('home');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::get('/auth/google', [EmployeesLoginController::class, 'redirectToGoogle']);
    Route::get('/auth/google/callback', [EmployeesLoginController::class, 'handleGoogleCallback']);


    // Keluarga
    Route::get('/keluarga/create', [KeluargaController::class, 'create'])->name('keluarga.create');
});

// Default authentication routes
Auth::routes();

// Protected routes for managing employees
Route::middleware('auth')->group(function () {


    // Keluarga index
    Route::get('/keluarga', [KeluargaController::class, 'index'])->name('keluarga.index');
    Route::post('/keluarga', [KeluargaController::class, 'store'])->name('keluarga.store');
    Route::get('/keluarga/{id}/edit', [KeluargaController::class, 'edit'])->name('keluarga.edit');
    Route::put('/keluarga/{id}', [KeluargaController::class, 'update'])->name('keluarga.update');
    Route::get('/keluarga/{id}', [KeluargaController::class, 'show'])->name('keluarga.show');
    Route::delete('/keluarga/{id}', [KeluargaController::class, 'destroy'])->name('keluarga.destroy');

    // Menampilkan daftar karyawan

    // Route untuk upload foto profil karyawan
});

// Protected routes for managing admins and guests
Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::get('/admins/{id}/show', [AdminController::class, 'show'])->name('admins.show');
    Route::delete('/admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');

    //karyawan
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}/profile', [EmployeeController::class, 'profile'])->name('employees.profile');
    Route::get('/employees/{employee}/show', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::post('/employees/{employee}/upload-photo', [EmployeeController::class, 'uploadPhoto'])->name('employees.upload_photo');
});

// Route untuk logout
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');
