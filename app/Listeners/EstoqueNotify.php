<?php

namespace App\Listeners;

use App\Events\notifyEmail;
use App\Mail\PedidoConfirmado;
use App\Models\Pedido;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Mail;

class EstoqueNotify
{
    public $pedido;
    /**
     * Create the event listener.
     */
    public function __construct(Pedidos $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Handle the event.
     */
    public function handle(notifyEmail $event): void
    {
        //enviado o email para o e-mail especificado
        Mail::to('estoque@gmail.com')->send(new PedidoConfirmado($event->pedido));
    }
}
