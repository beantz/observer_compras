<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index() {

        $itens = Items::all();

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Itens Disponíveis',
                'itens' => $itens
            ]
        ], 201);
        
    }

    public function store(Request $request) {

        $item = Items::create($request->all());

        //fazer validação

        return response()->json([
            'data' => [
                'success' => true,
                'message' => 'Item Cadastrado com sucesso',
                'item' => $item
            ]
        ], 201);

    }

    public function show($id) {

        $item = Items::find($id);

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

        $item = Items::find($id);

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

        $item = Items::find($id);

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
