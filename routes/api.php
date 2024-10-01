<?php

use App\Http\Controllers\api\V1\UserController;
use App\Http\Controllers\api\V1\AgendamentoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
  //  return $request->user();
//})->middleware('auth:sanctum');

Route::prefix('v1')->group(function() {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    
});

Route::prefix('v1')->group(function() {
  Route::get('/agendamento', [AgendamentoController::class, 'index']);
  Route::get('/agendamento/{id}', [AgendamentoController::class, 'show']);
  
});
