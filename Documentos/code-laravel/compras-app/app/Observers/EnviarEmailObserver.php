<?php

namespace App\Observers;

use App\Events\PedidoConcluidoEvent;
use App\Models\EventLog;

class EnviarEmailObserver {

    public function handle(PedidoConcluidoEvent $event) {

        $log = new EventLog([
            'tipo-evento' => 'Pedido Concluido',
            'pedido_id' => $event->pedido->id,
            'descricao' => 'Email enviado ao cliente: Pedido' . $event->pedido->id
        ]);

        $log->save();
        
    }

}