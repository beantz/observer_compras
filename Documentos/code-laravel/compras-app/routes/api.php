<?php

use App\Http\Controllers\PedidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/pedido/{pedido_id}', [PedidoController::class, 'concluir']);
