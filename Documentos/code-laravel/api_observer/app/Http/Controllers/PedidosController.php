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
            'data' => [
                'success' => true,
                'message' => 'Todos os Pedidos',
                'pedidos' => $pedidos
            ]
        ]);
    }

    public function store(Request $request) {
        
        $pedido = Pedidos::create($request->all());

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Pedido criado com sucesso, insira itens ao seu pedido',
                'pedido' => $pedido
            ]
        ]);
    }

    public function show($id) {
        
        $pedido = Pedidos::find($id);

        if(!$pedido) {
            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => "Pedido de id: $id não encontrado",
                    'pedido' => $pedido
                ]
            ]);
        }

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Aqui está o pedido solicitado',
                'pedido' => $pedido
            ]
        ]);
    }

    public function update(Request $request, $id) {

        $pedido = Pedidos::find($id);

        if(!$pedido) {
            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => "Pedido de id: $id não encontrado",
                    'pedido' => $pedido
                ]
            ]);
        }

        $pedido->update($request->all());

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Aqui está o pedido atualizado',
                'pedido' => $pedido
            ]
        ]);

    }

    public function destroy($id) {

        $pedido = Pedidos::find($id);

        if(!$pedido) {

            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => "Item de id: $id Não encontrado",
                    'pedido' => $pedido
                ]
            ], 201);

        }

        $pedido->delete();

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Pedido Deletado com sucesso',
                'pedido' => $pedido
            ]
        ], 201);

    }
}
