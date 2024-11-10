<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisterCollaboratorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\RegisterPatientController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home.index');
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
    ->name('patient.show')->middleware(Autenticador::class);

// Rotas do Admin
Route::get('/register-colaborador', [RegisterCollaboratorController::class, 'create'])
    ->name('registerCollaborator.create')->middleware(Autenticador::class);

Route::post('/register-colaborador', [RegisterCollaboratorController::class, 'store'])
    ->name('registerCollaborator.store');

Route::get('/agendamento', function () {
    return view('schedule.index');
});

// Rotas do Colaborador
Route::get('/registrar-paciente', [RegisterPatientController::class, 'index'])
    ->name('registerPatient.index')
    ->middleware(Autenticador::class);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index')
    ->middleware(Autenticador::class);


Route::resource('agendamento', CalendarController::class)->middleware(Autenticador::class);
Route::get('/events', [EventController::class, 'getEvents']);


Route::resource('products', ProductController::class)
    ->middleware(Autenticador::class);

Route::post('/estoque/incrementar/{id}', [ProductController::class, 'incrementar'])->name('estoque.incrementar');
Route::post('/estoque/decrementar/{id}', [ProductController::class, 'decrementar'])->name('estoque.decrementar');

Route::get('/profile/{id}', [ProfileController::class, 'show'])
    ->name('profile.show')->middleware(Autenticador::class);

Route::get('/registros', [RegistroController::class, 'index'])
    ->name('registro.index')
    ->middleware(Autenticador::class);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
