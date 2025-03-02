<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->apiResource('/usuario', UserController::class);

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('api')->prefix('/Items')->group( function() {
    Route::get('/Disponiveis', [ItemsController::class, 'index'])->name('todos.itens');
    Route::post('/Cadastrar', [ItemsController::class, 'store'])->name('cadastrar.itens');
    Route::get('/Visualizar/{id}', [ItemsController::class, 'show'])->name('visualizar.item');
    Route::put('/Atualizar/{id}', [ItemsController::class, 'update'])->name('atualizar.item');
    Route::delete('/Deletar/{id}', [ItemsController::class, 'destroy'])->name('deletar.item');
});

Route::middleware('api')->prefix('/Pedidos')->group( function() {
    Route::get('/Realizados', [PedidosController::class, 'index'])->name('todos.pedidos');
    Route::post('/Criar', [PedidosController::class, 'store'])->name('criar.pedidos');

});