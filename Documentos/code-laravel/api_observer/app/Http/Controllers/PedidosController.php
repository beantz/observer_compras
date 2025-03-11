<?php

namespace App\Http\Controllers;

use App\Http\Repository\PedidosRepository;
use App\Http\Requests\validationPedidos;
use App\Models\Items;
use Illuminate\Http\Request;
use App\Models\Pedidos;

class PedidosController extends Controller
{
    protected $pedidosRepository;

    public function __construct(PedidosRepository $pedidosRepository)
    {
        $this->pedidosRepository = $pedidosRepository;
    }

    public function index() {
        
        $pedidos = $this->pedidosRepository->index();

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Todos os Pedidos',
                'pedidos' => $pedidos
            ]
        ]);
    }

    public function store(validationPedidos $request) {
        
        $pedido = $this->pedidosRepository->store($request);

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Pedido criado com sucesso, insira itens ao seu pedido',
                'pedido' => $pedido
            ]
        ]);

    }

    public function show($id) {
        
        $pedido = $this->pedidosRepository->show($id);

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

        $pedido = $this->pedidosRepository->show($id);

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

        $pedido = $this->pedidosRepository->show($id);

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
