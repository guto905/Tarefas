<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth.tarefas'])->group(function () {
    // Rotas para tarefas
    Route::get('/tarefas', 'TarefaController@index');
    Route::post('/tarefas', 'TarefaController@store');
    Route::get('/tarefas/{id}', 'TarefaController@show');
    Route::put('/tarefas/{id}', 'TarefaController@update');
    Route::delete('/tarefas/{id}', 'TarefaController@destroy');
});


