<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Employees\LoginController as EmployeesLoginController;

// Routes for guest users
// Routes for guest users
Route::middleware('guest')->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('home');
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}/profile', [EmployeeController::class, 'profile'])->name('employees.profile');
    Route::get('/auth/google', [EmployeesLoginController::class, 'redirectToGoogle']);
    Route::get('/auth/google/callback', [EmployeesLoginController::class, 'handleGoogleCallback']);
});


// Default authentication routes
Auth::routes();

// Protected routes for managing employees
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Menampilkan daftar karyawan
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit'); // Tambahkan rute untuk edit karyawan
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');

    // Route untuk upload foto profil karyawan
    Route::post('/employees/{employee}/upload-photo', [EmployeeController::class, 'uploadPhoto'])->name('employees.upload_photo');
});

// Protected routes for managing admins
Route::middleware('admin')->group(function () {
    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::get('/admins/{id}/show', [AdminController::class, 'show'])->name('admins.show');
    Route::delete('/admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
});

// Route untuk logout
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout'); // Menggunakan alias yang telah diberikan
