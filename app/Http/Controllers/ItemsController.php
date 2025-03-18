<?php

namespace App\Http\Controllers;

use App\Http\Repository\ItemsRepository;
use App\Http\Requests\validationItens;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    protected $itemsRepository;

    public function __construct(ItemsRepository $itemsRepository)
    {
        $this->itemsRepository = $itemsRepository;
    }

    public function index() {

        $itens = $this->itemsRepository->index();

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Itens Disponíveis',
                'itens' => $itens
            ]
        ], 201);
        
    }

    public function store(validationItens $request) {

        $item = $this->itemsRepository->store($request);

        //fazer validação
        $request->validated();

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Item Cadastrado com sucesso',
                'item' => $item
            ]
        ], 201);

    }

    public function show($id) {

        $item = $this->itemsRepository->show($id);

        if(!$item) {

            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => 'Item Não encontrado',
                    'item' => $item
                ]
            ], 201);

        }

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Item Disponível',
                'item' => $item
            ]
        ], 201);

    }

    public function update(Request $request, $id) {

        $item = $this->itemsRepository->show($id);

        if(!$item) {

            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => "Item de id: $id Não encontrado",
                    'item' => $item
                ]
            ], 201);

        }

        $item->update($request->all());

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Item Atualizado',
                'item' => $item
            ]
        ], 201);

    }

    public function destroy($id) {

        $item = $this->itemsRepository->show($id);

        if(!$item) {

            return response()->json([
                'data' => [
                    'success' => false,
                    'message' => "Item de id: $id Não encontrado",
                    'item' => $item
                ]
            ], 201);

        }

        $item->delete();

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Item Deletado com sucesso',
                'item' => $item
            ]
        ], 201);

    }
}
