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
Route::get('/patient/{id}', [PatientController::class, 'show'])->name('patient.show');

// Rotas do Admin
Route::get(
    '/register-colaborador',
    [RegisterCollaboratorController::class, 'create']
    )->name('registerCollaborator.create');
    // ->middleware(Autenticador::class);

// Rotas do Colaborador + Admin
Route::get('/registrar-paciente', [RegisterPatientController::class, 'index'])
->name('registerPatient.index');
// ->middleware(Autenticador::class);

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
// ->middleware(Autenticador::class);

Route::get('/agendamento', [CalendarController::class, 'index'])
->name('schedule.index');
// ->middleware(Autenticador::class);

Route::get('/products', [ProductController::class, 'index'])->name('product.index');

Route::get('/events', [CalendarController::class,'getEvents']);
Route::delete('/schedule/{id}',[CalendarController::class,'deleteEvent']);
Route::put('/schedule/{id}',[CalendarController::class, 'atualizar']);
Route::put('/schedule/{id}/resize', [CalendarController::class, 'resize']);

Route::get('/events/search', [CalendarController::class, 'search']);

Route::view('add-schedule', 'schedule.add');
Route::post('create-schedule', [CalendarController::class, 'criar']);
// Route::resource('/products', ProductController::class)
// ->only(['index', 'create']);
// ->middleware(Autenticador::class);