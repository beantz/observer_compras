<?php

namespace App\Listeners;

use App\Events\notifyEmail;
use App\Mail\PedidoConfirmado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EstoqueNotify
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(notifyEmail $event): void
    {
        //enviado o email para o e-mail especificado
        Mail::to('estoque@gmail.com')->send(new PedidoConfirmado());
    }
}
