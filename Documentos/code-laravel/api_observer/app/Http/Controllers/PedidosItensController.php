<?php

namespace App\Http\Controllers;

use App\Http\Repository\PedidosRepository;
use App\Http\Requests\validationPedidosItens;

class PedidosItensController extends Controller
{

    protected $pedidoRepository;

    public function __construct(PedidosRepository $pedidoRepository)
    {
        $this->pedidoRepository = $pedidoRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(validationPedidosItens $request, $id)
    {
        //validação
        $request->validated();

        $pedido = $this->pedidoRepository->show($id);

        $pedido->itens()->attach($request->get('itens_id'));

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Item adicionado com sucesso',
                'pedido' => $pedido
            ]
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PedidosItensController $pedidosItensController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PedidosItensController $pedidosItensController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(validationPedidosItens $request, $id_pedido, $id_item)
    {
        $pedido = $this->pedidoRepository->show($id_pedido);

        if(!$pedido) {
            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => "Item de id: $id_pedido não encontrado",
                ]
            ]);
        }

        //metodo para atualizar um dado na tabelo do relacionamento
        $pedido->itens()->updateExistingPivot($id_item, ['itens_id' => $request->get('itens_id')]);

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Item Atualizado com sucesso',
                'pedido' => $pedido
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PedidosItensController $pedidosItensController, $id_pedido, $id_item)
    {
        $pedido = $this->pedidoRepository->show($id_pedido);

        if(!$pedido) {
            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => "Item de id: $id_pedido não encontrado",
                ]
            ]);
        }

        $pedido->itens()->detach($id_item);

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Item excluido com sucesso',
                'pedido' => $pedido
            ]
        ]);
    }
}
