<?php

namespace App\Observers;

use App\Events\PedidoConcluidoEvent;
use App\Models\EventLog;

class AtualizarEstoqueObserver {

    public function handle(PedidoConcluidoEvent $event) {

        $log = new EventLog([
            'tipo-evento' => 'Pedido Concluido',
            'pedido_id' => $event->pedido->id,
            'descricao' => 'Estoque atualizado com sucesso: Pedido' . $event->pedido->id
        ]);

        $log->save();
        
    }

}