<?php

namespace App\Observers;

use App\Events\PedidoConcluidoEvent;
use App\Models\EventLog;

class RegistrarTransaçãoObserver {

    public function handle(PedidoConcluidoEvent $event) {

        $log = new EventLog([
            'tipo-evento' => 'Pedido Concluido',
            'pedido_id' => $event->pedido->id,
            'descricao' => 'Transação financeira ocorreu com sucesso: Pedido' . $event->pedido->id
        ]);

        $log->save();
        
    }

}