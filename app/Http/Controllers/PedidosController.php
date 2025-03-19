<?php

namespace App\Http\Controllers;

use App\Adapter\EmailAdapter;
use App\Events\notifyEmail;
use App\Http\Repository\PedidosRepository;
use App\Http\Requests\validationPedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    protected $pedidosRepository;
    protected $emailAdapter;

    public function __construct(PedidosRepository $pedidosRepository, EmailAdapter $emailAdapter)
    {
        $this->pedidosRepository = $pedidosRepository;
        $this->emailAdapter = $emailAdapter;
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

        //chamar observer para o envio de e-mails após pedido concluido
        event(new notifyEmail($pedido, $this->emailAdapter));

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
