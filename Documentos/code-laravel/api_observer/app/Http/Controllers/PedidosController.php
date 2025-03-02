<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use App\Models\Pedidos;

class PedidosController extends Controller
{
    public function index() {
        
        $pedidos = Pedidos::all();

        return response()->json([
            'success' => true,
            'message' => 'Todos os Pedidos',
            'pedidos' => $pedidos
        ]);
    }

    public function store(Request $request) {
        
        $pedido = Pedidos::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pedido criado com sucesso, insira itens ao seu pedido',
            'pedido' => $pedido
        ]);
    }
}
