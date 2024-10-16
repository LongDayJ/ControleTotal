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

Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::post('/login', [loginController::class, 'store'])->name('login.store');


Route::get('/equipe', function () {
    return view('team.index');
});

// Rota do Paciente 
Route::get('/patient/{id}', [PatientController::class, 'show'])
->name('patient.show')
->middleware(Autenticador::class);

// Rotas do Admin
Route::get('/register-colaborador', [RegisterCollaboratorController::class, 'create'])
    ->name('registerCollaborator.create');
// ->middleware(Autenticador::class);
Route::post('/register-colaborador', [RegisterCollaboratorController::class, 'store'])
    ->name('registerCollaborator.store');

// Rotas do Colaborador + Admin
Route::get('/registrar-paciente', [RegisterPatientController::class, 'index'])
->name('registerPatient.index')
->middleware(Autenticador::class);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})
->middleware(Autenticador::class);

Route::get('/agendamento', [CalendarController::class, 'index'])
->name('schedule.index')
->middleware(Autenticador::class);

// Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::resource('products', ProductController::class)
->middleware(Autenticador::class);

// Route::resource('/products', ProductController::class)
// ->only(['index', 'create']);
// ->middleware(Autenticador::class);