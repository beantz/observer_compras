<?php

use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PedidosItensController;
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
    Route::post('/Criar', [PedidosController::class, 'store'])->name('criar.pedido');
    Route::get('/Visualizar/{id}', [PedidosController::class, 'show'])->name('visualizar.pedido');
    Route::put('/Atualizar/{id}', [PedidosController::class, 'update'])->name('atualizar.pedido');
    Route::delete('/Deletar/{id}', [PedidosController::class, 'destroy'])->name('deletar.pedido');

    //inserir itens nos pedidos
    Route::post('/AdicionarItens/{id}', [PedidosItensController::class, 'store'])->name('inserir.itens');
    Route::put('/AtualizarItens/{id_pedido}/{id_item}', [PedidosItensController::class, 'update'])->name('atualizar.itens');
    Route::delete('/DeletarItens/{id}', [PedidosItensController::class, 'destroy'])->name('deletar.itens');
});