<?php

namespace App\Listeners;

use App\Adapter\EmailAdapter;
use App\Events\notifyEmail;
use App\Mail\PedidoConfirmado;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Mail;

class EstoqueNotify
{
    public $pedido;
    public $emailAdapter;
    /**
     * Create a new event instance.
     */
    public function __construct(Pedidos $pedido, EmailAdapter $emailAdapter)
    {
        $this->pedido = $pedido;
        $this->emailAdapter = $emailAdapter;
    }

    /**
     * Handle the event.
     */
    public function handle(notifyEmail $event): void
    {
        //enviado o email para o e-mail especificado
        $pedido = $this->emailAdapter->adapterData("estoque" ,$event->pedido);

        Mail::to('estoque@gmail.com')->send(new PedidoConfirmado($pedido));
    }
}
