<?php

namespace App\Listeners;

use App\Events\notifyEmail;
use App\Mail\PedidoConfirmado;
use App\Models\Pedido;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Mail;

class FinanceiroNotify
{

    public $pedido;
    /**
     * Create the event listener.
     */
    public function __construct(Pedidos $pedido)
    {
        return $this->pedido = $pedido;
    }

    /**
     * Handle the event.
     */
    public function handle(notifyEmail $event): void
    {
        //enviando o e-mail para o email especificado
        Mail::to('financeiro@gmail.com')->send(new PedidoConfirmado($this->pedido));

    }
}
