<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisterCollaboratorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\RegisterPatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/agendamento', function () {
    return view('schedule.index');
});

// Route::get('/patients/{id}', function ($patient) {
//     return view('patient.show', ['id' => $patient]);
// });

Route::get('/patient/{id}', [PatientController::class, 'show'])->name('patient.show');

Route::resource('/products', ProductController::class)->only(['index', 'create']);

Route::get('/login', [loginController::class, 'index'])->name('login.index');

Route::get('/registrar-paciente', [RegisterPatientController::class, 'index'])->name('registerPatient.index');
Route::get('/register-colaborador', [RegisterCollaboratorController::class, 'index'])->name('registerCollaborator.index');

Route::get('/equipe', function () {
    return view('team.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/agendamento', [CalendarController::class, 'index'])->name('schedule.index');
Route::get('/agendamento/semana', [CalendarController::class, 'semana'])->name('schedule.week');