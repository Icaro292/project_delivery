<?php

use App\Http\Controllers\EntregaController;
use App\Http\Controllers\EntregadorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Endpoint padrao do Laravel/Sanctum pra pegar usuario autenticado via API.
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rotas REST mais organizadas pras entregas.
Route::prefix('entregas')->name('entregas.')->group(function () {
    Route::get('/', [EntregaController::class, 'listarEntregas'])->name('index');
    Route::post('/', [EntregaController::class, 'criarEntregas'])->name('store');
    Route::put('/{id}', [EntregaController::class, 'atualizarEntregas'])->name('update');
    Route::delete('/{id}', [EntregaController::class, 'deletarEntregas'])->name('destroy');
});

// Rotas REST da tabela antiga de entregadores.
Route::prefix('entregadores')->name('entregadores.')->group(function () {
    Route::get('/', [EntregadorController::class, 'listarEntregadores'])->name('index');
    Route::post('/', [EntregadorController::class, 'criaEntregadores'])->name('store');
    Route::put('/{id}', [EntregadorController::class, 'atualizarEntregadores'])->name('update');
    Route::delete('/{id}', [EntregadorController::class, 'deletarEntregadores'])->name('destroy');
});

// Rotas antigas mantidas por compatibilidade, caso alguma tela velha ainda chame esses nomes.
Route::post('criarEntregas', [EntregaController::class, 'criarEntregas'])->name('criarEntregas');
Route::get('listarEntregas', [EntregaController::class, 'listarEntregas'])->name('listarEntregas');
Route::put('atualizarEntregas/{id}', [EntregaController::class, 'atualizarEntregas'])->name('atualizarEntregas');
Route::post('atualizarEntregas/{id}', [EntregaController::class, 'atualizarEntregas'])->name('atualizarEntregasPost');
Route::delete('deletarEntregas/{id}', [EntregaController::class, 'deletarEntregas'])->name('deletarEntregas');
