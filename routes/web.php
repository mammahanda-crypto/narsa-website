<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\logtController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes (Guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Protected Routes (Auth)
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [EmployeeController::class, 'index'])->name('dashboard');

    // Congés
    Route::get('/gestion-conges', [CongeController::class, 'index'])->name('employees.conge');
    Route::post('/gestion-conges/store', [CongeController::class, 'store'])->name('conges.store');
    Route::get('/conge/imprimer/{id}', [CongeController::class, 'imprimerDecision'])->name('conges.imprimer');

    // Documents
    Route::get('/print-documents', function () {
        return view('print.documents');
    })->name('print.documents');
    Route::get('/documents', [DocumentController::class, 'index']);

    // Employee & Attestations (المسارات المهمة)
    Route::get('/employees/{id}/attestation', [EmployeeController::class, 'showAttestation'])->name('employees.attestation');
    Route::get('/employees/{employee}/attestation-ar', [EmployeeController::class, 'showAttestation'])->name('employees.attestationAr');
    
    Route::resource('employees', EmployeeController::class);

    // Profile
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');
    
        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');
    
        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');
    
    });

    Route::middleware(['auth'])->group(function () {
        Route::put('/password', [PasswordController::class, 'update'])
            ->name('password.update');
    });

    // Email Verification
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    // L-group dyal les routes dyal les documents
    Route::controller(logtController::class)->group(function () {
        
        Route::get('/documents', 'index')->name('documents.index');
        
        // Formulaires (Create/Edit)
        Route::get('/documents/create', 'create')->name('documents.create');
        Route::get('/documents/{id}/edit', 'edit')->name('documents.edit');
        
        // Actions (POST/PUT/DELETE)
        Route::post('/documents/store', 'store')->name('documents.store');
        Route::put('/documents/update/{id}', 'update')->name('documents.update');
        Route::delete('/documents/delete/{id}', 'destroy')->name('documents.destroy');
    });
    });
    
    