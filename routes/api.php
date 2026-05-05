<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntregaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('criarEntregas',[EntregaController::class,'criarEntregas'])->name('criarEntregas');

Route::get('listarEntregas',[EntregaController::class,'listarEntregas'])->name('listarEntregas');

Route::post('atualizarEntregas',[EntregaController::class,'atualizarEntregas'])->name('atualizarEntregas');

Route::delete('deletarEntrega',[EntregaController::class,'deletarEntrega'])->name('deletarEntrega');
