<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisterCollaboratorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\RegisterPatientController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    ->name('patient.show');
// ->middleware(Autenticador::class);

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
})->name('dashboard.index')
    ->middleware(Autenticador::class);

// Route::get('/agendamento', [CalendarController::class, 'index'])
// ->name('schedule.index')
// ->middleware(Autenticador::class);

Route::resource('agendamento', CalendarController::class)->middleware(Autenticador::class);
Route::get('/events', [EventController::class, 'getEvents']);

// Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::resource('products', ProductController::class)
    ->middleware(Autenticador::class);

Route::post('/estoque/incrementar/{id}', [ProductController::class, 'incrementar'])->name('estoque.incrementar');
Route::post('/estoque/decrementar/{id}', [ProductController::class, 'decrementar'])->name('estoque.decrementar');
// Route::resource('/products', ProductController::class)
// ->only(['index', 'create']);
// ->middleware(Autenticador::class);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
