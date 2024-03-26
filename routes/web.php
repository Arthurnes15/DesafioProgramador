<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
// Rota principal, leva para a verificação dos arquivos cadastrados:
Route::get('/', [CrudController::class, 'main']);

// Rota leva para o formulário de criação dos ativos:
Route::get('/crud/create', [CrudController::class, 'create']);

// Rota que realiza o armazenamento de dados inseridos no formulário de criação dos ativos; dentro do banco de dados :
Route::post('/crud', [CrudController::class, 'store']);

// Rota de exclusão dos dados dos ativos registrados no banco de dados:
Route::delete('/crud/{id}', [CrudController::class, 'destroy']);

// Rota que leva para o formulário de edição dos ativos registrados:
Route::get('/crud/edit/{id}', [CrudController::class, 'edit']);

// Rota para a função que atualiza os dados do formulário de edição dos ativos; no banco de dados:
Route::put('/crud/update/{id}', [CrudController::class, 'update']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
