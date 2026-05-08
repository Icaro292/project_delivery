<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntregaPageController;
use Illuminate\Support\Facades\Route;

// Rotas de visitante. Quem ja ta logado nao precisa ver login/cadastro.
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/cadastro', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/cadastro', [AuthController::class, 'register'])->name('register.store');
});

// Daqui pra baixo precisa estar logado, se nao o Laravel manda pro /login.
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Tela inicial muda o conteudo conforme o nivel do usuario.
    Route::get('/', [EntregaPageController::class, 'home'])->name('home');

    // Comercio cria corrida por aqui.
    Route::get('/entregas/cadastrar', [EntregaPageController::class, 'criar'])->name('entregas.cadastrar');
    Route::post('/entregas', [EntregaPageController::class, 'store'])->name('entregas.store');

    // Historico mostra faturamento e corridas filtradas por usuario.
    Route::get('/entregas/historico', [EntregaPageController::class, 'historico'])->name('entregas.historico');

    // Rotas antigas sem id. Deixa redirecionando pra nao dar erro feio.
    Route::redirect('/entregas/editar', '/');
    Route::redirect('/entregas/detalhes', '/');

    // Detalhe da corrida e acoes do fluxo.
    Route::get('/entregas/{entrega}', [EntregaPageController::class, 'detalhes'])->name('entregas.detalhes');
    Route::post('/entregas/{entrega}/aceitar', [EntregaPageController::class, 'aceitar'])->name('entregas.aceitar');
    Route::post('/entregas/{entrega}/aceitar-comercio', [EntregaPageController::class, 'aceitarComercio'])->name('entregas.aceitar-comercio');
    Route::post('/entregas/{entrega}/concluir', [EntregaPageController::class, 'concluir'])->name('entregas.concluir');

    // Web usa este nome pra nao bater com a rota api/entregas/{id}.
    Route::delete('/entregas/{entrega}', [EntregaPageController::class, 'excluirOuCancelar'])->name('entregas.excluir-ou-cancelar');
});
