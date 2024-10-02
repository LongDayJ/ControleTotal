<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisterCollaboratorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\RegisterPatientController;
use App\Http\Middleware\Autenticador;
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

Route::resource('/products', ProductController::class)
    ->only(['index', 'create'])->middleware(Autenticador::class);

Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::post('/login', [loginController::class, 'store'])->name('login.store');

Route::get('/registrar-paciente', [RegisterPatientController::class, 'index'])
    ->name('registerPatient.index')->middleware(Autenticador::class);


Route::get(
    '/register-colaborador',
    [RegisterCollaboratorController::class, 'index']
)->name('registerCollaborator.index');
// ->middleware(Autenticador::class);

Route::get('/equipe', function () {
    return view('team.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(Autenticador::class);

Route::get('/agendamento', [CalendarController::class, 'index'])
    ->name('schedule.index')->middleware(Autenticador::class);
