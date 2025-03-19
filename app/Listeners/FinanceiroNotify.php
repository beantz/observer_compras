<?php

namespace App\Listeners;

use App\Adapter\EmailAdapter;
use App\Events\notifyEmail;
use App\Mail\PedidoConfirmado;
use App\Models\Pedidos;
use Illuminate\Support\Facades\Mail;

class FinanceiroNotify
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
        //enviando o e-mail para o email especificado
        $pedido = $this->emailAdapter->adapterData("financeiro" , $event->pedido);

        Mail::to('financeiro@gmail.com')->send(new PedidoConfirmado($pedido));
    }
}
