<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisterCollaboratorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MrecordController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\RegisterPatientController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Middleware\Autenticador;
use App\Http\Middleware\AutenticadorPaciente;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home.index');
})->name('home.index');

Route::post('/login', [loginController::class, 'store'])->name('login.store');

// Rota do Paciente 
Route::get('/patient/{id}', [PatientController::class, 'show'])
    ->name('patient.show')->middleware(AutenticadorPaciente::class);

// Rotas do Admin
Route::get('/register-colaborador', [RegisterCollaboratorController::class, 'create'])
    ->name('registerCollaborator.create')->middleware(Autenticador::class);

Route::post('/register-colaborador', [RegisterCollaboratorController::class, 'store'])
    ->name('registerCollaborator.store')->middleware(Autenticador::class);

Route::get('/agendamento', function () {
    return view('schedule.index');
});

// Rotas do Colaborador
Route::get('/registrar-paciente', [RegisterPatientController::class, 'create'])
    ->name('registerPatient.create')
    ->middleware(Autenticador::class);

Route::post('/registrar-paciente', [RegisterPatientController::class, 'store'])
    ->name('registerPatient.store')
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

Route::resource('procedimentos', ProcedimentoController::class)
    ->middleware(Autenticador::class)->except(['index', 'show', 'edit', 'create']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::get('/consultas/{paciente_id}', [ConsultaController::class, 'index'])
    ->name('consultas.index')->middleware(Autenticador::class)->middleware(Autenticador::class);
Route::resource('financeiro', FinanceiroController::class)->middleware(Autenticador::class);
Route::resource('consultas', ConsultaController::class)->except('index')->middleware(Autenticador::class);
Route::resource('prontuario', MrecordController::class)->middleware(Autenticador::class);