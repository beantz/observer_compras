<?php

namespace App\Http\Controllers;

use App\Events\PedidoConcluidoEvent;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function concluir($idPedido) {
        $pedido = Pedido::find($idPedido);

        if(!$pedido){
            return response()->json(['message' => 'Pedido não encontrado'], 404);
        }

        event(new PedidoConcluidoEvent($pedido));

        return response()->json(['message' =>
            'Pedido concluído e observadores notificados'
        ]);
    }
}
